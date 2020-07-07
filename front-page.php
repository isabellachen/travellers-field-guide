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

<main id="primary" class="home site-main container">
  <?php while (have_posts()) :
    the_post(); ?>
    <div class="home-intro-wrapper">
      <!-- Who We Are -->
      <h2 class="heading home-h2">Who We Are</h2>
      <div class="home-intro">
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
      </div><!-- .home-intro -->
    </div><!-- .home-intro-wrapper -->
    <div class="home-featured-wrapper">
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
      <div class="home-featured-title heading home-h2">Featured Stories</div>
      <div class="home-featured">
        <?php
        if ($featured_stories) {
          for ($i = 0; $i < 3; $i++) {
            $post = $featured_stories[$i];
            $post_id = get_the_ID();
            $post_country = get_the_tags($post_id)[0]->name; //name of country
            $post_title = get_the_title();
            $post_excerpt = get_the_excerpt();
            $post_permalink = get_the_permalink();
            $featured_story_image = get_field('featured_story_image');
            if ($featured_story_image) : ?>
              <div class="home-featured-single shrink-on-hover">
                <a href="<?php echo $post_permalink ?>">
                  <div class="home-featured-content-wrapper">
                    <div class="home-featured-content">
                      <h3 class="home-featured-content-subheading subheading"><?php echo $post_country ?></h3>
                      <h3 class="home-featured-content-title heading home-h3"><?php echo $post_title ?></h3>
                      <p class="home-featured-content-paragraph"><?php echo $post_excerpt ?></p>
                    </div>
                  </div>
                  <?php echo wp_get_attachment_image($featured_story_image, 'full', "", array("class" => "home-featured-image")); ?>
                </a>
              </div>
            <?php endif; ?>
        <?php wp_reset_postdata();
          }
        }
        ?>
      </div>
    </div><!-- .home-featured-wrapper -->
  <?php endwhile; ?>
  <!-- end loop -->
</main><!-- #main -->

<?php
get_footer();
