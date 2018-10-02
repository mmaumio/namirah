<?php
/*
 * Namirah Recent Post
 */
class Namirah_Recent_Posts_Widget extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'nm_recent_posts', 
            __('Namirah: Recent Posts Widget', 'namirah'), 
            array('description' => __('Namirah Recent Posts', 'namirah'),) 
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        if (isset($instance['char_count'])) {
            $char_count = $instance['char_count'];
        }
        if ($instance['num_posts']) {
            $w_posts = nm_get_posts('post', $instance['num_posts']);
            $post_thumbnail = array('');
            echo $before_widget;
            if($title) echo $before_title.$title.$after_title;
            echo '<ul class="widget-post-list">';

            foreach ($w_posts as $wpost) {
                $title = $wpost->post_title;
                $date = get_the_date('',$wpost->ID);

                if(has_post_thumbnail($wpost->ID)) {
                    $thumb_id = get_post_thumbnail_id($wpost->ID);
                    $post_thumb_src = wp_get_attachment_image_src( $thumb_id, 'recentpost' );
                    $post_thumbnail = $post_thumb_src[0];
                } else { 
                    $post_thumbnail = get_template_directory_uri().'/assets/images/no-img.png';
                }
            ?>
                <li>
                    
                <?php if($instance['display_thumb']) { ?>
                <div class="widget-post-thumb">
                    <a href="<?php echo get_the_permalink($wpost->ID);?>">
                        <img src="<?php echo $post_thumbnail; ?>" alt="<?php echo $title; ?>" />
                    </a>
                </div>
                <?php } ?>
                <div>
                    <h5>
                        <a href="<?php echo get_the_permalink($wpost->ID);?>">
                        <?php nm_titlesmall('', '', $title, $char_count); ?>
                        </a>
                    </h5>
                    <span class="widget-post-date"><?php echo $date;?></span>
                </div>
                  
                </li>
            <?php
            }
            echo "</ul>";

            echo $after_widget;
        }

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
        $instance['num_posts'] = strip_tags($new_instance['num_posts']);
        $instance['display_thumb'] = $new_instance['display_thumb'];
        $instance['char_count'] = $new_instance['char_count'];

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
            $title = __('Recent Posts', 'namirah');
        }

        if (isset($instance['char_count'])) {
            $char_count = $instance['char_count'];
        } else {
            $char_count = 20;
        }

        $checked = "";
        if (isset($instance['display_thumb']) && $instance['display_thumb'] == 1) {
            $checked = "checked";
        }        

        if (!isset($instance['num_posts']) || $instance['num_posts'] <= 0) {
            $instance['num_posts'] = 2;
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'namirah'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" 
            		type="text" value="<?php esc_attr_e($title); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('num_posts'); ?>"><?php _e('Number of Recent Posts:', 'namirah'); ?></label>
            <br/>

            <input class="widefat" type="text" id="<?php echo $this->get_field_id('num_posts'); ?>" name="<?php echo $this->get_field_name('num_posts'); ?>"
                   value="<?php esc_attr_e($instance['num_posts']); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('display_thumb'); ?>"><?php _e('Display Thumbnails:', 'namirah'); ?></label>
            <input class="widefat" type="checkbox" id="<?php echo $this->get_field_id('display_thumb'); ?>"
                   name="<?php echo $this->get_field_name('display_thumb'); ?>" value="1" <?php echo $checked; ?> />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('char_count'); ?>"><?php _e('Number of characters for Title:', 'namirah'); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('char_count'); ?>" name="<?php echo $this->get_field_name('char_count'); ?>" 
                    value="<?php esc_attr_e($char_count); ?>" />
        </p>
    <?php
    }


} // class Namirah_Recent_Post_Widget

function nm_recent_posts_widget() {
    register_widget('Namirah_Recent_Posts_Widget');
}

add_action('widgets_init', 'nm_recent_posts_widget');
