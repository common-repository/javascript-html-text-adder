<?php
/**
 * Plugin Name: 	Javascript Html and Text Adder
 * Description: 	Plugins allow you to add  widget that support Javascripts, HTML, Shortcodes, advertisements code and even simple texts with advanced targeting on posts and pages.
 * Author: 			Kalpesh Prajapati
 * Version: 		1.0.2
 * Author URI:		https://profiles.wordpress.org/kprajapati22/
 * Text Domain:     jhta
 * License: GPLv2
 */

/**
 * Basic plugin definitions 
 * 
 * @package Javascript Html and Text Adder
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


if( !defined( 'JHTA_VERSION' ) ) {
	define( 'JHTA_VERSION', '1.0.2' );	
}
if( !defined( 'JHTA_AUTHOR' ) ) {
	define( 'JHTA_AUTHOR', 'kprajapati22' );	
}
if( !defined( 'JHTA_DIR' ) ) {
	define( 'JHTA_DIR', dirname( __FILE__ ) ); // plugin dir
}
if( !defined( 'JHTA_TEXT_DOMAIN' )) {
	define( 'JHTA_TEXT_DOMAIN', 'jhta' ); // text domain for languages
}
if( !defined( 'JHTA_ADMIN' ) ) {
	define( 'JHTA_ADMIN', JHTA_DIR . '/includes/admin' ); // plugin admin dir
}
if( !defined( 'JHTA_PLUGIN_URL' ) ) {
	define( 'JHTA_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}
if( !defined( 'JHTA_IMG_URL' ) ) {
	define( 'JHTA_IMG_URL', JHTA_PLUGIN_URL . 'includes/images' ); // plugin images url
}
if( !defined( 'JHTA_PLUGIN_BASENAME' ) ) {
	define( 'JHTA_PLUGIN_BASENAME', basename( JHTA_DIR ) ); //Plugin base name
}

/**
 * Load Text Domain
 * 
 * This gets the plugin ready for translation.
 * 
 * @package Javascript Html and Text Adder
 * @since 1.0.0
 */
function jhta_load_text_domain() {
	
	// Set filter for plugin's languages directory
	$jhta_lang_dir	= dirname( plugin_basename( __FILE__ ) ) . '/languages/';
	$jhta_lang_dir	= apply_filters( 'jhta_lang_directory', $jhta_lang_dir );
	
	// Traditional WordPress plugin locale filter
	$locale	= apply_filters( 'plugin_locale',  get_locale(), JHTA_TEXT_DOMAIN );
	$mofile	= sprintf( '%1$s-%2$s.mo', JHTA_TEXT_DOMAIN, $locale );
	
	// Setup paths to current locale file
	$mofile_local	= $jhta_lang_dir . $mofile;
	$mofile_global	= WP_LANG_DIR . '/' . JHTA_PLUGIN_BASENAME . '/' . $mofile;
	
	if ( file_exists( $mofile_global ) ) { // Look in global /wp-content/languages/javascript-html-text-adder folder
		load_textdomain( JHTA_TEXT_DOMAIN, $mofile_global );
	} elseif ( file_exists( $mofile_local ) ) { // Look in local /wp-content/plugins/javascript-html-text-adder/languages/ folder
		load_textdomain( JHTA_TEXT_DOMAIN, $mofile_local );
	} else { // Load the default language files
		load_plugin_textdomain( JHTA_TEXT_DOMAIN, false, $woo_math_captcha_lang_dir );
	}
}
//add action to load text domain
add_action( 'plugins_loaded', 'jhta_load_text_domain' );

/**
 * Initialize all global variables
 * 
 * @package Javascript Html and Text Adder
 * @since 1.0.0
 */
global $jhta_admin;

/**
 * Includes all required files for plugins
 * 
 * @package Javascript Html and Text Adder
 * @since 1.0.0
 */
require_once ( JHTA_ADMIN . '/class-jhta-admin.php');
$jhta_admin = new Javascript_Html_Text_Adder_Admin();
$jhta_admin->add_hooks();

//includes widget file
require_once ( JHTA_DIR . '/includes/widgets/class-jhta-widget.php');

?>