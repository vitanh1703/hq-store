<?php
/**
* Typography Settings.
*
* @package Online clothing store
*/

$online_clothing_store_default = online_clothing_store_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'online_clothing_store_typography_setting',
	array(
	'title'      => esc_html__( 'Typography Settings', 'online-clothing-store' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'online_clothing_store_theme_option_panel',
	)
);

// -----------------  Font array
$online_clothing_store_fonts = array(
    'Select'           => __('Default Font', 'online-clothing-store'),
    'bad-script' => 'Bad Script',
    'bitter'     => 'Bitter',
    'charis-sil' => 'Charis SIL',
    'cuprum'     => 'Cuprum',
    'exo-2'      => 'Exo 2',
    'jost'       => 'Jost',
    'open-sans'  => 'Open Sans',
    'oswald'     => 'Oswald',
    'play'       => 'Play',
    'roboto'     => 'Roboto',
    'outfit'     => 'Outfit',
    'ubuntu'     => 'Ubuntu',
    'saira'      => 'Saira',
    'cinzel'     => 'Cinzel',
    'figtree'     => 'Figtree'
);

 // -----------------  General text font
 $wp_customize->add_setting( 'online_clothing_store_content_typography_font', array(
    'default'           => 'figtree',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'online_clothing_store_radio_sanitize',
) );
$wp_customize->add_control( 'online_clothing_store_content_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Content Font', 'online-clothing-store' ),
    'section'  => 'online_clothing_store_typography_setting',
    'settings' => 'online_clothing_store_content_typography_font',
    'choices'  => $online_clothing_store_fonts,
) );

 // -----------------  General Heading Font
$wp_customize->add_setting( 'online_clothing_store_heading_typography_font', array(
    'default'           => 'figtree',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'online_clothing_store_radio_sanitize',
) );
$wp_customize->add_control( 'online_clothing_store_heading_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Heading Font', 'online-clothing-store' ),
    'section'  => 'online_clothing_store_typography_setting',
    'settings' => 'online_clothing_store_heading_typography_font',
    'choices'  => $online_clothing_store_fonts,
) );