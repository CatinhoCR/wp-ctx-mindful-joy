<?php

/**
 * Blog Posts Layout for home page in full width each post and 1 per row
 */
// echo '<pre>', var_dump($post) , '</pre>';
?>
<div class="col-12 post">
    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post list single'); ?>>
        <div class="post-cover">
            <?php catix_post_thumbnail(); ?>
        </div>
        <div class="post-info">
            <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
            <div>
                <?php the_excerpt(); ?>
                <?php
                catix_posted_by();
                catix_posted_on();
                catix_single_category();
                ?>
                <a href="<?php esc_url(get_permalink()); ?>" rel="bookmark">Leer más</a>
            </div>
        </div>
    </article>
</div>