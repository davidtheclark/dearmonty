var nav = require('./nav');


var width, isMobile;

function goMobile() {
  nav.init();
  isMobile = true;
}

function noMobile() {
  nav.remove();
  isMobile = false;
}

function checkViewportWidth() {
  width = $(window).width();
  if (!isMobile && width < 769) {
    goMobile();
  } else if (isMobile && width > 769) {
    noMobile();
  }
}

if (Modernizr.csstransforms) {
  checkViewportWidth();
}

$(window).on('resize', _.throttle(checkViewportWidth, 500));