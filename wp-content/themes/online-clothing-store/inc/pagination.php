<?php
/**
 *
 * Pagination Functions
 *
 * @package Online clothing store
 */

/**
 * Pagination for archive.
 */
function online_clothing_store_render_posts_pagination() {
    // Get the setting to check if pagination is enabled
    $online_clothing_store_is_pagination_enabled = get_theme_mod( 'online_clothing_store_enable_pagination', true );

    // Check if pagination is enabled
    if ( $online_clothing_store_is_pagination_enabled ) {
        // Get the selected pagination type from the Customizer
        $online_clothing_store_pagination_type = get_theme_mod( 'online_clothing_store_theme_pagination_type', 'numeric' );

        // Check if the pagination type is "newer_older" (Previous/Next) or "numeric"
        if ( 'newer_older' === $online_clothing_store_pagination_type ) :
            // Display "Newer/Older" pagination (Previous/Next navigation)
            the_posts_navigation(
                array(
                    'prev_text' => __( '&laquo; Newer', 'online-clothing-store' ),  // Change the label for "previous"
                    'next_text' => __( 'Older &raquo;', 'online-clothing-store' ),  // Change the label for "next"
                    'screen_reader_text' => __( 'Posts navigation', 'online-clothing-store' ),
                )
            );
        else :
            // Display numeric pagination (Page numbers)
            the_posts_pagination(
                array(
                    'prev_text' => __( '&laquo; Previous', 'online-clothing-store' ),
                    'next_text' => __( 'Next &raquo;', 'online-clothing-store' ),
                    'type'      => 'list', // Display as <ul> <li> tags
                    'screen_reader_text' => __( 'Posts navigation', 'online-clothing-store' ),
                )
            );
        endif;
    }
}
add_action( 'online_clothing_store_posts_pagination', 'online_clothing_store_render_posts_pagination', 10 );