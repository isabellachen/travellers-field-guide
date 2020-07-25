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
        <img src="<?php bloginfo('template_url'); ?>/assets/icons/arrow.svg">
      </div>
    </div>
  </div>
  <?php
  while (have_posts()) :
    the_post();
    $post_category = get_the_category();
    $post_category_link = get_category_link($post_category[0]->term_id);
    $the_tag = get_the_tags()[0];
    $post_tag_slug = $the_tag->slug;
    $post_page_parent = $the_tag->name;
    $current_post_id = get_the_ID();
    get_template_part('template-parts/content', 'post');
  ?>
  <?php endwhile; ?>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
