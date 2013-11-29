<?php
/*
Author: W3G digital
URL: http://agence-w3g.com/

http://www.screenfeed.fr/blog/personnaliser-administration-wordpress-0327/

CUSTOM ADMIN CSS
	Éditer le texte dans le footer
	Supprimer le "Update Nag"
	CSS pour le back office
	CSS login
	Changer le logo dans la barre d'administration
	Changer le message d'erreur dans la page de connexion
	Ajouter des liens personnalisés
	Supprimer la barre d'administration
	Supprimer le menu A propos
	Changer l'adresse mail par défaut de wordpress
	Cocher "se souvenir de moi" par défaut

*/

/**************************************************/
/************* CUSTOM ADMIN CSS *******************/
/**************************************************/

/************* Éditer le texte dans le footer de l’admin *****************/

// function remove_footer_admin () {
// echo "Merci d'avoir choisi W3G pour la création de votre site";
// }
// add_filter('admin_footer_text', 'remove_footer_admin');

/************* Supprimer le "Update Nag" pour les non-administrateurs *****************/

// if (!current_user_can('update_plugins')) {
// 	add_action('admin_init', create_function(false,"remove_action('admin_notices', 'update_nag', 3);"));
// }

/**** CSS pour le back office *****/

function admin_css() {
	$admin_handle = 'admin_css';
	$admin_stylesheet = get_stylesheet_directory_uri(). '/library/css/admin.css';
	wp_enqueue_style( $admin_handle, $admin_stylesheet );
}
add_action('admin_print_styles', 'admin_css', 11 );

/**** CSS login *****/

function login_css() {
  echo '<link rel="stylesheet" type="text/css" href="' .get_stylesheet_directory_uri().'/library/css/login.css  '. '">';
}

add_action('login_head', 'login_css');

/**** Changer le logo dans la barre d'administration *****/

add_action('admin_head', 'my_custom_logo');
function my_custom_logo() {
	echo '
	<style type="text/css">
	#wp-admin-bar-wp-logo > .ab-item .ab-icon { background: url('.get_stylesheet_directory_uri().'/library/images/w3g.png) 0 0 !important; }
	</style>
	';
}

/**** Changer le message d'erreur dans la page de connexion en cas mauvais identifiant et/ou mot de passe. *****/

add_action('wp_before_admin_bar_render', 'edit_admin_bar');
add_filter('login_errors',create_function('$a', " return 'Pas si vite! Donnez les bonnes infos! Mouhahah'; "));
// afficher la barre d'administration qu'aux administrateurs
if (!current_user_can('manage_options')) {
	add_filter('show_admin_bar', '__return_false');
}

/**** Ajouter des liens personnalisés dans la barre d'administration *****/

/*function mytheme_admin_bar_render() {
global $wp_admin_bar;
$wp_admin_bar->add_menu( array(
'parent' => 'new-content', // use 'false' for a root menu, or pass the ID of the parent menu
'id' => 'new_media', // link ID, defaults to a sanitized title value
'title' => __('Media'), // link title
'href' => admin_url( 'media-new.php'), // name of file
'meta' => false // array of any of the following options: array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );
));
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );*/


/**** Supprimer la barre d'administration à tous sauf aux administrateurs *****/

// afficher la barre d'administration qu'aux administrateurs
if (!current_user_can('manage_options')) {
	add_filter('show_admin_bar', '__return_false');
}
// afficher la barre d'administration qu'aux administrateurs et aux éditeurs
if (!current_user_can('edit_posts')) {
	add_filter('show_admin_bar', '__return_false');
}

/**** Supprimer le menu A propos dans la barre d’administration wordpress *****/

function edit_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('about'); // A propos de WordPress
	$wp_admin_bar->remove_menu('wporg'); // WordPress.org
	$wp_admin_bar->remove_menu('documentation'); // Documentation
	$wp_admin_bar->remove_menu('support-forums'); // Forum de support
	$wp_admin_bar->remove_menu('feedback'); // Remarque
	$wp_admin_bar->remove_menu('view-site'); // Aller voir le site
}

/**** Changer l'adresse mail par défaut de wordpress (pour les notifications des nouveaux commentaires et articles publiés). *****/

// add_filter('wp_mail_from', 'new_mail_from');
// add_filter('wp_mail_from_name', 'new_mail_from_name');
// function new_mail_from($old) {
// 	return 'monblog@mail.com';
// }
// function new_mail_from_name($old) {
// 	return 'MonBlog';
// }

/**** Cocher "se souvenir de moi" par défaut *****/

// function sf_check_rememberme(){
// 	global $rememberme;
// 	$rememberme = 1;
// }
// add_action("login_form", "sf_check_rememberme");

?>
