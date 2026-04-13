<?php
/**
 * CV Resume Portfolio functions and definitions
 * @package CV Resume Portfolio
 */

if ( ! function_exists( 'cv_resume_portfolio_after_theme_support' ) ) :

	function cv_resume_portfolio_after_theme_support() {
		
		add_theme_support( 'automatic-feed-links' );

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'cv_resume_portfolio_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

        load_theme_textdomain( 'cv-resume-portfolio', get_template_directory() . '/languages' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
			'video',  
			'audio',  
			'gallery',
			'quote',  
			'image',  
			'link',   
			'status', 
			'aside',  
			'chat',   
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
        add_theme_support( 'woocommerce' );
		add_theme_support( 'wp-block-styles' );

		require get_template_directory() . '/inc/metabox.php';
		require get_template_directory() . '/inc/homepage-setup/homepage-setup-settings.php';

		if (! defined( 'CV_RESUME_PORTFOLIO_BUY_NOW' ) ){
		define('CV_RESUME_PORTFOLIO_BUY_NOW',__('https://www.omegathemes.com/products/resume-wordpress-theme','cv-resume-portfolio'));
		}
		if (! defined( 'CV_RESUME_PORTFOLIO_SUPPORT_FREE' ) ){
		define('CV_RESUME_PORTFOLIO_SUPPORT_FREE',__('https://wordpress.org/support/theme/cv-resume-portfolio/','cv-resume-portfolio'));
		}
		if (! defined( 'CV_RESUME_PORTFOLIO_DEMO_PRO' ) ){
		define('CV_RESUME_PORTFOLIO_DEMO_PRO',__('https://layout.omegathemes.com/cv-resume-portfolio/','cv-resume-portfolio'));
		}
		if (! defined( 'CV_RESUME_PORTFOLIO_LITE_DOCS_PRO' ) ){
		define('CV_RESUME_PORTFOLIO_LITE_DOCS_PRO',__('https://layout.omegathemes.com/steps/free-cv-resume-portfolio/','cv-resume-portfolio'));
		}
		if (! defined('CV_RESUME_PORTFOLIO_BUNDLE_BUTTON') ){
			define('CV_RESUME_PORTFOLIO_BUNDLE_BUTTON',__('https://www.omegathemes.com/products/wp-theme-bundle','cv-resume-portfolio'));
		}
	}

endif;

add_action( 'after_setup_theme', 'cv_resume_portfolio_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function cv_resume_portfolio_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $cv_resume_portfolio_theme_version = wp_get_theme()->get( 'Version' );
	$cv_resume_portfolio_fonts_url = cv_resume_portfolio_fonts_url();
    if( $cv_resume_portfolio_fonts_url ){
    	require get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'cv-resume-portfolio-google-fonts',
			wptt_get_webfont_url( $cv_resume_portfolio_fonts_url ),
			array(),
			$cv_resume_portfolio_theme_version
		);
    }
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/lib/custom/css/owl.carousel.min.css');
	wp_enqueue_style( 'cv-resume-portfolio-style', get_stylesheet_uri(), array(), $cv_resume_portfolio_theme_version );

	wp_enqueue_style( 'cv-resume-portfolio-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom_css.php' );
	wp_add_inline_style( 'cv-resume-portfolio-style',$cv_resume_portfolio_custom_css );

	$cv_resume_portfolio_css = '';

	if ( get_header_image() ) :

		$cv_resume_portfolio_css .=  '
			.header-navbar{
				background-image: url('.esc_url(get_header_image()).');
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'cv-resume-portfolio-style', $cv_resume_portfolio_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
    wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/lib/custom/js/owl.carousel.js', array('jquery'), '', 1);
	wp_enqueue_script( 'cv-resume-portfolio-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);
	wp_localize_script(
        'cv-resume-portfolio-custom',
        'ajax_obj',
        array(
            'ajaxurl' => admin_url('admin-ajax.php')
        )
    );

    // Global Query
    if( is_front_page() ){

    	$cv_resume_portfolio_posts_per_page = absint( get_option('posts_per_page') );
        $cv_resume_portfolio_c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $cv_resume_portfolio_posts_args = array(
            'posts_per_page'        => $cv_resume_portfolio_posts_per_page,
            'paged'                 => $cv_resume_portfolio_c_paged,
        );
        $posts_qry = new WP_Query( $cv_resume_portfolio_posts_args );
        $max = $posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $cv_resume_portfolio_c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();
    $cv_resume_portfolio_pagination_layout = get_theme_mod( 'cv_resume_portfolio_pagination_layout',$cv_resume_portfolio_default['cv_resume_portfolio_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'cv_resume_portfolio_register_styles',200 );

function cv_resume_portfolio_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('cv-resume-portfolio-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'cv_resume_portfolio_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function cv_resume_portfolio_menus() {

	$cv_resume_portfolio_locations = array(
		'cv-resume-portfolio-primary-menu'  => esc_html__( 'Primary Menu', 'cv-resume-portfolio' ),
	);

	register_nav_menus( $cv_resume_portfolio_locations );
}

add_action( 'init', 'cv_resume_portfolio_menus' );

add_filter('loop_shop_columns', 'cv_resume_portfolio_loop_columns');
if (!function_exists('cv_resume_portfolio_loop_columns')) {
	function cv_resume_portfolio_loop_columns() {
		$cv_resume_portfolio_columns = get_theme_mod( 'cv_resume_portfolio_per_columns', 3 );
		return $cv_resume_portfolio_columns;
	}
}

add_filter( 'loop_shop_per_page', 'cv_resume_portfolio_per_page', 20 );
function cv_resume_portfolio_per_page( $cv_resume_portfolio_cols ) {
  	$cv_resume_portfolio_cols = get_theme_mod( 'cv_resume_portfolio_product_per_page', 9 );
	return $cv_resume_portfolio_cols;
}

function cv_resume_portfolio_products_args( $cv_resume_portfolio_args ) {

    $cv_resume_portfolio_args['posts_per_page'] = get_theme_mod( 'cv_resume_portfolio_custom_related_products_number', 6 );

    $cv_resume_portfolio_args['columns'] = get_theme_mod( 'cv_resume_portfolio_custom_related_products_number_per_row', 3 );

    return $cv_resume_portfolio_args;
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';
require get_template_directory() . '/inc/general.php';

function cv_resume_portfolio_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'cv_resume_portfolio_remove_customize_register', 11 );

function cv_resume_portfolio_radio_sanitize(  $cv_resume_portfolio_input, $cv_resume_portfolio_setting  ) {
	$cv_resume_portfolio_input = sanitize_key( $cv_resume_portfolio_input );
	$cv_resume_portfolio_choices = $cv_resume_portfolio_setting->manager->get_control( $cv_resume_portfolio_setting->id )->choices;
	return ( array_key_exists( $cv_resume_portfolio_input, $cv_resume_portfolio_choices ) ? $cv_resume_portfolio_input : $cv_resume_portfolio_setting->default );
}

// NOTICE FUNCTION

function cv_resume_portfolio_admin_notice() { 
    global $pagenow;
    $theme_args = wp_get_theme();
    $meta = get_option( 'cv_resume_portfolio_admin_notice' );
    $name = $theme_args->get( 'Name' );
    $current_screen = get_current_screen();

    if ( ! $meta ) {
        if ( is_network_admin() ) {
            return;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( $current_screen->base != 'appearance_page_cvresumeportfolio-wizard' ) {
            ?>
            <div class="notice notice-success notice-content">
                <h2><?php esc_html_e('Welcome! Thank you for choosing CV Resume Portfolio. Let’s Set Up Your Website!', 'cv-resume-portfolio') ?> </h2>
                <p><?php esc_html_e('Before you dive into customization, let’s go through a quick setup process to ensure everything runs smoothly. Click below to start setting up your website in minutes!', 'cv-resume-portfolio') ?> </p>
                <div class="info-link">
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=cvresumeportfolio-wizard' ) ); ?>"><?php esc_html_e('Get Started with CV Resume Portfolio', 'cv-resume-portfolio'); ?></a>
					<a href="#" class="notice-bundle" id="bundleTrigger"><?php esc_html_e('Get All WP Themes', 'cv-resume-portfolio'); ?></a>
					<div class="bundle-overlay" id="bundlePopup">
						<div class="bundle-modal">
							<span class="close-popup">&times;</span>
							<div class="sale-badge"><?php esc_html_e('🔥 MEGA SALE', 'cv-resume-portfolio'); ?></div>
							<h2><?php esc_html_e('Unlock All Premium WP Themes', 'cv-resume-portfolio'); ?></h2>
							<p> <?php esc_html_e('Unlock the Full Potential of Your Website with Our 50+ WordPress Themes Bundle', 'cv-resume-portfolio'); ?></p>
							<ul>
								<li><?php esc_html_e('✔ Expert Support', 'cv-resume-portfolio'); ?></li>
								<li><?php esc_html_e('✔ Premium Theme ZIP File', 'cv-resume-portfolio'); ?></li>
								<li><?php esc_html_e('✔ Ready-to-Use Website Templates', 'cv-resume-portfolio'); ?></li>
								<li><?php esc_html_e('✔ Demo Content (Included in the file)', 'cv-resume-portfolio'); ?></li>
								<li><?php esc_html_e('✔ Access to the Premium Support Forum', 'cv-resume-portfolio'); ?></li>
							</ul>
							<a href="<?php echo esc_url( CV_RESUME_PORTFOLIO_BUNDLE_BUTTON ); ?>" target="_blank" class="bundle-cta"><?php esc_html_e('Get the Bundle Now →', 'cv-resume-portfolio'); ?></a>
						</div>
					</div>
                </div>
                <p class="dismiss-link"><strong><a href="?cv_resume_portfolio_admin_notice=1"><?php esc_html_e( 'Dismiss', 'cv-resume-portfolio' ); ?></a></strong></p>
            </div>
            <?php
        }
    }
}
add_action( 'admin_notices', 'cv_resume_portfolio_admin_notice' );

if ( ! function_exists( 'cv_resume_portfolio_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
 */
function cv_resume_portfolio_update_admin_notice() {
    if ( isset( $_GET['cv_resume_portfolio_admin_notice'] ) && $_GET['cv_resume_portfolio_admin_notice'] == '1' ) {
        update_option( 'cv_resume_portfolio_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'cv_resume_portfolio_update_admin_notice' );