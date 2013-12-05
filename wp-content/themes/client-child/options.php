<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	$type_box = array(
		'wide' => __('Wide', 'options_check'),
		'box' => __('Box', 'options_check')
	);

	$test_array = array(
		'one' => __('One', 'options_check'),
		'two' => __('Two', 'options_check'),
		'three' => __('Three', 'options_check'),
		'four' => __('Four', 'options_check'),
		'five' => __('Five', 'options_check')
	);


	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	$count_column = array(
		'col-lg-12' => __('1 Column', 'options_check'),
		'col-lg-6' => __('2 Column', 'options_check'),
		'col-lg-4' => __('3 Column', 'options_check'),
		'col-lg-3' => __('4 Column', 'options_check'),
	);

	$type_animation_command = array(
		'stop' => __('Stop Animation', 'options_check'),
		'repeat' => __('Repeat Animation', 'options_check')
	);

	$align_column = array(
		'text-left' => __('Left', 'options_check'),
		'text-center' => __('Center', 'options_check'),
		'text-right' => __('Right', 'options_check'),
	);


	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);
        $background_defaults_block_blog = array(
		'color' => '#FFF',
		'image' => '',
		'repeat' => '',
		'position' => '',
		'attachment'=>'' 
        );
        $background_defaults_block_clients = array(
		'color' => '#FFF',
		'image' => '',
		'repeat' => '',
		'position' => '',
		'attachment'=>'' 
        );
        $background_defaults_block_bottom = array(
		'color' => '#FFF',
		'image' => '',
		'repeat' => '',
		'position' => '',
		'attachment'=>'' 
        );
        $background_defaults_block_footer = array(
		'color' => '#414141',
		'image' => get_template_directory_uri()."/images/BackgroundContacts.jpg",
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'' 
        );
        $background_defaults_block_portfolio = array(
		'color' => '#FDF8BF',
		'image' => '',
		'repeat' => '',
		'position' => '',
		'attachment'=>'' 
        );
        $background_defaults_block_about = array(
		'color' => '#F6917C',
		'image' => '',
		'repeat' => '',
		'position' => '',
		'attachment'=>'' 
        );
        
	$background_defaults = array(
		'color' => '#fff',
		'image' => get_template_directory_uri().'/images/BackgroundBody.png',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );
    $typography_defaults_title_block_portfolio = array(
		'size' => '54px',
		'face' => 'Pfbeausanspro-bold',
		'style' => 'normal',
		'color' => '#414141'
        );
    $typography_defaults_title_block_blog = array(
		'size' => '54px',
		'face' => 'Pfbeausanspro-bold',
		'style' => 'normal',
		'color' => '#f6917c'
        );
    $typography_defaults_text_block_portfolio = array(
		'size' => '14px',
		'face' => 'Pfbeausanspro-regular',
		'style' => 'normal',
		'color' => '#414141'
        );
    $typography_defaults_text_block_blog = array(
		'size' => '14px',
		'face' => 'Pfbeausanspro-regular',
		'style' => 'normal',
		'color' => '#414141'
        );
    $typography_defaults_title_block_footer = array(
		'size' => '54px',
		'face' => 'Pfbeausanspro-bold',
		'style' => 'normal',
		'color' => '#5e5e5e'
        );
    $typography_defaults_title_block_bottom = array(
		'size' => '34px',
		'face' => 'Pfbeausanspro-light',
		'style' => 'normal',
		'color' => '#414141'
        );
	$typography_defaults_title_block_about = array(
		'size' => '54px',
		'face' => 'Pfbeausanspro-bold',
		'style' => 'normal',
		'color' => '#fff'
        );
    $typography_defaults_text_block_about = array(
		'size' => '28px',
		'face' => 'Pfbeausanspro-regular',
		'style' => 'normal',
		'color' => '#fff'
        );
    $typography_defaults_theme = array(
		'size' => '14px',
		'face' => 'Pfbeausanspro-regular',
		'style' => 'normal',
		'color' => '#333'
        );
        
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55', );
		

	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);


	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	

	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}


	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();
        
        /* Main options */
        $options[] = array(
		'name' => __('Main options', 'options_check'),
		'type' => 'heading');
		$options[] = array(
		'name' => __('Type box', 'options_check'),
		'desc' => __('Select type box your theme', 'options_check'),
		'id' => 'type_box',
		'std' => 'wide',
		'type' => 'radio',
		'options' => $type_box);
        $options[] = array(
		'name' => __('Logo', 'options_check'),
		'desc' => __('Upload logo, recommend size 200x89px ', 'options_check'),
		'id' => 'logo',
		'type' => 'upload');      
        $options[] = array(
		'name' => __('Favicon', 'options_check'),
		'desc' => __('Upload favicon', 'options_check'),
		'id' => 'favicon',
		'type' => 'upload');
        $options[] = array(
		'name' =>  __('Select background', 'options_check'),
		'desc' => __('Select image for background your theme.', 'options_check'),
		'id' => 'room-cartoons-background-theme',
		'std' => $background_defaults,
		'type' => 'background' );
		$options[] = array( 'name' => __('Typography', 'options_check'),
		'desc' => __('Typography Theme All', 'options_check'),
		'id' => "typography-block-theme",
		'std' => $typography_defaults_theme,
		'type' => 'typography' );
        /* End Main options */ 
        
        /* Slider options */
	$options[] = array(
		'name' => __('Slider options', 'options_check'),
		'type' => 'heading');
        
        $options[] = array(
		'name' => __('Amount slides', 'options_check'),
		'desc' => __('Amount slides display on home page', 'options_check'),
		'id' => 'count_slides',
		'std' => '4',
		'class' => 'mini',
		'type' => 'text');

       $order_array = array(
		'none' => __('None', 'options_check'),
		'id' => __('Id', 'options_check'),
		'title' => __('Title', 'options_check'),
		'date' => __('Date', 'options_check'),
		'rand' => __('Rand', 'options_check')
		);

        $options[] = array(
		'name' => __('Select order by', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'order_slider',
		'std' => 'id',
		'type' => 'select',
		'class' => 'mini', 
		'options' => $order_array);
        
        /* End Slider options */

        
        /* Options Block About */
		$options[] = array(
		'name' => __('Block about options', 'options_check'),
		'type' => 'heading');
        
        $options[] = array(
		'name' => __('Title', 'options_check'),
		'desc' => __('Value that display in block about us', 'options_check'),
		'id' => 'title-block-about',
		'std' => 'About us',
		'class' => 'mini',
		'type' => 'text');
        $options[] = array( 'name' => __('Typography Title', 'options_check'),
		'desc' => __('Typography title block about us', 'options_check'),
		'id' => "typography-block-about-title",
		'std' => $typography_defaults_title_block_about,
		'type' => 'typography' );
        $options[] = array( 'name' => __('Typography Text', 'options_check'),
		'desc' => __('Typography text block about us', 'options_check'),
		'id' => "typography-block-about-text",
		'std' => $typography_defaults_text_block_about,
		'type' => 'typography' );
        $options[] = array(
		'name' =>  __('Background', 'options_check'),
		'desc' => __('Select color or image background', 'options_check'),
		'id' => 'room-cartoons-background-block-about',
		'std' => $background_defaults_block_about,
		'type' => 'background' );
        /* End Block About */
        
        /* Options Command Block */
		$options[] = array(
		'name' => __('Options command block', 'options_check'),
		'type' => 'heading');
        $options[] = array(
		'name' => __('Title', 'options_check'),
		'desc' => __('Value that display in block command', 'options_check'),
		'id' => 'title-block-command',
		'std' => 'Who we are?',
		'class' => 'mini',
		'type' => 'text');
        $options[] = array(
		'name' => __('Amount', 'options_check'),
		'desc' => __('Amount workman that display in block command', 'options_check'),
		'id' => 'count-command',
		'std' => '4',
		'class' => 'mini',
		'type' => 'text');
        $options[] = array(
		'name' => __('Color links', 'options_check'),
		'desc' => __('Color soc-link', 'options_check'),
		'id' => 'color-soc-link',
		'std' => '#ADADAD',
		'type' => 'color' );
		$options[] = array(
		"name" => "Count Column",
		"id" => "count_column-command",
		"std" => "col-lg-3",
		"type" => "radio",
		"options" => $count_column );
		$options[] = array(
		"name" => "Align Column",
		"id" => "align_column-command",
		"std" => "text-center",
		"type" => "radio",
		"options" => $align_column );
		$options[] = array(
		"name" => "Type Hover Animation",
		"id" => "type_hover-animation",
		"std" => "repeat",
		"type" => "radio",
		"options" => $type_animation_command );
        /* End Command Block */
        
        /* Options Portfolio Block */
		$options[] = array(
		'name' => __('Options portfolio block', 'options_check'),
		'type' => 'heading');
        $options[] = array(
		'name' => __('Title', 'options_check'),
		'desc' => __('Value that display in block portfolio', 'options_check'),
		'id' => 'title-block-portfolio',
		'std' => 'Portfolio',
		'class' => 'mini',
		'type' => 'text');
        $options[] = array(
		'name' => __('Amount', 'options_check'),
		'desc' => __('Amount work that display in block portfolio', 'options_check'),
		'id' => 'count-portfolio',
		'std' => '8',
		'class' => 'mini',
		'type' => 'text');
        $options[] = array(
		'name' =>  __('Background', 'options_check'),
		'desc' => __('Select color or image background', 'options_check'),
		'id' => 'room-cartoons-background-block-portfolio',
		'std' => $background_defaults_block_portfolio,
		'type' => 'background' );
        $options[] = array( 'name' => __('Typography Title', 'options_check'),
		'desc' => __('Typography title block portfolio', 'options_check'),
		'id' => "typography-block-portfolio-title",
		'std' => $typography_defaults_title_block_portfolio,
		'type' => 'typography' );
        $options[] = array( 'name' => __('Typography Text', 'options_check'),
		'desc' => __('Typography text block portfolio', 'options_check'),
		'id' => "typography-block-portfolio-text",
		'std' => $typography_defaults_text_block_portfolio,
		'type' => 'typography' );
        /* End Options Portfolio */
        
        /* Options Blog */
		$options[] = array(
		'name' => __('Options blog', 'options_check'),
		'type' => 'heading');
        $options[] = array(
		'name' => __('Title', 'options_check'),
		'desc' => __('Value that display in section blog', 'options_check'),
		'id' => 'title-block-blog',
		'std' => 'Blog',
		'class' => 'mini',
		'type' => 'text');
        $options[] = array( 'name' => __('Typography Title', 'options_check'),
		'desc' => __('Typography title block blog', 'options_check'),
		'id' => "typography-block-blog-title",
		'std' => $typography_defaults_title_block_blog,
		'type' => 'typography' );
        $options[] = array( 'name' => __('Typography Text', 'options_check'),
		'desc' => __('Typography text block blog', 'options_check'),
		'id' => "typography-block-blog-text",
		'std' => $typography_defaults_text_block_blog,
		'type' => 'typography' );
        $options[] = array(
		'name' =>  __('Background', 'options_check'),
		'desc' => __('Select color or image background', 'options_check'),
		'id' => 'room-cartoons-background-block-blog',
		'std' => $background_defaults_block_blog,
		'type' => 'background' );
        /* End Options Blog */

        /* Options Clients */
		$options[] = array(
		'name' => __('Options clients', 'options_check'),
		'type' => 'heading');
        $options[] = array(
		'name' => __('Title', 'options_check'),
		'desc' => __('Value that display in section clients', 'options_check'),
		'id' => 'title-block-clients',
		'std' => 'Clients',
		'class' => 'mini',
		'type' => 'text');
        $options[] = array(
		'name' => __('Amount', 'options_check'),
		'desc' => __('Amount post that display in section clients', 'options_check'),
		'id' => 'count-clients',
		'std' => '6',
		'class' => 'mini',
		'type' => 'text');
		$options[] = array(
		'name' =>  __('Background', 'options_check'),
		'desc' => __('Select color or image background', 'options_check'),
		'id' => 'room-cartoons-background-block-clients',
		'std' => $background_defaults_block_clients,
		'type' => 'background' );
        /* End Clients Options */

        /* Options Bottom Block  */
		$options[] = array(
		'name' => __('Options block bottom', 'options_check'),
		'type' => 'heading');
        $options[] = array(
		'name' => __('Title', 'options_check'),
		'desc' => __('Value that display in section bottom', 'options_check'),
		'id' => 'title-block-bottom',
		'std' => 'We would love too hear from you!',
		'class' => 'mini',
		'type' => 'text');
		$options[] = array( 'name' => __('Typography Title', 'options_check'),
		'desc' => __('Typography title block bottom', 'options_check'),
		'id' => "typography-block-bottom-title",
		'std' => $typography_defaults_title_block_bottom,
		'type' => 'typography' );
		$options[] = array(
		'name' =>  __('Background', 'options_check'),
		'desc' => __('Select color or image background', 'options_check'),
		'id' => 'room-cartoons-background-block-bottom',
		'std' => $background_defaults_block_bottom,
		'type' => 'background' );
        /* End Bottom Block */

        /* Options Footer Block  */
		$options[] = array(
		'name' => __('Options block footer', 'options_check'),
		'type' => 'heading');
        $options[] = array(
		'name' => __('Title', 'options_check'),
		'desc' => __('Value that display in section footer', 'options_check'),
		'id' => 'title-block-footer',
		'std' => 'Contacts',
		'class' => 'mini',
		'type' => 'text');
		$options[] = array( 'name' => __('Typography Title', 'options_check'),
		'desc' => __('Typography title block footer', 'options_check'),
		'id' => "typography-block-footer-title",
		'std' => $typography_defaults_title_block_footer,
		'type' => 'typography' );
        $options[] = array(
		'name' =>  __('Background', 'options_check'),
		'desc' => __('Select color or image background', 'options_check'),
		'id' => 'room-cartoons-background-block-footer',
		'std' => $background_defaults_block_footer,
		'type' => 'background' );
        /* End Footer Block */
    

	return $options;
}