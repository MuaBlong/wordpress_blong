<?php
/**
* Footer Settings.
*
* @package CV Resume Portfolio
*/

$cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();

$wp_customize->add_section( 'cv_resume_portfolio_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Settings', 'cv-resume-portfolio' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'cv_resume_portfolio_theme_option_panel',
	)
);

$wp_customize->add_setting('cv_resume_portfolio_display_footer',
    array(
    'default' => $cv_resume_portfolio_default['cv_resume_portfolio_display_footer'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
)
);
$wp_customize->add_control('cv_resume_portfolio_display_footer',
    array(
        'label' => esc_html__('Enable Footer', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_footer_column_layout',
	array(
	'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'cv_resume_portfolio_sanitize_select',
	)
);
$wp_customize->add_control( 'cv_resume_portfolio_footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'cv-resume-portfolio' ),
	'section'     => 'cv_resume_portfolio_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'cv-resume-portfolio' ),
		'2' => esc_html__( 'Two Column', 'cv-resume-portfolio' ),
		'3' => esc_html__( 'Three Column', 'cv-resume-portfolio' ),
	    ),
	)
);

$wp_customize->add_setting( 'cv_resume_portfolio_footer_widget_title_alignment',
    array(
    'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_footer_widget_title_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_footer_widget_title_alignment',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_footer_widget_title_alignment',
    array(
    'label'       => esc_html__( 'Footer Widget Title Alignment', 'cv-resume-portfolio' ),
    'section'     => 'cv_resume_portfolio_footer_widget_area',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'cv-resume-portfolio' ),
        'center'  => esc_html__( 'Center', 'cv-resume-portfolio' ),
        'right'    => esc_html__( 'Right', 'cv-resume-portfolio' ),
        ),
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_footer_copyright_text',
	array(
	'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'cv_resume_portfolio_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'cv-resume-portfolio' ),
	'section'  => 'cv_resume_portfolio_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('cv_resume_portfolio_copyright_font_size',
    array(
        'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_number_range',
    )
);
$wp_customize->add_control('cv_resume_portfolio_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'cv-resume-portfolio'),
        'section'     => 'cv_resume_portfolio_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_copyright_alignment', array(
    'default'           => 'Default',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cv_resume_portfolio_sanitize_copyright_alignment_meta',
) );

$wp_customize->add_control( 'cv_resume_portfolio_copyright_alignment', array(
    'label'    => esc_html__( 'Copyright Section Alignment', 'cv-resume-portfolio' ),
    'section'  => 'cv_resume_portfolio_footer_widget_area',
    'type'     => 'select',
    'choices'  => array(
        'Default' => esc_html__( 'Default View', 'cv-resume-portfolio' ),
        'Reverse' => esc_html__( 'Reverse View', 'cv-resume-portfolio' ),
        'Center'  => esc_html__( 'Centered Content', 'cv-resume-portfolio' ),
    ),
) );

$wp_customize->add_setting( 'cv_resume_portfolio_footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cv_resume_portfolio_footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'cv-resume-portfolio'),
    'description' => __('It will change the complete footer widget background color.', 'cv-resume-portfolio'),
    'section' => 'cv_resume_portfolio_footer_widget_area',
    'settings' => 'cv_resume_portfolio_footer_widget_background_color',
)));

$wp_customize->add_setting('cv_resume_portfolio_footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'cv_resume_portfolio_footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','cv-resume-portfolio'),
    'section' => 'cv_resume_portfolio_footer_widget_area'
)));

$wp_customize->add_setting('cv_resume_portfolio_enable_to_the_top',
    array(
        'default' => $cv_resume_portfolio_default['cv_resume_portfolio_enable_to_the_top'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cv_resume_portfolio_sanitize_checkbox',
    )
);
$wp_customize->add_control('cv_resume_portfolio_enable_to_the_top',
    array(
        'label' => esc_html__('Enable To The Top', 'cv-resume-portfolio'),
        'section' => 'cv_resume_portfolio_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'cv_resume_portfolio_to_the_top_text',
    array(
    'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_to_the_top_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'cv_resume_portfolio_to_the_top_text',
    array(
    'label'    => esc_html__( 'Edit Text Here', 'cv-resume-portfolio' ),
    'section'  => 'cv_resume_portfolio_footer_widget_area',
    'type'     => 'text',
    )
);