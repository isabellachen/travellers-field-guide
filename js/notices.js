(function ($) {
  const $rebrandingEl = $('.site-footer-notices-rebranding');
  const $cookieEl = $('.site-footer-notices-cookie');
  const $rebrandingButton = $('.button-rebranding');
  const $cookieButton = $('.button-cookie');

  const showRebranding = !localStorage.rebranding;
  const showCookie = !localStorage.cookie;

  if (showRebranding) {
    $rebrandingEl.removeClass('is-hidden');
  }

  if (showCookie) {
    $cookieEl.removeClass('is-hidden');
  }

  $rebrandingButton.click(() => {
    $rebrandingEl.addClass('is-hidden');
    localStorage.setItem('rebranding', true);
  });

  $cookieButton.click(() => {
    $cookieEl.addClass('is-hidden');
    localStorage.setItem('cookie', true);
  });
})(jQuery);
