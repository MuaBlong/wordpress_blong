<?php
/**
 * Header Layout
 * @package CV Resume Portfolio
 */

$cv_resume_portfolio_defaults = cv_resume_portfolio_get_default_theme_options();

$cv_resume_portfolio_sticky = get_theme_mod('cv_resume_portfolio_sticky');
    $cv_resume_portfolio_data_sticky = "false";
    if ($cv_resume_portfolio_sticky) {
    $cv_resume_portfolio_data_sticky = "true";
    }
    global $wp_customize;

?>
<header id="site-header" class="site-header-layout header-layout" role="banner">
    <div class="header-navbar <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($cv_resume_portfolio_data_sticky); ?>">
        <div class="wrapper header-wrapper">
            <div class="theme-header-areas header-areas-left aa">
                <div class="header-titles">
                    <?php
                    cv_resume_portfolio_site_logo();
                    cv_resume_portfolio_site_description();
                    ?>
                </div>
            </div>
            <div class="header-right-box">
                <div class="theme-header-areas header-areas-right bb">
                    <div class="site-navigation">
                        <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'cv-resume-portfolio'); ?>" role="navigation">
                            <ul class="primary-menu theme-menu">
                                <?php
                                if (has_nav_menu('cv-resume-portfolio-primary-menu')) {
                                    wp_nav_menu(
                                        array(
                                            'container' => '',
                                            'items_wrap' => '%3$s',
                                            'theme_location' => 'cv-resume-portfolio-primary-menu',
                                        )
                                    );
                                } else {
                                    wp_list_pages(
                                        array(
                                            'match_menu_classes' => true,
                                            'show_sub_menu_icons' => true,
                                            'title_li' => false,
                                            'walker' => new CV_Resume_Portfolio_Walker_Page(),
                                        )
                                    );
                                } ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="navbar-controls twp-hide-js">
                        <button type="button" class="navbar-control navbar-control-offcanvas">
                            <span class="navbar-control-trigger" tabindex="-1">
                                <?php cv_resume_portfolio_the_theme_svg('menu'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="theme-header-areas header-areas-right header-contact cc">
                    <span class="wishlist-box">
                        <a href="<?php echo esc_url( home_url() . '/index.php/wishsuite' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free v5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"/></svg></a>
                    </span>
                    <!-- Open Button -->
                    <button id="sidebarToggle" class="menu-icon" aria-label="Open Sidebar" aria-expanded="false">
                       <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--!Font Awesome Free v5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"/></svg>
                    </button>

                    <!-- Slide-in Sidebar -->
                    <aside id="slideSidebar" class="slide-sidebar" aria-hidden="true" role="dialog" aria-modal="true">

                        <!-- Close Button -->
                        <button id="closeSidebar" class="close-btn" aria-label="Close Sidebar">&times;</button>

                        <!-- WordPress Widgets -->
                        <?php if ( is_active_sidebar( 'sidebar-header' ) ) : ?>
                            <div class="widget-area" id="widgetArea">
                                <?php dynamic_sidebar( 'sidebar-header' ); ?>
                            </div>
                        <?php endif; ?>

                    </aside>
                </div>
            </div>
        </div>
    </div>
</header>