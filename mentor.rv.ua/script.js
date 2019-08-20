window.onscroll = function() {
  var scrolled = window.pageYOffset || document.documentElement.scrollTop;
  css.getElementById('showScroll').innerHTML = scrolled + 'px';
}