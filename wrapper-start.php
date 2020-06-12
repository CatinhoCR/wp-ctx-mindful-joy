<?php

/**
 * General Site Content Wrappers opening
 *
 * @author 		CATO
 * @version     1.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<main class="main-content <?php catix_wrapper_class_handles(); ?>">
  <div class="container">
    <?php if (catix_is_has_sidebar()) : ?>
    <div class="row">
      <?php endif; ?>