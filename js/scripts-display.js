(function ($) {
  function scrollOnPaginate() {
    const url = window.location.href;
    const isPaginated = url.includes('page');
    const $scrollTo = $('.frontpage-posts-wrapper');
    if (isPaginated) {
      window.scroll(0, $scrollTo.offset().top - 60);
    }
  }

  function archiveReadMore() {
    const $button = $('.archive-read-button');
    const $lead = $('.archive-lead-content');

    $button.click(() => {
      $lead.toggleClass('long');
      $button.toggleClass('archive-read-button--more');
      $button.toggleClass('archive-read-button--less');
    });
  }

  $(window).on('load', function () {
    scrollOnPaginate();
    archiveReadMore();
  });
})(jQuery);
