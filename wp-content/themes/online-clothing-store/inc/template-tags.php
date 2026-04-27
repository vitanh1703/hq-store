<?php
/**
 * Custom Functions
 * @package Online clothing store
 * @since 1.0.0
 */

if( !function_exists('online_clothing_store_site_logo') ):

    /**
     * Logo & Description
     */
    /**
     * Displays the site logo, either text or image.
     *
     * @param array $online_clothing_store_args Arguments for displaying the site logo either as an image or text.
     * @param boolean $online_clothing_store_echo Echo or return the HTML.
     *
     * @return string $online_clothing_store_html Compiled HTML based on our arguments.
     */
    function online_clothing_store_site_logo( $online_clothing_store_args = array(), $online_clothing_store_echo = true ){
        $online_clothing_store_logo = get_custom_logo();
        $online_clothing_store_site_title = get_bloginfo('name');
        $online_clothing_store_contents = '';
        $online_clothing_store_classname = '';
        $online_clothing_store_defaults = array(
            'logo' => '%1$s<span class="screen-reader-text">%2$s</span>',
            'logo_class' => 'site-logo site-branding',
            'title' => '<a href="%1$s" class="custom-logo-name">%2$s</a>',
            'title_class' => 'site-title',
            'home_wrap' => '<h1 class="%1$s">%2$s</h1>',
            'single_wrap' => '<div class="%1$s">%2$s</div>',
            'condition' => (is_front_page() || is_home()) && !is_page(),
        );
        $online_clothing_store_args = wp_parse_args($online_clothing_store_args, $online_clothing_store_defaults);
        /**
         * Filters the arguments for `online_clothing_store_site_logo()`.
         *
         * @param array $online_clothing_store_args Parsed arguments.
         * @param array $online_clothing_store_defaults Function's default arguments.
         */
        $online_clothing_store_args = apply_filters('online_clothing_store_site_logo_args', $online_clothing_store_args, $online_clothing_store_defaults);
        
        $online_clothing_store_show_logo  = get_theme_mod('online_clothing_store_display_logo', false);
        $online_clothing_store_show_title = get_theme_mod('online_clothing_store_display_title', true);

        if ( has_custom_logo() && $online_clothing_store_show_logo ) {
            $online_clothing_store_contents .= sprintf($online_clothing_store_args['logo'], $online_clothing_store_logo, esc_html($online_clothing_store_site_title));
            $online_clothing_store_classname = $online_clothing_store_args['logo_class'];
        }

        if ( $online_clothing_store_show_title ) {
            $online_clothing_store_contents .= sprintf($online_clothing_store_args['title'], esc_url(get_home_url(null, '/')), esc_html($online_clothing_store_site_title));
            // If logo isn't shown, fallback to title class for wrapper.
            if ( !$online_clothing_store_show_logo ) {
                $online_clothing_store_classname = $online_clothing_store_args['title_class'];
            }
        }

        // If nothing is shown (logo or title both disabled), exit early
        if ( empty($online_clothing_store_contents) ) {
            return;
        }

        $online_clothing_store_wrap = $online_clothing_store_args['condition'] ? 'home_wrap' : 'single_wrap';
        // $online_clothing_store_wrap = 'home_wrap';
        $online_clothing_store_html = sprintf($online_clothing_store_args[$online_clothing_store_wrap], $online_clothing_store_classname, $online_clothing_store_contents);
        /**
         * Filters the arguments for `online_clothing_store_site_logo()`.
         *
         * @param string $online_clothing_store_html Compiled html based on our arguments.
         * @param array $online_clothing_store_args Parsed arguments.
         * @param string $online_clothing_store_classname Class name based on current view, home or single.
         * @param string $online_clothing_store_contents HTML for site title or logo.
         */
        $online_clothing_store_html = apply_filters('online_clothing_store_site_logo', $online_clothing_store_html, $online_clothing_store_args, $online_clothing_store_classname, $online_clothing_store_contents);
        if (!$online_clothing_store_echo) {
            return $online_clothing_store_html;
        }
        echo $online_clothing_store_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }

endif;

if( !function_exists('online_clothing_store_site_description') ):

    /**
     * Displays the site description.
     *
     * @param boolean $online_clothing_store_echo Echo or return the html.
     *
     * @return string $online_clothing_store_html The HTML to display.
     */
    function online_clothing_store_site_description($online_clothing_store_echo = true){

        if ( get_theme_mod('online_clothing_store_display_header_text', false) == true ) :
        $online_clothing_store_description = get_bloginfo('description');
        if (!$online_clothing_store_description) {
            return;
        }
        $online_clothing_store_wrapper = '<div class="site-description"><span>%s</span></div><!-- .site-description -->';
        $online_clothing_store_html = sprintf($online_clothing_store_wrapper, esc_html($online_clothing_store_description));
        /**
         * Filters the html for the site description.
         *
         * @param string $online_clothing_store_html The HTML to display.
         * @param string $online_clothing_store_description Site description via `bloginfo()`.
         * @param string $online_clothing_store_wrapper The format used in case you want to reuse it in a `sprintf()`.
         * @since 1.0.0
         *
         */
        $online_clothing_store_html = apply_filters('online_clothing_store_site_description', $online_clothing_store_html, $online_clothing_store_description, $online_clothing_store_wrapper);
        if (!$online_clothing_store_echo) {
            return $online_clothing_store_html;
        }
        echo $online_clothing_store_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        endif;
    }

