(function ($) {
  const $marker = $('.related-posts-marker');
  const $hero = $('.hero');
  const $relatedPostsButton = $('.related-posts-button'); // The Hamburger
  const $backToTopButton = $('.back-to-top-button');
  const $relatedPostsDiv = $('.owl-carousel-wrapper');
  const $relatedPostsDivCloseButton = $('.owl-carousel-close'); // The Close Button

  let markerTarget;

  function dockWithBottom(relatedPostDivHeight) {
    if ($marker.length) {
      let timeoutMarker = null;
      $(window).scroll(function () {
        if (!timeoutMarker) {
          timeoutMarker = setTimeout(function () {
            markerTarget =
              $marker.offset().top -
              ($(window).height() - relatedPostDivHeight); // Need to re-evaluate offset each scroll because of lazy loaded images
            clearTimeout(timeoutMarker);
            timeoutMarker = null;
            if ($(window).scrollTop() >= markerTarget) {
              $relatedPostsDiv.removeClass('owl-carousel-wrapper--fixed');
              $relatedPostsDiv.addClass('owl-carousel-wrapper--fade-out-in');
            }
          }, 250);
        }
      });
    }
  }

  function initLongContentControls(heroBottom) {
    if ($marker.length && $hero.length) {
      let timeoutLongContentControls = null;
      $(window).scroll(function () {
        if (!timeoutLongContentControls) {
          timeoutLongContentControls = setTimeout(function () {
            clearTimeout(timeoutLongContentControls);
            timeoutLongContentControls = null;
            if ($(window).scrollTop() >= heroBottom) {
              $relatedPostsButton.addClass('related-posts-button--show');
              $backToTopButton.addClass('back-to-top-button--show');
            }
            if ($(window).scrollTop() < heroBottom) {
              $relatedPostsButton.removeClass('related-posts-button--show');
              $backToTopButton.removeClass('back-to-top-button--show');
            }
            if (
              $(window).scrollTop() >=
              $marker.offset().top - $(window).height() //If the related carousel is on screen
            ) {
              $relatedPostsButton.removeClass('related-posts-button--show');
            }
            if (
              $(window).scrollTop() <
                $marker.offset().top - $(window).height() &&
              $(window).scrollTop() > heroBottom //If the related carousel is not on screen
            ) {
              $relatedPostsButton.addClass('related-posts-button--show');
            }
          }, 250);
        }
      });
    }
  }

  function initForLongContent() {
    const relatedPostDivHeight = $relatedPostsDiv.outerHeight(true);
    const heroBottom = $hero.outerHeight(true);

    dockWithBottom(relatedPostDivHeight);
    initLongContentControls(heroBottom);

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

    if ($backToTopButton.length) {
      $backToTopButton.click(() => {
        window.scroll(0, 0);
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

  //Quick fix to anchor scoll on FAQ links
  function offsetAnchor() {
    const hash = window.location.hash;
    const $target = $(hash);

    function scrollTo() {
      let targetLocation = $target.offset().top;
      window.scroll(0, targetLocation);
      if (!elInViewport($target)) {
        window.requestAnimationFrame(scrollTo);
      }
    }
    if (location.hash.length !== 0) {
      let targetLocation = $target.offset().top;
      window.scroll(0, targetLocation);
      window.setTimeout(() => {
        scrollTo();
        window.requestAnimationFrame(scrollTo);
      }, 1200);
    }
  }

  $(window).on('load', function () {
    initForLongContent();
  });

  $(document).ready(function () {
    initOwlCarousel();
    window.addEventListener('hashchange', offsetAnchor);
    window.setTimeout(offsetAnchor, 0);
  });
})(jQuery);
