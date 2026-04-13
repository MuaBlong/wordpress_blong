<?php

function cv_resume_portfolio_enqueue_fonts() {
    $cv_resume_portfolio_default_font_content = 'montserrat';
    $cv_resume_portfolio_default_font_heading = 'montserrat';

    $cv_resume_portfolio_font_content = esc_attr(get_theme_mod('cv_resume_portfolio_content_typography_font', $cv_resume_portfolio_default_font_content));
    $cv_resume_portfolio_font_heading = esc_attr(get_theme_mod('cv_resume_portfolio_heading_typography_font', $cv_resume_portfolio_default_font_heading));

    $cv_resume_portfolio_css = '';

    // Always enqueue main font
    $cv_resume_portfolio_css .= '
    :root {
        --font-main: ' . $cv_resume_portfolio_font_content . ', ' . (in_array($cv_resume_portfolio_font_content, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . ' !important;
    }';
    wp_enqueue_style('cv-resume-portfolio-style-font-general', get_template_directory_uri() . '/fonts/' . $cv_resume_portfolio_font_content . '/font.css');

    // Always enqueue header font
    $cv_resume_portfolio_css .= '
    :root {
        --font-head: ' . $cv_resume_portfolio_font_heading . ', ' . (in_array($cv_resume_portfolio_font_heading, ['bitter', 'charis-sil']) ? 'serif' : 'serif ') . ' !important;
    }';
    wp_enqueue_style('cv-resume-portfolio-style-font-h', get_template_directory_uri() . '/fonts/' . $cv_resume_portfolio_font_heading . '/font.css');

    // Add inline style
    wp_add_inline_style('cv-resume-portfolio-style-font-general', $cv_resume_portfolio_css);
}
add_action('wp_enqueue_scripts', 'cv_resume_portfolio_enqueue_fonts', 50);