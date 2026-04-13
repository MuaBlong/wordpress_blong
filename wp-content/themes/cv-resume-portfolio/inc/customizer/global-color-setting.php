<?php
/**
* Global Color Settings.
*
* @package CV Resume Portfolio
*/

$cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'cv_resume_portfolio_global_secondary_color_setting',
	array(
	'title'      => esc_html__( 'Global Color Settings', 'cv-resume-portfolio' ),
	'priority'   => 1,
	'capability' => 'edit_theme_options',
	'panel'      => 'cv_resume_portfolio_theme_option_panel',
	)
);

$wp_customize->add_setting( 'cv_resume_portfolio_global_color',
    array(
    'default'           => '#FFDB59 ',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'cv_resume_portfolio_global_color',
    array(
        'label'      => esc_html__( 'Global Color', 'cv-resume-portfolio' ),
        'section'    => 'cv_resume_portfolio_global_color_setting',
        'settings'   => 'cv_resume_portfolio_global_color',
    ) ) 
);

$wp_customize->add_setting( 'cv_resume_portfolio_global_secondary_color',
    array(
    'default'           => '#0F131F',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'cv_resume_portfolio_global_secondary_color',
    array(
        'label'      => esc_html__( 'Secondary Color', 'cv-resume-portfolio' ),
        'section'    => 'cv_resume_portfolio_global_color_setting',
        'settings'   => 'cv_resume_portfolio_global_secondary_color',
    ) ) 
);