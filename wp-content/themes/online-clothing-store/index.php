<?php
/**
 * The main template file
 * @package Online clothing store
 * @since 1.0.0
 */

get_header();

$online_clothing_store_layout = online_clothing_store_get_final_sidebar_layout();
$online_clothing_store_column_class = ($online_clothing_store_layout === 'right-sidebar') ? 'column-order-1' : 'column-order-2';

// ✅ Check if Elementor plugin is active
if ( class_exists('\Elementor\Plugin') ) : ?>

    <!-- Elementor Active → Show Main Theme Layout -->
    <div class="archive-main-block">
        <div class="wrapper">
            <div class="column-row <?php echo esc_attr($online_clothing_store_layout === 'no-sidebar' ? 'no-sidebar-layout' : ''); ?>">

                <div id="primary" class="content-area <?php echo esc_attr($online_clothing_store_column_class); ?>">
                    <main id="site-content" role="main">

                        <?php
                        if ( !is_front_page() ) {
                            online_clothing_store_breadcrumb();
                        }

                        if ( have_posts() ) : ?>

                            <div class="article-wraper article-wraper-archive">
                                <?php
                                while ( have_posts() ) :
                                    the_post();
                                    get_template_part('template-parts/content', get_post_format());
                                endwhile;
                                ?>
                            </div>

                            <?php
                            if ( is_search() ) {
                                the_posts_pagination();
                            } else {
                                do_action('online_clothing_store_posts_pagination');
                            }

                        else :
                            get_template_part('template-parts/content', 'none');
                        endif;
                        ?>
                    </main>
                </div>

                <?php if ( $online_clothing_store_layout !== 'no-sidebar' ) get_sidebar(); ?>

            </div>
        </div>
    </div>

<?php else : ?>

    <!-- Elementor NOT Active → Show Static Fallback Content -->
    <section class="frontpage-static">
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="wrapper">
                <div class="hero-column">
                    <div class="hero-left">
                        <div class="hero-text">
                            <h2><?php echo esc_html('The Ultimate New ','online-clothing-store'); ?><br><?php echo esc_html('Best Winter ','online-clothing-store'); ?><br><?php echo esc_html('Collection','online-clothing-store'); ?> </h2>
                            <p><?php echo esc_html('Lorem Ipsum is simply d,ummy text of','online-clothing-store'); ?><br><?php echo esc_html('the printing and typesetting industry.','online-clothing-store'); ?></p>
                            <a href="#" class="btn-shop"><?php echo esc_html('Shop Collections','online-clothing-store'); ?></a>
                        </div>
                        <div class="hero-image">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/banner.png' ); ?>">
                        </div>
                    </div>
                    <div class="hero-right">
                        <div class="sale-card" style="background: url(<?php echo esc_url( get_template_directory_uri() . '/assets/images/right-banner-bg.png' ); ?>);">
                            <h2><?php echo esc_html('SALE','online-clothing-store'); ?></h2>
                            <div class="image-box">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/right-banner.png' ); ?>" >
                                <div class="discount-badge">
                                    <?php echo esc_html('30%','online-clothing-store'); ?> <span><?php echo esc_html('Off','online-clothing-store'); ?></span>
                                </div>
                                <h4><?php echo esc_html('The Ultimate Collection','online-clothing-store'); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial + Products -->
        <div class="wrapper">
            <div class="product-section">
                <div class="testimonial-main">
                    <h4 class="mb-4 fw-bold"><?php echo esc_html('Testimonial','online-clothing-store'); ?></h4>
                    <div class="testimonial-card">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/team.png' ); ?>">
                        <h5><?php echo esc_html('John Verma','online-clothing-store'); ?></h5>
                        <h6><?php echo esc_html('Business CEO','online-clothing-store'); ?></h6>
                        <p class="mt-3"><?php echo esc_html('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','online-clothing-store'); ?></p>
                    </div>
                </div>
                <div class="product-main">
                    <h4 class="mb-4 fw-bold"><?php echo esc_html('Grab Your Favorite Winter Clothes','online-clothing-store'); ?></h4>
                    <div class="product-box">
                        <div class="product-card">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Wearslim-Warm-Knit-Hats.png' ); ?>">
                            <h5><?php echo esc_html('JACKET','online-clothing-store'); ?></h5>
                            <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free v5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z"/></svg></span>
                            <h3> <a href="#"><?php echo esc_html('Wearsilm Warm Knit Hats','online-clothing-store'); ?></a></h3>
                            <p class="price"><?php echo esc_html('$99.99','online-clothing-store'); ?></p>
                            <div class="rating"><?php echo esc_html('★★★★★','online-clothing-store'); ?> <small><?php echo esc_html('4.9 (59 Reviews)','online-clothing-store'); ?></small></div>
                            <button class="btn-bag"><?php echo esc_html('Add to Bag','online-clothing-store'); ?></button>
                        </div>
                        <div class="product-card">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Touch-Screen-Texting-cap.png' ); ?>">
                            <h5><?php echo esc_html('Earmuffs','online-clothing-store'); ?></h5>
                            <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free v5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z"/></svg></span>
                            <h3> <a href="#"><?php echo esc_html('Touch Screen Texting cap','online-clothing-store'); ?></a></h3>
                            <p class="price"><?php echo esc_html('$99.99','online-clothing-store'); ?></p>
                            <div class="rating"><?php echo esc_html('★★★★★','online-clothing-store'); ?> <small><?php echo esc_html('4.9 (59 Reviews)','online-clothing-store'); ?></small></div>
                            <button class="btn-bag"><?php echo esc_html('Add to Bag','online-clothing-store'); ?></button>
                        </div>
                        <div class="product-card">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Unisex-Hoodie.png' ); ?>">
                            <h5><?php echo esc_html('HOODIE','online-clothing-store'); ?></h5>
                            <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free v5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z"/></svg></span>
                            <h3> <a href="#"><?php echo esc_html('Unisex Hoodie','online-clothing-store'); ?></a></h3>
                            <p class="price"><?php echo esc_html('$99.99','online-clothing-store'); ?></p>
                            <div class="rating"><?php echo esc_html('★★★★★','online-clothing-store'); ?> <small><?php echo esc_html('4.9 (59 Reviews)','online-clothing-store'); ?></small></div>
                            <button class="btn-bag"><?php echo esc_html('Add to Bag','online-clothing-store'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

<?php endif; ?>

<?php get_footer(); ?>
