$('a[href="#wrapper"]').click(function() {
  $('#wrapper').velocity('scroll', { duration: 150, easing: 'linear' });
  return false;
});