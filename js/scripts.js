(function ($) {
  function showHideLongContentControls() {
    const $marker = $('.related-posts-marker');
    const $hero = $('.hero');
    const heroBottom = $hero.outerHeight(true);
    const $relatedPostsButton = $('.related-posts-button');
    const $relatedPostsDiv = $('.owl-carousel-wrapper');
    const $longContentControls = $('.long-content-controls');

    //Trigger the long content controls and style for related post carousel when end of article is scrolled over
    if ($marker.length) {
      let timeoutMarker = null;
      $(window).scroll(function () {
        if (!timeoutMarker) {
          timeoutMarker = setTimeout(function () {
            const target = $marker.offset().top - $(window).height() * 0.76; // Need to re-evaluate offset each scroll because of lazy loaded images
            clearTimeout(timeoutMarker);
            timeoutMarker = null;
            if ($(window).scrollTop() >= target) {
              $longContentControls.removeClass('long-content-controls--show');
              $relatedPostsDiv.removeClass('owl-carousel-wrapper--fixed');
              $relatedPostsDiv.addClass('owl-carousel-wrapper--fade-out-in');
            }
            if (
              $(window).scrollTop() < target &&
              $(window).scrollTop() > heroBottom
            ) {
              $longContentControls.addClass('long-content-controls--show');
            }
          }, 250);
        }
      });
    }

    //Trigger the long-content-controls when the hero is scrolled over
    if ($hero.length) {
      let timeoutHero = null;
      let hamburgerIsShown = false;
      $(window).scroll(function () {
        if (!timeoutHero && !hamburgerIsShown) {
          timeoutHero = setTimeout(function () {
            clearTimeout(timeoutHero);
            timeoutHero = null;
            if ($(window).scrollTop() >= heroBottom) {
              hamburgerIsShown = true;
              $longContentControls.addClass('long-content-controls--show');
            }
          }, 250);
        }
        if ($(window).scrollTop() < heroBottom) {
          hamburgerIsShown = false;
          $longContentControls.removeClass('long-content-controls--show');
        }
      });
    }

    //Click event for related posts carousel
    if ($relatedPostsButton.length) {
      $relatedPostsButton.click(() => {
        $relatedPostsDiv.addClass('owl-carousel-wrapper--fixed');
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
    showHideLongContentControls();
  });

  $(document).ready(function () {
    initOwlCarousel();
  });
})(jQuery);
