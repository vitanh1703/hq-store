<?php
/**
* Layouts Settings.
*
* @package Online clothing store
*/

$online_clothing_store_default = online_clothing_store_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'online_clothing_store_layout_setting',
	array(
	'title'      => esc_html__( 'Sidebar Settings', 'online-clothing-store' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'online_clothing_store_theme_option_panel',
	)
);

$wp_customize->add_setting( 'online_clothing_store_global_sidebar_layout',
    array(
    'default'           => $online_clothing_store_default['online_clothing_store_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'online_clothing_store_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'online_clothing_store_global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'online-clothing-store' ),
    'section'     => 'online_clothing_store_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'online-clothing-store' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'online-clothing-store' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'online-clothing-store' ),
        ),
    )
);

$wp_customize->add_setting('online_clothing_store_page_sidebar_layout', array(
    'default'           => $online_clothing_store_default['online_clothing_store_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'online_clothing_store_sanitize_sidebar_option',
));

$wp_customize->add_control('online_clothing_store_page_sidebar_layout', array(
    'label'       => esc_html__('Single Page Sidebar Layout', 'online-clothing-store'),
    'section'     => 'online_clothing_store_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'online-clothing-store'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'online-clothing-store'),
        'no-sidebar'    => esc_html__('No Sidebar', 'online-clothing-store'),
    ),
));

$wp_customize->add_setting('online_clothing_store_post_sidebar_layout', array(
    'default'           => $online_clothing_store_default['online_clothing_store_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'online_clothing_store_sanitize_sidebar_option',
));

$wp_customize->add_control('online_clothing_store_post_sidebar_layout', array(
    'label'       => esc_html__('Single Post Sidebar Layout', 'online-clothing-store'),
    'section'     => 'online_clothing_store_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'online-clothing-store'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'online-clothing-store'),
        'no-sidebar'    => esc_html__('No Sidebar', 'online-clothing-store'),
    ),
));

$wp_customize->add_setting('online_clothing_store_sticky_sidebar',
    array(
        'default'           => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_sticky_sidebar',
    array(
        'label' => esc_html__('Enable/Disable Sticky Sidebar', 'online-clothing-store'),
        'section' => 'online_clothing_store_layout_setting',
        'type' => 'checkbox',
    )
);