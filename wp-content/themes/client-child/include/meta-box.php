<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'rc_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'standard',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Standard Fields', 'rwmb' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array('rc_command'),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		// TEXT
            
                array(
			'name'             => __( 'Image Advanced Upload', 'rwmb' ),
			'id'               => "{$prefix}imgadv",
			'type'             => 'image_advanced',
			'max_file_uploads' => 4,
		),
                array(
			// Field name - Will be used as label
			'name'  => __( 'Working position', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}work_position",
			// Field description (optional)
			'desc'  => __( 'Working position', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
                array(
			'name'  => __( 'Twitter', 'rwmb' ),
			'id'    => "{$prefix}twitter",
			'desc'  => __( 'Url your twitter`s account', 'rwmb' ),
			'type'  => 'url',
			'std'   => '',
		),
                array(
			'name'  => __( 'Dribbble', 'rwmb' ),
			'id'    => "{$prefix}dribbble",
			'desc'  => __( 'Url your dribbble`s account', 'rwmb' ),
			'type'  => 'url',
			'std'   => '',
		),
                array(
			'name'  => __( 'FaceBook', 'rwmb' ),
			'id'    => "{$prefix}facebook",
			'desc'  => __( 'Url your facebook`s account', 'rwmb' ),
			'type'  => 'url',
			'std'   => '',
		),
                array(
			'name'  => __( 'Instagram', 'rwmb' ),
			'id'    => "{$prefix}instagram",
			'desc'  => __( 'Url your instagram`s account', 'rwmb' ),
			'type'  => 'url',
			'std'   => '',
		),
                array(
			'name'  => __( 'Youtube', 'rwmb' ),
			'id'    => "{$prefix}youtube",
			'desc'  => __( 'Url your youtube`s account', 'rwmb' ),
			'type'  => 'url',
			'std'   => '',
		),
                array(
			'name'  => __( 'Google', 'rwmb' ),
			'id'    => "{$prefix}google",
			'desc'  => __( 'Url your google+`s account', 'rwmb' ),
			'type'  => 'url',
			'std'   => '',
		),
                array(
			'name'  => __( 'Linkedin', 'rwmb' ),
			'id'    => "{$prefix}linkedin",
			'desc'  => __( 'Url your linkedin`s account', 'rwmb' ),
			'type'  => 'url',
			'std'   => '',
		),
                array(
			'name'  => __( 'Vk', 'rwmb' ),
			'id'    => "{$prefix}vk",
			'desc'  => __( 'Url your vk`s account', 'rwmb' ),
			'type'  => 'url',
			'std'   => '',
		),
                array(
			'name'  => __( 'Tumblr', 'rwmb' ),
			'id'    => "{$prefix}tumblr",
			'desc'  => __( 'Url your tumblr`s account', 'rwmb' ),
			'type'  => 'url',
			'std'   => '',
		),               
                array(
			// Field name - Will be used as label
			'name'  => __( 'Skype', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}skype",
			// Field description (optional)
			'desc'  => __( 'Your Skype', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
                              
	)
);
                        
                        
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'standard',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Additional fields', 'rwmb' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array('post'),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(
               array(
			'name' => __( 'Short text', 'rwmb' ),
			'desc' => __( 'Short description', 'rwmb' ),
			'id'   => "{$prefix}short_text",
			'type' => 'textarea',
			'cols' => 20,
			'rows' => 6,
		),    
		// THICKBOX IMAGE UPLOAD (WP 3.3+)
		array(
			'name' => __( 'Select photo for flex slider <br/> <b>recommended size 850x350 px</b>', 'rwmb' ),
			'id'   => "{$prefix}flex_slider",
			'type'             => 'image_advanced',
			'max_file_uploads' => 4,
		),
                                
	)
);

// 2nd meta box
$meta_boxes[] = array(
	'title' => __( 'Advanced Fields', 'rwmb' ),
        'pages' => array('rc_slides'),

	'fields' => array(
                array(
			// Field name - Will be used as label
			'name'  => __( 'Text block one', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}text_block_one",
			// Field description (optional)
			'desc'  => __( 'Text block one', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( 'Default text value', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
                array(
			// Field name - Will be used as label
			'name'  => __( 'Text block two', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}text_block_two",
			// Field description (optional)
			'desc'  => __( 'Text block two', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( 'Default text value', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
                array(
			// Field name - Will be used as label
			'name'  => __( 'Text button', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}text_button",
			// Field description (optional)
			'desc'  => __( 'Text on button', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( 'Get Started Now!', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),
		array(
			'name'  => __( 'URL', 'rwmb' ),
			'id'    => "{$prefix}url_link",
			'desc'  => __( 'URL link description', 'rwmb' ),
			'type'  => 'url',
			'std'   => '#',
		),

	)
);
 
$meta_boxes[] = array(
	'title' => __( 'Advanced Fields', 'rwmb' ),
        'pages' => array('rc_clients'),

	'fields' => array(
                array(
			// Field name - Will be used as label
			'name'  => __( 'Link', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}link_clients",
			// Field description (optional)
			'desc'  => __( 'Link on site', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => false,
		),

	)
);                       
                        
$meta_boxes[] = array(
	'title' => __( 'Advanced Fields', 'rwmb' ),
        'pages' => array('rc_portfolio'),

	'fields' => array(
               array(
			'name' => __( 'Short text', 'rwmb' ),
			'desc' => __( 'Short description', 'rwmb' ),
			'id'   => "{$prefix}short_description_portfolio",
			'type' => 'textarea',
			'cols' => 20,
			'rows' => 6,
		), 

	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );
