$.fn.galleries = function(options) {
  const defaults = {
    selector: {
      slides: '.galleries-slides',
      slide: '.galleries-slide',
      thumbnails: '.thumbnails',
      thumbnail: '.thumbnail'
    }
  };
  const settings = $.extend( {}, defaults, options);
  return this.each(function() {
    const galleries = $(this);
    function activeSlide(index) {
      $(settings.selector.slide, galleries).each(function() {
        $(this).removeClass('active');
      });
      $([...$(settings.selector.slide, galleries)][index]).addClass('active');
      $(settings.selector.thumbnail, galleries).each(function() {
        $(this).removeClass('active');
      });
      $([...$(settings.selector.thumbnail, galleries)][index]).addClass('active');
    }
    if ([...$(settings.selector.slide, galleries)].filter(slide => $(slide).hasClass('active')).length !== 1) {
      activeSlide(0);
    } else {
      activeSlide($([...$(settings.selector.slide, galleries)].filter(slide => $(slide).hasClass('active'))).index());
    }
    $(settings.selector.thumbnail, galleries).on('click', function() {
      activeSlide($(this).index());
    });
  });
};