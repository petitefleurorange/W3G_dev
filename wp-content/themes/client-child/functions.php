<?php

if ( ! isset( $content_width ) )
	$content_width = 1170;



/**
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Thirteen supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_setup() {
	/*
	 * Makes Twenty Thirteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'twentythirteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentythirteen', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', twentythirteen_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
        /*
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );
         * */

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'twentythirteen_setup' );

/**
 * Returns the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentythirteen_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'twentythirteen' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$bitter = _x( 'on', 'Bitter font: on or off', 'twentythirteen' );

	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueues scripts and styles for front end.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_scripts_styles() {
	// Adds JavaScript to pages with the comment form to support sites with
	// threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Loads JavaScript file with functionality specific to Twenty Thirteen.
	wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-07-18', true );

	// Loads our main stylesheet.
	wp_enqueue_style( 'room-cartoons-styles-css', get_stylesheet_uri(), array(), '2013-07-18' );

	if(!is_admin()){

		if(is_home() or is_page()){

        	wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/js/bxslider.js','','',true);
            wp_enqueue_script( 'camera-js', get_template_directory_uri() . '/js/camera.min.js','','',true);
            wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js','','',true);
            
            wp_enqueue_style( 'camera-css', get_template_directory_uri() . '/css/camera.css');
            wp_enqueue_style( 'bxslider-css', get_template_directory_uri() . '/css/bxslider.css');
        }
        
        if(!is_home()){

            wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js','','',true); 
        }
        
        wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js','','',true);
        wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js','','',true); 
        wp_enqueue_script( 'scroll-to', get_template_directory_uri() . '/js/jquery.scrollTo-min.js','','',true);      
        wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox.js','','',true);
        wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/flexslider.js','','',true);
        wp_enqueue_script( 'google-key', 'http://maps.googleapis.com/maps/api/js?key=AIzaSyCbjjND7JKRV3-ayXjbDRWEas26glYFcys&sensor=true','','',true);
        wp_enqueue_script( 'ajax-room-cartoons', get_template_directory_uri() . '/js/ajax.js','','',true);
        wp_enqueue_script( 'general-js', get_template_directory_uri() . '/js/room-cartoons-main-script.js','','',true);  
        
        wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style( 'bootstrap-theme-css', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
        wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . '/css/flexslider.css');
        wp_enqueue_style( 'fancybox-css', get_template_directory_uri() . '/css/fancybox.css'); 

        $data = array(     
	    	'url' => get_site_url().'/wp-admin/admin-ajax.php'
		); 

		wp_localize_script( 'ajax-room-cartoons', 'room_cartoons_url_ajax', $data ); 
	}

}
add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );

/**
 * Registers two widget areas.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */

if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<span class="clearfix"></span>
	<nav class="navigation paging-navigation" role="navigation">
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav"><i class="icon-chevron-left"></i></span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav"><i class="icon-chevron-right"></i></span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_post_nav' ) ) :
/**
 * Displays navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*
* @return void
*/
function twentythirteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentythirteen_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_entry_meta() {
        echo "<ul class='blog_info'>";
        $category = get_the_category();
	// Post author
	if ( 'post' == get_post_type() ) {
                echo "<li><i class='icon-user'></i>".get_the_author()."</li>";
	}
        echo "<li><i class='icon-comments'></i>".get_comments_number()."  Comments</li>";
        echo "<li><i class='icon-time'></i>Create: ".get_the_date()."</li>";
        echo "<li><i class='icon-th'></i>".$category[0]->name."</li>";
        
        echo '</ul>';
}
endif;

