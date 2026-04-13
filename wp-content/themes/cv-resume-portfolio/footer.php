<?php
/**
 * The template for displaying the footer
 * @package CV Resume Portfolio
 * @since 1.0.0
 */

/**
 * Toogle Contents
 * @hooked cv_resume_portfolio_content_offcanvas - 30
*/

do_action('cv_resume_portfolio_before_footer_content_action'); ?>

</div>

<footer id="site-footer" role="contentinfo">

    <?php
    /**
     * Footer Content
     * @hooked cv_resume_portfolio_footer_content_widget - 10
     * @hooked cv_resume_portfolio_footer_content_info - 20
    */

    do_action('cv_resume_portfolio_footer_content_action'); ?>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>