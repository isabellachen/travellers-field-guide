(function ($) {
  function scrollOnPaginate() {
    const url = window.location.href;
    const isPaginated = url.includes('page');
    const $scrollTo = $('.frontpage-posts-wrapper');
    if (isPaginated) {
      window.scroll(0, $scrollTo.offset().top - 60);
    }
  }

  function elInViewport(el) {
    if (typeof jQuery === 'function' && el instanceof jQuery) {
      el = el[0];
    }

    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function archiveReadMore() {
    const $button = $('.archive-read-button');
    const $lead = $('.archive-lead-content');
    const $archiveLead = $('.archive-lead');

    $button.click(() => {
      $lead.toggleClass('long');
      $button.toggleClass('archive-read-button--more');
      $button.toggleClass('archive-read-button--less');

      if (!elInViewport($archiveLead)) {
        window.scroll(0, $archiveLead.offset().top - 50);
      }
    });
  }

  $(window).on('load', function () {
    scrollOnPaginate();
    archiveReadMore();
  });
})(jQuery);
