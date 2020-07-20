<?php

/**
 * Template Name: Page Grid
 * Selectable template for pages that need a title and a related post grid
 * Created for parent pages like the 'Destinations' page
 */

get_header();
?>

<main id="primary" class="error-404 site-main container">

  <section class="not-found">

    <?php get_template_part('template-parts/content', 'lead'); ?>

    <div class="page-content margin-auto">
      <div class="container-inner margin-auto"><?php get_search_form(); ?></div>
      <div class="frontpage-posts-wrapper">
        <h2 class="frontpage-posts-title heading page-h2">Dive into <?php the_title() ?></h2>
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
            $page_slug = $post->post_name;
            $args = array(
              "category_name" => $page_slug,
              'posts_per_page' => 12,
              'paged' => $paged,
            );
            $wp_query = new WP_Query($args);
            if ($wp_query->have_posts()) :
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
            endif;
        ?>
        </div>
      </div><!-- .frontpage-featured-wrapper -->
    </div><!-- .page-content -->
  </section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
