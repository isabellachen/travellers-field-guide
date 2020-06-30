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
        <div class="site-branding"></div>
        <nav id="site-navigation" class="main-navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'travellers-field-guide'); ?></button>
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'top-bar',
              'menu_id'        => 'primary-menu',
            )
          );
          ?>
        </nav><!-- #site-navigation -->
      </div>
      <div class="hero">
        <?php
        if (is_category()) : ?>
          <?php
          $category = get_queried_object();
          $cat_name = get_cat_name($category->term_id);
          ?>
          <div class="hero-subtitle"><?php echo $cat_name ?></div>
        <?php endif; ?>
        <?php
        if (is_single()) : ?>
          <?php
          $post_id = get_the_ID();
          $post_tags = get_the_tags($post_id);
          echo $post_tags[0]->name
          ?>
          <div class="hero-subtitle"><?php echo $post_tags->name ?></div>
        <?php endif; ?>


        <div class="hero-title"></div>
        <div class="hero-excerpt">
          <?php if (is_front_page()) : ?>
            <p><?php echo get_bloginfo('description') ?></p>
          <?php else : ?>
            <div class="hero-subtitle"><?php echo is_category() ? category_description() : the_excerpt() ?></div>
          <?php endif; ?>
        </div>
      </div>
    </header><!-- #masthead -->