<?php
/**
 * The template for displaying single posts and pages.
 * @package Online clothing store
 * @since 1.0.0
 */

get_header();

$online_clothing_store_default = online_clothing_store_get_default_theme_options();
$online_clothing_store_global_layout = get_theme_mod('online_clothing_store_global_sidebar_layout', $online_clothing_store_default['online_clothing_store_global_sidebar_layout']);
$online_clothing_store_page_layout = get_theme_mod('online_clothing_store_page_sidebar_layout', $online_clothing_store_global_layout);
$online_clothing_store_post_layout = get_theme_mod('online_clothing_store_post_sidebar_layout', $online_clothing_store_global_layout);
$online_clothing_store_post_meta = get_post_meta(get_the_ID(), 'online_clothing_store_post_sidebar_option', true);

$online_clothing_store_final_layout = $online_clothing_store_global_layout;
if (!empty($online_clothing_store_post_meta) && $online_clothing_store_post_meta !== 'default') {
    $online_clothing_store_final_layout = $online_clothing_store_post_meta;
} elseif (is_page() || (function_exists('is_shop') && is_shop())) {
    $online_clothing_store_final_layout = $online_clothing_store_page_layout;
} elseif (is_single()) {
    $online_clothing_store_final_layout = $online_clothing_store_post_layout;
}

// Set content column order based on sidebar layout
$online_clothing_store_sidebar_column_class = 'column-order-1';
if ($online_clothing_store_final_layout === 'left-sidebar') {
    $online_clothing_store_sidebar_column_class = 'column-order-2';
}

?>

<div id="single-page" class="singular-main-block">
    <div class="wrapper">
        <div class="column-row <?php echo esc_attr($online_clothing_store_final_layout === 'no-sidebar' ? 'no-sidebar-layout' : ''); ?>">

            <?php if ($online_clothing_store_final_layout === 'left-sidebar') : ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>

            <div id="primary" class="content-area <?php echo esc_attr($online_clothing_store_final_layout === 'no-sidebar' ? 'full-width-content' : $online_clothing_store_sidebar_column_class); ?>">
                <main id="site-content" role="main">

                    <?php
                    online_clothing_store_breadcrumb(); // Display breadcrumb

                    if (have_posts()) : ?>

                        <div class="article-wraper">
                            <?php while (have_posts()) : the_post(); ?>

                                <?php get_template_part('template-parts/content', 'single'); ?>

                                <?php if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) : ?>
                                    <div class="comments-wrapper">
                                        <?php comments_template(); ?>
                                    </div>
                                <?php endif; ?>

                            <?php endwhile; ?>
                        </div>

                    <?php else : ?>

                        <?php get_template_part('template-parts/content', 'none'); ?>

                    <?php endif;

                    do_action('online_clothing_store_navigation_action');
                    ?>

                </main>
            </div>

            <?php if ($online_clothing_store_final_layout === 'right-sidebar') : ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>