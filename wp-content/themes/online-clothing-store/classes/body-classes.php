<?php
/**
 * Body Classes.
 * @package Online clothing store
 */

if (!function_exists('online_clothing_store_body_classes')) :

    function online_clothing_store_body_classes($online_clothing_store_classes)
    {
        $online_clothing_store_defaults = online_clothing_store_get_default_theme_options();
        $online_clothing_store_layout = online_clothing_store_get_final_sidebar_layout();

        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $online_clothing_store_classes[] = 'hfeed';
        }

        // Sidebar layout logic
        $online_clothing_store_classes[] = $online_clothing_store_layout;

        // Copyright alignment
        $copyright_alignment = get_theme_mod('online_clothing_store_copyright_alignment', 'Default');
        $online_clothing_store_classes[] = 'copyright-' . strtolower($copyright_alignment);

        return $online_clothing_store_classes;
    }

endif;

add_filter('body_class', 'online_clothing_store_body_classes');