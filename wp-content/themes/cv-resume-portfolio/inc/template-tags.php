<?php
/**
 * Custom Functions
 * @package CV Resume Portfolio
 * @since 1.0.0
 */

if( !function_exists('cv_resume_portfolio_site_logo') ):

    /**
     * Logo & Description
     */
    /**
     * Displays the site logo, either text or image.
     *
     * @param array $cv_resume_portfolio_args Arguments for displaying the site logo either as an image or text.
     * @param boolean $cv_resume_portfolio_echo Echo or return the HTML.
     *
     * @return string $cv_resume_portfolio_html Compiled HTML based on our arguments.
     */
    function cv_resume_portfolio_site_logo( $cv_resume_portfolio_args = array(), $cv_resume_portfolio_echo = true ){
        $cv_resume_portfolio_logo = get_custom_logo();
        $cv_resume_portfolio_site_title = get_bloginfo('name');
        $cv_resume_portfolio_contents = '';
        $cv_resume_portfolio_classname = '';
        $cv_resume_portfolio_defaults = array(
            'logo' => '%1$s<span class="screen-reader-text">%2$s</span>',
            'logo_class' => 'site-logo site-branding',
            'title' => '<a href="%1$s" class="custom-logo-name">%2$s</a>',
            'title_class' => 'site-title',
            'home_wrap' => '<h1 class="%1$s">%2$s</h1>',
            'single_wrap' => '<div class="%1$s">%2$s</div>',
            'condition' => (is_front_page() || is_home()) && !is_page(),
        );
        $cv_resume_portfolio_args = wp_parse_args($cv_resume_portfolio_args, $cv_resume_portfolio_defaults);
        /**
         * Filters the arguments for `cv_resume_portfolio_site_logo()`.
         *
         * @param array $cv_resume_portfolio_args Parsed arguments.
         * @param array $cv_resume_portfolio_defaults Function's default arguments.
         */
        $cv_resume_portfolio_args = apply_filters('cv_resume_portfolio_site_logo_args', $cv_resume_portfolio_args, $cv_resume_portfolio_defaults);
        
        $cv_resume_portfolio_show_logo  = get_theme_mod('cv_resume_portfolio_display_logo', false);
        $cv_resume_portfolio_show_title = get_theme_mod('cv_resume_portfolio_display_title', true);

        if ( has_custom_logo() && $cv_resume_portfolio_show_logo ) {
            $cv_resume_portfolio_contents .= sprintf($cv_resume_portfolio_args['logo'], $cv_resume_portfolio_logo, esc_html($cv_resume_portfolio_site_title));
            $cv_resume_portfolio_classname = $cv_resume_portfolio_args['logo_class'];
        }

        if ( $cv_resume_portfolio_show_title ) {
            $cv_resume_portfolio_contents .= sprintf($cv_resume_portfolio_args['title'], esc_url(get_home_url(null, '/')), esc_html($cv_resume_portfolio_site_title));
            // If logo isn't shown, fallback to title class for wrapper.
            if ( !$cv_resume_portfolio_show_logo ) {
                $cv_resume_portfolio_classname = $cv_resume_portfolio_args['title_class'];
            }
        }

        // If nothing is shown (logo or title both disabled), exit early
        if ( empty($cv_resume_portfolio_contents) ) {
            return;
        }

        $cv_resume_portfolio_wrap = $cv_resume_portfolio_args['condition'] ? 'home_wrap' : 'single_wrap';
        // $cv_resume_portfolio_wrap = 'home_wrap';
        $cv_resume_portfolio_html = sprintf($cv_resume_portfolio_args[$cv_resume_portfolio_wrap], $cv_resume_portfolio_classname, $cv_resume_portfolio_contents);
        /**
         * Filters the arguments for `cv_resume_portfolio_site_logo()`.
         *
         * @param string $cv_resume_portfolio_html Compiled html based on our arguments.
         * @param array $cv_resume_portfolio_args Parsed arguments.
         * @param string $cv_resume_portfolio_classname Class name based on current view, home or single.
         * @param string $cv_resume_portfolio_contents HTML for site title or logo.
         */
        $cv_resume_portfolio_html = apply_filters('cv_resume_portfolio_site_logo', $cv_resume_portfolio_html, $cv_resume_portfolio_args, $cv_resume_portfolio_classname, $cv_resume_portfolio_contents);
        if (!$cv_resume_portfolio_echo) {
            return $cv_resume_portfolio_html;
        }
        echo $cv_resume_portfolio_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }

