<?php
/**
 * Enqueue scripts and styles.
 */

//if ( ! defined( 'CRT_THEMES_NAME_TEMPLATE' ) ) {
//    define('CRT_THEMES_NAME_TEMPLATE', basename(get_theme_file_path()));
//}
if ( ! defined( 'ADINDA_PORTFOLIO_VERSION' ) ) {
    define( 'ADINDA_PORTFOLIO_VERSION', wp_get_theme()->get( 'Version' ) );
}


if ( ! function_exists( 'adinda_portfolio_resume_setup' ) ) :
    function adinda_portfolio_resume_setup() {

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'title-tag' );

        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'register_block_style' );

        add_theme_support( 'register_block_pattern' );

        add_theme_support( 'post-thumbnails' );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'jason_portfolio_resume_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        add_theme_support( 'align-wide' );
        add_theme_support( 'responsive-embeds' );

        add_theme_support(
            'custom-header',
            apply_filters(
                'jason_portfolio_resume_custom_header_args',
                array(
                    'default-image'      => '',
                    'default-text-color' => '2896df',
                    'width'              => 1000,
                    'height'             => 250,
                    'flex-height'        => true,
                    'wp-head-callback'   => 'jason_portfolio_resume_header_style',
                )
            )
        );

        add_theme_support( 'html5', array(
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
        ) );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary' => esc_html__( 'Primary', 'adinda-portfolio-resume' ),
            )
        );

        register_nav_menus(
            array(
                'not_home_nav' => esc_html__( 'Not Home', 'adinda-portfolio-resume' ),
            )
        );
    }
endif;
add_action( 'after_setup_theme', 'adinda_portfolio_resume_setup' );

function adinda_portfolio_resume_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'adinda-portfolio-resume' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'adinda-portfolio-resume' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

}
add_action( 'widgets_init', 'adinda_portfolio_resume_widgets_init' );

function adinda_portfolio_scripts() {
    // Append .min if SCRIPT_DEBUG is false.
    $min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    wp_enqueue_style( 'jason-portfolio-resume-style', get_stylesheet_directory_uri() . '/style.css', array(), ADINDA_PORTFOLIO_VERSION );

    // Main style.
    wp_enqueue_style( 'jason-portfolio-resume-main-style', get_stylesheet_directory_uri() . '/assets/build/css/main.min.css', array(), ADINDA_PORTFOLIO_VERSION );

    // Main script.
    wp_enqueue_script( 'jason-portfolio-resume-main-script', get_stylesheet_directory_uri() . '/assets/build/js/main.bundle.js', array( 'jquery' ), ADINDA_PORTFOLIO_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'adinda_portfolio_scripts' );
