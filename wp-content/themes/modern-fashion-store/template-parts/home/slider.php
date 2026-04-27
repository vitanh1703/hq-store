<?php
/**
 * Template part for displaying slider section
 *
 * @package Modern Fashion Store
 * @subpackage modern_fashion_store
 */

$modern_fashion_store_static_image = get_template_directory_uri() . '/assets/images/slider-img.png';
?>
<?php if (get_theme_mod('modern_fashion_store_slider_arrows', true) != '') : ?>
  <div id="slider" class="mb-md-0 mb-3">
    <div class="main-sliders">
      <?php
      $modern_fashion_store_slide_pages = array();
      for ($modern_fashion_store_count = 1; $modern_fashion_store_count <= 1; $modern_fashion_store_count++) {
          $modern_fashion_store_mod = intval(get_theme_mod('modern_fashion_store_slider_page' . $modern_fashion_store_count, 0));
          if ($modern_fashion_store_mod > 0) {
              $modern_fashion_store_slide_pages[] = $modern_fashion_store_mod;
          }
      }
      if (!empty($modern_fashion_store_slide_pages)) :
          $modern_fashion_store_args = array(
              'post_type' => 'page',
              'post__in' => $modern_fashion_store_slide_pages,
              'orderby' => 'post__in'
          );
          $modern_fashion_store_query = new WP_Query($modern_fashion_store_args);
          if ($modern_fashion_store_query->have_posts()) :
              while ($modern_fashion_store_query->have_posts()) : $modern_fashion_store_query->the_post(); ?>
                  <div class="item">
                      <div class="slider-border">
                          <?php if (has_post_thumbnail()) { ?>
                              <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title_attribute(); ?>" />
                          <?php } else { ?>
                              <img src="<?php echo esc_url($modern_fashion_store_static_image); ?>" alt="<?php esc_attr_e('Default Image', 'modern-fashion-store'); ?>" />
                          <?php } ?>
                      </div>
                      <div class="carousel-caption">
                          <div class="inner_carousel">
                            <?php if ( get_theme_mod('modern_fashion_store_show_slider_title', true) ) : ?>
                              <h1 class="mb-md-3 mb-0 text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <?php endif; ?>
                          </div>
                      </div>
                          <div class="more-btn mt-lg-4 mt-md-4 mt-3">
                            <?php 
                                // Get the button text and link from the theme settings.
                                $modern_fashion_store_btn_text1 = get_theme_mod('modern_fashion_store_btn_text1', __('Shop now', 'modern-fashion-store'));
                                $modern_fashion_store_btn_link1 = get_theme_mod('modern_fashion_store_btn_link1', '');

                                // Fallback to the permalink if no link is provided.
                                $Modern_Fashion_Store_Button_link = !empty($modern_fashion_store_btn_link1) ? $modern_fashion_store_btn_link1 : get_permalink();

                                if (!empty($modern_fashion_store_btn_text1)) { ?>
                                    <a href="<?php echo esc_url($Modern_Fashion_Store_Button_link); ?>" target="_blank" class="text-uppercase slider-btn1"><span class="pe-lg-3 pe-2"><?php echo esc_html($modern_fashion_store_btn_text1); ?></span><i class="fas fa-chevron-down"></i><span class="screen-reader-text"><?php echo esc_html($modern_fashion_store_btn_text1); ?></span></a>
                            <?php } ?>
                          </div>
                  </div>
              <?php endwhile;
              wp_reset_postdata();
          else : ?>
              <div class="no-postfound"><?php esc_html_e('No slides found.', 'modern-fashion-store'); ?></div>
          <?php endif;
      endif; ?>
    </div>
  </div>
<?php endif; ?>