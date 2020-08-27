(($) => {
  console.log('run scrolly');
  var scroller = scrollama();
  console.log(scroller);
  function animateUp(
    startingValue,
    finalValue,
    scrollProgress,
    percentage,
    offset = 0
  ) {
    const mappedScrollProgress = (scrollProgress - offset) * (100 / percentage);
    const currValue = mappedScrollProgress * finalValue;
    if (Math.abs(currValue) > Math.abs(finalValue)) {
      return finalValue;
    }
    return currValue;
  }

  function animateDown(
    startingValue,
    finalValue,
    scrollProgress,
    percentage,
    offset = 0
  ) {
    const mappedScrollProgress = (scrollProgress - offset) * (100 / percentage);
    const currValue = startingValue - mappedScrollProgress * startingValue;
    if (currValue < finalValue) {
      return finalValue;
    }
    return currValue;
  }

  function handleStepProgress(response) {
    const scrollProgressPercentage = Math.floor(
      Number(response.progress) * 100
    );
    const $scrolledEl = $(response.element);
    const $heroImage = $('.kenya_hero-image');
    const $scrollCue = $('.kenya_hero-scroll_cue');
    const $heroQuote = $('.kenya_hero-quote');
    const $imageOverlay = $('.kenya_hero-image_overlay');
    $heroImage.css('filter', 'blur(10px)');
    $heroImage.css('transform', `scale(1.2)`);
    $scrollCue.css('transform', `translateY(0)`);
    $heroQuote.css({
      opacity: 0
    });
    $imageOverlay.css('opacity', '.9');

    const scrollamaIndex = $scrolledEl.attr('data-scrollama-index');
    if (Number(scrollamaIndex) === 0) {
      if (scrollProgressPercentage >= 0) {
        const imageBlur = animateDown(5, 0, response.progress, 10);
        const scrollCueTranslateY = animateUp(0, -20, response.progress, 10);
        const scrollCueOpacity = animateDown(1, 0, response.progress, 10);
        $heroImage.css('filter', `blur(${imageBlur}px)`);
        $scrollCue.css({
          transform: `translateY(${scrollCueTranslateY}px)`,
          opacity: `${scrollCueOpacity}`
        });
      }
      if (scrollProgressPercentage >= 10) {
        const scaleValue = animateDown(1.2, 1, response.progress, 40, 0.1);
        $heroImage.css('transform', `scale(${scaleValue})`);
      }
      if (scrollProgressPercentage >= 20) {
        const quoteTranslateY = animateUp(0, -150, response.progress, 40, 0.2);
        const quoteOpacity = animateUp(0, 1, response.progress, 40, 0.2);
        $heroQuote.css({
          transform: `translateY(${quoteTranslateY}px)`,
          opacity: `${quoteOpacity}`
        });
      }
      if (scrollProgressPercentage >= 70) {
        const imageOverlayOpacity = animateDown(
          0.9,
          0,
          response.progress,
          40,
          0.7
        );
        $imageOverlay.css('opacity', imageOverlayOpacity);
      }
    }
  }

  function init() {
    scroller
      .setup({
        step: '#scrolly article .step',
        progress: true,
        offset: 0,
        debug: true
      })
      .onStepProgress(handleStepProgress);

    window.addEventListener('resize', scroller.resize);
  }

  // kick things off
  init();
})(jQuery);
