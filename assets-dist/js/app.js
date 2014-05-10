(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
$('a[href="#wrapper"]').click(function() {
  $('#wrapper').velocity('scroll', { duration: 150, easing: 'linear' });
  return false;
});
},{}],2:[function(require,module,exports){
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
},{"./nav":4}],3:[function(require,module,exports){
require('./inject-nav');

require('./testimonial');
require('./footer');
},{"./footer":1,"./inject-nav":2,"./testimonial":5}],4:[function(require,module,exports){
var showingMenuClass = 'is-showing-menu',
    visibleClass = 'is-visible',
    $navContainer = $('#nav-container'),
    $headerContainer = $('#header-container'),
    $wrapper = $('#wrapper'),
    $page = $('#page'),
    $searchContainer = $('#header-search'),
    $searchForm = $('#search-form'),
    $mblBtnContainer = $('<div class="row" />'),
    $mblSearchBtn = $('<button id="mbl-search-btn" class="mbl-header-btn">Search</button>'),
    $mblNavBtn = $('<button id="mbl-nav-btn" class="mbl-header-btn">Menu</button>'),
    $searchInput = $('#search-input'),
    isShowingMenu = false,
    isShowingSearch = false;

function showMenu() {
  // show
  $wrapper.addClass(showingMenuClass);
  // if you're not at the top of the screen, go there
  $('html,body').scrollTop(0);
  // clicking outside menu closes it
  setTimeout(function() {
    $page.on('click', hideMenu);
  }, 300);
  // set state
  isShowingMenu = true;
}

function hideMenu() {
  // hide
  $wrapper.removeClass(showingMenuClass);
  // remove click-outside-closes listener
  $page.off('click', hideMenu);
  // set state
  isShowingMenu = false;
}

function showSearch() {
  $searchContainer.addClass(visibleClass);
  $searchInput.focus();
  isShowingSearch = true;
}

function hideSearch() {
  $searchContainer.removeClass(visibleClass);
  $searchInput.blur();
  isShowingSearch = false;
}

function init() {

  // insert mobile button container
  $mblBtnContainer.insertBefore($searchContainer);

  // insert mobile menu button
  $mblBtnContainer.append($mblNavBtn);
  // move menu to special place
  $navContainer.insertBefore($page);
  // make the button work
  $mblNavBtn.on('click', function() {
    if (!isShowingMenu) {
      showMenu();
    } else {
      hideMenu();
    }
  });

  // indicate that search-toggling will happen
  $searchForm.addClass('will-toggle');
  // insert mobile search button
  $mblBtnContainer.append($mblSearchBtn);
  // make the button work
  $mblSearchBtn.on('click', function() {
    if (!isShowingSearch) {
      showSearch();
    } else {
      hideSearch();
    }
  });
}

function remove() {
  $mblNavBtn.remove();
  $mblSearchBtn.remove();
  $navContainer.insertBefore($searchContainer);
  hideMenu();
  hideSearch();
}


module.exports = {
  init: init,
  remove: remove
};
},{}],5:[function(require,module,exports){
var $inner = $('#random-testimonial-inner');
var $helper = $('<div />').appendTo($inner).css('display', 'none');
var $btn = $('<a />')
  .attr('href', $inner.attr('data-random-href'))
  .addClass('random-testimonial-btn')
  .insertAfter($inner);
var testimonials = [];
var onDeck = 0;

function nextOnDeck() {
  onDeck = (onDeck < testimonials.length - 1) ? onDeck + 1 : 0;
}

function populateRandomTestimonials() {
  var currentId = $inner.find('.testimonial').first().attr('id');
  var duplicate = testimonials[onDeck].id === currentId;
  if (duplicate) {
    nextOnDeck();
    populateRandomTestimonials();
  } else {
    $inner.html(testimonials[onDeck]);
    nextOnDeck();
  }
}

$btn.click(function(e) {
  e.preventDefault();
  if (!testimonials.length) {
    var href = $(this).attr('href');
    $helper.empty().load(href + ' #testimonials', function() {
      $helper.find('.testimonial').each(function() {
        testimonials.push(this);
      });
      populateRandomTestimonials();
    });
  } else {
    populateRandomTestimonials();
  }
});
},{}]},{},[3])