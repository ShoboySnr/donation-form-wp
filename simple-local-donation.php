<?php 
/**
 * Plugin Name: Simple Local Donation
 * Plugin URI: https://www.techwithdee.com
 * Description: Receive donation on your website by embedding a simple shortcode on any section of your wordpress pages, posts or widget you want it to show.
 * Version: 1.0.0
 * Author:  Shobowale Damilare Elijah
 * Author URI: https://www.techwithdee.com
 * License: GPL2
 */

if ( !defined( 'WP_CONTENT_URL' ) ) {
	define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
}
if ( !defined( 'WP_CONTENT_DIR' ) ) {
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
}
if ( !defined( 'WP_PLUGIN_URL' ) ) {
	define( 'WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins' );
}
if ( !defined( 'WP_PLUGIN_DIR' ) ) {
	define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
}
if ( !defined( 'SLD_NAME' ) ) {
	define( 'SLD_NAME', 'simple-local-donation' );
}
if ( !defined( 'SLD_PLUGIN_DIR' ) ) {
	define( 'SLD_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . SLD_NAME );
}
if ( !defined( 'SLD_PLUGIN_URL' ) ) {
	define( 'SLD_PLUGIN_URL', WP_PLUGIN_URL . '/' . SLD_NAME );
}
if ( !defined( 'SLD_MAIN_FILE_PATH' ) ) {
	define( 'SLD_MAIN_FILE_PATH', __FILE__ );
}
if ( !defined( 'SLD_DATABASE_TABLE' ) ) {
	define( 'SLD_DATABASE_TABLE', 'simple_local_donation' );
}

require_once(ABSPATH.'/wp-load.php');
include_once(SLD_PLUGIN_DIR . '/actions/fields.php');
include_once(SLD_PLUGIN_DIR . '/actions/assets.php');
include_once(SLD_PLUGIN_DIR . '/actions/shortcode.php');
include_once(SLD_PLUGIN_DIR . '/actions/fileAjax.php');
