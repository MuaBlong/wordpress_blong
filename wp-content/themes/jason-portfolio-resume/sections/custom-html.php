<?php
if ( ! get_theme_mod( 'jason_portfolio_resume_enable_custom_html_section', false ) ) {
    return;
}

$section_content['section_custom_html'] = get_theme_mod( 'jason_portfolio_resume_custom_html');
$section_content['section_custom_html_id'] = get_theme_mod( 'jason_portfolio_resume_custom_html_id', 'custom-html' );

$section_content = apply_filters( 'jason_portfolio_resume_custom_html_section_content', $section_content );
jason_portfolio_render_custom_html_section( $section_content );
/**
 * Render Custom HTML Section
 */
function jason_portfolio_render_custom_html_section($section_content) {
?>
    <section id="<?php echo esc_html($section_content['section_custom_html_id']); ?>" class="custom-html mb-0 px-50 w-75 offset-0 offset-lg-3">
        <?php
        if ( is_customize_preview() ) :
            jason_portfolio_resume_section_link( 'jason_portfolio_resume_custom_html_section' );
        endif;
        ?>
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>