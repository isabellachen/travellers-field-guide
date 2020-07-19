(function ($) {
  function relatedPosts() {
    const $marker = $('.related-posts-marker');

    if ($marker.length) {
      let timeout = null;

      $(window).scroll(function () {
        if (!timeout) {
          timeout = setTimeout(function () {
            const target = $marker.offset().top - $(window).height(); // Need to re-evaluate offset each scroll because of lazy loaded images
            clearTimeout(timeout);
            timeout = null;
            if ($(window).scrollTop() >= target) {
              alert('made it');
            }
          }, 500);
        }
      });
    }
  }

  function initOwlCarousel() {
    $('.owl-carousel').owlCarousel({
      nav: true,
      navContainer: false,
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
  }

  $(window).on('load', function () {
    relatedPosts();
  });

  $(document).ready(function () {
    initOwlCarousel();
  });

  $(document).ready(readyFn);
})(jQuery);
