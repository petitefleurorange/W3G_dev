<?php
define('WPML_XLIFF_FOLDER', basename(WPML_XLIFF_PATH));


if(defined('WP_ADMIN') && defined('FORCE_SSL_ADMIN') && FORCE_SSL_ADMIN){
    define('WPML_XLIFF_URL', rtrim(str_replace('http://','https://', WP_PLUGIN_URL), '/') . '/' . WPML_XLIFF_FOLDER );
}else{
    define('WPML_XLIFF_URL', WP_PLUGIN_URL . '/' . WPML_XLIFF_FOLDER );
}