endif;

if( !function_exists('cv_resume_portfolio_site_description') ):

    /**
     * Displays the site description.
     *
     * @param boolean $cv_resume_portfolio_echo Echo or return the html.
     *
     * @return string $cv_resume_portfolio_html The HTML to display.
     */
    function cv_resume_portfolio_site_description($cv_resume_portfolio_echo = true){

        if ( get_theme_mod('cv_resume_portfolio_display_header_text', false) == true ) :
        $cv_resume_portfolio_description = get_bloginfo('description');
        if (!$cv_resume_portfolio_description) {
            return;
        }
        $cv_resume_portfolio_wrapper = '<div class="site-description"><span>%s</span></div><!-- .site-description -->';
        $cv_resume_portfolio_html = sprintf($cv_resume_portfolio_wrapper, esc_html($cv_resume_portfolio_description));
        /**
         * Filters the html for the site description.
         *
         * @param string $cv_resume_portfolio_html The HTML to display.
         * @param string $cv_resume_portfolio_description Site description via `bloginfo()`.
         * @param string $cv_resume_portfolio_wrapper The format used in case you want to reuse it in a `sprintf()`.
         * @since 1.0.0
         *
         */
        $cv_resume_portfolio_html = apply_filters('cv_resume_portfolio_site_description', $cv_resume_portfolio_html, $cv_resume_portfolio_description, $cv_resume_portfolio_wrapper);
        if (!$cv_resume_portfolio_echo) {
            return $cv_resume_portfolio_html;
        }
        echo $cv_resume_portfolio_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        endif;
    }

endif;

