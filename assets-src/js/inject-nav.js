var nav = require('./nav');

var isMobile;

function goMobile() {
  nav.init();
  isMobile = true;
}

function noMobile() {
  nav.remove();
  isMobile = false;
}

function checkViewportWidth() {
  width = $(window).outerWidth();
  console.log(width);
  if (!isMobile && matchMedia('only screen and (max-width: 48.1em)').matches) {
    goMobile();
  } else if (isMobile) {
    noMobile();
  }
}

if (Modernizr.csstransforms) {
  checkViewportWidth();
}

$(window).on('resize', _.throttle(checkViewportWidth, 500));