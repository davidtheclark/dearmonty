//require('./inject-nav');

var links = require('./links');
var Testimonials = require('./testimonial');
var MobileNav = require('./mobile-nav');

$(function() {

  links();

  if ($('#random-testimonial').length) {
    var homeTestimonials = new Testimonials('random-testimonial');
  }

  if (Modernizr.csstransforms) {
    var mobileNav = new MobileNav();
  }

});