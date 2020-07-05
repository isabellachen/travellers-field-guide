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
        <div class="container top-bar_content">
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
        <img class="hero-image" src="<?php echo get_template_directory_uri(); ?>/assets/montenegro.png">
        <div class="hero-content">
          <!-- Subtitle: display the country category for the current post, e.g. "Iceland" -->
          <?php
          if (is_single()) : ?>
            <?php
            $post_id = get_the_ID();
            $post_tags = get_the_tags($post_id);
            echo $post_tags[0]->name
            ?>
            <div class="hero-subtitle"><?php echo $post_tags->name ?></div>
          <?php endif; ?>

          <div class="hero-title">
            <?php if (is_front_page()) : ?>
              <h1 class="hero-title">A Traveller's Field Guide</h1>
            <?php else : ?>
              <?php
              $category = get_queried_object();
              $cat_name = get_cat_name($category->term_id);
              ?>
              <h1 class="hero-title"><?php echo is_category() ? $cat_name : the_title() ?></h1>
            <?php endif; ?>
          </div>

          <!-- Excerpt: display excerpt depending if front page, category page or single post page -->
          <div class="hero-excerpt">
            <?php if (is_front_page()) : ?>
              <p><?php echo get_bloginfo('description') ?></p>
            <?php else : ?>
              <div class="hero-subtitle"><?php echo is_category() ? category_description() : the_excerpt() ?></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </header><!-- #masthead -->