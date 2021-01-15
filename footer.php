<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travellers-field-guide
 */

?>

<footer id="colophon" class="site-footer">
  <div class="site-footer-notices">
    <div class="site-footer-notices-inner container site-footer-notices-rebranding is-hidden"><span>Madhouse Heaven is currently rebranding to The Next Crossing, please bear with us 🙏</span><button class="button-rebranding">CLOSE</button></div>
    <div class="site-footer-notices-inner container site-footer-notices-cookie is-hidden"><span>By continuing to use this site, you consent to cookies.</span><button class="button-cookie">ACCEPT</button></div>
  </div>
  <div class="site-info">
    <div class="site-footer-inner container">
      <div class="site-footer-left">
        <h2>Get in Touch</h2>
        <div class="site-footer-email">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/email.svg">
          <span>hello [at] thenextcrossing.com</span>
        </div>
        <div class="site-footer-icons-wrapper">
          <a href="https://www.facebook.com/madhouseheavenstudio/" target="_blank" rel="noopener noreferrer" class="site-footer-icon"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/facebook.svg"></a>
          <a href="https://www.instagram.com/madhouse_heaven/" target="_blank" rel="noopener noreferrer" class="site-footer-icon"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/instagram.svg"></a>
          <a href="https://www.youtube.com/channel/UCYntFLHyk-9XhrAYhTfxjew" rel="noopener noreferrer" target="_blank" class="site-footer-icon"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/youtube.svg"></a>
          <a href="https://www.flickr.com/photos/madhouseheaven/" target="_blank" rel="noopener noreferrer" class="site-footer-icon"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/flickr.svg"></a>
          <a href="https://www.pinterest.es/madhouseheaven/" target="_blank" rel="noopener noreferrer" class="site-footer-icon"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/pinterest.svg"></a>
        </div>
      </div>
      <div class="site-footer-right">
        <div id="mc_embed_signup">
          <form action="https://madhouseheaven.us10.list-manage.com/subscribe/post?u=d24c7c0b82449655133ff8c5d&amp;id=8185a63b5b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
              <h2>Stay In Touch</h2>
              <div class="mc-wrapper">
                <div class="mc-field-group">
                  <label class="mc-form-label" for="mce-EMAIL">Email Address</label>
                  <input type="email" value="" placeholder="Your Email" name="EMAIL" class="required email" id="mce-EMAIL">
                </div>
                <div id="mce-responses" class="clear">
                  <div class="response" id="mce-error-response" style="display:none"></div>
                  <div class="response" id="mce-success-response" style="display:none"></div>
                </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d24c7c0b82449655133ff8c5d_8185a63b5b" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!-- .site-footer-main -->
    <div class="site-footer-sub">
      <span>© <?php echo date("Y") ?> The Next Crossing | Webmaster: <a href="https://www.isachen.com">www.isachen.com</a></span>
    </div>
  </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>