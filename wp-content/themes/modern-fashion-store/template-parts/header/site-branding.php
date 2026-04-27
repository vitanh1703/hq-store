<?php
/*
* Display Logo and contact details
*/
?>
<div class="main-header">
  <?php if (get_theme_mod('modern_fashion_store_topbar_visibility', true)) : ?>
    <div class="top-main text-center mx-auto my-0">
      <?php if (get_theme_mod('modern_fashion_store_top_header_text')) : ?>
        <p class="top-text m-0 py-lg-3 py-2"><?php echo esc_html(get_theme_mod('modern_fashion_store_top_header_text')); ?></p>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <div class="headerbox">
    <div class="menubox">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4 logo-col align-self-center">
            <div class="logo my-lg-2 my-3">
              <?php if( has_custom_logo() ) modern_fashion_store_the_custom_logo(); ?>
              <?php if(get_theme_mod('modern_fashion_store_site_title',true) == 1){ ?>
                <?php if (is_front_page() && is_home()) : ?>
                  <h1 class="text-capitalize">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                  </h1> 
                <?php else : ?>
                  <p class="text-capitalize site-title mb-1">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                  </p>
                <?php endif; ?>
              <?php }?>
              <?php $modern_fashion_store_description = get_bloginfo( 'description', 'display' );
              if ( $modern_fashion_store_description || is_customize_preview() ) : ?>
                <?php if(get_theme_mod('modern_fashion_store_site_tagline',false)){ ?>
                  <p class="site-description mb-0"><?php echo esc_html($modern_fashion_store_description); ?></p>
                <?php }?>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-7 col-md-4 align-self-center">
            <?php get_template_part('template-parts/navigation/site-nav'); ?>
          </div>
           <!-- Header Details Section -->
            <div class="col-lg-2 col-md-3 align-self-center mb-md-0 mb-3">
                <div class="header-details">
                    <p class="mb-0">
                      <?php if (class_exists('WooCommerce')): ?>
                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                          <i class="<?php echo esc_attr(is_user_logged_in() ? 'fas' : 'far'); ?> fa-user" aria-hidden="true"></i>
                        </a>
                      <?php endif; ?>
                    </p>
                    <!-- Search Bar -->
                    <span class="search-bar ms-4">
                        <button type="button" class="open-search" aria-label="<?php esc_attr_e('Open Search', 'modern-fashion-store'); ?>">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                    <p class="mb-0">
                      <?php if (class_exists('WooCommerce')): ?> 
                        <span class="product-cart text-center position-relative pe-2">
                          <a href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Shopping cart', 'modern-fashion-store'); ?>">
                              <i class="fas fa-shopping-cart ms-4" aria-hidden="true"></i>
                              <?php 
                            $modern_fashion_store_cart_count = WC()->cart->get_cart_contents_count(); 
                            if ($modern_fashion_store_cart_count > 0): ?>
                                <span class="cart-count"><?php echo esc_html($modern_fashion_store_cart_count); ?></span>
                            <?php endif; ?>
                          </a>
                        </span>
                      <?php endif; ?>
                    </p>
                </div>
            </div>
            <!-- Search Overlay -->
            <div class="search-outer">
                <div class="inner_searchbox w-100 h-100">
                    <?php get_search_form(); ?>
                </div>
                <button type="button" class="search-close"><?php esc_html_e('CLOSE', 'modern-fashion-store'); ?></button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>