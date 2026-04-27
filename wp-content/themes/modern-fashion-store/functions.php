<?php
/**
 * Modern Fashion Store functions and definitions
 *
 * @package Modern Fashion Store
 * @subpackage modern_fashion_store
 */

function modern_fashion_store_setup() {

	load_theme_textdomain( 'modern-fashion-store', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'modern-fashion-store-featured-image', 2000, 1200, true );
	add_image_size( 'modern-fashion-store-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'modern-fashion-store' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
    	'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	add_theme_support( 'custom-header', apply_filters( 'modern_fashion_store_custom_header_args', array(
        'default-text-color' => 'fff',
        'header-text'        => false,
        'width'              => 1600,
        'height'             => 400,
        'flex-width'         => true,
        'flex-height'        => true,
        'wp-head-callback'   => 'modern_fashion_store_header_style',
        'default-image'      => get_template_directory_uri() . '/assets/images/sliderimage.png',
    ) ) );

	/**
	 * Implement the Custom Header feature.
	 */
	require get_parent_theme_file_path( '/inc/custom-header.php' );

}
add_action( 'after_setup_theme', 'modern_fashion_store_setup' );

// Add function after setup:
function modern_fashion_store_conditional_editor_styles() {
	
	add_editor_style( array( 'assets/css/editor-style.css', modern_fashion_store_fonts_url() ) );
}
add_action( 'after_setup_theme', 'modern_fashion_store_conditional_editor_styles', 11 );

/**
 * Register custom fonts.
 */