if ( ! function_exists( 'twentythirteen_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own twentythirteen_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
    

function twentythirteen_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns the URL from the post.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string The Link format URL.
 */
function twentythirteen_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Extends the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentythirteen_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'twentythirteen_body_class' );

/**
 * Adjusts content_width value for video post formats and attachment templates.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'twentythirteen_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function twentythirteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentythirteen_customize_register' );

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_customize_preview_js() {
	wp_enqueue_script( 'twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );

/* Room Cartoons */
include_once('include/meta-box.php');
add_action('init', 'pyre_init');
function pyre_init() {
    
    
    
        register_post_type(
		'rc_command',
		array(
			'labels' => array(
				'name' => 'Command',
				'singular_name' => 'Command'
			),
			'public' => false,
			'has_archive' => false,
          		'show_ui' => true, 
                        'show_in_menu' => true, 
			'rewrite' => array( 'slug' => 'command', 'with_front' => false, 'feeds' => false, 'pages' => false ),
			'supports' => array('title', 'thumbnail'),
			'can_export' => true,
          		'has_archive' => false, 
                        'hierarchical' => false
		)
	);
        
        register_post_type(
		'rc_clients',
		array(
			'labels' => array(
				'name' => 'Clients',
				'singular_name' => 'Clients'
			),
			'public' => false,
			'has_archive' => false,
          		'show_ui' => true, 
                        'show_in_menu' => true, 
			'rewrite' => array( 'slug' => 'clients', 'with_front' => false, 'feeds' => false, 'pages' => false ),
			'supports' => array('title', 'thumbnail'),
			'can_export' => true,
          		'has_archive' => false, 
                        'hierarchical' => false
		)
	);
        
    	register_post_type(
		'rc_slides',
		array(
			'labels' => array(
				'name' => 'Slides',
				'singular_name' => 'Slides'
			),
			'public' => false,
			'has_archive' => false,
          		'show_ui' => true, 
                        'show_in_menu' => true, 
			'rewrite' => array( 'slug' => 'slider', 'with_front' => false, 'feeds' => false, 'pages' => false ),
			'supports' => array('title', 'thumbnail'),
			'can_export' => true,
          		'has_archive' => false, 
                        'hierarchical' => false
		)
	);
                
	register_post_type(
		'rc_portfolio',
		array(
			'labels' => array(
				'name' => 'Portfolio',
				'singular_name' => 'Portfolio'
			),
			'public' => false,
			'show_ui' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'portfolio','with_front' => false, 'feeds' => false, 'pages' => false),
			'supports' => array('title', 'editor', 'thumbnail'),
			'can_export' => true,
		)
	);

	register_taxonomy('portfolio_category', 'rc_portfolio', array('hierarchical' => false, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true));
}

