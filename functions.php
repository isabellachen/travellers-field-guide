<?php

/**
 * travellers-field-guide functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package travellers-field-guide
 */

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

if (!function_exists('travellers_field_guide_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function travellers_field_guide_setup()
  {
    /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on travellers-field-guide, use a find and replace
		 * to change 'travellers-field-guide' to the name of your theme in all the template files.
		 */
    load_theme_textdomain('travellers-field-guide', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Add excerpts for pages
    add_post_type_support('page', 'excerpt');

    /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
    add_theme_support('title-tag');

    /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
      array(
        'top-bar' => esc_html__('Primary', 'travellers-field-guide'),
      )
    );

    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
      )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
      'custom-background',
      apply_filters(
        'travellers_field_guide_custom_background_args',
        array(
          'default-color' => 'ffffff',
          'default-image' => '',
        )
      )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
      'custom-logo',
      array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
      )
    );
  }
endif;
add_action('after_setup_theme', 'travellers_field_guide_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travellers_field_guide_content_width()
{
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters('travellers_field_guide_content_width', 768);
}
add_action('after_setup_theme', 'travellers_field_guide_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travellers_field_guide_widgets_init()
{
  register_sidebar(
    array(
      'name'          => esc_html__('Footer', 'travellers-field-guide'),
      'id'            => 'footer-widget',
      'description'   => esc_html__('Add widgets here.', 'travellers-field-guide'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action('widgets_init', 'travellers_field_guide_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function travellers_field_guide_scripts()
{
  wp_enqueue_style('travellers-field-guide-style', get_stylesheet_uri(), array(), _S_VERSION);
  wp_style_add_data('travellers-field-guide-style', 'rtl', 'replace');

  wp_enqueue_script('travellers-field-guide-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

  if (is_paged() || is_archive()) {
    wp_enqueue_script('travellers-field-guide-scripts', get_template_directory_uri() . '/js/scripts-display.js', array('jquery'), _S_VERSION, true);
  }
  if ((is_single() || is_page()) && !is_front_page()) {
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('travellers-field-guide-scripts', get_template_directory_uri() . '/js/scripts-single.js', array('owl-carousel', 'jquery'), _S_VERSION, true);
  }
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  if (!(is_single() || is_page()) || is_front_page()) {
    wp_deregister_script('wpdevart_lightbox_front_end_js');
  }
}
add_action('wp_enqueue_scripts', 'travellers_field_guide_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

/*-----------------------------------------------------------------------------------*/
/* Numbered Pagination
/*-----------------------------------------------------------------------------------*/
function tfg_pagination_double_left_chevron()
{
  return "
<svg width='13px' height='12px' viewBox='0 0 13 12' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
    <title>chevron-double-left</title>
    <g id='chevron-double-left' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
        <g id='chevron-down' fill='#F5F5F6' fill-rule='nonzero'>
            <path d='M13.7268994,3.1446875 L9.46022727,7.4675 L5.19355519,3.1446875 C4.87154221,2.8184375 4.38852273,2.8184375 4.06650974,3.1446875 C3.74449675,3.4709375 3.74449675,3.9603125 4.06650974,4.2865625 L8.89670455,9.1803125 C9.05771104,9.3434375 9.29922078,9.425 9.46022727,9.425 C9.62123377,9.425 9.86274351,9.3434375 10.02375,9.1803125 L14.8539448,4.2865625 C15.1759578,3.9603125 15.1759578,3.4709375 14.8539448,3.1446875 C14.5319318,2.8184375 14.0489123,2.8184375 13.7268994,3.1446875 Z' id='Path' transform='translate(9.460227, 6.162500) rotate(-270.000000) translate(-9.460227, -6.162500) '></path>
            <path d='M7.72689935,3.1446875 L3.46022727,7.4675 L-0.806444805,3.1446875 C-1.12845779,2.8184375 -1.61147727,2.8184375 -1.93349026,3.1446875 C-2.25550325,3.4709375 -2.25550325,3.9603125 -1.93349026,4.2865625 L2.89670455,9.1803125 C3.05771104,9.3434375 3.29922078,9.425 3.46022727,9.425 C3.62123377,9.425 3.86274351,9.3434375 4.02375,9.1803125 L8.85394481,4.2865625 C9.17595779,3.9603125 9.17595779,3.4709375 8.85394481,3.1446875 C8.53193182,2.8184375 8.04891234,2.8184375 7.72689935,3.1446875 Z' id='Path-Copy' transform='translate(3.460227, 6.162500) rotate(-270.000000) translate(-3.460227, -6.162500) '></path>
        </g>
    </g>
</svg>";
}

function tfg_pagination_double_right_chevron()
{
  return "
<svg width='13px' height='13px' viewBox='0 0 13 13' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
    <title>chevron-down</title>
    <g id='Symbols' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
        <g id='chevron-double-right' fill='#F5F5F6' fill-rule='nonzero'>
            <g id='chevron-down' transform='translate(6.500000, 6.500000) rotate(-180.000000) translate(-6.500000, -6.500000) '>
                <path d='M14.0164286,3.15184211 L9.625,7.60105263 L5.23357143,3.15184211 C4.90214286,2.81605263 4.405,2.81605263 4.07357143,3.15184211 C3.74214286,3.48763158 3.74214286,3.99131579 4.07357143,4.32710526 L9.045,9.36394737 C9.21071429,9.53184211 9.45928571,9.61578947 9.625,9.61578947 C9.79071429,9.61578947 10.0392857,9.53184211 10.205,9.36394737 L15.1764286,4.32710526 C15.5078571,3.99131579 15.5078571,3.48763158 15.1764286,3.15184211 C14.845,2.81605263 14.3478571,2.81605263 14.0164286,3.15184211 Z' id='Path' transform='translate(9.625000, 6.257895) rotate(-270.000000) translate(-9.625000, -6.257895) '></path>
                <path d='M8.01642857,3.15184211 L3.625,7.60105263 L-0.766428571,3.15184211 C-1.09785714,2.81605263 -1.595,2.81605263 -1.92642857,3.15184211 C-2.25785714,3.48763158 -2.25785714,3.99131579 -1.92642857,4.32710526 L3.045,9.36394737 C3.21071429,9.53184211 3.45928571,9.61578947 3.625,9.61578947 C3.79071429,9.61578947 4.03928571,9.53184211 4.205,9.36394737 L9.17642857,4.32710526 C9.50785714,3.99131579 9.50785714,3.48763158 9.17642857,3.15184211 C8.845,2.81605263 8.34785714,2.81605263 8.01642857,3.15184211 Z' id='Path-Copy' transform='translate(3.625000, 6.257895) rotate(-270.000000) translate(-3.625000, -6.257895) '></path>
            </g>
        </g>
    </g>
</svg>";
}

function tfg_pagination_left_chevron()
{
  return "
<svg width='7px' height='12px' viewBox='0 0 7 12' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
    <title>chevron-down copy</title>
    <g id='Symbols' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
        <g id='chevron-left' fill='#F5F5F6' fill-rule='nonzero'>
            <g id='chevron-down-copy'>
                <path d='M7.72689935,3.1446875 L3.46022727,7.4675 L-0.806444805,3.1446875 C-1.12845779,2.8184375 -1.61147727,2.8184375 -1.93349026,3.1446875 C-2.25550325,3.4709375 -2.25550325,3.9603125 -1.93349026,4.2865625 L2.89670455,9.1803125 C3.05771104,9.3434375 3.29922078,9.425 3.46022727,9.425 C3.62123377,9.425 3.86274351,9.3434375 4.02375,9.1803125 L8.85394481,4.2865625 C9.17595779,3.9603125 9.17595779,3.4709375 8.85394481,3.1446875 C8.53193182,2.8184375 8.04891234,2.8184375 7.72689935,3.1446875 Z' id='Path' transform='translate(3.460227, 6.162500) rotate(-270.000000) translate(-3.460227, -6.162500) '></path>
            </g>
        </g>
    </g>
</svg>";
}

function tfg_pagination_right_chevron()
{
  return "
<svg width='7px' height='12px' viewBox='0 0 7 12' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
    <title>chevron-down copy</title>
    <g id='Symbols' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
        <g id='chevron-right' fill='#F5F5F6' fill-rule='nonzero'>
            <g id='chevron-down-copy' transform='translate(3.500000, 6.000000) rotate(-180.000000) translate(-3.500000, -6.000000) '>
                <path d='M7.72689935,3.1446875 L3.46022727,7.4675 L-0.806444805,3.1446875 C-1.12845779,2.8184375 -1.61147727,2.8184375 -1.93349026,3.1446875 C-2.25550325,3.4709375 -2.25550325,3.9603125 -1.93349026,4.2865625 L2.89670455,9.1803125 C3.05771104,9.3434375 3.29922078,9.425 3.46022727,9.425 C3.62123377,9.425 3.86274351,9.3434375 4.02375,9.1803125 L8.85394481,4.2865625 C9.17595779,3.9603125 9.17595779,3.4709375 8.85394481,3.1446875 C8.53193182,2.8184375 8.04891234,2.8184375 7.72689935,3.1446875 Z' id='Path' transform='translate(3.460227, 6.162500) rotate(-270.000000) translate(-3.460227, -6.162500) '></path>
            </g>
        </g>
    </g>
</svg>";
}

if (!function_exists('tfg_pagination')) {
  function tfg_pagination($pages = '', $range = 2)
  {

    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) $paged = 1;

    if ($pages == '') {
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if (!$pages) {
        $pages = 1;
      }
    }

    if (1 != $pages) {
      echo "<div class='pagination clearfix'>";
      if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a class='pagination-link' href='" . get_pagenum_link(1) . "'>" . tfg_pagination_double_left_chevron() . "</a>";
      if ($paged > 1 && $showitems < $pages) echo "<a class='pagination-link' href='" . get_pagenum_link($paged - 1) . "'>" . tfg_pagination_left_chevron() . "</a>";

      for ($i = 1; $i <= $pages; $i++) {
        if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
          echo ($paged == $i) ? "<span class='pagination-link pagination-link-current'>" . $i . "</span>" : "<a class='pagination-link' href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a>";
        }
      }

      if ($paged < $pages && $showitems < $pages) echo "<a class='pagination-link' href='" . get_pagenum_link($paged + 1) . "'>" . tfg_pagination_right_chevron() . "</a>";
      if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo "<a class='pagination-link' href='" . get_pagenum_link($pages) . "'>" . tfg_pagination_double_right_chevron() . "</a>";
      echo "</div>\n";
    }
  }
}

/*-----------------------------------------------------------------------------------*/
/* Custom Image Sizes
/*-----------------------------------------------------------------------------------*/

function use_new_image_size()
{
  if (function_exists('add_image_size')) {
    add_image_size('width_s', 540, 0, false);
    add_image_size('small_square', 300, 300, true);
    add_image_size('medium_square', 478, 478, true);
  }
}
add_action('after_setup_theme', 'use_new_image_size');

function create_custom_image_size($sizes)
{
  $custom_sizes = array(
    'width_s' => 'Width-S 540',
    'small_square' => 'Small-Square 300',
    'medium_square' => 'Medium-Square 700',
    'medium_large' => 'Medium Large 768'
  );
  return array_merge($sizes, $custom_sizes);
}
add_filter('image_size_names_choose', 'create_custom_image_size');


/*-----------------------------------------------------------------------------------*/
/* Disbale Unwanted Image Sizes
/*-----------------------------------------------------------------------------------*/

function tfg_disable_medium_large_images($sizes)
{
  unset($sizes['2048x2048']);
  return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'tfg_disable_medium_large_images');
add_filter('big_image_size_threshold', '__return_false');


/* 
 * Add google analytics to the head
*/

function tfg_ga_head()
{
  //Close PHP tags 
?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71125016-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-71125016-1');
  </script>

<?php //Open PHP tags
}
add_action('wp_head', 'tfg_ga_head');

/**
 * Custom number of posts in category pages - used for pagination
 * https://wordpress.stackexchange.com/a/372278/153787
 */
function set_offset_on_front_page($query)
{
  if (!is_admin() && $query->is_main_query()) {
    if (is_category() && !is_paged()) {
      // +1 because we want to add the Photo Gallery (former chapter guides) to the query and still maintain the 3 per row layout
      $query->query_vars['posts_per_page'] = get_option('posts_per_page') + 1;
    }
    if (is_category() && is_paged()) {
      $posts_per_page = isset($query->query_vars['posts_per_page']) ? $query->query_vars['posts_per_page'] : get_option('posts_per_page');
      $query->query_vars['offset'] = (($query->query_vars['paged'] - 2) * $posts_per_page) + $posts_per_page + 1;
    }
  }
}
add_action('pre_get_posts', 'set_offset_on_front_page');

/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Selective Dequeue unnecessary styles and scripts
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
function tfg_dequeue_unused_css()
{
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
  wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
  if (!(is_single() || is_page()) || is_front_page()) {
    wp_dequeue_style('flex_col_images_shortcode_style'); //Remove flex col for display pages
    wp_deregister_style('wpdevart_lightbox_front_end_css');
    wp_deregister_style('wpdevart_lightbox_effects');
  }
}
add_action('wp_enqueue_scripts', 'tfg_dequeue_unused_css', 100);

/* 
 * dequeue contact form 7
*/
function tfg_dequeue_wpcf7()
{
  if (!is_page('work-with-us')) { //if not work with us page, dequeue contact form
    wp_dequeue_script('contact-form-7');
    wp_dequeue_style('contact-form-7'); // 
  }
}
add_action('wp_enqueue_scripts', 'tfg_dequeue_wpcf7');

/* 
 * dequeue jetpack script that replaces images for retina displays causing problems with lightbox
*/
function tfg_dequeue_devicepx()
{
  wp_dequeue_script('devicepx');
}
add_action('wp_enqueue_scripts', 'tfg_dequeue_devicepx');

/**
 * Disable the emoji's
 */
function disable_emojis()
{
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emojis');

/**
 * Disable Comment Script
 */
function tfg_clean_header_hook()
{
  wp_deregister_script('comment-reply');
}
add_action('init', 'tfg_clean_header_hook');
