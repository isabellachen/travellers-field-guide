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
  <div class="long-content-controls long-content-controls--show">
    <div class="related-posts-icon"><img src="<?php bloginfo('template_url'); ?>/assets/icons/hamburger.svg"></div>
    <div class="back-to-top-icon"><img src="<?php bloginfo('template_url'); ?>/assets/icons/arrow.svg"></div>
  </div>
  <?php
  while (have_posts()) :
    the_post();
    $the_tag = get_the_tags()[0];
    $post_tag_slug = $the_tag->slug;
    $post_page_parent = $the_tag->name;
    $current_post_id = get_the_ID();
    get_template_part('template-parts/content', get_post_type());
  ?>
  <?php endwhile; ?>
  <div class="owl-carousel-wrapper">
    <h2 class="heading page-h2 text-align-center mb-1 border-bottom-none">Explore more stories from <?php echo $post_page_parent ?></h2>
    <div class="owl-carousel">
      <?php
      $the_query = new WP_Query(array('tag' => $post_tag_slug));
      while ($the_query->have_posts()) : $the_query->the_post() ?>
        <?php
        $carousel_item_id = get_the_ID();
        if ($current_post_id != $carousel_item_id) : ?>
          <a href="<?php echo the_permalink() ?>">
            <div class="owl-tile">
              <?php
              if (has_post_thumbnail()) {
                echo the_post_thumbnail('post-thumbnail', ['class' => 'owl-tile-image']);
              } ?>
              <div class="owl-tile-content">
                <h3 class="owl-tile-title tile-content-title heading page-h3"><?php the_title() ?></h3>
              </div>
            </div>
          </a>
      <?php endif;
      endwhile;
      wp_reset_postdata();
      ?>
    </div><!-- .owl-carousel -->
  </div><!-- .owl-carousel-wrapper -->
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
