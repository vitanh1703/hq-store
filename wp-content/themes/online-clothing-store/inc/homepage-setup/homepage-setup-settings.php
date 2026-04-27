<?php
/**
 * Settings for demo import
 *
 */

/**
 * Define constants
 **/
if ( ! defined( 'WHIZZIE_DIR' ) ) {
	define( 'WHIZZIE_DIR', dirname( __FILE__ ) );
}
require trailingslashit( WHIZZIE_DIR ) . 'homepage-setup-contents.php';
$online_clothing_store_current_theme = wp_get_theme();
$online_clothing_store_theme_title = $online_clothing_store_current_theme->get( 'Name' );


/**
 * Make changes below
 **/

// Change the title and slug of your wizard page
$config['online_clothing_store_page_slug'] 	= 'online-clothing-store';
$config['online_clothing_store_page_title']	= 'Homepage Setup';

$config['steps'] = array(
	'plugins' => array(
		'id'			=> 'plugins',
		'title'			=> __( 'Install and Activate Essential Plugins', 'online-clothing-store' ),
		'icon'			=> 'admin-plugins',
		'button_text'	=> __( 'Install Plugins', 'online-clothing-store' ),
		'can_skip'		=> true
	),
	'widgets' => array(
		'id'			=> 'widgets',
		'title'			=> __( 'Setup Home Page', 'online-clothing-store' ),
		'icon'			=> 'welcome-widgets-menus',
		'button_text'	=> __( 'Start Home Page Setup', 'online-clothing-store' ),
		'button_url'    => esc_url( admin_url( 'themes.php?page=ediot-template-importer' ) ),
		'can_skip'		=> true
	)
);

/**
 * This kicks off the wizard
 **/
if( class_exists( 'Online_clothing_store_Whizzie' ) ) {
	$Online_clothing_store_Whizzie = new Online_clothing_store_Whizzie( $config );
}