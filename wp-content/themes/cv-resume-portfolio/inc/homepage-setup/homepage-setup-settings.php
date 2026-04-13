<?php
/**
 * Settings for demo import
 *
 */

/**
 * Define constants
 **/
if ( ! defined( 'WHIZZIE_DIR' ) ) {
	define( 'WHIZZIE_DIR', dirname( __FILE__ ) );
}
require trailingslashit( WHIZZIE_DIR ) . 'homepage-setup-contents.php';
$cv_resume_portfolio_current_theme = wp_get_theme();
$cv_resume_portfolio_theme_title = $cv_resume_portfolio_current_theme->get( 'Name' );


/**
 * Make changes below
 **/

// Change the title and slug of your wizard page
$config['cv_resume_portfolio_page_slug'] 	= 'cv-resume-portfolio';
$config['cv_resume_portfolio_page_title']	= 'Homepage Setup';

$config['steps'] = array(
	'plugins' => array(
		'id'			=> 'plugins',
		'title'			=> __( 'Install and Activate Essential Plugins', 'cv-resume-portfolio' ),
		'icon'			=> 'admin-plugins',
		'button_text'	=> __( 'Install Plugins', 'cv-resume-portfolio' ),
		'can_skip'		=> true
	),
	'widgets' => array(
		'id'			=> 'widgets',
		'title'			=> __( 'Setup Home Page', 'cv-resume-portfolio' ),
		'icon'			=> 'welcome-widgets-menus',
		'button_text'	=> __( 'Start Home Page Setup', 'cv-resume-portfolio' ),
		'button_url'    => esc_url( admin_url( 'themes.php?page=ediot-template-importer' ) ),
		'can_skip'		=> true
	)
);

/**
 * This kicks off the wizard
 **/
if( class_exists( 'CV_Resume_Portfolio_Whizzie' ) ) {
	$CV_Resume_Portfolio_Whizzie = new CV_Resume_Portfolio_Whizzie( $config );
}