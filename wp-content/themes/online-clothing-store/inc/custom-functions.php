<?php
/**
 * Custom Functions.
 *
 * @package Online clothing store
 */

if( !function_exists( 'online_clothing_store_fonts_url' ) ) :

    //Google Fonts URL
    function online_clothing_store_fonts_url(){

        $online_clothing_store_font_families = array(
            'Cinzel:wght@400..900', //  font-family: "Cinzel", serif;
            'Figtree:ital,wght@0,300..900;1,300..900', //      font-family: "Figtree", sans-serif;
        );

        $online_clothing_store_fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $online_clothing_store_font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($online_clothing_store_fonts_url);
    }

endif;

if ( ! function_exists( 'online_clothing_store_sub_menu_toggle_button' ) ) :

    function online_clothing_store_sub_menu_toggle_button( $online_clothing_store_args, $online_clothing_store_item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $online_clothing_store_args->theme_location == 'online-clothing-store-primary-menu' && isset( $online_clothing_store_args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $online_clothing_store_args->before = '<div class="submenu-wrapper">';
            $online_clothing_store_args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $online_clothing_store_item->classes ) ) {

                $toggle_target_string = '.menu-item.menu-item-' . $online_clothing_store_item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $online_clothing_store_args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'online-clothing-store' ) . '</span>' . online_clothing_store_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $online_clothing_store_args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $online_clothing_store_args->theme_location == 'online-clothing-store-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $online_clothing_store_item->classes ) ) {

                $online_clothing_store_args->before = '<div class="link-icon-wrapper">';
                $online_clothing_store_args->after  = online_clothing_store_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $online_clothing_store_args->before = '';
                $online_clothing_store_args->after  = '';

            }

        }

        return $online_clothing_store_args;

    }

endif;

