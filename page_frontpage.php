<?php

/**
 * Template Name: Frontpage Template
 * Selectable template for all pages that want to use the Front Page template
 */

get_header();
?>

<main id="primary" class="site-main frontpage container">
  <?php get_template_part('template-parts/content', 'lead'); ?>
  <div class="frontpage-featured-wrapper">
    <?php
    $is_regular_page = get_field('regular_page');
    $is_country_page = !$is_regular_page;
    $post_tag_slug = $post->post_name;
    $featured_stories = get_posts(array(
      'category_name' => $post_tag_slug,
      'meta_query' => array(
        array(
          'key'   => 'page_featured',
          'value' => '1',
        )
      )
    ));
    ?>
    <div class="frontpage-featured-title heading page-h2">Featured
      <?php if ($is_country_page) : ?>
        Stories From
      <?php endif;
      the_title() ?>
    </div>
    <div class="frontpage-featured">
      <?php
      if ($featured_stories) {
        for ($i = 0; $i < 3; $i++) {
          $post = $featured_stories[$i];
          get_template_part('template-parts/content', 'featured');
          wp_reset_postdata();
        }
      }
      ?>
    </div>
  </div><!-- .frontpage-featured-wrapper -->

  <?php
  $temp = $wp_query;
  $wp_query = null;
  $args = array(
    'category_name' => $post_tag_slug,
    'posts_per_page' => 12,
    'paged' => $paged,
  );
  $wp_query = new WP_Query($args);
  $post_count = $wp_query->found_posts;
  if (
    $wp_query->have_posts() &&
    $post_count > 3
  ) : ?>
    <div class="frontpage-posts-wrapper">
      <div class="frontpage-posts-title heading page-h2">
        <?php
        the_title();
        if ($is_country_page) {
          echo ' Travel Diaries';
        } ?>
      </div>
      <div class="frontpage-posts">
        <div class="frontpage-posts-inner">
          <?php
          if (get_query_var('paged')) {
            $paged = get_query_var('paged');
          } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
          } else {
            $paged = 1;
          }

          while ($wp_query->have_posts()) : $wp_query->the_post();
            get_template_part('template-parts/content', 'post_tiles'); ?>
          <?php endwhile; ?>
        </div>
        <nav class="pagination-wrapper">
          <?php tfg_pagination(); ?>
        </nav>
        <?php
        $wp_query = null;
        $wp_query = $temp;
        wp_reset_postdata();
        ?>
      </div>
    </div><!-- .frontpage-featured-wrapper -->
  <?php endif; ?>
  <!-- end loop -->
</main><!-- #main -->

<?php
get_footer();