function modern_fashion_store_fonts_url(){
	$modern_fashion_store_font_url = '';
	$modern_fashion_store_font_family = array();
	$modern_fashion_store_font_family[] = 'Satisfy';
	$modern_fashion_store_font_family[] = 'Instrument+Sans:ital,wght@0,400..700;1,400..700';
	$modern_fashion_store_font_family[] = 'Plus Jakarta Sans:wght@0,200..800;1,200..800';
	$modern_fashion_store_font_family[] = 'Outfit:wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,90';
	$modern_fashion_store_font_family[] = 'Manrope:wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Oxanium:wght@200;300;400;500;600;700;800';
	$modern_fashion_store_font_family[] = 'Oswald:200,300,400,500,600,700';
	$modern_fashion_store_font_family[] = 'Roboto Serif:wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Bad Script';
	$modern_fashion_store_font_family[] = 'Bebas Neue';
	$modern_fashion_store_font_family[] = 'Fjalla One';
	$modern_fashion_store_font_family[] = 'PT Sans:ital,wght@0,400;0,700;1,400;1,700';
	$modern_fashion_store_font_family[] = 'PT Serif:ital,wght@0,400;0,700;1,400;1,700';
	$modern_fashion_store_font_family[] = 'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900';
	$modern_fashion_store_font_family[] = 'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$modern_fashion_store_font_family[] = 'Roboto+Flex:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Alex Brush';
	$modern_fashion_store_font_family[] = 'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Playball';
	$modern_fashion_store_font_family[] = 'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Julius Sans One';
	$modern_fashion_store_font_family[] = 'Arsenal:ital,wght@0,400;0,700;1,400;1,700';
	$modern_fashion_store_font_family[] = 'Slabo 13px';
	$modern_fashion_store_font_family[] = 'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900';
	$modern_fashion_store_font_family[] = 'Overpass Mono:wght@300;400;500;600;700';
	$modern_fashion_store_font_family[] = 'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900';
	$modern_fashion_store_font_family[] = 'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900';
	$modern_fashion_store_font_family[] = 'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$modern_fashion_store_font_family[] = 'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700';
	$modern_fashion_store_font_family[] = 'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$modern_fashion_store_font_family[] = 'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$modern_fashion_store_font_family[] = 'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Quicksand:wght@300;400;500;600;700';
	$modern_fashion_store_font_family[] = 'Padauk:wght@400;700';
	$modern_fashion_store_font_family[] = 'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$modern_fashion_store_font_family[] = 'Inconsolata:wght@200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$modern_fashion_store_font_family[] = 'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$modern_fashion_store_font_family[] = 'Pacifico';
	$modern_fashion_store_font_family[] = 'Indie Flower';
	$modern_fashion_store_font_family[] = 'VT323';
	$modern_fashion_store_font_family[] = 'Dosis:wght@200;300;400;500;600;700;800';
	$modern_fashion_store_font_family[] = 'Frank Ruhl Libre:wght@300;400;500;700;900';
	$modern_fashion_store_font_family[] = 'Fjalla One';
	$modern_fashion_store_font_family[] = 'Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Oxygen:wght@300;400;700';
	$modern_fashion_store_font_family[] = 'Arvo:ital,wght@0,400;0,700;1,400;1,700';
	$modern_fashion_store_font_family[] = 'Noto Serif:ital,wght@0,400;0,700;1,400;1,700';
	$modern_fashion_store_font_family[] = 'Lobster';
	$modern_fashion_store_font_family[] = 'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700';
	$modern_fashion_store_font_family[] = 'Yanone Kaffeesatz:wght@200;300;400;500;600;700';
	$modern_fashion_store_font_family[] = 'Anton';
	$modern_fashion_store_font_family[] = 'Libre Baskerville:ital,wght@0,400;0,700;1,400';
	$modern_fashion_store_font_family[] = 'Bree Serif';
	$modern_fashion_store_font_family[] = 'Gloria Hallelujah';
	$modern_fashion_store_font_family[] = 'Abril Fatface';
	$modern_fashion_store_font_family[] = 'Varela Round';
	$modern_fashion_store_font_family[] = 'Vampiro One';
	$modern_fashion_store_font_family[] = 'Shadows Into Light';
	$modern_fashion_store_font_family[] = 'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$modern_fashion_store_font_family[] = 'Rokkitt:wght@100;200;300;400;500;600;700;800;900';
	$modern_fashion_store_font_family[] = 'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Francois One';
	$modern_fashion_store_font_family[] = 'Orbitron:wght@400;500;600;700;800;900';
	$modern_fashion_store_font_family[] = 'Patua One';
	$modern_fashion_store_font_family[] = 'Acme';
	$modern_fashion_store_font_family[] = 'Satisfy';
	$modern_fashion_store_font_family[] = 'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700';
	$modern_fashion_store_font_family[] = 'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700';
	$modern_fashion_store_font_family[] = 'Architects Daughter';
	$modern_fashion_store_font_family[] = 'Russo One';
	$modern_fashion_store_font_family[] = 'Monda:wght@400;700';
	$modern_fashion_store_font_family[] = 'Righteous';
	$modern_fashion_store_font_family[] = 'Lobster Two:ital,wght@0,400;0,700;1,400;1,700';
	$modern_fashion_store_font_family[] = 'Hammersmith One';
	$modern_fashion_store_font_family[] = 'Courgette';
	$modern_fashion_store_font_family[] = 'Permanent Marke';
	$modern_fashion_store_font_family[] = 'Cherry Swash:wght@400;700';
	$modern_fashion_store_font_family[] = 'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700';
	$modern_fashion_store_font_family[] = 'Poiret One';
	$modern_fashion_store_font_family[] = 'BenchNine:wght@300;400;700';
	$modern_fashion_store_font_family[] = 'Economica:ital,wght@0,400;0,700;1,400;1,700';
	$modern_fashion_store_font_family[] = 'Handlee';
	$modern_fashion_store_font_family[] = 'Cardo:ital,wght@0,400;0,700;1,400';
	$modern_fashion_store_font_family[] = 'Alfa Slab One';
	$modern_fashion_store_font_family[] = 'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$modern_fashion_store_font_family[] = 'Cookie';
	$modern_fashion_store_font_family[] = 'Chewy';
	$modern_fashion_store_font_family[] = 'Great Vibes';
	$modern_fashion_store_font_family[] = 'Coming Soon';
	$modern_fashion_store_font_family[] = 'Philosopher:ital,wght@0,400;0,700;1,400;1,700';
	$modern_fashion_store_font_family[] = 'Days One';
	$modern_fashion_store_font_family[] = 'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Shrikhand';
	$modern_fashion_store_font_family[] = 'Tangerine:wght@400;700';
	$modern_fashion_store_font_family[] = 'IM Fell English SC';
	$modern_fashion_store_font_family[] = 'Boogaloo';
	$modern_fashion_store_font_family[] = 'Bangers';
	$modern_fashion_store_font_family[] = 'Fredoka One';
	$modern_fashion_store_font_family[] = 'Volkhov:ital,wght@0,400;0,700;1,400;1,700';
	$modern_fashion_store_font_family[] = 'Shadows Into Light Two';
	$modern_fashion_store_font_family[] = 'Marck Script';
	$modern_fashion_store_font_family[] = 'Sacramento';
	$modern_fashion_store_font_family[] = 'Unica One';
	$modern_fashion_store_font_family[] = 'Dancing Script:wght@400;500;600;700';
	$modern_fashion_store_font_family[] = 'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_fashion_store_font_family[] = 'DM Serif Display:ital@0;1';
	$modern_fashion_store_font_family[] = 'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800';
	$modern_fashion_store_font_family[] = 'Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800';

	$modern_fashion_store_query_args = array(
		'family'	=> rawurlencode(implode('|',$modern_fashion_store_font_family)),
	);
	$modern_fashion_store_font_url = add_query_arg($modern_fashion_store_query_args,'//fonts.googleapis.com/css');
	return $modern_fashion_store_font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $modern_fashion_store_font_url ) );
}

