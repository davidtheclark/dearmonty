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