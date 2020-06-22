<?php

?>
<div>
    <h3><?php echo __('Autor', 'catix'); ?></h3>
    <?php $post_author = get_field('book_author'); ?>
    <?php // var_dump($post_author); ?>
    <?php get_the_post_thumbnail( $post_author->ID ); ?>
    <?php echo $post_author->post_title; ?>
</div>