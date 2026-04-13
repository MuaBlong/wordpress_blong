<?php
/**
* Additional Woocommerce Settings.
*
* @package CV Resume Portfolio
*/

$cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'cv_resume_portfolio_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'cv-resume-portfolio' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'cv_resume_portfolio_theme_option_panel',
	)
);

	$wp_customize->add_setting('cv_resume_portfolio_per_columns',
		array(
		'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_per_columns'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cv_resume_portfolio_sanitize_number_range',
		)
	);
	$wp_customize->add_control('cv_resume_portfolio_per_columns',
		array(
		'label'       => esc_html__('Products Per Column', 'cv-resume-portfolio'),
		'section'     => 'cv_resume_portfolio_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 6,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('cv_resume_portfolio_product_per_page',
		array(
		'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_product_per_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cv_resume_portfolio_sanitize_number_range',
		)
	);
	$wp_customize->add_control('cv_resume_portfolio_product_per_page',
		array(
		'label'       => esc_html__('Products Per Page', 'cv-resume-portfolio'),
		'section'     => 'cv_resume_portfolio_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 100,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('cv_resume_portfolio_show_hide_related_product',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_show_hide_related_product'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
	);
	$wp_customize->add_control('cv_resume_portfolio_show_hide_related_product',
	    array(
	        'label' => esc_html__('Enable Related Products', 'cv-resume-portfolio'),
	        'section' => 'cv_resume_portfolio_additional_woocommerce_options',
	        'type' => 'checkbox',
	    )
	);

	$wp_customize->add_setting('cv_resume_portfolio_custom_related_products_number',
		array(
		'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_custom_related_products_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cv_resume_portfolio_sanitize_number_range',
		)
	);
	$wp_customize->add_control('cv_resume_portfolio_custom_related_products_number',
		array(
		'label'       => esc_html__('Related Products Per Page', 'cv-resume-portfolio'),
		'section'     => 'cv_resume_portfolio_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 10,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('cv_resume_portfolio_custom_related_products_number_per_row',
		array(
		'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_custom_related_products_number_per_row'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cv_resume_portfolio_sanitize_number_range',
		)
	);
	$wp_customize->add_control('cv_resume_portfolio_custom_related_products_number_per_row',
		array(
		'label'       => esc_html__('Related Products Per Row', 'cv-resume-portfolio'),
		'section'     => 'cv_resume_portfolio_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 5,
		'step'   => 1,
		),
		)
	);