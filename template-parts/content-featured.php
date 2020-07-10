<?php

/**
 * Template part for displaying featured tiles in frontpage and country pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travellers-field-guide
 */
?>

<div class="tile-single tile-single--portrait shrink-on-hover">
  <?php
  $post_country = get_the_tags()[0]->name; //name of country
  $featured_story_image = get_field('featured_story_image');
  ?>
  <a href="<?php echo the_permalink() ?>">
    <div class="tile-content-wrapper">
      <div class="tile-content">
        <h3 class="tile-content-subheading subheading"><?php echo $post_country ?></h3>
        <h3 class="tile-content-title heading page-h3"><?php the_title() ?></h3>
        <p class="tile-content-paragraph"><?php echo get_the_excerpt() ?></p>
      </div>
    </div>
    <?php
    if ($featured_story_image) {
      echo wp_get_attachment_image($featured_story_image, 'full', "", array("class" => "tile-image"));
    }
    ?>
  </a>
</div>