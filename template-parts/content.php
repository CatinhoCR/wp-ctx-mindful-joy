<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package catix-mindful-joy-gulp
 */

?>

<div class="col-lg-4 col-md-6 ">
	<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post-list single'); ?>>
		<div class="post-content-cover">
			<?php echo catix_post_thumbnail(); ?>
		</div>
		<div class="post-content">
			<?php catix_single_category(); // the_category(); ?>
			<?php
			if (is_singular()) :
				the_title('<h1 class="entry-title">', '</h1>');
			else :
				the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
			endif;

			if ('post' === get_post_type()) :
			?>

			<?php endif; ?>
			<?php the_excerpt(); ?>
		</div>
		<div class="post-author-info entry-meta post-meta">
			<?php
			catix_posted_by();
			catix_posted_on();
			?>

		</div>
	</article>
</div>
<!--
<article >
	<header class="entry-header">
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()) :
		?>
			<div class="entry-meta">
				<?php
				catix_posted_on();
				catix_posted_by();
				?>
			</div><!-- .entry-meta - - >
		<?php endif; ?>
	</header><!-- .entry-header - - >

	<?php catix_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_excerpt();
		// the_content(
		// 	sprintf(
		// 		wp_kses(
		// 			/* translators: %s: Name of current post. Only visible to screen readers */
		// 			__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'catix'),
		// 			array(
		// 				'span' => array(
		// 					'class' => array(),
		// 				),
		// 			)
		// 		),
		// 		wp_kses_post(get_the_title())
		// 	)
		// );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'catix'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content - - >

	<footer class="entry-footer">
		<?php catix_entry_footer(); ?>
	</footer><!-- .entry-footer - - >
</article><!-- #post-<?php the_ID(); ?> 
	-->