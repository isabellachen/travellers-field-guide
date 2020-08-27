<?php

/**
 * Template Name: Page Parallax
 * Selectable template for pages that need a title and a related post grid
 * Created for parent pages like the 'Destinations' page
 */

get_header('scrolly');
?>

<main id="primary" class="site-main">
  <?php
  while (have_posts()) : the_post(); ?>
    <div class="entry-content dropcap">
      <?php
      the_content(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'travellers-field-guide'),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          wp_kses_post(get_the_title())
        )
      );

      wp_link_pages(
        array(
          'before' => '<div class="page-links">' . esc_html__('Pages:', 'travellers-field-guide'),
          'after'  => '</div>',
        )
      );
      ?>
    </div><!-- .entry-content -->
  <?php endwhile; ?>
</main><!-- #main -->

<?php
get_footer();
