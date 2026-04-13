<?php
/**
* Typography Settings.
*
* @package CV Resume Portfolio
*/

$cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'cv_resume_portfolio_typography_setting',
	array(
	'title'      => esc_html__( 'Typography Settings', 'cv-resume-portfolio' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'cv_resume_portfolio_theme_option_panel',
	)
);

// -----------------  Font array
$cv_resume_portfolio_fonts = array(
    'Select'           => __('Default Font', 'cv-resume-portfolio'),
    'bad-script' => 'Bad Script',
    'bitter'     => 'Bitter',
    'charis-sil' => 'Charis SIL',
    'cuprum'     => 'Cuprum',
    'exo-2'      => 'Exo 2',
    'jost'       => 'Jost',
    'montserrat' => 'Montserrat',
    'open-sans'  => 'Open Sans',
    'oswald'     => 'Oswald',
    'play'       => 'Play',
    'roboto'     => 'Roboto',
    'outfit'     => 'Outfit',
    'ubuntu'     => 'Ubuntu',
    'saira'      => 'Saira',
    'cinzel'     => 'Cinzel',
    'figtree'     => 'Figtree'
);

 // -----------------  General text font
 $wp_customize->add_setting( 'cv_resume_portfolio_content_typography_font', array(
    'default'           => 'montserrat',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_radio_sanitize',
) );
$wp_customize->add_control( 'cv_resume_portfolio_content_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Content Font', 'cv-resume-portfolio' ),
    'section'  => 'cv_resume_portfolio_typography_setting',
    'settings' => 'cv_resume_portfolio_content_typography_font',
    'choices'  => $cv_resume_portfolio_fonts,
) );

 // -----------------  General Heading Font
$wp_customize->add_setting( 'cv_resume_portfolio_heading_typography_font', array(
    'default'           => 'montserrat',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_radio_sanitize',
) );
$wp_customize->add_control( 'cv_resume_portfolio_heading_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Heading Font', 'cv-resume-portfolio' ),
    'section'  => 'cv_resume_portfolio_typography_setting',
    'settings' => 'cv_resume_portfolio_heading_typography_font',
    'choices'  => $cv_resume_portfolio_fonts,
) );