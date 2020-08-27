<?php

/**
 * Template Name: Page Parallax
 * Selectable template for pages that need a title and a related post grid
 * Created for parent pages like the 'Destinations' page
 */

get_header('scrolly');
?>

<main id="primary" class="site-main">
  <section id="scrolly" class="scrolly">
    <article>
      <div class="kenya_hero">
        <div class="step kenya_hero-scroll"></div>
        <div class="kenya_hero-content">
          <div class="kenya_hero-text">
            <div class="kenya_hero-text_inner">
              <div class="kenya_hero-title kenya_hero-title--animated">
                <div class="kenya_hero-title_main kenya_hero-title_main--animated">KENYA</div>
                <div class="kenya_hero-title_subtitle kenya_hero-title_subtitle--animated">
                  Standing Guard, By Nature's Twilight
                </div>
              </div>
              <div class="kenya_hero-scroll_cue kenya_hero-scroll_cue--animated">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/gifs/scroll-mouse.gif" />
              </div>
              <div class="kenya_hero-quote">
                <p>
                  If only we could go back to the time when the flightless
                  dodo strode the Mauritius landscape, the quagga grazed on
                  the South African veld, and the Barbary lion prowled the
                  Atlas Mountains. If only we had known then that whole
                  species could not withstand man's heartless extermination.
                  <span class="dash"></span><span>Mohamed Ismail</span>
                  <div class="kenya_hero-quote_title">The Lost Wilderness</div>
                </p>
              </div>
            </div>
          </div>
          <div class="kenya_hero-image_container">
            <div class="kenya_hero-image_overlay"></div>
            <img class="kenya_hero-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/elephant-family-grazing.jpg" />
          </div>
        </div>
      </div>
    </article>
  </section>
</main><!-- #main -->

<?php
get_footer();
