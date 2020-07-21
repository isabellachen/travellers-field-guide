<?php

/**
 * Template part for the leading paragraph of display page template
 * Uses the the main content of the page
 * - Who We Are (front-page.php)
 * - Country Page Intros (page-country.php)
 *
 * @package travellers-field-guide
 */
?>
<div class="container-inner margin-auto">
  <?php if (has_excerpt()) : ?>
    <h2 class="heading page-h2"><?php the_excerpt() ?></h2>
  <?php endif; ?>
  <div class="frontpage-intro dropcap dropcap--s">
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
  </div><!-- .frontpage-intro -->
</div><!-- .frontpage-intro-wrapper -->