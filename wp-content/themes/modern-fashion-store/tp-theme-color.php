<?php
	
	$modern_fashion_store_tp_theme_css = '';

	// 1st color
	$modern_fashion_store_tp_color_option_first = get_theme_mod('modern_fashion_store_tp_color_option_first', '#212121');
	if ($modern_fashion_store_tp_color_option_first) {
		$modern_fashion_store_tp_theme_css .= ':root {';
		$modern_fashion_store_tp_theme_css .= '--color-primary1: ' . esc_attr($modern_fashion_store_tp_color_option_first) . ';';
		$modern_fashion_store_tp_theme_css .= '}';
	}

	// preloader
	$modern_fashion_store_tp_preloader_color1_option = get_theme_mod('modern_fashion_store_tp_preloader_color1_option');
	if($modern_fashion_store_tp_preloader_color1_option != false){
	$modern_fashion_store_tp_theme_css .='.center1{';
		$modern_fashion_store_tp_theme_css .='border-color: '.esc_attr($modern_fashion_store_tp_preloader_color1_option).' !important;';
	$modern_fashion_store_tp_theme_css .='}';
	}
	if($modern_fashion_store_tp_preloader_color1_option != false){
	$modern_fashion_store_tp_theme_css .='.center1 .ring::before{';
		$modern_fashion_store_tp_theme_css .='background: '.esc_attr($modern_fashion_store_tp_preloader_color1_option).' !important;';
	$modern_fashion_store_tp_theme_css .='}';
	}

	$modern_fashion_store_tp_preloader_color2_option = get_theme_mod('modern_fashion_store_tp_preloader_color2_option');

	if($modern_fashion_store_tp_preloader_color2_option != false){
	$modern_fashion_store_tp_theme_css .='.center2{';
		$modern_fashion_store_tp_theme_css .='border-color: '.esc_attr($modern_fashion_store_tp_preloader_color2_option).' !important;';
	$modern_fashion_store_tp_theme_css .='}';
	}
	if($modern_fashion_store_tp_preloader_color2_option != false){
	$modern_fashion_store_tp_theme_css .='.center2 .ring::before{';
		$modern_fashion_store_tp_theme_css .='background: '.esc_attr($modern_fashion_store_tp_preloader_color2_option).' !important;';
	$modern_fashion_store_tp_theme_css .='}';
	}

	$modern_fashion_store_tp_preloader_bg_color_option = get_theme_mod('modern_fashion_store_tp_preloader_bg_color_option');

	if($modern_fashion_store_tp_preloader_bg_color_option != false){
	$modern_fashion_store_tp_theme_css .='.loader{';
		$modern_fashion_store_tp_theme_css .='background: '.esc_attr($modern_fashion_store_tp_preloader_bg_color_option).';';
	$modern_fashion_store_tp_theme_css .='}';
	}

	$modern_fashion_store_tp_footer_bg_color_option = get_theme_mod('modern_fashion_store_tp_footer_bg_color_option');


	if($modern_fashion_store_tp_footer_bg_color_option != false){
	$modern_fashion_store_tp_theme_css .='#footer{';
		$modern_fashion_store_tp_theme_css .='background: '.esc_attr($modern_fashion_store_tp_footer_bg_color_option).';';
	$modern_fashion_store_tp_theme_css .='}';
	}

	// logo tagline color
	$modern_fashion_store_site_tagline_color = get_theme_mod('modern_fashion_store_site_tagline_color');

	if($modern_fashion_store_site_tagline_color != false){
	$modern_fashion_store_tp_theme_css .='.logo h1 a, .logo p a, .logo p.site-title a{';
	$modern_fashion_store_tp_theme_css .='color: '.esc_attr($modern_fashion_store_site_tagline_color).';';
	$modern_fashion_store_tp_theme_css .='}';
	}

	$modern_fashion_store_logo_tagline_color = get_theme_mod('modern_fashion_store_logo_tagline_color');
	if($modern_fashion_store_logo_tagline_color != false){
	$modern_fashion_store_tp_theme_css .='p.site-description{';
	$modern_fashion_store_tp_theme_css .='color: '.esc_attr($modern_fashion_store_logo_tagline_color).';';
	$modern_fashion_store_tp_theme_css .='}';
	}

	// footer widget title color
	$modern_fashion_store_footer_widget_title_color = get_theme_mod('modern_fashion_store_footer_widget_title_color');
	if($modern_fashion_store_footer_widget_title_color != false){
	$modern_fashion_store_tp_theme_css .='#footer h3, #footer h2.wp-block-heading{';
	$modern_fashion_store_tp_theme_css .='color: '.esc_attr($modern_fashion_store_footer_widget_title_color).';';
	$modern_fashion_store_tp_theme_css .='}';
	}

	// copyright text color
	$modern_fashion_store_footer_copyright_text_color = get_theme_mod('modern_fashion_store_footer_copyright_text_color');
	if($modern_fashion_store_footer_copyright_text_color != false){
	$modern_fashion_store_tp_theme_css .='#footer .site-info p, #footer .site-info a {';
	$modern_fashion_store_tp_theme_css .='color: '.esc_attr($modern_fashion_store_footer_copyright_text_color).'!important;';
	$modern_fashion_store_tp_theme_css .='}';
	}

	// header image title color
	$modern_fashion_store_header_image_title_text_color = get_theme_mod('modern_fashion_store_header_image_title_text_color');
	if($modern_fashion_store_header_image_title_text_color != false){
	$modern_fashion_store_tp_theme_css .='.box-text h2{';
	$modern_fashion_store_tp_theme_css .='color: '.esc_attr($modern_fashion_store_header_image_title_text_color).';';
	$modern_fashion_store_tp_theme_css .='}';
	}

	// menu color
	$modern_fashion_store_menu_color = get_theme_mod('modern_fashion_store_menu_color');
	if($modern_fashion_store_menu_color != false){
	$modern_fashion_store_tp_theme_css .='.main-navigation a{';
	$modern_fashion_store_tp_theme_css .='color: '.esc_attr($modern_fashion_store_menu_color).';';
	$modern_fashion_store_tp_theme_css .='}';
}


