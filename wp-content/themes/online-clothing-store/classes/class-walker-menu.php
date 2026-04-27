<?php
/**
 * Custom page walker for this theme.
 *
 * @package Online clothing store
 */

if (!class_exists('Online_clothing_store_Walker_Page')) {
    /**
     * CUSTOM PAGE WALKER
     * A custom walker for pages.
     */
    class Online_clothing_store_Walker_Page extends Walker_Page
    {

        /**
         * Outputs the beginning of the current element in the tree.
         *
         * @param string $online_clothing_store_output Used to append additional content. Passed by reference.
         * @param WP_Post $page Page data object.
         * @param int $online_clothing_store_depth Optional. Depth of page. Used for padding. Default 0.
         * @param array $online_clothing_store_args Optional. Array of arguments. Default empty array.
         * @param int $current_page Optional. Page ID. Default 0.
         * @since 2.1.0
         *
         * @see Walker::start_el()
         */

        public function start_lvl( &$online_clothing_store_output, $online_clothing_store_depth = 0, $online_clothing_store_args = array() ) {
            $online_clothing_store_indent  = str_repeat( "\t", $online_clothing_store_depth );
            $online_clothing_store_output .= "$online_clothing_store_indent<ul class='sub-menu'>\n";
        }

        public function start_el(&$online_clothing_store_output, $page, $online_clothing_store_depth = 0, $online_clothing_store_args = array(), $current_page = 0)
        {

            if (isset($online_clothing_store_args['item_spacing']) && 'preserve' === $online_clothing_store_args['item_spacing']) {
                $t = "\t";
                $n = "\n";
            } else {
                $t = '';
                $n = '';
            }
            if ($online_clothing_store_depth) {
                $online_clothing_store_indent = str_repeat($t, $online_clothing_store_depth);
            } else {
                $online_clothing_store_indent = '';
            }

            $online_clothing_store_css_class = array('page_item', 'page-item-' . $page->ID);

            if (isset($online_clothing_store_args['pages_with_children'][$page->ID])) {
                $online_clothing_store_css_class[] = 'page_item_has_children';
            }

            if (!empty($current_page)) {
                $_current_page = get_post($current_page);
                if ($_current_page && in_array($page->ID, $_current_page->ancestors, true)) {
                    $online_clothing_store_css_class[] = 'current_page_ancestor';
                }
                if ($page->ID === $current_page) {
                    $online_clothing_store_css_class[] = 'current_page_item';
                } elseif ($_current_page && $page->ID === $_current_page->post_parent) {
                    $online_clothing_store_css_class[] = 'current_page_parent';
                }
            } elseif (get_option('page_for_posts') === $page->ID) {
                $online_clothing_store_css_class[] = 'current_page_parent';
            }

            /** This filter is documented in wp-includes/class-walker-page.php */
            $online_clothing_store_css_classes = implode(' ', apply_filters('page_css_class', $online_clothing_store_css_class, $page, $online_clothing_store_depth, $online_clothing_store_args, $current_page));
            $online_clothing_store_css_classes = $online_clothing_store_css_classes ? ' class="' . esc_attr($online_clothing_store_css_classes) . '"' : '';

            if ('' === $page->post_title) {
                /* translators: %d: ID of a post. */
                $page->post_title = sprintf(__('#%d (no title)', 'online-clothing-store'), $page->ID);
            }

            $online_clothing_store_args['link_before'] = empty($online_clothing_store_args['link_before']) ? '' : $online_clothing_store_args['link_before'];
            $online_clothing_store_args['link_after'] = empty($online_clothing_store_args['link_after']) ? '' : $online_clothing_store_args['link_after'];

            $online_clothing_store_atts = array();
            $online_clothing_store_atts['href'] = get_permalink($page->ID);
            $online_clothing_store_atts['aria-current'] = ($page->ID === $current_page) ? 'page' : '';

            /** This filter is documented in wp-includes/class-walker-page.php */
            $online_clothing_store_atts = apply_filters('page_menu_link_attributes', $online_clothing_store_atts, $page, $online_clothing_store_depth, $online_clothing_store_args, $current_page);

            $online_clothing_store_attributes = '';
            foreach ($online_clothing_store_atts as $attr => $online_clothing_store_value) {
                if (!empty($online_clothing_store_value)) {
                    $online_clothing_store_value = ('href' === $attr) ? esc_url($online_clothing_store_value) : esc_attr($online_clothing_store_value);
                    $online_clothing_store_attributes .= ' ' . $attr . '="' . $online_clothing_store_value . '"';
                }
            }

            $online_clothing_store_args['list_item_before'] = '';
            $online_clothing_store_args['list_item_after'] = '';
            $online_clothing_store_args['icon_rennder'] = '';
            // Wrap the link in a div and append a sub menu toggle.
            if (isset($online_clothing_store_args['show_toggles']) && true === $online_clothing_store_args['show_toggles']) {
                // Wrap the menu item link contents in a div, used for positioning.
                $online_clothing_store_args['list_item_after'] = '';
            }


            // Add icons to menu items with children.
            if (isset($online_clothing_store_args['show_sub_menu_icons']) && true === $online_clothing_store_args['show_sub_menu_icons']) {
                if (isset($online_clothing_store_args['pages_with_children'][$page->ID])) {
                    $online_clothing_store_args['icon_rennder'] = '';
                }
            }

            // Add icons to menu items with children.
            if (isset($online_clothing_store_args['show_toggles']) && true === $online_clothing_store_args['show_toggles']) {
                if (isset($online_clothing_store_args['pages_with_children'][$page->ID])) {

                    $toggle_target_string = '.page_item.page-item-' . $page->ID . ' > .sub-menu';

                    $online_clothing_store_args['list_item_after'] = '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . __( 'Show sub menu', 'online-clothing-store' ) . '</span>' . online_clothing_store_get_theme_svg( 'chevron-down' ) . '</span></button>';
                }
            }

            if (isset($online_clothing_store_args['show_toggles']) && true === $online_clothing_store_args['show_toggles']) {

                $online_clothing_store_output .= $online_clothing_store_indent . sprintf(
                        '<li%s>%s%s<a%s>%s%s%s</a>%s%s',
                        $online_clothing_store_css_classes,
                        '<div class="submenu-wrapper">',
                        $online_clothing_store_args['list_item_before'],
                        $online_clothing_store_attributes,
                        $online_clothing_store_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $online_clothing_store_args['link_after'],
                        $online_clothing_store_args['list_item_after'],
                        '</div>'
                    );

            }else{

                $online_clothing_store_output .= $online_clothing_store_indent . sprintf(
                        '<li%s>%s<a%s>%s%s%s%s</a>%s',
                        $online_clothing_store_css_classes,
                        $online_clothing_store_args['list_item_before'],
                        $online_clothing_store_attributes,
                        $online_clothing_store_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $online_clothing_store_args['icon_rennder'],
                        $online_clothing_store_args['link_after'],
                        $online_clothing_store_args['list_item_after']
                    );

            }

            if (!empty($online_clothing_store_args['show_date'])) {
                if ('modified' === $online_clothing_store_args['show_date']) {
                    $online_clothing_store_time = $page->post_modified;
                } else {
                    $online_clothing_store_time = $page->post_date;
                }

                $online_clothing_store_date_format = empty($online_clothing_store_args['date_format']) ? '' : $online_clothing_store_args['date_format'];
                $online_clothing_store_output .= ' ' . mysql2date($online_clothing_store_date_format, $online_clothing_store_time);
            }
        }
    }
}