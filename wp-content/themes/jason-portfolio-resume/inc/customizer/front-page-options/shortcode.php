<?php
/**
 * Shortcode Section
 *
 * @package Melissa_Portfolio
 */

$wp_customize->add_section(
	'jason_portfolio_resume_shortcode_section',
	array(
		'panel'    => 'jason_portfolio_resume_front_page_options',
		'title'    => esc_html__( 'Shortcode', 'melissa-portfolio' ),
		'priority' => jason_portfolio_resume_priority_section('jason_portfolio_resume_shortcode_section'),
	)
);

// Shortcode Section - Enable Section.
$wp_customize->add_setting(
	'jason_portfolio_resume_enable_shortcode_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'jason_portfolio_resume_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Jason_Portfolio_Resume_Toggle_Switch_Custom_Control(
		$wp_customize,
		'jason_portfolio_resume_enable_shortcode_section',
		array(
			'label'    => esc_html__( 'Enable Shortcode Section', 'melissa-portfolio' ),
			'section'  => 'jason_portfolio_resume_shortcode_section',
			'settings' => 'jason_portfolio_resume_enable_shortcode_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'jason_portfolio_resume_enable_shortcode_section',
		array(
			'selector' => '#shortcode .section-link',
			'settings' => 'jason_portfolio_resume_enable_shortcode_section',
		)
	);
}

$wp_customize->add_setting(
    'jason_portfolio_resume_shortcode_section_content',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'jason_portfolio_resume_shortcode_section_content',
    array(
        'label'           => esc_html__( 'Shortcode', 'melissa-portfolio' ),
        'section'         => 'jason_portfolio_resume_shortcode_section',
        'settings'        => 'jason_portfolio_resume_shortcode_section_content',
        'type'            => 'text',
        'active_callback' => 'jason_portfolio_resume_is_shortcode_section_enabled',
    )
);