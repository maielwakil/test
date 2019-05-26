$.fn.scrolling = function(options) {
  const defaults = {
    selector: {
      viewport: '.thumbnails-viewport',
      container: '.thumbnails',
      controller: '.scroll-controller'
    }
  };
  const settings = $.extend( {}, defaults, options);
  return this.each(function() {
    const viewport = $(this);
    const container = $(settings.selector.container, viewport);
    const controller = $(settings.selector.controller, viewport);
    const viewportHeight = viewport.outerHeight();
    const containerHeight = container.outerHeight();
    const controllerHeight = ((viewportHeight / containerHeight) * 100);
    controller.height(`${controllerHeight}%`);
    $(this).on('wheel', function(event) {
      if (((controller.offset().top - viewport.offset().top + ((viewportHeight / 100) * controllerHeight)) < viewportHeight) && (event.originalEvent.deltaY > 0)) {
        container.offset({top: (container.offset().top - ((containerHeight / viewportHeight) * 10)), left: container.offset().left});
        controller.offset({top: (controller.offset().top + 10), left: controller.offset().left});
        event.preventDefault();
      }
      if ((controller.offset().top - viewport.offset().top > 1) && (event.originalEvent.deltaY < 0)) {
        container.offset({top: (container.offset().top + ((containerHeight / viewportHeight) * 10)), left: container.offset().left});
        controller.offset({top: (controller.offset().top - 10), left: controller.offset().left});
        event.preventDefault();
      }
    });
  });
};