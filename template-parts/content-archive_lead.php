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
<div class="archive-lead container-inner margin-auto">
  <?php if (!empty($category_lead)) : ?>
    <h2 class="heading page-h2"><?php echo $category_lead ?></h2>
  <?php endif; ?>
  <div class="frontpage-intro archive-lead-content dropcap dropcap--s">
    <?php echo category_description(); ?>
  </div><!-- .frontpage-intro-wrapper -->
  <div class="archive-read-button archive-read-button--more"></div>
</div>