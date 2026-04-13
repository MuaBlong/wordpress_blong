<?php
/**
* Header Options.
*
* @package CV Resume Portfolio
*/

$cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'cv_resume_portfolio_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'cv-resume-portfolio' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'cv_resume_portfolio_theme_option_panel',
	)
);

$wp_customize->add_setting('cv_resume_portfolio_sticky',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_sticky'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_sticky',
    array(
        'label' => esc_html__('Enable Sticky Header', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_menu_font_size',
    array(
        'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_number_range',
    )
);
$wp_customize->add_control('cv_resume_portfolio_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'cv-resume-portfolio'),
        'section'     => 'cv_resume_portfolio_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_menu_text_transform',
    array(
    'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'cv-resume-portfolio' ),
    'section'     => 'cv_resume_portfolio_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'cv-resume-portfolio' ),
        'uppercase'  => esc_html__( 'Uppercase', 'cv-resume-portfolio' ),
        'lowercase'    => esc_html__( 'Lowercase', 'cv-resume-portfolio' ),
        ),
    )
);