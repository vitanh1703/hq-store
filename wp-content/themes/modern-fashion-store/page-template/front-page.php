<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Modern Fashion Store
 * @subpackage modern_fashion_store
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'modern_fashion_store_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'modern_fashion_store_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/our-products' ); ?>
	<?php do_action( 'modern_fashion_store_after_our-products' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'modern_fashion_store_after_home_content' ); ?>
</main>

<?php get_footer();