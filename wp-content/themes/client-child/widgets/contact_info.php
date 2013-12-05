<?php
add_action('widgets_init', 'contact_info_load_widgets');

function contact_info_load_widgets()
{
	register_widget('Contact_Info_Widget');
}

class Contact_Info_Widget extends WP_Widget {
	
	function Contact_Info_Widget()
	{
		$widget_ops = array('classname' => 'contact_info', 'description' => '');

		$control_ops = array('id_base' => 'contact_info-widget');

		$this->WP_Widget('contact_info-widget', 'Room Cartoons: Contact Info', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		?>
                <div class="col-lg-12 margin">
                    <ul class="listFooterContact">
                        
                        <?php if($instance['address']): ?>
                            <li><i class="icon-map-marker  icon-2x"></i><?php echo $instance['address']; ?></li>
                        <?php endif; ?>
                            
                        <?php if($instance['cellphone']): ?>
                            <li><i class="icon-mobile-phone icon-2x"></i><?php echo $instance['cellphone']; ?></li>
                        <?php endif; ?>  
                            
                        <?php if($instance['phone']): ?>
                            <li><i class="icon-phone  icon-2x"></i><?php echo $instance['phone']; ?></li>
                        <?php endif; ?>
                            
                        <?php if($instance['fax']): ?>
                            <li><i class="icon-print icon-2x"></i><?php echo $instance['fax']; ?></li>
                        <?php endif; ?>
                            
                        <?php if($instance['email']): ?>
                            <li><i class="icon-envelope icon-2x"></i><a href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a></li>
                        <?php endif; ?>
                            
                        <?php if($instance['web']): ?>
                            <li><i class="icon-globe icon-2x"></i><a href="<?php echo $instance['web']; ?>"><?php echo $instance['web']; ?></a></li>
                        <?php endif; ?>
                            
                        <?php if($instance['skype']): ?>
                            <li><i class="icon-skype icon-2x"></i><?php echo $instance['skype']; ?></li>
                        <?php endif; ?>
   
                    </ul>
                </div>
                <div class="col-lg-12 margin">
                    <ul id="listFooterIcon">
                        <?php if($instance['twitter']): ?>
                            <li><a href="<?php echo $instance['twitter']; ?>"><i class="icon-twitter icon-2x"></i>twitter</a></li>
                        <?php endif; ?>
                            
                        <?php if($instance['instagram']): ?>
                            <li><a href="<?php echo $instance['instagram']; ?>"><i class="icon-instagram icon-2x"></i>instagram</a></li>
                        <?php endif; ?>
                            
                        <?php if($instance['dribbble']): ?>
                            <li><a href="<?php echo $instance['dribbble']; ?>"><i class="icon-dribbble icon-2x"></i>dribbble</a></li>
                        <?php endif; ?>
                            
                        <?php if($instance['tumblr']): ?>
                            <li><a href="<?php echo $instance['tumblr']; ?>"><i class="icon-tumblr-sign icon-2x"></i>tumblr</a></li>
                        <?php endif; ?>
                            
                        <?php if($instance['facebook']): ?>
                            <li><a href="<?php echo $instance['facebook']; ?>"><i class="icon-facebook icon-2x"></i>facebook</a></li>
                        <?php endif; ?>
                            
                        <?php if($instance['vk']): ?>
                            <li><a href="<?php echo $instance['vk']; ?>"><i class="icon-vk icon-2x"></i>vk</a></li>
                        <?php endif; ?>
                            
                        <?php if($instance['linkedin']): ?>
                            <li><a href="<?php echo $instance['linkedin']; ?>"><i class="icon-linkedin icon-2x"></i>linkedin</a></li>
                        <?php endif; ?>

                    </ul>
                </div>
                <div class="clearfix"></div>

		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
                $instance['cellphone'] = $new_instance['cellphone'];
		$instance['fax'] = $new_instance['fax'];
		$instance['email'] = $new_instance['email'];
		$instance['web'] = $new_instance['web'];
                $instance['skype'] = $new_instance['skype'];
                $instance['twitter'] = $new_instance['twitter'];
                $instance['instagram'] = $new_instance['instagram'];
                $instance['dribbble'] = $new_instance['dribbble'];
                $instance['tumblr'] = $new_instance['tumblr'];
                $instance['facebook'] = $new_instance['facebook'];
                $instance['vk'] = $new_instance['vk'];
                $instance['linkedin'] = $new_instance['linkedin'];
                
		return $instance;
	}

	function form($instance)
	{
		$defaults = array(
                    'title' => '',
                    'address' => '15 Monck St, London',
                    'cellphone' => '+44 845 456 2853',
                    'phone' => '+44 84 56',
                    'fax' => '+44 845 456 2853',
                    'email' => 'murzin_stas@mail.ru',
                    'web' => 'http://mr-myme.ru',
                    'skype' => 'Mr-Myme',
                    'twitter' => 'https://twitter.com',
                    'instagram' => 'http://instagram.com',
                    'dribbble' => 'http://dribbble.com',
                    'tumblr' => 'https://www.tumblr.com',
                    'facebook' => 'https://www.facebook.com',
                    'vk' => 'http://vk.com',
                    'linkedin' => 'http://www.linkedin.com'
                );
                
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('address'); ?>">Address:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" value="<?php echo $instance['address']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('cellphone'); ?>">Cellphone:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('cellphone'); ?>" name="<?php echo $this->get_field_name('cellphone'); ?>" value="<?php echo $instance['cellphone']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('phone'); ?>">Phone:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo $instance['phone']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('fax'); ?>">Fax:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" value="<?php echo $instance['fax']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('email'); ?>">Email:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo $instance['email']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('web'); ?>">Website URL:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('web'); ?>" name="<?php echo $this->get_field_name('web'); ?>" value="<?php echo $instance['web']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('skype'); ?>">Skype:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" value="<?php echo $instance['skype']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $instance['twitter']; ?>" />
		</p>
                
                <p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>">Instagram:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo $instance['instagram']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('dribbble'); ?>">Dribbble:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" value="<?php echo $instance['dribbble']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('tumblr'); ?>">Tumblr:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('tumblr'); ?>" name="<?php echo $this->get_field_name('tumblr'); ?>" value="<?php echo $instance['tumblr']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $instance['facebook']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('vk'); ?>">Vk:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('vk'); ?>" name="<?php echo $this->get_field_name('vk'); ?>" value="<?php echo $instance['vk']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('linkedin'); ?>">Linkedin:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $instance['linkedin']; ?>" />
		</p>
                
	<?php
	}
}
?>