/**
 * Register widget area.
 */
function modern_fashion_store_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'modern-fashion-store' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'modern-fashion-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'modern-fashion-store' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'modern-fashion-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'modern-fashion-store' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'modern-fashion-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'modern-fashion-store' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-fashion-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'modern-fashion-store' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-fashion-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'modern-fashion-store' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-fashion-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'modern-fashion-store' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-fashion-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'modern_fashion_store_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function modern_fashion_store_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'modern-fashion-store-fonts', modern_fashion_store_fonts_url(), array(), null );

	// owl
	wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'modern-fashion-store-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	wp_add_inline_style( 'modern-fashion-store-style',$modern_fashion_store_tp_theme_css );
	wp_style_add_data('modern-fashion-store-style', 'rtl', 'replace');
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'modern-fashion-store-style',$modern_fashion_store_tp_theme_css );
	wp_style_add_data('modern-fashion-store-style', 'rtl', 'replace');

	// Theme block stylesheet.
	wp_enqueue_style( 'modern-fashion-store-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'modern-fashion-store-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );
	

	wp_enqueue_script( 'modern-fashion-store-custom-scripts', get_template_directory_uri() . '/assets/js/modern-fashion-store-custom.js', array('jquery'), true );


	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'modern-fashion-store-focus-nav', get_template_directory_uri() . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$modern_fashion_store_body_font_family = get_theme_mod('modern_fashion_store_body_font_family', '');

	$modern_fashion_store_heading_font_family = get_theme_mod('modern_fashion_store_heading_font_family', '');

	$modern_fashion_store_menu_font_family = get_theme_mod('modern_fashion_store_menu_font_family', '');

	$modern_fashion_store_tp_theme_css = '
		body, p.simplep, .more-btn a{
		    font-family: '.esc_html($modern_fashion_store_body_font_family).';
		}
		h1,h2, h3, h4, h5, h6, .menubar,.logo h1, .logo p.site-title, p.simplep a, #main-slider p.slidertop-title, .more-btn a,.wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button,.wc-block-cart__submit-container a,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #theme-sidebar button[type="submit"],
#footer button[type="submit"]{
		    font-family: '.esc_html($modern_fashion_store_heading_font_family).';
		}
	';
	wp_add_inline_style('modern-fashion-store-style', $modern_fashion_store_tp_theme_css);
}
add_action( 'wp_enqueue_scripts', 'modern_fashion_store_scripts' );


