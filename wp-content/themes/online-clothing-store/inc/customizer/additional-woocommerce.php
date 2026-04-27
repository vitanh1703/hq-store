<?php
/**
* Additional Woocommerce Settings.
*
* @package Online clothing store
*/

$online_clothing_store_default = online_clothing_store_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'online_clothing_store_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'online-clothing-store' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'online_clothing_store_theme_option_panel',
	)
);

	$wp_customize->add_setting('online_clothing_store_per_columns',
		array(
		'default'           => $online_clothing_store_default['online_clothing_store_per_columns'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'online_clothing_store_sanitize_number_range',
		)
	);
	$wp_customize->add_control('online_clothing_store_per_columns',
		array(
		'label'       => esc_html__('Products Per Column', 'online-clothing-store'),
		'section'     => 'online_clothing_store_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 6,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('online_clothing_store_product_per_page',
		array(
		'default'           => $online_clothing_store_default['online_clothing_store_product_per_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'online_clothing_store_sanitize_number_range',
		)
	);
	$wp_customize->add_control('online_clothing_store_product_per_page',
		array(
		'label'       => esc_html__('Products Per Page', 'online-clothing-store'),
		'section'     => 'online_clothing_store_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 100,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('online_clothing_store_show_hide_related_product',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_show_hide_related_product'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
	);
	$wp_customize->add_control('online_clothing_store_show_hide_related_product',
	    array(
	        'label' => esc_html__('Enable Related Products', 'online-clothing-store'),
	        'section' => 'online_clothing_store_additional_woocommerce_options',
	        'type' => 'checkbox',
	    )
	);

	$wp_customize->add_setting('online_clothing_store_custom_related_products_number',
		array(
		'default'           => $online_clothing_store_default['online_clothing_store_custom_related_products_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'online_clothing_store_sanitize_number_range',
		)
	);
	$wp_customize->add_control('online_clothing_store_custom_related_products_number',
		array(
		'label'       => esc_html__('Related Products Per Page', 'online-clothing-store'),
		'section'     => 'online_clothing_store_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 10,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('online_clothing_store_custom_related_products_number_per_row',
		array(
		'default'           => $online_clothing_store_default['online_clothing_store_custom_related_products_number_per_row'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'online_clothing_store_sanitize_number_range',
		)
	);
	$wp_customize->add_control('online_clothing_store_custom_related_products_number_per_row',
		array(
		'label'       => esc_html__('Related Products Per Row', 'online-clothing-store'),
		'section'     => 'online_clothing_store_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 5,
		'step'   => 1,
		),
		)
	);