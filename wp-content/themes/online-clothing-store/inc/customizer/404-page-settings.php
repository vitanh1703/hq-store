<?php
/**
* 404 Page Settings.
*
* @package Online clothing store
*/

$online_clothing_store_default = online_clothing_store_get_default_theme_options();

$wp_customize->add_section( 'online_clothing_store_404_page_settings',
    array(
        'title'      => esc_html__( '404 Page Settings', 'online-clothing-store' ),
        'priority'   => 200,
        'capability' => 'edit_theme_options',
        'panel'      => 'online_clothing_store_theme_addons_panel',
    )
);

$wp_customize->add_setting( 'online_clothing_store_404_main_title',
    array(
        'default'           => $online_clothing_store_default['online_clothing_store_404_main_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'online_clothing_store_404_main_title',
    array(
        'label'    => esc_html__( '404 Main Title', 'online-clothing-store' ),
        'section'  => 'online_clothing_store_404_page_settings',
        'type'     => 'text',
    )
);

$wp_customize->add_setting( 'online_clothing_store_404_subtitle_one',
    array(
        'default'           => $online_clothing_store_default['online_clothing_store_404_subtitle_one'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'online_clothing_store_404_subtitle_one',
    array(
        'label'    => esc_html__( '404 Sub Title One', 'online-clothing-store' ),
        'section'  => 'online_clothing_store_404_page_settings',
        'type'     => 'text',
    )
);

$wp_customize->add_setting( 'online_clothing_store_404_para_one',
    array(
        'default'           => $online_clothing_store_default['online_clothing_store_404_para_one'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'online_clothing_store_404_para_one',
    array(
        'label'    => esc_html__( '404 Para Text One', 'online-clothing-store' ),
        'section'  => 'online_clothing_store_404_page_settings',
        'type'     => 'text',
    )
);

$wp_customize->add_setting( 'online_clothing_store_404_subtitle_two',
    array(
        'default'           => $online_clothing_store_default['online_clothing_store_404_subtitle_two'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'online_clothing_store_404_subtitle_two',
    array(
        'label'    => esc_html__( '404 Sub Title Two', 'online-clothing-store' ),
        'section'  => 'online_clothing_store_404_page_settings',
        'type'     => 'text',
    )
);

$wp_customize->add_setting( 'online_clothing_store_404_para_two',
    array(
        'default'           => $online_clothing_store_default['online_clothing_store_404_para_two'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'online_clothing_store_404_para_two',
    array(
        'label'    => esc_html__( '404 Para Text Two', 'online-clothing-store' ),
        'section'  => 'online_clothing_store_404_page_settings',
        'type'     => 'text',
    )
);