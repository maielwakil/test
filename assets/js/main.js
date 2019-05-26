// [...document.querySelectorAll('.component.type--main-slider')].map(element => new Slider({selector: element})).forEach(slider => slider.init());

[...document.querySelectorAll('.component.type--doctors')].map(element => new SliderDoctor({selector: element})).forEach(slider => slider.init());
$(document).ready(function() {
  $('.component.type--main-slider').slider();
  $('.thumbnails-viewport').scrolling();
  $('.component.type--galleries').galleries();
});