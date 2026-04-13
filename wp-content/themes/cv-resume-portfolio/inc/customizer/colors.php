<?php
/**
* Color Settings.
* @package CV Resume Portfolio
*/

$cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();

$wp_customize->add_setting( 'cv_resume_portfolio_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'cv_resume_portfolio_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'cv-resume-portfolio' ),
        'section'    => 'colors',
        'settings'   => 'cv_resume_portfolio_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'cv_resume_portfolio_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'cv_resume_portfolio_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'cv-resume-portfolio' ),
        'section'    => 'colors',
        'settings'   => 'cv_resume_portfolio_border_color',
    ) ) 
);