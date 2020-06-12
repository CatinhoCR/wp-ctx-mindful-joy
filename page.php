<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package catix-mindful-joy-gulp
 */

get_header();
?>

	<?php 
		/**
		 * catix_before_main_content hook
		 *
		 * @hooked themename_wrapper_start - 10 (outputs opening divs for the content)
		 */
		do_action( 'catix_before_main_content' );
	 ?>
	<div class="content-area">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div>
	<?php if ( catix_is_has_sidebar() ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>
	<?php 
		/**
		 * catix_after_main_content hook
		 *
		 * @hooked themename_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'catix_after_main_content' );
	 ?><!-- #main -->

<?php
// get_sidebar();
get_footer();
