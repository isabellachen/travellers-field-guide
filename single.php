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
    <div class="related-posts-button">
      <div class="related-posts-button-inner">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/location.svg">
      </div>
    </div>
    <div class="back-to-top-button">
      <div class="back-to-top-button-inner">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/arrow.svg">
      </div>
    </div>
  </div>
  <?php
  while (have_posts()) :
    the_post();
    $post_tags = get_the_tags();
    if ($post_tags) {
      $post_tag = $post_tags[0];
    }
    if (isset($post_tag)) {
      $post_category = get_category_by_slug($post_tag->slug);
      $post_category_ID = $post_category ? $post_category->cat_ID : false;
      $post_category_url = $post_category_ID ? get_category_link($post_category_ID) : '';
    }
    $current_post_id = get_the_ID();
    get_template_part('template-parts/content', get_post_type());
  ?>
  <?php endwhile; ?>
  <div id="relatedPosts" class="owl-carousel-wrapper">
    <div class="container position-relative">
      <div class="owl-carousel-close"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/close.svg"></div>
      <h2 class="owl-carousel-heading heading page-h2 border-bottom-none">Explore more stories from <a href="<?php echo $post_category_url ? $post_category_url : '' ?>"><?php echo isset($post_tag) ? $post_tag->name : ''  ?></a></h2>
      <div class="owl-carousel">
        <?php
        if (isset($post_tag)) {
          $the_query = new WP_Query(array('tag' => $post_tag->slug));
          while ($the_query->have_posts()) : $the_query->the_post() ?>
            <?php
            $carousel_item_id = get_the_ID();
            if ($current_post_id != $carousel_item_id) : ?>
              <a href="<?php echo the_permalink() ?>">
                <div class="owl-tile">
                  <?php
                  if (has_post_thumbnail()) {
                    echo the_post_thumbnail('small_square', ['class' => 'owl-tile-image']);
                  } ?>
                  <div class="owl-tile-content">
                    <h3 class="owl-tile-title tile-content-title heading page-h3"><?php the_title() ?></h3>
                  </div>
                </div>
              </a>
        <?php endif;
          endwhile;
          wp_reset_postdata();
        } ?>
      </div><!-- .owl-carousel -->
    </div><!-- .container -->
  </div><!-- .owl-carousel-wrapper -->
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
