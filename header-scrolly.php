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
  <!-- <link rel="stylesheet" id="googlefont_css-css" href="https://fonts.googleapis.com/css2?family=Alata&family=Lato:wght@300;400;700;900&display=swap" media="all"> -->
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
    </header><!-- #masthead -->