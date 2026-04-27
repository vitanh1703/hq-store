<?php
/**
* Widget Functions.
*
* @package Online clothing store
*/

function online_clothing_store_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'online-clothing-store'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'online-clothing-store'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $online_clothing_store_default = online_clothing_store_get_default_theme_options();
    $online_clothing_store_footer_column_layout = absint( get_theme_mod( 'online_clothing_store_footer_column_layout',$online_clothing_store_default['online_clothing_store_footer_column_layout'] ) );

    for( $i = 0; $i < $online_clothing_store_footer_column_layout; $i++ ){
    	
    	if( $i == 0 ){ $count = esc_html__('One','online-clothing-store'); }
    	if( $i == 1 ){ $count = esc_html__('Two','online-clothing-store'); }
    	if( $i == 2 ){ $count = esc_html__('Three','online-clothing-store'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'online-clothing-store').$count,
	        'id' => 'online-clothing-store-footer-widget-'.$i,
	        'description' => esc_html__('Add widgets here.', 'online-clothing-store'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'online_clothing_store_widgets_init');