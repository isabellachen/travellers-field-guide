<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package travellers-field-guide
 */

get_header();
?>

<main id="primary" class="error-404 site-main container">

  <section class="not-found">

    <header class="entry-header container-inner">
      <div class="entry-header-subtitle">404</div>
      <div class="entry-header-title-wrapper">
        <h1 class="entry-header-title">Oops! Looks like you are lost.</h1>
      </div>
      <div class="entry-header-excerpt-wrapper">
        <div class="entry-header-excerpt--mobile text-align-center">But sometimes, getting lost can lead to unexpected adventures</div>
      </div>
    </header><!-- .entry-header -->

    <div class="page-content margin-auto">
      <div class="container-inner page-content-search"><?php get_search_form(); ?></div>
      <div class="frontpage-posts-wrapper">
        <h2 class="frontpage-posts-title heading page-h2">Explore Out Latest Posts</h2>
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
