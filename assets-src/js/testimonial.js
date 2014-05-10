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