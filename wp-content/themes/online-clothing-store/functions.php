<?php
/**
 * Online clothing store functions and definitions
 * @package Online clothing store
 */

if ( ! function_exists( 'online_clothing_store_after_theme_support' ) ) :

	function online_clothing_store_after_theme_support() {
		
		add_theme_support( 'automatic-feed-links' );

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'online_clothing_store_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

        load_theme_textdomain( 'online-clothing-store', get_template_directory() . '/languages' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
			'video',  
			'audio',  
			'gallery',
			'quote',  
			'image',  
			'link',   
			'status', 
			'aside',  
			'chat',   
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
        add_theme_support( 'woocommerce' );
		add_theme_support( 'wp-block-styles' );

		require get_template_directory() . '/inc/metabox.php';
		require get_template_directory() . '/inc/homepage-setup/homepage-setup-settings.php';

		if (! defined( 'ONLINE_CLOTHING_STORE_BUY_NOW' ) ){
		define('ONLINE_CLOTHING_STORE_BUY_NOW',__('https://www.omegathemes.com/products/clothing-store-wordpress-theme','online-clothing-store'));
		}
		if (! defined( 'ONLINE_CLOTHING_STORE_SUPPORT_FREE' ) ){
		define('ONLINE_CLOTHING_STORE_SUPPORT_FREE',__('https://wordpress.org/support/theme/online-clothing-store/','online-clothing-store'));
		}
		if (! defined( 'ONLINE_CLOTHING_STORE_DEMO_PRO' ) ){
		define('ONLINE_CLOTHING_STORE_DEMO_PRO',__('https://layout.omegathemes.com/online-clothing-store/','online-clothing-store'));
		}
		if (! defined( 'ONLINE_CLOTHING_STORE_LITE_DOCS_PRO' ) ){
		define('ONLINE_CLOTHING_STORE_LITE_DOCS_PRO',__('https://layout.omegathemes.com/steps/free-online-clothing-store/','online-clothing-store'));
		}
		if (! defined('ONLINE_CLOTHING_STORE_BUNDLE_BUTTON') ){
			define('ONLINE_CLOTHING_STORE_BUNDLE_BUTTON',__('https://www.omegathemes.com/products/wp-theme-bundle','online-clothing-store'));
		}
	}

endif;

add_action( 'after_setup_theme', 'online_clothing_store_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function online_clothing_store_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $online_clothing_store_theme_version = wp_get_theme()->get( 'Version' );
	$online_clothing_store_fonts_url = online_clothing_store_fonts_url();
    if( $online_clothing_store_fonts_url ){
    	require get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'online-clothing-store-google-fonts',
			wptt_get_webfont_url( $online_clothing_store_fonts_url ),
			array(),
			$online_clothing_store_theme_version
		);
    }
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/lib/custom/css/owl.carousel.min.css');
	wp_enqueue_style( 'online-clothing-store-style', get_stylesheet_uri(), array(), $online_clothing_store_theme_version );

	wp_enqueue_style( 'online-clothing-store-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom_css.php' );
	wp_add_inline_style( 'online-clothing-store-style',$online_clothing_store_custom_css );

	$online_clothing_store_css = '';

	if ( get_header_image() ) :

		$online_clothing_store_css .=  '
			.header-navbar{
				background-image: url('.esc_url(get_header_image()).');
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'online-clothing-store-style', $online_clothing_store_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
    wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/lib/custom/js/owl.carousel.js', array('jquery'), '', 1);
	wp_enqueue_script( 'online-clothing-store-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);
	wp_localize_script(
        'online-clothing-store-custom',
        'ajax_obj',
        array(
            'ajaxurl' => admin_url('admin-ajax.php')
        )
    );

    // Global Query
    if( is_front_page() ){

    	$online_clothing_store_posts_per_page = absint( get_option('posts_per_page') );
        $online_clothing_store_c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $online_clothing_store_posts_args = array(
            'posts_per_page'        => $online_clothing_store_posts_per_page,
            'paged'                 => $online_clothing_store_c_paged,
        );
        $posts_qry = new WP_Query( $online_clothing_store_posts_args );
        $max = $posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $online_clothing_store_c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $online_clothing_store_default = online_clothing_store_get_default_theme_options();
    $online_clothing_store_pagination_layout = get_theme_mod( 'online_clothing_store_pagination_layout',$online_clothing_store_default['online_clothing_store_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'online_clothing_store_register_styles',200 );

function online_clothing_store_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('online-clothing-store-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'online_clothing_store_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function online_clothing_store_menus() {

	$online_clothing_store_locations = array(
		'online-clothing-store-primary-menu'  => esc_html__( 'Primary Menu', 'online-clothing-store' ),
	);

	register_nav_menus( $online_clothing_store_locations );
}

add_action( 'init', 'online_clothing_store_menus' );

add_filter('loop_shop_columns', 'online_clothing_store_loop_columns');
if (!function_exists('online_clothing_store_loop_columns')) {
	function online_clothing_store_loop_columns() {
		$online_clothing_store_columns = get_theme_mod( 'online_clothing_store_per_columns', 3 );
		return $online_clothing_store_columns;
	}
}

add_filter( 'loop_shop_per_page', 'online_clothing_store_per_page', 20 );
function online_clothing_store_per_page( $online_clothing_store_cols ) {
  	$online_clothing_store_cols = get_theme_mod( 'online_clothing_store_product_per_page', 9 );
	return $online_clothing_store_cols;
}

function online_clothing_store_products_args( $online_clothing_store_args ) {

    $online_clothing_store_args['posts_per_page'] = get_theme_mod( 'online_clothing_store_custom_related_products_number', 6 );

    $online_clothing_store_args['columns'] = get_theme_mod( 'online_clothing_store_custom_related_products_number_per_row', 3 );

    return $online_clothing_store_args;
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';
require get_template_directory() . '/inc/general.php';
require get_template_directory() . '/inc/homepage-setup/whizzie.php';

function online_clothing_store_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'online_clothing_store_remove_customize_register', 11 );

function online_clothing_store_radio_sanitize(  $online_clothing_store_input, $online_clothing_store_setting  ) {
	$online_clothing_store_input = sanitize_key( $online_clothing_store_input );
	$online_clothing_store_choices = $online_clothing_store_setting->manager->get_control( $online_clothing_store_setting->id )->choices;
	return ( array_key_exists( $online_clothing_store_input, $online_clothing_store_choices ) ? $online_clothing_store_input : $online_clothing_store_setting->default );
}

// NOTICE FUNCTION

function online_clothing_store_admin_notice() { 
    global $pagenow;
    $theme_args = wp_get_theme();
    $meta = get_option( 'online_clothing_store_admin_notice' );
    $name = $theme_args->get( 'Name' );
    $current_screen = get_current_screen();

    if ( ! $meta ) {
        if ( is_network_admin() ) {
            return;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( $current_screen->base != 'appearance_page_onlineclothingstore-wizard' ) {
            ?>
            <div class="notice notice-success notice-content">
                <h2><?php esc_html_e('Welcome! Thank you for choosing Online clothing store. Let’s Set Up Your Website!', 'online-clothing-store') ?> </h2>
                <p><?php esc_html_e('Before you dive into customization, let’s go through a quick setup process to ensure everything runs smoothly. Click below to start setting up your website in minutes!', 'online-clothing-store') ?> </p>
                <div class="info-link">
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=onlineclothingstore-wizard' ) ); ?>"><?php esc_html_e('Get Started with Online clothing store', 'online-clothing-store'); ?></a>
					<a href="#" class="notice-bundle" id="bundleTrigger"><?php esc_html_e('Get All WP Themes', 'online-clothing-store'); ?></a>
					<div class="bundle-overlay" id="bundlePopup">
						<div class="bundle-modal">
							<span class="close-popup">&times;</span>
							<div class="sale-badge"><?php esc_html_e('🔥 MEGA SALE', 'online-clothing-store'); ?></div>
							<h2><?php esc_html_e('Unlock All Premium WP Themes', 'online-clothing-store'); ?></h2>
							<p> <?php esc_html_e('Unlock the Full Potential of Your Website with Our 50+ WordPress Themes Bundle', 'online-clothing-store'); ?></p>
							<ul>
								<li><?php esc_html_e('✔ Expert Support', 'online-clothing-store'); ?></li>
								<li><?php esc_html_e('✔ Premium Theme ZIP File', 'online-clothing-store'); ?></li>
								<li><?php esc_html_e('✔ Ready-to-Use Website Templates', 'online-clothing-store'); ?></li>
								<li><?php esc_html_e('✔ Demo Content (Included in the file)', 'online-clothing-store'); ?></li>
								<li><?php esc_html_e('✔ Access to the Premium Support Forum', 'online-clothing-store'); ?></li>
							</ul>
							<a href="<?php echo esc_url( ONLINE_CLOTHING_STORE_BUNDLE_BUTTON ); ?>" target="_blank" class="bundle-cta"><?php esc_html_e('Get the Bundle Now →', 'online-clothing-store'); ?></a>
						</div>
					</div>
                </div>
                <p class="dismiss-link"><strong><a href="?online_clothing_store_admin_notice=1"><?php esc_html_e( 'Dismiss', 'online-clothing-store' ); ?></a></strong></p>
            </div>
            <?php
        }
    }
}
add_action( 'admin_notices', 'online_clothing_store_admin_notice' );

if ( ! function_exists( 'online_clothing_store_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
 */
function online_clothing_store_update_admin_notice() {
    if ( isset( $_GET['online_clothing_store_admin_notice'] ) && $_GET['online_clothing_store_admin_notice'] == '1' ) {
        update_option( 'online_clothing_store_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'online_clothing_store_update_admin_notice' );

add_action( 'wp_ajax_get_product_rating', 'online_clothing_store_get_product_rating' );
add_action( 'wp_ajax_nopriv_get_product_rating', 'online_clothing_store_get_product_rating' );

function online_clothing_store_get_product_rating() {
    if ( ! isset($_POST['product_id']) ) {
        wp_send_json_error( [ 'message' => 'No product ID given' ] );
    }

    $product_id = intval( $_POST['product_id'] );
    $product    = wc_get_product( $product_id );

    if ( ! $product ) {
        wp_send_json_error( [ 'message' => 'Invalid product' ] );
    }

    $average      = $product->get_average_rating();
    $review_count = $product->get_review_count();

    wp_send_json_success( [
        'average'      => $average,
        'review_count' => $review_count,
    ] );
}

add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );

add_action( 'init', function() {
    update_option( 'elementor_onboard_wizard_completed', 'yes' );
});