endif;

if( !function_exists('online_clothing_store_posted_on') ):

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function online_clothing_store_posted_on( $online_clothing_store_icon = true, $online_clothing_store_animation_class = '' ){

        $online_clothing_store_default = online_clothing_store_get_default_theme_options();
        $online_clothing_store_post_date = absint( get_theme_mod( 'online_clothing_store_post_date',$online_clothing_store_default['online_clothing_store_post_date'] ) );

        if( $online_clothing_store_post_date ){

            $online_clothing_store_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if (get_the_time('U') !== get_the_modified_time('U')) {
                $online_clothing_store_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $online_clothing_store_time_string = sprintf($online_clothing_store_time_string,
                esc_attr(get_the_date(DATE_W3C)),
                esc_html(get_the_date()),
                esc_attr(get_the_modified_date(DATE_W3C)),
                esc_html(get_the_modified_date())
            );

            $online_clothing_store_year = get_the_date('Y');
            $online_clothing_store_month = get_the_date('m');
            $online_clothing_store_day = get_the_date('d');
            $online_clothing_store_link = get_day_link($online_clothing_store_year, $online_clothing_store_month, $online_clothing_store_day);

            $online_clothing_store_posted_on = '<a href="' . esc_url($online_clothing_store_link) . '" rel="bookmark">' . $online_clothing_store_time_string . '</a>';

            echo '<div class="entry-meta-item entry-meta-date">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $online_clothing_store_animation_class ).'">';

            if( $online_clothing_store_icon ){

                echo '<span class="entry-meta-icon calendar-icon"> ';
                online_clothing_store_the_theme_svg('calendar');
                echo '</span>';

            }

            echo '<span class="posted-on">' . $online_clothing_store_posted_on . '</span>'; // phpcs:ignore Standard.Category.SniffName.ErrorCode
            echo '</div>';
            echo '</div>';

        }

    }

endif;

if( !function_exists('online_clothing_store_posted_by') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function online_clothing_store_posted_by( $online_clothing_store_icon = true, $online_clothing_store_animation_class = '' ){   

        $online_clothing_store_default = online_clothing_store_get_default_theme_options();
        $online_clothing_store_post_author = absint( get_theme_mod( 'online_clothing_store_post_author',$online_clothing_store_default['online_clothing_store_post_author'] ) );

        if( $online_clothing_store_post_author ){

            echo '<div class="entry-meta-item entry-meta-author">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $online_clothing_store_animation_class ).'">';

            if( $online_clothing_store_icon ){
            
                echo '<span class="entry-meta-icon author-icon"> ';
                online_clothing_store_the_theme_svg('user');
                echo '</span>';
                
            }

            $online_clothing_store_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';
            echo '<span class="byline"> ' . $online_clothing_store_byline . '</span>'; // phpcs:ignore Standard.Category.SniffName.ErrorCode
            echo '</div>';
            echo '</div>';

        }

    }

endif;


if( !function_exists('online_clothing_store_posted_by_avatar') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function online_clothing_store_posted_by_avatar( $online_clothing_store_date = false ){

        $online_clothing_store_default = online_clothing_store_get_default_theme_options();
        $online_clothing_store_post_author = absint( get_theme_mod( 'online_clothing_store_post_author',$online_clothing_store_default['online_clothing_store_post_author'] ) );

        if( $online_clothing_store_post_author ){



            echo '<div class="entry-meta-left">';
            echo '<div class="entry-meta-item entry-meta-avatar">';
            echo wp_kses_post( get_avatar( get_the_author_meta( 'ID' ) ) );
            echo '</div>';
            echo '</div>';

            echo '<div class="entry-meta-right">';

            $online_clothing_store_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';

            echo '<div class="entry-meta-item entry-meta-byline"> ' . $online_clothing_store_byline . '</div>';

            if( $online_clothing_store_date ){
                online_clothing_store_posted_on($online_clothing_store_icon = false);
            }
            echo '</div>';

        }

    }

endif;

if( !function_exists('online_clothing_store_entry_footer') ):

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function online_clothing_store_entry_footer( $online_clothing_store_cats = true, $online_clothing_store_tags = true, $online_clothing_store_edits = true){   

        $online_clothing_store_default = online_clothing_store_get_default_theme_options();
        $online_clothing_store_post_category = absint( get_theme_mod( 'online_clothing_store_post_category',$online_clothing_store_default['online_clothing_store_post_category'] ) );
        $online_clothing_store_post_tags = absint( get_theme_mod( 'online_clothing_store_post_tags',$online_clothing_store_default['online_clothing_store_post_tags'] ) );

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            if( $online_clothing_store_cats && $online_clothing_store_post_category ){

                /* translators: used between list items, there is a space after the comma */
                $online_clothing_store_categories = get_the_category();
                if ($online_clothing_store_categories) {
                    echo '<div class="entry-meta-item entry-meta-categories">';
                    echo '<div class="entry-meta-wrapper">';
                
                    /* translators: 1: list of categories. */
                    echo '<span class="cat-links">';
                    foreach( $online_clothing_store_categories as $online_clothing_store_category ){

                        $online_clothing_store_cat_name = $online_clothing_store_category->name;
                        $online_clothing_store_cat_slug = $online_clothing_store_category->slug;
                        $online_clothing_store_cat_url = get_category_link( $online_clothing_store_category->term_id );
                        ?>

                        <a class="twp_cat_<?php echo esc_attr( $online_clothing_store_cat_slug ); ?>" href="<?php echo esc_url( $online_clothing_store_cat_url ); ?>" rel="category tag"><?php echo esc_html( $online_clothing_store_cat_name ); ?></a>

                    <?php }
                    echo '</span>'; // phpcs:ignore Standard.Category.SniffName.ErrorCode
                    echo '</div>';
                    echo '</div>';
                }

            }

            if( $online_clothing_store_tags && $online_clothing_store_post_tags ){
                /* translators: used between list items, there is a space after the comma */
                $online_clothing_store_tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'online-clothing-store'));
                if( $online_clothing_store_tags_list ){

                    echo '<div class="entry-meta-item entry-meta-tags">';
                    echo '<div class="entry-meta-wrapper">';

                    /* translators: 1: list of tags. */
                    echo '<span class="tags-links">';
                    echo wp_kses_post($online_clothing_store_tags_list) . '</span>'; // phpcs:ignore Standard.Category.SniffName.ErrorCode
                    echo '</div>';
                    echo '</div>';

                }

            }

            if( $online_clothing_store_edits ){

                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'online-clothing-store'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            }

        }
    }

