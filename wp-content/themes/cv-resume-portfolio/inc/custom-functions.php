<?php
/**
 * Custom Functions.
 *
 * @package CV Resume Portfolio
 */

if( !function_exists( 'cv_resume_portfolio_fonts_url' ) ) :

    //Google Fonts URL
    function cv_resume_portfolio_fonts_url(){

        $cv_resume_portfolio_font_families = array(
            'Montserrat:ital,wght@0,100..900;1,100..900', //   font-family: "Montserrat", sans-serif;
        );

        $cv_resume_portfolio_fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $cv_resume_portfolio_font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($cv_resume_portfolio_fonts_url);
    }

endif;

if ( ! function_exists( 'cv_resume_portfolio_sub_menu_toggle_button' ) ) :

    function cv_resume_portfolio_sub_menu_toggle_button( $cv_resume_portfolio_args, $cv_resume_portfolio_item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $cv_resume_portfolio_args->theme_location == 'cv-resume-portfolio-primary-menu' && isset( $cv_resume_portfolio_args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $cv_resume_portfolio_args->before = '<div class="submenu-wrapper">';
            $cv_resume_portfolio_args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $cv_resume_portfolio_item->classes ) ) {

                $toggle_target_string = '.menu-item.menu-item-' . $cv_resume_portfolio_item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $cv_resume_portfolio_args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'cv-resume-portfolio' ) . '</span>' . cv_resume_portfolio_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $cv_resume_portfolio_args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $cv_resume_portfolio_args->theme_location == 'cv-resume-portfolio-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $cv_resume_portfolio_item->classes ) ) {

                $cv_resume_portfolio_args->before = '<div class="link-icon-wrapper">';
                $cv_resume_portfolio_args->after  = cv_resume_portfolio_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $cv_resume_portfolio_args->before = '';
                $cv_resume_portfolio_args->after  = '';

            }

        }

        return $cv_resume_portfolio_args;

    }

endif;

