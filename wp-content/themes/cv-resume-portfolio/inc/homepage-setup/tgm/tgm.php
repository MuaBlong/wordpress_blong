<?php

	require get_template_directory() . '/inc/homepage-setup/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function cv_resume_portfolio_register_recommended_plugins() {
	$plugins = array(	
		array(
			'name'             => __( 'Elementor', 'cv-resume-portfolio' ),
			'slug'             => 'elementor',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Easy Demo Import for Omega Themes', 'cv-resume-portfolio' ),
			'slug'             => 'easy-demo-import-for-omega-themes',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'cv_resume_portfolio_register_recommended_plugins' );