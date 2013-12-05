<?php
add_action('widgets_init', 'recent_posts_load_widgets');

function recent_posts_load_widgets()
{
	register_widget('Recent_Posts_Widget');
}

class Recent_Posts_Widget extends WP_Widget {
	
	function Recent_Posts_Widget()
	{
		$widget_ops = array('classname' => 'recent_posts', 'description' => '');

		$control_ops = array('id_base' => 'recent_posts-widget');

		$this->WP_Widget('recent_posts-widget', 'Room Cartoons: Recent Post', $widget_ops, $control_ops);
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
                        'posts_per_page'   => $instance['count'],
                        'offset'           => 0,
                        'category'         => '',
                        'orderby'          => 'post_date',
                        'order'            => 'DESC',
                        'include'          => '',
                        'exclude'          => '',
                        'meta_key'         => '',
                        'meta_value'       => '',
                        'post_type'        => 'post',
                        'post_mime_type'   => '',
                        'post_parent'      => '',
                        'post_status'      => 'publish',
                        'suppress_filters' => true );
                
                $posts = get_posts( $args );
                //var_dump($posts);
                echo "<section class='room-cartoons-recent-blog'>";
                
                foreach ($posts as $post_object){
                    $url = get_permalink($post_object->ID);
                    $date = date("d, F Y",strtotime($post_object->post_date));
                    echo "<article>
                        <span class='date'>{$date}</span>
                            <a href='{$url}' title='{datepost_title}'>
                                <span>{$post_object->post_title}</span>
                            </a>
                    </article>";
                }
                echo "</section>";
                
		?>
                

		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
                $instance['count'] = $new_instance['count'];
                
		return $instance;
	}

	function form($instance)
	{
		$defaults = array(
                    'title' => 'Latest posts',
                    'count' => 6,
                );
                
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('count'); ?>">Count:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $instance['count']; ?>" />
		</p>
                
	<?php
	}
}
?>