if( !function_exists('cv_resume_portfolio_posted_on') ):

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function cv_resume_portfolio_posted_on( $cv_resume_portfolio_icon = true, $cv_resume_portfolio_animation_class = '' ){

        $cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();
        $cv_resume_portfolio_post_date = absint( get_theme_mod( 'cv_resume_portfolio_post_date',$cv_resume_portfolio_default['cv_resume_portfolio_post_date'] ) );

        if( $cv_resume_portfolio_post_date ){

            $cv_resume_portfolio_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if (get_the_time('U') !== get_the_modified_time('U')) {
                $cv_resume_portfolio_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $cv_resume_portfolio_time_string = sprintf($cv_resume_portfolio_time_string,
                esc_attr(get_the_date(DATE_W3C)),
                esc_html(get_the_date()),
                esc_attr(get_the_modified_date(DATE_W3C)),
                esc_html(get_the_modified_date())
            );

            $cv_resume_portfolio_year = get_the_date('Y');
            $cv_resume_portfolio_month = get_the_date('m');
            $cv_resume_portfolio_day = get_the_date('d');
            $cv_resume_portfolio_link = get_day_link($cv_resume_portfolio_year, $cv_resume_portfolio_month, $cv_resume_portfolio_day);

            $cv_resume_portfolio_posted_on = '<a href="' . esc_url($cv_resume_portfolio_link) . '" rel="bookmark">' . $cv_resume_portfolio_time_string . '</a>';

            echo '<div class="entry-meta-item entry-meta-date">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $cv_resume_portfolio_animation_class ).'">';

            if( $cv_resume_portfolio_icon ){

                echo '<span class="entry-meta-icon calendar-icon"> ';
                cv_resume_portfolio_the_theme_svg('calendar');
                echo '</span>';

            }

            echo '<span class="posted-on">' . $cv_resume_portfolio_posted_on . '</span>'; // phpcs:ignore Standard.Category.SniffName.ErrorCode
            echo '</div>';
            echo '</div>';

        }

    }

endif;

if( !function_exists('cv_resume_portfolio_posted_by') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function cv_resume_portfolio_posted_by( $cv_resume_portfolio_icon = true, $cv_resume_portfolio_animation_class = '' ){   

        $cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();
        $cv_resume_portfolio_post_author = absint( get_theme_mod( 'cv_resume_portfolio_post_author',$cv_resume_portfolio_default['cv_resume_portfolio_post_author'] ) );

        if( $cv_resume_portfolio_post_author ){

            echo '<div class="entry-meta-item entry-meta-author">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $cv_resume_portfolio_animation_class ).'">';

            if( $cv_resume_portfolio_icon ){
            
                echo '<span class="entry-meta-icon author-icon"> ';
                cv_resume_portfolio_the_theme_svg('user');
                echo '</span>';
                
            }

            $cv_resume_portfolio_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';
            echo '<span class="byline"> ' . $cv_resume_portfolio_byline . '</span>'; // phpcs:ignore Standard.Category.SniffName.ErrorCode
            echo '</div>';
            echo '</div>';

        }

    }

endif;


if( !function_exists('cv_resume_portfolio_posted_by_avatar') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function cv_resume_portfolio_posted_by_avatar( $cv_resume_portfolio_date = false ){

        $cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();
        $cv_resume_portfolio_post_author = absint( get_theme_mod( 'cv_resume_portfolio_post_author',$cv_resume_portfolio_default['cv_resume_portfolio_post_author'] ) );

        if( $cv_resume_portfolio_post_author ){



            echo '<div class="entry-meta-left">';
            echo '<div class="entry-meta-item entry-meta-avatar">';
            echo wp_kses_post( get_avatar( get_the_author_meta( 'ID' ) ) );
            echo '</div>';
            echo '</div>';

            echo '<div class="entry-meta-right">';

            $cv_resume_portfolio_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';

            echo '<div class="entry-meta-item entry-meta-byline"> ' . $cv_resume_portfolio_byline . '</div>';

            if( $cv_resume_portfolio_date ){
                cv_resume_portfolio_posted_on($cv_resume_portfolio_icon = false);
            }
            echo '</div>';

        }

    }

endif;

if( !function_exists('cv_resume_portfolio_entry_footer') ):

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function cv_resume_portfolio_entry_footer( $cv_resume_portfolio_cats = true, $cv_resume_portfolio_tags = true, $cv_resume_portfolio_edits = true){   

        $cv_resume_portfolio_default = cv_resume_portfolio_get_default_theme_options();
        $cv_resume_portfolio_post_category = absint( get_theme_mod( 'cv_resume_portfolio_post_category',$cv_resume_portfolio_default['cv_resume_portfolio_post_category'] ) );
        $cv_resume_portfolio_post_tags = absint( get_theme_mod( 'cv_resume_portfolio_post_tags',$cv_resume_portfolio_default['cv_resume_portfolio_post_tags'] ) );

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            if( $cv_resume_portfolio_cats && $cv_resume_portfolio_post_category ){

                /* translators: used between list items, there is a space after the comma */
                $cv_resume_portfolio_categories = get_the_category();
                if ($cv_resume_portfolio_categories) {
                    echo '<div class="entry-meta-item entry-meta-categories">';
                    echo '<div class="entry-meta-wrapper">';
                
                    /* translators: 1: list of categories. */
                    echo '<span class="cat-links">';
                    foreach( $cv_resume_portfolio_categories as $cv_resume_portfolio_category ){

                        $cv_resume_portfolio_cat_name = $cv_resume_portfolio_category->name;
                        $cv_resume_portfolio_cat_slug = $cv_resume_portfolio_category->slug;
                        $cv_resume_portfolio_cat_url = get_category_link( $cv_resume_portfolio_category->term_id );
                        ?>

                        <a class="twp_cat_<?php echo esc_attr( $cv_resume_portfolio_cat_slug ); ?>" href="<?php echo esc_url( $cv_resume_portfolio_cat_url ); ?>" rel="category tag"><?php echo esc_html( $cv_resume_portfolio_cat_name ); ?></a>

                    <?php }
                    echo '</span>'; // phpcs:ignore Standard.Category.SniffName.ErrorCode
                    echo '</div>';
                    echo '</div>';
                }

            }

            if( $cv_resume_portfolio_tags && $cv_resume_portfolio_post_tags ){
                /* translators: used between list items, there is a space after the comma */
                $cv_resume_portfolio_tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'cv-resume-portfolio'));
                if( $cv_resume_portfolio_tags_list ){

                    echo '<div class="entry-meta-item entry-meta-tags">';
                    echo '<div class="entry-meta-wrapper">';

                    /* translators: 1: list of tags. */
                    echo '<span class="tags-links">';
                    echo wp_kses_post($cv_resume_portfolio_tags_list) . '</span>'; // phpcs:ignore Standard.Category.SniffName.ErrorCode
                    echo '</div>';
                    echo '</div>';

                }

            }

            if( $cv_resume_portfolio_edits ){

                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'cv-resume-portfolio'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            }

        }
    }

