<?php

$modern_fashion_store_tp_theme_css = '';

$modern_fashion_store_theme_lay = get_theme_mod( 'modern_fashion_store_tp_body_layout_settings','Full');
if($modern_fashion_store_theme_lay == 'Container'){
$modern_fashion_store_tp_theme_css .='body{';
$modern_fashion_store_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$modern_fashion_store_tp_theme_css .='}';
$modern_fashion_store_tp_theme_css .='@media screen and (max-width:575px){';
$modern_fashion_store_tp_theme_css .='body{';
	$modern_fashion_store_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
$modern_fashion_store_tp_theme_css .='} }';
$modern_fashion_store_tp_theme_css .='.scrolled{';
$modern_fashion_store_tp_theme_css .='width: auto; left:0; right:0;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_theme_lay == 'Container Fluid'){
$modern_fashion_store_tp_theme_css .='body{';
$modern_fashion_store_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$modern_fashion_store_tp_theme_css .='}';
$modern_fashion_store_tp_theme_css .='@media screen and (max-width:575px){';
$modern_fashion_store_tp_theme_css .='body{';
	$modern_fashion_store_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
$modern_fashion_store_tp_theme_css .='} }';
$modern_fashion_store_tp_theme_css .='.scrolled{';
$modern_fashion_store_tp_theme_css .='width: auto; left:0; right:0;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_theme_lay == 'Full'){
$modern_fashion_store_tp_theme_css .='body{';
$modern_fashion_store_tp_theme_css .='max-width: 100%;';
$modern_fashion_store_tp_theme_css .='}';
}

$modern_fashion_store_scroll_position = get_theme_mod( 'modern_fashion_store_scroll_top_position','Right');
if($modern_fashion_store_scroll_position == 'Right'){
$modern_fashion_store_tp_theme_css .='#return-to-top{';
$modern_fashion_store_tp_theme_css .='right: 20px;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_scroll_position == 'Left'){
$modern_fashion_store_tp_theme_css .='#return-to-top{';
$modern_fashion_store_tp_theme_css .='left: 20px;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_scroll_position == 'Center'){
$modern_fashion_store_tp_theme_css .='#return-to-top{';
$modern_fashion_store_tp_theme_css .='right: 50%;left: 50%;';
$modern_fashion_store_tp_theme_css .='}';
}

// related post
$modern_fashion_store_related_post_mob = get_theme_mod('modern_fashion_store_related_post_mob', true);
$modern_fashion_store_related_post = get_theme_mod('modern_fashion_store_remove_related_post', true);
$modern_fashion_store_tp_theme_css .= '.related-post-block {';
if ($modern_fashion_store_related_post == false) {
    $modern_fashion_store_tp_theme_css .= 'display: none;';
}
$modern_fashion_store_tp_theme_css .= '}';
$modern_fashion_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($modern_fashion_store_related_post == false || $modern_fashion_store_related_post_mob == false) {
    $modern_fashion_store_tp_theme_css .= '.related-post-block { display: none; }';
}
$modern_fashion_store_tp_theme_css .= '}';

// slider btn
$modern_fashion_store_slider_buttom_mob = get_theme_mod('modern_fashion_store_slider_buttom_mob', true);
$modern_fashion_store_slider_button = get_theme_mod('modern_fashion_store_slider_button', true);
$modern_fashion_store_tp_theme_css .= '#main-slider .more-btn {';
if ($modern_fashion_store_slider_button == false) {
    $modern_fashion_store_tp_theme_css .= 'display: none;';
}
$modern_fashion_store_tp_theme_css .= '}';
$modern_fashion_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($modern_fashion_store_slider_button == false || $modern_fashion_store_slider_buttom_mob == false) {
    $modern_fashion_store_tp_theme_css .= '#main-slider .more-btn { display: none; }';
}
$modern_fashion_store_tp_theme_css .= '}';

