<?php
/**
 * Body Classes.
 * @package CV Resume Portfolio
 */

if (!function_exists('cv_resume_portfolio_body_classes')) :

    function cv_resume_portfolio_body_classes($cv_resume_portfolio_classes)
    {
        $cv_resume_portfolio_defaults = cv_resume_portfolio_get_default_theme_options();
        $cv_resume_portfolio_layout = cv_resume_portfolio_get_final_sidebar_layout();

        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $cv_resume_portfolio_classes[] = 'hfeed';
        }

        // Sidebar layout logic
        $cv_resume_portfolio_classes[] = $cv_resume_portfolio_layout;

        // Copyright alignment
        $copyright_alignment = get_theme_mod('cv_resume_portfolio_copyright_alignment', 'Default');
        $cv_resume_portfolio_classes[] = 'copyright-' . strtolower($copyright_alignment);

        return $cv_resume_portfolio_classes;
    }

endif;

add_filter('body_class', 'cv_resume_portfolio_body_classes');