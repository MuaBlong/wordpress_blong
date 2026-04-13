<?php
/**
* Layouts Settings.
*
* @package CV Resume Portfolio
*/

$cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'cv_resume_portfolio_layout_setting',
	array(
	'title'      => esc_html__( 'Sidebar Settings', 'cv-resume-portfolio' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'cv_resume_portfolio_theme_option_panel',
	)
);

$wp_customize->add_setting( 'cv_resume_portfolio_global_sidebar_layout',
    array(
    'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'cv-resume-portfolio' ),
    'section'     => 'cv_resume_portfolio_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'cv-resume-portfolio' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'cv-resume-portfolio' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'cv-resume-portfolio' ),
        ),
    )
);

$wp_customize->add_setting('cv_resume_portfolio_page_sidebar_layout', array(
    'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_sidebar_option',
));

$wp_customize->add_control('cv_resume_portfolio_page_sidebar_layout', array(
    'label'       => esc_html__('Single Page Sidebar Layout', 'cv-resume-portfolio'),
    'section'     => 'cv_resume_portfolio_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'cv-resume-portfolio'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'cv-resume-portfolio'),
        'no-sidebar'    => esc_html__('No Sidebar', 'cv-resume-portfolio'),
    ),
));

$wp_customize->add_setting('cv_resume_portfolio_post_sidebar_layout', array(
    'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_sidebar_option',
));

$wp_customize->add_control('cv_resume_portfolio_post_sidebar_layout', array(
    'label'       => esc_html__('Single Post Sidebar Layout', 'cv-resume-portfolio'),
    'section'     => 'cv_resume_portfolio_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'cv-resume-portfolio'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'cv-resume-portfolio'),
        'no-sidebar'    => esc_html__('No Sidebar', 'cv-resume-portfolio'),
    ),
));

$wp_customize->add_setting('cv_resume_portfolio_sticky_sidebar',
    array(
        'default'           => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_sticky_sidebar',
    array(
        'label' => esc_html__('Enable/Disable Sticky Sidebar', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_layout_setting',
        'type' => 'checkbox',
    )
);