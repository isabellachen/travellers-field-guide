<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travellers-field-guide
 */

get_header();
?>

<main id="primary" class="site-main frontpage  container">
  <?php
  get_template_part('template-parts/content', 'lead'); ?>
  <div class="frontpage-featured-wrapper">
    <?php
    $featured_stories = get_posts(array(
      'meta_query' => array(
        array(
          'key'   => 'home_featured',
          'value' => '1',
        )
      )
    ));
    ?>
    <h2 class="frontpage-featured-title heading page-h2">Featured Stories</h2>
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

  <div class="frontpage-posts-wrapper">
    <h2 class="frontpage-posts-title heading page-h2">Travel Diaries</h2>
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
        $temp = $wp_query;
        $wp_query = null;
        $args = array(
          "category_name" => 'destinations',
          'posts_per_page' => 12,
          'paged' => $paged,
        );
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) :
          while ($wp_query->have_posts()) : $wp_query->the_post();
            set_query_var('is_front_page', true);
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
        endif;
    ?>
    </div>
  </div><!-- .frontpage-featured-wrapper -->
</main><!-- #main -->

<?php
get_footer();
