require('./lib/classlist-polyfill');

var showingMenuClass = 'is-showing-menu',
    visibleClass = 'is-visible',
    navContainer = document.getElementById('nav-container'),
    headerContainer = document.getElementById('header-container'),
    wrapper = document.getElementById('wrapper'),
    page = document.getElementById('page'),
    searchContainer = document.getElementById('header-search'),
    searchForm = document.getElementById('search-form'),
    isShowingMenu = false,
    isShowingSearch = false;

function showMenu() {
  // show
  wrapper.classList.add(showingMenuClass);
  // clicking outside menu closes it
  setTimeout(function() {
    page.addEventListener('click', hideMenu);
  }, 300);
  // set state
  isShowingMenu = true;
}

function hideMenu() {
  // hide
  wrapper.classList.remove(showingMenuClass);
  // remove click-outside-closes listener
  page.removeEventListener('click', hideMenu);
  // set state
  isShowingMenu = false;
}

function showSearch() {
  searchContainer.classList.add(visibleClass);
  isShowingSearch = true;
}

function hideSearch() {
  searchContainer.classList.remove(visibleClass);
  isShowingSearch = false;
}

function init() {
  // insert mobile menu button
  navContainer.insertAdjacentHTML('beforebegin', '<button id="mbl-nav-btn">Menu</button>');
  // move menu to special place
  wrapper.insertBefore(navContainer, page);
  // make the button work
  document.getElementById('mbl-nav-btn').addEventListener('click', function() {
    if (!isShowingMenu) {
      showMenu();
    } else {
      hideMenu();
    }
  });

  // indicate that search-toggling will happen
  searchForm.classList.add('will-toggle');
  // insert mobile search mutton
  searchContainer.insertAdjacentHTML('beforebegin', '<button id="mbl-search-btn">Search</button>');
  // make the button work
  document.getElementById('mbl-search-btn').addEventListener('click', function() {
    if (!isShowingSearch) {
      showSearch();
    } else {
      hideSearch();
    }
  });
}

function remove() {
  headerContainer.removeChild(document.getElementById('mbl-nav-btn'));
  headerContainer.insertBefore(navContainer, searchContainer);
  hideMenu();

  headerContainer.removeChild(document.getElementById('mbl-search-btn'));
  hideSearch();
}


module.exports = {
  init: init,
  remove: remove
};