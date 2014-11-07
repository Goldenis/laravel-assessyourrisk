(function($, undefined) {
  var _$window;
  var _$document;
  var _winH;
  var _winW;
  var _smallScreen;
  var _isTouchDevice = Modernizr.touch;
  var _ie = window.navigator.userAgent.indexOf("MSIE ") >= 0;
  if(_ie){
    $('.body').addClass('ie');
  }
  var _android = window.navigator.userAgent.indexOf("Android") >= 0;
  var _iPhone = window.navigator.userAgent.indexOf("iPhone") >= 0;
  var _currentFrame = 0;
  var inertiaInterval;
  var scrollTop = 0;
  var containerTop = 0;
  var _frameRange;
  var touchInterval;

  var MOBILE_WIDTH = "767";
  var TABLET_WIDTH = "1024";
  var DESKTOP_WIDTH = "1350";

  function _scrollHandler(deltaY){
    _currentFrame = Math.max(0,_$window.scrollTop());
  }
  function _pageResize () {
    _winH = _$window.height();
    _winW = _$window.width();
    _scrollHandler(0);
  }  function redraw() {
    if(_isTouchDevice){
      window.requestAnimationFrame(function() {
         _scrollHandler();
      });
    }
  }
  function _registerEventListeners() {
    
    $('.dot').on('click',function(){

    });
    _$window.bind('resize', _pageResize);
      _$window.on('mousewheel',function(e,deltaY){
        _scrollHandler(deltaY);
      });
      _$window.on('scroll',function(e){
        _scrollHandler();
      });
  }


  $(document).ready(function() {

    //position the header to be 90%;
    _$window = $(window);
    _$document = $(window.document);
    _registerEventListeners();
    _pageResize();
  });
})(jQuery);

