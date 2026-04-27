<?php

require get_template_directory() . '/inc/db-queries.php';

function hq_store_assets() {
    wp_enqueue_style('tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    // Nhúng Lucide Icons (phiên bản JS để chạy trên trình duyệt)
    wp_enqueue_script('lucide', 'https://unpkg.com/lucide@latest', array(), null, true);
    wp_enqueue_style('tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    wp_enqueue_script('lucide', 'https://unpkg.com/lucide@latest', array(), null, true);
    wp_enqueue_script('hq-main', get_template_directory_uri() . '/assets/js/main.js', array('lucide'), null, true);
}
add_action('wp_enqueue_scripts', 'hq_store_assets');