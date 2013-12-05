<?php
add_action('widgets_init', 'category_list_load_widgets');

function category_list_load_widgets()
{
	register_widget('Catgory_List_Widget');
}

class Catgory_List_Widget extends WP_Widget {
	
	function Catgory_List_Widget()
	{
		$widget_ops = array('classname' => 'catgory_list', 'description' => '');

		$control_ops = array('id_base' => 'catgory_list-widget');

		$this->WP_Widget('catgory_list-widget', 'Room Cartoons: Category List', $widget_ops, $control_ops);
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
                    'type'                     => 'post',
                    'child_of'                 => 0,
                    'parent'                   => '',
                    'orderby'                  => 'name',
                    'order'                    => 'ASC',
                    'hide_empty'               => 1,
                    'hierarchical'             => 1,
                    'exclude'                  => '',
                    'include'                  => '',
                    'number'                   => 0,
                    'taxonomy'                 => 'category',
                    'pad_counts'               => false );  
                $categories = get_categories( $args );
                $root = get_site_url();
                echo "<ul class='room-cartoons-categories'>";
                foreach ($categories as $category){
                	$url = get_category_link($category->term_id);
                    echo "<li><i class='icon-th'></i><a href='{$url}'>{$category->name}</a></li>";
                }
                echo "</ul>";
                
		?>
                

		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
                
		return $instance;
	}

	function form($instance)
	{
		$defaults = array(
                    'title' => 'Categories',
                );
                
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
                
	<?php
	}
}
?>