<?php
/**
* Custom Addons.
*
* @package CV Resume Portfolio
*/

$wp_customize->add_section( 'cv_resume_portfolio_theme_pagination_options',
    array(
    'title'      => esc_html__( 'Customizer Custom Settings', 'cv-resume-portfolio' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'cv_resume_portfolio_theme_addons_panel',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_theme_loader',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_theme_loader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_theme_loader',
    array(
        'label' => esc_html__('Enable Preloader', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_theme_pagination_options',
        'type' => 'checkbox',
    )
);

// Add Pagination Enable/Disable option to Customizer
$wp_customize->add_setting( 'cv_resume_portfolio_enable_pagination', 
    array(
        'default'           => true, // Default is enabled
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_enable_pagination', // Sanitize the input
    )
);

// Add the control to the Customizer
$wp_customize->add_control( 'cv_resume_portfolio_enable_pagination', 
    array(
        'label'    => esc_html__( 'Enable Pagination', 'cv-resume-portfolio' ),
        'section'  => 'cv_resume_portfolio_theme_pagination_options', // Add to the correct section
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_theme_pagination_type', 
    array(
        'default'           => 'numeric', // Set "numeric" as the default
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_pagination_type', // Use our sanitize function
    )
);

$wp_customize->add_control( 'cv_resume_portfolio_theme_pagination_type',
    array(
        'label'       => esc_html__( 'Pagination Style', 'cv-resume-portfolio' ),
        'section'     => 'cv_resume_portfolio_theme_pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'numeric'      => esc_html__( 'Numeric (Page Numbers)', 'cv-resume-portfolio' ),
            'newer_older'  => esc_html__( 'Newer/Older (Previous/Next)', 'cv-resume-portfolio' ), // Renamed to "Newer/Older"
        ),
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_theme_pagination_options_alignment',
    array(
    'default' => $cv_resume_portfolio_default['cv_resume_portfolio_theme_pagination_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_theme_pagination_options_alignment',
    array(
    'label'       => esc_html__( 'Pagination Alignment', 'cv-resume-portfolio' ),
    'section'     => 'cv_resume_portfolio_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'cv-resume-portfolio' ),
        'Right' => esc_html__( 'Right', 'cv-resume-portfolio' ),
        'Left'  => esc_html__( 'Left', 'cv-resume-portfolio' ),
        ),
    )
);

$wp_customize->add_setting('cv_resume_portfolio_theme_breadcrumb_enable',
array(
    'default' => $cv_resume_portfolio_default['cv_resume_portfolio_theme_breadcrumb_enable'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
)
);
$wp_customize->add_control('cv_resume_portfolio_theme_breadcrumb_enable',
    array(
        'label' => esc_html__('Enable Breadcrumb', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_theme_pagination_options',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_theme_breadcrumb_options_alignment',
    array(
    'default' => $cv_resume_portfolio_default['cv_resume_portfolio_theme_breadcrumb_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_theme_breadcrumb_options_alignment',
    array(
    'label'       => esc_html__( 'Breadcrumb Alignment', 'cv-resume-portfolio' ),
    'section'     => 'cv_resume_portfolio_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'cv-resume-portfolio' ),
        'Right' => esc_html__( 'Right', 'cv-resume-portfolio' ),
        'Left'  => esc_html__( 'Left', 'cv-resume-portfolio' ),
        ),
    )
);

$wp_customize->add_setting('cv_resume_portfolio_breadcrumb_font_size',
    array(
        'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_breadcrumb_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_number_range',
    )
);
$wp_customize->add_control('cv_resume_portfolio_breadcrumb_font_size',
    array(
        'label'       => esc_html__('Breadcrumb Font Size', 'cv-resume-portfolio'),
        'section'     => 'cv_resume_portfolio_theme_pagination_options',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);