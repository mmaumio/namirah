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
            'namirah_about_author', 
            __('Namirah: About Author Widget', 'namirah'), 
            array('description' => __('Namirah About Author Widget', 'namirah'),) 
        );
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
        ?>

        <div class="namirah-profile">
            <div class="profile-image">
                <img src="<?php echo esc_url( $instance['image'] ); ?>" />
            </div>
            <div class="profile-info">
                <div itemscope itemtype="http://data-vocabulary.org/Person">
                    <h2 itemprop="name"><?php echo esc_html( $instance['author_name'] ); ?></h2>
                    <span class="profile-title" itemprop="title"><?php echo esc_html( $instance['designation'] ); ?></span>
                </div>
                <p>
                <?php
                    if( isset($instance['no_words']) ) {
                        $no_words = $instance['no_words'];
                    } else {
                        $no_words = '';
                    }
                    $namirah_author_bio = wp_trim_words($instance['description'], $no_words);
                    echo esc_html( $namirah_author_bio ); 
                ?>
                </p>
            </div>
            <?php
            if(isset($instance['details_url'])) {
                $details_url = $instance['details_url'];
            } else {
                $details_url = '';
            }
            ?>
            <a class="btn-view-details" href="<?php echo esc_url( $details_url ); ?>"><?php _e('View Details', 'namirah'); ?></a>
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
        $instance['title'] = sanitize_title( $new_instance['title'] );
        $instance['image'] = esc_url_raw($new_instance['image']);
        $instance['author_name'] = sanitize_text_field($new_instance['author_name']);
        $instance['designation'] = sanitize_text_field($new_instance['designation']);
        $instance['description'] = sanitize_text_field( $new_instance['description'] );
        $instance['details_url'] = esc_url_raw( $new_instance['details_url'] );
        $instance['no_words'] = sanitize_text_field( $new_instance['no_words'] );

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
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image URL:','namirah'); ?></label>
            <br/>
            <input type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>"  value="<?php echo $instance['image']; ?>" class="widefat" />
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

    <?php
    }

} // class Namirah_About_Author_Widget

function namirah_about_author_widget() {
    register_widget('Namirah_About_Author_Widget');
}

add_action('widgets_init', 'namirah_about_author_widget');
