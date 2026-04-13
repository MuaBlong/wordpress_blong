<?php
/**
 * The template for displaying single posts and pages.
 * @package CV Resume Portfolio
 * @since 1.0.0
 */

get_header();

$cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();
$cv_resume_portfolio_global_layout = get_theme_mod('cv_resume_portfolio_global_sidebar_layout', $cv_resume_portfolio_default['cv_resume_portfolio_global_sidebar_layout']);
$cv_resume_portfolio_page_layout = get_theme_mod('cv_resume_portfolio_page_sidebar_layout', $cv_resume_portfolio_global_layout);
$cv_resume_portfolio_post_layout = get_theme_mod('cv_resume_portfolio_post_sidebar_layout', $cv_resume_portfolio_global_layout);
$cv_resume_portfolio_post_meta = get_post_meta(get_the_ID(), 'cv_resume_portfolio_post_sidebar_option', true);

$cv_resume_portfolio_final_layout = $cv_resume_portfolio_global_layout;
if (!empty($cv_resume_portfolio_post_meta) && $cv_resume_portfolio_post_meta !== 'default') {
    $cv_resume_portfolio_final_layout = $cv_resume_portfolio_post_meta;
} elseif (is_page() || (function_exists('is_shop') && is_shop())) {
    $cv_resume_portfolio_final_layout = $cv_resume_portfolio_page_layout;
} elseif (is_single()) {
    $cv_resume_portfolio_final_layout = $cv_resume_portfolio_post_layout;
}

// Set content column order based on sidebar layout
$cv_resume_portfolio_sidebar_column_class = 'column-order-1';
if ($cv_resume_portfolio_final_layout === 'left-sidebar') {
    $cv_resume_portfolio_sidebar_column_class = 'column-order-2';
}

?>

<div id="single-page" class="singular-main-block">
    <div class="wrapper">
        <div class="column-row <?php echo esc_attr($cv_resume_portfolio_final_layout === 'no-sidebar' ? 'no-sidebar-layout' : ''); ?>">

            <?php if ($cv_resume_portfolio_final_layout === 'left-sidebar') : ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>

            <div id="primary" class="content-area <?php echo esc_attr($cv_resume_portfolio_final_layout === 'no-sidebar' ? 'full-width-content' : $cv_resume_portfolio_sidebar_column_class); ?>">
                <main id="site-content" role="main">

                    <?php
                    cv_resume_portfolio_breadcrumb(); // Display breadcrumb

                    if (have_posts()) : ?>

                        <div class="article-wraper">
                            <?php while (have_posts()) : the_post(); ?>

                                <?php get_template_part('template-parts/content', 'single'); ?>

                                <?php if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) : ?>
                                    <div class="comments-wrapper">
                                        <?php comments_template(); ?>
                                    </div>
                                <?php endif; ?>

                            <?php endwhile; ?>
                        </div>

                    <?php else : ?>

                        <?php get_template_part('template-parts/content', 'none'); ?>

                    <?php endif;

                    do_action('cv_resume_portfolio_navigation_action');
                    ?>

                </main>
            </div>

            <?php if ($cv_resume_portfolio_final_layout === 'right-sidebar') : ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>