<?php
$cv_resume_portfolio_layout = cv_resume_portfolio_get_final_sidebar_layout();
$cv_resume_portfolio_sidebar_class = 'column-order-1';

if ( $cv_resume_portfolio_layout === 'left-sidebar' ) {
    $cv_resume_portfolio_sidebar_class = 'column-order-1';
} elseif ( $cv_resume_portfolio_layout === 'right-sidebar' ) {
    $cv_resume_portfolio_sidebar_class = 'column-order-2';
}

if ( $cv_resume_portfolio_layout !== 'no-sidebar' ) : ?>
    <aside id="secondary" class="widget-area <?php echo esc_attr( $cv_resume_portfolio_sidebar_class ); ?>">
        <div class="widget-area-wrapper">
            <?php if ( is_active_sidebar('sidebar-1') ) : ?>
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            <?php else : ?>
                <!-- Default widgets -->
                <div class="widget widget_block widget_search">
                    <h3 class="widget-title"><?php esc_html_e('Search', 'cv-resume-portfolio'); ?></h3>
                    <?php get_search_form(); ?>
                </div>

                <div class="widget widget_pages">
                    <h3 class="widget-title"><?php esc_html_e('Pages', 'cv-resume-portfolio'); ?></h3>
                    <ul>
                        <?php
                        wp_list_pages(array(
                            'title_li' => '',
                        ));
                        ?>
                    </ul>
                </div>

                <div class="widget widget_archive">
                    <h3 class="widget-title"><?php esc_html_e('Archives', 'cv-resume-portfolio'); ?></h3>
                    <ul>
                        <?php wp_get_archives(['type' => 'monthly', 'show_post_count' => true]); ?>
                    </ul>
                </div>

                <div class="widget widget_categories">
                    <h3 class="widget-title"><?php esc_html_e('Categories', 'cv-resume-portfolio'); ?></h3>
                    <ul class="wp-block-categories-list wp-block-categories">
                        <?php wp_list_categories(['orderby' => 'name', 'title_li' => '', 'show_count' => true]); ?>
                    </ul>
                </div>

                <div class="widget widget_tag_cloud">
                    <h3 class="widget-title"><?php esc_html_e('Tags', 'cv-resume-portfolio'); ?></h3>
                    <?php
                    $cv_resume_portfolio_tags = get_tags();
                    if ( $cv_resume_portfolio_tags ) {
                        echo '<div class="tagcloud">';
                        foreach ( $cv_resume_portfolio_tags as $cv_resume_portfolio_tag ) {
                            $cv_resume_portfolio_link = get_tag_link($cv_resume_portfolio_tag->term_id);
                            echo '<a href="' . esc_url($cv_resume_portfolio_link) . '" class="tag-cloud-link">' . esc_html($cv_resume_portfolio_tag->name) . '</a> ';
                        }
                        echo '</div>';
                    } else {
                        echo '<p>' . esc_html__('No tags found.', 'cv-resume-portfolio') . '</p>';
                    }
                    ?>
                </div>

            <?php endif; ?>
        </div>
    </aside>
<?php endif; ?>
