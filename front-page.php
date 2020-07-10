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

<main id="primary" class="frontpage site-main container">
  <?php while (have_posts()) :
    the_post(); ?>
    <div class="frontpage-intro-wrapper">
      <!-- Who We Are -->
      <h2 class="heading page-h2">Who We Are</h2>
      <div class="frontpage-intro">
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
        ?>
      </div><!-- .frontpage-intro -->
    </div><!-- .frontpage-intro-wrapper -->
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
      <div class="frontpage-featured-title heading page-h2">Featured Stories</div>
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
      <div class="frontpage-posts-title heading page-h2">Travel Diaries</div>
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
          $wp_query = new WP_Query('posts_per_page=12&paged=' . $paged);
          if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
              <?php
              $post_country = get_the_tags()[0]->name; //name of country
              ?>
              <div class="tile-single shrink-on-hover mb-1_5">
                <a href="<?php echo the_permalink() ?>">
                  <div class="tile-content-wrapper">
                    <div class="tile-content">
                      <h3 class="tile-content-subheading subheading"><?php echo $post_country ?></h3>
                      <h3 class="tile-content-title heading page-h3"><?php the_title() ?></h3>
                    </div>
                  </div>
                  <?php
                  if (has_post_thumbnail()) {
                    echo the_post_thumbnail('post-thumbnail', ['class' => 'tile-image']);
                  }
                  ?>
                </a>
              </div>
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
  <?php endwhile; ?>
  <!-- end loop -->
</main><!-- #main -->

<?php
get_footer();
