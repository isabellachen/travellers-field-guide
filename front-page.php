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

<main id="primary" class="homepage site-main container">
  <?php while (have_posts()) :
    the_post(); ?>
    <div class="homepage-intro-wrapper">
      <!-- Who We Are -->
      <h2 class="heading home-h2">Who We Are</h2>
      <div class="homepage-intro">
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
      </div><!-- .homepage-intro -->
    </div><!-- .homepage-intro-wrapper -->
    <div class="homepage-featured-wrapper">
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
      <div class="homepage-featured-title heading home-h2">Featured Stories</div>
      <div class="homepage-featured-tiles">
        <?php
        if ($featured_stories) {
          for ($i = 0; $i < 3; $i++) {
            $post = $featured_stories[$i];
            $featured_story_image = get_field('featured_story_image');
            if (!empty($featured_story_image)) : ?>
              <img src="<?php echo esc_url($featured_story_image['url']); ?>" alt="<?php echo esc_attr($featured_story_image['alt']); ?>" />
            <?php endif; ?>
        <?php wp_reset_postdata();
          }
        }
        ?>
      </div>
    </div><!-- .homepage-featured-wrapper -->
  <?php endwhile; ?>
  <!-- end loop -->
</main><!-- #main -->

<?php
get_footer();