/*radio button sanitization*/
function modern_fashion_store_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Sanitize Sortable control.
function modern_fashion_store_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}
/* Excerpt Limit Begin */
function modern_fashion_store_excerpt_function($excerpt_count = 35) {
    $modern_fashion_store_excerpt = get_the_excerpt();

    $MODERN_FASHION_STORE_TEXT_excerpt = wp_strip_all_tags($modern_fashion_store_excerpt);

    $modern_fashion_store_excerpt_limit = esc_attr(get_theme_mod('modern_fashion_store_excerpt_count', $excerpt_count));

    $modern_fashion_store_theme_excerpt = implode(' ', array_slice(explode(' ', $MODERN_FASHION_STORE_TEXT_excerpt), 0, $modern_fashion_store_excerpt_limit));

    return $modern_fashion_store_theme_excerpt;
}

function modern_fashion_store_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'modern_fashion_store_loop_columns');
if (!function_exists('modern_fashion_store_loop_columns')) {
	function modern_fashion_store_loop_columns() {
		$columns = get_theme_mod( 'modern_fashion_store_per_columns', 3 );
		return $columns;
	}
}

// Category count 
function modern_fashion_store_display_post_category_count() {
    $modern_fashion_store_category = get_the_category();
    $modern_fashion_store_category_count = ($modern_fashion_store_category) ? count($modern_fashion_store_category) : 0;
    $modern_fashion_store_category_text = ($modern_fashion_store_category_count === 1) ? 'category' : 'categories'; // Check for pluralization
    echo $modern_fashion_store_category_count . ' ' . $modern_fashion_store_category_text;
}

//post tag
function modern_fashion_store_custom_tags_filter($modern_fashion_store_tag_list) {
    // Replace the comma (,) with an empty string
    $modern_fashion_store_tag_list = str_replace(', ', '', $modern_fashion_store_tag_list);

    return $modern_fashion_store_tag_list;
}
add_filter('the_tags', 'modern_fashion_store_custom_tags_filter');

function modern_fashion_store_custom_output_tags() {
    $modern_fashion_store_tags = get_the_tags();

    if ($modern_fashion_store_tags) {
        $modern_fashion_store_tags_output = '<div class="post_tag">Tags: ';

        $modern_fashion_store_first_tag = reset($modern_fashion_store_tags);

        foreach ($modern_fashion_store_tags as $tag) {
            $modern_fashion_store_tags_output .= '<a href="' . esc_url(get_tag_link($tag)) . '" rel="tag" class="me-2">' . esc_html($tag->name) . '</a>';
            if ($tag !== $modern_fashion_store_first_tag) {
                $modern_fashion_store_tags_output .= ' ';
            }
        }

        $modern_fashion_store_tags_output .= '</div>';

        echo $modern_fashion_store_tags_output;
    }
}
//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'modern_fashion_store_per_page', 20 );
function modern_fashion_store_per_page( $modern_fashion_store_cols ) {
  	$modern_fashion_store_cols = get_theme_mod( 'modern_fashion_store_product_per_page', 9 );
	return $modern_fashion_store_cols;
}

function modern_fashion_store_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function modern_fashion_store_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function modern_fashion_store_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function modern_fashion_store_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template','modern_fashion_store_front_page_template' );

