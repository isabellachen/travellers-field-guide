<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travellers-field-guide
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <!-- Subtitle: display the country category for the current post, e.g. "Iceland" -->
    <div class="entry-header-subtitle container">
      <?php
      $post_id = get_the_ID();
      $post_tags = get_the_tags($post_id);
      echo $post_tags[0]->name
      ?>
    </div>
    <div class="entry-header-title-wrapper">
      <h1 class="entry-header-title"><?php the_title() ?></h1>
    </div>
    <div class="entry-header-excerpt-wrapper">
      <div class="entry-header-excerpt entry-header-excerpt--mobile"><?php echo the_excerpt() ?></div>
    </div>
  </header><!-- .entry-header -->

  <div class="entry-content">
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
</article><!-- #post-<?php the_ID(); ?> -->