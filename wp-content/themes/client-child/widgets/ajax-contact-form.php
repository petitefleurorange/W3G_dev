<?php
add_action('widgets_init', 'ajax_contact_form_load_widgets');

function ajax_contact_form_load_widgets()
{
	register_widget('Ajax_Contact_Form');
}

class Ajax_Contact_Form extends WP_Widget {
	
	function Ajax_Contact_Form()
	{
		$widget_ops = array('classname' => 'footer_maps', 'description' => '');

		$control_ops = array('id_base' => 'ajax_contact_form-widget');

		$this->WP_Widget('ajax_contact_form-widget', 'Room Cartoons: Ajax Contact Form', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);


		echo $before_widget;

		?>

 	    <div id="<?php echo $this->id; ?>">
	    	<?php
                echo <<<EOF
                    <form name="sendMe" method="post" action="Php/send_message.php" id="sendMe">
                                <input id="name" type="text" name="name" class='input' value="Votre nom"/>
                                <input id="email" type="text" name="email" class='input' value="Adress Mail"/>
                                <textarea id="message" name="message" class="textarea">Votre message</textarea>
                                <input type="submit" class='r-c-read-more' name="send_message" id="send_message" value="Envoyer" />
                    </form>
EOF;
                ?>
	    </div>

		<?php
		echo $after_widget;
	}

}
?>