add_filter( 'nav_menu_item_args', 'cv_resume_portfolio_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'cv_resume_portfolio_the_theme_svg' ) ):
    
    function cv_resume_portfolio_the_theme_svg( $cv_resume_portfolio_svg_name, $cv_resume_portfolio_return = false ) {

        if( $cv_resume_portfolio_return ){

            return cv_resume_portfolio_get_theme_svg( $cv_resume_portfolio_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in cv_resume_portfolio_get_theme_svg();.

        }else{

            echo cv_resume_portfolio_get_theme_svg( $cv_resume_portfolio_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in cv_resume_portfolio_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'cv_resume_portfolio_get_theme_svg' ) ):

    function cv_resume_portfolio_get_theme_svg( $cv_resume_portfolio_svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $cv_resume_portfolio_svg = wp_kses(
            cv_resume_portfolio_SVG_Icons::get_svg( $cv_resume_portfolio_svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $cv_resume_portfolio_svg ) {
            return false;
        }
        return $cv_resume_portfolio_svg;

    }

endif;

if( !function_exists( 'cv_resume_portfolio_post_category_list' ) ) :

    // Post Category List.
    function cv_resume_portfolio_post_category_list( $cv_resume_portfolio_select_cat = true ){

        $cv_resume_portfolio_post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $cv_resume_portfolio_post_cat_cat_array = array();
        if( $cv_resume_portfolio_select_cat ){

            $cv_resume_portfolio_post_cat_cat_array[''] = esc_html__( '-- Select Category --','cv-resume-portfolio' );

        }

        foreach ( $cv_resume_portfolio_post_cat_lists as $cv_resume_portfolio_post_cat_list ) {

            $cv_resume_portfolio_post_cat_cat_array[$cv_resume_portfolio_post_cat_list->slug] = $cv_resume_portfolio_post_cat_list->name;

        }

        return $cv_resume_portfolio_post_cat_cat_array;
    }

endif;

if( !function_exists('cv_resume_portfolio_single_post_navigation') ):

    function cv_resume_portfolio_single_post_navigation(){

        $cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();
        $cv_resume_portfolio_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $cv_resume_portfolio_current_id = '';
        $article_wrap_class = '';
        global $post;
        $cv_resume_portfolio_current_id = $post->ID;
        if( $cv_resume_portfolio_twp_navigation_type == '' || $cv_resume_portfolio_twp_navigation_type == 'global-layout' ){
            $cv_resume_portfolio_twp_navigation_type = get_theme_mod('twp_navigation_type', $cv_resume_portfolio_default['twp_navigation_type']);
        }

        if( $cv_resume_portfolio_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $cv_resume_portfolio_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . cv_resume_portfolio_the_theme_svg('arrow-left',$cv_resume_portfolio_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'cv-resume-portfolio') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . cv_resume_portfolio_the_theme_svg('arrow-right',$cv_resume_portfolio_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'cv-resume-portfolio') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $cv_resume_portfolio_next_post = get_next_post();
                if( isset( $cv_resume_portfolio_next_post->ID ) ){

                    $cv_resume_portfolio_next_post_id = $cv_resume_portfolio_next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $cv_resume_portfolio_next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'cv_resume_portfolio_navigation_action','cv_resume_portfolio_single_post_navigation',30 );

if( !function_exists('cv_resume_portfolio_content_offcanvas') ):

    // Offcanvas Contents
    function cv_resume_portfolio_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'cv-resume-portfolio'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'cv-resume-portfolio'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('cv-resume-portfolio-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'cv-resume-portfolio-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new CV_Resume_Portfolio_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'cv_resume_portfolio_before_footer_content_action','cv_resume_portfolio_content_offcanvas',30 );

if( !function_exists('cv_resume_portfolio_footer_content_widget') ):

    function cv_resume_portfolio_footer_content_widget(){
        
        $cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();
        
        $cv_resume_portfolio_footer_column_layout = absint(get_theme_mod('cv_resume_portfolio_footer_column_layout', $cv_resume_portfolio_default['cv_resume_portfolio_footer_column_layout']));
        $cv_resume_portfolio_footer_sidebar_class = 12;
        
        if($cv_resume_portfolio_footer_column_layout == 2) {
            $cv_resume_portfolio_footer_sidebar_class = 6;
        }
        
        if($cv_resume_portfolio_footer_column_layout == 3) {
            $cv_resume_portfolio_footer_sidebar_class = 4;
        }
        ?>
        
        <?php if ( get_theme_mod('cv_resume_portfolio_display_footer', true) == true ) : ?>
            <div class="footer-widgetarea">
                <div class="wrapper">
                    <div class="column-row">
                    
                        <?php for ($i = 0; $i < $cv_resume_portfolio_footer_column_layout; $i++) : ?>
                            
                            <div class="column <?php echo 'column-' . absint($cv_resume_portfolio_footer_sidebar_class); ?> column-sm-12">
                                
                                <?php 
                                // If no widgets are assigned, display default widgets
                                if ( ! is_active_sidebar( 'cv-resume-portfolio-footer-widget-' . $i ) ) : 

                                    if ($i === 0) : ?>
                                        <div id="media_image-3" class="widget widget_media_image">
                                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="<?php echo esc_attr__( 'Footer Image', 'cv-resume-portfolio' ); ?>" style="max-width: 100%; height: auto;">
                                        </div>
                                        <div id="text-3" class="widget widget_text">
                                            <div class="textwidget">
                                                <p class="widget_text">
                                                    <?php esc_html_e('CV Resume Portfolio is a clean, modern, and professional free WordPress theme designed for individuals who want to create a powerful personal presence online. Whether you are a job seeker, designer, developer, freelancer, consultant, or creative professional, this theme provides the perfect layout to showcase your skills, experience, and achievements.', 'cv-resume-portfolio'); ?>
                                                </p>
                                            </div>
                                        </div>

                                    <?php elseif ($i === 1) : ?>
                                        <div id="pages-2" class="widget widget_pages">
                                            <h2 class="widget-title"><?php esc_html_e('Calendar', 'cv-resume-portfolio'); ?></h2>
                                            <?php get_calendar(); ?>
                                        </div>

                                    <?php elseif ($i === 2) : ?>
                                        <div id="search-2" class="widget widget_search">
                                            <h2 class="widget-title"><?php esc_html_e('Enter Keywords Here', 'cv-resume-portfolio'); ?></h2>
                                            <?php get_search_form(); ?>
                                        </div>
                                    <?php endif; 
                                    
                                else :
                                    // Display dynamic sidebar widget if assigned
                                    dynamic_sidebar('cv-resume-portfolio-footer-widget-' . $i);
                                endif;
                                ?>
                                
                            </div>
                            
                        <?php endfor; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?> 

    <?php
    }

endif;

add_action( 'cv_resume_portfolio_footer_content_action', 'cv_resume_portfolio_footer_content_widget', 10 );

if( !function_exists('cv_resume_portfolio_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function cv_resume_portfolio_footer_content_info(){

        $cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">

                    <div class="column column-9">
                        <div class="footer-credits">

                        <div class="footer-copyright">
                                <?php
                                $cv_resume_portfolio_footer_copyright_text = wp_kses_post( get_theme_mod( 'cv_resume_portfolio_footer_copyright_text', $cv_resume_portfolio_default['cv_resume_portfolio_footer_copyright_text'] ) );
                                    echo esc_html( $cv_resume_portfolio_footer_copyright_text );
                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'cv-resume-portfolio') . '<a href="' . esc_url('https://www.omegathemes.com/products/cv-resume-portfolio') . '" title="' . esc_attr__('CV Resume Portfolio', 'cv-resume-portfolio') . '" target="_blank"><span>' . esc_html__('CV Resume Portfolio', 'cv-resume-portfolio') . '</span></a>' . esc_html__(' By ', 'cv-resume-portfolio') . '  <span>' . esc_html__('OMEGA ', 'cv-resume-portfolio') . '</span>';
                                    echo esc_html__('Powered by ', 'cv-resume-portfolio') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'cv-resume-portfolio') . '" target="_blank"><span>' . esc_html__('WordPress.', 'cv-resume-portfolio') . '</span></a>';
                                 ?>
                            </div>
                        </div>
                    </div>


                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php if ( get_theme_mod('cv_resume_portfolio_enable_to_the_top', true) == true ) : ?>
                                    <?php
                                    $cv_resume_portfolio_to_the_top_text = get_theme_mod( 'cv_resume_portfolio_to_the_top_text', __( 'To the Top', 'cv-resume-portfolio' ) );
                                    printf( 
                                        wp_kses( 
                                            /* translators: %s is the arrow icon markup */
                                            '%s %s', 
                                            array( 'span' => array( 'class' => array(), 'aria-hidden' => array() ) ) 
                                        ), 
                                        esc_html( $cv_resume_portfolio_to_the_top_text ),
                                        '<span class="arrow" aria-hidden="true">&uarr;</span>' 
                                    );
                                    ?>
                                <?php endif; ?>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'cv_resume_portfolio_footer_content_action','cv_resume_portfolio_footer_content_info',20 );

if (!function_exists('cv_resume_portfolio_post_format_icon')):

    // Post Format Icon.
    function cv_resume_portfolio_post_format_icon() {

        $cv_resume_portfolio_format = get_post_format(get_the_ID()) ?: 'standard';
        $cv_resume_portfolio_icon = '';
        $cv_resume_portfolio_title = '';
        if( $cv_resume_portfolio_format == 'video' ){
            $cv_resume_portfolio_icon = cv_resume_portfolio_get_theme_svg( 'video' );
            $cv_resume_portfolio_title = esc_html__('Video','cv-resume-portfolio');
        }elseif( $cv_resume_portfolio_format == 'audio' ){
            $cv_resume_portfolio_icon = cv_resume_portfolio_get_theme_svg( 'audio' );
            $cv_resume_portfolio_title = esc_html__('Audio','cv-resume-portfolio');
        }elseif( $cv_resume_portfolio_format == 'gallery' ){
            $cv_resume_portfolio_icon = cv_resume_portfolio_get_theme_svg( 'gallery' );
            $cv_resume_portfolio_title = esc_html__('Gallery','cv-resume-portfolio');
        }elseif( $cv_resume_portfolio_format == 'quote' ){
            $cv_resume_portfolio_icon = cv_resume_portfolio_get_theme_svg( 'quote' );
            $cv_resume_portfolio_title = esc_html__('Quote','cv-resume-portfolio');
        }elseif( $cv_resume_portfolio_format == 'image' ){
            $cv_resume_portfolio_icon = cv_resume_portfolio_get_theme_svg( 'image' );
            $cv_resume_portfolio_title = esc_html__('Image','cv-resume-portfolio');
        } elseif( $cv_resume_portfolio_format == 'link' ){
            $cv_resume_portfolio_icon = cv_resume_portfolio_get_theme_svg( 'link' );
            $cv_resume_portfolio_title = esc_html__('Link','cv-resume-portfolio');
        } elseif( $cv_resume_portfolio_format == 'status' ){
            $cv_resume_portfolio_icon = cv_resume_portfolio_get_theme_svg( 'status' );
            $cv_resume_portfolio_title = esc_html__('Status','cv-resume-portfolio');
        } elseif( $cv_resume_portfolio_format == 'aside' ){
            $cv_resume_portfolio_icon = cv_resume_portfolio_get_theme_svg( 'aside' );
            $cv_resume_portfolio_title = esc_html__('Aside','cv-resume-portfolio');
        } elseif( $cv_resume_portfolio_format == 'chat' ){
            $cv_resume_portfolio_icon = cv_resume_portfolio_get_theme_svg( 'chat' );
            $cv_resume_portfolio_title = esc_html__('Chat','cv-resume-portfolio');
        }
        
        if (!empty($cv_resume_portfolio_icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo cv_resume_portfolio_svg_escape($cv_resume_portfolio_icon); ?></span>
                <?php if( $cv_resume_portfolio_title ){ echo '<span class="post-format-label">'.esc_html( $cv_resume_portfolio_title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'cv_resume_portfolio_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $cv_resume_portfolio_svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function cv_resume_portfolio_svg_escape( $cv_resume_portfolio_input ) {

        // Make sure that only our allowed tags and attributes are included.
        $cv_resume_portfolio_svg = wp_kses(
            $cv_resume_portfolio_input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $cv_resume_portfolio_svg ) {
            return false;
        }

        return $cv_resume_portfolio_svg;

    }

endif;

if( !function_exists( 'cv_resume_portfolio_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function cv_resume_portfolio_sanitize_sidebar_option_meta( $cv_resume_portfolio_input ){

        $cv_resume_portfolio_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $cv_resume_portfolio_input,$cv_resume_portfolio_metabox_options ) ){

            return $cv_resume_portfolio_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'cv_resume_portfolio_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function cv_resume_portfolio_sanitize_pagination_meta( $cv_resume_portfolio_input ){

        $cv_resume_portfolio_metabox_options = array( 'Center','Right','Left');
        if( in_array( $cv_resume_portfolio_input,$cv_resume_portfolio_metabox_options ) ){

            return $cv_resume_portfolio_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'cv_resume_portfolio_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function cv_resume_portfolio_sanitize_menu_transform( $cv_resume_portfolio_input ){

        $cv_resume_portfolio_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $cv_resume_portfolio_input,$cv_resume_portfolio_metabox_options ) ){

            return $cv_resume_portfolio_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'cv_resume_portfolio_sanitize_page_content_alignment' ) ) :

    // Sidebar Option Sanitize.
    function cv_resume_portfolio_sanitize_page_content_alignment( $cv_resume_portfolio_input ){

        $cv_resume_portfolio_metabox_options = array( 'left','center','right');
        if( in_array( $cv_resume_portfolio_input,$cv_resume_portfolio_metabox_options ) ){

            return $cv_resume_portfolio_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'cv_resume_portfolio_sanitize_footer_widget_title_alignment' ) ) :

    // Footer Option Sanitize.
    function cv_resume_portfolio_sanitize_footer_widget_title_alignment( $cv_resume_portfolio_input ){

        $cv_resume_portfolio_metabox_options = array( 'left','center','right');
        if( in_array( $cv_resume_portfolio_input,$cv_resume_portfolio_metabox_options ) ){

            return $cv_resume_portfolio_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'cv_resume_portfolio_sanitize_pagination_type' ) ) :

    /**
     * Sanitize the pagination type setting.
     *
     * @param string $cv_resume_portfolio_input The input value from the Customizer.
     * @return string The sanitized value.
     */
    function cv_resume_portfolio_sanitize_pagination_type( $cv_resume_portfolio_input ) {
        // Define valid options for the pagination type.
        $cv_resume_portfolio_valid_options = array( 'numeric', 'newer_older' ); // Update valid options to include 'newer_older'

        // If the input is one of the valid options, return it. Otherwise, return the default option ('numeric').
        if ( in_array( $cv_resume_portfolio_input, $cv_resume_portfolio_valid_options, true ) ) {
            return $cv_resume_portfolio_input;
        } else {
            // Return 'numeric' as the fallback if the input is invalid.
            return 'numeric';
        }
    }

endif;


// Sanitize the enable/disable setting for pagination
if( !function_exists('cv_resume_portfolio_sanitize_enable_pagination') ) :
    function cv_resume_portfolio_sanitize_enable_pagination( $cv_resume_portfolio_input ) {
        return (bool) $cv_resume_portfolio_input;
    }
endif;

if( !function_exists( 'cv_resume_portfolio_sanitize_copyright_alignment_meta' ) ) :

    // Sidebar Option Sanitize.
    function cv_resume_portfolio_sanitize_copyright_alignment_meta( $cv_resume_portfolio_input ){

        $cv_resume_portfolio_metabox_options = array( 'Default','Reverse','Center');
        if( in_array( $cv_resume_portfolio_input,$cv_resume_portfolio_metabox_options ) ){

            return $cv_resume_portfolio_input;

        }else{

            return '';

        }
    }

endif;

/**
 * Sidebar Layout Function
 */
function cv_resume_portfolio_get_final_sidebar_layout() {
	$cv_resume_portfolio_defaults       = cv_resume_portfolio_get_default_theme_options();
	$cv_resume_portfolio_global_layout  = get_theme_mod('cv_resume_portfolio_global_sidebar_layout', $cv_resume_portfolio_defaults['cv_resume_portfolio_global_sidebar_layout']);
	$cv_resume_portfolio_page_layout    = get_theme_mod('cv_resume_portfolio_page_sidebar_layout', $cv_resume_portfolio_global_layout);
	$cv_resume_portfolio_post_layout    = get_theme_mod('cv_resume_portfolio_post_sidebar_layout', $cv_resume_portfolio_global_layout);
	$cv_resume_portfolio_meta_layout    = get_post_meta(get_the_ID(), 'cv_resume_portfolio_post_sidebar_option', true);

	if (!empty($cv_resume_portfolio_meta_layout) && $cv_resume_portfolio_meta_layout !== 'default') {
		return $cv_resume_portfolio_meta_layout;
	}
	if (is_page() || (function_exists('is_shop') && is_shop())) {
		return $cv_resume_portfolio_page_layout;
	}
	if (is_single()) {
		return $cv_resume_portfolio_post_layout;
	}
	return $cv_resume_portfolio_global_layout;
}