//return to header mobile               
$modern_fashion_store_return_to_header_mob = get_theme_mod('modern_fashion_store_return_to_header_mob', true);
$modern_fashion_store_return_to_header = get_theme_mod('modern_fashion_store_return_to_header', true);
$modern_fashion_store_tp_theme_css .= '.return-to-header{';
if ($modern_fashion_store_return_to_header == false) {
    $modern_fashion_store_tp_theme_css .= 'display: none;';
}
$modern_fashion_store_tp_theme_css .= '}';
$modern_fashion_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($modern_fashion_store_return_to_header == false || $modern_fashion_store_return_to_header_mob == false) {
    $modern_fashion_store_tp_theme_css .= '.return-to-header{ display: none; }';
}
$modern_fashion_store_tp_theme_css .= '}';

//blog description              
$modern_fashion_store_mobile_blog_description = get_theme_mod('modern_fashion_store_mobile_blog_description', true);
$modern_fashion_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($modern_fashion_store_mobile_blog_description == false) {
    $modern_fashion_store_tp_theme_css .= '.blog-description{ display: none; }';
}
$modern_fashion_store_tp_theme_css .= '}';


$modern_fashion_store_footer_widget_image = get_theme_mod('modern_fashion_store_footer_widget_image');
if($modern_fashion_store_footer_widget_image != false){
$modern_fashion_store_tp_theme_css .='#footer{';
$modern_fashion_store_tp_theme_css .='background: url('.esc_attr($modern_fashion_store_footer_widget_image).');';
$modern_fashion_store_tp_theme_css .='}';
}

//Social icon Font size
$modern_fashion_store_social_icon_fontsize = get_theme_mod('modern_fashion_store_social_icon_fontsize');
$modern_fashion_store_tp_theme_css .='.social-media a i{';
$modern_fashion_store_tp_theme_css .='font-size: '.esc_attr($modern_fashion_store_social_icon_fontsize).'px;';
$modern_fashion_store_tp_theme_css .='}';

// site title and tagline font size option
$modern_fashion_store_site_title_font_size = get_theme_mod('modern_fashion_store_site_title_font_size', ''); {
$modern_fashion_store_tp_theme_css .='.logo h1 a, .logo p a{';
$modern_fashion_store_tp_theme_css .='font-size: '.esc_attr($modern_fashion_store_site_title_font_size).'px !important;';
$modern_fashion_store_tp_theme_css .='}';
}

$modern_fashion_store_site_tagline_font_size = get_theme_mod('modern_fashion_store_site_tagline_font_size', '');{
$modern_fashion_store_tp_theme_css .='.logo p{';
$modern_fashion_store_tp_theme_css .='font-size: '.esc_attr($modern_fashion_store_site_tagline_font_size).'px;';
$modern_fashion_store_tp_theme_css .='}';
}

$modern_fashion_store_related_product = get_theme_mod('modern_fashion_store_related_product',true);
if($modern_fashion_store_related_product == false){
$modern_fashion_store_tp_theme_css .='.related.products{';
	$modern_fashion_store_tp_theme_css .='display: none;';
$modern_fashion_store_tp_theme_css .='}';
}

