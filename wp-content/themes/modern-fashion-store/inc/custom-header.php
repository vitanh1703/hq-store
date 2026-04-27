<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Modern Fashion Store
 * @subpackage modern_fashion_store
 */

function modern_fashion_store_custom_header_setup() {
    register_default_headers( array(
        'default-image' => array(
            'url'           => get_template_directory_uri() . '/assets/images/sliderimage.png',
            'thumbnail_url' => get_template_directory_uri() . '/assets/images/sliderimage.png',
            'description'   => __( 'Default Header Image', 'modern-fashion-store' ),
        ),
    ) );
}
add_action( 'after_setup_theme', 'modern_fashion_store_custom_header_setup' );

/**
 * Styles the header image based on Customizer settings.
 */
function modern_fashion_store_header_style() {
    $modern_fashion_store_header_image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/images/sliderimage.png';

    $modern_fashion_store_height     = get_theme_mod( 'modern_fashion_store_header_image_height', 400 );
    $modern_fashion_store_position   = get_theme_mod( 'modern_fashion_store_header_background_position', 'center' );
    $modern_fashion_store_attachment = get_theme_mod( 'modern_fashion_store_header_background_attachment', 1 ) ? 'fixed' : 'scroll';

    $modern_fashion_store_custom_css = "
        .header-img, .single-page-img, .external-div .box-image-page img, .external-div {
            background-image: url('" . esc_url( $modern_fashion_store_header_image ) . "');
            background-size: cover;
            height: " . esc_attr( $modern_fashion_store_height ) . "px;
            background-position: " . esc_attr( $modern_fashion_store_position ) . ";
            background-attachment: " . esc_attr( $modern_fashion_store_attachment ) . ";
        }

        @media (max-width: 1000px) {
            .header-img, .single-page-img, .external-div .box-image-page img,.external-div,.featured-image{
                height: 250px !important;
            }
            .box-text h2{
                font-size: 27px;
            }
        }
    ";

    wp_add_inline_style( 'modern-fashion-store-style', $modern_fashion_store_custom_css );
}
add_action( 'wp_enqueue_scripts', 'modern_fashion_store_header_style' );

/**
 * Enqueue the main theme stylesheet.
 */
function modern_fashion_store_enqueue_styles() {
    wp_enqueue_style( 'modern-fashion-store-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'modern_fashion_store_enqueue_styles' );