endif;

if ( ! function_exists( 'online_clothing_store_post_thumbnail' ) ) :

    /**
     * Displays an optional post thumbnail.
     *
     * Shows background style image with height class on archive/search/front,
     * and a normal inline image on single post/page views.
     */
    function online_clothing_store_post_thumbnail( $online_clothing_store_image_size = 'full' ) {

        if ( post_password_required() || is_attachment() ) {
            return;
        }

        // Fallback image path
        $online_clothing_store_default_image = get_template_directory_uri() . '/assets/images/slide-bg.png';

        // Image size → height class map
        $online_clothing_store_size_class_map = array(
            'full'      => 'data-bg-large',
            'large'     => 'data-bg-big',
            'medium'    => 'data-bg-medium',
            'small'     => 'data-bg-small',
            'xsmall'    => 'data-bg-xsmall',
            'thumbnail' => 'data-bg-thumbnail',
        );

        $online_clothing_store_class = isset( $online_clothing_store_size_class_map[ $online_clothing_store_image_size ] )
            ? $online_clothing_store_size_class_map[ $online_clothing_store_image_size ]
            : 'data-bg-medium';

        if ( is_singular() ) {
            the_post_thumbnail();
        } else {
            // 🔵 On archives → use background image style
            $online_clothing_store_image = has_post_thumbnail()
                ? wp_get_attachment_image_src( get_post_thumbnail_id(), $online_clothing_store_image_size )
                : array( $online_clothing_store_default_image );

            $online_clothing_store_bg_image = isset( $online_clothing_store_image[0] ) ? $online_clothing_store_image[0] : $online_clothing_store_default_image;
            ?>
            <div class="post-thumbnail data-bg <?php echo esc_attr( $online_clothing_store_class ); ?>"
                 data-background="<?php echo esc_url( $online_clothing_store_bg_image ); ?>">
                <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
            </div>
            <?php
        }
    }

endif;

if( !function_exists('online_clothing_store_is_comment_by_post_author') ):

    /**
     * Comments
     */
    /**
     * Check if the specified comment is written by the author of the post commented on.
     *
     * @param object $online_clothing_store_comment Comment data.
     *
     * @return bool
     */
    function online_clothing_store_is_comment_by_post_author($online_clothing_store_comment = null){

        if (is_object($online_clothing_store_comment) && $online_clothing_store_comment->user_id > 0) {
            $online_clothing_store_user = get_userdata($online_clothing_store_comment->user_id);
            $post = get_post($online_clothing_store_comment->comment_post_ID);
            if (!empty($online_clothing_store_user) && !empty($post)) {
                return $online_clothing_store_comment->user_id === $post->post_author;
            }
        }
        return false;
    }

endif;

if( !function_exists('online_clothing_store_breadcrumb') ) :

    /**
     * Online clothing store Breadcrumb
     */
    function online_clothing_store_breadcrumb($online_clothing_store_comment = null){

        echo '<div class="entry-breadcrumb">';
        online_clothing_store_breadcrumb_trail();
        echo '</div>';

    }

endif;