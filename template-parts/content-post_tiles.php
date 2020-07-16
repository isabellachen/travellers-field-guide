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
  $post_country = get_the_tags()[0]->name; //name of country
  ?>
  <a href="<?php echo the_permalink() ?>">
    <div class="tile-content-wrapper">
      <div class="tile-content">
        <h3 class="tile-content-subheading subheading"><?php echo $post_country ?></h3>
        <h3 class="tile-content-title heading page-h3"><?php the_title() ?></h3>
      </div>
    </div>
    <?php
    if (has_post_thumbnail()) {
      echo the_post_thumbnail('post-thumbnail', ['class' => 'tile-image']);
    }
    ?>
  </a>
</div>