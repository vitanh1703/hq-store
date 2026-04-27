<?php
/**
 * Header Layout
 * @package Online clothing store
 */

$online_clothing_store_defaults = online_clothing_store_get_default_theme_options();

$online_clothing_store_header_layout_topbar_text = esc_html( get_theme_mod( 'online_clothing_store_header_layout_topbar_text',
$online_clothing_store_defaults['online_clothing_store_header_layout_topbar_text'] ) );

$online_clothing_store_header_layout_email_address = esc_html( get_theme_mod( 'online_clothing_store_header_layout_email_address',
$online_clothing_store_defaults['online_clothing_store_header_layout_email_address'] ) );

$online_clothing_store_header_search = get_theme_mod( 'online_clothing_store_header_search', 
$online_clothing_store_defaults['online_clothing_store_header_search'] );

$online_clothing_store_sticky = get_theme_mod('online_clothing_store_sticky');
    $online_clothing_store_data_sticky = "false";
    if ($online_clothing_store_sticky) {
    $online_clothing_store_data_sticky = "true";
    }
    global $wp_customize;

$online_clothing_store_header_layout_button_text = esc_html( get_theme_mod( 'online_clothing_store_header_layout_button_text',
$online_clothing_store_defaults['online_clothing_store_header_layout_button_text'] ) );

$online_clothing_store_header_layout_button_url = esc_html( get_theme_mod( 'online_clothing_store_header_layout_button_url',
$online_clothing_store_defaults['online_clothing_store_header_layout_button_url'] ) );

?>
<header id="site-header" class="site-header-layout header-layout" role="banner">
    <section id="top-header">
        <div class="wrapper headers-top">
            <div class="header-wrapper">
                <div class="theme-header-areas header-areas-right side-border">
                    <?php if( $online_clothing_store_header_layout_email_address ){ ?>
                       <span><a href="mailto:<?php echo esc_html( $online_clothing_store_header_layout_email_address ); ?>"><?php echo esc_html( $online_clothing_store_header_layout_email_address ); ?></a></span>
                    <?php } ?>
                </div>
                <div class="theme-header-areas header-areas-right center-text">
                    <?php if( $online_clothing_store_header_layout_topbar_text ){ ?>
                       <p><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--!Font Awesome Free v5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z"/></svg><?php echo esc_html( $online_clothing_store_header_layout_topbar_text ); ?></p>
                    <?php } ?>
                </div>
                <div class="theme-header-areas header-areas-right header-meta">
                    <?php echo do_shortcode('[google-translator]'); ?>
                    <?php if(class_exists('WOOCS')){ ?>
                        <span class="currency">
                            <?php echo do_shortcode('[woocs]');?>
                        </span>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <div class="header-navbar <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($online_clothing_store_data_sticky); ?>">
        
        <div class="wrapper header-wrapper">
            <div class="theme-header-areas header-areas-left aa">
                <div class="header-titles">
                    <?php
                    online_clothing_store_site_logo();
                    online_clothing_store_site_description();
                    ?>
                </div>
            </div>
            <div class="header-right-box">
                <div class="theme-header-areas header-areas-right bb">
                    <div class="site-navigation">
                        <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'online-clothing-store'); ?>" role="navigation">
                            <ul class="primary-menu theme-menu">
                                <?php
                                if (has_nav_menu('online-clothing-store-primary-menu')) {
                                    wp_nav_menu(
                                        array(
                                            'container' => '',
                                            'items_wrap' => '%3$s',
                                            'theme_location' => 'online-clothing-store-primary-menu',
                                        )
                                    );
                                } else {
                                    wp_list_pages(
                                        array(
                                            'match_menu_classes' => true,
                                            'show_sub_menu_icons' => true,
                                            'title_li' => false,
                                            'walker' => new Online_clothing_store_Walker_Page(),
                                        )
                                    );
                                } ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="navbar-controls twp-hide-js">
                        <button type="button" class="navbar-control navbar-control-offcanvas">
                            <span class="navbar-control-trigger" tabindex="-1">
                                <?php online_clothing_store_the_theme_svg('menu'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="theme-header-areas header-areas-right header-contact cc">
                    <?php if( $online_clothing_store_header_search ){ ?>
                        <span class="header-search"> 
                            <a href="#search">
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 .1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
                            </a>
                            <!-- Search Form -->
                            <div id="search">
                                <span class="close">X</span>
                                <?php get_search_form(); ?>
                            </div>
                        </span>
                    <?php } ?>
                    <span class="wishlist-box">
                        <a href="<?php echo esc_url( home_url() . '/index.php/wishsuite' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--!Font Awesome Free v5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"/></svg></a>
                    </span>
                    <?php if(class_exists('woocommerce')){ ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <a class="account-area" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','online-clothing-store'); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"/></svg></a>
                        <?php }
                        else { ?>
                            <a class="account-area" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','online-clothing-store'); ?>"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></a>
                        <?php } ?>
                        <span class="cart_no">
                            <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','online-clothing-store' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--!Font Awesome Free v5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 160v-32C352 57.42 294.579 0 224 0 153.42 0 96 57.42 96 128v32H0v272c0 44.183 35.817 80 80 80h288c44.183 0 80-35.817 80-80V160h-96zm-192-32c0-35.29 28.71-64 64-64s64 28.71 64 64v32H160v-32zm160 120c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zm-192 0c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24z"/></svg></a>
                        </span>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</header>