//Footer Font Weight
$modern_fashion_store_footer_copyright_title_font_weight = get_theme_mod( 'modern_fashion_store_footer_copyright_title_font_weight','');
if($modern_fashion_store_footer_copyright_title_font_weight == '100'){
$modern_fashion_store_tp_theme_css .='#footer .site-info p {';
    $modern_fashion_store_tp_theme_css .='font-weight: 100;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_copyright_title_font_weight == '200'){
$modern_fashion_store_tp_theme_css .='#footer .site-info p {';
    $modern_fashion_store_tp_theme_css .='font-weight: 200;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_copyright_title_font_weight == '300'){
$modern_fashion_store_tp_theme_css .='#footer .site-info p {';
    $modern_fashion_store_tp_theme_css .='font-weight: 300;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_copyright_title_font_weight == '400'){
$modern_fashion_store_tp_theme_css .='#footer .site-info p {';
    $modern_fashion_store_tp_theme_css .='font-weight: 400;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_copyright_title_font_weight == '500'){
$modern_fashion_store_tp_theme_css .='#footer .site-info p {';
    $modern_fashion_store_tp_theme_css .='font-weight: 500;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_copyright_title_font_weight == '600'){
$modern_fashion_store_tp_theme_css .='#footer .site-info p {';
    $modern_fashion_store_tp_theme_css .='font-weight: 600;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_copyright_title_font_weight == '700'){
$modern_fashion_store_tp_theme_css .='#footer .site-info p {';
    $modern_fashion_store_tp_theme_css .='font-weight: 700;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_copyright_title_font_weight == '800'){
$modern_fashion_store_tp_theme_css .='#footer .site-info p {';
    $modern_fashion_store_tp_theme_css .='font-weight: 800;';
$modern_fashion_store_tp_theme_css .='}';
}else if($modern_fashion_store_footer_copyright_title_font_weight == '900'){
$modern_fashion_store_tp_theme_css .='#footer .site-info p {';
    $modern_fashion_store_tp_theme_css .='font-weight: 900;';
$modern_fashion_store_tp_theme_css .='}';
}