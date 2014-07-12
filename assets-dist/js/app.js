(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
function links() {

  // hijack hash links and animate a scroll
  $(document).on('click', 'a[href^="#"]', function (e) {
    var target = $(this).attr('href');
    // don't hijack skip-to-content link
    if (target === '#site-body') return;
    // if it's an empty #, scroll to top
    var targetNode = $(target)[0] || document.documentElement;
    e.preventDefault();
    $('html,body').animate({
      scrollTop: $(targetNode).offset().top
    }, 'fast');
  });

}

module.exports = links;
},{}],2:[function(require,module,exports){
//require('./inject-nav');

var links = require('./links');
var Testimonials = require('./testimonial');
var MobileNav = require('./mobile-nav');
var sidesteps = require('./sidesteps');

$(function() {

  links();

  if ($('#random-testimonial').length) {
    var homeTestimonials = new Testimonials('random-testimonial');
  }

  if (Modernizr.csstransforms) {
    var mobileNav = new MobileNav();
  }

  sidesteps();

});
},{"./links":1,"./mobile-nav":3,"./sidesteps":4,"./testimonial":5}],3:[function(require,module,exports){
function MobileNav() {

  var $nav = $('#nav-container'),
      hiddenClass = 'is-mbl-hidden',
      activeClass = 'is-active',
      showingClass = 'is-showing-nav',
      readyClass = 'is-transition-ready',
      $header = $('#header'),
      $body = $('#site-body');

  $nav.addClass(hiddenClass);
  setTimeout(function () {
    $nav.addClass(readyClass);
  }, 40);

  // home button
  var $home = $('<a />')
    .addClass('mbl-btn mbl-home-btn')
    .text('DearMonty.com')
    .attr('href', '/')
    .prependTo($nav);

  // toggle button
  var $btn = $('<button />')
    .addClass('mbl-btn mbl-nav-btn')
    .html('<span class="icon icon-inline grunticon-menu-white"></span> menu')
    .appendTo($header)
    .click(toggleNav);

  // close buttons
  var $closeBtnTop = $('<button />')
    .addClass('mbl-btn mbl-close-btn-top')
    .html('<span class="icon grunticon-close-gray"></span>')
    .prependTo($nav)
    .click(toggleNav);

  var $closeBtnBottom = $('<button />')
    .addClass('btn btn-rust mbl-btn mbl-close-btn')
    .text('close')
    .appendTo($nav)
    .click(toggleNav);

  function toggleNav() {
    if (!$nav.hasClass(activeClass)) {
      $body.on('click.nav', toggleNav);
    } else {
      $body.off('click.nav');
    }
    $('html,body').animate({ scrollTop: 0 }, 'fast');
    $nav.toggleClass(activeClass);
    $body.toggleClass(showingClass);
  }

}

module.exports = MobileNav;
},{}],4:[function(require,module,exports){
function sidebar() {

  var $links = $('.sidestep-link');
  var currentClass = 'is-current';

  if (!$links.length) return;

  $links.each(function () {
    var $link = $(this);
    if ($link.attr('href') === window.location.href) {
      $link.addClass('is-current');
    }
  });

}

module.exports = sidebar;
},{}],5:[function(require,module,exports){
function Testimonials(elementId) {
  // element whose id is passed needs to have a
  // `data-random-href` attribute pointing to a page
  // with a #testimonials container that contains
  // the list of testimonials to draw from,
  // in a random order, each with the class `testimonial`

  var $el = $('#' + elementId),
      $win = $(window),
      sourceURL = $el.attr('data-random-href'),
      testimonials = [],
      onDeck = 0;

  fetchTestimonials();

  function fetchTestimonials() {
    var $helper = $('<div />')
      // .appendTo($el)
      // .hide()
      .load(sourceURL + ' #testimonials', function() {
        // fill up helper with the randomly ordered testimonials,
        // then add them to our cached array,
        // then remove the no-longer-needed helper
        $helper.find('.testimonial').each(function() {
          testimonials.push(this);
        });
        populateNextTestimonial();
        insertBtn();
        $helper.remove();
      });
  }

  function insertBtn() {
    $('<button />')
      .addClass('random-testimonial-btn')
      .insertAfter($el)
      .click(function(e) {
        if (!testimonials.length) {
          fetchTestimonials();
        } else {
          populateNextTestimonial();
        }
      });
  }

  function populateNextTestimonial() {
    var top = $el.offset().top;
    // populate
    $el.html(testimonials[onDeck]);
    // if we're scrolled beneath the top of the testimonial
    // box, scroll back up
    if ($win.scrollTop() > top) {
      $('html,body').animate({ scrollTop: top }, 'fast');
    }
    // then set up the next
    onDeck = (onDeck < testimonials.length - 1) ? onDeck + 1 : 0;
  }

}

module.exports = Testimonials;
},{}]},{},[2])