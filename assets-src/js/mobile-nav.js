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