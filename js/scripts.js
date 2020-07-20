(function ($) {
  function showHideLongContentControls() {
    const $marker = $('.related-posts-marker');
    const $hero = $('.hero');
    const heroBottom = $hero.outerHeight(true);
    const $relatedPostsButton = $('.related-posts-button'); // The Hamburger
    const $relatedPostsDiv = $('.owl-carousel-wrapper');
    const $relatedPostsDivCloseButton = $('.owl-carousel-close'); // The Close Button
    const relatedPostDivHeight = $relatedPostsDiv.outerHeight(true);
    const $longContentControls = $('.long-content-controls');

    //Trigger the long content controls and style for related post carousel when end of article is scrolled over
    if ($marker.length) {
      let timeoutMarker = null;
      $(window).scroll(function () {
        if (!timeoutMarker) {
          timeoutMarker = setTimeout(function () {
            const markerTarget =
              $marker.offset().top -
              ($(window).height() - relatedPostDivHeight); // Need to re-evaluate offset each scroll because of lazy loaded images
            clearTimeout(timeoutMarker);
            timeoutMarker = null;
            if ($(window).scrollTop() >= markerTarget) {
              $longContentControls.removeClass('long-content-controls--show');
              $relatedPostsDiv.removeClass('owl-carousel-wrapper--fixed');
              $relatedPostsDiv.addClass('owl-carousel-wrapper--fade-out-in');
            }
            if (
              $(window).scrollTop() < markerTarget &&
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

    //Click events for related posts carousel
    if ($relatedPostsButton.length) {
      $relatedPostsButton.click(() => {
        $relatedPostsDiv.addClass('owl-carousel-wrapper--fixed');
      });
    }

    //Close related posts when click close
    if ($relatedPostsDivCloseButton.length) {
      $relatedPostsDivCloseButton.click(() => {
        $relatedPostsDiv.removeClass('owl-carousel-wrapper--fixed');
      });
    }

    //Close related posts when click outside
    $(document).click(function (e) {
      if (
        $(e.target).closest('#relatedPosts').length === 0 &&
        $(e.target).closest('.related-posts-button').length === 0
      ) {
        $relatedPostsDiv.removeClass('owl-carousel-wrapper--fixed');
      }
    });
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
