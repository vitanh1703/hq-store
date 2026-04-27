<?php
/**
* Customizer Custom Classes.
* @package Online clothing store
*/

if ( ! function_exists( 'online_clothing_store_sanitize_number_range' ) ) :
    function online_clothing_store_sanitize_number_range( $online_clothing_store_input, $online_clothing_store_setting ) {
        $online_clothing_store_input = absint( $online_clothing_store_input );
        $online_clothing_store_atts = $online_clothing_store_setting->manager->get_control( $online_clothing_store_setting->id )->input_attrs;
        $online_clothing_store_min = ( isset( $online_clothing_store_atts['min'] ) ? $online_clothing_store_atts['min'] : $online_clothing_store_input );
        $online_clothing_store_max = ( isset( $online_clothing_store_atts['max'] ) ? $online_clothing_store_atts['max'] : $online_clothing_store_input );
        $online_clothing_store_step = ( isset( $online_clothing_store_atts['step'] ) ? $online_clothing_store_atts['step'] : 1 );
        return ( $online_clothing_store_min <= $online_clothing_store_input && $online_clothing_store_input <= $online_clothing_store_max && is_int( $online_clothing_store_input / $online_clothing_store_step ) ? $online_clothing_store_input : $online_clothing_store_setting->default );
    }
endif;

/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Online_clothing_store_Customize_Section_Upsell extends WP_Customize_Section {

    /**
     * The type of customize section being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'upsell';

    /**
     * Custom button text to output.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_text = '';

    /**
     * Custom pro button URL.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_url = '';

    public $notice = '';
    public $nonotice = '';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function json() {
        $json = parent::json();

        $json['pro_text'] = $this->pro_text;
        $json['pro_url']  = esc_url( $this->pro_url );
        $json['notice']  = esc_attr( $this->notice );
        $json['nonotice']  = esc_attr( $this->nonotice );

        return $json;
    }

    /**
     * Outputs the Underscore.js template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    protected function render_template() { ?>

        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

            <# if ( data.notice ) { #>
                <h3 class="accordion-section-notice">
                    {{ data.title }}
                </h3>
            <# } #>

            <# if ( !data.notice ) { #>
                <h3 class="accordion-section-title">
                    {{ data.title }}

                    <# if ( data.pro_text && data.pro_url ) { #>
                        <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            <# } #>
            
        </li>
    <?php }
}