// logo
function modern_fashion_store_logo_width(){

	$modern_fashion_store_logo_width   = get_theme_mod( 'modern_fashion_store_logo_width', 80 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $modern_fashion_store_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'modern_fashion_store_logo_width' );

function modern_fashion_store_theme_setup() {

	define('MODERN_FASHION_STORE_CREDIT',__('https://www.themespride.com/products/modern-fashion-store','modern-fashion-store') );
	if ( ! function_exists( 'modern_fashion_store_credit' ) ) {
		function modern_fashion_store_credit(){
			echo "<a href=".esc_url(MODERN_FASHION_STORE_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('modern_fashion_store_footer_text',__('Modern Fashion Store WordPress Theme','modern-fashion-store')))."</a>";
		}
	}

	/**
	 * Custom template tags for this theme.
	 */
	require get_parent_theme_file_path( '/inc/template-tags.php' );

	/**
	 * Additional features to allow styling of the templates.
	 */
	require get_parent_theme_file_path( '/inc/template-functions.php' );

	/**
	 * Customizer additions.
	 */
	require get_parent_theme_file_path( '/inc/customizer.php' );

	/**
	 * Load Theme Web File
	 */
	require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
	/**
	 * Load Theme Web File
	 */
	require get_parent_theme_file_path( '/inc/controls/customize-control-toggle.php' );
	/**
	 * load sortable file
	 */
	require get_parent_theme_file_path( '/inc/controls/sortable-control.php' );

	/**
	 * TGM Recommendation
	 */
	require get_parent_theme_file_path( '/inc/TGM/tgm.php' );

	/**
	 * About Theme Page
	 */
	require get_parent_theme_file_path( '/inc/about-theme.php' );

}
add_action( 'after_setup_theme', 'modern_fashion_store_theme_setup' );


//Admin Enqueue for Admin
function modern_fashion_store_admin_enqueue_scripts(){
	wp_enqueue_style('modern-fashion-store-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
	wp_register_script( 'modern-fashion-store-admin-script', get_template_directory_uri() . '/assets/js/modern-fashion-store-admin.js', array( 'jquery' ), '', true );

	wp_localize_script(
		'modern-fashion-store-admin-script',
		'modern_fashion_store',
		array(
			'admin_ajax'	=>	admin_url('admin-ajax.php'),
			'wpnonce'			=>	wp_create_nonce('modern_fashion_store_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('modern-fashion-store-admin-script');

    wp_localize_script( 'modern-fashion-store-admin-script', 'modern_fashion_store_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'modern_fashion_store_admin_enqueue_scripts' );

// get started
add_action( 'wp_ajax_modern_fashion_store_dismissed_notice_handler', 'modern_fashion_store_ajax_notice_handler' );

function modern_fashion_store_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'modern_fashion_store_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function modern_fashion_store_activation_notice() { 

	if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>

    <div class="modern-fashion-store-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="modern-fashion-store-getting-started-notice clearfix">
        	<div class="row-top">
	            <div class="modern-fashion-store-theme-notice-content">
	                <h2 class="modern-fashion-store-notice-h2">
	                    <?php
	                printf(
	                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
	                    esc_html__( 'Install the Demo Import Plugin now to instantly set up your site like the live preview.', 'modern-fashion-store' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
	                ?>
	                </h2>
	                <a class="modern-fashion-store-btn-get-started button button-primary button-hero modern-fashion-store-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=modern-fashion-store-about' )); ?>" ><?php esc_html_e( 'Get Started with Modern Fashion Store Theme', 'modern-fashion-store' ) ?></a>
	            </div>
	            <div class="image-box">
			    	<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/theme-notice.png' ); ?>" alt="<?php echo esc_attr__( 'Modern Fashion Store', 'modern-fashion-store' ); ?>" />
				</div>
	        </div>
        </div>
    </div>
<?php }

}
add_action( 'admin_notices', 'modern_fashion_store_activation_notice' );

add_action('after_switch_theme', 'modern_fashion_store_setup_options');
function modern_fashion_store_setup_options () {
    update_option('dismissed-get_started', FALSE );
}

// Get Started Detail Notice - Dismiss permanently
function modern_fashion_store_dismissed_get_started_detail_notice() {
    update_option( 'dismissed-get_started-detail', true );
    wp_send_json_success();
}
add_action( 'wp_ajax_modern_fashion_store_dismissed_get_started_detail_notice', 'modern_fashion_store_dismissed_get_started_detail_notice' );
add_action( 'wp_ajax_nopriv_modern_fashion_store_dismissed_get_started_detail_notice', 'modern_fashion_store_dismissed_get_started_detail_notice' );

// Reset on theme switch
add_action('after_switch_theme', 'modern_fashion_store_setup_settings');
function modern_fashion_store_setup_settings() {
    update_option('dismissed-get_started', false );
    update_option('dismissed-get_started-detail', false );
}

add_action( 'wp_ajax_modern_fashion_store_popup_done', 'modern_fashion_store_popup_done' );
function modern_fashion_store_popup_done() {
	update_option( 'modern_fashion_store_demo_popup_shown', true );
	wp_die();
}

// Skip WooCommerce setup wizard after activation
add_filter('woocommerce_prevent_automatic_wizard_redirect', '__return_true');