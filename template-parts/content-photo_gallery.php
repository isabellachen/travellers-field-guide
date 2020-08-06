<?php

/**
 * Template part for displaying photo gallery landscape tile in frontpage and country pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travellers-field-guide
 */
?>

<div class="tile-single tile-single--full_width shrink-on-hover">
  <?php
  $post_country = get_the_tags()[0]->name; //name of country
  $photo_gallery_image = get_field('photo_gallery_image');
  ?>
  <a href="<?php echo the_permalink() ?>">
    <div class="tile-content-wrapper">
      <div class="tile-content tile-content--two_thirds">
        <?php if (is_front_page()) : ?>
          <h3 class="tile-content-subheading subheading"><?php echo $post_country ?></h3>
        <?php endif; ?>
        <h3 class="pb-0 mb-0 heading page-h3"><?php the_title() ?></h3>
        <p class="tile-content-paragraph"><?php echo get_the_excerpt() ?></p>
      </div>
    </div>
    <?php
    if ($photo_gallery_image) {
      echo wp_get_attachment_image($photo_gallery_image, 'full', "", array("class" => "tile-image"));
    } elseif (has_post_thumbnail()) {
      the_post_thumbnail('medium_large', ['class' => 'tile-image']);
    }
    ?>
  </a>
</div>