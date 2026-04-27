<?php
/**
 * Modern Fashion Store: Customizer
 *
 * @package Modern Fashion Store
 * @subpackage modern_fashion_store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function Modern_Fashion_Store_Customize_register( $wp_customize ) {

	// Pro Version
    class modern_fashion_store_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>Unlock Premium <strong>'. esc_html( $this->label ) .'</strong>? </span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( MODERN_FASHION_STORE_BUY_TEXT,'modern-fashion-store' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function modern_fashion_store_sanitize_custom_control( $input ) {
        return $input;
    }

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');
	
	// Register the custom control type.
	$wp_customize->register_control_type( 'Modern_Fashion_Store_Toggle_Control' );
	
	//Register the sortable control type.
	$wp_customize->register_control_type( 'Modern_Fashion_Store_Control_Sortable' );

	//add home page setting pannel
	$wp_customize->add_panel( 'modern_fashion_store_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'modern-fashion-store' ),
	    'description' => __( 'Description of what this panel does.', 'modern-fashion-store' ),
	) );
	
	//TP GENRAL OPTION
	$wp_customize->add_section('modern_fashion_store_tp_general_settings',array(
        'title' => __('TP General Option', 'modern-fashion-store'),
        'priority' => 1,
        'panel' => 'modern_fashion_store_panel_id'
    ) );

    $wp_customize->add_setting('modern_fashion_store_tp_body_layout_settings',array(
        'default' => 'Full',
        'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
    $wp_customize->add_control('modern_fashion_store_tp_body_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Body Layout Setting', 'modern-fashion-store'),
        'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'modern-fashion-store'),
        'section' => 'modern_fashion_store_tp_general_settings',
        'choices' => array(
            'Full' => __('Full','modern-fashion-store'),
            'Container' => __('Container','modern-fashion-store'),
            'Container Fluid' => __('Container Fluid','modern-fashion-store')
        ),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('modern_fashion_store_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_fashion_store_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Sidebar Position', 'modern-fashion-store'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'modern-fashion-store'),
        'section' => 'modern_fashion_store_tp_general_settings',
        'choices' => array(
            'full' => __('Full','modern-fashion-store'),
            'left' => __('Left','modern-fashion-store'),
            'right' => __('Right','modern-fashion-store'),
            'three-column' => __('Three Columns','modern-fashion-store'),
            'four-column' => __('Four Columns','modern-fashion-store'),
            'grid' => __('Grid Layout','modern-fashion-store')
        ),
	) );

	// Add Settings and Controls for post sidebar Layout
	$wp_customize->add_setting('modern_fashion_store_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_fashion_store_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'modern-fashion-store'),
        'description'   => __('This option work for single blog page', 'modern-fashion-store'),
        'section' => 'modern_fashion_store_tp_general_settings',
        'choices' => array(
            'full' => __('Full','modern-fashion-store'),
            'left' => __('Left','modern-fashion-store'),
            'right' => __('Right','modern-fashion-store'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('modern_fashion_store_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_fashion_store_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'modern-fashion-store'),
        'description'   => __('This option work for pages.', 'modern-fashion-store'),
        'section' => 'modern_fashion_store_tp_general_settings',
        'choices' => array(
            'full' => __('Full','modern-fashion-store'),
            'left' => __('Left','modern-fashion-store'),
            'right' => __('Right','modern-fashion-store')
        ),
	) );

	$wp_customize->add_setting( 'modern_fashion_store_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_sticky', array(
		'label'       => esc_html__( 'Show Sticky Header', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_sticky',
	) ) );

	//tp typography option
	$modern_fashion_store_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'Inter'                  => 'Inter',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Karla'                  => 'Karla',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Manrope'           	 => 'Manrope',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Oxanium'                => 'Oxanium',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Roboto Serif'           => 'Roboto Serif',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Satisfy'                => 'Satisfy',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('modern_fashion_store_typography_option',array(
		'title'         => __('TP Typography Option', 'modern-fashion-store'),
		'priority' => 1,
		'panel' => 'modern_fashion_store_panel_id'
   	));

   	$wp_customize->add_setting('modern_fashion_store_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'modern_fashion_store_sanitize_choices',
	));
	$wp_customize->add_control(	'modern_fashion_store_heading_font_family', array(
		'section' => 'modern_fashion_store_typography_option',
		'label'   => __('heading Fonts', 'modern-fashion-store'),
		'type'    => 'select',
		'choices' => $modern_fashion_store_font_array,
	));

	$wp_customize->add_setting('modern_fashion_store_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'modern_fashion_store_sanitize_choices',
	));
	$wp_customize->add_control(	'modern_fashion_store_body_font_family', array(
		'section' => 'modern_fashion_store_typography_option',
		'label'   => __('Body Fonts', 'modern-fashion-store'),
		'type'    => 'select',
		'choices' => $modern_fashion_store_font_array,
	));

	//TP Preloader Option
	$wp_customize->add_section('modern_fashion_store_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'modern-fashion-store'),
		'priority' => 1,
		'panel' => 'modern_fashion_store_panel_id'
	) );

	$wp_customize->add_setting( 'modern_fashion_store_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_preloader_show_hide',
	) ) );

	$wp_customize->add_setting( 'modern_fashion_store_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_fashion_store_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'modern-fashion-store'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'modern-fashion-store'),
	    'section' => 'modern_fashion_store_prelaoder_option',
	    'settings' => 'modern_fashion_store_tp_preloader_color1_option',
  	)));

  	$wp_customize->add_setting( 'modern_fashion_store_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_fashion_store_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'modern-fashion-store'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'modern-fashion-store'),
	    'section' => 'modern_fashion_store_prelaoder_option',
	    'settings' => 'modern_fashion_store_tp_preloader_color2_option',
  	)));

  	$wp_customize->add_setting( 'modern_fashion_store_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_fashion_store_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'modern-fashion-store'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'modern-fashion-store'),
	    'section' => 'modern_fashion_store_prelaoder_option',
	    'settings' => 'modern_fashion_store_tp_preloader_bg_color_option',
  	)));

  	// Pro Version
    $wp_customize->add_setting( 'modern_fashion_store_preloader_pro_version_logo', array(
        'sanitize_callback' => 'modern_fashion_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new modern_fashion_store_Customize_Pro_Version ( $wp_customize,'modern_fashion_store_preloader_pro_version_logo', array(
        'section'     => 'modern_fashion_store_prelaoder_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'modern-fashion-store' ),
        'description' => esc_url( MODERN_FASHION_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//TP Color Option
	$wp_customize->add_section('modern_fashion_store_color_option',array(
     'title'         => __('TP Color Option', 'modern-fashion-store'),
     'priority' => 1,
     'panel' => 'modern_fashion_store_panel_id'
    ) );
    
	$wp_customize->add_setting( 'modern_fashion_store_tp_color_option_first', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_fashion_store_tp_color_option_first', array(
			'label'     => __('Theme First Color', 'modern-fashion-store'),
	    'description' => __('It will change the complete theme color in one click.', 'modern-fashion-store'),
	    'section' => 'modern_fashion_store_color_option',
	    'settings' => 'modern_fashion_store_tp_color_option_first',
  	)));

	//TP Blog Option
	$wp_customize->add_section('modern_fashion_store_blog_option',array(
        'title' => __('TP Blog Option', 'modern-fashion-store'),
        'priority' => 1,
        'panel' => 'modern_fashion_store_panel_id'
    ) );

    $wp_customize->add_setting('modern_fashion_store_edit_blog_page_title',array(
		'default'=> __('Home','modern-fashion-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_fashion_store_edit_blog_page_title',array(
		'label'	=> __('Change Blog Page Title','modern-fashion-store'),
		'section'=> 'modern_fashion_store_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('modern_fashion_store_edit_blog_page_description',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_fashion_store_edit_blog_page_description',array(
		'label'	=> __('Add Blog Page Description','modern-fashion-store'),
		'section'=> 'modern_fashion_store_blog_option',
		'type'=> 'text'
	));

	/** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment','category', 'time'),
        'sanitize_callback' => 'modern_fashion_store_sanitize_sortable',
    ));
    $wp_customize->add_control(new Modern_Fashion_Store_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'modern-fashion-store'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'modern-fashion-store') ,
        'section' => 'modern_fashion_store_blog_option',
        'choices' => array(
            'date' => __('date', 'modern-fashion-store') ,
            'author' => __('author', 'modern-fashion-store') ,
            'comment' => __('comment', 'modern-fashion-store') ,
            'category' => __('category', 'modern-fashion-store') ,
            'time' => __('time', 'modern-fashion-store') ,
        ) ,
    )));

    $wp_customize->add_setting( 'modern_fashion_store_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'modern_fashion_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'modern_fashion_store_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','modern-fashion-store' ),
		'section'     => 'modern_fashion_store_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('modern_fashion_store_show_first_caps',array(
        'default' => false,
        'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
    ));
	$wp_customize->add_control( 'modern_fashion_store_show_first_caps',array(
		'label' => esc_html__('First Cap (First Capital Letter)', 'modern-fashion-store'),
		'type' => 'checkbox',
		'section' => 'modern_fashion_store_blog_option',
	));

    $wp_customize->add_setting('modern_fashion_store_read_more_text',array(
		'default'=> __('Read More','modern-fashion-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_fashion_store_read_more_text',array(
		'label'	=> __('Edit Button Text','modern-fashion-store'),
		'section'=> 'modern_fashion_store_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('modern_fashion_store_post_image_round', array(
	  'default' => '0',
      'sanitize_callback' => 'modern_fashion_store_sanitize_number_range',
	));
	$wp_customize->add_control(new Modern_Fashion_Store_Range_Slider($wp_customize, 'modern_fashion_store_post_image_round', array(
       'section' => 'modern_fashion_store_blog_option',
      'label' => esc_html__('Edit Post Image Border Radius', 'modern-fashion-store'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 180,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('modern_fashion_store_post_image_width', array(
	  'default' => '',
      'sanitize_callback' => 'modern_fashion_store_sanitize_number_range',
	));
	$wp_customize->add_control(new Modern_Fashion_Store_Range_Slider($wp_customize, 'modern_fashion_store_post_image_width', array(
       'section' => 'modern_fashion_store_blog_option',
      'label' => esc_html__('Edit Post Image Width', 'modern-fashion-store'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 367,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('modern_fashion_store_post_image_length', array(
	  'default' => '',
      'sanitize_callback' => 'modern_fashion_store_sanitize_number_range',
	));
	$wp_customize->add_control(new Modern_Fashion_Store_Range_Slider($wp_customize, 'modern_fashion_store_post_image_length', array(
       'section' => 'modern_fashion_store_blog_option',
      'label' => esc_html__('Edit Post Image height', 'modern-fashion-store'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 900,
        'step' => 1
    )
	)));
	
	$wp_customize->add_setting( 'modern_fashion_store_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_blog_option',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_remove_read_button',
	) ) );

	$wp_customize->add_setting( 'modern_fashion_store_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_blog_option',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_remove_tags',
	) ) );

	$wp_customize->add_setting( 'modern_fashion_store_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_blog_option',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_remove_category',
	) ) );

	$wp_customize->add_setting( 'modern_fashion_store_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'modern-fashion-store' ),
	 'section'     => 'modern_fashion_store_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'modern_fashion_store_remove_comment',
	) ) );

	$wp_customize->add_setting( 'modern_fashion_store_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
 	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'modern-fashion-store' ),
	 'section'     => 'modern_fashion_store_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'modern_fashion_store_remove_related_post',
	) ) );

	$wp_customize->add_setting('modern_fashion_store_related_post_heading',array(
		'default'=> __('Related Posts','modern-fashion-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_fashion_store_related_post_heading',array(
		'label'	=> __('Edit Section Title','modern-fashion-store'),
		'section'=> 'modern_fashion_store_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'modern_fashion_store_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'modern_fashion_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'modern_fashion_store_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','modern-fashion-store' ),
		'section'     => 'modern_fashion_store_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );

	$wp_customize->add_setting( 'modern_fashion_store_related_post_per_columns', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'modern_fashion_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'modern_fashion_store_related_post_per_columns', array(
		'label'       => esc_html__( 'Related Post Per Row','modern-fashion-store' ),
		'section'     => 'modern_fashion_store_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	) );

	$wp_customize->add_setting('modern_fashion_store_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_fashion_store_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'modern-fashion-store'),
        'section' => 'modern_fashion_store_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','modern-fashion-store'),
            'content-image' => __('Content-Media','modern-fashion-store'),
        ),
	) );

	//TP Single Blog Option
	$wp_customize->add_section('modern_fashion_store_single_blog_option',array(
        'title' => __('Single Post Option', 'modern-fashion-store'),
        'priority' => 1,
        'panel' => 'modern_fashion_store_panel_id'
    ) );

    /** Meta Order */
    $wp_customize->add_setting('modern_fashion_store_single_blog_meta_order', array(
        'default' => array('date', 'author', 'comment','category', 'time'),
        'sanitize_callback' => 'modern_fashion_store_sanitize_sortable',
    ));
    $wp_customize->add_control(new Modern_Fashion_Store_Control_Sortable($wp_customize, 'modern_fashion_store_single_blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'modern-fashion-store'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'modern-fashion-store') ,
        'section' => 'modern_fashion_store_single_blog_option',
        'choices' => array(
            'date' => __('date', 'modern-fashion-store') ,
            'author' => __('author', 'modern-fashion-store') ,
            'comment' => __('comment', 'modern-fashion-store') ,
            'category' => __('category', 'modern-fashion-store') ,
            'time' => __('time', 'modern-fashion-store') ,
        ) ,
    )));

    $wp_customize->add_setting('modern_fashion_store_single_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Fashion_Store_Icon_Changer(
       $wp_customize,'modern_fashion_store_single_post_date_icon',array(
		'label'	=> __('Change Date Icon','modern-fashion-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_fashion_store_single_blog_option',
		'type'		=> 'modern-fashion-store-icon'
	)));

	$wp_customize->add_setting('modern_fashion_store_single_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Fashion_Store_Icon_Changer(
       $wp_customize,'modern_fashion_store_single_post_author_icon',array(
		'label'	=> __('Change Author Icon','modern-fashion-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_fashion_store_single_blog_option',
		'type'		=> 'modern-fashion-store-icon'
	)));

	$wp_customize->add_setting('modern_fashion_store_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Fashion_Store_Icon_Changer(
       $wp_customize,'modern_fashion_store_single_post_comment_icon',array(
		'label'	=> __('Change Comment Icon','modern-fashion-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_fashion_store_single_blog_option',
		'type'		=> 'modern-fashion-store-icon'
	)));

	$wp_customize->add_setting('modern_fashion_store_single_post_category_icon',array(
		'default'	=> 'fas fa-list',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Fashion_Store_Icon_Changer(
       $wp_customize,'modern_fashion_store_single_post_category_icon',array(
		'label'	=> __('Change Category Icon','modern-fashion-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_fashion_store_single_blog_option',
		'type'		=> 'modern-fashion-store-icon'
	)));

	$wp_customize->add_setting('modern_fashion_store_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Fashion_Store_Icon_Changer(
       $wp_customize,'modern_fashion_store_single_post_time_icon',array(
		'label'	=> __('Change Time Icon','modern-fashion-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_fashion_store_single_blog_option',
		'type'		=> 'modern-fashion-store-icon'
	)));

	//MENU TYPOGRAPHY
	$wp_customize->add_section( 'modern_fashion_store_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'modern-fashion-store' ),
    	'priority' => 2,
		'panel' => 'modern_fashion_store_panel_id'
	) );

	$wp_customize->add_setting('modern_fashion_store_menu_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_fashion_store_menu_font_weight',array(
     'type' => 'radio',
     'label'     => __('Font Weight', 'modern-fashion-store'),
     'section' => 'modern_fashion_store_menu_typography',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','modern-fashion-store'),
         '200' => __('200','modern-fashion-store'),
         '300' => __('300','modern-fashion-store'),
         '400' => __('400','modern-fashion-store'),
         '500' => __('500','modern-fashion-store'),
         '600' => __('600','modern-fashion-store'),
         '700' => __('700','modern-fashion-store'),
         '800' => __('800','modern-fashion-store'),
         '900' => __('900','modern-fashion-store')
     ),
	) );

	$wp_customize->add_setting('modern_fashion_store_menu_text_tranform',array(
		'default' => '',
		'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
 	));
 	$wp_customize->add_control('modern_fashion_store_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','modern-fashion-store'),
		'section' => 'modern_fashion_store_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','modern-fashion-store'),
		   'Lowercase' => __('Lowercase','modern-fashion-store'),
		   'Capitalize' => __('Capitalize','modern-fashion-store'),
		),
	) );

	$wp_customize->add_setting('modern_fashion_store_menus_item_style',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_fashion_store_menus_item_style',array(
		'type' => 'select',
		'section' => 'modern_fashion_store_menu_typography',
		'label' => __('Menu Hover Effect','modern-fashion-store'),
		'choices' => array(
			'None' => __('None','modern-fashion-store'),
			'Zoom In' => __('Zoom In','modern-fashion-store'),
		),
	) );

	$wp_customize->add_setting('modern_fashion_store_menu_font_size', array(
	  'default' => '',
      'sanitize_callback' => 'modern_fashion_store_sanitize_number_range',
	));
	$wp_customize->add_control(new Modern_Fashion_Store_Range_Slider($wp_customize, 'modern_fashion_store_menu_font_size', array(
        'section' => 'modern_fashion_store_menu_typography',
        'label' => esc_html__('Font Size', 'modern-fashion-store'),
        'input_attrs' => array(
          'min' => 0,
          'max' => 20,
          'step' => 1
    )
	)));

	$wp_customize->add_setting( 'modern_fashion_store_menu_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_fashion_store_menu_color', array(
			'label'     => __('Change Menu Color', 'modern-fashion-store'),
	    'section' => 'modern_fashion_store_menu_typography',
	    'settings' => 'modern_fashion_store_menu_color',
  	)));

  	// Pro Version
    $wp_customize->add_setting( 'modern_fashion_store_menu_pro_version_logo', array(
        'sanitize_callback' => 'modern_fashion_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new modern_fashion_store_Customize_Pro_Version ( $wp_customize,'modern_fashion_store_menu_pro_version_logo', array(
        'section'     => 'modern_fashion_store_menu_typography',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'modern-fashion-store' ),
        'description' => esc_url( MODERN_FASHION_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));

  	// header detail
	$wp_customize->add_section( 'modern_fashion_store_header_sec', array(
    	'title'      => __( 'Header Details', 'modern-fashion-store' ),
    	'description' => __( 'Add your Contact details here', 'modern-fashion-store' ),
		'panel' => 'modern_fashion_store_panel_id',
      'priority' => 2,
	) );

	$wp_customize->add_setting('modern_fashion_store_topbar_visibility', array(
	    'default'           => true, 
	    'transport'         => 'refresh',
	    'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	));
	$wp_customize->add_control(new Modern_Fashion_Store_Toggle_Control($wp_customize, 'modern_fashion_store_topbar_visibility', array(
	    'label'       => esc_html__('Show / Hide Topbar', 'modern-fashion-store'),
	    'section'     => 'modern_fashion_store_header_sec',
	    'type'        => 'toggle',
	    'settings'    => 'modern_fashion_store_topbar_visibility',
	)));

	$wp_customize->add_setting('modern_fashion_store_top_header_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_fashion_store_top_header_text',array(
		'label'	=> __('Add Top Text','modern-fashion-store'),
		'section'=> 'modern_fashion_store_header_sec',
		'type'=> 'text'
	));

	// Pro Version
    $wp_customize->add_setting( 'modern_fashion_store_header_pro_version_logo', array(
        'sanitize_callback' => 'modern_fashion_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new modern_fashion_store_Customize_Pro_Version ( $wp_customize,'modern_fashion_store_header_pro_version_logo', array(
        'section'     => 'modern_fashion_store_header_sec',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'modern-fashion-store' ),
        'description' => esc_url( MODERN_FASHION_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//home page slider
	$wp_customize->add_section( 'modern_fashion_store_slider_section' , array(
    	'title'      => __( 'Banner Section', 'modern-fashion-store' ),
    	'priority' => 3,
		'panel' => 'modern_fashion_store_panel_id'
	) );

	$wp_customize->add_setting( 'modern_fashion_store_slider_arrows', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide Banner', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_slider_section',
		'priority' => 1,
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_slider_arrows',
	) ) );

	$wp_customize->add_setting( 'modern_fashion_store_show_slider_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_show_slider_title', array(
		'label'       => esc_html__( 'Show / Hide Banner Heading', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_slider_section',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_show_slider_title',
	) ) );

	for ( $modern_fashion_store_count = 1; $modern_fashion_store_count <= 1; $modern_fashion_store_count++ ) {

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'modern_fashion_store_slider_page' . $modern_fashion_store_count, array(
		'default'           => '',
		'sanitize_callback' => 'modern_fashion_store_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'modern_fashion_store_slider_page' . $modern_fashion_store_count, array(
		'label'    => __( 'Select Banner Image Page', 'modern-fashion-store' ),
		'section'  => 'modern_fashion_store_slider_section',
		'type'     => 'dropdown-pages'
	) );

	}

	$wp_customize->add_setting('modern_fashion_store_btn_text1',array(
		'default' => __( 'Shop Now', 'modern-fashion-store' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_fashion_store_btn_text1',array(
		'label'	=> esc_html__('Change Banner Button Text','modern-fashion-store'),
		'section'=> 'modern_fashion_store_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('modern_fashion_store_btn_link1',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_fashion_store_btn_link1',array(
		'label'	=> esc_html__('Add Banner Button url','modern-fashion-store'),
		'section'=> 'modern_fashion_store_slider_section',
		'type'=> 'url'
	));

    //Slider height
    $wp_customize->add_setting('modern_fashion_store_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('modern_fashion_store_slider_img_height',array(
        'label' => __('Slider Height','modern-fashion-store'),
        'description'   => __('Add slider height in px(eg. 700px).','modern-fashion-store'),
        'section'=> 'modern_fashion_store_slider_section',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'modern_fashion_store_slider_pro_version_logo', array(
        'sanitize_callback' => 'modern_fashion_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new modern_fashion_store_Customize_Pro_Version ( $wp_customize,'modern_fashion_store_slider_pro_version_logo', array(
        'section'     => 'modern_fashion_store_slider_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'modern-fashion-store' ),
        'description' => esc_url( MODERN_FASHION_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	/*=========================================
	product Section
	=========================================*/
	// Service Section Settings
	$wp_customize->add_section('modern_fashion_store_project_section', array(
	  'title' => __('Our Products Section', 'modern-fashion-store'),
	  'panel' => 'modern_fashion_store_panel_id',
	  'priority' => 4,
	));

	$wp_customize->add_setting( 'modern_fashion_store_enable_product_section', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_enable_product_section', array(
		'label'       => esc_html__( 'Show / Hide Product Category Section', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_project_section',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_enable_product_section',
	) ) );

	// Section heading text
	$wp_customize->add_setting('modern_fashion_store_projetcs_main_text', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('modern_fashion_store_projetcs_main_text', array(
	    'label'   => esc_html__('Add Section Small Title', 'modern-fashion-store'),
	    'section' => 'modern_fashion_store_project_section',
	    'type'    => 'text',
	));

    /*Product Section Heading*/
    $wp_customize->add_setting(
        'modern_fashion_store_product_section_heading',
        array(
            'capability'        => 'edit_theme_options',
            'transport'         => 'refresh',
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'modern_fashion_store_product_section_heading',
        array(
            'label'       => __('Add Section Heading', 'modern-fashion-store'),
            'section'     => 'modern_fashion_store_project_section',
            'type'        => 'text',
        )
    );

    $args = array(
       'type'      => 'product',
        'taxonomy' => 'product_cat'
    );
	$categories = get_categories($args);
		$cat_posts = array();
			$modern_fashion_store_i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($modern_fashion_store_i==0){
			$default = $category->slug;
			$modern_fashion_store_i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('modern_fashion_store_product_category',array(
		'sanitize_callback' => 'modern_fashion_store_sanitize_choices',
		'default'           => 'select',
	));
	$wp_customize->add_control('modern_fashion_store_product_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Product Category','modern-fashion-store'),
		'section' => 'modern_fashion_store_project_section',
	));

	// Pro Version
    $wp_customize->add_setting( 'modern_fashion_store_about_pro_version_logo', array(
        'sanitize_callback' => 'modern_fashion_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new modern_fashion_store_Customize_Pro_Version ( $wp_customize,'modern_fashion_store_about_pro_version_logo', array(
        'section'     => 'modern_fashion_store_project_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'modern-fashion-store' ),
        'description' => esc_url( MODERN_FASHION_STORE_PRO_THEME_URL ),
    )));

	//footer
	$wp_customize->add_section('modern_fashion_store_footer_section',array(
		'title'	=> __('Footer Widget Settings','modern-fashion-store'),
		'panel' => 'modern_fashion_store_panel_id',
		'priority' => 4,
	));

	$wp_customize->add_setting('modern_fashion_store_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'modern_fashion_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_fashion_store_footer_columns',array(
		'label'	=> __('Footer Widget Columns','modern-fashion-store'),
		'section'	=> 'modern_fashion_store_footer_section',
		'setting'	=> 'modern_fashion_store_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'modern_fashion_store_tp_footer_bg_color_option', array(
		'default' => '#151515',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_fashion_store_tp_footer_bg_color_option', array(
		'label'     => __('Footer Widget Background Color', 'modern-fashion-store'),
		'description' => __('It will change the complete footer widget backgorund color.', 'modern-fashion-store'),
		'section' => 'modern_fashion_store_footer_section',
		'settings' => 'modern_fashion_store_tp_footer_bg_color_option',
	)));

	$wp_customize->add_setting('modern_fashion_store_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'modern_fashion_store_footer_widget_image',array(
       'label' => __('Footer Widget Background Image','modern-fashion-store'),
       'section' => 'modern_fashion_store_footer_section'
	)));

	//footer widget title font size
	$wp_customize->add_setting('modern_fashion_store_footer_widget_title_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'modern_fashion_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_fashion_store_footer_widget_title_font_size',array(
		'label'	=> __('Change Footer Widget Title Font Size in PX','modern-fashion-store'),
		'section'	=> 'modern_fashion_store_footer_section',
	    'setting'	=> 'modern_fashion_store_footer_widget_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'modern_fashion_store_footer_widget_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_fashion_store_footer_widget_title_color', array(
			'label'     => __('Change Footer Widget Title Color', 'modern-fashion-store'),
	    'section' => 'modern_fashion_store_footer_section',
	    'settings' => 'modern_fashion_store_footer_widget_title_color',
  	)));

  	$wp_customize->add_setting('modern_fashion_store_footer_widget_title_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_fashion_store_footer_widget_title_font_weight',array(
     'type' => 'radio',
     'label'     => __('Change Footer Widget Title Font Weight', 'modern-fashion-store'),
     'section' => 'modern_fashion_store_footer_section',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','modern-fashion-store'),
         '200' => __('200','modern-fashion-store'),
         '300' => __('300','modern-fashion-store'),
         '400' => __('400','modern-fashion-store'),
         '500' => __('500','modern-fashion-store'),
         '600' => __('600','modern-fashion-store'),
         '700' => __('700','modern-fashion-store'),
         '800' => __('800','modern-fashion-store'),
         '900' => __('900','modern-fashion-store')
     ),
	) );

	$wp_customize->add_setting('modern_fashion_store_footer_widget_title_text_tranform',array(
		'default' => '',
		'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
 	));
 	$wp_customize->add_control('modern_fashion_store_footer_widget_title_text_tranform',array(
		'type' => 'select',
		'label' => __('Change Footer Widget Title Letter Case','modern-fashion-store'),
		'section' => 'modern_fashion_store_footer_section',
		'choices' => array(
		   'Uppercase' => __('Uppercase','modern-fashion-store'),
		   'Lowercase' => __('Lowercase','modern-fashion-store'),
		   'Capitalize' => __('Capitalize','modern-fashion-store'),
		),
	) );

	// Add Settings and Controls for position
	$wp_customize->add_setting('modern_fashion_store_footer_widget_title_position',array(
        'default' => '',
        'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_fashion_store_footer_widget_title_position',array(
        'type' => 'radio',
        'label'     => __('Change Footer Widget Position', 'modern-fashion-store'),
        'description'   => __('This option work for Footer Widget', 'modern-fashion-store'),
        'section' => 'modern_fashion_store_footer_section',
        'choices' => array(
            'Right' => __('Right','modern-fashion-store'),
            'Left' => __('Left','modern-fashion-store'),
            'Center' => __('Center','modern-fashion-store')
        ),
	) );
  	
	$wp_customize->add_setting( 'modern_fashion_store_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_footer_section',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_return_to_header',
	) ) );

	$wp_customize->add_setting('modern_fashion_store_return_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Fashion_Store_Icon_Changer(
       $wp_customize,'modern_fashion_store_return_icon',array(
		'label'	=> __('Return to header Icon','modern-fashion-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_fashion_store_footer_section',
		'type'		=> 'modern-fashion-store-icon'
	)));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('modern_fashion_store_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_fashion_store_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'modern-fashion-store'),
        'description'   => __('This option work for scroll to top', 'modern-fashion-store'),
        'section' => 'modern_fashion_store_footer_section',
        'choices' => array(
            'Right' => __('Right','modern-fashion-store'),
            'Left' => __('Left','modern-fashion-store'),
            'Center' => __('Center','modern-fashion-store')
        ),
	) );

	// Pro Version
    $wp_customize->add_setting( 'modern_fashion_store_footer_widget_pro_version_logo', array(
        'sanitize_callback' => 'modern_fashion_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new modern_fashion_store_Customize_Pro_Version ( $wp_customize,'modern_fashion_store_footer_widget_pro_version_logo', array(
        'section'     => 'modern_fashion_store_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'modern-fashion-store' ),
        'description' => esc_url( MODERN_FASHION_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//footer
	$wp_customize->add_section('modern_fashion_store_footer_copyright_section',array(
		'title'	=> __('Footer Copyright Settings','modern-fashion-store'),
		'description'	=> __('Add copyright text.','modern-fashion-store'),
		'panel' => 'modern_fashion_store_panel_id',
		'priority' => 5,
	));

	$wp_customize->add_setting('modern_fashion_store_footer_text',array(
		'default' => __( 'Modern Fashion Store WordPress Theme', 'modern-fashion-store' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_fashion_store_footer_text',array(
		'label'	=> __('Copyright Text','modern-fashion-store'),
		'section'	=> 'modern_fashion_store_footer_copyright_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('modern_fashion_store_footer_copyright_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'modern_fashion_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_fashion_store_footer_copyright_font_size',array(
		'label'	=> __('Change Footer Copyright Font Size in PX','modern-fashion-store'),
		'section'	=> 'modern_fashion_store_footer_copyright_section',
	    'setting'	=> 'modern_fashion_store_footer_copyright_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting('modern_fashion_store_footer_copyright_title_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_fashion_store_footer_copyright_title_font_weight',array(
     'type' => 'radio',
     'label'     => __('Change Footer Copyright Text Font Weight', 'modern-fashion-store'),
     'section' => 'modern_fashion_store_footer_copyright_section',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','modern-fashion-store'),
         '200' => __('200','modern-fashion-store'),
         '300' => __('300','modern-fashion-store'),
         '400' => __('400','modern-fashion-store'),
         '500' => __('500','modern-fashion-store'),
         '600' => __('600','modern-fashion-store'),
         '700' => __('700','modern-fashion-store'),
         '800' => __('800','modern-fashion-store'),
         '900' => __('900','modern-fashion-store')
     ),
	) );

	$wp_customize->add_setting( 'modern_fashion_store_footer_copyright_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_fashion_store_footer_copyright_text_color', array(
			'label'     => __('Change Footer Copyright Text Color', 'modern-fashion-store'),
	    'section' => 'modern_fashion_store_footer_copyright_section',
	    'settings' => 'modern_fashion_store_footer_copyright_text_color',
  	)));

  	$wp_customize->add_setting('modern_fashion_store_footer_copyright_top_bottom_padding',array(
		'default'	=> '',
		'sanitize_callback'	=> 'modern_fashion_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_fashion_store_footer_copyright_top_bottom_padding',array(
		'label'	=> __('Change Footer Copyright Padding in PX','modern-fashion-store'),
		'section'	=> 'modern_fashion_store_footer_copyright_section',
	    'setting'	=> 'modern_fashion_store_footer_copyright_top_bottom_padding',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	// Add Settings and Controls for Scroll top
	$wp_customize->add_setting('modern_fashion_store_copyright_text_position',array(
        'default' => 'Center',
        'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_fashion_store_copyright_text_position',array(
        'type' => 'radio',
        'label'     => __('Copyright Text Position', 'modern-fashion-store'),
        'description'   => __('This option work for Copyright', 'modern-fashion-store'),
        'section' => 'modern_fashion_store_footer_copyright_section',
        'choices' => array(
            'Right' => __('Right','modern-fashion-store'),
            'Left' => __('Left','modern-fashion-store'),
            'Center' => __('Center','modern-fashion-store')
        ),
	) );

	// Pro Version
    $wp_customize->add_setting( 'modern_fashion_store_copyright_pro_version_logo', array(
        'sanitize_callback' => 'modern_fashion_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new modern_fashion_store_Customize_Pro_Version ( $wp_customize,'modern_fashion_store_copyright_pro_version_logo', array(
        'section'     => 'modern_fashion_store_footer_copyright_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'modern-fashion-store' ),
        'description' => esc_url( MODERN_FASHION_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//Mobile resposnsive
	$wp_customize->add_section('modern_fashion_store_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'modern-fashion-store'),
		'description' => __('Control will not function if the toggle in the main settings is off.', 'modern-fashion-store'),
		'priority' => 5,
		'panel' => 'modern_fashion_store_panel_id'
	) );

	$wp_customize->add_setting( 'modern_fashion_store_mobile_blog_description', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_mobile_blog_description', array(
		'label'       => esc_html__( 'Show / Hide Blog Page Description', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_mobile_blog_description',
	) ) );

	$wp_customize->add_setting( 'modern_fashion_store_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_return_to_header_mob',
	) ) );

	$wp_customize->add_setting( 'modern_fashion_store_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_slider_buttom_mob',
	) ) );

	$wp_customize->add_setting( 'modern_fashion_store_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'modern-fashion-store' ),
		'section'     => 'modern_fashion_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_related_post_mob',
	) ) );

	//Slider height
    $wp_customize->add_setting('modern_fashion_store_slider_img_height_responsive',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('modern_fashion_store_slider_img_height_responsive',array(
        'label' => __('Slider Height','modern-fashion-store'),
        'description'   => __('Add slider height in px(eg. 700px).','modern-fashion-store'),
        'section'=> 'modern_fashion_store_mobile_media_option',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'modern_fashion_store_responsive_pro_version_logo', array(
        'sanitize_callback' => 'modern_fashion_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new modern_fashion_store_Customize_Pro_Version ( $wp_customize,'modern_fashion_store_responsive_pro_version_logo', array(
        'section'     => 'modern_fashion_store_mobile_media_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'modern-fashion-store' ),
        'description' => esc_url( MODERN_FASHION_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));
	
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	//site Title
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'Modern_Fashion_Store_Customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'Modern_Fashion_Store_Customize_partial_blogdescription',
	) );

	$wp_customize->add_setting( 'modern_fashion_store_site_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_site_title', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'modern-fashion-store' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_site_title',
	) ) );

	// logo site title size
	$wp_customize->add_setting('modern_fashion_store_site_title_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'modern_fashion_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_fashion_store_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','modern-fashion-store'),
		'section'	=> 'title_tagline',
		'setting'	=> 'modern_fashion_store_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
		    'step'             => 1,
			'min'              => 0,
			'max'              => 30,
			),
	));

	$wp_customize->add_setting( 'modern_fashion_store_site_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_fashion_store_site_tagline_color', array(
			'label'     => __('Change Site Title Color', 'modern-fashion-store'),
	    'section' => 'title_tagline',
	    'settings' => 'modern_fashion_store_site_tagline_color',
  	)));

	$wp_customize->add_setting( 'modern_fashion_store_site_tagline', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_site_tagline', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'modern-fashion-store' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_site_tagline',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('modern_fashion_store_site_tagline_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'modern_fashion_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_fashion_store_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','modern-fashion-store'),
		'section'	=> 'title_tagline',
		'setting'	=> 'modern_fashion_store_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	));

	$wp_customize->add_setting( 'modern_fashion_store_logo_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_fashion_store_logo_tagline_color', array(
			'label'     => __('Change Site Tagline Color', 'modern-fashion-store'),
	    'section' => 'title_tagline',
	    'settings' => 'modern_fashion_store_logo_tagline_color',
  	)));

    $wp_customize->add_setting('modern_fashion_store_logo_width',array(
	   'default' => 80,
	   'sanitize_callback'	=> 'modern_fashion_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_fashion_store_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','modern-fashion-store'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('modern_fashion_store_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'modern_fashion_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_fashion_store_per_columns',array(
		'label'	=> __('Product Per Row','modern-fashion-store'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('modern_fashion_store_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'modern_fashion_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_fashion_store_product_per_page',array(
		'label'	=> __('Product Per Page','modern-fashion-store'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'modern_fashion_store_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'modern-fashion-store' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_product_sidebar',
	) ) );

	$wp_customize->add_setting( 'modern_fashion_store_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'modern-fashion-store' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_single_product_sidebar',
	) ) );

	$wp_customize->add_setting( 'modern_fashion_store_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'modern-fashion-store' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'modern_fashion_store_related_product',
	) ) );

	
	//Page template settings
	$wp_customize->add_panel( 'modern_fashion_store_page_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Page Template Settings', 'modern-fashion-store' ),
	    'description' => __( 'Description of what this panel does.', 'modern-fashion-store' ),
	) );

	// 404 PAGE
	$wp_customize->add_section('modern_fashion_store_404_page_section',array(
		'title'         => __('404 Page', 'modern-fashion-store'),
		'description'   => __('Here you can customize 404 Page content.', 'modern-fashion-store'),
		'panel' => 'modern_fashion_store_page_panel_id'
	) );

	$wp_customize->add_setting('modern_fashion_store_edit_404_title',array(
		'default'=> __('Oops! That page cant be found.','modern-fashion-store'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('modern_fashion_store_edit_404_title',array(
		'label'	=> __('Edit Title','modern-fashion-store'),
		'section'=> 'modern_fashion_store_404_page_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('modern_fashion_store_edit_404_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','modern-fashion-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_fashion_store_edit_404_text',array(
		'label'	=> __('Edit Text','modern-fashion-store'),
		'section'=> 'modern_fashion_store_404_page_section',
		'type'=> 'text'
	));

	// Search Results
	$wp_customize->add_section('modern_fashion_store_no_result_section',array(
		'title'         => __('Search Results', 'modern-fashion-store'),
		'description'  => __('Here you can customize Search Result content.', 'modern-fashion-store'),
		'panel' => 'modern_fashion_store_page_panel_id'
	) );

	$wp_customize->add_setting('modern_fashion_store_edit_no_result_title',array(
		'default'=> __('Nothing Found','modern-fashion-store'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('modern_fashion_store_edit_no_result_title',array(
		'label'	=> __('Edit Title','modern-fashion-store'),
		'section'=> 'modern_fashion_store_no_result_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('modern_fashion_store_edit_no_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','modern-fashion-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_fashion_store_edit_no_result_text',array(
		'label'	=> __('Edit Text','modern-fashion-store'),
		'section'=> 'modern_fashion_store_no_result_section',
		'type'=> 'text'
	));

	 // Header Image Height
    $wp_customize->add_setting(
        'modern_fashion_store_header_image_height',
        array(
            'default'           => 500,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'modern_fashion_store_header_image_height',
        array(
            'label'       => esc_html__( 'Header Image Height', 'modern-fashion-store' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the height of the header image. Default is 350px.', 'modern-fashion-store' ),
            'input_attrs' => array(
                'min'  => 220,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    );

    // Header Background Position
    $wp_customize->add_setting(
        'modern_fashion_store_header_background_position',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'modern_fashion_store_header_background_position',
        array(
            'label'       => esc_html__( 'Header Background Position', 'modern-fashion-store' ),
            'section'     => 'header_image',
            'type'        => 'select',
            'choices'     => array(
                'top'    => esc_html__( 'Top', 'modern-fashion-store' ),
                'center' => esc_html__( 'Center', 'modern-fashion-store' ),
                'bottom' => esc_html__( 'Bottom', 'modern-fashion-store' ),
            ),
            'description' => esc_html__( 'Choose how you want to position the header image.', 'modern-fashion-store' ),
        )
    );

    // Header Image Parallax Effect
    $wp_customize->add_setting(
        'modern_fashion_store_header_background_attachment',
        array(
            'default'           => 1,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'modern_fashion_store_header_background_attachment',
        array(
            'label'       => esc_html__( 'Header Image Parallax', 'modern-fashion-store' ),
            'section'     => 'header_image',
            'type'        => 'checkbox',
            'description' => esc_html__( 'Add a parallax effect on page scroll.', 'modern-fashion-store' ),
        )
    );

        //Opacity
	$wp_customize->add_setting('modern_fashion_store_header_banner_opacity_color',array(
       'default'              => '0.5',
       'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
    $wp_customize->add_control( 'modern_fashion_store_header_banner_opacity_color', array(
		'label'       => esc_html__( 'Header Image Opacity','modern-fashion-store' ),
		'section'     => 'header_image',
		'type'        => 'select',
		'settings'    => 'modern_fashion_store_header_banner_opacity_color',
		'choices' => array(
           '0' =>  esc_attr(__('0','modern-fashion-store')),
           '0.1' =>  esc_attr(__('0.1','modern-fashion-store')),
           '0.2' =>  esc_attr(__('0.2','modern-fashion-store')),
           '0.3' =>  esc_attr(__('0.3','modern-fashion-store')),
           '0.4' =>  esc_attr(__('0.4','modern-fashion-store')),
           '0.5' =>  esc_attr(__('0.5','modern-fashion-store')),
           '0.6' =>  esc_attr(__('0.6','modern-fashion-store')),
           '0.7' =>  esc_attr(__('0.7','modern-fashion-store')),
           '0.8' =>  esc_attr(__('0.8','modern-fashion-store')),
           '0.9' =>  esc_attr(__('0.9','modern-fashion-store'))
		), 
	) );

   $wp_customize->add_setting( 'modern_fashion_store_header_banner_image_overlay', array(
	    'default'   => true,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'modern_fashion_store_sanitize_checkbox',
	));
	$wp_customize->add_control( new Modern_Fashion_Store_Toggle_Control( $wp_customize, 'modern_fashion_store_header_banner_image_overlay', array(
	    'label'   => esc_html__( 'Show / Hide Header Image Overlay', 'modern-fashion-store' ),
	    'section' => 'header_image',
	)));

    $wp_customize->add_setting('modern_fashion_store_header_banner_image_ooverlay_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'modern_fashion_store_header_banner_image_ooverlay_color', array(
		'label'    => __('Header Image Overlay Color', 'modern-fashion-store'),
		'section'  => 'header_image',
	)));

    $wp_customize->add_setting(
        'modern_fashion_store_header_image_title_font_size',
        array(
            'default'           => 40,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'modern_fashion_store_header_image_title_font_size',
        array(
            'label'       => esc_html__( 'Change Header Image Title Font Size', 'modern-fashion-store' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the font Size of the header image title. Default is 40px.', 'modern-fashion-store' ),
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 200,
                'step' => 1,
            ),
        )
    );

	$wp_customize->add_setting( 'modern_fashion_store_header_image_title_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_fashion_store_header_image_title_text_color', array(
			'label'     => __('Change Header Image Title Color', 'modern-fashion-store'),
	    'section' => 'header_image',
	    'settings' => 'modern_fashion_store_header_image_title_text_color',
  	)));

  	//Woocommerce settings
	$wp_customize->add_section('modern_fashion_store_woocommerce_section', array(
		'title'    => __('WooCommerce Options', 'modern-fashion-store'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('modern_fashion_store_sale_tag_position',array(
        'default' => 'right',
        'sanitize_callback' => 'modern_fashion_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_fashion_store_sale_tag_position',array(
        'type' => 'radio',
        'label'     => __('Sale Badge Position', 'modern-fashion-store'),
        'description'   => __('This option work for Archieve Products', 'modern-fashion-store'),
        'section' => 'modern_fashion_store_woocommerce_section',
        'choices' => array(
            'left' => __('Left','modern-fashion-store'),
            'right' => __('Right','modern-fashion-store'),
        ),
	) );

  	$wp_customize->add_setting('modern_fashion_store_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('modern_fashion_store_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','modern-fashion-store'),

		'section'=> 'modern_fashion_store_woocommerce_section',
		'settings'    => 'modern_fashion_store_woocommerce_sale_font_size',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	));

	$wp_customize->add_setting('modern_fashion_store_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('modern_fashion_store_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','modern-fashion-store'),
		'section'=> 'modern_fashion_store_woocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	));

	$wp_customize->add_setting('modern_fashion_store_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('modern_fashion_store_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','modern-fashion-store'),
		'section'=> 'modern_fashion_store_woocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	));

	$wp_customize->add_setting( 'modern_fashion_store_woocommerce_sale_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint'
	) );
	$wp_customize->add_control( 'modern_fashion_store_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','modern-fashion-store' ),
		'section'     => 'modern_fashion_store_woocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	) );

}
add_action( 'customize_register', 'Modern_Fashion_Store_Customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Modern Fashion Store 1.0
 * @see Modern_Fashion_Store_Customize_register()
 *
 * @return void
 */
function Modern_Fashion_Store_Customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Modern Fashion Store 1.0
 * @see Modern_Fashion_Store_Customize_register()
 *
 * @return void
 */
function Modern_Fashion_Store_Customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'MODERN_FASHION_STORE_PRO_THEME_NAME' ) ) {
	define( 'MODERN_FASHION_STORE_PRO_THEME_NAME', esc_html__( 'Fashion Store Pro', 'modern-fashion-store'));
}
if ( ! defined( 'MODERN_FASHION_STORE_PRO_THEME_URL' ) ) {
	define( 'MODERN_FASHION_STORE_PRO_THEME_URL', esc_url('https://www.themespride.com/products/fashion-wordpress-theme', 'modern-fashion-store'));
}


if ( ! defined( 'MODERN_FASHION_STORE_DOCS_URL' ) ) {
	define( 'MODERN_FASHION_STORE_DOCS_URL', esc_url('https://page.themespride.com/demo/docs/modern-fashion-store-lite/'));
}
if ( ! defined( 'MODERN_FASHION_STORE_TEXT' ) ) {
    define( 'MODERN_FASHION_STORE_TEXT', __( 'Modern Fashion Store Pro','modern-fashion-store' ));
}
if ( ! defined( 'MODERN_FASHION_STORE_BUY_TEXT' ) ) {
    define( 'MODERN_FASHION_STORE_BUY_TEXT', __( 'Upgrade Pro','modern-fashion-store' ));
}

add_action( 'customize_register', function( $manager ) {

// Load custom sections.
load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

    $manager->register_section_type( Modern_Fashion_Store_Button::class );

    $manager->add_section(
        new Modern_Fashion_Store_Button( $manager, 'modern_fashion_store_pro', [
            'title'       => esc_html( MODERN_FASHION_STORE_TEXT,'modern-fashion-store' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'modern-fashion-store' ),
            'button_url'  => esc_url( MODERN_FASHION_STORE_PRO_THEME_URL )
        ] )
    );

    // Register sections.
	$manager->add_section(
		new Modern_Fashion_Store_Customize_Section_Pro(
			$manager,
			'modern_fashion_store_documentation',
			array(
				'priority'   => 500,
				'title'    => esc_html__( 'Theme Documentation', 'modern-fashion-store' ),
				'pro_text' => esc_html__( 'Click Here', 'modern-fashion-store' ),
				'pro_url'  => esc_url( MODERN_FASHION_STORE_DOCS_URL, 'modern-fashion-store'),
			)
		)
	);

} );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Modern_Fashion_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Modern_Fashion_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Modern_Fashion_Store_Customize_Section_Pro(
				$manager,
				'modern_fashion_store_section_pro',
				array(
					'priority'   => 9,
					'title'    => MODERN_FASHION_STORE_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'modern-fashion-store' ),
					'pro_url'  => esc_url( MODERN_FASHION_STORE_PRO_THEME_URL, 'modern-fashion-store' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Modern_Fashion_Store_Customize_Section_Pro(
				$manager,
				'modern_fashion_store_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'modern-fashion-store' ),
					'pro_text' => esc_html__( 'Click Here', 'modern-fashion-store' ),
					'pro_url'  => esc_url( MODERN_FASHION_STORE_DOCS_URL, 'modern-fashion-store'),
				)
			)
		);

	}
	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'modern-fashion-store-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'modern-fashion-store-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Modern_Fashion_Store_Customize::get_instance();