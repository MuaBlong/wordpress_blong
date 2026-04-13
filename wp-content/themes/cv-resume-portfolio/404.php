<?php
/**
 * The template for displaying 404 pages (not found)
 * @package CV Resume Portfolio
 */
get_header();

$cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();

?>
    <div class="singular-main-block">
        <section class="theme-custom-block theme-error-section error-block-heading">
            <div class="wrapper">
                <div class="theme-area-header">
                    <div class="theme-area-headlines">
                        <?php 
                            $cv_resume_portfolio_404_main_title = get_theme_mod( 'cv_resume_portfolio_404_main_title', $cv_resume_portfolio_default['cv_resume_portfolio_404_main_title'] ); 
                        ?>
                        <h2 class="theme-area-title"><?php echo esc_html( $cv_resume_portfolio_404_main_title ); ?></h2>
                        <div class="theme-animated-line"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="theme-custom-block theme-error-sectiontheme-error-section error-block-middle">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-12">
                        <?php 
                            $cv_resume_portfolio_404_subtitle_one = get_theme_mod( 'cv_resume_portfolio_404_subtitle_one', $cv_resume_portfolio_default['cv_resume_portfolio_404_subtitle_one'] ); 
                        ?>
                        <h2><?php echo esc_html( $cv_resume_portfolio_404_subtitle_one ); ?></h2>
                        
                        <?php 
                            $cv_resume_portfolio_404_para_one = get_theme_mod( 'cv_resume_portfolio_404_para_one', $cv_resume_portfolio_default['cv_resume_portfolio_404_para_one'] ); 
                        ?>
                        <p><?php echo esc_html( $cv_resume_portfolio_404_para_one ); ?> 
                            <a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e('Homepage','cv-resume-portfolio'); ?></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-12">
                        <?php 
                            $cv_resume_portfolio_404_subtitle_two = get_theme_mod( 'cv_resume_portfolio_404_subtitle_two', $cv_resume_portfolio_default['cv_resume_portfolio_404_subtitle_two'] ); 
                        ?>
                        <h2><?php echo esc_html( $cv_resume_portfolio_404_subtitle_two ); ?></h2>
                        
                        <?php 
                            $cv_resume_portfolio_404_para_two = get_theme_mod( 'cv_resume_portfolio_404_para_two', $cv_resume_portfolio_default['cv_resume_portfolio_404_para_two'] ); 
                        ?>
                        <p><?php echo esc_html( $cv_resume_portfolio_404_para_two ); ?></p>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php
get_footer();