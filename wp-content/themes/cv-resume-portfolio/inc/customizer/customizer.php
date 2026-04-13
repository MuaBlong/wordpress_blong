<?php
/**
 * CV Resume Portfolio Theme Customizer
 * @package CV Resume Portfolio
 */

/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/default.php';

if (!function_exists('cv_resume_portfolio_customize_register')) :

function cv_resume_portfolio_customize_register( $wp_customize ) {

	require get_template_directory() . '/inc/customizer/custom-classes.php';
	require get_template_directory() . '/inc/customizer/sanitize.php';
	require get_template_directory() . '/inc/customizer/header-button.php';
	require get_template_directory() . '/inc/customizer/custom-addon.php';
	require get_template_directory() . '/inc/customizer/global-color-setting.php';
	require get_template_directory() . '/inc/customizer/colors.php';
	require get_template_directory() . '/inc/customizer/typography.php';
	require get_template_directory() . '/inc/customizer/post.php';
	require get_template_directory() . '/inc/customizer/footer.php';
	require get_template_directory() . '/inc/customizer/layout-setting.php';
	require get_template_directory() . '/inc/customizer/additional-woocommerce.php';
	require get_template_directory() . '/inc/customizer/404-page-settings.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'colors' )->panel = 'cv_resume_portfolio_theme_colors_panel';
	$wp_customize->get_section( 'colors' )->title = esc_html__('Color Options','cv-resume-portfolio');
	$wp_customize->get_section( 'title_tagline' )->panel = 'cv_resume_portfolio_theme_general_settings';
	$wp_customize->get_section( 'header_image' )->panel = 'cv_resume_portfolio_theme_general_settings';
	$wp_customize->get_section( 'background_image' )->panel = 'cv_resume_portfolio_theme_general_settings';

	if ( isset( $wp_customize->selective_refresh ) ) {
		
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.header-titles .custom-logo-name',
			'render_callback' => 'cv_resume_portfolio_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'cv_resume_portfolio_customize_partial_blogdescription',
		) );

	}

	$wp_customize->add_panel( 'cv_resume_portfolio_theme_general_settings',
		array(
			'title'      => esc_html__( 'General Settings', 'cv-resume-portfolio' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'cv_resume_portfolio_theme_colors_panel',
		array(
			'title'      => esc_html__( 'Color Settings', 'cv-resume-portfolio' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
		)
	);

	// Theme Options Panel.
	$wp_customize->add_panel( 'cv_resume_portfolio_theme_footer_option_panel',
		array(
			'title'      => esc_html__( 'Footer Setting', 'cv-resume-portfolio' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Template Options
	$wp_customize->add_panel( 'cv_resume_portfolio_theme_home_pannel',
		array(
			'title'      => esc_html__( 'Frontpage Settings', 'cv-resume-portfolio' ),
			'priority'   => 4,
			'capability' => 'edit_theme_options',
		)
	);

		// Theme Addons Panel.
	$wp_customize->add_panel( 'cv_resume_portfolio_theme_addons_panel',
		array(
			'title'      => esc_html__( 'Theme Addons', 'cv-resume-portfolio' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);
	
	// Theme Options Panel.
	$wp_customize->add_panel( 'cv_resume_portfolio_theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'cv-resume-portfolio' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting('cv_resume_portfolio_logo_width_range',
	    array(
	        'default'           => $cv_resume_portfolio_default['cv_resume_portfolio_logo_width_range'],
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'cv_resume_portfolio_sanitize_number_range',
	    )
	);
	$wp_customize->add_control('cv_resume_portfolio_logo_width_range',
	    array(
	        'label'       => esc_html__('Logo width', 'cv-resume-portfolio'),
	        'description'       => esc_html__( 'Specify the range for logo size with a minimum of 200px and a maximum of 700px, in increments of 20px.', 'cv-resume-portfolio' ),
	        'section'     => 'title_tagline',
	        'type'        => 'range',
	        'input_attrs' => array(
	           'min'   => 100,
	           'max'   => 700,
	           'step'   => 20,
        	),
	    )
	);

	// Register custom section types.
	$wp_customize->register_section_type( 'CV_Resume_Portfolio_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new CV_Resume_Portfolio_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'CV Resume Portfolio Pro', 'cv-resume-portfolio' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'cv-resume-portfolio' ),
				'pro_url'  => esc_url('https://www.omegathemes.com/products/resume-wordpress-theme'),
				'priority'  => 1,
			)
		)
	);

	// Register second custom section (Buy Bundle)
	$wp_customize->add_section(
		new CV_Resume_Portfolio_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell_bundle',
			array(
				'title'    => esc_html__( 'Buy WP Theme Bundle', 'cv-resume-portfolio' ),
				'pro_text' => esc_html__( 'Get Bundle', 'cv-resume-portfolio' ),
				'pro_url'  => esc_url( 'https://www.omegathemes.com/products/wp-theme-bundle' ),
				'priority' => 2,
			)
		)
	);

}

endif;
add_action( 'customize_register', 'cv_resume_portfolio_customize_register' );

/**
 * Customizer Enqueue scripts and styles.
 */

if (!function_exists('cv_resume_portfolio_customizer_scripts')) :

    function cv_resume_portfolio_customizer_scripts(){
    	
    	wp_enqueue_script('jquery-ui-button');
    	wp_enqueue_style('cv-resume-portfolio-customizer', get_template_directory_uri() . '/lib/custom/css/customizer.css');
        wp_enqueue_script('cv-resume-portfolio-customizer', get_template_directory_uri() . '/lib/custom/js/customizer.js', array('jquery','customize-controls'), '', 1);

        $ajax_nonce = wp_create_nonce('cv_resume_portfolio_ajax_nonce');
        wp_localize_script( 
		    'cv-resume-portfolio-customizer',
		    'cv_resume_portfolio_customizer',
		    array(
		        'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
		        'ajax_nonce' => $ajax_nonce,
		     )
		);
    }

endif;

add_action('customize_controls_enqueue_scripts', 'cv_resume_portfolio_customizer_scripts');
add_action('customize_controls_init', 'cv_resume_portfolio_customizer_scripts');

function cv_resume_portfolio_customize_preview_js() {
	wp_enqueue_script( 'cv-resume-portfolio-customizer-preview', get_template_directory_uri() . '/lib/custom/js/customizer-preview.js', array( 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'cv_resume_portfolio_customize_preview_js' );

if (!function_exists('cv_resume_portfolio_customize_partial_blogname')) :
	function cv_resume_portfolio_customize_partial_blogname() {
		bloginfo( 'name' );
	}
endif;

if (!function_exists('cv_resume_portfolio_customize_partial_blogdescription')) :
	function cv_resume_portfolio_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
endif;