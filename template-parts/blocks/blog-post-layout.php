<?php

/**
 * Blog Posts Layout for home page in full width each post and 1 per row
 */
// echo '<pre>', var_dump($post) , '</pre>';
?>
<div class="col-12 post post-item">
    <div>
        <h2><?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?></h2>
        <?php
        catix_posted_by();
        catix_posted_on();
        catix_single_category();
        ?>
        <?php the_excerpt(); ?>
        <a href="<?php esc_url(get_permalink()); ?>" rel="bookmark">Leer más</a>
    </div>
    <div>
        <?php catix_post_thumbnail(); ?>
    </div>
</div>