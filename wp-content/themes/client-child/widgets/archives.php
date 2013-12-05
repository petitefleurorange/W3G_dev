<?php
add_action('widgets_init', 'archives_list_load_widgets');

function archives_list_load_widgets()
{
	register_widget('Archives_List_Widget');
}

class Archives_List_Widget extends WP_Widget {
	
	function Archives_List_Widget()
	{
		$widget_ops = array('classname' => 'archives_list', 'description' => '');

		$control_ops = array('id_base' => 'archives_list-widget');

		$this->WP_Widget('archives_list-widget', 'Room Cartoons: Archives List', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
              
                $args = array(  
                    'type'            => 'monthly',  
                    'limit'           => $instance['limit'],  
                    'format'          => 'custom',   
                    'before'          => "<li><i class='icon-archive'></i>",  
                    'after'           => '</li>',  
                    'show_post_count' => false,  
                    'echo'            => 1 
                ); 
                

                echo "<ul class='room-cartoons-archives'>";
                wp_get_archives($args);
                echo "</ul>";
                
		?>
                

		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
                $instance['limit'] = $new_instance['limit'];
                
		return $instance;
	}

	function form($instance)
	{
		$defaults = array(
                    'title' => 'Archives',
                    'limit' => '6'
                );
                
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('limit'); ?>">Limit:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" value="<?php echo $instance['limit']; ?>" />
		</p>
                
	<?php
	}
}
?>