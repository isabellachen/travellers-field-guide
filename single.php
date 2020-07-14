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

<main id="primary" class="site-main single container">

  <?php
  while (have_posts()) :
    the_post();
    $post_country = get_the_tags()[0]->name; //name of country
    get_template_part('template-parts/content', get_post_type());
    // the_post_navigation(
    //   array(
    //     'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'travellers-field-guide') . '</span> <span class="nav-title">%title</span>',
    //     'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'travellers-field-guide') . '</span> <span class="nav-title">%title</span>',
    //   )
    // );
  ?>
  <?php endwhile; ?>

  <div class="owl-carousel">
    <?php
    $the_query = new WP_Query(array('tag' => $post_country));
    while ($the_query->have_posts()) : $the_query->the_post() ?>
      <?php
      if (has_post_thumbnail()) {
        echo the_post_thumbnail('post-thumbnail', ['class' => 'owl-tile']);
      }
      ?>
    <?php endwhile;
    wp_reset_postdata();
    ?>
  </div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
