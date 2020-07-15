(function ($) {
  $('.owl-carousel').owlCarousel({
    nav: true,
    margin: 10,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 3
      },
      992: {
        items: 4
      }
    }
  });
})(jQuery);
