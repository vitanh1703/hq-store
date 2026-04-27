<?php
/**
* Custom Functions.
*
* @package Online clothing store
*/

if( !function_exists( 'online_clothing_store_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function online_clothing_store_sanitize_sidebar_option( $online_clothing_store_input ){

        $online_clothing_store_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $online_clothing_store_input,$online_clothing_store_metabox_options ) ){

            return $online_clothing_store_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'online_clothing_store_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function online_clothing_store_sanitize_checkbox( $online_clothing_store_checked ) {

		return ( ( isset( $online_clothing_store_checked ) && true === $online_clothing_store_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'online_clothing_store_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function online_clothing_store_sanitize_select( $online_clothing_store_input, $online_clothing_store_setting ) {
        $online_clothing_store_input = sanitize_text_field( $online_clothing_store_input );
        $online_clothing_store_choices = $online_clothing_store_setting->manager->get_control( $online_clothing_store_setting->id )->choices;
        return ( array_key_exists( $online_clothing_store_input, $online_clothing_store_choices ) ? $online_clothing_store_input : $online_clothing_store_setting->default );
    }

endif;