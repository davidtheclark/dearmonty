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