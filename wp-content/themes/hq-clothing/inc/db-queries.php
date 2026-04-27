<?php

function get_latest_products($limit = 8) {
    global $wpdb;
    return $wpdb->get_results($wpdb->prepare("SELECT * FROM products ORDER BY id DESC LIMIT %d", $limit));
}

function get_hq_products($limit = 10) {
    global $wpdb;
    return $wpdb->get_results($wpdb->prepare("SELECT * FROM products LIMIT %d", $limit));
}

function get_header_news($limit = 5) {
    global $wpdb;
    return $wpdb->get_results($wpdb->prepare("SELECT id, title, category FROM news LIMIT %d", $limit));
}