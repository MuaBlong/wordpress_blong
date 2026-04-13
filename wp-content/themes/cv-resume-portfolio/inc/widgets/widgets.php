<?php
/**
* Widget Functions.
*
* @package CV Resume Portfolio
*/

function cv_resume_portfolio_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'cv-resume-portfolio'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'cv-resume-portfolio'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));

	register_sidebar(array(
	    'name' => esc_html__('Header Sidebar', 'cv-resume-portfolio'),
	    'id' => 'sidebar-header',
	    'description' => esc_html__('Add widgets here.', 'cv-resume-portfolio'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();
    $cv_resume_portfolio_footer_column_layout = absint( get_theme_mod( 'cv_resume_portfolio_footer_column_layout',$cv_resume_portfolio_default['cv_resume_portfolio_footer_column_layout'] ) );

    for( $i = 0; $i < $cv_resume_portfolio_footer_column_layout; $i++ ){
    	
    	if( $i == 0 ){ $count = esc_html__('One','cv-resume-portfolio'); }
    	if( $i == 1 ){ $count = esc_html__('Two','cv-resume-portfolio'); }
    	if( $i == 2 ){ $count = esc_html__('Three','cv-resume-portfolio'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'cv-resume-portfolio').$count,
	        'id' => 'cv-resume-portfolio-footer-widget-'.$i,
	        'description' => esc_html__('Add widgets here.', 'cv-resume-portfolio'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'cv_resume_portfolio_widgets_init');