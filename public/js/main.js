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

  var _currentQuestion = 0;
  var _currentVignette = 0;

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
    $('.intro').on('click',function(){
      $(this).addClass('hidden')
      $('.right-column').addClass('in')
      $('.assessment').addClass('in')
    })
    $('.dot').on('click',function(){

    });
    $('.assessment-intro button').on('click',function() {
      $('.assessment-intro').removeClass('in');
      $('.question').eq(0).addClass('in');
    })
    $('.question button').on('click',function(){
      answerQuestion();
    })
    $('.asterisk').on('mouseenter',function(){
      $(this).next().addClass("show")
    })
    $('.asterisk').on('mouseleave',function(){
      $(this).next().removeClass("show")
    })
    $('.understand-box').on('click',function(){
      $('.assessment').removeClass('in');
      $('.right-column').addClass('left');
      $('.education').addClass('in');
      $('.vignette').eq(_currentVignette).addClass('in');
    })
    _$window.bind('resize', _pageResize);
    _$window.on('mousewheel',function(e,deltaY){
      _scrollHandler(deltaY);
    });
    _$window.on('scroll',function(e){
      _scrollHandler();
    });
  }
  function answerQuestion(){
    $('.question').eq(_currentQuestion).removeClass('in')
    $('.dot').eq(_currentQuestion).removeClass('active')
    _currentQuestion++;
    $('.dot').eq(_currentQuestion).addClass('active')
    $('.question').eq(_currentQuestion).addClass('in')
  }

  $(document).ready(function() {

    //position the header to be 90%;
    _$window = $(window);
    _$document = $(window.document);
    _registerEventListeners();
    _pageResize();
  });
})(jQuery);

