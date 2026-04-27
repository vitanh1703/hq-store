<?php
class Whizzie {

    public function __construct() {
        add_action( 'wp_ajax_online_clothing_store_setup_widgets', array( $this, 'online_clothing_store_setup_widgets' ) );
    }


    public static function online_clothing_store_setup_widgets() {

    	$shoplentor_options = array (
	        'wishlist' => 'on',
	        'compare' => 'off',
	        'ajaxsearch' => 'off',
	        'ajaxcart_singleproduct' => 'off',
	        'postduplicator' => 'off',
	        'loadproductlimit' => 20.0,
	    );
	    update_option('woolentor_others_tabs', $shoplentor_options);


    	$online_clothing_storehome_content = '';
		$online_clothing_storehome_title = 'Home';
		$online_clothing_storehome = array(
				'post_type' => 'page',
				'post_title' => $online_clothing_storehome_title,
				'post_content'  => $online_clothing_storehome_content,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_slug' => 'home'
		);
		$online_clothing_storehome_id = wp_insert_post($online_clothing_storehome);

		add_post_meta( $online_clothing_storehome_id, '_wp_page_template', 'frontpage.php' );

		$online_clothing_storehome = get_page_by_path( 'Home' );
		update_option( 'page_on_front', $online_clothing_storehome->ID );
		update_option( 'show_on_front', 'page' );

		// Creation of blog page //
		$online_clothing_storeblog_title = 'Blog';
		$online_clothing_storeblog_check = get_page_by_path('blog');
		if (!$online_clothing_storeblog_check) {
			$online_clothing_storeblog = array(
				'post_type'    => 'page',
				'post_title'   => $online_clothing_storeblog_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'blog'
			);
			$online_clothing_storeblog_id = wp_insert_post($online_clothing_storeblog);

			if (!is_wp_error($online_clothing_storeblog_id)) {
				update_option('page_for_posts', $online_clothing_storeblog_id);
			}
		}

		// Creation of about page //
		$online_clothing_storeabout_title = 'About';
		$online_clothing_storeabout_content = 'What is Lorem Ipsum?
													Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
													&nbsp;
													Why do we use it?
													It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
													&nbsp;
													Where does it come from?
													There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
													&nbsp;
													Why do we use it?
													It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
													&nbsp;
													Where does it come from?
													There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
		$online_clothing_storeabout_check = get_page_by_path('about');
		if (!$online_clothing_storeabout_check) {
			$online_clothing_storeabout = array(
				'post_type'    => 'page',
				'post_title'   => $online_clothing_storeabout_title,
				'post_content'   => $online_clothing_storeabout_content,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'about'
			);
			wp_insert_post($online_clothing_storeabout);
		}

		// Creation of services page //
		$online_clothing_storeservices_title = 'Contact';
		$online_clothing_storeservices_content = 'What is Lorem Ipsum?
													Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
													&nbsp;
													Why do we use it?
													It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
													&nbsp;
													Where does it come from?
													There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
													&nbsp;
													Why do we use it?
													It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
													&nbsp;
													Where does it come from?
													There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
		$online_clothing_storeservices_check = get_page_by_path('services');
		if (!$online_clothing_storeservices_check) {
			$online_clothing_storeservices = array(
				'post_type'    => 'page',
				'post_title'   => $online_clothing_storeservices_title,
				'post_content'   => $online_clothing_storeservices_content,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'services'
			);
			wp_insert_post($online_clothing_storeservices);
		}

		// Creation of pricing page //
		$online_clothing_storepricing_title = 'Pricing';
		$online_clothing_storepricing_content = 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
		$online_clothing_storepricing_check = get_page_by_path('pricing');
		if (!$online_clothing_storepricing_check) {
			$online_clothing_storepricing = array(
				'post_type'    => 'page',
				'post_title'   => $online_clothing_storepricing_title,
				'post_content'   => $online_clothing_storepricing_content,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'pricing'
			);
			wp_insert_post($online_clothing_storepricing);
		}

		// Creation of support page //
		$online_clothing_storesupport_title = 'Support';
		$online_clothing_storesupport_content = 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
		$online_clothing_storesupport_check = get_page_by_path('support');
		if (!$online_clothing_storesupport_check) {
			$online_clothing_storesupport = array(
				'post_type'    => 'page',
				'post_title'   => $online_clothing_storesupport_title,
				'post_content'   => $online_clothing_storesupport_content,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'support'
			);
			wp_insert_post($online_clothing_storesupport);
		}

		// Creation of features page //
		$online_clothing_storefeatures_title = 'Features';
		$online_clothing_storefeatures_content = 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
		$online_clothing_storefeatures_check = get_page_by_path('features');
		if (!$online_clothing_storefeatures_check) {
			$online_clothing_storefeatures = array(
				'post_type'    => 'page',
				'post_title'   => $online_clothing_storefeatures_title,
				'post_content'   => $online_clothing_storefeatures_content,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'features'
			);
			wp_insert_post($online_clothing_storefeatures);
		}

		// Creation of services page //
		$online_clothing_storebirthday_title = 'Products';
		$online_clothing_storebirthday_content = 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
		$online_clothing_storebirthday_check = get_page_by_path('birthday');
		if (!$online_clothing_storebirthday_check) {
			$online_clothing_storebirthday = array(
				'post_type'    => 'page',
				'post_title'   => $online_clothing_storebirthday_title,
				'post_content'   => $online_clothing_storebirthday_content,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'birthday'
			);
			wp_insert_post($online_clothing_storebirthday);
		}

		// Creation of Pages //
		$online_clothing_storenotfound_title = 'Pages';
		$online_clothing_storenotfound = array(
			'post_type'   => 'pages',
			'post_title'  => $online_clothing_storenotfound_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug'   => 'pages'
		);
		$online_clothing_storenotfound_id = wp_insert_post($online_clothing_storenotfound);
		add_post_meta($online_clothing_storenotfound_id, '_wp_page_template', 'pages.php');

 		/* -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+- PRODUCTS -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-*/
		
		// Delete default "Uncategorized" category
		$uncategorized_term = get_term_by('name', 'Uncategorized', 'product_cat');
		if ($uncategorized_term) {
		    wp_delete_term($uncategorized_term->term_id, 'product_cat');
		}

		// Product data
		$product_category = array(
		    'JACKET' => array(
		        'Wearslim Warm Knit Hats',
		        'Touch Screen Texting cap',
		        'Unisex Hoodie'
		    )
		);

		$i = 1;

		foreach ($product_category as $category_name => $products) {

		    // Insert category
		    $category_desc = 'Lorem ipsum dolor sit amet';
		    $category_data = wp_insert_term(
		        $category_name,
		        'product_cat',
		        array(
		            'description' => $category_desc,
		            'slug' => 'product_cat' . $i
		        )
		    );

		    // === CATEGORY IMAGE ===
		    $cat_image_url  = get_template_directory_uri() . '/assets/images/' . str_replace(" ", "-", strtolower($category_name)) . '-category.png';
		    $cat_image_name = basename($cat_image_url);
		    $upload_dir     = wp_upload_dir();
		    $image_data     = @file_get_contents($cat_image_url);

		    if ($image_data) {
		        $filename = wp_unique_filename($upload_dir['path'], $cat_image_name);
		        $file     = (wp_mkdir_p($upload_dir['path'])) ? $upload_dir['path'] . '/' . $filename : $upload_dir['basedir'] . '/' . $filename;
		        // Create the image  file on the server
				// Generate unique name
				if ( ! function_exists( 'WP_Filesystem' ) ) {
					require_once( ABSPATH . 'wp-admin/includes/file.php' );
				}
				
				WP_Filesystem();
				global $wp_filesystem;
				
				if ( ! $wp_filesystem->put_contents( $file, $image_data, FS_CHMOD_FILE ) ) {
					wp_die( 'Error saving file!' );
				}

		        $wp_filetype = wp_check_filetype($filename, null);
		        $attachment = array(
		            'post_mime_type' => $wp_filetype['type'],
		            'post_title'     => sanitize_file_name($filename),
		            'post_content'   => '',
		            'post_status'    => 'inherit'
		        );

		        $attach_id = wp_insert_attachment($attachment, $file);
		        require_once(ABSPATH . 'wp-admin/includes/image.php');
		        $attach_data = wp_generate_attachment_metadata($attach_id, $file);
		        wp_update_attachment_metadata($attach_id, $attach_data);

		        update_term_meta($category_data['term_id'], 'thumbnail_id', $attach_id);
		    }

		    // === CREATE PRODUCTS ===
		    foreach ($products as $product_title) {

		        $product_desc = 'Te obtinuit ut adepto satis somno.';
		        $post_id = wp_insert_post(array(
		            'post_title'   => wp_strip_all_tags($product_title),
		            'post_content' => $product_desc,
		            'post_status'  => 'publish',
		            'post_type'    => 'product',
		        ));

		        wp_set_object_terms($post_id, 'product_cat' . $i, 'product_cat', true);
		        update_post_meta($post_id, '_price', '457');

		        // === PRODUCT IMAGE ===
		        $product_image_url = get_template_directory_uri() . '/assets/images/' . str_replace(" ", "-", $product_title) . '.png';
		        $product_image_name = basename($product_image_url);
		        $image_data = @file_get_contents($product_image_url);

		        // Fallback if image missing
		        if (!$image_data) {
		            $product_image_url = get_template_directory_uri() . '/assets/images/default-product.png';
		            $product_image_name = 'default-product.png';
		            $image_data = @file_get_contents($product_image_url);
		        }

		        if ($image_data) {
		            $filename = wp_unique_filename($upload_dir['path'], $product_image_name);
		            $file     = (wp_mkdir_p($upload_dir['path'])) ? $upload_dir['path'] . '/' . $filename : $upload_dir['basedir'] . '/' . $filename;
		            // Create the image  file on the server
					// Generate unique name
					if ( ! function_exists( 'WP_Filesystem' ) ) {
						require_once( ABSPATH . 'wp-admin/includes/file.php' );
					}
					
					WP_Filesystem();
					global $wp_filesystem;
					
					if ( ! $wp_filesystem->put_contents( $file, $image_data, FS_CHMOD_FILE ) ) {
						wp_die( 'Error saving file!' );
					}

		            $wp_filetype = wp_check_filetype($filename, null);
		            $attachment = array(
		                'post_mime_type' => $wp_filetype['type'],
		                'post_title'     => sanitize_file_name($filename),
		                'post_content'   => '',
		                'post_status'    => 'inherit'
		            );

		            $attach_id = wp_insert_attachment($attachment, $file, $post_id);
		            require_once(ABSPATH . 'wp-admin/includes/image.php');
		            $attach_data = wp_generate_attachment_metadata($attach_id, $file);
		            wp_update_attachment_metadata($attach_id, $attach_data);
		            set_post_thumbnail($post_id, $attach_id);
		        } else {
		            error_log('❌ Image missing for: ' . $product_title . ' (' . $product_image_url . ')');
		        }
		    }

		    $i++;
		}

        
        /* -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+- Online clothing store Primary Menu -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-*/

		$online_clothing_storethemename = 'Online clothing store';
		$online_clothing_storemenuname = $online_clothing_storethemename . ' Primary Menu';
		$online_clothing_storemenulocation = 'online-clothing-store-primary-menu';
		$online_clothing_storemenu_exists = wp_get_nav_menu_object($online_clothing_storemenuname);

		if (!$online_clothing_storemenu_exists) {
			$online_clothing_storemenu_id = wp_create_nav_menu($online_clothing_storemenuname);

			// Home
			wp_update_nav_menu_item($online_clothing_storemenu_id, 0, array(
				'menu-item-title' => __('Home', 'online-clothing-store'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'),
				'menu-item-status' => 'publish'
			));

			// Products
			$online_clothing_storepage_about = get_page_by_path('birthday');
			if($online_clothing_storepage_about){
				wp_update_nav_menu_item($online_clothing_storemenu_id, 0, array(
					'menu-item-title' => __('Products', 'online-clothing-store'),
					'menu-item-classes' => 'birthday',
					'menu-item-url' => get_permalink($online_clothing_storepage_about),
					'menu-item-status' => 'publish'
				));
			}

			// features
			$online_clothing_storepages_services = get_page_by_path('features');
			if($online_clothing_storepages_services){
				wp_update_nav_menu_item($online_clothing_storemenu_id, 0, array(
					'menu-item-title' => __('Features', 'online-clothing-store'),
					'menu-item-classes' => 'features',
					'menu-item-url' => get_permalink($online_clothing_storepages_services),
					'menu-item-status' => 'publish'
				));
			}

			// pricing
			$online_clothing_storepages = get_page_by_path('pricing');
			if($online_clothing_storepages){
				wp_update_nav_menu_item($online_clothing_storemenu_id, 0, array(
					'menu-item-title' => __('Pricing', 'online-clothing-store'),
					'menu-item-classes' => 'pricing',
					'menu-item-url' => get_permalink($online_clothing_storepages),
					'menu-item-status' => 'publish'
				));
			}

			// Support
			$online_clothing_storepage_blog = get_page_by_path('support');
			if($online_clothing_storepage_blog){
				wp_update_nav_menu_item($online_clothing_storemenu_id, 0, array(
					'menu-item-title' => __('Support', 'online-clothing-store'),
					'menu-item-classes' => 'blog',
					'menu-item-url' => get_permalink($online_clothing_storepage_blog),
					'menu-item-status' => 'publish'
				));
			}

			if (!has_nav_menu($online_clothing_storemenulocation)) {
				$online_clothing_storelocations = get_theme_mod('nav_menu_locations');
				$online_clothing_storelocations[$online_clothing_storemenulocation] = $online_clothing_storemenu_id;
				set_theme_mod('nav_menu_locations', $online_clothing_storelocations);
			}
		}
    }
}