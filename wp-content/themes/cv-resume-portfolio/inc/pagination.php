<?php
/**
 *
 * Pagination Functions
 *
 * @package CV Resume Portfolio
 */

/**
 * Pagination for archive.
 */
function cv_resume_portfolio_render_posts_pagination() {
    // Get the setting to check if pagination is enabled
    $cv_resume_portfolio_is_pagination_enabled = get_theme_mod( 'cv_resume_portfolio_enable_pagination', true );

    // Check if pagination is enabled
    if ( $cv_resume_portfolio_is_pagination_enabled ) {
        // Get the selected pagination type from the Customizer
        $cv_resume_portfolio_pagination_type = get_theme_mod( 'cv_resume_portfolio_theme_pagination_type', 'numeric' );

        // Check if the pagination type is "newer_older" (Previous/Next) or "numeric"
        if ( 'newer_older' === $cv_resume_portfolio_pagination_type ) :
            // Display "Newer/Older" pagination (Previous/Next navigation)
            the_posts_navigation(
                array(
                    'prev_text' => __( '&laquo; Newer', 'cv-resume-portfolio' ),  // Change the label for "previous"
                    'next_text' => __( 'Older &raquo;', 'cv-resume-portfolio' ),  // Change the label for "next"
                    'screen_reader_text' => __( 'Posts navigation', 'cv-resume-portfolio' ),
                )
            );
        else :
            // Display numeric pagination (Page numbers)
            the_posts_pagination(
                array(
                    'prev_text' => __( '&laquo; Previous', 'cv-resume-portfolio' ),
                    'next_text' => __( 'Next &raquo;', 'cv-resume-portfolio' ),
                    'type'      => 'list', // Display as <ul> <li> tags
                    'screen_reader_text' => __( 'Posts navigation', 'cv-resume-portfolio' ),
                )
            );
        endif;
    }
}
add_action( 'cv_resume_portfolio_posts_pagination', 'cv_resume_portfolio_render_posts_pagination', 10 );