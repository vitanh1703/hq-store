<?php

	require get_template_directory() . '/inc/homepage-setup/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function online_clothing_store_register_recommended_plugins() {
	$plugins = array(	
		array(
			'name'             => __( 'Elementor', 'online-clothing-store' ),
			'slug'             => 'elementor',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce', 'online-clothing-store' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Easy Demo Import for Omega Themes', 'online-clothing-store' ),
			'slug'             => 'easy-demo-import-for-omega-themes',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'ShopLentor ', 'online-clothing-store' ),
			'slug'             => 'woolentor-addons',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Google Language Translator', 'online-clothing-store' ),
			'slug'             => 'google-language-translator',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Royal Elementor Addons', 'online-clothing-store' ),
			'slug'             => 'royal-elementor-addons',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'FOX - Currency Switcher Professional for WooCommerce', 'online-clothing-store' ),
			'slug'             => 'woocommerce-currency-switcher',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'online_clothing_store_register_recommended_plugins' );