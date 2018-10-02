<?php
/**
 * Macaw tags widget
 *
 */
class Macaw_Tag_Widget extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
	public function __construct() {
        parent::__construct(
            'mac_tags', 
            __('Macaw: Tags Widget', 'namirah'), 
            array('description' => __('Macaw Tags Widget', 'namirah'),) 
        );
    }

	public function widget( $args, $instance ) {
		extract($args);
		$current_taxonomy = $this->_get_current_taxonomy($instance);
		if ( !empty($instance['title']) ) {
			$title = $instance['title'];
		} else {
			if ( 'post_tag' == $current_taxonomy ) {
				$title = __('Tags', 'namirah');
			} else {
				$tax = get_taxonomy($current_taxonomy);
				$title = $tax->labels->name;
			}
		}

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $before_widget;
		if ( $title ) {
			echo $before_title.$title.$after_title;
		}

		/**
		 * Filter the taxonomy used in the Tag Cloud widget.
		 *
		 * @since 2.8.0
		 * @since 3.0.0 Added taxonomy drop-down.
		 *
		 * @see wp_tag_cloud()
		 *
		 * @param array $current_taxonomy The taxonomy to use in the tag cloud. Default 'tags'.
		 */
		$args = array(
            'smallest'                  => 10,
            'largest'                   => 10,
            'number'                    => 0,  
            'format'                    => 'list',
            'orderby'                   => 'name', 
            'link'                      => 'view',
            'taxonomy'					=> $current_taxonomy, 
            'echo'                      => true
        );

		wp_tag_cloud( $args );
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['taxonomy'] = stripslashes($new_instance['taxonomy']);
		return $instance;
	}

	public function form( $instance ) {
		$current_taxonomy = $this->_get_current_taxonomy($instance);
?>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'namirah') ?></label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" 
	value="<?php if (isset ( $instance['title'])) { esc_attr_e( $instance['title'] );} ?>" />
	</p>
	<p>
	<label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Taxonomy:', 'namirah') ?></label>
	<select class="widefat" id="<?php echo $this->get_field_id('taxonomy'); ?>" name="<?php echo $this->get_field_name('taxonomy'); ?>">
	<?php foreach ( get_taxonomies() as $taxonomy ) :
				$tax = get_taxonomy($taxonomy);
				if ( !$tax->show_tagcloud || empty($tax->labels->name) )
					continue;
	?>
		<option value="<?php esc_attr_e($taxonomy) ?>" <?php selected($taxonomy, $current_taxonomy) ?>><?php echo $tax->labels->name; ?></option>
	<?php endforeach; ?>
	</select>
	</p>
	<?php
	}

	public function _get_current_taxonomy($instance) {
		if ( !empty($instance['taxonomy']) && taxonomy_exists($instance['taxonomy']) )
			return $instance['taxonomy'];

		return 'post_tag';
	}
}

function mac_tags_widget()
{
    register_widget('Macaw_Tag_Widget');
}

add_action('widgets_init', 'mac_tags_widget');
