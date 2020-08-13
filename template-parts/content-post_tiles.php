<?php

/**
 * Template part for the post tiles of frontpage style template
 * - front-page.php 
 * - page_country.php
 *
 * @package travellers-field-guide
 */
?>

<div class="tile-single shrink-on-hover mb-1_5">
  <?php
  $post_tags = get_the_tags();
  if ($post_tags) {
    $post_country = $post_tags[0]->name;
  }
  ?>
  <a href="<?php echo the_permalink() ?>">
    <div class="tile-content-wrapper">
      <div class="tile-content">
        <?php if (isset($is_front_page)) : ?>
          <h3 class="tile-content-subheading subheading"><?php echo $post_tags && isset($post_country) ? $post_country : '' ?></h3>
        <?php endif; ?>
        <h3 class="tile-content-title heading page-h3"><?php the_title() ?></h3>
      </div>
    </div>
    <?php
    if (has_post_thumbnail()) {
      the_post_thumbnail('medium_square', ['class' => 'tile-image']);
    }
    ?>
  </a>
</div>