// Auto plugin activation
require_once('framework/class-tgm-plugin-activation.php');
add_action('tgmpa_register', 'avada_register_required_plugins');
function avada_register_required_plugins() {
	$plugins = array(
		array(
			'name'     				=> 'Font Awesome', // The plugin name
			'slug'     				=> 'font-awesome', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/framework/plugins/font-awesome.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
        array(
			'name'     				=> 'Meta box', // The plugin name
			'slug'     				=> 'meta-box', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/framework/plugins/meta-box.4.3.3.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
        array(
			'name'     				=> 'WP importer & exporter', // The plugin name
			'slug'     				=> 'wordpress-importer', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/framework/plugins/wordpress-importer.0.6.1.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
        array(
			'name'     				=> 'Widget importer & exporter', // The plugin name
			'slug'     				=> 'widget-settings-importexport', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/framework/plugins/widget-settings-importexport.1.2.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
        array(
			'name'     				=> 'Option Framework ', // The plugin name
			'slug'     				=> 'options-framework', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/framework/plugins/options-framework.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		)
	);


	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'Client -Base-';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', 'default' ),
			'menu_title'                       			=> __( 'Install Plugins', 'default' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'default' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'default' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'default' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'default' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'default' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa($plugins, $config);
}

register_nav_menus(
    array(
        "scroll-main-menu"=>"Main scroll menu on main page",
        "inner-page-menu"=>"Menu on inner page"
    )
);


function twentythirteen_widgets_init() {
        
        register_sidebar( array(
		'name'          => __( 'Block About Full Width', 'room-cartoons-full-width' ),
		'id'            => 'about-room-cartoons-full-width',
		'description'   => __( 'Block About Full Width', 'room-cartoons-full-width' ),
		'before_widget' => '<div class="col-lg-12 margin">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="room-cartoons-about-widget-title">',
		'after_title'   => '</h3>',
	) );

        register_sidebar( array(
		'name'          => __( 'Block About Two Column', 'room-cartoons-two-column' ),
		'id'            => 'about-room-cartoons-two-column',
		'description'   => __( 'Block About Two Column', 'room-cartoons-two-column' ),
		'before_widget' => '<div class="col-lg-6 col-md-6 col-sm-12 margin">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="room-cartoons-about-widget-title">',
		'after_title'   => '</h3>',
	) );
        
        register_sidebar( array(
		'name'          => __( 'Sidebar', 'room-cartoons-sidebar' ),
		'id'            => 'room-cartoons-sidebar',
		'description'   => __( 'Sidebar Room Cartooms', 'room-cartoons-sidebar' ),
		'before_widget' => '<div class="col-lg-12 padding">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="room-cartoons-sidebar-widget-title">',
		'after_title'   => '</h3>',
	) );
        
        register_sidebar( array(
		'name'          => __( 'Block Bottom Two Column', 'room-cartoons-bottom' ),
		'id'            => 'bottom-room-cartoons',
		'description'   => __( 'Block Bottom Two Column', 'room-cartoons-bottom' ),
		'before_widget' => '<div class="col-lg-6 col-sm-12 margin ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="room-cartoons-bottom-widget-title">',
		'after_title'   => '</h3>',
	) );
        
        register_sidebar( array(
		'name'          => __( 'Footer Full Width', 'room-cartoons-footer-top' ),
		'id'            => 'footer-full-width-room-cartoons',
		'description'   => __( 'Footer Full Width', 'room-cartoons-footer-top' ),
		'before_widget' => '<div class="col-lg-4 col-sm-12 margin">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="room-cartoons-footer-widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );




function validate($data){
    $name = trim($data['name']);
    $email = trim($data['email']);
    $message = trim($data['message']);
    $error = $json_answer = array();
    $html = '';
    
    if(strlen($name) == ''){
        $error[] = "<p><i class='icon-edit'></i> Field for name not filled.</p>";
    }
    
    if(strlen($message) == ''){
        $error[] = "<p><i class='icon-edit'></i> Textarea for message not filled.</p>";
    }
    
    if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $email)){
        $error[] = "<p><i class='icon-edit'></i> Adress e-mail  not  validated.</p>";
    }
    
    if(count($error) > 0){
        for($i = 0; $i < count($error); $i++){
            $html .= "<p>{$error[$i]}</p>";
        }
        $json_answer['html'] = wrap_error_message($html);
        $json_answer['status'] = false;
        header('Content-type: application/json');
        die(json_encode($json_answer));
        return false;
    }
    
    if(send($name,$email,$message)){
      $json_answer['html'] = template_successful_sent();
      $json_answer['status'] = true;
      header('Content-type: application/json');
      die(json_encode($json_answer));
    } else {
        $json_answer['html'] = wrap_error_message('<p>Message do not sent, please try again.</p>');
        $json_answer['status'] = false;
        header('Content-type: application/json');
        die(json_encode($json_answer));
        return false;
    }
    
}

function send($name,$email,$text){
  $headers[] = 'Content-type: text/html; charset=utf-8';
  return wp_mail( get_option('admin_email'), 'Message with your the site', template_message_admin($name,$email,$text), $headers);
}

function template_message_admin($name,$email,$message){
    $url = get_site_url();
    return <<<EOF
    Hello! This message with site <a href='{$url}'>{$url}</a><br />
    Name: {$name}<br />
    E-mail: {$email}<br />
    Text: {$message}
EOF;
}

function template_successful_sent(){
	$header = "Wow it's working";
return <<<EOF
        <i id="envelope" class="icon-envelope"></i>
        <div id="successfull_message">
            <h3>{$header}</h3>
        </div>
EOF;
}

function wrap_error_message($html){
return <<<EOF
        <div class="error-message">
            {$html}
        </div>     
EOF;
}


function ajax_message(){
	validate($_POST);
}
add_action('wp_ajax_message', 'ajax_message');
add_action('wp_ajax_nopriv_message', 'ajax_message');

function ajax_request(){
   $portfolio = get_post($_REQUEST['id']);
   echo do_shortcode($portfolio->post_content);
   die();
}

add_action('wp_ajax_portfolio', 'ajax_request');
add_action('wp_ajax_nopriv_portfolio', 'ajax_request');

$bg_defaults = array(  
    'default-color' => '#fff',  
    'default-image' => get_template_directory_uri().'/images/BackgroundBody.png'
);
add_theme_support('custom-background', $bg_defaults);

include_once('widgets/widgets.php');
/* End Room Cartoons */


/* 
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {

	$optionsframework_settings = get_option('optionsframework');

	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];

	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}

	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}

function new_excerpt_more($more) {  
    return ' ...';  
}  
add_filter('excerpt_more', 'new_excerpt_more');  

/* Shortcode Room Cartoons */
function shortcode_slider($attr, $text=''){
	$html = "<div class='flexslider'><ul class='slides'>".do_shortcode($text)."</ul></div>";
	$html .= "<script>
		jQuery('.flexslider').flexslider({
            animation: 'slide',
            controlNav: false,  
            slideshow: false,
            controlsContainer: jQuery('.flexslider') 
        });
	</script>";
	return $html;
}
function shortcode_slider_image($attr, $text=''){
	return "<li><img src='".$attr['src']."' />".$text."</li>";
}
add_shortcode('slider-room-cartoons', 'shortcode_slider');
add_shortcode('slider-img', 'shortcode_slider_image');