<?php
/**
* Posts Settings.
*
* @package Online clothing store
*/

$online_clothing_store_default = online_clothing_store_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'online_clothing_store_single_posts_settings',
    array(
    'title'      => esc_html__( 'Single Meta Information Settings', 'online-clothing-store' ),
    'priority'   => 35,
    'capability' => 'edit_theme_options',
    'panel'      => 'online_clothing_store_theme_option_panel',
    )
);

$wp_customize->add_setting('online_clothing_store_display_single_post_image',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_display_single_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_display_single_post_image',
    array(
        'label' => esc_html__('Enable Single Posts Image', 'online-clothing-store'),
        'section' => 'online_clothing_store_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('online_clothing_store_post_author',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'online-clothing-store'),
        'section' => 'online_clothing_store_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('online_clothing_store_post_date',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'online-clothing-store'),
        'section' => 'online_clothing_store_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('online_clothing_store_post_category',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'online-clothing-store'),
        'section' => 'online_clothing_store_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('online_clothing_store_post_tags',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'online-clothing-store'),
        'section' => 'online_clothing_store_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'online_clothing_store_single_page_content_alignment',
    array(
    'default'           => $online_clothing_store_default['online_clothing_store_single_page_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'online_clothing_store_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'online_clothing_store_single_page_content_alignment',
    array(
    'label'       => esc_html__( 'Single Page Content Alignment', 'online-clothing-store' ),
    'section'     => 'online_clothing_store_single_posts_settings',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'online-clothing-store' ),
        'center'  => esc_html__( 'Center', 'online-clothing-store' ),
        'right'    => esc_html__( 'Right', 'online-clothing-store' ),
        ),
    )
);

$wp_customize->add_setting( 'online_clothing_store_single_post_content_alignment',
    array(
    'default'           => $online_clothing_store_default['online_clothing_store_single_post_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'online_clothing_store_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'online_clothing_store_single_post_content_alignment',
    array(
    'label'       => esc_html__( 'Single Post Content Alignment', 'online-clothing-store' ),
    'section'     => 'online_clothing_store_single_posts_settings',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'online-clothing-store' ),
        'center'  => esc_html__( 'Center', 'online-clothing-store' ),
        'right'    => esc_html__( 'Right', 'online-clothing-store' ),
        ),
    )
);

// Archive Post Section.
$wp_customize->add_section( 'online_clothing_store_posts_settings',
    array(
    'title'      => esc_html__( 'Archive Meta Information Settings', 'online-clothing-store' ),
    'priority'   => 36,
    'capability' => 'edit_theme_options',
    'panel'      => 'online_clothing_store_theme_option_panel',
    )
);

$wp_customize->add_setting('online_clothing_store_display_archive_post_format_icon',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_display_archive_post_format_icon'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_display_archive_post_format_icon',
    array(
        'label' => esc_html__('Enable Posts Format Icon', 'online-clothing-store'),
        'section' => 'online_clothing_store_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('online_clothing_store_display_archive_post_image',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_display_archive_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_display_archive_post_image',
    array(
        'label' => esc_html__('Enable Posts Image', 'online-clothing-store'),
        'section' => 'online_clothing_store_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('online_clothing_store_display_archive_post_category',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_display_archive_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_display_archive_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'online-clothing-store'),
        'section' => 'online_clothing_store_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('online_clothing_store_display_archive_post_title',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_display_archive_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_display_archive_post_title',
    array(
        'label' => esc_html__('Enable Posts Title', 'online-clothing-store'),
        'section' => 'online_clothing_store_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('online_clothing_store_display_archive_post_content',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_display_archive_post_content'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_display_archive_post_content',
    array(
        'label' => esc_html__('Enable Posts Content', 'online-clothing-store'),
        'section' => 'online_clothing_store_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('online_clothing_store_display_archive_post_button',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_display_archive_post_button'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_display_archive_post_button',
    array(
        'label' => esc_html__('Enable Posts Button', 'online-clothing-store'),
        'section' => 'online_clothing_store_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('online_clothing_store_excerpt_limit',
    array(
        'default'           => $online_clothing_store_default['online_clothing_store_excerpt_limit'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_number_range',
    )
);
$wp_customize->add_control('online_clothing_store_excerpt_limit',
    array(
        'label'       => esc_html__('Blog Posts Excerpt limit', 'online-clothing-store'),
        'section'     => 'online_clothing_store_posts_settings',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 100,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'online_clothing_store_archive_image_size',
	array(
	'default'           => 'medium',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'online_clothing_store_sanitize_select',
	)
);
$wp_customize->add_control( 'online_clothing_store_archive_image_size',
	array(
	'label'       => esc_html__( 'Blog Posts Image Size', 'online-clothing-store' ),
	'section'     => 'online_clothing_store_posts_settings',
	'type'        => 'select',
	'choices'               => array(
		'full' => esc_html__( 'Large Size Image', 'online-clothing-store' ),
		'large' => esc_html__( 'Big Size Image', 'online-clothing-store' ),
		'medium' => esc_html__( 'Medium Size Image', 'online-clothing-store' ),
		'small' => esc_html__( 'Small Size Image', 'online-clothing-store' ),
		'xsmall' => esc_html__( 'Extra Small Size Image', 'online-clothing-store' ),
		'thumbnail' => esc_html__( 'Thumbnail Size Image', 'online-clothing-store' ),
	    ),
	)
);

$wp_customize->add_setting('online_clothing_store_posts_per_columns',
    array(
    'default'           => '3',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'online_clothing_store_sanitize_number_range',
    )
);
$wp_customize->add_control('online_clothing_store_posts_per_columns',
    array(
    'label'       => esc_html__('Blog Posts Per Column', 'online-clothing-store'),
    'section'     => 'online_clothing_store_posts_settings',
    'type'        => 'number',
    'input_attrs' => array(
    'min'   => 1,
    'max'   => 5,
    'step'   => 1,
    ),
    )
);