<?php
/**
 * Default Values.
 *
 * @package Online clothing store
 */

if ( ! function_exists( 'online_clothing_store_get_default_theme_options' ) ) :
	function online_clothing_store_get_default_theme_options() {

		$online_clothing_store_defaults = array();
		
		// Options.
        $online_clothing_store_defaults['online_clothing_store_logo_width_range']                            = 200;
	$online_clothing_store_defaults['online_clothing_store_global_sidebar_layout']		           = 'right-sidebar';
        $online_clothing_store_defaults['online_clothing_store_theme_breadcrumb_options_alignment']          = 'left';
        $online_clothing_store_defaults['online_clothing_store_theme_pagination_options_alignment']          = 'Center';
        $online_clothing_store_defaults['online_clothing_store_theme_loader']                                = 0;
        $online_clothing_store_defaults['online_clothing_store_pagination_layout']                           = 'numeric';
	$online_clothing_store_defaults['online_clothing_store_footer_column_layout'] 			   = 3;
        $online_clothing_store_defaults['online_clothing_store_menu_font_size']                              = 16;
        $online_clothing_store_defaults['online_clothing_store_copyright_font_size']                         = 16;
        $online_clothing_store_defaults['online_clothing_store_breadcrumb_font_size']                        = 16;
        $online_clothing_store_defaults['online_clothing_store_excerpt_limit']                               = 20;
        $online_clothing_store_defaults['online_clothing_store_menu_text_transform']                         = 'Capitalize';  
        $online_clothing_store_defaults['online_clothing_store_single_page_content_alignment']               = 'left';
        $online_clothing_store_defaults['online_clothing_store_per_columns']                                 = 3;  
        $online_clothing_store_defaults['online_clothing_store_product_per_page']                            = 9; 
        $online_clothing_store_defaults['online_clothing_store_custom_related_products_number'] = 6;
        $online_clothing_store_defaults['online_clothing_store_custom_related_products_number_per_row'] = 3;
	$online_clothing_store_defaults['online_clothing_store_footer_copyright_text'] 		           = esc_html__( 'All rights reserved.', 'online-clothing-store' );
        $online_clothing_store_defaults['twp_navigation_type']              			           = 'theme-normal-navigation';
        $online_clothing_store_defaults['online_clothing_store_post_author']                		   = 1;
        $online_clothing_store_defaults['online_clothing_store_post_date']                		   = 1;
        $online_clothing_store_defaults['online_clothing_store_post_category']                	           = 1;
        $online_clothing_store_defaults['online_clothing_store_post_tags']                		   = 1;
        $online_clothing_store_defaults['online_clothing_store_floating_next_previous_nav']                  = 1;
        $online_clothing_store_defaults['online_clothing_store_display_header_title']                        = 1;
        $online_clothing_store_defaults['online_clothing_store_sticky']                                      = 0;
        $online_clothing_store_defaults['online_clothing_store_services']               	                   = 1;        
        $online_clothing_store_defaults['online_clothing_store_background_color']               	           = '#fff';
        $online_clothing_store_defaults['online_clothing_store_display_footer']                              = 1;
        $online_clothing_store_defaults['online_clothing_store_footer_widget_title_alignment']               = 'left'; 
        $online_clothing_store_defaults['online_clothing_store_show_hide_related_product']                   = 1;
        $online_clothing_store_defaults['online_clothing_store_display_archive_post_image']                  = 1;
        $online_clothing_store_defaults['online_clothing_store_global_color']                                     = '#384143 ';
        $online_clothing_store_defaults['online_clothing_store_global_secondary_color']                           = '#384143';
        $online_clothing_store_defaults['online_clothing_store_display_archive_post_category']          = 1;
        $online_clothing_store_defaults['online_clothing_store_display_archive_post_title']             = 1;
        $online_clothing_store_defaults['online_clothing_store_display_archive_post_content']           = 1;
        $online_clothing_store_defaults['online_clothing_store_display_archive_post_button']            = 1;
        $online_clothing_store_defaults['online_clothing_store_display_single_post_image']              = 1;
        $online_clothing_store_defaults['online_clothing_store_display_archive_post_format_icon']       = 1;
        $online_clothing_store_defaults['online_clothing_store_display_single_post_image']              = 1;
        $online_clothing_store_defaults['online_clothing_store_display_archive_post_format_icon']       = 1;
        $online_clothing_store_defaults['online_clothing_store_enable_to_the_top']                         = 1;
        $online_clothing_store_defaults['online_clothing_store_to_the_top_text']                           = esc_html__( 'To The Top', 'online-clothing-store' );
        $online_clothing_store_defaults['online_clothing_store_theme_breadcrumb_enable']                   = 1;
        $online_clothing_store_defaults['online_clothing_store_single_post_content_alignment']             = 'left';

         // Topbar
        $online_clothing_store_defaults['online_clothing_store_header_search']                    = 1;
        $online_clothing_store_defaults['online_clothing_store_header_layout_topbar_text']       =  esc_html__( 'Free International Shipping On Orders Over $60', 'online-clothing-store' );
        $online_clothing_store_defaults['online_clothing_store_header_layout_email_address']      =  esc_html__( 'clothstore@example.com', 'online-clothing-store' );
        $online_clothing_store_defaults['online_clothing_store_header_layout_address']            =  esc_html__( '450 NW Couch Street, Oregon 97209', 'online-clothing-store' );
        $online_clothing_store_defaults['online_clothing_store_header_layout_button_text']                   = esc_html__( 'Get A Quote', 'online-clothing-store' );
        $online_clothing_store_defaults['online_clothing_store_header_layout_button_url']                    = esc_url('#');

        // 404 Page Defaults
        $online_clothing_store_defaults['online_clothing_store_404_main_title'] = esc_html__( 'Oops! That page can’t be found.', 'online-clothing-store' );
        $online_clothing_store_defaults['online_clothing_store_404_subtitle_one'] = esc_html__( 'Maybe it’s out there, somewhere...', 'online-clothing-store' );
        $online_clothing_store_defaults['online_clothing_store_404_para_one'] = esc_html__( 'You can always find insightful stories on our', 'online-clothing-store' );
        $online_clothing_store_defaults['online_clothing_store_404_subtitle_two'] = esc_html__( 'Still feeling lost? You’re not alone.', 'online-clothing-store' );
        $online_clothing_store_defaults['online_clothing_store_404_para_two'] = esc_html__( 'Enjoy these stories about getting lost, losing things, and finding what you never knew you were looking for.', 'online-clothing-store' );

        // Pass through filter.
        $online_clothing_store_defaults = apply_filters( 'online_clothing_store_filter_default_theme_options', $online_clothing_store_defaults );

        return $online_clothing_store_defaults;
	}
endif;
