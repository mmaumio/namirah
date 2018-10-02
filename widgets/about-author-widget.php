<?php
/*
 * Namirah About Author
 */
class Namirah_About_Author_Widget extends WP_Widget
{
    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'nm_about_author', 
            __('Namirah: About Author Widget', 'namirah'), 
            array('description' => __('Namirah About Author Widget', 'namirah'),) 
        );
        add_action('admin_enqueue_scripts', array($this, 'nm_media_enqueue_scripts'));
    }

    private $facebook;
    private $twitter;

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()fesc_
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        echo $before_widget;
        if($title) echo $before_title.$title.$after_title; 
        if($instance['image']){
            $image_src = wp_get_attachment_image_src($instance['image'], 'medium');
        } else {
            $image_src = '';   
        }
        ?>

        <div class="about-widget">
            <div class="author-image">
                <img src="<?php echo $image_src[0]; ?>" />
            </div>
            
            <h3 class="n-author-name"><?php echo $instance['author_name'] ?></h3>
            <span class="n-author-d"><?php echo $instance['designation']; ?></span>
        
            <p>
            <?php
                $nm_author_bio = $instance['description'];
                echo $nm_author_bio; 
            ?>
            </p>
            <div class="n-profile">
                <span class="p-title">Connect:</span>
                <a href="#" class="waves-effect s-facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="waves-effect s-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="waves-effect s-gplus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="waves-effect s-pinterest"><i class="fa fa-pinterest"></i></a>
            </div>
        </div>

       <?php echo $after_widget;

    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['image'] = strip_tags($new_instance['image']);
        $instance['author_name'] = strip_tags($new_instance['author_name']);
        $instance['designation'] = strip_tags($new_instance['designation']);
        $instance['description'] = $new_instance['description'];

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('About Author', 'namirah');
        }

        if(isset($instance['author_name'])) { 
            $author_name = $instance['author_name']; 
        } else {
            $author_name = '';
        }

        if(isset($instance['designation'])) { 
            $designation = $instance['designation']; 
        } else {
            $designation = '';
        }

        if(isset($instance['designation'])) { 
            $description = $instance['description']; 
        } else {
            $description = '';
        }


        if(!isset($instance['image'])) $instance['image'] = '';

    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'namirah'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" 
            		type="text" value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image:','namirah'); ?></label>
            <br/>
            <p class="imgpreview"></p>
            <input type="hidden" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>"  value="<?php echo $instance['image']; ?>" class="imgph" />
            <input type="button" class="button btn-primary widgetuploader" value="<?php _e('Add Image', 'namirah'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('author_name'); ?>"><?php _e('Author Name:', 'namirah'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('author_name'); ?>" name="<?php echo $this->get_field_name('author_name'); ?>" 
                    type="text" value="<?php echo esc_attr($author_name); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('designation'); ?>"><?php _e('Designation:', 'namirah'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('designation'); ?>" name="<?php echo $this->get_field_name('designation'); ?>" 
                    type="text" value="<?php echo esc_attr($designation); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:', 'namirah'); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>">
            <?php echo esc_attr( $description ); ?>
            </textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('no_words'); ?>"><?php _e('Number of Words to show on Description:', 'namirah'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('no_words'); ?>" name="<?php echo $this->get_field_name('no_words'); ?>" 
                    type="text" value="<?php if(isset($instance['no_words'])) { echo esc_attr($instance['no_words']); } ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('details_url'); ?>"><?php _e('View Details URL:', 'namirah'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('details_url'); ?>" name="<?php echo $this->get_field_name('details_url'); ?>" 
                    type="text" value="<?php if(isset($instance['details_url'])) { echo esc_attr($instance['details_url']); } ?>" />
        </p>

        <script type="text/javascript">
            function prefetch($){
                $(".imgph").each(function(){
                    var attid = $(this).val();
                    var container = $(this).prev();
                    container.html("");
                    if(attid){
                        $(this).next().val("Change Image");
                        var attachment = new wp.media.model.Attachment.get(attid);
                        attachment.fetch({success: function (att) {
                            container.append("<img src='" + att.attributes.sizes.medium.url + "'/>");
                        }});
                    }
                });
            }

            try {
                prefetch(jQuery);
            } catch(e){}
        </script>

    <?php
    }

    public function nm_media_enqueue_scripts($hook) {
        if($hook == "widgets.php") {
            wp_enqueue_media();
            wp_enqueue_script("media-widget-js", get_template_directory_uri() . "/assets/js/media-widget.js", array("jquery"), "1.0", 1);
        }
    }

} // class Namirah_About_Author_Widget

function nm_about_author_widget() {
    register_widget('Namirah_About_Author_Widget');
}

add_action('widgets_init', 'nm_about_author_widget');