endif;

if ( ! function_exists( 'cv_resume_portfolio_post_thumbnail' ) ) :

    /**
     * Displays an optional post thumbnail.
     *
     * Shows background style image with height class on archive/search/front,
     * and a normal inline image on single post/page views.
     */
    function cv_resume_portfolio_post_thumbnail( $cv_resume_portfolio_image_size = 'full' ) {

        if ( post_password_required() || is_attachment() ) {
            return;
        }

        // Fallback image path
        $cv_resume_portfolio_default_image = get_template_directory_uri() . '/assets/images/slide-bg.png';

        // Image size → height class map
        $cv_resume_portfolio_size_class_map = array(
            'full'      => 'data-bg-large',
            'large'     => 'data-bg-big',
            'medium'    => 'data-bg-medium',
            'small'     => 'data-bg-small',
            'xsmall'    => 'data-bg-xsmall',
            'thumbnail' => 'data-bg-thumbnail',
        );

        $cv_resume_portfolio_class = isset( $cv_resume_portfolio_size_class_map[ $cv_resume_portfolio_image_size ] )
            ? $cv_resume_portfolio_size_class_map[ $cv_resume_portfolio_image_size ]
            : 'data-bg-medium';

        if ( is_singular() ) {
            the_post_thumbnail();
        } else {
            // 🔵 On archives → use background image style
            $cv_resume_portfolio_image = has_post_thumbnail()
                ? wp_get_attachment_image_src( get_post_thumbnail_id(), $cv_resume_portfolio_image_size )
                : array( $cv_resume_portfolio_default_image );

            $cv_resume_portfolio_bg_image = isset( $cv_resume_portfolio_image[0] ) ? $cv_resume_portfolio_image[0] : $cv_resume_portfolio_default_image;
            ?>
            <div class="post-thumbnail data-bg <?php echo esc_attr( $cv_resume_portfolio_class ); ?>"
                 data-background="<?php echo esc_url( $cv_resume_portfolio_bg_image ); ?>">
                <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
            </div>
            <?php
        }
    }

endif;

if( !function_exists('cv_resume_portfolio_is_comment_by_post_author') ):

    /**
     * Comments
     */
    /**
     * Check if the specified comment is written by the author of the post commented on.
     *
     * @param object $cv_resume_portfolio_comment Comment data.
     *
     * @return bool
     */
    function cv_resume_portfolio_is_comment_by_post_author($cv_resume_portfolio_comment = null){

        if (is_object($cv_resume_portfolio_comment) && $cv_resume_portfolio_comment->user_id > 0) {
            $cv_resume_portfolio_user = get_userdata($cv_resume_portfolio_comment->user_id);
            $post = get_post($cv_resume_portfolio_comment->comment_post_ID);
            if (!empty($cv_resume_portfolio_user) && !empty($post)) {
                return $cv_resume_portfolio_comment->user_id === $post->post_author;
            }
        }
        return false;
    }

endif;

if( !function_exists('cv_resume_portfolio_breadcrumb') ) :

    /**
     * CV Resume Portfolio Breadcrumb
     */
    function cv_resume_portfolio_breadcrumb($cv_resume_portfolio_comment = null){

        echo '<div class="entry-breadcrumb">';
        cv_resume_portfolio_breadcrumb_trail();
        echo '</div>';

    }

endif;