//menu font size
$modern_fashion_store_menu_font_size = get_theme_mod('modern_fashion_store_menu_font_size', '');{
$modern_fashion_store_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after, .main-navigation li.menu-item-has-children:after{';
	$modern_fashion_store_tp_theme_css .='font-size: '.esc_attr($modern_fashion_store_menu_font_size).'px;';
$modern_fashion_store_tp_theme_css .='}';
}

// menu text transform
$modern_fashion_store_menu_text_tranform = get_theme_mod( 'modern_fashion_store_menu_text_tranform','');
if($modern_fashion_store_menu_text_tranform == 'Uppercase'){
$modern_fashion_store_tp_theme_css .='.main-navigation a {';
	$modern_fashion_store_tp_theme_css .='text-transform: uppercase;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_menu_text_tranform == 'Lowercase'){
$modern_fashion_store_tp_theme_css .='.main-navigation a {';
	$modern_fashion_store_tp_theme_css .='text-transform: lowercase;';
$modern_fashion_store_tp_theme_css .='}';
}
else if($modern_fashion_store_menu_text_tranform == 'Capitalize'){
$modern_fashion_store_tp_theme_css .='.main-navigation a {';
	$modern_fashion_store_tp_theme_css .='text-transform: capitalize;';
$modern_fashion_store_tp_theme_css .='}';
}

//sale position
$modern_fashion_store_scroll_position = get_theme_mod( 'modern_fashion_store_sale_tag_position','right');
if($modern_fashion_store_scroll_position == 'right'){
$modern_fashion_store_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $modern_fashion_store_tp_theme_css .='right: 25px !important;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_scroll_position == 'left'){
$modern_fashion_store_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $modern_fashion_store_tp_theme_css .='left: 25px !important; right: auto !important;';
$modern_fashion_store_tp_theme_css .='}';
}

$modern_fashion_store_woocommerce_sale_font_size = get_theme_mod('modern_fashion_store_woocommerce_sale_font_size');
if($modern_fashion_store_woocommerce_sale_font_size != false){
    $modern_fashion_store_tp_theme_css .='.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{';
        $modern_fashion_store_tp_theme_css .='font-size: '.esc_attr($modern_fashion_store_woocommerce_sale_font_size).'px;';
    $modern_fashion_store_tp_theme_css .='}';
}

$modern_fashion_store_woocommerce_sale_padding_top_bottom = get_theme_mod('modern_fashion_store_woocommerce_sale_padding_top_bottom');
if($modern_fashion_store_woocommerce_sale_padding_top_bottom != false){
    $modern_fashion_store_tp_theme_css .='.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{';
        $modern_fashion_store_tp_theme_css .='padding-top: '.esc_attr($modern_fashion_store_woocommerce_sale_padding_top_bottom).'px; padding-bottom: '.esc_attr($modern_fashion_store_woocommerce_sale_padding_top_bottom).'px;';
    $modern_fashion_store_tp_theme_css .='}';
}

$modern_fashion_store_woocommerce_sale_padding_left_right = get_theme_mod('modern_fashion_store_woocommerce_sale_padding_left_right');
if($modern_fashion_store_woocommerce_sale_padding_left_right != false){
    $modern_fashion_store_tp_theme_css .='.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{';
        $modern_fashion_store_tp_theme_css .='padding-left: '.esc_attr($modern_fashion_store_woocommerce_sale_padding_left_right).'px !Important; padding-right: '.esc_attr($modern_fashion_store_woocommerce_sale_padding_left_right).'px !important;';
    $modern_fashion_store_tp_theme_css .='}';
}

$modern_fashion_store_woocommerce_sale_border_radius = get_theme_mod('modern_fashion_store_woocommerce_sale_border_radius', 100);
if($modern_fashion_store_woocommerce_sale_border_radius != false){
    $modern_fashion_store_tp_theme_css .='.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{';
        $modern_fashion_store_tp_theme_css .='border-radius: '.esc_attr($modern_fashion_store_woocommerce_sale_border_radius).'% !important;';
    $modern_fashion_store_tp_theme_css .='}';
}

//Font Weight
$modern_fashion_store_menu_font_weight = get_theme_mod( 'modern_fashion_store_menu_font_weight','');
if($modern_fashion_store_menu_font_weight == '100'){
$modern_fashion_store_tp_theme_css .='.main-navigation a{';
    $modern_fashion_store_tp_theme_css .='font-weight: 100;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_menu_font_weight == '200'){
$modern_fashion_store_tp_theme_css .='.main-navigation a{';
    $modern_fashion_store_tp_theme_css .='font-weight: 200;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_menu_font_weight == '300'){
$modern_fashion_store_tp_theme_css .='.main-navigation a{';
    $modern_fashion_store_tp_theme_css .='font-weight: 300;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_menu_font_weight == '400'){
$modern_fashion_store_tp_theme_css .='.main-navigation a{';
    $modern_fashion_store_tp_theme_css .='font-weight: 400;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_menu_font_weight == '500'){
$modern_fashion_store_tp_theme_css .='.main-navigation a{';
    $modern_fashion_store_tp_theme_css .='font-weight: 500;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_menu_font_weight == '600'){
$modern_fashion_store_tp_theme_css .='.main-navigation a{';
    $modern_fashion_store_tp_theme_css .='font-weight: 600;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_menu_font_weight == '700'){
$modern_fashion_store_tp_theme_css .='.main-navigation a{';
    $modern_fashion_store_tp_theme_css .='font-weight: 700;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_menu_font_weight == '800'){
$modern_fashion_store_tp_theme_css .='.main-navigation a{';
    $modern_fashion_store_tp_theme_css .='font-weight: 800;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_menu_font_weight == '900'){
$modern_fashion_store_tp_theme_css .='.main-navigation a{';
    $modern_fashion_store_tp_theme_css .='font-weight: 900;';
$modern_fashion_store_tp_theme_css .='}';
}

/*------------- Blog Page------------------*/
$modern_fashion_store_post_image_round = get_theme_mod('modern_fashion_store_post_image_round', 0);
if($modern_fashion_store_post_image_round != false){
    $modern_fashion_store_tp_theme_css .='.blog .box-image img{';
        $modern_fashion_store_tp_theme_css .='border-radius: '.esc_attr($modern_fashion_store_post_image_round).'px;';
    $modern_fashion_store_tp_theme_css .='}';
}

$modern_fashion_store_post_image_width = get_theme_mod('modern_fashion_store_post_image_width', '');
if($modern_fashion_store_post_image_width != false){
    $modern_fashion_store_tp_theme_css .='.blog .box-image img{';
        $modern_fashion_store_tp_theme_css .='Width: '.esc_attr($modern_fashion_store_post_image_width).'px;';
    $modern_fashion_store_tp_theme_css .='}';
}

$modern_fashion_store_post_image_length = get_theme_mod('modern_fashion_store_post_image_length', '');
if($modern_fashion_store_post_image_length != false){
    $modern_fashion_store_tp_theme_css .='.blog .box-image img{';
        $modern_fashion_store_tp_theme_css .='height: '.esc_attr($modern_fashion_store_post_image_length).'px;';
    $modern_fashion_store_tp_theme_css .='}';
}

// footer widget title font size
$modern_fashion_store_footer_widget_title_font_size = get_theme_mod('modern_fashion_store_footer_widget_title_font_size', '');{
$modern_fashion_store_tp_theme_css .='#footer h3, #footer h2.wp-block-heading{';
    $modern_fashion_store_tp_theme_css .='font-size: '.esc_attr($modern_fashion_store_footer_widget_title_font_size).'px;';
$modern_fashion_store_tp_theme_css .='}';
}

// Copyright text font size
$modern_fashion_store_footer_copyright_font_size = get_theme_mod('modern_fashion_store_footer_copyright_font_size', '');{
$modern_fashion_store_tp_theme_css .='#footer .site-info p{';
    $modern_fashion_store_tp_theme_css .='font-size: '.esc_attr($modern_fashion_store_footer_copyright_font_size).'px;';
$modern_fashion_store_tp_theme_css .='}';
}

// copyright padding
$modern_fashion_store_footer_copyright_top_bottom_padding = get_theme_mod('modern_fashion_store_footer_copyright_top_bottom_padding', '');
if ($modern_fashion_store_footer_copyright_top_bottom_padding !== '') { 
    $modern_fashion_store_tp_theme_css .= '.site-info {';
    $modern_fashion_store_tp_theme_css .= 'padding-top: ' . esc_attr($modern_fashion_store_footer_copyright_top_bottom_padding) . 'px;';
    $modern_fashion_store_tp_theme_css .= 'padding-bottom: ' . esc_attr($modern_fashion_store_footer_copyright_top_bottom_padding) . 'px;';
    $modern_fashion_store_tp_theme_css .= '}';
}

// copyright position
$modern_fashion_store_copyright_text_position = get_theme_mod( 'modern_fashion_store_copyright_text_position','Center');
if($modern_fashion_store_copyright_text_position == 'Center'){
$modern_fashion_store_tp_theme_css .='#footer .site-info p{';
$modern_fashion_store_tp_theme_css .='text-align:center;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_copyright_text_position == 'Left'){
$modern_fashion_store_tp_theme_css .='#footer .site-info p{';
$modern_fashion_store_tp_theme_css .='text-align:left;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_copyright_text_position == 'Right'){
$modern_fashion_store_tp_theme_css .='#footer .site-info p{';
$modern_fashion_store_tp_theme_css .='text-align:right;';
$modern_fashion_store_tp_theme_css .='}';
}

// Header Image title font size
$modern_fashion_store_header_image_title_font_size = get_theme_mod('modern_fashion_store_header_image_title_font_size', '40');{
$modern_fashion_store_tp_theme_css .='.box-text h2{';
    $modern_fashion_store_tp_theme_css .='font-size: '.esc_attr($modern_fashion_store_header_image_title_font_size).'px;';
$modern_fashion_store_tp_theme_css .='}';
}

/*--------------------------- banner image Opacity -------------------*/
    $modern_fashion_store_theme_lay = get_theme_mod( 'modern_fashion_store_header_banner_opacity_color','0.5');
        if($modern_fashion_store_theme_lay == '0'){
            $modern_fashion_store_tp_theme_css .='.single-page-img, .featured-image{';
                $modern_fashion_store_tp_theme_css .='opacity:0';
            $modern_fashion_store_tp_theme_css .='}';
        }else if($modern_fashion_store_theme_lay == '0.1'){
            $modern_fashion_store_tp_theme_css .='.single-page-img, .featured-image{';
                $modern_fashion_store_tp_theme_css .='opacity:0.1';
            $modern_fashion_store_tp_theme_css .='}';
        }else if($modern_fashion_store_theme_lay == '0.2'){
            $modern_fashion_store_tp_theme_css .='.single-page-img, .featured-image{';
                $modern_fashion_store_tp_theme_css .='opacity:0.2';
            $modern_fashion_store_tp_theme_css .='}';
        }else if($modern_fashion_store_theme_lay == '0.3'){
            $modern_fashion_store_tp_theme_css .='.single-page-img, .featured-image{';
                $modern_fashion_store_tp_theme_css .='opacity:0.3';
            $modern_fashion_store_tp_theme_css .='}';
        }else if($modern_fashion_store_theme_lay == '0.4'){
            $modern_fashion_store_tp_theme_css .='.single-page-img, .featured-image{';
                $modern_fashion_store_tp_theme_css .='opacity:0.4';
            $modern_fashion_store_tp_theme_css .='}';
        }else if($modern_fashion_store_theme_lay == '0.5'){
            $modern_fashion_store_tp_theme_css .='.single-page-img, .featured-image{';
                $modern_fashion_store_tp_theme_css .='opacity:0.5';
            $modern_fashion_store_tp_theme_css .='}';
        }else if($modern_fashion_store_theme_lay == '0.6'){
            $modern_fashion_store_tp_theme_css .='.single-page-img, .featured-image{';
                $modern_fashion_store_tp_theme_css .='opacity:0.6';
            $modern_fashion_store_tp_theme_css .='}';
        }else if($modern_fashion_store_theme_lay == '0.7'){
            $modern_fashion_store_tp_theme_css .='.single-page-img, .featured-image{';
                $modern_fashion_store_tp_theme_css .='opacity:0.7';
            $modern_fashion_store_tp_theme_css .='}';
        }else if($modern_fashion_store_theme_lay == '0.8'){
            $modern_fashion_store_tp_theme_css .='.single-page-img, .featured-image{';
                $modern_fashion_store_tp_theme_css .='opacity:0.8';
            $modern_fashion_store_tp_theme_css .='}';
        }else if($modern_fashion_store_theme_lay == '0.9'){
            $modern_fashion_store_tp_theme_css .='.single-page-img, .featured-image{';
                $modern_fashion_store_tp_theme_css .='opacity:0.9';
            $modern_fashion_store_tp_theme_css .='}';
        }else if($modern_fashion_store_theme_lay == '1'){
            $modern_fashion_store_tp_theme_css .='#main-slider img{';
                $modern_fashion_store_tp_theme_css .='opacity:1';
            $modern_fashion_store_tp_theme_css .='}';
        }

    $modern_fashion_store_header_banner_image_overlay = get_theme_mod('modern_fashion_store_header_banner_image_overlay', true);
    if($modern_fashion_store_header_banner_image_overlay == false){
        $modern_fashion_store_tp_theme_css .='.single-page-img, .featured-image{';
            $modern_fashion_store_tp_theme_css .='opacity:1;';
        $modern_fashion_store_tp_theme_css .='}';
    }

    $modern_fashion_store_header_banner_image_ooverlay_color = get_theme_mod('modern_fashion_store_header_banner_image_ooverlay_color', true);
    if($modern_fashion_store_header_banner_image_ooverlay_color != false){
        $modern_fashion_store_tp_theme_css .='.box-image-page{';
            $modern_fashion_store_tp_theme_css .='background-color: '.esc_attr($modern_fashion_store_header_banner_image_ooverlay_color).';';
        $modern_fashion_store_tp_theme_css .='}';
    }

    // Slider Height
    $modern_fashion_store_slider_img_height      = get_theme_mod('modern_fashion_store_slider_img_height');
    $modern_fashion_store_slider_img_height_resp = get_theme_mod('modern_fashion_store_slider_img_height_responsive');

    // Desktop height
    $modern_fashion_store_tp_theme_css .= '@media screen and (min-width: 768px) {';
    $modern_fashion_store_tp_theme_css .= '#slider .slider-border img {';
    if ( $modern_fashion_store_slider_img_height ) {
        $modern_fashion_store_tp_theme_css .= 'height: ' . esc_attr( $modern_fashion_store_slider_img_height ) . ';';
    }
    $modern_fashion_store_tp_theme_css .= 'width: 100%;';
    $modern_fashion_store_tp_theme_css .= '}';
    $modern_fashion_store_tp_theme_css .= '}';

    // Mobile height
    $modern_fashion_store_tp_theme_css .= '@media screen and (max-width: 767px) {';
    $modern_fashion_store_tp_theme_css .= '#slider .slider-border img {';
    if ( $modern_fashion_store_slider_img_height_resp ) {
        $modern_fashion_store_tp_theme_css .= 'height: ' . esc_attr( $modern_fashion_store_slider_img_height_resp ) . ' !important;';
    }
    $modern_fashion_store_tp_theme_css .= 'width: 100%;';
    $modern_fashion_store_tp_theme_css .= '}';
    $modern_fashion_store_tp_theme_css .= '}';

    //First Cap ( Blog Post )
    $modern_fashion_store_show_first_caps = get_theme_mod('modern_fashion_store_show_first_caps', 'false');
    if($modern_fashion_store_show_first_caps == 'true' ){
    $modern_fashion_store_tp_theme_css .='.blog .page-box p:nth-of-type(1)::first-letter{';
    $modern_fashion_store_tp_theme_css .=' font-size: 55px; font-weight: 600;';
    $modern_fashion_store_tp_theme_css .=' margin-right: 6px;';
    $modern_fashion_store_tp_theme_css .=' line-height: 1;';
    $modern_fashion_store_tp_theme_css .='}';
    }elseif($modern_fashion_store_show_first_caps == 'false' ){
    $modern_fashion_store_tp_theme_css .='.blog .page-box p:nth-of-type(1)::first-letter {';
    $modern_fashion_store_tp_theme_css .='display: none;';
    $modern_fashion_store_tp_theme_css .='}';
    }

    // Menu hover effect
    $modern_fashion_store_menus_item = get_theme_mod( 'modern_fashion_store_menus_item_style','None');
    if($modern_fashion_store_menus_item == 'None'){
        $modern_fashion_store_tp_theme_css .='.main-navigation a:hover{';
            $modern_fashion_store_tp_theme_css .='';
        $modern_fashion_store_tp_theme_css .='}';
    }else if($modern_fashion_store_menus_item == 'Zoom In'){
        $modern_fashion_store_tp_theme_css .='.main-navigation a:hover{';
            $modern_fashion_store_tp_theme_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
        $modern_fashion_store_tp_theme_css .='}';
    }

    
// footer widget letter case
$modern_fashion_store_footer_widget_title_text_tranform = get_theme_mod( 'modern_fashion_store_footer_widget_title_text_tranform','');
if($modern_fashion_store_footer_widget_title_text_tranform == 'Uppercase'){
$modern_fashion_store_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $modern_fashion_store_tp_theme_css .='text-transform: uppercase;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_widget_title_text_tranform == 'Lowercase'){
$modern_fashion_store_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $modern_fashion_store_tp_theme_css .='text-transform: lowercase;';
$modern_fashion_store_tp_theme_css .='}';
}
else if($modern_fashion_store_footer_widget_title_text_tranform == 'Capitalize'){
$modern_fashion_store_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $modern_fashion_store_tp_theme_css .='text-transform: capitalize;';
$modern_fashion_store_tp_theme_css .='}';
}

//Footer Font Weight
$modern_fashion_store_footer_widget_title_font_weight = get_theme_mod( 'modern_fashion_store_footer_widget_title_font_weight','');
if($modern_fashion_store_footer_widget_title_font_weight == '100'){
$modern_fashion_store_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $modern_fashion_store_tp_theme_css .='font-weight: 100;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_widget_title_font_weight == '200'){
$modern_fashion_store_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $modern_fashion_store_tp_theme_css .='font-weight: 200;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_widget_title_font_weight == '300'){
$modern_fashion_store_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $modern_fashion_store_tp_theme_css .='font-weight: 300;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_widget_title_font_weight == '400'){
$modern_fashion_store_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $modern_fashion_store_tp_theme_css .='font-weight: 400;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_widget_title_font_weight == '500'){
$modern_fashion_store_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $modern_fashion_store_tp_theme_css .='font-weight: 500;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_widget_title_font_weight == '600'){
$modern_fashion_store_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $modern_fashion_store_tp_theme_css .='font-weight: 600;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_widget_title_font_weight == '700'){
$modern_fashion_store_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $modern_fashion_store_tp_theme_css .='font-weight: 700;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_widget_title_font_weight == '800'){
$modern_fashion_store_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $modern_fashion_store_tp_theme_css .='font-weight: 800;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_widget_title_font_weight == '900'){
$modern_fashion_store_tp_theme_css .='#footer h2, #footer h3, #footer h1.wp-block-heading, #footer h2.wp-block-heading, #footer h3.wp-block-heading, #footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading {';
    $modern_fashion_store_tp_theme_css .='font-weight: 900;';
$modern_fashion_store_tp_theme_css .='}';
}

// footer widget position
$modern_fashion_store_footer_widget_title_position = get_theme_mod( 'modern_fashion_store_footer_widget_title_position','');
if($modern_fashion_store_footer_widget_title_position == 'Right'){
$modern_fashion_store_tp_theme_css .='#footer aside.widget-area{';
$modern_fashion_store_tp_theme_css .='text-align: right;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_widget_title_position == 'Left'){
$modern_fashion_store_tp_theme_css .='#footer aside.widget-area{';
$modern_fashion_store_tp_theme_css .='text-align: left;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_widget_title_position == 'Center'){
$modern_fashion_store_tp_theme_css .='#footer aside.widget-area{';
$modern_fashion_store_tp_theme_css .='text-align: center;';
$modern_fashion_store_tp_theme_css .='}';
}
