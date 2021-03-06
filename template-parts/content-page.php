<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travellers-field-guide
 */

?>

<article id="post-<?php the_ID(); ?> single-post" <?php post_class(); ?>>
  <header class="entry-header">
    <div class="entry-header-title-wrapper">
      <h1 class="entry-header-title"><?php the_title() ?></h1>
    </div>
    <div class="entry-header-excerpt-wrapper">
      <div class="entry-header-excerpt entry-header-excerpt--mobile"><?php echo the_excerpt() ?></div>
    </div>
  </header><!-- .entry-header -->

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
  <div class="related-posts-marker"></div>
</article><!-- #post-<?php the_ID(); ?> -->