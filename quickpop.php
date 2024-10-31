<?php

/**
 * Plugin Name: QuickPop
 * Plugin URI: https://mybrindle.com/
 * Description: It’s quick, and it adds a Popup! Need a ton more features? <a href="https://mybrindle.com/product/best-popup-builder-wordpress/"><strong>Try the Pro Version FREE</strong></a>.
 * Version: 1.0
 * Author: Brindle
 * Author URI: 
 */

define( 'MBQP_PLUGIN_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR );
define( 'MBQP_PLUGIN_URL', plugin_dir_url(__FILE__) );

include_once( MBQP_PLUGIN_DIR . 'functions.php' );

# Enqueue JS and CSS assets on the front-end
add_action( 'wp_enqueue_scripts', 'mbqp_wp_enqueue_scripts' );
function mbqp_wp_enqueue_scripts() {

	# Enqueue Custom JS files
	wp_enqueue_script( 'mbqp-functions', plugins_url( 'js/functions.js', __FILE__ ), array( 'jquery' ));
	wp_localize_script( 'mbqp-functions', 'mbqp_options', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));

	# Enqueue Custom CSS files
	# @crb_enqueue_style attributes -- id, location, dependencies, media = all
	wp_enqueue_style( 'mbqp-styles', plugins_url( 'css/style.css', __FILE__ ), array() );
	wp_enqueue_style( 'mbqp-font-styles', 'https://use.typekit.net/eip0gix.css', array() );
}

add_action( 'admin_enqueue_scripts', 'mbqp_enqueue_files_admin' );

function mbqp_enqueue_files_admin() {
	wp_enqueue_script( 'mbqp-admin-js', plugins_url( 'js/utils/admin.js', __FILE__ ), array() );
	wp_enqueue_style( 'mbqp-admin-styles', plugins_url( 'css/utils/admin.css', __FILE__ ), array() );
	wp_enqueue_style( 'mbqp-admin-font-styles', 'https://use.typekit.net/eip0gix.css', array() );
}

/**
 * Register My Brindle Tab.
 */

function mbqp_register_menu_page_brindle() {
	if ( ! isset( $GLOBALS['admin_page_hooks']['my-brindle.php'] ) ) {
		add_menu_page(
			'My Brindle',
			'My Brindle',
			'manage_options',
			'my-brindle.php',
			'',
			plugin_dir_url( __FILE__ ) . 'images/menu-icon.png',
			75
		);
	}
}

add_action( 'admin_menu', 'mbqp_register_menu_page_brindle' );

add_action( 'after_setup_theme', 'mbqp_add_quickpop_options' );
function mbqp_add_quickpop_options() {

	require_once( 'vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();

	add_action( 'carbon_fields_register_fields', 'mbqp_attach_theme_options', 20 );

	add_action( 'admin_menu', 'mbqp_register_custom_submenu_page', 15 );
}

function mbqp_attach_theme_options() {
	# Attach fields
	include_once( MBQP_PLUGIN_DIR . 'options/plugin-options.php' );
	include_once( MBQP_PLUGIN_DIR . 'options/post-types.php' );
}

add_action( 'wp_footer', 'mbqp_popup_html' );