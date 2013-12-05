<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
    <?php
    if(of_get_option('logo')){
        echo "<link href='".of_get_option('favicon')."' rel='shortcut icon' type='image/x-icon'>";
    }
    ?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
    <?php
	wp_head();
    ?>
</head>

<?php
if(of_get_option('room-cartoons-background-theme')){
    $r_c_bg_body_array = of_get_option('room-cartoons-background-theme');
    $style_body = 'background-color:'.$r_c_bg_body_array['color'].';'.'background-image: url('.$r_c_bg_body_array['image'].');'.'background-position:'.$r_c_bg_body_array['position'].';'.'background-repeat:'.$r_c_bg_body_array['repeat'].';'.'background-attachment:'.$r_c_bg_body_array['attachment'].';';
} else {
    $style_body = "";
}

if(of_get_option('typography-block-theme')){
    $r_c_typography_theme = of_get_option('typography-block-theme');
    $style_typography_body = 'font-size:'.$r_c_typography_theme['size'].';'.'font-family:'.$r_c_typography_theme['face'].';'.'font-style:'.$r_c_typography_theme['style'].';'.'color:'.$r_c_typography_theme['color'].';';
} else {
    $style_typography_body = "";
} 
?>

<body <?php echo "style='".$style_body.$style_typography_body."'"; ?> <?php body_class(); ?>>
<?php
if(of_get_option('type_box')){
    if(of_get_option('type_box') != 'wide'){
        $style_typography_body = "style='width:1280px;margin:0px auto;'";
    } else {
        $style_typography_body = "";
    }
    
} else {
    $style_typography_body = "";
} 
?>
<div <?php echo $style_typography_body; ?> id="box" class="section">
		<header id="main_header" role="banner">
                    <div class="container">
                        <div class="col-lg-2 navbar-brand">
                            <?php
                            if(of_get_option('logo')){
                                $r_c_logo = "<img class='img-responsive' src='".of_get_option('logo')."' />";
                            } else {
                                $r_c_logo = "<img class='img-responsive' src='".get_template_directory_uri()."/images/LogoYourCompany.png' />";
                            }
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <?php echo $r_c_logo; ?>
                            </a>
                        </div>
                        <nav class="col-lg-9" role="navigation">
                            <?php
                            if(is_home()){
                                wp_nav_menu( array( 'theme_location' => 'scroll-main-menu', 'menu_class' => 'top-menu pull-left rc-scroll-menu' ) );
                            } else {
                                wp_nav_menu( array( 'theme_location' => 'inner-page-menu', 'menu_class' => 'top-menu pull-left' ) );
                            } 
                            ?>
                             
                            <?php get_search_form(); ?>
                        </nav>
                        <div class="col-lg-1">
                        </div>
                        
                        <span id="btnMenu768" ><i class="icon-list"></i></span>
                        <div id="btnSearch"><i class="icon-search icon-3x"></i></div>
                        
		</header>
