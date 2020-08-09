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
    <!-- Subtitle: display the country category for the current post, e.g. "Iceland" -->
    <div class="entry-header-subtitle container">
      <?php
      $queried_object = get_queried_object();
      $post_id = get_the_ID();
      $post_tags = get_the_tags($post_id);
      $post_tag_single = $post_tags[0]->name;
      $post_category = get_category_by_slug($post_tag_single);
      $post_cateogory_ID = $post_category->cat_ID;
      $post_category_url = get_category_link($post_cateogory_ID);
      $long_excerpt = get_field('long_excerpt', $queried_object);
      ?>
      <a href="<?php echo $post_category_url ?>"><?php echo $post_tag_single ?></a>
    </div>
    <div class="entry-header-title-wrapper">
      <h1 class="entry-header-title"><?php the_title() ?></h1>
    </div>
    <div class="entry-header-excerpt-wrapper">
      <div class="entry-header-excerpt entry-header-excerpt--mobile"><?php echo $long_excerpt != null ? $long_excerpt : the_excerpt() ?></div>
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