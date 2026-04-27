<?php
/**
* Color Settings.
* @package Online clothing store
*/

$online_clothing_store_default = online_clothing_store_get_default_theme_options();

$wp_customize->add_setting( 'online_clothing_store_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'online_clothing_store_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'online-clothing-store' ),
        'section'    => 'colors',
        'settings'   => 'online_clothing_store_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'online_clothing_store_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'online_clothing_store_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'online-clothing-store' ),
        'section'    => 'colors',
        'settings'   => 'online_clothing_store_border_color',
    ) ) 
);