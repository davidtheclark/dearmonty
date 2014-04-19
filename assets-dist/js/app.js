(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
var nav = require('./nav');


var width, isMobile;

function goMobile() {
  nav.init();
  isMobile = true;
}

function noMobile() {
  nav.remove();
  isMobile = false;
}

function checkViewportWidth() {
  width = window.innerWidth;
  if (!isMobile && width < 769) {
    goMobile();
  } else if (isMobile && width > 769) {
    noMobile();
  }
}

if (window.innerWidth) {
  checkViewportWidth();
}

window.addEventListener('resize', _.throttle(checkViewportWidth, 500));
},{"./nav":2}],2:[function(require,module,exports){
var showingMenuClass = 'is-showing-menu',
    visibleClass = 'is-visible',
    $navContainer = $('#nav-container'),
    $headerContainer = $('#header-container'),
    $wrapper = $('#wrapper'),
    $page = $('#page'),
    $searchContainer = $('#header-search'),
    $searchForm = $('#search-form'),
    $mblBtnContainer = $('<div class="row" />'),
    $mblSearchBtn = $('<button id="mbl-search-btn" class="mbl-header-btn">Search</button>'),
    $mblNavBtn = $('<button id="mbl-nav-btn" class="mbl-header-btn">Menu</button>'),
    $searchInput = $('#search-input'),
    isShowingMenu = false,
    isShowingSearch = false;

function showMenu() {
  // show
  $wrapper.addClass(showingMenuClass);
  // if you're not at the top of the screen, go there
  $('html,body').scrollTop(0);
  // clicking outside menu closes it
  setTimeout(function() {
    $page.on('click', hideMenu);
  }, 300);
  // set state
  isShowingMenu = true;
}

function hideMenu() {
  // hide
  $wrapper.removeClass(showingMenuClass);
  // remove click-outside-closes listener
  $page.off('click', hideMenu);
  // set state
  isShowingMenu = false;
}

function showSearch() {
  $searchContainer.addClass(visibleClass);
  $searchInput.focus();
  isShowingSearch = true;
}

function hideSearch() {
  $searchContainer.removeClass(visibleClass);
  $searchInput.blur();
  isShowingSearch = false;
}

function init() {

  // insert mobile button container
  $mblBtnContainer.insertBefore($searchContainer);

  // insert mobile menu button
  $mblBtnContainer.append($mblNavBtn);
  // move menu to special place
  $navContainer.insertBefore($page);
  // make the button work
  $mblNavBtn.on('click', function() {
    if (!isShowingMenu) {
      showMenu();
    } else {
      hideMenu();
    }
  });

  // indicate that search-toggling will happen
  $searchForm.addClass('will-toggle');
  // insert mobile search button
  $mblBtnContainer.append($mblSearchBtn);
  // make the button work
  $mblSearchBtn.on('click', function() {
    if (!isShowingSearch) {
      showSearch();
    } else {
      hideSearch();
    }
  });
}

function remove() {
  $mblNavBtn.remove();
  $mblSearchBtn.remove();
  $navContainer.insertBefore($searchContainer);
  hideMenu();
  hideSearch();
}


module.exports = {
  init: init,
  remove: remove
};
},{}]},{},[1])