<?php
/**
* Header Options.
*
* @package Online clothing store
*/

$online_clothing_store_default = online_clothing_store_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'online_clothing_store_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'online-clothing-store' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'online_clothing_store_theme_option_panel',
	)
);

$wp_customize->add_setting( 'online_clothing_store_header_layout_email_address',
    array(
    'default'           => $online_clothing_store_default['online_clothing_store_header_layout_email_address'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'online_clothing_store_header_layout_email_address',
    array(
    'label'    => esc_html__( 'Email Id', 'online-clothing-store' ),
    'section'  => 'online_clothing_store_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'online_clothing_store_header_layout_topbar_text',
    array(
    'default'           => $online_clothing_store_default['online_clothing_store_header_layout_topbar_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'online_clothing_store_header_layout_topbar_text',
    array(
    'label'    => esc_html__( 'Topbar Text', 'online-clothing-store' ),
    'section'  => 'online_clothing_store_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('online_clothing_store_header_search',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_header_search'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_header_search',
    array(
        'label' => esc_html__('Enable Search', 'online-clothing-store'),
        'section' => 'online_clothing_store_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('online_clothing_store_sticky',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_sticky'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_sticky',
    array(
        'label' => esc_html__('Enable Sticky Header', 'online-clothing-store'),
        'section' => 'online_clothing_store_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('online_clothing_store_menu_font_size',
    array(
        'default'           => $online_clothing_store_default['online_clothing_store_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_number_range',
    )
);
$wp_customize->add_control('online_clothing_store_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'online-clothing-store'),
        'section'     => 'online_clothing_store_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'online_clothing_store_menu_text_transform',
    array(
    'default'           => $online_clothing_store_default['online_clothing_store_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'online_clothing_store_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'online_clothing_store_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'online-clothing-store' ),
    'section'     => 'online_clothing_store_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'online-clothing-store' ),
        'uppercase'  => esc_html__( 'Uppercase', 'online-clothing-store' ),
        'lowercase'    => esc_html__( 'Lowercase', 'online-clothing-store' ),
        ),
    )
);

$wp_customize->add_setting('online_clothing_store_header_menus_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_clothing_store_header_menus_color', array(
    'label'    => __('Main Menu Color', 'online-clothing-store'),
    'section'  => 'online_clothing_store_button_header_setting',
)));

$wp_customize->add_setting('online_clothing_store_header_menus_hover_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_clothing_store_header_menus_hover_color', array(
    'label'    => __('Main Menu Hover Color', 'online-clothing-store'),
    'section'  => 'online_clothing_store_button_header_setting',
)));

$wp_customize->add_setting('online_clothing_store_header_submenus_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_clothing_store_header_submenus_color', array(
    'label'    => __('Submenu Color', 'online-clothing-store'),
    'section'  => 'online_clothing_store_button_header_setting',
)));

$wp_customize->add_setting('online_clothing_store_header_submenus_hover_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_clothing_store_header_submenus_hover_color', array(
    'label'    => __('Submenu Hover Color', 'online-clothing-store'),
    'section'  => 'online_clothing_store_button_header_setting',
)));