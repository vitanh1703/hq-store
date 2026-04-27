<?php
/**
 * Header file for the Online clothing store WordPress theme.
 * @package Online clothing store
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if( function_exists('wp_body_open') ){
    wp_body_open();
}
$online_clothing_store_theme_loader = get_theme_mod('online_clothing_store_theme_loader', false);
if ( 1 === (int) $online_clothing_store_theme_loader ) {
    ?>
    <div class="preloader">
      <div class="loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <?php
}
$online_clothing_store_default = online_clothing_store_get_default_theme_options(); ?>

<div id="online-clothing-store-page" class="online-clothing-store-hfeed online-clothing-store-site">
<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e('Skip to the content', 'online-clothing-store'); ?></a>

<?php
    get_template_part( 'template-parts/header/header', 'layout' );
?>

<div id="content" class="site-content">