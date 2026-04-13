<?php
/**
* Posts Settings.
*
* @package CV Resume Portfolio
*/

$cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'cv_resume_portfolio_single_posts_settings',
    array(
    'title'      => esc_html__( 'Single Meta Information Settings', 'cv-resume-portfolio' ),
    'priority'   => 35,
    'capability' => 'edit_theme_options',
    'panel'      => 'cv_resume_portfolio_theme_option_panel',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_display_single_post_image',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_display_single_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_display_single_post_image',
    array(
        'label' => esc_html__('Enable Single Posts Image', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_post_author',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_post_date',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_post_category',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_post_tags',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_single_page_content_alignment',
    array(
    'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_single_page_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_single_page_content_alignment',
    array(
    'label'       => esc_html__( 'Single Page Content Alignment', 'cv-resume-portfolio' ),
    'section'     => 'cv_resume_portfolio_single_posts_settings',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'cv-resume-portfolio' ),
        'center'  => esc_html__( 'Center', 'cv-resume-portfolio' ),
        'right'    => esc_html__( 'Right', 'cv-resume-portfolio' ),
        ),
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_single_post_content_alignment',
    array(
    'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_single_post_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_single_post_content_alignment',
    array(
    'label'       => esc_html__( 'Single Post Content Alignment', 'cv-resume-portfolio' ),
    'section'     => 'cv_resume_portfolio_single_posts_settings',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'cv-resume-portfolio' ),
        'center'  => esc_html__( 'Center', 'cv-resume-portfolio' ),
        'right'    => esc_html__( 'Right', 'cv-resume-portfolio' ),
        ),
    )
);

// Archive Post Section.
$wp_customize->add_section( 'cv_resume_portfolio_posts_settings',
    array(
    'title'      => esc_html__( 'Archive Meta Information Settings', 'cv-resume-portfolio' ),
    'priority'   => 36,
    'capability' => 'edit_theme_options',
    'panel'      => 'cv_resume_portfolio_theme_option_panel',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_display_archive_post_format_icon',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_display_archive_post_format_icon'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_display_archive_post_format_icon',
    array(
        'label' => esc_html__('Enable Posts Format Icon', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_display_archive_post_image',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_display_archive_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_display_archive_post_image',
    array(
        'label' => esc_html__('Enable Posts Image', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_display_archive_post_category',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_display_archive_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_display_archive_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_display_archive_post_title',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_display_archive_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_display_archive_post_title',
    array(
        'label' => esc_html__('Enable Posts Title', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_display_archive_post_content',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_display_archive_post_content'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_display_archive_post_content',
    array(
        'label' => esc_html__('Enable Posts Content', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_display_archive_post_button',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_display_archive_post_button'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_display_archive_post_button',
    array(
        'label' => esc_html__('Enable Posts Button', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('cv_resume_portfolio_excerpt_limit',
    array(
        'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_excerpt_limit'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_number_range',
    )
);
$wp_customize->add_control('cv_resume_portfolio_excerpt_limit',
    array(
        'label'       => esc_html__('Blog Posts Excerpt limit', 'cv-resume-portfolio'),
        'section'     => 'cv_resume_portfolio_posts_settings',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 100,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_archive_image_size',
	array(
	'default'           => 'medium',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'cv_resume_portfolio_sanitize_select',
	)
);
$wp_customize->add_control( 'cv_resume_portfolio_archive_image_size',
	array(
	'label'       => esc_html__( 'Blog Posts Image Size', 'cv-resume-portfolio' ),
	'section'     => 'cv_resume_portfolio_posts_settings',
	'type'        => 'select',
	'choices'               => array(
		'full' => esc_html__( 'Large Size Image', 'cv-resume-portfolio' ),
		'large' => esc_html__( 'Big Size Image', 'cv-resume-portfolio' ),
		'medium' => esc_html__( 'Medium Size Image', 'cv-resume-portfolio' ),
		'small' => esc_html__( 'Small Size Image', 'cv-resume-portfolio' ),
		'xsmall' => esc_html__( 'Extra Small Size Image', 'cv-resume-portfolio' ),
		'thumbnail' => esc_html__( 'Thumbnail Size Image', 'cv-resume-portfolio' ),
	    ),
	)
);

$wp_customize->add_setting('cv_resume_portfolio_posts_per_columns',
    array(
    'default'           => '3',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_number_range',
    )
);
$wp_customize->add_control('cv_resume_portfolio_posts_per_columns',
    array(
    'label'       => esc_html__('Blog Posts Per Column', 'cv-resume-portfolio'),
    'section'     => 'cv_resume_portfolio_posts_settings',
    'type'        => 'number',
    'input_attrs' => array(
    'min'   => 1,
    'max'   => 5,
    'step'   => 1,
    ),
    )
);