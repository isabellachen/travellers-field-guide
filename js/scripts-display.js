(function ($) {
  function scrollOnPaginate() {
    const url = window.location.href;
    const isPaginated = url.includes('page');
    const $scrollTo = $('.frontpage-posts-wrapper');
    if (isPaginated) {
      window.scroll(0, $scrollTo.offset().top - 60);
    }
  }

  $(window).on('load', function () {
    scrollOnPaginate();
  });
})(jQuery);
