<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package travellers-field-guide
 */

get_header();
?>

<main id="primary" class="site-main container">
  <div class="long-content-controls">
    <div class="back-to-top-button">
      <div class="back-to-top-button-inner">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/arrow.svg">
      </div>
    </div>
  </div>
  <?php
  while (have_posts()) :
    the_post();
    get_template_part('template-parts/content', get_post_type());
  ?>
  <?php endwhile; ?>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
