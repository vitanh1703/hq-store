<?php 
if (isset($_GET['import-demo']) && $_GET['import-demo'] == true) {


    // Function to install and activate plugins
    function modern_fashion_store_import_demo_content() {

         // Display the preloader only for plugin installation
        echo '<div id="plugin-loader" style="display: flex; align-items: center; justify-content: center; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999;">
                <img src="' . esc_url(get_template_directory_uri()) . '/assets/images/loader.png" alt="Loading..." width="60" height="60" />
              </div>';

        // Define the plugins you want to install and activate
        $plugins = array(
            array(
                'slug' => 'woocommerce',
                'file' => 'woocommerce/woocommerce.php',
                'url'  => 'https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip'
            ),
            array(
                'slug' => 'advanced-appointment-booking-scheduling',
                'file' => 'advanced-appointment-booking-scheduling/advanced-appointment-booking.php',
                'url'  => 'https://downloads.wordpress.org/plugin/advanced-appointment-booking-scheduling.zip'
            ),
        );

        // Include required files for plugin installation
        include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
        include_once(ABSPATH . 'wp-admin/includes/file.php');
        include_once(ABSPATH . 'wp-admin/includes/misc.php');
        include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

        // Loop through each plugin
        foreach ($plugins as $plugin) {
            $plugin_file = WP_PLUGIN_DIR . '/' . $plugin['file'];

            // Check if the plugin is installed
            if (!file_exists($plugin_file)) {
                // If the plugin is not installed, download and install it
                $upgrader = new Plugin_Upgrader();
                $result = $upgrader->install($plugin['url']);

                // Check for installation errors
                if (is_wp_error($result)) {
                    error_log('Plugin installation failed: ' . $plugin['slug'] . ' - ' . $result->get_error_message());
                    echo 'Error installing plugin: ' . esc_html($plugin['slug']) . ' - ' . esc_html($result->get_error_message());
                    continue;
                }
            }

            // If the plugin exists but is not active, activate it
            if (file_exists($plugin_file) && !is_plugin_active($plugin['file'])) {
                $result = activate_plugin($plugin['file']);

                // Check for activation errors
                if (is_wp_error($result)) {
                    error_log('Plugin activation failed: ' . $plugin['slug'] . ' - ' . $result->get_error_message());
                    echo 'Error activating plugin: ' . esc_html($plugin['slug']) . ' - ' . esc_html($result->get_error_message());
                }
            }
        }

        // Hide the preloader after the process is complete
        echo '<script type="text/javascript">
                document.getElementById("plugin-loader").style.display = "none";
              </script>';

        // Add filter to skip WooCommerce setup wizard after activation
        add_filter('woocommerce_prevent_automatic_wizard_redirect', '__return_true');
    }

    // Call the import function
    modern_fashion_store_import_demo_content();

    // ------- Create Nav Menu --------
$modern_fashion_store_menuname = 'Main Menus';
$modern_fashion_store_bpmenulocation = 'primary-menu';
$modern_fashion_store_menu_exists = wp_get_nav_menu_object($modern_fashion_store_menuname);

if (!$modern_fashion_store_menu_exists) {
    $modern_fashion_store_menu_id = wp_create_nav_menu($modern_fashion_store_menuname);

    // Create Home Page
    $modern_fashion_store_home_title = 'Home';
    $modern_fashion_store_home = array(
        'post_type' => 'page',
        'post_title' => $modern_fashion_store_home_title,
        'post_content' => '',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'home'
    );
    $modern_fashion_store_home_id = wp_insert_post($modern_fashion_store_home);

    // Assign Home Page Template
    add_post_meta($modern_fashion_store_home_id, '_wp_page_template', 'page-template/front-page.php');

    // Update options to set Home Page as the front page
    update_option('page_on_front', $modern_fashion_store_home_id);
    update_option('show_on_front', 'page');

    // Add Home Page to Menu
    wp_update_nav_menu_item($modern_fashion_store_menu_id, 0, array(
        'menu-item-title' => __('Home', 'modern-fashion-store'),
        'menu-item-classes' => 'home',
        'menu-item-url' => home_url('/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $modern_fashion_store_home_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create About Us Page with Dummy Content
    $modern_fashion_store_about_title = 'About Us';
    $modern_fashion_store_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $modern_fashion_store_about = array(
        'post_type' => 'page',
        'post_title' => $modern_fashion_store_about_title,
        'post_content' => $modern_fashion_store_about_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'about-us'
    );
    $modern_fashion_store_about_id = wp_insert_post($modern_fashion_store_about);

    // Add About Us Page to Menu
    wp_update_nav_menu_item($modern_fashion_store_menu_id, 0, array(
        'menu-item-title' => __('About Us', 'modern-fashion-store'),
        'menu-item-classes' => 'about-us',
        'menu-item-url' => home_url('/about-us/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $modern_fashion_store_about_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Services Page with Dummy Content
    $modern_fashion_store_services_title = 'Services';
    $modern_fashion_store_services_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $modern_fashion_store_services = array(
        'post_type' => 'page',
        'post_title' => $modern_fashion_store_services_title,
        'post_content' => $modern_fashion_store_services_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'services'
    );
    $modern_fashion_store_services_id = wp_insert_post($modern_fashion_store_services);

    // Add Services Page to Menu
    wp_update_nav_menu_item($modern_fashion_store_menu_id, 0, array(
        'menu-item-title' => __('Services', 'modern-fashion-store'),
        'menu-item-classes' => 'services',
        'menu-item-url' => home_url('/services/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $modern_fashion_store_services_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Pages Page with Dummy Content
    $modern_fashion_store_pages_title = 'Pages';
    $modern_fashion_store_pages_content = '<h2>Our Pages</h2>
    <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>';
    $modern_fashion_store_pages = array(
        'post_type' => 'page',
        'post_title' => $modern_fashion_store_pages_title,
        'post_content' => $modern_fashion_store_pages_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'pages'
    );
    $modern_fashion_store_pages_id = wp_insert_post($modern_fashion_store_pages);

    // Add Pages Page to Menu
    wp_update_nav_menu_item($modern_fashion_store_menu_id, 0, array(
        'menu-item-title' => __('Pages', 'modern-fashion-store'),
        'menu-item-classes' => 'pages',
        'menu-item-url' => home_url('/pages/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $modern_fashion_store_pages_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Contact Page with Dummy Content
    $modern_fashion_store_contact_title = 'Contact';
    $modern_fashion_store_contact_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $modern_fashion_store_contact = array(
        'post_type' => 'page',
        'post_title' => $modern_fashion_store_contact_title,
        'post_content' => $modern_fashion_store_contact_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'contact'
    );
    $modern_fashion_store_contact_id = wp_insert_post($modern_fashion_store_contact);

    // Add Contact Page to Menu
    wp_update_nav_menu_item($modern_fashion_store_menu_id, 0, array(
        'menu-item-title' => __('Contact', 'modern-fashion-store'),
        'menu-item-classes' => 'contact',
        'menu-item-url' => home_url('/contact/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $modern_fashion_store_contact_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Set the menu location if it's not already set
    if (!has_nav_menu($modern_fashion_store_bpmenulocation)) {
        $locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
        if (empty($locations)) {
            $locations = array();
        }
        $locations[$modern_fashion_store_bpmenulocation] = $modern_fashion_store_menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}

        //---Header--//
        set_theme_mod('modern_fashion_store_top_header_text', 'Summer Sale is Live – Up to 50% Off! Shop the Hottest Styles Before They are Gone!');
        
      // Slider Section
        // Slider Section
        set_theme_mod('modern_fashion_store_slider_arrows', true);
        set_theme_mod('modern_fashion_store_btn_text1', 'Shop Now');
        set_theme_mod('modern_fashion_store_btn_link1', '#');

        for ($i = 1; $i <= 4; $i++) {
            $modern_fashion_store_title = 'Veloura Studio';

            // Create post object
            $my_post = array(
                'post_title'    => wp_strip_all_tags($modern_fashion_store_title),
                'post_status'   => 'publish',
                'post_type'     => 'page',
            );

            /// Insert the post into the database
            $post_id = wp_insert_post($my_post);

            if ($post_id) {
                // Set the theme mod for the slider page
                set_theme_mod('modern_fashion_store_slider_page' . $i, $post_id);

                $image_url = get_template_directory_uri() . '/assets/images/slider-img.png';
                $image_id = media_sideload_image($image_url, $post_id, null, 'id');

                if (!is_wp_error($image_id)) {
                    // Set the downloaded image as the post's featured image
                    set_post_thumbnail($post_id, $image_id);
                }
            }
        }

        // Best Seller Section
        set_theme_mod('modern_fashion_store_our_products_show_hide_section', true);
        set_theme_mod('modern_fashion_store_projetcs_main_text', 'Shop by');
        set_theme_mod('modern_fashion_store_product_section_heading', 'New Arrivals');
        set_theme_mod('modern_fashion_store_product_category', 'productcategory1');

        // Define product category names and product titles
        $modern_fashion_store_category_names = array('productcategory1');
        $modern_fashion_store_title_array = array(
            array("Luna Satin Midi Dress", "AeroMesh Active Set", "Cleo Ribbed Sweater", "Wide Leg Pants", "Leather Mini Skirt"),
        );

        foreach ($modern_fashion_store_category_names as $modern_fashion_store_index => $modern_fashion_store_category_name) {
            // Create or retrieve the product category term ID
            $modern_fashion_store_term = term_exists($modern_fashion_store_category_name, 'product_cat');
            if ($modern_fashion_store_term === 0 || $modern_fashion_store_term === null) {
                // If the term does not exist, create it
                $modern_fashion_store_term = wp_insert_term($modern_fashion_store_category_name, 'product_cat');
            }

            if (is_wp_error($modern_fashion_store_term)) {
                error_log('Error creating category: ' . $modern_fashion_store_term->get_error_message());
                continue; // Skip to the next iteration if category creation fails
            }

            $modern_fashion_store_term_id = is_array($modern_fashion_store_term) ? $modern_fashion_store_term['term_id'] : $modern_fashion_store_term;

            // Loop to create 4 products for each category
            for ($modern_fashion_store_i = 0; $modern_fashion_store_i < 5; $modern_fashion_store_i++) {
                // Create product content
                $modern_fashion_store_title = $modern_fashion_store_title_array[$modern_fashion_store_index][$modern_fashion_store_i];

                // Create product post object
                $modern_fashion_store_my_post = array(
                    'post_title' => wp_strip_all_tags($modern_fashion_store_title),
                    'post_status' => 'publish',
                    'post_type' => 'product', // Post type set to 'product'
                );

                // Insert the product into the database
                $modern_fashion_store_post_id = wp_insert_post($modern_fashion_store_my_post);

                if (is_wp_error($modern_fashion_store_post_id)) {
                    error_log('Error creating product: ' . $modern_fashion_store_post_id->get_error_message());
                    continue; // Skip to the next product if creation fails
                }

                // Assign the category to the product
                wp_set_object_terms($modern_fashion_store_post_id, (int)$modern_fashion_store_term_id, 'product_cat');

                // Add product meta (price, etc.)
                update_post_meta($modern_fashion_store_post_id, '_regular_price', '$178'); // Regular price
                update_post_meta($modern_fashion_store_post_id, '_sale_price', '$89'); // Sale price
                update_post_meta($modern_fashion_store_post_id, '_price', '$89'); // Active price

                // Handle the featured image using media_sideload_image
                $modern_fashion_store_image_url = get_template_directory_uri() . '/assets/images/product-img' . ($modern_fashion_store_i + 1) . '.png';
                $modern_fashion_store_image_id = media_sideload_image($modern_fashion_store_image_url, $modern_fashion_store_post_id, null, 'id');

                if (is_wp_error($modern_fashion_store_image_id)) {
                    error_log('Error downloading image: ' . $modern_fashion_store_image_id->get_error_message());
                    continue; // Skip to the next product if image download fails
                }

                // Assign featured image to product
                set_post_thumbnail($modern_fashion_store_post_id, $modern_fashion_store_image_id);
            }
        }

    }
?>