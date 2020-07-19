(function ($) {
  function relatedPosts() {
    const $marker = $('.related-posts-marker');
    const $hero = $('.hero');
    const heroBottom = $hero.outerHeight(true);

    //Trigger the related post popup
    if ($marker.length) {
      let timeoutMarker = null;
      $(window).scroll(function () {
        if (!timeoutMarker) {
          timeoutMarker = setTimeout(function () {
            const target = $marker.offset().top - $(window).height(); // Need to re-evaluate offset each scroll because of lazy loaded images
            clearTimeout(timeoutMarker);
            timeoutMarker = null;
            if ($(window).scrollTop() >= target) {
              alert('made it');
            }
          }, 500);
        }
      });
    }

    //Trigger the related post button
    if ($hero.length) {
      let timeoutHero = null;
      $(window).scroll(function () {
        if (!timeoutHero) {
          timeoutHero = setTimeout(function () {
            clearTimeout(timeoutHero);
            timeoutHero = null;
            if ($(window).scrollTop() >= heroBottom) {
              alert('display dongle');
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
})(jQuery);
