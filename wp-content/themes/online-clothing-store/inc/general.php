<?php

function online_clothing_store_enqueue_fonts() {
    $online_clothing_store_default_font_content = 'figtree';
    $online_clothing_store_default_font_heading = 'figtree';

    $online_clothing_store_font_content = esc_attr(get_theme_mod('online_clothing_store_content_typography_font', $online_clothing_store_default_font_content));
    $online_clothing_store_font_heading = esc_attr(get_theme_mod('online_clothing_store_heading_typography_font', $online_clothing_store_default_font_heading));

    $online_clothing_store_css = '';

    // Always enqueue main font
    $online_clothing_store_css .= '
    :root {
        --font-main: ' . $online_clothing_store_font_content . ', ' . (in_array($online_clothing_store_font_content, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('online-clothing-store-style-font-general', get_template_directory_uri() . '/fonts/' . $online_clothing_store_font_content . '/font.css');

    // Always enqueue header font
    $online_clothing_store_css .= '
    :root {
        --font-head: ' . $online_clothing_store_font_heading . ', ' . (in_array($online_clothing_store_font_heading, ['bitter', 'charis-sil']) ? 'serif' : 'serif ') . '!important;
    }';
    wp_enqueue_style('online-clothing-store-style-font-h', get_template_directory_uri() . '/fonts/' . $online_clothing_store_font_heading . '/font.css');

    // Add inline style
    wp_add_inline_style('online-clothing-store-style-font-general', $online_clothing_store_css);
}
add_action('wp_enqueue_scripts', 'online_clothing_store_enqueue_fonts', 50);