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
  width = window.innerWidth;
  if (!isMobile && width < 769) {
    goMobile();
  } else if (isMobile && width > 769) {
    noMobile();
  }
}

if (window.innerWidth) {
  checkViewportWidth();
}

window.addEventListener('resize', _.throttle(checkViewportWidth, 500));