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