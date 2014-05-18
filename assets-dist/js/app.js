(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
$('a[href="#wrapper"]').click(function() {
  $('#wrapper').velocity('scroll', { duration: 150, easing: 'linear' });
  return false;
});
},{}],2:[function(require,module,exports){
//require('./inject-nav');

require('./testimonial');
require('./footer');
},{"./footer":1,"./testimonial":3}],3:[function(require,module,exports){
var $inner = $('#random-testimonial-inner'),
    $helper,
    $btn = $('<a />')
      .attr('href', $inner.attr('data-random-href'))
      .addClass('random-testimonial-btn')
      .insertAfter($inner),
    testimonials = [],
    onDeck = 0;

function nextOnDeck() {
  onDeck = (onDeck < testimonials.length - 1) ? onDeck + 1 : 0;
}

function populateRandomTestimonials() {
  // prevent random grabbing from gettting
  // the same testimonial twice in a row
  var currentId = $inner.find('.testimonial').first().attr('id'),
      duplicate = testimonials[onDeck].id === currentId;
  if (duplicate) {
    // if it's a duplicate, get another one, then try again
    nextOnDeck();
    populateRandomTestimonials();
  } else {
    // if it's not a duplicate, populate
    $inner.html(testimonials[onDeck]);
    // if we're scrolled beneath the top of the testimonial
    // box, scroll back up
    if ($(window).scrollTop() > $inner.offset().top) {
      $inner.velocity('scroll', { duration: 150, easing: 'linear' });
    }
    // then set up the next
    nextOnDeck();
  }
}

$btn.click(function(e) {
  if (!testimonials.length) {
    // the first time the button is clicked, run AJAX request
    // and add its results to a new helper div
    $helper = $('<div />').appendTo($inner)
      .css('display', 'none')
      .load($(this).attr('href') + ' #testimonials', function() {
        // fill up helper with the randomly ordered testimonials,
        // then add them to our cached array,
        // then remove the no-longer-needed helper
        $helper.find('.testimonial').each(function() {
          testimonials.push(this);
        });
        populateRandomTestimonials();
        $helper.remove();
      });
  } else {
    // subsequent times, just use the cached testimonials
    populateRandomTestimonials();
  }
  // prevent default link behavior: this link got hijaxed
  return false;
});
},{}]},{},[2])