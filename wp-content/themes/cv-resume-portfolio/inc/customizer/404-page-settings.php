<?php
/**
* 404 Page Settings.
*
* @package CV Resume Portfolio
*/

$cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();

$wp_customize->add_section( 'cv_resume_portfolio_404_page_settings',
    array(
        'title'      => esc_html__( '404 Page Settings', 'cv-resume-portfolio' ),
        'priority'   => 200,
        'capability' => 'edit_theme_options',
        'panel'      => 'cv_resume_portfolio_theme_addons_panel',
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_404_main_title',
    array(
        'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_404_main_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_404_main_title',
    array(
        'label'    => esc_html__( '404 Main Title', 'cv-resume-portfolio' ),
        'section'  => 'cv_resume_portfolio_404_page_settings',
        'type'     => 'text',
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_404_subtitle_one',
    array(
        'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_404_subtitle_one'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_404_subtitle_one',
    array(
        'label'    => esc_html__( '404 Sub Title One', 'cv-resume-portfolio' ),
        'section'  => 'cv_resume_portfolio_404_page_settings',
        'type'     => 'text',
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_404_para_one',
    array(
        'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_404_para_one'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_404_para_one',
    array(
        'label'    => esc_html__( '404 Para Text One', 'cv-resume-portfolio' ),
        'section'  => 'cv_resume_portfolio_404_page_settings',
        'type'     => 'text',
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_404_subtitle_two',
    array(
        'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_404_subtitle_two'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_404_subtitle_two',
    array(
        'label'    => esc_html__( '404 Sub Title Two', 'cv-resume-portfolio' ),
        'section'  => 'cv_resume_portfolio_404_page_settings',
        'type'     => 'text',
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_404_para_two',
    array(
        'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_404_para_two'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_404_para_two',
    array(
        'label'    => esc_html__( '404 Para Text Two', 'cv-resume-portfolio' ),
        'section'  => 'cv_resume_portfolio_404_page_settings',
        'type'     => 'text',
    )
);