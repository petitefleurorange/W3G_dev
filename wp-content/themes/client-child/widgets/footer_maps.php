<?php
add_action('widgets_init', 'footer_maps_load_widgets');

function footer_maps_load_widgets()
{
	register_widget('Footer_Maps_Widget');
}

class Footer_Maps_Widget extends WP_Widget {
	
	function Footer_Maps_Widget()
	{
		$widget_ops = array('classname' => 'footer_maps', 'description' => '');

		$control_ops = array('id_base' => 'footer_maps-widget');

		$this->WP_Widget('footer_maps-widget', 'Room Cartoons: Footer Maps', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);


		echo $before_widget;

		?>

                <div id="<?php echo $this->id; ?>">
	    	<?php
                echo "<div style='width:{$instance['width']};height:{$instance['height']};' id='maps'></div>";
                
                 
    			$data = array(     
                    'text' => $instance['text'],
                    'coordinats' => $instance['coordinats'] 
                ); 
                wp_enqueue_script( 'map-init', get_template_directory_uri() . '/js/map.js' );  
    			wp_localize_script( 'map-init', 'googleWidgetData', $data );
                ?>
                </div>

		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['width'] = $new_instance['width'];
		$instance['height'] = $new_instance['height'];
		$instance['coordinats'] = $new_instance['coordinats'];
                $instance['text'] = $new_instance['text'];
                
		return $instance;
	}

	function form($instance)
	{
		$defaults = array(
                    'width' => '97%',
                    'height' => '350px',
                    'coordinats' => '40.708751,-73.994765',
                    'text' => 'Mr-myme Company'
                );
                
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('width'); ?>">Width:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo $instance['width']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('height'); ?>">Height:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo $instance['height']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('coordinats'); ?>">Coordinats:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('coordinats'); ?>" name="<?php echo $this->get_field_name('coordinats'); ?>" value="<?php echo $instance['coordinats']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('text'); ?>">Text:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" value="<?php echo $instance['text']; ?>" />
		</p>  
	<?php
	}
}
?>