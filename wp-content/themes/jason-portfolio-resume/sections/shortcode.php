<?php
if ( ! get_theme_mod( 'jason_portfolio_resume_enable_shortcode_section', false ) ) {
    return;
}

$section_content = array();
$section_content['section_shortcode'] = get_theme_mod( 'jason_portfolio_resume_shortcode_section_content' );
$section_content = apply_filters( 'jason_portfolio_resume_shortcode_section_content', $section_content );

jason_portfolio_render_shortcode_section( $section_content );
/**
 * Render Shortcode Section
 */
function jason_portfolio_render_shortcode_section($section_content) {
?>
<section id="shortcode" class="shortcode mb-0 px-50 w-75 offset-0 offset-lg-3">
    <?php
    if ( is_customize_preview() ) :
        jason_portfolio_resume_section_link( 'jason_portfolio_resume_shortcode_section' );
    endif;
    ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <?php echo do_shortcode($section_content['section_shortcode']);?>
            </div>
        </div>
    </div>
</section>
<?php
}
?>
