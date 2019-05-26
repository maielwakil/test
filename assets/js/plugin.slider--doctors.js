function SliderDoctor(configuration) {
  const plugin = this;
  plugin.selector = configuration.selector;
  plugin.selectors = {
    slides: '.doctors',
    slide: '.doctor'
  };
  plugin.classes = {
    controllers: 'controllers',
    next: 'next',
    previous: 'previous',
    transition: 'transition',
    active: 'active',
    start: 'start',
    end: 'end'
  };
  plugin.navigationAbility = true;
}
SliderDoctor.prototype.getActiveSlideIndex = function() {
  const plugin = this;
  return plugin.slides.indexOf(plugin.slides.filter(slide => slide.classList.contains(plugin.classes.active)).pop());
};
SliderDoctor.prototype.activeSlide = function(index, direction) {
  const plugin = this;
  plugin.navigationAbility = false;
  const activeSlides = plugin.slides.filter(slide => slide.classList.contains(plugin.classes.active));
  const nextSlides = plugin.slides.filter(slide => slide.classList.contains(plugin.classes.next));
  const previousSlides = plugin.slides.filter(slide => slide.classList.contains(plugin.classes.previous));
  const activeFrom = direction === 'next' ? plugin.classes.next : plugin.classes.previous;
  const activeTo = direction === 'next' ? plugin.classes.previous : plugin.classes.next;
  const nextFrom = direction === 'next' ? plugin.classes.start : plugin.classes.active;
  const nextTo = direction === 'next' ? plugin.classes.active : plugin.classes.start;
  const previousFrom = direction === 'next' ? plugin.classes.active : plugin.classes.end;
  const previousTo = direction === 'next' ? plugin.classes.end : plugin.classes.active;
  activeSlides.forEach(slide => {
    slide.classList.add(plugin.classes.transition);
    slide.classList.remove(plugin.classes.active);
    slide.classList.add(activeTo);
  });
  nextSlides.forEach(slide => {
    slide.classList.add(plugin.classes.transition);
    slide.classList.remove(plugin.classes.next);
    slide.classList.add(nextTo);
  });
  previousSlides.forEach(slide => {
    slide.classList.add(plugin.classes.transition);
    slide.classList.remove(plugin.classes.previous);
    slide.classList.add(previousTo);
  });
  let nextIndex = index;
  nextIndex = ++nextIndex < plugin.slides.length ? nextIndex : 0;
  let previousIndex = index;
  previousIndex = --previousIndex >= 0 ? previousIndex : (plugin.slides.length - 1);
  function activeSlideTransitionEndFunction(event) {
    activeSlides.forEach(slide => {
      slide.classList.remove(plugin.classes.transition);
    });
    event.target.classList.remove(plugin.classes.transition);
    event.target.removeEventListener('transitionend', activeSlideTransitionEndFunction);
    plugin.navigationAbility = true;
  }
  function nextSlideTransitionEndFunction(event) {
    nextSlides.forEach(slide => {
      if(direction === 'previous') {
        slide.classList.remove(plugin.classes.transition);
        slide.classList.remove(nextTo);
      }
    });
    event.target.classList.remove(plugin.classes.transition);
    event.target.removeEventListener('transitionend', nextSlideTransitionEndFunction);
    plugin.navigationAbility = true;
  }
  function previousSlideTransitionEndFunction(event) {
    previousSlides.forEach(slide => {
      if(direction === 'next') {
        slide.classList.remove(plugin.classes.transition);
        slide.classList.remove(previousTo);
      }
    });
    event.target.classList.remove(plugin.classes.transition);
    event.target.removeEventListener('transitionend', previousSlideTransitionEndFunction);
    plugin.navigationAbility = true;
  }
  if(direction === 'next') {
    plugin.slides[nextIndex].classList.add(nextFrom);
    window.getComputedStyle(plugin.slides[nextIndex]).getPropertyValue('transform');
    plugin.slides[nextIndex].classList.add(plugin.classes.transition);
    plugin.slides[nextIndex].classList.remove(nextFrom);
    plugin.slides[nextIndex].classList.add(plugin.classes.next);
  }
  if(direction === 'previous') {
    plugin.slides[previousIndex].classList.add(previousFrom);
    window.getComputedStyle(plugin.slides[previousIndex]).getPropertyValue('transform');
    plugin.slides[previousIndex].classList.add(plugin.classes.transition);
    plugin.slides[previousIndex].classList.remove(previousFrom);
    plugin.slides[previousIndex].classList.add(plugin.classes.previous);
  }
  plugin.slides[index].addEventListener('transitionend', activeSlideTransitionEndFunction);
  plugin.slides[nextIndex].addEventListener('transitionend', nextSlideTransitionEndFunction);
  plugin.slides[previousIndex].addEventListener('transitionend', previousSlideTransitionEndFunction);
};
SliderDoctor.prototype.next = function() {
  const plugin = this;
  if (plugin.navigationAbility) {
    const currentIndex = plugin.getActiveSlideIndex();
    let nextIndex = currentIndex;
    nextIndex = ++nextIndex < plugin.slides.length ? nextIndex : 0;
    if (currentIndex !== nextIndex) {
      plugin.activeSlide(nextIndex, 'next');
    }
  }
};
SliderDoctor.prototype.previous = function() {
  const plugin = this;
  if (plugin.navigationAbility) {
    const currentIndex = plugin.getActiveSlideIndex();
    let previousIndex = currentIndex;
    previousIndex = --previousIndex >= 0 ? previousIndex : (plugin.slides.length - 1);
    if (currentIndex !== previousIndex) {
      plugin.activeSlide(previousIndex, 'previous');
    }
  }
};
SliderDoctor.prototype.init = function() {
  const plugin = this;
  plugin.slides = [...plugin.selector.querySelectorAll(plugin.selectors.slide)];
  window.addEventListener('click', function(event) {
    if(selectorGEFELBCWISC(selectorSAEFTPU(event.target, []), plugin.classes.next, plugin.classes.controllers)) {
      plugin.next();
    }
    if(selectorGEFELBCWISC(selectorSAEFTPU(event.target, []), plugin.classes.previous, plugin.classes.controllers)) {
      plugin.previous();
    }
  });
};