add_filter( 'nav_menu_item_args', 'online_clothing_store_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'online_clothing_store_the_theme_svg' ) ):
    
    function online_clothing_store_the_theme_svg( $online_clothing_store_svg_name, $online_clothing_store_return = false ) {

        if( $online_clothing_store_return ){

            return online_clothing_store_get_theme_svg( $online_clothing_store_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in online_clothing_store_get_theme_svg();.

        }else{

            echo online_clothing_store_get_theme_svg( $online_clothing_store_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in online_clothing_store_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'online_clothing_store_get_theme_svg' ) ):

    function online_clothing_store_get_theme_svg( $online_clothing_store_svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $online_clothing_store_svg = wp_kses(
            online_clothing_store_SVG_Icons::get_svg( $online_clothing_store_svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $online_clothing_store_svg ) {
            return false;
        }
        return $online_clothing_store_svg;

    }

endif;

if( !function_exists( 'online_clothing_store_post_category_list' ) ) :

    // Post Category List.
    function online_clothing_store_post_category_list( $online_clothing_store_select_cat = true ){

        $online_clothing_store_post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $online_clothing_store_post_cat_cat_array = array();
        if( $online_clothing_store_select_cat ){

            $online_clothing_store_post_cat_cat_array[''] = esc_html__( '-- Select Category --','online-clothing-store' );

        }

        foreach ( $online_clothing_store_post_cat_lists as $online_clothing_store_post_cat_list ) {

            $online_clothing_store_post_cat_cat_array[$online_clothing_store_post_cat_list->slug] = $online_clothing_store_post_cat_list->name;

        }

        return $online_clothing_store_post_cat_cat_array;
    }

endif;

if( !function_exists('online_clothing_store_single_post_navigation') ):

    function online_clothing_store_single_post_navigation(){

        $online_clothing_store_default = online_clothing_store_get_default_theme_options();
        $online_clothing_store_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $online_clothing_store_current_id = '';
        $article_wrap_class = '';
        global $post;
        $online_clothing_store_current_id = $post->ID;
        if( $online_clothing_store_twp_navigation_type == '' || $online_clothing_store_twp_navigation_type == 'global-layout' ){
            $online_clothing_store_twp_navigation_type = get_theme_mod('twp_navigation_type', $online_clothing_store_default['twp_navigation_type']);
        }

        if( $online_clothing_store_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $online_clothing_store_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . online_clothing_store_the_theme_svg('arrow-left',$online_clothing_store_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'online-clothing-store') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . online_clothing_store_the_theme_svg('arrow-right',$online_clothing_store_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'online-clothing-store') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $online_clothing_store_next_post = get_next_post();
                if( isset( $online_clothing_store_next_post->ID ) ){

                    $online_clothing_store_next_post_id = $online_clothing_store_next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $online_clothing_store_next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'online_clothing_store_navigation_action','online_clothing_store_single_post_navigation',30 );

if( !function_exists('online_clothing_store_content_offcanvas') ):

    // Offcanvas Contents
    function online_clothing_store_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'online-clothing-store'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'online-clothing-store'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('online-clothing-store-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'online-clothing-store-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new Online_clothing_store_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'online_clothing_store_before_footer_content_action','online_clothing_store_content_offcanvas',30 );

if( !function_exists('online_clothing_store_footer_content_widget') ):

    function online_clothing_store_footer_content_widget(){
        
        $online_clothing_store_default = online_clothing_store_get_default_theme_options();
        
        $online_clothing_store_footer_column_layout = absint(get_theme_mod('online_clothing_store_footer_column_layout', $online_clothing_store_default['online_clothing_store_footer_column_layout']));
        $online_clothing_store_footer_sidebar_class = 12;
        
        if($online_clothing_store_footer_column_layout == 2) {
            $online_clothing_store_footer_sidebar_class = 6;
        }
        
        if($online_clothing_store_footer_column_layout == 3) {
            $online_clothing_store_footer_sidebar_class = 4;
        }
        ?>
        
        <?php if ( get_theme_mod('online_clothing_store_display_footer', true) == true ) : ?>
            <div class="footer-widgetarea">
                <div class="wrapper">
                    <div class="column-row">
                    
                        <?php for ($i = 0; $i < $online_clothing_store_footer_column_layout; $i++) : ?>
                            
                            <div class="column <?php echo 'column-' . absint($online_clothing_store_footer_sidebar_class); ?> column-sm-12">
                                
                                <?php 
                                // If no widgets are assigned, display default widgets
                                if ( ! is_active_sidebar( 'online-clothing-store-footer-widget-' . $i ) ) : 

                                    if ($i === 0) : ?>
                                        <div id="media_image-3" class="widget widget_media_image">
                                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="<?php echo esc_attr__( 'Footer Image', 'online-clothing-store' ); ?>" style="max-width: 100%; height: auto;">
                                        </div>
                                        <div id="text-3" class="widget widget_text">
                                            <div class="textwidget">
                                                <p class="widget_text">
                                                    <?php esc_html_e('The Online Clothing Store Theme is a multipurpose, modern, and minimal WordPress theme designed to create a stunning and sophisticated shopping experience. Crafted with elegance and a clean layout, it offers a beautiful and responsive interface that adapts seamlessly to all screen sizes, ensuring a mobile-friendly and retina-ready display.', 'online-clothing-store'); ?>
                                                </p>
                                            </div>
                                        </div>

                                    <?php elseif ($i === 1) : ?>
                                        <div id="pages-2" class="widget widget_pages">
                                            <h2 class="widget-title"><?php esc_html_e('Calendar', 'online-clothing-store'); ?></h2>
                                            <?php get_calendar(); ?>
                                        </div>

                                    <?php elseif ($i === 2) : ?>
                                        <div id="search-2" class="widget widget_search">
                                            <h2 class="widget-title"><?php esc_html_e('Enter Keywords Here', 'online-clothing-store'); ?></h2>
                                            <?php get_search_form(); ?>
                                        </div>
                                    <?php endif; 
                                    
                                else :
                                    // Display dynamic sidebar widget if assigned
                                    dynamic_sidebar('online-clothing-store-footer-widget-' . $i);
                                endif;
                                ?>
                                
                            </div>
                            
                        <?php endfor; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?> 

    <?php
    }

endif;

add_action( 'online_clothing_store_footer_content_action', 'online_clothing_store_footer_content_widget', 10 );

if( !function_exists('online_clothing_store_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function online_clothing_store_footer_content_info(){

        $online_clothing_store_default = online_clothing_store_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">

                    <div class="column column-9">
                        <div class="footer-credits">
                            <div class="footer-copyright">
                                <?php
                                $online_clothing_store_footer_copyright_text = wp_kses_post( get_theme_mod( 'online_clothing_store_footer_copyright_text', $online_clothing_store_default['online_clothing_store_footer_copyright_text'] ) );
                                    echo esc_html( $online_clothing_store_footer_copyright_text );
                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'online-clothing-store') . '<a href="' . esc_url('https://www.omegathemes.com/products/online-clothing-store') . '" title="' . esc_attr__('ONLINE CLOTHING STORE', 'online-clothing-store') . '" target="_blank"><span>' . esc_html__('ONLINE CLOTHING STORE', 'online-clothing-store') . '</span></a>' . esc_html__(' By ', 'online-clothing-store') . '  <span>' . esc_html__('OMEGA ', 'online-clothing-store') . '</span>';
                                    echo esc_html__('Powered by ', 'online-clothing-store') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'online-clothing-store') . '" target="_blank"><span>' . esc_html__('WordPress.', 'online-clothing-store') . '</span></a>';
                                 ?>
                            </div>
                        </div>
                    </div>


                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php if ( get_theme_mod('online_clothing_store_enable_to_the_top', true) == true ) : ?>
                                    <?php
                                    $online_clothing_store_to_the_top_text = get_theme_mod( 'online_clothing_store_to_the_top_text', __( 'To the Top', 'online-clothing-store' ) );
                                    printf( 
                                        wp_kses( 
                                            /* translators: %s is the arrow icon markup */
                                            '%s %s', 
                                            array( 'span' => array( 'class' => array(), 'aria-hidden' => array() ) ) 
                                        ), 
                                        esc_html( $online_clothing_store_to_the_top_text ),
                                        '<span class="arrow" aria-hidden="true">&uarr;</span>' 
                                    );
                                    ?>
                                <?php endif; ?>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'online_clothing_store_footer_content_action','online_clothing_store_footer_content_info',20 );

if (!function_exists('online_clothing_store_post_format_icon')):

    // Post Format Icon.
    function online_clothing_store_post_format_icon() {

        $online_clothing_store_format = get_post_format(get_the_ID()) ?: 'standard';
        $online_clothing_store_icon = '';
        $online_clothing_store_title = '';
        if( $online_clothing_store_format == 'video' ){
            $online_clothing_store_icon = online_clothing_store_get_theme_svg( 'video' );
            $online_clothing_store_title = esc_html__('Video','online-clothing-store');
        }elseif( $online_clothing_store_format == 'audio' ){
            $online_clothing_store_icon = online_clothing_store_get_theme_svg( 'audio' );
            $online_clothing_store_title = esc_html__('Audio','online-clothing-store');
        }elseif( $online_clothing_store_format == 'gallery' ){
            $online_clothing_store_icon = online_clothing_store_get_theme_svg( 'gallery' );
            $online_clothing_store_title = esc_html__('Gallery','online-clothing-store');
        }elseif( $online_clothing_store_format == 'quote' ){
            $online_clothing_store_icon = online_clothing_store_get_theme_svg( 'quote' );
            $online_clothing_store_title = esc_html__('Quote','online-clothing-store');
        }elseif( $online_clothing_store_format == 'image' ){
            $online_clothing_store_icon = online_clothing_store_get_theme_svg( 'image' );
            $online_clothing_store_title = esc_html__('Image','online-clothing-store');
        } elseif( $online_clothing_store_format == 'link' ){
            $online_clothing_store_icon = online_clothing_store_get_theme_svg( 'link' );
            $online_clothing_store_title = esc_html__('Link','online-clothing-store');
        } elseif( $online_clothing_store_format == 'status' ){
            $online_clothing_store_icon = online_clothing_store_get_theme_svg( 'status' );
            $online_clothing_store_title = esc_html__('Status','online-clothing-store');
        } elseif( $online_clothing_store_format == 'aside' ){
            $online_clothing_store_icon = online_clothing_store_get_theme_svg( 'aside' );
            $online_clothing_store_title = esc_html__('Aside','online-clothing-store');
        } elseif( $online_clothing_store_format == 'chat' ){
            $online_clothing_store_icon = online_clothing_store_get_theme_svg( 'chat' );
            $online_clothing_store_title = esc_html__('Chat','online-clothing-store');
        }
        
        if (!empty($online_clothing_store_icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo online_clothing_store_svg_escape($online_clothing_store_icon); ?></span>
                <?php if( $online_clothing_store_title ){ echo '<span class="post-format-label">'.esc_html( $online_clothing_store_title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'online_clothing_store_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $online_clothing_store_svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function online_clothing_store_svg_escape( $online_clothing_store_input ) {

        // Make sure that only our allowed tags and attributes are included.
        $online_clothing_store_svg = wp_kses(
            $online_clothing_store_input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $online_clothing_store_svg ) {
            return false;
        }

        return $online_clothing_store_svg;

    }

endif;

if( !function_exists( 'online_clothing_store_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function online_clothing_store_sanitize_sidebar_option_meta( $online_clothing_store_input ){

        $online_clothing_store_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $online_clothing_store_input,$online_clothing_store_metabox_options ) ){

            return $online_clothing_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'online_clothing_store_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function online_clothing_store_sanitize_pagination_meta( $online_clothing_store_input ){

        $online_clothing_store_metabox_options = array( 'Center','Right','Left');
        if( in_array( $online_clothing_store_input,$online_clothing_store_metabox_options ) ){

            return $online_clothing_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'online_clothing_store_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function online_clothing_store_sanitize_menu_transform( $online_clothing_store_input ){

        $online_clothing_store_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $online_clothing_store_input,$online_clothing_store_metabox_options ) ){

            return $online_clothing_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'online_clothing_store_sanitize_page_content_alignment' ) ) :

    // Sidebar Option Sanitize.
    function online_clothing_store_sanitize_page_content_alignment( $online_clothing_store_input ){

        $online_clothing_store_metabox_options = array( 'left','center','right');
        if( in_array( $online_clothing_store_input,$online_clothing_store_metabox_options ) ){

            return $online_clothing_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'online_clothing_store_sanitize_footer_widget_title_alignment' ) ) :

    // Footer Option Sanitize.
    function online_clothing_store_sanitize_footer_widget_title_alignment( $online_clothing_store_input ){

        $online_clothing_store_metabox_options = array( 'left','center','right');
        if( in_array( $online_clothing_store_input,$online_clothing_store_metabox_options ) ){

            return $online_clothing_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'online_clothing_store_sanitize_pagination_type' ) ) :

    /**
     * Sanitize the pagination type setting.
     *
     * @param string $online_clothing_store_input The input value from the Customizer.
     * @return string The sanitized value.
     */
    function online_clothing_store_sanitize_pagination_type( $online_clothing_store_input ) {
        // Define valid options for the pagination type.
        $online_clothing_store_valid_options = array( 'numeric', 'newer_older' ); // Update valid options to include 'newer_older'

        // If the input is one of the valid options, return it. Otherwise, return the default option ('numeric').
        if ( in_array( $online_clothing_store_input, $online_clothing_store_valid_options, true ) ) {
            return $online_clothing_store_input;
        } else {
            // Return 'numeric' as the fallback if the input is invalid.
            return 'numeric';
        }
    }

endif;


// Sanitize the enable/disable setting for pagination
if( !function_exists('online_clothing_store_sanitize_enable_pagination') ) :
    function online_clothing_store_sanitize_enable_pagination( $online_clothing_store_input ) {
        return (bool) $online_clothing_store_input;
    }
endif;

if( !function_exists( 'online_clothing_store_sanitize_copyright_alignment_meta' ) ) :

    // Sidebar Option Sanitize.
    function online_clothing_store_sanitize_copyright_alignment_meta( $online_clothing_store_input ){

        $online_clothing_store_metabox_options = array( 'Default','Reverse','Center');
        if( in_array( $online_clothing_store_input,$online_clothing_store_metabox_options ) ){

            return $online_clothing_store_input;

        }else{

            return '';

        }
    }

endif;

/**
 * Sidebar Layout Function
 */
function online_clothing_store_get_final_sidebar_layout() {
	$online_clothing_store_defaults       = online_clothing_store_get_default_theme_options();
	$online_clothing_store_global_layout  = get_theme_mod('online_clothing_store_global_sidebar_layout', $online_clothing_store_defaults['online_clothing_store_global_sidebar_layout']);
	$online_clothing_store_page_layout    = get_theme_mod('online_clothing_store_page_sidebar_layout', $online_clothing_store_global_layout);
	$online_clothing_store_post_layout    = get_theme_mod('online_clothing_store_post_sidebar_layout', $online_clothing_store_global_layout);
	$online_clothing_store_meta_layout    = get_post_meta(get_the_ID(), 'online_clothing_store_post_sidebar_option', true);

	if (!empty($online_clothing_store_meta_layout) && $online_clothing_store_meta_layout !== 'default') {
		return $online_clothing_store_meta_layout;
	}
	if (is_page() || (function_exists('is_shop') && is_shop())) {
		return $online_clothing_store_page_layout;
	}
	if (is_single()) {
		return $online_clothing_store_post_layout;
	}
	return $online_clothing_store_global_layout;
}