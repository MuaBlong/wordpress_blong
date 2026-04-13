<?php
/**
* Custom Functions.
*
* @package CV Resume Portfolio
*/

if( !function_exists( 'cv_resume_portfolio_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function cv_resume_portfolio_sanitize_sidebar_option( $cv_resume_portfolio_input ){

        $cv_resume_portfolio_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $cv_resume_portfolio_input,$cv_resume_portfolio_metabox_options ) ){

            return $cv_resume_portfolio_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'cv_resume_portfolio_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function cv_resume_portfolio_sanitize_checkbox( $cv_resume_portfolio_checked ) {

		return ( ( isset( $cv_resume_portfolio_checked ) && true === $cv_resume_portfolio_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'cv_resume_portfolio_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function cv_resume_portfolio_sanitize_select( $cv_resume_portfolio_input, $cv_resume_portfolio_setting ) {
        $cv_resume_portfolio_input = sanitize_text_field( $cv_resume_portfolio_input );
        $cv_resume_portfolio_choices = $cv_resume_portfolio_setting->manager->get_control( $cv_resume_portfolio_setting->id )->choices;
        return ( array_key_exists( $cv_resume_portfolio_input, $cv_resume_portfolio_choices ) ? $cv_resume_portfolio_input : $cv_resume_portfolio_setting->default );
    }

endif;