<?php

$online_clothing_store_custom_css = "";

	$online_clothing_store_theme_pagination_options_alignment = get_theme_mod('online_clothing_store_theme_pagination_options_alignment', 'Center');
	if ($online_clothing_store_theme_pagination_options_alignment == 'Center') {
		$online_clothing_store_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$online_clothing_store_custom_css .= 'justify-content: center;margin: 0 auto;';
		$online_clothing_store_custom_css .= '}';
	} else if ($online_clothing_store_theme_pagination_options_alignment == 'Right') {
		$online_clothing_store_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$online_clothing_store_custom_css .= 'justify-content: right;margin: 0 0 0 auto;';
		$online_clothing_store_custom_css .= '}';
	} else if ($online_clothing_store_theme_pagination_options_alignment == 'Left') {
		$online_clothing_store_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$online_clothing_store_custom_css .= 'justify-content: left;margin: 0 auto 0 0;';
		$online_clothing_store_custom_css .= '}';
	}

	$online_clothing_store_theme_breadcrumb_enable = get_theme_mod('online_clothing_store_theme_breadcrumb_enable',true);
    if($online_clothing_store_theme_breadcrumb_enable != true){
        $online_clothing_store_custom_css .='nav.breadcrumb-trail.breadcrumbs,nav.woocommerce-breadcrumb{';
            $online_clothing_store_custom_css .='display: none;';
        $online_clothing_store_custom_css .='}';
    }

	$online_clothing_store_theme_breadcrumb_options_alignment = get_theme_mod('online_clothing_store_theme_breadcrumb_options_alignment', 'Left');
	if ($online_clothing_store_theme_breadcrumb_options_alignment == 'Center') {
	    $online_clothing_store_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $online_clothing_store_custom_css .= 'text-align: center !important;';
	    $online_clothing_store_custom_css .= '}';
	} else if ($online_clothing_store_theme_breadcrumb_options_alignment == 'Right') {
	    $online_clothing_store_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $online_clothing_store_custom_css .= 'text-align: Right !important;';
	    $online_clothing_store_custom_css .= '}';
	} else if ($online_clothing_store_theme_breadcrumb_options_alignment == 'Left') {
	    $online_clothing_store_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $online_clothing_store_custom_css .= 'text-align: Left !important;';
	    $online_clothing_store_custom_css .= '}';
	}

	$online_clothing_store_single_page_content_alignment = get_theme_mod('online_clothing_store_single_page_content_alignment', 'left');
	if ($online_clothing_store_single_page_content_alignment == 'left') {
	    $online_clothing_store_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $online_clothing_store_custom_css .= 'text-align: left !important;';
	    $online_clothing_store_custom_css .= '}';
	} else if ($online_clothing_store_single_page_content_alignment == 'center') {
	    $online_clothing_store_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $online_clothing_store_custom_css .= 'text-align: center !important;';
	    $online_clothing_store_custom_css .= '}';
	} else if ($online_clothing_store_single_page_content_alignment == 'right') {
	    $online_clothing_store_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $online_clothing_store_custom_css .= 'text-align: right !important;';
	    $online_clothing_store_custom_css .= '}';
	}

	$online_clothing_store_single_post_content_alignment = get_theme_mod('online_clothing_store_single_post_content_alignment', 'left');
	if ($online_clothing_store_single_post_content_alignment == 'left') {
	    $online_clothing_store_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $online_clothing_store_custom_css .= 'text-align: left !important;justify-content: left;';
	    $online_clothing_store_custom_css .= '}';
	} else if ($online_clothing_store_single_post_content_alignment == 'center') {
	    $online_clothing_store_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $online_clothing_store_custom_css .= 'text-align: center !important;justify-content: center;';
	    $online_clothing_store_custom_css .= '}';
	} else if ($online_clothing_store_single_post_content_alignment == 'right') {
	    $online_clothing_store_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $online_clothing_store_custom_css .= 'text-align: right !important;justify-content: right;';
	    $online_clothing_store_custom_css .= '}';
	}

	$online_clothing_store_menu_text_transform = get_theme_mod('online_clothing_store_menu_text_transform', 'Capitalize');
	if ($online_clothing_store_menu_text_transform == 'Capitalize') {
	    $online_clothing_store_custom_css .= '.site-navigation .primary-menu > li a{';
	    $online_clothing_store_custom_css .= 'text-transform: Capitalize !important;';
	    $online_clothing_store_custom_css .= '}';
	} else if ($online_clothing_store_menu_text_transform == 'uppercase') {
	    $online_clothing_store_custom_css .= '.site-navigation .primary-menu > li a{';
	    $online_clothing_store_custom_css .= 'text-transform: uppercase !important;';
	    $online_clothing_store_custom_css .= '}';
	} else if ($online_clothing_store_menu_text_transform == 'lowercase') {
	    $online_clothing_store_custom_css .= '.site-navigation .primary-menu > li a{';
	    $online_clothing_store_custom_css .= 'text-transform: lowercase !important;';
	    $online_clothing_store_custom_css .= '}';
	}

	$online_clothing_store_footer_widget_title_alignment = get_theme_mod('online_clothing_store_footer_widget_title_alignment', 'left');
	if ($online_clothing_store_footer_widget_title_alignment == 'left') {
	    $online_clothing_store_custom_css .= 'h2.widget-title{';
	    $online_clothing_store_custom_css .= 'text-align: left !important;';
	    $online_clothing_store_custom_css .= '}';
	} else if ($online_clothing_store_footer_widget_title_alignment == 'center') {
	    $online_clothing_store_custom_css .= 'h2.widget-title{';
	    $online_clothing_store_custom_css .= 'text-align: center !important;';
	    $online_clothing_store_custom_css .= '}';
	} else if ($online_clothing_store_footer_widget_title_alignment == 'right') {
	    $online_clothing_store_custom_css .= 'h2.widget-title{';
	    $online_clothing_store_custom_css .= 'text-align: right !important;';
	    $online_clothing_store_custom_css .= '}';
	}

    $online_clothing_store_show_hide_related_product = get_theme_mod('online_clothing_store_show_hide_related_product',true);
    if($online_clothing_store_show_hide_related_product != true){
        $online_clothing_store_custom_css .='.related.products{';
            $online_clothing_store_custom_css .='display: none;';
        $online_clothing_store_custom_css .='}';
    }

	$online_clothing_store_sticky_sidebar = get_theme_mod('online_clothing_store_sticky_sidebar',true);
    if($online_clothing_store_sticky_sidebar != true){
        $online_clothing_store_custom_css .='.widget-area-wrapper{';
            $online_clothing_store_custom_css .='position: relative !important;';
        $online_clothing_store_custom_css .='}';
    }

	/*-------------------- Global First Color -------------------*/

	$online_clothing_store_global_color = get_theme_mod('online_clothing_store_global_color', '#384143 '); // Add a fallback if the color isn't set

	if ($online_clothing_store_global_color) {
		$online_clothing_store_custom_css .= ':root {';
		$online_clothing_store_custom_css .= '--global-color: ' . esc_attr($online_clothing_store_global_color) . ';';
		$online_clothing_store_custom_css .= '}';
	}

	$online_clothing_store_global_secondary_color = get_theme_mod('online_clothing_store_global_secondary_color', '#384143'); // Add a fallback if the color isn't set

	if ($online_clothing_store_global_secondary_color) {
		$online_clothing_store_custom_css .= ':root {';
		$online_clothing_store_custom_css .= '--secondary-color: ' . esc_attr($online_clothing_store_global_secondary_color) . ';';
		$online_clothing_store_custom_css .= '}';
	}
	
	/*-------------------- Content Font -------------------*/

	$online_clothing_store_content_typography_font = get_theme_mod('online_clothing_store_content_typography_font', 'figtree'); // Add a fallback if the color isn't set

	if ($online_clothing_store_content_typography_font) {
		$online_clothing_store_custom_css .= ':root {';
		$online_clothing_store_custom_css .= '--font-main: ' . esc_attr($online_clothing_store_content_typography_font) . ';';
		$online_clothing_store_custom_css .= '}';
	}

	/*-------------------- Heading Font -------------------*/

	$online_clothing_store_heading_typography_font = get_theme_mod('online_clothing_store_heading_typography_font', 'figtree'); // Add a fallback if the color isn't set

	if ($online_clothing_store_heading_typography_font) {
		$online_clothing_store_custom_css .= ':root {';
		$online_clothing_store_custom_css .= '--font-head: ' . esc_attr($online_clothing_store_heading_typography_font) . ';';
		$online_clothing_store_custom_css .= '}';
	}

	/*-------------------- FOOTER -------------------*/

	$online_clothing_store_footer_widget_background_color = get_theme_mod('online_clothing_store_footer_widget_background_color');
    if ($online_clothing_store_footer_widget_background_color) {

        $online_clothing_store_custom_css .= "
            .footer-widgetarea {
                background-color: ". esc_attr($online_clothing_store_footer_widget_background_color) .";
            }
        ";
    }

    $online_clothing_store_footer_widget_background_image = get_theme_mod('online_clothing_store_footer_widget_background_image');
	if ($online_clothing_store_footer_widget_background_image) {
		$online_clothing_store_custom_css .= "
			.footer-widgetarea {
				background-image: url(" . esc_url($online_clothing_store_footer_widget_background_image) . ");
			}
		";
	}

    $online_clothing_store_copyright_font_size = get_theme_mod('online_clothing_store_copyright_font_size');
    if ($online_clothing_store_copyright_font_size) {

        $online_clothing_store_custom_css .= "
            .footer-copyright {
                font-size: ". esc_attr($online_clothing_store_copyright_font_size) ."px;
            }
        ";
    }

	$online_clothing_store_columns = get_theme_mod('online_clothing_store_posts_per_columns', 3);
    $online_clothing_store_columns = absint($online_clothing_store_columns);
    if ( $online_clothing_store_columns < 1 || $online_clothing_store_columns > 6 ) {
        $online_clothing_store_columns = 3;
    }
    $online_clothing_store_custom_css .= "
        .site-content .article-wraper-archive {
            grid-template-columns: repeat({$online_clothing_store_columns}, 1fr);
        }
    ";

	$online_clothing_store_copyright_alignment = get_theme_mod( 'online_clothing_store_copyright_alignment', 'Default' );
	if ( $online_clothing_store_copyright_alignment === 'Reverse' ) {
		$online_clothing_store_custom_css .= '.site-info .column-row { flex-direction: row-reverse; }';
		$online_clothing_store_custom_css .= '.footer-credits { justify-content: flex-end; }';
		$online_clothing_store_custom_css .= '.footer-copyright { text-align: right; }';
		$online_clothing_store_custom_css .= '.site-info .column.column-3 { text-align: left; }';
	} elseif ( $online_clothing_store_copyright_alignment === 'Center' ) {
		$online_clothing_store_custom_css .= '.site-info .column-row { flex-direction: column; align-items: center; gap: 15px; }';
		$online_clothing_store_custom_css .= '.footer-credits { justify-content: center; }';
		$online_clothing_store_custom_css .= '.footer-copyright { text-align: center; }';
		$online_clothing_store_custom_css .= '.site-info .column.column-3 { text-align: center; }';
	}

	/*-------------------- Menu Color CSS -------------------*/

	$online_clothing_store_header_menus_color = get_theme_mod('online_clothing_store_header_menus_color');
	if($online_clothing_store_header_menus_color != false){
		$online_clothing_store_custom_css .='.site-navigation .primary-menu a{';
			$online_clothing_store_custom_css .='color: '.esc_attr($online_clothing_store_header_menus_color).'!important;';
		$online_clothing_store_custom_css .='}';
	}

	$online_clothing_store_header_menus_hover_color = get_theme_mod('online_clothing_store_header_menus_hover_color');
	if($online_clothing_store_header_menus_hover_color != false){
		$online_clothing_store_custom_css .='.site-navigation .primary-menu a:hover{';
			$online_clothing_store_custom_css .='color: '.esc_attr($online_clothing_store_header_menus_hover_color).'!important;';
		$online_clothing_store_custom_css .='}';
	}

	$online_clothing_store_header_submenus_color = get_theme_mod('online_clothing_store_header_submenus_color');
	if($online_clothing_store_header_submenus_color != false){
		$online_clothing_store_custom_css .='.site-navigation .primary-menu ul.sub-menu li a,.site-navigation .primary-menu li ul li a{';
			$online_clothing_store_custom_css .='color: '.esc_attr($online_clothing_store_header_submenus_color).'!important;';
		$online_clothing_store_custom_css .='}';
	}

	$online_clothing_store_header_submenus_hover_color = get_theme_mod('online_clothing_store_header_submenus_hover_color');
	if($online_clothing_store_header_submenus_hover_color != false){
		$online_clothing_store_custom_css .='.site-navigation .primary-menu > li ul.sub-menu a:hover,.site-navigation .primary-menu li ul li a:hover{';
			$online_clothing_store_custom_css .='color: '.esc_attr($online_clothing_store_header_submenus_hover_color).'!important;';
		$online_clothing_store_custom_css .='}';
	}