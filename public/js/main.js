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
  var touchStartY;
  var preRollInterval;
  var vidW = 1271;

  var _currentQuestion = 0;
  var _currentVignette = 0;
  var _currentHeadline = $('.vignette').eq(_currentVignette).find($('h3')).eq(0);
  var _myL = 0;
  var _preL = 0;

  var MOBILE_WIDTH = "767";
  var TABLET_WIDTH = "1024";
  var DESKTOP_WIDTH = "1350";
  
  var chart1;
  var chart2;
  var chart3;

  $(window).on('scroll',function(e){
    e.preventDefault();
  });
  $(window).on('mousewheel',function (eventData,deltaY) {
    console.log(_isTouchDevice)
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
    _isTouchDevice = true;
    distance = 0;
    var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
    touchStartY = touch.pageY;
    clearInterval(inertiaInterval);
  })
  $(window).bind('touchmove',function(e){
    e.preventDefault();
    var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
    distance = touch.pageY-touchStartY;
    _currentFrame -= distance/3;
    _currentFrame = Math.floor(Math.max(_currentFrame,0));
    _scrollHandler();
    touchStartY = touch.pageY;
  })
  $(window).bind('touchend',function(e){
    var inertiaInterval = setInterval(function(){
      distance*=.9;
      _currentFrame -= distance/3;
      _currentFrame = Math.floor(Math.max(_currentFrame,0));
      _scrollHandler();
      if(Math.abs(distance) < .2){
        clearInterval(inertiaInterval)
      }
    },10)
  })
  function _pageResize () {
    _winH = _$window.height();
    _winW = _$window.width();
    _scrollHandler(0);
    if(_winW < 1000){
      _smallScreen = true;
    }else{
      _smallScreen = false;
    }
    $('.vignette .headlines h3, .prompt').css({
      'font-size': Math.max(2,2.2*((_winW*_winH)/1440000))+"em"
    })
  }  
  function redraw() {
    if(_isTouchDevice){
      window.requestAnimationFrame(function() {
         _scrollHandler();
      });
    }
  }
  function preRoll(){
    // scene 1
    var _myFrame = 0;
    var dir = 'forward';
    _preL = 0;
    clearInterval(preRollInterval)
    preRollInterval = setInterval(function(){
      _preL = Math.max(-vidW*79,-vidW*Math.floor(_myFrame/2));
      if(_smallScreen){
        _preL -= 220;
      }

      $('.vignette').eq(_currentVignette).find($('.video img')).css({
        '-webkit-transform':"translateX("+(_preL)+"px)"
      })
      if(_myFrame >= 50){
        dir = "backward"
      }
      if(dir == "forward"){
        _myFrame++;
      }else{
        _myFrame--;
      }
      if(_myFrame <= 0){
        clearInterval(preRollInterval);
      }
    },20)
     
  }
  function _scrollHandler(){
    // scene 1
    _myL = Math.max(-vidW*79,-vidW*Math.floor(_currentFrame/2));
    if(_smallScreen){
      _myL -= 220;
    }

    $('.vignette').eq(_currentVignette).find($('.video img')).css({
      '-webkit-transform':"translateX("+(_myL)+"px)"
    })
    if(_currentHeadline.index() < $('.vignette').eq(_currentVignette).find($('h3')).length-1){
      _currentHeadline.removeClass('active');
      _currentHeadline = $('.vignette').eq(_currentVignette).find($('h3')).eq(Math.floor(_currentFrame/50));
      _currentHeadline.addClass('active');
    }
  }
  
  function addCharts() {
	  chart1 = new DonutChartBuilder('.chart-1',
				10,
				3,
				[1,.01,.01,.01,.01,.01,.01,.01], 
				['#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF'], 
				null);
	  chart2 = new DonutChartBuilder('.chart-2',
				8,
				0,
				[.01,.99], 
				['#D7006D','#FFFFFF'], 
				null);
	  chart3 = new DonutChartBuilder('.chart-3',
				8,
				0,
				[.01,.99], 
				['#D7006D','#FFFFFF'], 
				null);
	  setTimeout(transCharts, 1000);
	/* Only use this if it needs to watch the container and resize with the div
	$( window ).resize(function() {
		a.updateDims();
	});
	*/
  }
  function transCharts() {
	  chart1.transitionToValues (5,
				10,
				[1,1,1,1,1,1,1,1], 
				['#FEB6A8','#FEB6A8','#FEB6A8','#FEB6A8','#FEB6A8','#FEB6A8','#FEB6A8','#FFFFFF']);
	  chart2.transitionToValues (5,
				8,
				[.2, .8], 
				['#D7006D','#FFFFFF']);
	  chart3.transitionToValues (5,
				8,
				[.68, .32], 
				['#D7006D','#FFFFFF']);
  }
  
  function _registerEventListeners() {
    $('.intro').on('click',function(){
      $(this).addClass('out-up')
      $('.right-column').addClass('in')
      $('.assessment').addClass('in');
      $('.border').addClass('white');
    })
    $('.overlay .close-btn').on('click',function () {
      $('.overlay').removeClass("in");
      //$('.logo-white').toggleClass('in');
    })
    $('.dot').on('click',function(){

    });
    $('#Begin').on('click',function(){
    	addCharts();
    });
    $('.assessment-intro button').on('click',function() {
      $('.assessment-intro').addClass('out-up');
      $('.assessment-intro').removeClass('in');
      $('.question').eq(0).addClass('in');
      $('.dot').eq(_currentQuestion).addClass('active');
    })
    $('.question button').on('click',function(){
      answerQuestion($(this));
    })
    $('.asterisk').on('mouseenter',function(){
      $(this).next().addClass("show")
    })
    $('.asterisk').on('mouseleave',function(){
      $(this).next().removeClass("show")
    })
    $('.toggle-box, .fact-group').on('click',function(){
      toggleColumn();
    })
    $('.assess').on('click',function(){
      
    })
    $('.module').on('click',function(){
      changeModule($(this));
      preRoll();
    })
    $('.nav-item').on('click',function () {
      changeModule($(this));
    })
    $('.vignette, .btn-continue').on('click',function(){
      nextVignette();
    })
    $('.bottle').on('mousedown',function(e){
      e.preventDefault();
      var x = e.pageX;
      var distance = 0;
      var l;
      var currentGlass;
      _$window.bind('mousemove',function(e){
        distance = x-e.pageX;
        l = Math.max(50,$('.bottle').position().left-distance);
        l = Math.min(l,550);
        currentGlass = Math.floor((l-5)/59);
        $('.drink img').eq(currentGlass).css({
          opacity: 1
        })
        $('.drink img').eq(currentGlass+1).css({
          opacity: 0
        })
        $('.bottle').css({
          left: l,
          //'-webkit-transform': 'rotate('+distance+'deg)'
        })
        x = e.pageX;
        distance = 0;
      })
    })
    _$window.on('mouseup',function () {
      _$window.unbind('mousemove');
    })
    _$window.bind('resize', _pageResize);
  }
  function changeModule(e){
    var $this = e;
    var i = $this.index();
    expandModule(i);
  }
  function expandModule(num){
    $('.nav').addClass('in');
    $('.nav-item').removeClass('active');
    $('.nav-item').eq(num).addClass('active');
    _currentFrame = 0;
    $('.education-menu').addClass('out');
    $('.vignette').eq(_currentVignette).removeClass('in');
    $('.family-history').removeClass('in');
    $('.normal').removeClass('in');
    if(num == 0){
      $('.vignette').eq(_currentVignette).toggleClass('in');
    }else if(num == 1){
      $('.family-history').addClass('in');
    }else if(num == 2){
      $('.normal').toggleClass('in');
    }
    $('.education .section-title').addClass('in');
  }
  function toggleColumn() {
    $('.assessment').toggleClass('in');
    //$('.logo-white').toggleClass('in');
    $('.right-column').toggleClass('left');
    $('.education').toggleClass('in');
  }
  function answerQuestion(answer){
    switch (_currentQuestion){  
      case 0:
        if(answer.html() == "Yes"){
          $('.tooltip-bottom').html('Then this could save your life.')
        }else{
          $('.overlay').addClass('in');
          //$('.logo-white').toggleClass('in');
        }
        break;
      case 1:
        if(answer.html() == "Yes"){
          $('.overlay').addClass('in');
        }
        break;

    }
    $('.question').eq(_currentQuestion).addClass('out-up')
    $('.question').eq(_currentQuestion).removeClass('in')
    $('.dot').eq(_currentQuestion).removeClass('active')
    _currentQuestion++;
    $('.dot').eq(_currentQuestion).addClass('active')
    $('.question').eq(_currentQuestion).addClass('in')
  }
  function nextVignette(){
    preRoll();
    _currentFrame = 0;
    $('.vignette').eq(_currentVignette).toggleClass('in');
    _currentVignette++;
    _currentHeadline = $('.vignette').eq(_currentVignette).find($('h3')).eq(0);
    $('.vignette').eq(_currentVignette).toggleClass('in');
    _scrollHandler();
  }

  $(document).ready(function() {

    //position the header to be 90%;
    _$window = $(window);
    _$document = $(window.document);
    _registerEventListeners();
    _pageResize();
  });
})(jQuery);

