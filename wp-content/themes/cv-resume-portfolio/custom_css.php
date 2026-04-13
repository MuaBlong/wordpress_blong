<?php

$cv_resume_portfolio_custom_css = "";

	$cv_resume_portfolio_theme_pagination_options_alignment = get_theme_mod('cv_resume_portfolio_theme_pagination_options_alignment', 'Center');
	if ($cv_resume_portfolio_theme_pagination_options_alignment == 'Center') {
		$cv_resume_portfolio_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$cv_resume_portfolio_custom_css .= 'justify-content: center;margin: 0 auto;';
		$cv_resume_portfolio_custom_css .= '}';
	} else if ($cv_resume_portfolio_theme_pagination_options_alignment == 'Right') {
		$cv_resume_portfolio_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$cv_resume_portfolio_custom_css .= 'justify-content: right;margin: 0 0 0 auto;';
		$cv_resume_portfolio_custom_css .= '}';
	} else if ($cv_resume_portfolio_theme_pagination_options_alignment == 'Left') {
		$cv_resume_portfolio_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$cv_resume_portfolio_custom_css .= 'justify-content: left;margin: 0 auto 0 0;';
		$cv_resume_portfolio_custom_css .= '}';
	}

	$cv_resume_portfolio_theme_breadcrumb_enable = get_theme_mod('cv_resume_portfolio_theme_breadcrumb_enable',true);
    if($cv_resume_portfolio_theme_breadcrumb_enable != true){
        $cv_resume_portfolio_custom_css .='nav.breadcrumb-trail.breadcrumbs,nav.woocommerce-breadcrumb{';
            $cv_resume_portfolio_custom_css .='display: none;';
        $cv_resume_portfolio_custom_css .='}';
    }

	$cv_resume_portfolio_theme_breadcrumb_options_alignment = get_theme_mod('cv_resume_portfolio_theme_breadcrumb_options_alignment', 'Left');
	if ($cv_resume_portfolio_theme_breadcrumb_options_alignment == 'Center') {
	    $cv_resume_portfolio_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $cv_resume_portfolio_custom_css .= 'text-align: center !important;';
	    $cv_resume_portfolio_custom_css .= '}';
	} else if ($cv_resume_portfolio_theme_breadcrumb_options_alignment == 'Right') {
	    $cv_resume_portfolio_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $cv_resume_portfolio_custom_css .= 'text-align: Right !important;';
	    $cv_resume_portfolio_custom_css .= '}';
	} else if ($cv_resume_portfolio_theme_breadcrumb_options_alignment == 'Left') {
	    $cv_resume_portfolio_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $cv_resume_portfolio_custom_css .= 'text-align: Left !important;';
	    $cv_resume_portfolio_custom_css .= '}';
	}

	$cv_resume_portfolio_single_page_content_alignment = get_theme_mod('cv_resume_portfolio_single_page_content_alignment', 'left');
	if ($cv_resume_portfolio_single_page_content_alignment == 'left') {
	    $cv_resume_portfolio_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $cv_resume_portfolio_custom_css .= 'text-align: left !important;';
	    $cv_resume_portfolio_custom_css .= '}';
	} else if ($cv_resume_portfolio_single_page_content_alignment == 'center') {
	    $cv_resume_portfolio_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $cv_resume_portfolio_custom_css .= 'text-align: center !important;';
	    $cv_resume_portfolio_custom_css .= '}';
	} else if ($cv_resume_portfolio_single_page_content_alignment == 'right') {
	    $cv_resume_portfolio_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $cv_resume_portfolio_custom_css .= 'text-align: right !important;';
	    $cv_resume_portfolio_custom_css .= '}';
	}

	$cv_resume_portfolio_single_post_content_alignment = get_theme_mod('cv_resume_portfolio_single_post_content_alignment', 'left');
	if ($cv_resume_portfolio_single_post_content_alignment == 'left') {
	    $cv_resume_portfolio_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $cv_resume_portfolio_custom_css .= 'text-align: left !important;justify-content: left;';
	    $cv_resume_portfolio_custom_css .= '}';
	} else if ($cv_resume_portfolio_single_post_content_alignment == 'center') {
	    $cv_resume_portfolio_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $cv_resume_portfolio_custom_css .= 'text-align: center !important;justify-content: center;';
	    $cv_resume_portfolio_custom_css .= '}';
	} else if ($cv_resume_portfolio_single_post_content_alignment == 'right') {
	    $cv_resume_portfolio_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $cv_resume_portfolio_custom_css .= 'text-align: right !important;justify-content: right;';
	    $cv_resume_portfolio_custom_css .= '}';
	}

	$cv_resume_portfolio_menu_text_transform = get_theme_mod('cv_resume_portfolio_menu_text_transform', 'Capitalize');
	if ($cv_resume_portfolio_menu_text_transform == 'Capitalize') {
	    $cv_resume_portfolio_custom_css .= '.site-navigation .primary-menu > li a{';
	    $cv_resume_portfolio_custom_css .= 'text-transform: Capitalize !important;';
	    $cv_resume_portfolio_custom_css .= '}';
	} else if ($cv_resume_portfolio_menu_text_transform == 'uppercase') {
	    $cv_resume_portfolio_custom_css .= '.site-navigation .primary-menu > li a{';
	    $cv_resume_portfolio_custom_css .= 'text-transform: uppercase !important;';
	    $cv_resume_portfolio_custom_css .= '}';
	} else if ($cv_resume_portfolio_menu_text_transform == 'lowercase') {
	    $cv_resume_portfolio_custom_css .= '.site-navigation .primary-menu > li a{';
	    $cv_resume_portfolio_custom_css .= 'text-transform: lowercase !important;';
	    $cv_resume_portfolio_custom_css .= '}';
	}

	$cv_resume_portfolio_footer_widget_title_alignment = get_theme_mod('cv_resume_portfolio_footer_widget_title_alignment', 'left');
	if ($cv_resume_portfolio_footer_widget_title_alignment == 'left') {
	    $cv_resume_portfolio_custom_css .= 'h2.widget-title{';
	    $cv_resume_portfolio_custom_css .= 'text-align: left !important;';
	    $cv_resume_portfolio_custom_css .= '}';
	} else if ($cv_resume_portfolio_footer_widget_title_alignment == 'center') {
	    $cv_resume_portfolio_custom_css .= 'h2.widget-title{';
	    $cv_resume_portfolio_custom_css .= 'text-align: center !important;';
	    $cv_resume_portfolio_custom_css .= '}';
	} else if ($cv_resume_portfolio_footer_widget_title_alignment == 'right') {
	    $cv_resume_portfolio_custom_css .= 'h2.widget-title{';
	    $cv_resume_portfolio_custom_css .= 'text-align: right !important;';
	    $cv_resume_portfolio_custom_css .= '}';
	}

    $cv_resume_portfolio_show_hide_related_product = get_theme_mod('cv_resume_portfolio_show_hide_related_product',true);
    if($cv_resume_portfolio_show_hide_related_product != true){
        $cv_resume_portfolio_custom_css .='.related.products{';
            $cv_resume_portfolio_custom_css .='display: none;';
        $cv_resume_portfolio_custom_css .='}';
    }

	$cv_resume_portfolio_sticky_sidebar = get_theme_mod('cv_resume_portfolio_sticky_sidebar',true);
    if($cv_resume_portfolio_sticky_sidebar != true){
        $cv_resume_portfolio_custom_css .='.widget-area-wrapper{';
            $cv_resume_portfolio_custom_css .='position: relative !important;';
        $cv_resume_portfolio_custom_css .='}';
    }

	/*-------------------- Global First Color -------------------*/

	$cv_resume_portfolio_global_color = get_theme_mod('cv_resume_portfolio_global_color', '#FFDB59 '); // Add a fallback if the color isn't set

	if ($cv_resume_portfolio_global_color) {
		$cv_resume_portfolio_custom_css .= ':root {';
		$cv_resume_portfolio_custom_css .= '--global-color: ' . esc_attr($cv_resume_portfolio_global_color) . ';';
		$cv_resume_portfolio_custom_css .= '}';
	}

	$cv_resume_portfolio_global_secondary_color = get_theme_mod('cv_resume_portfolio_global_secondary_color', '#0F131F'); // Add a fallback if the color isn't set

	if ($cv_resume_portfolio_global_secondary_color) {
		$cv_resume_portfolio_custom_css .= ':root {';
		$cv_resume_portfolio_custom_css .= '--secondary-color: ' . esc_attr($cv_resume_portfolio_global_secondary_color) . ';';
		$cv_resume_portfolio_custom_css .= '}';
	}
	
	/*-------------------- Content Font -------------------*/

	$cv_resume_portfolio_content_typography_font = get_theme_mod('cv_resume_portfolio_content_typography_font', 'montserrat'); // Add a fallback if the color isn't set

	if ($cv_resume_portfolio_content_typography_font) {
		$cv_resume_portfolio_custom_css .= ':root {';
		$cv_resume_portfolio_custom_css .= '--font-main: ' . esc_attr($cv_resume_portfolio_content_typography_font) . ';';
		$cv_resume_portfolio_custom_css .= '}';
	}

	/*-------------------- Heading Font -------------------*/

	$cv_resume_portfolio_heading_typography_font = get_theme_mod('cv_resume_portfolio_heading_typography_font', 'montserrat'); // Add a fallback if the color isn't set

	if ($cv_resume_portfolio_heading_typography_font) {
		$cv_resume_portfolio_custom_css .= ':root {';
		$cv_resume_portfolio_custom_css .= '--font-head: ' . esc_attr($cv_resume_portfolio_heading_typography_font) . ';';
		$cv_resume_portfolio_custom_css .= '}';
	}

	/*-------------------- FOOTER -------------------*/

	$cv_resume_portfolio_footer_widget_background_color = get_theme_mod('cv_resume_portfolio_footer_widget_background_color');
    if ($cv_resume_portfolio_footer_widget_background_color) {

        $cv_resume_portfolio_custom_css .= "
            .footer-widgetarea {
                background-color: ". esc_attr($cv_resume_portfolio_footer_widget_background_color) .";
            }
        ";
    }

    $cv_resume_portfolio_footer_widget_background_image = get_theme_mod('cv_resume_portfolio_footer_widget_background_image');
	if ($cv_resume_portfolio_footer_widget_background_image) {
		$cv_resume_portfolio_custom_css .= "
			.footer-widgetarea {
				background-image: url(" . esc_url($cv_resume_portfolio_footer_widget_background_image) . ");
			}
		";
	}

    $cv_resume_portfolio_copyright_font_size = get_theme_mod('cv_resume_portfolio_copyright_font_size');
    if ($cv_resume_portfolio_copyright_font_size) {

        $cv_resume_portfolio_custom_css .= "
            .footer-copyright {
                font-size: ". esc_attr($cv_resume_portfolio_copyright_font_size) ."px;
            }
        ";
    }

	$cv_resume_portfolio_columns = get_theme_mod('cv_resume_portfolio_posts_per_columns', 3);
    $cv_resume_portfolio_columns = absint($cv_resume_portfolio_columns);
    if ( $cv_resume_portfolio_columns < 1 || $cv_resume_portfolio_columns > 6 ) {
        $cv_resume_portfolio_columns = 3;
    }
    $cv_resume_portfolio_custom_css .= "
        .site-content .article-wraper-archive {
            grid-template-columns: repeat({$cv_resume_portfolio_columns}, 1fr);
        }
    ";

	$cv_resume_portfolio_copyright_alignment = get_theme_mod( 'cv_resume_portfolio_copyright_alignment', 'Default' );
	if ( $cv_resume_portfolio_copyright_alignment === 'Reverse' ) {
		$cv_resume_portfolio_custom_css .= '.site-info .column-row { flex-direction: row-reverse; }';
		$cv_resume_portfolio_custom_css .= '.footer-credits { justify-content: flex-end; }';
		$cv_resume_portfolio_custom_css .= '.footer-copyright { text-align: right; }';
		$cv_resume_portfolio_custom_css .= '.site-info .column.column-3 { text-align: left; }';
	} elseif ( $cv_resume_portfolio_copyright_alignment === 'Center' ) {
		$cv_resume_portfolio_custom_css .= '.site-info .column-row { flex-direction: column; align-items: center; gap: 15px; }';
		$cv_resume_portfolio_custom_css .= '.footer-credits { justify-content: center; }';
		$cv_resume_portfolio_custom_css .= '.footer-copyright { text-align: center; }';
		$cv_resume_portfolio_custom_css .= '.site-info .column.column-3 { text-align: center; }';
	}