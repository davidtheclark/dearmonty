//require('./inject-nav');

var links = require('./links');
var Testimonials = require('./testimonial');
var MobileNav = require('./mobile-nav');
var sidesteps = require('./sidesteps');

(function($) {
  $(function () {
    sidesteps();
    links();
    if ($('#random-testimonial').length) {
      var homeTestimonials = new Testimonials('random-testimonial');
    }
    if (Modernizr.csstransforms) {
      var mobileNav = new MobileNav();
    }
  });
}(jQuery));