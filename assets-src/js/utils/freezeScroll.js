// depends on classList polyfill

var scrollbarSize;

function getScrollbarSize() {
  // Thanks to code from MagnificPopup.
  if (!scrollbarSize) {
    var scrollDiv = document.createElement("div");
    scrollDiv.style.cssText = 'width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;';
    document.body.appendChild(scrollDiv);
    scrollbarSize = scrollDiv.offsetWidth - scrollDiv.clientWidth;
    document.body.removeChild(scrollDiv);
  }
  return scrollbarSize;
}

function freezeScrollOn() {
  var rootStyles = { overflow: 'hidden' };

  // If there is a scrollbar
  console.log(document.body.scrollHeight, window.innerHeight);
  if (document.body.scrollHeight > window.innerHeight) {
    // ... get its size
    var scrollbarSize = getScrollbarSize();
    // ... and if there's any size, offset right margin to account.
    if (scrollbarSize)
      document.documentElement.style.marginRight = scroll;
  }
  document.documentElement.style.overflow = 'hidden';
  document.documentElement.style.height = '100%';
  document.body.style.overflow = 'hidden';
  document.body.style.height = '100%';
}

function freezeScrollOff() {
  document.documentElement.style.marginRight = '';
  document.documentElement.style.overflow = '';
  document.documentElement.style.height = '';
  document.body.style.overflow = '';
  document.body.style.height = '';
}

module.exports = {
  on: freezeScrollOn,
  off: freezeScrollOff
};