<?php
/**
* Customizer Custom Classes.
* @package CV Resume Portfolio
*/

if ( ! function_exists( 'cv_resume_portfolio_sanitize_number_range' ) ) :
    function cv_resume_portfolio_sanitize_number_range( $cv_resume_portfolio_input, $cv_resume_portfolio_setting ) {
        $cv_resume_portfolio_input = absint( $cv_resume_portfolio_input );
        $cv_resume_portfolio_atts = $cv_resume_portfolio_setting->manager->get_control( $cv_resume_portfolio_setting->id )->input_attrs;
        $cv_resume_portfolio_min = ( isset( $cv_resume_portfolio_atts['min'] ) ? $cv_resume_portfolio_atts['min'] : $cv_resume_portfolio_input );
        $cv_resume_portfolio_max = ( isset( $cv_resume_portfolio_atts['max'] ) ? $cv_resume_portfolio_atts['max'] : $cv_resume_portfolio_input );
        $cv_resume_portfolio_step = ( isset( $cv_resume_portfolio_atts['step'] ) ? $cv_resume_portfolio_atts['step'] : 1 );
        return ( $cv_resume_portfolio_min <= $cv_resume_portfolio_input && $cv_resume_portfolio_input <= $cv_resume_portfolio_max && is_int( $cv_resume_portfolio_input / $cv_resume_portfolio_step ) ? $cv_resume_portfolio_input : $cv_resume_portfolio_setting->default );
    }
endif;

/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class CV_Resume_Portfolio_Customize_Section_Upsell extends WP_Customize_Section {

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