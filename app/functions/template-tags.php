<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package catix-mindful-joy-gulp
 */

if (!function_exists('catix_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function catix_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
            // <time class="updated" datetime="%3$s">%4$s</time> inside time_string
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date())
            // ,
            // esc_attr(get_the_modified_date(DATE_W3C)),
            // esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            /* translators: %s: post date. */
            esc_html_x('%s', 'post date', 'catix'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
endif;

if (!function_exists('catix_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function catix_posted_by()
    {
        $post_author = get_field('post_author');
        $author_link = get_permalink($post_author->ID);
        // $author_img = catix_post_thumbnail();
        // get_the_post_thumbnail($post_author->ID);
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x('%s', 'post author', 'catix'),
            '<a class="post-author author-info" href="' . esc_url(get_permalink()) . '">' . get_the_post_thumbnail( $post_author->ID ) . esc_html( $post_author->post_title) . '</a>'
        );
        echo $byline;
        // echo esc_html( $post_author->post_title);
        // echo esc_url(( $author_img ));
        /*
        $byline = sprintf(
            /* translators: %s: post author. * /
            esc_html_x('by %s', 'post author', 'catix'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        */
    }
endif;

if (!function_exists('catix_single_category')) :
    /**
     * Category
     */
    function catix_single_category()
    {
        $category = get_the_category();
        
        if( !empty( $category )) {
            $cat_link = get_category_link( $category[0]->term_id );
            $cat_name = $category[0]->name;
            $catline = sprintf(
                esc_html_x( '%s', 'post category', 'catix' ),
                '<a class="post-category" href="' . esc_url($cat_link) . '">' . esc_html($cat_name) . '</a>'
            );
            echo $catline;
            // echo '<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">' . esc_html( $category[0]->name ) . '</a>';
        }
    }
endif;


if (!function_exists('catix_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function catix_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'catix'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'catix') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'catix'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'catix') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'catix'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                )
            );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'catix'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

if ( ! function_exists( 'catix_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function catix_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

// Register Custom pagination
if (!function_exists('catix_pagination')) :
    function catix_pagination($pages = '', $range = 4)
    {
        $showitems = ($range * 2) + 1;
        global $paged;
        if (empty($paged)) $paged = 1;
        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }
        if (1 != $pages) {
            echo "<nav aria-label='Page navigation example'>  <ul class='pagination'> <span>Page " . $paged . " of " . $pages . "</span>";
            if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link(1) . "'>&laquo; First</a>";
            if ($paged > 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; Previous</a>";
            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                    echo ($paged == $i) ? "<li class=\"page-item active\"><a class='page-link'>" . $i . "</a></li>" : "<li class='page-item'> <a href='" . get_pagenum_link($i) . "' class=\"page-link\">" . $i . "</a></li>";
                }
            }
            if ($paged < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href=\"" . get_pagenum_link($paged + 1) . "\">i class='flaticon flaticon-back'></i></a></li>";
            if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href='" . get_pagenum_link($pages) . "'><i class='flaticon flaticon-arrow'></i></a></li>";
            echo "</ul></nav>\n";
        }
    }
endif;
