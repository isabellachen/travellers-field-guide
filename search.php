<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package travellers-field-guide
 */

get_header();
?>


<main id="primary" class="site-main container">

  <header class="entry-header container-inner">
    <div class="entry-header-subtitle container-innermost">
      <?php echo have_posts() ? "Search Results For:" : "No Results For:" ?>
    </div>
    <div class="entry-header-title-wrapper">
      <h1 class="entry-header-title">
        <?php echo get_search_query() ?>
      </h1>
  </header><!-- .page-header -->
  <div class="page-content margin-auto">
    <div class="container-inner margin-auto"><?php get_search_form(); ?></div>
    <?php if (have_posts()) : ?>
      <div class="frontpage-posts-wrapper">
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
            while (have_posts()) :
              the_post();
              get_template_part('template-parts/content', 'post_tiles');
            endwhile; ?>

          </div>
          <nav class="pagination-wrapper">
            <?php tfg_pagination(); ?>
          </nav>
        </div>
      </div>
    <?php endif; ?>
  </div>
</main><!-- #main -->


<?php
get_sidebar();
get_footer();
