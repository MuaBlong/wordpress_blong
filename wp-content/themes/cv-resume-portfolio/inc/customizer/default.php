<?php
/**
 * Default Values.
 *
 * @package CV Resume Portfolio
 */

if ( ! function_exists( 'cv_resume_portfolio_get_default_theme_options' ) ) :
	function cv_resume_portfolio_get_default_theme_options() {

		$cv_resume_portfolio_defaults = array();
		
		// Options.
        $cv_resume_portfolio_defaults['cv_resume_portfolio_logo_width_range']                            = 200;
	$cv_resume_portfolio_defaults['cv_resume_portfolio_global_sidebar_layout']		           = 'right-sidebar';
        $cv_resume_portfolio_defaults['cv_resume_portfolio_theme_breadcrumb_options_alignment']          = 'left';
        $cv_resume_portfolio_defaults['cv_resume_portfolio_theme_pagination_options_alignment']          = 'Center';
        $cv_resume_portfolio_defaults['cv_resume_portfolio_theme_loader']                                = 0;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_pagination_layout']                           = 'numeric';
	$cv_resume_portfolio_defaults['cv_resume_portfolio_footer_column_layout'] 			   = 3;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_menu_font_size']                              = 18;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_copyright_font_size']                         = 16;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_breadcrumb_font_size']                        = 16;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_excerpt_limit']                               = 20;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_menu_text_transform']                         = 'Capitalize';  
        $cv_resume_portfolio_defaults['cv_resume_portfolio_single_page_content_alignment']               = 'left';
        $cv_resume_portfolio_defaults['cv_resume_portfolio_per_columns']                                 = 3;  
        $cv_resume_portfolio_defaults['cv_resume_portfolio_product_per_page']                            = 9; 
        $cv_resume_portfolio_defaults['cv_resume_portfolio_custom_related_products_number'] = 6;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_custom_related_products_number_per_row'] = 3;
	$cv_resume_portfolio_defaults['cv_resume_portfolio_footer_copyright_text'] 		           = esc_html__( 'All rights reserved.', 'cv-resume-portfolio' );
        $cv_resume_portfolio_defaults['twp_navigation_type']              			           = 'theme-normal-navigation';
        $cv_resume_portfolio_defaults['cv_resume_portfolio_post_author']                		   = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_post_date']                		   = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_post_category']                	           = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_post_tags']                		   = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_floating_next_previous_nav']                  = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_display_header_title']                        = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_sticky']                                      = 0;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_services']               	                   = 1;        
        $cv_resume_portfolio_defaults['cv_resume_portfolio_background_color']               	           = '#fff';
        $cv_resume_portfolio_defaults['cv_resume_portfolio_display_footer']                              = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_footer_widget_title_alignment']               = 'left'; 
        $cv_resume_portfolio_defaults['cv_resume_portfolio_show_hide_related_product']                   = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_display_archive_post_image']                  = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_global_color']                                     = '#FFDB59 ';
        $cv_resume_portfolio_defaults['cv_resume_portfolio_global_secondary_color']                           = '#0F131F';
        $cv_resume_portfolio_defaults['cv_resume_portfolio_display_archive_post_category']          = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_display_archive_post_title']             = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_display_archive_post_content']           = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_display_archive_post_button']            = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_display_single_post_image']              = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_display_archive_post_format_icon']       = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_display_single_post_image']              = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_display_archive_post_format_icon']       = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_enable_to_the_top']                         = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_to_the_top_text']                           = esc_html__( 'To The Top', 'cv-resume-portfolio' );
        $cv_resume_portfolio_defaults['cv_resume_portfolio_theme_breadcrumb_enable']                   = 1;
        $cv_resume_portfolio_defaults['cv_resume_portfolio_single_post_content_alignment']             = 'left';

        // 404 Page Defaults
        $cv_resume_portfolio_defaults['cv_resume_portfolio_404_main_title'] = esc_html__( 'Oops! That page can’t be found.', 'cv-resume-portfolio' );
        $cv_resume_portfolio_defaults['cv_resume_portfolio_404_subtitle_one'] = esc_html__( 'Maybe it’s out there, somewhere...', 'cv-resume-portfolio' );
        $cv_resume_portfolio_defaults['cv_resume_portfolio_404_para_one'] = esc_html__( 'You can always find insightful stories on our', 'cv-resume-portfolio' );
        $cv_resume_portfolio_defaults['cv_resume_portfolio_404_subtitle_two'] = esc_html__( 'Still feeling lost? You’re not alone.', 'cv-resume-portfolio' );
        $cv_resume_portfolio_defaults['cv_resume_portfolio_404_para_two'] = esc_html__( 'Enjoy these stories about getting lost, losing things, and finding what you never knew you were looking for.', 'cv-resume-portfolio' );

        // Pass through filter.
        $cv_resume_portfolio_defaults = apply_filters( 'cv_resume_portfolio_filter_default_theme_options', $cv_resume_portfolio_defaults );

        return $cv_resume_portfolio_defaults;
	}
endif;
