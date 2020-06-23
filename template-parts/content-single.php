<?php

/**
 * Template part for displaying single post details page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package catix-mindful-joy-gulp
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post detail single'); ?>>
    <div class="post-header">
        <div class="container max-width-1200">
            <div class="row">
                <div class="col-lg-6 post-content-cover">
                    <?php echo catix_post_thumbnail(); ?>
                </div>
                <div class="col-lg-6">
                    <?php catix_single_category(); ?>
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    <i class="fas fa-tags"></i>
                    <?php // $tags = get_the_tags(); ?>

                    <?php
                    catix_posted_by();
                    ?>
                    <!-- 
                        
                        Author Info Small Block 
                        Tags
                        Date
                    -->

                </div>
            </div>
        </div>
    </div>
    <div class="post-content">
        <div class="container max-width-720">
            <div class="row">
                <div class="col-12">
                    <?php catix_posted_on(); ?>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="post-footer">
        <!-- share, comments, etc -->
    </div>
</article>