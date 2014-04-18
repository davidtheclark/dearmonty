(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
// https://github.com/remy/polyfills/blob/master/classList.js

(function () {

if (typeof window.Element === "undefined" || "classList" in document.documentElement) return;

var prototype = Array.prototype,
    push = prototype.push,
    splice = prototype.splice,
    join = prototype.join;

function DOMTokenList(el) {
  this.el = el;
  // The className needs to be trimmed and split on whitespace
  // to retrieve a list of classes.
  var classes = el.className.replace(/^\s+|\s+$/g,'').split(/\s+/);
  for (var i = 0; i < classes.length; i++) {
    push.call(this, classes[i]);
  }
};

DOMTokenList.prototype = {
  add: function(token) {
    if(this.contains(token)) return;
    push.call(this, token);
    this.el.className = this.toString();
  },
  contains: function(token) {
    return this.el.className.indexOf(token) != -1;
  },
  item: function(index) {
    return this[index] || null;
  },
  remove: function(token) {
    if (!this.contains(token)) return;
    for (var i = 0; i < this.length; i++) {
      if (this[i] == token) break;
    }
    splice.call(this, i, 1);
    this.el.className = this.toString();
  },
  toString: function() {
    return join.call(this, ' ');
  },
  toggle: function(token) {
    if (!this.contains(token)) {
      this.add(token);
    } else {
      this.remove(token);
    }

    return this.contains(token);
  }
};

window.DOMTokenList = DOMTokenList;

function defineElementGetter (obj, prop, getter) {
    if (Object.defineProperty) {
        Object.defineProperty(obj, prop,{
            get : getter
        });
    } else {
        obj.__defineGetter__(prop, getter);
    }
}

defineElementGetter(Element.prototype, 'classList', function () {
  return new DOMTokenList(this);
});

})();
},{}],2:[function(require,module,exports){
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
},{"./nav":3}],3:[function(require,module,exports){
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
},{"./lib/classlist-polyfill":1}]},{},[2])