<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travellers-field-guide
 */

get_header();
?>

<main id="primary" class="site-main container">
  <?php
  $queried_object = get_queried_object();
  $taxonomy_slug = $queried_object->slug;
  $taxonomy_name = $queried_object->name;

  // Check if a category is a destination
  $category_parent_ids = get_ancestors($queried_object->term_id, 'category');

  $num_cats = count($category_parent_ids);
  $highest_ancestor = $num_cats > 0 ? $category_parent_ids[$num_cats - 1] : null;
  $highest_ancestor_slug = $highest_ancestor != null ? get_category($highest_ancestor)->slug : null;
  $is_destination = $highest_ancestor_slug != null && $highest_ancestor_slug == 'destinations' ? true : false;

  $has_featured_stories = get_field('has_featured_stories', $queried_object);
  $categories = get_the_category();

  $category_lead = get_field('category_lead', $queried_object);
  if (!empty($category_lead)) {
    set_query_var('category_lead', $category_lead);
    get_template_part('template-parts/content', 'archive_lead');
  }

  if ($has_featured_stories) :
  ?>
    <div class="frontpage-featured-wrapper">
      <?php
      $featured_stories = get_posts(array(
        'category_name' => $taxonomy_slug,
        'meta_query' => array(
          array(
            'key'   => 'page_featured',
            'value' => '1',
          )
        )
      ));
      if (count($featured_stories) > 0) : ?>
        <div class="frontpage-featured-title heading page-h2">Featured
          <?php if ($is_destination) : ?>
            Stories From
          <?php endif;
          echo $taxonomy_name ?>
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
      <?php endif; ?>
    </div><!-- .frontpage-featured-wrapper -->
  <?php endif; ?>

  <div class="frontpage-posts-wrapper">
    <h2 class="frontpage-posts-title heading page-h2">
      <?php
      if (is_tag()) {
        echo 'Tag: ';
      }
      echo $taxonomy_name;
      if ($is_destination) {
        echo ' Travel Diaries';
      } ?>
    </h2>
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
    </div>
  </div><!-- .frontpage-posts-wrapper -->
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
