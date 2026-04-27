<?php
/**
* Footer Settings.
*
* @package Online clothing store
*/

$online_clothing_store_default = online_clothing_store_get_default_theme_options();

$wp_customize->add_section( 'online_clothing_store_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Settings', 'online-clothing-store' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'online_clothing_store_theme_option_panel',
	)
);

$wp_customize->add_setting('online_clothing_store_display_footer',
    array(
    'default' => $online_clothing_store_default['online_clothing_store_display_footer'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
)
);
$wp_customize->add_control('online_clothing_store_display_footer',
    array(
        'label' => esc_html__('Enable Footer', 'online-clothing-store'),
        'section' => 'online_clothing_store_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'online_clothing_store_footer_column_layout',
	array(
	'default'           => $online_clothing_store_default['online_clothing_store_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'online_clothing_store_sanitize_select',
	)
);
$wp_customize->add_control( 'online_clothing_store_footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'online-clothing-store' ),
	'section'     => 'online_clothing_store_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'online-clothing-store' ),
		'2' => esc_html__( 'Two Column', 'online-clothing-store' ),
		'3' => esc_html__( 'Three Column', 'online-clothing-store' ),
	    ),
	)
);

$wp_customize->add_setting( 'online_clothing_store_footer_widget_title_alignment',
    array(
    'default'           => $online_clothing_store_default['online_clothing_store_footer_widget_title_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'online_clothing_store_sanitize_footer_widget_title_alignment',
    )
);
$wp_customize->add_control( 'online_clothing_store_footer_widget_title_alignment',
    array(
    'label'       => esc_html__( 'Footer Widget Title Alignment', 'online-clothing-store' ),
    'section'     => 'online_clothing_store_footer_widget_area',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'online-clothing-store' ),
        'center'  => esc_html__( 'Center', 'online-clothing-store' ),
        'right'    => esc_html__( 'Right', 'online-clothing-store' ),
        ),
    )
);

$wp_customize->add_setting( 'online_clothing_store_footer_copyright_text',
	array(
	'default'           => $online_clothing_store_default['online_clothing_store_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'online_clothing_store_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'online-clothing-store' ),
	'section'  => 'online_clothing_store_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('online_clothing_store_copyright_font_size',
    array(
        'default'           => $online_clothing_store_default['online_clothing_store_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_number_range',
    )
);
$wp_customize->add_control('online_clothing_store_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'online-clothing-store'),
        'section'     => 'online_clothing_store_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'online_clothing_store_copyright_alignment', array(
    'default'           => 'Default',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'online_clothing_store_sanitize_copyright_alignment_meta',
) );

$wp_customize->add_control( 'online_clothing_store_copyright_alignment', array(
    'label'    => esc_html__( 'Copyright Section Alignment', 'online-clothing-store' ),
    'section'  => 'online_clothing_store_footer_widget_area',
    'type'     => 'select',
    'choices'  => array(
        'Default' => esc_html__( 'Default View', 'online-clothing-store' ),
        'Reverse' => esc_html__( 'Reverse View', 'online-clothing-store' ),
        'Center'  => esc_html__( 'Centered Content', 'online-clothing-store' ),
    ),
) );

$wp_customize->add_setting( 'online_clothing_store_footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_clothing_store_footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'online-clothing-store'),
    'description' => __('It will change the complete footer widget background color.', 'online-clothing-store'),
    'section' => 'online_clothing_store_footer_widget_area',
    'settings' => 'online_clothing_store_footer_widget_background_color',
)));

$wp_customize->add_setting('online_clothing_store_footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'online_clothing_store_footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','online-clothing-store'),
    'section' => 'online_clothing_store_footer_widget_area'
)));

$wp_customize->add_setting('online_clothing_store_enable_to_the_top',
    array(
        'default' => $online_clothing_store_default['online_clothing_store_enable_to_the_top'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'online_clothing_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('online_clothing_store_enable_to_the_top',
    array(
        'label' => esc_html__('Enable To The Top', 'online-clothing-store'),
        'section' => 'online_clothing_store_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'online_clothing_store_to_the_top_text',
    array(
    'default'           => $online_clothing_store_default['online_clothing_store_to_the_top_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'online_clothing_store_to_the_top_text',
    array(
    'label'    => esc_html__( 'Edit Text Here', 'online-clothing-store' ),
    'section'  => 'online_clothing_store_footer_widget_area',
    'type'     => 'text',
    )
);