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
  var _currentHeadline = $('.vignette').eq(_currentVignette).find($('h3')).eq(0);
  var _myL = 0;

  var MOBILE_WIDTH = "767";
  var TABLET_WIDTH = "1024";
  var DESKTOP_WIDTH = "1350";

  $(window).on('scroll',function(e){
    e.preventDefault();
  });
  $(window).on('mousewheel',function (eventData,deltaY) {
    if(_isTouchDevice){
      eventData.preventDefault();
    }else{
      _currentFrame -= deltaY;
      _currentFrame = Math.max(0,_currentFrame);
      _scrollHandler();
      eventData.preventDefault();
    }
  })
  $(window).bind('touchstart',function(e){
    isTouchDevice = true;
    moved = 0;
    var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
    touchStartY = touch.pageY;
    clearInterval(inertiaInterval);
  })
  $(window).bind('touchmove',function(e){
    e.preventDefault();
    var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
    moved = touch.pageY-touchStartY;
    _currentFrame -= moved/40;
    _currentFrame = Math.floor(Math.max(_currentFrame,0));
    touchStartY = touch.pageY;
  })
  $(window).bind('touchend',function(e){
    var inertiaInterval = setInterval(function(){
      moved*=.9;
      _currentFrame -= moved/20;
      _currentFrame = Math.floor(Math.max(_currentFrame,0));
      if(Math.abs(moved) < .2){
        clearInterval(inertiaInterval)
      }
    },10)
  })
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
  function _scrollHandler(){
    // scene 1
    _myL = Math.max((18681*-4)+1245.5,-1245.5*Math.floor(_currentFrame/2));

    $('.vignette').eq(_currentVignette).find($('.video img')).css({
      '-webkit-transform':"translateX("+(_myL)+"px)"
    })
    _currentHeadline.removeClass('active');
    _currentHeadline = $('.vignette').eq(_currentVignette).find($('h3')).eq(Math.floor(_currentFrame/50));
    _currentHeadline.addClass('active').css({
      //'-webkit-transform': 'translateX('+-_currentFrame+'px)'
    })
  
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
      $('.dot').eq(_currentQuestion).addClass('active')
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
    $('.toggle-box').on('click',function(){
      toggleColumn();
    })
    $('.assess').on('click',function(){
      
    })
    $('.module').on('click',function(){
      expandModule();
    })
    $('.vignette').on('click',function(){
      nextVignette();
    })
    _$window.bind('resize', _pageResize);
  }
  function expandModule(){
    _currentFrame = 0;
    $('.education-menu').addClass('out');
    $('.vignette').eq(_currentVignette).toggleClass('in');
  }
  function toggleColumn() {
    $('.assessment').toggleClass('in');
    $('.logo-white').toggleClass('in');
    $('.right-column').toggleClass('left');
    $('.education').toggleClass('in');
  }
  function answerQuestion(){
    $('.question').eq(_currentQuestion).addClass('out-up')
    $('.question').eq(_currentQuestion).removeClass('in')
    $('.dot').eq(_currentQuestion).removeClass('active')
    _currentQuestion++;
    $('.dot').eq(_currentQuestion).addClass('active')
    $('.question').eq(_currentQuestion).addClass('in')
  }
  function nextVignette(){
    $('.vignette').eq(_currentVignette).toggleClass('in');
    _currentVignette++;
    $('.vignette').eq(_currentVignette).toggleClass('in');
  }

  $(document).ready(function() {

    //position the header to be 90%;
    _$window = $(window);
    _$document = $(window.document);
    _registerEventListeners();
    _pageResize();
  });
})(jQuery);

