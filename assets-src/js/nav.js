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