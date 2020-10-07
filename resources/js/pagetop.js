window.$ = window.jQuery = require('jquery');
$(window).on('load scroll', function(){
  if ($(window).scrollTop() > 300) {
    $('.js-scroll-top').fadeIn(400);
  } else {
    $('.js-scroll-top').fadeOut(400);
  }
});
