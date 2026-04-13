<?php
/**
 * Custom page walker for this theme.
 *
 * @package CV Resume Portfolio
 */

if (!class_exists('CV_Resume_Portfolio_Walker_Page')) {
    /**
     * CUSTOM PAGE WALKER
     * A custom walker for pages.
     */
    class CV_Resume_Portfolio_Walker_Page extends Walker_Page
    {

        /**
         * Outputs the beginning of the current element in the tree.
         *
         * @param string $cv_resume_portfolio_output Used to append additional content. Passed by reference.
         * @param WP_Post $page Page data object.
         * @param int $cv_resume_portfolio_depth Optional. Depth of page. Used for padding. Default 0.
         * @param array $cv_resume_portfolio_args Optional. Array of arguments. Default empty array.
         * @param int $current_page Optional. Page ID. Default 0.
         * @since 2.1.0
         *
         * @see Walker::start_el()
         */

        public function start_lvl( &$cv_resume_portfolio_output, $cv_resume_portfolio_depth = 0, $cv_resume_portfolio_args = array() ) {
            $cv_resume_portfolio_indent  = str_repeat( "\t", $cv_resume_portfolio_depth );
            $cv_resume_portfolio_output .= "$cv_resume_portfolio_indent<ul class='sub-menu'>\n";
        }

        public function start_el(&$cv_resume_portfolio_output, $page, $cv_resume_portfolio_depth = 0, $cv_resume_portfolio_args = array(), $current_page = 0)
        {

            if (isset($cv_resume_portfolio_args['item_spacing']) && 'preserve' === $cv_resume_portfolio_args['item_spacing']) {
                $t = "\t";
                $n = "\n";
            } else {
                $t = '';
                $n = '';
            }
            if ($cv_resume_portfolio_depth) {
                $cv_resume_portfolio_indent = str_repeat($t, $cv_resume_portfolio_depth);
            } else {
                $cv_resume_portfolio_indent = '';
            }

            $cv_resume_portfolio_css_class = array('page_item', 'page-item-' . $page->ID);

            if (isset($cv_resume_portfolio_args['pages_with_children'][$page->ID])) {
                $cv_resume_portfolio_css_class[] = 'page_item_has_children';
            }

            if (!empty($current_page)) {
                $_current_page = get_post($current_page);
                if ($_current_page && in_array($page->ID, $_current_page->ancestors, true)) {
                    $cv_resume_portfolio_css_class[] = 'current_page_ancestor';
                }
                if ($page->ID === $current_page) {
                    $cv_resume_portfolio_css_class[] = 'current_page_item';
                } elseif ($_current_page && $page->ID === $_current_page->post_parent) {
                    $cv_resume_portfolio_css_class[] = 'current_page_parent';
                }
            } elseif (get_option('page_for_posts') === $page->ID) {
                $cv_resume_portfolio_css_class[] = 'current_page_parent';
            }

            /** This filter is documented in wp-includes/class-walker-page.php */
            $cv_resume_portfolio_css_classes = implode(' ', apply_filters('page_css_class', $cv_resume_portfolio_css_class, $page, $cv_resume_portfolio_depth, $cv_resume_portfolio_args, $current_page));
            $cv_resume_portfolio_css_classes = $cv_resume_portfolio_css_classes ? ' class="' . esc_attr($cv_resume_portfolio_css_classes) . '"' : '';

            if ('' === $page->post_title) {
                /* translators: %d: ID of a post. */
                $page->post_title = sprintf(__('#%d (no title)', 'cv-resume-portfolio'), $page->ID);
            }

            $cv_resume_portfolio_args['link_before'] = empty($cv_resume_portfolio_args['link_before']) ? '' : $cv_resume_portfolio_args['link_before'];
            $cv_resume_portfolio_args['link_after'] = empty($cv_resume_portfolio_args['link_after']) ? '' : $cv_resume_portfolio_args['link_after'];

            $cv_resume_portfolio_atts = array();
            $cv_resume_portfolio_atts['href'] = get_permalink($page->ID);
            $cv_resume_portfolio_atts['aria-current'] = ($page->ID === $current_page) ? 'page' : '';

            /** This filter is documented in wp-includes/class-walker-page.php */
            $cv_resume_portfolio_atts = apply_filters('page_menu_link_attributes', $cv_resume_portfolio_atts, $page, $cv_resume_portfolio_depth, $cv_resume_portfolio_args, $current_page);

            $cv_resume_portfolio_attributes = '';
            foreach ($cv_resume_portfolio_atts as $attr => $cv_resume_portfolio_value) {
                if (!empty($cv_resume_portfolio_value)) {
                    $cv_resume_portfolio_value = ('href' === $attr) ? esc_url($cv_resume_portfolio_value) : esc_attr($cv_resume_portfolio_value);
                    $cv_resume_portfolio_attributes .= ' ' . $attr . '="' . $cv_resume_portfolio_value . '"';
                }
            }

            $cv_resume_portfolio_args['list_item_before'] = '';
            $cv_resume_portfolio_args['list_item_after'] = '';
            $cv_resume_portfolio_args['icon_rennder'] = '';
            // Wrap the link in a div and append a sub menu toggle.
            if (isset($cv_resume_portfolio_args['show_toggles']) && true === $cv_resume_portfolio_args['show_toggles']) {
                // Wrap the menu item link contents in a div, used for positioning.
                $cv_resume_portfolio_args['list_item_after'] = '';
            }


            // Add icons to menu items with children.
            if (isset($cv_resume_portfolio_args['show_sub_menu_icons']) && true === $cv_resume_portfolio_args['show_sub_menu_icons']) {
                if (isset($cv_resume_portfolio_args['pages_with_children'][$page->ID])) {
                    $cv_resume_portfolio_args['icon_rennder'] = '';
                }
            }

            // Add icons to menu items with children.
            if (isset($cv_resume_portfolio_args['show_toggles']) && true === $cv_resume_portfolio_args['show_toggles']) {
                if (isset($cv_resume_portfolio_args['pages_with_children'][$page->ID])) {

                    $toggle_target_string = '.page_item.page-item-' . $page->ID . ' > .sub-menu';

                    $cv_resume_portfolio_args['list_item_after'] = '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . __( 'Show sub menu', 'cv-resume-portfolio' ) . '</span>' . cv_resume_portfolio_get_theme_svg( 'chevron-down' ) . '</span></button>';
                }
            }

            if (isset($cv_resume_portfolio_args['show_toggles']) && true === $cv_resume_portfolio_args['show_toggles']) {

                $cv_resume_portfolio_output .= $cv_resume_portfolio_indent . sprintf(
                        '<li%s>%s%s<a%s>%s%s%s</a>%s%s',
                        $cv_resume_portfolio_css_classes,
                        '<div class="submenu-wrapper">',
                        $cv_resume_portfolio_args['list_item_before'],
                        $cv_resume_portfolio_attributes,
                        $cv_resume_portfolio_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $cv_resume_portfolio_args['link_after'],
                        $cv_resume_portfolio_args['list_item_after'],
                        '</div>'
                    );

            }else{

                $cv_resume_portfolio_output .= $cv_resume_portfolio_indent . sprintf(
                        '<li%s>%s<a%s>%s%s%s%s</a>%s',
                        $cv_resume_portfolio_css_classes,
                        $cv_resume_portfolio_args['list_item_before'],
                        $cv_resume_portfolio_attributes,
                        $cv_resume_portfolio_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $cv_resume_portfolio_args['icon_rennder'],
                        $cv_resume_portfolio_args['link_after'],
                        $cv_resume_portfolio_args['list_item_after']
                    );

            }

            if (!empty($cv_resume_portfolio_args['show_date'])) {
                if ('modified' === $cv_resume_portfolio_args['show_date']) {
                    $cv_resume_portfolio_time = $page->post_modified;
                } else {
                    $cv_resume_portfolio_time = $page->post_date;
                }

                $cv_resume_portfolio_date_format = empty($cv_resume_portfolio_args['date_format']) ? '' : $cv_resume_portfolio_args['date_format'];
                $cv_resume_portfolio_output .= ' ' . mysql2date($cv_resume_portfolio_date_format, $cv_resume_portfolio_time);
            }
        }
    }
}