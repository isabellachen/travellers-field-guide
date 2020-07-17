<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hello
 */

get_header();
?>

<main id="primary" class="attachment-page">
  <div class="container">
    <?php while (have_posts()) :
      the_post();
      echo wp_get_attachment_image(get_the_ID(), 'full');

    endwhile; ?>
  </div>

  <?php get_footer(); ?>
</main><!-- #main -->
<?php
