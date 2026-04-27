<?php
/**
* Global Color Settings.
*
* @package Online clothing store
*/

$online_clothing_store_default = online_clothing_store_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'online_clothing_store_global_secondary_color_setting',
	array(
	'title'      => esc_html__( 'Global Color Settings', 'online-clothing-store' ),
	'priority'   => 1,
	'capability' => 'edit_theme_options',
	'panel'      => 'online_clothing_store_theme_option_panel',
	)
);

$wp_customize->add_setting( 'online_clothing_store_global_color',
    array(
    'default'           => '#384143 ',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'online_clothing_store_global_color',
    array(
        'label'      => esc_html__( 'Global Color', 'online-clothing-store' ),
        'section'    => 'online_clothing_store_global_color_setting',
        'settings'   => 'online_clothing_store_global_color',
    ) ) 
);

$wp_customize->add_setting( 'online_clothing_store_global_secondary_color',
    array(
    'default'           => '#384143',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'online_clothing_store_global_secondary_color',
    array(
        'label'      => esc_html__( 'Secondary Color', 'online-clothing-store' ),
        'section'    => 'online_clothing_store_global_color_setting',
        'settings'   => 'online_clothing_store_global_secondary_color',
    ) ) 
);