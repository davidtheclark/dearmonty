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