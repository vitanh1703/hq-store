<?php
/**
 * Template part for displaying the services section
 *
 * @package Modern Fashion Store
 * @subpackage modern_fashion_store
 */
?>

<?php 
    $modern_fashion_store_main_expert_wrap = absint(get_theme_mod('modern_fashion_store_enable_product_section', 1));
    if($modern_fashion_store_main_expert_wrap == 1){ 
    ?>
    <section id="product-section">
        <div class="container">
            <div class="feature-left">
                <?php if( get_theme_mod('modern_fashion_store_projetcs_main_text') != '' ){ ?>
                    <p class="project-top-text text-uppercase"><?php echo esc_html(get_theme_mod('modern_fashion_store_projetcs_main_text',''));?></p>
                <?php }?>
                <?php if ( get_theme_mod('modern_fashion_store_product_section_heading') ) : ?><h2 class="text-uppercase"><?php echo esc_html( get_theme_mod('modern_fashion_store_product_section_heading') ); ?></h2><?php endif; ?>
            </div>
            <div class="owl-carousel product-carousel">
              <?php if ( class_exists( 'WooCommerce' ) ) {
                $modern_fashion_store_args = array( 
                  'post_type' => 'product',
                  'product_cat' => get_theme_mod('modern_fashion_store_product_category'),
                  'order' => 'ASC',
                  'posts_per_page' => '10'
                );
                $modern_fashion_store_loop = new WP_Query( $modern_fashion_store_args );
                while ( $modern_fashion_store_loop->have_posts() ) : $modern_fashion_store_loop->the_post(); 
                    global $product; ?>         
                    <div class="product-box">  
                          <div class="product-box-content">
                            <div class="product-outer">
                                <div class="product-image">
                                    <?php 
                                        if ( has_post_thumbnail() ) {
                                            echo get_the_post_thumbnail( get_the_ID(), 'shop_catalog' );
                                        } else {
                                            echo '<img src="' . esc_url(wc_placeholder_img_src()) . '" alt="Placeholder" />';
                                        }
                                    ?>
                                    <?php
                                        global $product;

                                        if ( $product->is_on_sale() && ! $product->is_type( 'variable' ) ) {
                                            $modern_fashion_store_regular_price = floatval( $product->get_regular_price() );
                                            $modern_fashion_store_sale_price    = floatval( $product->get_sale_price() );

                                            if ( $modern_fashion_store_regular_price > 0 ) {
                                                $modern_fashion_store_discount = round( ( ( $modern_fashion_store_regular_price - $modern_fashion_store_sale_price ) / $modern_fashion_store_regular_price ) * 100 );
                                                ?>
                                                <div class="sale-tag">
                                                    <?php echo $modern_fashion_store_discount . '% ' . esc_html__( 'OFF', 'modern-fashion-store' ); ?>
                                                </div>
                                                <?php
                                            }
                                        }
                                    ?>
                                    <?php
                                    global $product;

                                    if ( $product && $product->get_rating_count() ) : ?>
                                        <div class="main-rating">
                                            <div class="product-rating-badge">
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <?php
                                                $modern_fashion_store_average = $product->get_average_rating();
                                                printf( esc_html__( '%s', 'modern-fashion-store' ), esc_html( $modern_fashion_store_average ) );
                                                ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <h3 class="product-heading-text text-center text-uppercase mt-3 mb-2"><a href="<?php echo esc_url(get_permalink( $modern_fashion_store_loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                                <p class="mb-2 product-price text-center">
                                   <?php echo $product->get_price_html(); ?>
                                </p>
                                <div class="cart-button mt-2 text-center">
                                    <?php if ( $product->is_type( 'simple' ) ) : ?>
                                        <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>"
                                           data-quantity="1"
                                           class="button add_to_cart_button ajax_add_to_cart"
                                           data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"
                                           rel="nofollow">
                                           <?php echo esc_html__( 'Add to Bag', 'modern-fashion-store' ); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                          </div>
                    </div> 
                <?php endwhile; wp_reset_postdata(); ?>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>  