<?php
/**
 * Custom HTML Section
 *
 * @package Minimal_Shop_Ecommerce
 */

$wp_customize->add_section(
	'jason_portfolio_resume_custom_html_section',
	array(
		'panel'    => 'jason_portfolio_resume_front_page_options',
		'title'    => esc_html__( 'Custom HTML', 'melissa-portfolio' ),
		'priority' => jason_portfolio_resume_priority_section('jason_portfolio_resume_custom_html_section'),
	)
);

// About Section - Enable Section.
$wp_customize->add_setting(
	'jason_portfolio_resume_enable_custom_html_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'jason_portfolio_resume_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Jason_Portfolio_Resume_Toggle_Switch_Custom_Control(
		$wp_customize,
		'jason_portfolio_resume_enable_custom_html_section',
		array(
			'label'    => esc_html__( 'Enable Custom HTML Section', 'melissa-portfolio' ),
			'section'  => 'jason_portfolio_resume_custom_html_section',
			'settings' => 'jason_portfolio_resume_enable_custom_html_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'jason_portfolio_resume_enable_custom_html_section',
		array(
			'selector' => '#custom-html .section-link',
			'settings' => 'jason_portfolio_resume_enable_custom_html_section',
		)
	);
}

$wp_customize->add_setting(
    'jason_portfolio_resume_custom_html_id',
    array(
        'default'           => __( 'custom-html', 'jason-portfolio-resume' ),
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'jason_portfolio_resume_custom_html_id',
    array(
        'label'           => esc_html__( 'ID #', 'jason-portfolio-resume' ),
        'section'         => 'jason_portfolio_resume_custom_html_section',
        'settings'        => 'jason_portfolio_resume_custom_html_id',
        'type'            => 'text',
        'active_callback' => 'jason_portfolio_resume_is_custom_html_section_enabled',
    )
);