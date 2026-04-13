<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lyn_Portfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'adinda-portfolio-resume' ); ?></a>
    <section class="header d-flex align-content-center flex-row">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="header_inner d-flex align-items-center">
                        <div class="header__left">
                            <?php if ( has_custom_logo() ) : ?>
                                <?php
                                    $logo_dark = get_theme_mod( 'logo_dark' );
                                    $logo_light = wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );
                                ?>
                                <div class="site-logo">
                                    <?php echo is_front_page() || is_home() ? '<h1 class="header__logo m-0">':'<span class="header__logo m-0">' ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                            <img class="light" src="<?php echo esc_attr($logo_dark ? $logo_dark : get_template_directory_uri() . '/assets/img/logo.png'); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                            <img class="dark" src="<?php echo esc_attr($logo_light ? $logo_light : get_template_directory_uri() . '/assets/img/logo-dark.png'); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                        </a>
                                    <?php echo is_front_page() || is_home() ? '</h1>':'</span>' ?>
                                </div>
                            <?php else : ?>
                                <div class="site-identity">
                                    <?php echo is_front_page() || is_home() ? '<h1 class="header__logo m-0">':'<span class="header__logo m-0">' ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                        <span><?php bloginfo( 'description' ); ?></span>
                                    <?php echo is_front_page() || is_home() ? '</h1>':'</span>' ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="header__menu ms-auto d-flex flex-row justify-content-center align-items-center">
                            <a class="header__button-menu d-inline-flex d-lg-none" href="#"></a>
                            <div class="header__nav d-flex align-items-center justify-content-center ms-0 ms-lg-3 pe-0 pe-lg-2">
                                <?php
                                if ( has_nav_menu( 'primary' ) ) {
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'primary',
                                            'menu_class'     => 'header__navigation nav d-flex flex-column flex-lg-row justify-content-center align-items-center'
                                        )
                                    );
                                }
                                ?>
                            </div>
                            <a class="button-dark-mode" href="#"><i class="icofont-moon"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="header--fixed"></div>
