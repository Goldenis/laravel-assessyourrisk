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
  var overlayOpen;

  var _currentModule = 0;
  var _currentQuestion = 0;
  var _currentVignette = 0;
  var _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0);
  var _myL = 0;
  var _preL = 0;

  var MOBILE_WIDTH = "767";
  var TABLET_WIDTH = "1024";
  var DESKTOP_WIDTH = "1350";
  
  var chart1;
  var chart2;
  var chart3;

  $(window).on('scroll',function(e){
    if(overlayOpen){
      return;
    }
    e.preventDefault();
  });
  $(window).on('mousewheel',function (eventData,deltaY) {
    if(overlayOpen){
      return;
    }
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
    if(overlayOpen){
      return;
    }
    _isTouchDevice = true;
    distance = 0;
    var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
    touchStartY = touch.pageY;
    clearInterval(inertiaInterval);
  })
  $(window).bind('touchmove',function(e){
    if(overlayOpen){
      return;
    }
    e.preventDefault();
    var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
    distance = touch.pageY-touchStartY;
    _currentFrame -= distance/3;
    _currentFrame = Math.floor(Math.max(_currentFrame,0));
    _scrollHandler();
    touchStartY = touch.pageY;
  })
  $(window).bind('touchend',function(e){
    if(overlayOpen){
      return;
    }
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
    // setFontScale($('.vignette .headlines h3, .prompt',2,2.2)
    // setFontScale($('h1'),3,5);
    // setFontScale($('h2'),3,4);
    // setFontScale($('h3'),2,3);
    // setFontScale($('h4'),1,2);
    // setFontScale($('h5'),.8,1.5);
    // setFontScale($('p'),.8,1.5);
    // setFontScale($('button'),.8,1.5);
    // setFontScale($('checkbox'),.8,1);
    setFontScale($('html'),11,16,'px');
  }
  function setFontScale (el,min,max,type){
    type = typeof type !== "undefined" ? type : "em";
    console.log(_winW*_winH)
    el.css({
      'font-size': Math.min(max,Math.max(min,max*((_winW*_winH)/1348438)))+type
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

      $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.video img')).css({
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

    $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.video img')).css({
      '-webkit-transform':"translateX("+(_myL)+"px)"
    })
    if(_currentHeadline.index() < $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).length-1){
      _currentHeadline.removeClass('active');
      _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(Math.floor(_currentFrame/50));
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
				['#D7006D','#D7006D','#D7006D','#D7006D','#D7006D','#D7006D','#D7006D','#FFFFFF']);
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
    $('.male-overlay .close-btn').on('click',function () {
      overlayOpen = false;
      $('.male-overlay').removeClass("in");
    })
    $('.progress-overlay .close-btn').on('click',function () {
      overlayOpen = false;
      $('.progress-overlay').removeClass("in");
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
    $('.module-hero').on('click',function(){
      changeModule($(this));
      preRoll();
    })
    $('.progress-overlay .vignettes .headline').on('click',function(){
      changeModule($(this));
      overlayOpen = false;
      $('.progress-overlay').removeClass("in");
      $('.assessment').removeClass('in');
      $('.right-column').addClass('left');
      $('.education').addClass('in');
    })
    $('.progress-overlay .questions h4').on('click',function() {
      overlayOpen = false; 
      $('.progress-overlay').removeClass("in");
      $('.assessment').addClass('in');
      $('.right-column').removeClass('left');
      $('.education').removeClass('in');
    })
    $('.progress').on('click',function(){
      $('.progress-overlay').addClass('in');
      overlayOpen = true;

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
    _currentModule = i;
    $('.progress-overlay .vignettes .headline').eq(i).css({
      opacity: .3
    })
    expandModule(i);
  }
  function expandModule(num){
    _currentModule = num;
    _currentVignette = 0;
    $('.nav').addClass('in');
    $('.nav-item').removeClass('active');
    $('.nav-item').eq(num).addClass('active');
    _currentFrame = 0;
    $('.education-menu').addClass('out');

    $('.module').removeClass('in');
    $('.vignette').removeClass('in');

    $('.module').eq(num).addClass('in');

    $('.module').eq(num).find($('.vignette')).eq(_currentVignette).addClass('in');
    $('.module').eq(num).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0).addClass('active');
    
    $('.education .section-title').addClass('in');
  }
  function toggleColumn() {
    $('.assessment').toggleClass('in');
    //$('.logo-white').toggleClass('in');
    $('.right-column').toggleClass('left');
    $('.education').toggleClass('in');
  }
  function answerQuestion(answer){
    if(_currentQuestion == $('.question').length){
      $('.progress-overlay').addClass('in');
    }
    switch (_currentQuestion){  
      case 0:
        if(answer.html() != "Yes"){
          $('.male-overlay').addClass('in');
          overlayOpen = true;
        }
        break;
      case 1:
        if(answer.html() == "Yes"){
          $('.male-overlay').addClass('in');
          overlayOpen = true;
        }
        break;
    }
    $('.progress-overlay .progress-question').eq(_currentQuestion).css({
      opacity: .3
    })
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
    $('.vignette').removeClass('in');
    _currentVignette++;
    _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0);
    $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).addClass('in');
    _scrollHandler();
    console.log(_currentModule,_currentVignette,_currentHeadline)
  }
  function createProgressOverlay() {
    var html = "<div class='section-title'>Risk Assessment</div>";
    for(var i=0;i < $('.prompt').length-1;i++){
      html += "<div class='progress-question'><b>Q" + (i+1) + ":</b><br><h4>" + $('.prompt').eq(i).html() + "</h4></div>"
    }
    $('.progress-overlay .questions').append(html);
  }
  $(document).ready(function() {

    //position the header to be 90%;
    _$window = $(window);
    _$document = $(window.document);
    createProgressOverlay();
    _registerEventListeners();
    _pageResize();
  });
})(jQuery);

