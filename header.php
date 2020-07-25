<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travellers-field-guide
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'travellers-field-guide'); ?></a>

    <header id="masthead" class="header">
      <div class="top-bar">
        <div class="top-bar_content">
          <div class="site-branding">
            <?php the_custom_logo() ?>
          </div>
          <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
              <div class="bar1"></div>
              <div class="bar2"></div>
              <div class="bar3"></div>
            </button>
            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'top-bar',
                'menu_id'        => 'primary-menu',
              )
            );
            ?>
          </nav><!-- #site-navigation -->
        </div><!-- container -->
      </div><!-- top-bar -->
      <div class="hero">
        <div class="hero-menu-darken"></div>
        <?php if (is_front_page() || is_404() || is_search()) : ?>
          <?php
          $hero_posts = get_posts(array(
            'meta_query' => array(
              array(
                'key'   => 'home_hero',
                'value' => '1',
              )
            )
          ));
          $rand = rand(0, count($hero_posts) - 1);
          $post_id = $hero_posts[$rand]->ID;
          $featured_img_url = get_the_post_thumbnail_url($post_id);
          wp_reset_postdata()
          ?>
          <img class="hero-image" src="<?php echo $featured_img_url ?>">
        <?php elseif (is_single() || is_page() && has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('post-thumbnail', ['class' => "hero-image"]); ?>
        <?php elseif (is_category() || is_tag()) : ?>
          <?php
          $term = get_queried_object();
          $hero_tax_image = get_field('image', $term);
          if ($hero_tax_image) {
            echo wp_get_attachment_image($hero_tax_image, 'full', "", array("class" => "hero-image"));
          }; ?>
        <?php endif; ?>
        <div class="hero-content <?php echo is_front_page() ? "hero-content--centered" : "" ?>">
          <div class="hero-title-wrapper container">
            <?php if (is_front_page()) : ?>
              <h1 class="hero-title hero-title--lg">A Traveller's Field Guide</h1>
            <?php endif; ?>
          </div> <!-- .hero-title -->

          <!-- Excerpt: display excerpt depending if front page, category page or single post page -->
          <div class="hero-excerpt-wrapper">
            <?php if (is_front_page()) : ?>
              <?php echo get_bloginfo('description') ?>
            <?php endif; ?>
          </div><!-- .hero-excerpt -->

        </div>
      </div>
    </header><!-- #masthead -->