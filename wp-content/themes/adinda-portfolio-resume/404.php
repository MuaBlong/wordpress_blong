<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lyn_Portfolio
 */

get_header();
?>
<main id="content" class="site-main">
    <section class="block-default">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <section class="error-404 not-found">
                        <header>
                            <h1><?php esc_html_e( '404', 'adinda-portfolio-resume' ); ?></h1>
                            <p><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'adinda-portfolio-resume' ); ?></p>
                        </header><!-- .page-header -->
                        <div class="page-content">
                            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'adinda-portfolio-resume' ); ?></p>
                            <?php get_search_form(); ?>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer();
