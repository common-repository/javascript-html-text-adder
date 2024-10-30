<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Admin Pages Class
 *
 * Handles generic Admin functionailties
 *
 * @package Javascript Html and Text Adder
 * @since 1.0.0
 */
class Javascript_Html_Text_Adder_Admin {	

	public function __construct()	{		
		// constructor code
	}
	
	/**
	 * Includes Javascript and Css files
	 *
	 * @package Javascript Html and Text Adder
	 * @since 1.0.0
	 */
	public function jhta_include_files($hook) {
	
		// when page is widgets.php
		if( $hook == "widgets.php") {
			
			wp_register_script( 'jhta-script', JHTA_PLUGIN_URL . '/includes/js/jhta-widget.js');
			wp_enqueue_script( 'jhta-script' );
			
			wp_register_script( 'jhta-awquicktag', JHTA_PLUGIN_URL . '/includes/js/awQuickTag.js');
			wp_enqueue_script( 'jhta-awquicktag' );
			
			wp_register_style( 'jhta-style', JHTA_PLUGIN_URL . '/includes/css/jhta-widget.css');
			wp_enqueue_style( 'jhta-style' );
			
		}
	}
	
	
	/**
	 * Add code to footer
	 *
	 * @package Javascript Html and Text Adder
	 * @since 1.0.0
	 */
	function jhta_admin_footer(){
		
		global $pagenow, $post;
		
		if( $pagenow == "widgets.php" ){
		
			echo '<span style="display:none" class="jhtaUrl">' . JHTA_PLUGIN_URL . '</span>';
			echo '<div class="jhtaWindow">
				<span class="jhtaOverlayClose"></span>
				<h3 class="jhtaWinHead">Preview</h3>
				<iframe id="jhtaIframe" name="jhtaIframe" src="about:blank"></iframe>
				If the script is not working, try it in <a href="http://jsfiddle.com" target="_blank">jsfiddle</a>
			</div>';
			
		}
	
	}
	
	/**
	 * Adding Hooks
	 *
	 * @package Javascript Html and Text Adder
	 * @since 1.0.0
	 */
	public function add_hooks() {
		
		// add action to enque scripts for backend
		add_action( 'admin_enqueue_scripts', array( $this, 'jhta_include_files' ) ); 
		
		// add action to add js in footer when page is widgets
		add_action( 'admin_footer', array( $this, 'jhta_admin_footer' ) ); 
	}

}
?>