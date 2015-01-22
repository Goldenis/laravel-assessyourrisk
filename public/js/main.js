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
  var initialized;
  var videoType;

  var _currentView = "left";
  var _currentModule = 0;
  var _oldModule;
  var _currentQuestion = 0;
  var _totalQuestions;
  var _totalHeadlines;
  var _currentVignette = 0;
  var _oldVignette;
  var _currentHeadline;
  var _oldHeadline;
  var _myL = 0;
  var _preL = 0;

  var _currentVideo;

  // setInterval(function(){
  //   $('.person').html(people[Math.floor(Math.random()*people.length)])
  // },2000);

  var MOBILE_WIDTH = "767";
  var TABLET_WIDTH = "1024";
  var DESKTOP_WIDTH = "1350";

  var people = ["sister","aunt","mom","girl crush","partner in crime","friend-at-first-sight","maid of honor"];
  
  var chart1;
  var chart2;
  var chart3;
  var chart4;
  var chart5;
  
  var savedQuizProgress = {};
  var savedDiveProgress = {};
  var lastDeepSave = null;
  var currentGlass = 0;

  var receivedBMI = false;


  $(window).on('scroll',function(e){
    // if(overlayOpen){
    //   return;
    // }
  });
  $(window).on('mousewheel',function (eventData,deltaY) {
    // if(overlayOpen){
    //   return;
    // }
    // if(_isTouchDevice){
    //   eventData.preventDefault();
    // }else{
    //   _currentFrame -= deltaY;
    //   _currentFrame = Math.max(0,_currentFrame);
    //   //_scrollHandler();
    //   eventData.preventDefault();
    // }
  })
  $(window).bind('touchstart',function(e){
    // if(overlayOpen){
    //   return;
    // }
    // _isTouchDevice = true;
    // distance = 0;
    // var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
    // touchStartY = touch.pageY;
    // clearInterval(inertiaInterval);
  })
  $(window).bind('touchmove',function(e){
    // if(overlayOpen){
    //   return;
    // }
    // e.preventDefault();
    // var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
    // distance = touch.pageY-touchStartY;
    // _currentFrame -= distance/10;
    // _currentFrame = Math.floor(Math.max(_currentFrame,0));
    // //_scrollHandler();
    // touchStartY = touch.pageY;
  })
  $(window).bind('touchend',function(e){
    // if(overlayOpen){
    //   return;
    // }
    // var inertiaInterval = setInterval(function(){
    //   distance*=.9;
    //   _currentFrame -= distance/3;
    //   _currentFrame = Math.floor(Math.max(_currentFrame,0));
    //   //_scrollHandler();
    //   if(Math.abs(distance) < .2){
    //     clearInterval(inertiaInterval)
    //   }
    // },10)
  })


  function _pageResize () {
    _winH = _$window.height();
    _winW = _$window.width();
    //_scrollHandler(0);
    if(_winW < 768){
      _smallScreen = true;
      $('.module-hero h1').eq(1).html('Normal')
      $('.module-hero h1').eq(2).html('Family')
    }else{
      _smallScreen = false;
      $('.module-hero h1').eq(1).html('Knowing Your Normal')
      $('.module-hero h1').eq(2).html('Family & Health History')
    }
    if(_winW/_winH > 1.8){
      $('video').css({
        width: _winW,
        height: 'auto'
      })
    }else{
      $('video').css({
        height: _winH,
        width: 'auto'
      })
    }
    setFontScale($('html'),11,16,'px');
    // $('.wheel-container').css({
    //   'transform': 'scale(' + (_winW*_winH)/1048438 + ') translate(-50%,-50%)'
    // });
  }
  function killWidows() {
    var wordArray = $(this).text().split(" ");
    if (wordArray.length > 1) {
      wordArray[wordArray.length-2] += "&nbsp;" + wordArray[wordArray.length-1];
      wordArray.pop();
      $(this).html(wordArray.join(" "));
    }
  }
  function setFontScale (el,min,max,type){
    type = typeof type !== "undefined" ? type : "rem";
    el.css({
      'font-size': Math.min(max,Math.max(min,max*((_winW*_winH)/1348438)))+type
    })
  }
  function redraw() {
    if(_isTouchDevice){
      // window.requestAnimationFrame(function() {
      //    _scrollHandler();
      // });
    }
  }
  function showNextHeadline(){
    // _currentFrame += 15;
    // _scrollHandler();
    console.log("Next Headline")
    var numHeadlines = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).length;
    var nextHeadline = _currentHeadline.index() + 1;
    if (initialized && nextHeadline < numHeadlines){
      _currentHeadline.removeClass('active');
      _currentHeadline.addClass('out');
      _oldHeadline = _currentHeadline;
      _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(nextHeadline);
      fillDot();
      _currentHeadline.removeClass('out');
      _currentHeadline.addClass('active');
      
      handleSaveDeepProgress();
    }else{
      nextVignette();
    }
  }
  function fillDot() {
    $('.education .dot').eq($('.headline').index(_currentHeadline)).addClass('active');
  }
  function _scrollHandler(){
    var numHeadlines = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).length;
    var nextHeadline = _currentHeadline.index() + 1;
    if (initialized && nextHeadline < numHeadlines){
      _currentHeadline.removeClass('active');
      _currentHeadline.addClass('out');
      _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(nextHeadline);
      _currentHeadline.removeClass('out');
      _currentHeadline.addClass('active');
      
      handleSaveDeepProgress();
    }else{
      nextVignette();
    }

    console.log(numHeadlines, nextHeadline-1);

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
    chart4 = new DonutChartBuilder('.chart-4',
        8,
        8,
        [.01,.99], 
        ['#D7006D','#FFFFFF'], 
        null);
    chart5 = new DonutChartBuilder('.chart-5',
        8,
        8,
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
        ['#FFB4AA','#FFB4AA','#FFB4AA','#FFB4AA','#FFB4AA','#FFB4AA','#FFB4AA','#D7006D']);
  }
  
  function _registerEventListeners() {
    $('#Begin, .assess-start').on('click',function(e){
      $('.vid-container').remove();
      e.stopPropagation();
      hideIntro();
      addCharts();
    })
    $('.male-overlay .close-btn').on('click',function () {
      $('.vid-container').remove();
      overlayOpen = false;
      $('.male-overlay').removeClass("in");
    })
    $('.your-risk .read-more').on('click',function(){
      $('.vid-container').remove();
      $(this).css({
        display: "none"
      })
      $('.more-results').css({
        display: 'block'
      })
    })
    $('.progress-overlay .email-pdf').on('click',function () {
      window.location.href = 'mailto:?subject=Here are the results of your risk assessment';
    })
    $('.progress-overlay .share-btn').on('click',function () {
      window.location.href = 'mailto:?subject=Saving your life&body=You’re welcome: http://www.brightpink.com/assessment';
    })
    $('.male-overlay .share-btn').on('click',function () {
      window.location.href = 'mailto:?subject=Saving your life&body=You’re welcome: http://www.brightpink.com/assessment';
    })
    $('.progress-overlay .close-btn').on('click',closeProgressOverlay);
    $('.assessment-intro button, .lets-go').on('click',function() {
      $('.right-column').addClass('in2')
      $('.assessment-intro').addClass('out-up');
      $('.assessment-intro').removeClass('in');
      $('.question').eq(0).addClass('in');
      $('.assessment .dot').eq(_currentQuestion).addClass('active');
    })
    $('.ask').on('click',askHandler);
    $('.btn-calculate').on('click',function(e){
      calculateWeight($(this));
    })
    $('.question .answers button').on('click',function(e){
      if(!$(this).hasClass('sub')){
        answerQuestion($(this));
      }
    })
    $('.asterisk').on('mouseenter',function(){
      $(this).next().addClass("show");
      $(this).next().css({
        left: $(this).offset().left
      })
    })
    $('.asterisk').on('mouseleave',function(){
      $(this).next().removeClass("show")
    })
    $('.assess').on('click',function(){
      toggleColumn();
      $.address.path('/assessment');
    })
    $('.understand').on('click',function(){
      toggleColumn();
      $.address.path('/education');
    })
    $('.module-hero').on('click',function(){
      changeModule($(this).index());
    })
    $('.progress-overlay .vignettes h3').on('click',function(){
      changeModule($('.progress-overlay .vignettes h3').index($(this)));
      closeProgressOverlay();
      $('.assessment').removeClass('in');
      $('.right-column').addClass('left');
      $('.menu-icon').addClass('left');
      $('.education').addClass('in');
    })
    $('.progress-overlay .questions h4').on('click',function() {
      toggleLogo();
      closeProgressOverlay();
      $('.assessment').addClass('in');
      $('.right-column').removeClass('left');
      $('.menu-icon').removeClass('left');
      $('.education').removeClass('in');
    })
    $('.menu-icon').on('click',function(){
      if(!overlayOpen){
        openProgressOverlay();
      }else{
        closeProgressOverlay();
      }
    })
    $('.nav-item').on('click',function () {
      changeModule($(this).index());
    })
    $('.text-me').on('click',function () {
      window.open('http://www.brightpink.org/awareness-to-action/breast-health-reminders/');
    })
    $('.btn-begin').on('click',function(){
      showNextHeadline();
    })
    $('.btn-continue').on('click',function (e) {
      e.stopPropagation();
      showNextHeadline();
    })
    $('.bottle').on('mousedown',function(e){
      e.preventDefault();
      var x = e.pageX;
      var distance = 0;
      var l;
      
      _$window.bind('mousemove',function(e){
        var newX = e.pageX;
        dragBottle(x, newX)
        x = e.pageX;
        distance = 0;
      })
    })
    _$window.on('mouseup',function () {
      _$window.unbind('mousemove');
    })
    $('.bottle').on('touchstart',function(e){
      var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
      e.preventDefault();
      var x = touch.pageX;
      var distance = 0;
      var l;
      
      _$window.bind('touchmove',function(e){
        var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
        var newX = touch.pageX;
        dragBottle(x, newX)
        x = touch.pageX;
        distance = 0;
      })
    })
    _$window.on('touchend',function () {
      _$window.unbind('touchmove');
    })
    _$window.bind('resize', _pageResize);
  }
  function dragBottle(x, newX) {
    distance = x-newX;
    var min = 50;
    if(_smallScreen){
      min = 20;
    }
    l = Math.max(min,$('.bottle').position().left-distance);
    l = Math.min(l,550);
    var glassW = 59;
    if(_smallScreen){
      glassW = 25;
    }
    currentGlass = Math.floor((l-5)/glassW);
    for(var i=0;i<$('.drink').length;i++){
      if(i <= currentGlass){
        $('.drink img').eq(i).css({
          opacity: 1
        })
      }else{
        $('.drink img').eq(i).css({
          opacity: 0
        })
      }
    }
    $('.bottle').css({
      left: l,
      //'-webkit-transform': 'rotate('+distance+'deg)'
    })
  }
  function createDots() {
    for (var i = 0; i < _totalQuestions; i++) {
      var dot = '<div class="dot"></div>';
      $('.assessment .dots').append(dot);
    };
    for (var i = 0; i < _totalHeadlines; i++) {
      var dot = '<div class="dot"></div>';
      $('.education .dots').append(dot);
    };
    $('.education .dot').on('click',changeHeadline);
    $('.percdive').html(0 + '/' + _totalHeadlines);
    $('.percquiz').html(0 + '/' + _totalQuestions);
    $('.education .dots h6').eq(1).css({
      left: $('.module').eq(0).find($(".headline")).length * (parseInt($('html').css('font-size')) + $('.dot').eq(0).width())
    })
    $('.education .dots h6').eq(2).css({
      left: $('.education h6').eq(1).position().left + $('.module').eq(1).find($(".headline")).length * (parseInt($('html').css('font-size')) + $('.dot').eq(0).width())
    })
  }
  function hideIntro() {
    $('.intro').addClass('out-up')
    $('.right-column').addClass('in')
    $('.assessment').addClass('in');
    $('.border').addClass('white');
  };

  function openProgressOverlay() {
    $('.progress-overlay').addClass('in');
    overlayOpen = true;
  }
  function closeProgressOverlay() {
    $('.progress-overlay').removeClass("in");
    overlayOpen = false;
  }
  function changeModule(i){
    _oldModule = _currentModule;
    _currentModule = i;
    _oldVignette = null;
    _currentVignette = 0;
    _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0);
    $('.vid-container').remove();
    if(_oldModule !== undefined){
      closeModule(_oldModule);
    }
    $('.progress-overlay .vignettes h2').eq(i).addClass('done');

    expandModule(i);
  }
  function changeHeadline(){
    _oldModule = _currentModule;
    var idx = $('.education .dot').index($(this));
    _currentHeadline = $('.headline').eq(idx);
    _currentModule =  $('.module').index(_currentHeadline.closest('.module'));
    _currentVignette = $('.module').eq(_currentModule).find(_currentHeadline.closest('.vignette')).index();

    if(_oldModule !== undefined){
      closeModule(_oldModule);
    }
    
    expandModule(_currentModule);
  }
  function expandModule(){
    handleSaveDeepProgress();
    $('.nav').addClass('in');
    $('.right-column').addClass('down');
    $('.nav-item').removeClass('active');
    $('.nav-item').eq(_currentModule).addClass('active');
    // _currentFrame = 0;
    $('.education-menu').addClass('out');
    $('.headline').removeClass('active');
    $('.headline').removeClass('out');
    $('.vignette').removeClass('in');

    $('.module').eq(_currentModule).removeClass('left');
    $('.module').eq(_currentModule).addClass('in');

    $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).addClass('in');
    _currentHeadline.addClass('active');
    fillDot();
    
    $('.education .section-title').addClass('in');
  }
  function closeModule(num) {
    $('.module').eq(num).removeClass('in');
    if(num < _currentModule){
      $('.module').eq(num).addClass('left');
    }else{
      $('.module').eq(num).removeClass('left');
    }
  }  
  function toggleColumn() {
    if(_currentView == "left"){
      _currentView = "right";
      $('.logo').addClass('out');
      if(_currentModule != undefined){
        setTimeout(function(){
          $('.right-column').addClass('down');
        },800)
      }
    }else{
      $('.logo').removeClass('out');
      _currentView = "left"
      setTimeout(function(){
        $('.right-column').removeClass('down');
      },800)
    }
    $('.assessment').toggleClass('in');
    $('.right-column').toggleClass('left');
    $('.menu-icon').toggleClass('left');
    $('.education').toggleClass('in');
  }
  function toggleLogo() {
    if(_currentView == "left"){
      _currentView = "right";
      $('.logo').addClass('out');
    }else{
      $('.logo').removeClass('out');
      _currentView = "left"
    }
  }
  function calculateWeight(obj){
    $('.btn-calculate').css({
      visibility: 'hidden'
    })     

    $('.height-wrapper').css({
      display: "none"
    })

    $('.bmi-result').css({
      opacity: 1
    })
    
    
//    console.log("getHeightInInches:" + window.heightInInches);
//    console.log("weightInPounds:" + window.weightInPounds);
    // BMI = Formula: weight (lb) / [height (in)]2 x 703
    var BMI = ( (window.weightInPounds / (window.heightInInches * window.heightInInches)) * 703 ).toPrecision(4);
    $(".bmi-result .answers").before("<h4>Your BMI result is</h4><h3>" + BMI + "</h3>");
    /*
    BMI
    Weight Status
    Below 18.5  Underweight
    18.5 – 24.9 Normal
    25.0 – 29.9 Overweight
    30.0 and Above  Obese
    */
  }
  
  function updateCharts() {
    $('.dashboard').addClass('flash');
    setTimeout(function(){
      $('.dashboard').removeClass('flash');
    },300);
    // percquiz percdive
    var questionsAnswered = 0;
    for (q in savedQuizProgress) questionsAnswered++;
    
    var quizProgress = questionsAnswered+'/'+_totalQuestions;
    var quizPercent = questionsAnswered/_totalQuestions;
    $(".percquiz").html(quizProgress);

    chart2.transitionToValues (5,
        8,
        [quizPercent, 1-quizPercent], 
        ['#D7006D','#FFFFFF']);
    chart4.transitionToValues (5,
        8,
        [quizPercent, 1-quizPercent], 
        ['#D7006D','#FFFFFF']);

    var deepViewed = 0;
    for (v in savedDiveProgress) deepViewed++;
    var diveProgress = deepViewed + '/' + _totalHeadlines;
    var divePercent = deepViewed/_totalHeadlines;
    if(divePercent == 1){

    }
    $(".percdive").html(diveProgress);
    chart3.transitionToValues (5,
        8,
        [divePercent, 1-divePercent], 4
        ['#D7006D','#FFFFFF']);
    chart5.transitionToValues (5,
        8,
        [divePercent, 1-divePercent], 4
        ['#D7006D','#FFFFFF']);
  }
  
    
  function handleSaveDeepProgress() {
    
    // check for invalid values (bugs)
    if (_currentModule < 0 || _currentVignette < 0 || _currentHeadline.index() < 0) return;
    
    var id = _currentModule + "_" + _currentVignette + "_"
    + _currentHeadline.index();
    
    // handle scroll repeditive saves
    if (id == lastDeepSave) return;
    
    savedDiveProgress[id] = true;
    
    lastDeepSave = id;
    updateCharts();
  }
  function handleSaveQuizAnswer(answer) {
    // 2 - bmi
    
    /*
      BMI
      Weight Status
      Below 18.5  Underweight
      18.5 – 24.9 Normal
      25.0 – 29.9 Overweight
      30.0 and Above  Obese
      */
    
    // 6 - .answers .drinks
    // 5 - Have any of your immediate family members
    // 7 - gene mutation have you or your relative
    // 10 - Within one side of the family
    var ansTxt = answer.attr("data-answer-id");
    if ($.contains(_currentQuestion,$('.bmi-result'))) {
      var bmi = ( (window.weightInPounds / (window.heightInInches * window.heightInInches)) * 703 ).toPrecision(4);
      if (bmi < 18.5) {
        ansTxt = "-1";
      } else if (bmi >= 18.5 && bmi <= 24.9) {
        ansTxt = "+1";
      } else if (bmi >= 25.0 && bmi <= 29.9) {
        ansTxt = "-1";
      } else if (bmi >= 30.0) {
        ansTxt = "-1";
      }
    }
    console.log(_currentQuestion)
    if (_currentQuestion == 6) ansTxt = currentGlass;
    
    if (_currentQuestion == 5) {
      var data = [];
      $('.cb1 input:checked').each(function() {
          data.push($(this).attr('data-answer-id'));
      });
      ansTxt = data;
    }

    console.log(_currentQuestion)
    if (_currentQuestion == 14 && ansTxt == '+1') {
      //console.log('not')
      _currentQuestion = 15;
      savedQuizProgress['14'] = ansTxt;
    }
 

    if (_currentQuestion == 8) {
      var data = [];
      $('.cb2 input:checked').each(function() {
          data.push($(this).attr('data-answer-id'));
      });
      ansTxt = data;

      if (ansTxt == '1|-2') {
        console.log('high')
        $('.risk-level').html('High')       
      }

    }
    if (_currentQuestion == 10) {
      var data = [];
      $('.cb3 input:checked').each(function() {
          data.push($(this).attr('data-answer-id'));
      });
      ansTxt = data;
    }

    if (ansTxt == '-1' && $('.risk-level').html()=='Average'){
      $('.risk-level').html('Moderate')
    }

    savedQuizProgress[String(_currentQuestion)] = ansTxt;

    $('.question-stats').html('');

    for(var key in savedQuizProgress) {
    //alert('key: ' + key + '\n' + 'value: ' + savedQuizProgress[key]);
    $('.question-stats').append('question number ' + key + '  answer' + savedQuizProgress[key] +'<br>');
    }


    //console.log($.inArray( "0", savedQuizProgress ));
    updateCharts();
    console.log('Object savedQuizProgress = ', savedQuizProgress)
  }
  
  /**
   * Here are examples of grabbing answers to specific questions
   * Look at the savedQuizProgress dictionary (that is logged) to see
   * how answers are saved
   * Here are examples of the 3 types
   */
  function addCustomResults(){
	  
	  var bmiHigh = savedQuizProgress[2] == '-1';
	  var drinksHigh = savedQuizProgress[3] > 3;
	  var badGene = $.inArray( "1|-2", savedQuizProgress[2] );
	  
	  $('.bmi-high').css({
	        display: bmiHigh ? 'block' : 'none'
	  })
	  $('.drinks-high').css({
	        display: drinksHigh ? 'block' : 'none'
	  })
	  $('.bad-gene').css({
	        display: badGene ? 'block' : 'none'
	  })
  }
  function askHandler(e) {
    e.stopPropagation();
    switch($(this).closest(".question").attr("data-question-id")){
      case "14":
        window.location.href = "mailto:?subject=Can you help me answer this%3F&body=Hey, %0D%0A \
I'm doing a breast and ovarian cancer risk assessment on http://brightpink.com/assessment and one of the questions is: \
%0D%0A\
%0D%0A\
Have any of your immediate family members (parent, sibling, grandparent or aunt/uncle) been diagnosed with any of the following%3F \
%0D%0A\
- Breast cancer diagnosed at age 50 or under \
%0D%0A\
- Triple negative (ER/PR/her2-) breast cancer \
%0D%0A\
- More than one breast cancer (cancer in both breasts, or two separate breast cancers in one breast) \
%0D%0A\
- Male breast cancer \
%0D%0A\
- Ovarian cancer, primary peritoneal cancer, or fallopian tube cancer \
%0D%0A\
- Two or more close relatives with breast cancer at any age \
%0D%0A\
%0D%0A\
Do you know if anybody in the family has been diagnosed with any of these%3F";
        break;
      case "17":
        window.location.href = "mailto:?subject=Can you help me answer this%3F&body=Hey, %0D%0A \
I'm doing a breast and ovarian cancer risk assessment on http://brightpink.com/assessment and one of the questions is: \
%0D%0A\
%0D%0A\
Within one side of the family (both on mom’s side or both on dad’s side), is there breast cancer and one of the following cancers, either in one person or in more than one%3F \
%0D%0A\
- Breast cancer diagnosed at age 50 or under \
- Ovarian cancer \
- Pancreatic cancer \
- Thyroid cancer \
- Uterine cancer \
- Sarcoma cancer \
- Leukemia or Lymphoma \
- Melanoma cancer \
- Adrenocortical Carcinoma \
- Stomach cancer \
- Brain Cancer \
%0D%0A\
%0D%0A\
Do you know if anybody in the family has been diagnosed with any of these%3F";
        break;
      case "20":
        window.location.href = "mailto:?subject=Can you help me answer this%3F&body=Hey, %0D%0A \
I'm doing a breast and ovarian cancer risk assessment on http://brightpink.com/assessment and one of the questions is: \
%0D%0A\
%0D%0A\
Do you have one or more immediate family members (parent, sibling, grandparent, aunt/uncle) that have had breast cancer at age 50 or older%3F \
%0D%0A\
%0D%0A\
Do you know if I do%3F";
        break;
    }
  }
  function answerQuestion(answer){

    if(_currentQuestion >= _totalQuestions-1){
      addCustomResults()
      openProgressOverlay();
      $('.assessment .share').addClass('in')
      $('.results, .cards').css({
        display: 'block'
      })
      $('.questions').css({
        display: 'none'
      })
    }
    $('.fact').eq(_currentQuestion).removeClass('in');
    $('.fact').eq(_currentQuestion).addClass('out');
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
    
    if(!$(this).hasClass('submit-weight')){
      handleSaveQuizAnswer(answer)
    }
    var _oldQuestion = _currentQuestion;
    _currentQuestion++;
    setTimeout(function(){
      $('.fact').eq(_currentQuestion).addClass('in');
      $('.assessment .dot').eq(_oldQuestion).removeClass('active')
      $('.assessment .dot').eq(_currentQuestion).addClass('active')
    },1000)
    $('.question').eq(_currentQuestion).addClass('in')
  }
  function nextVignette(){
    console.log("Next Vignette")
    // _currentFrame = 0;

    var cloudfrontURL = "http://brightpink-videos.s3.amazonaws.com/"
    var videoURL;

    $('.vignette').removeClass('in');
    setTimeout(function(){
      // $('.module').eq(_currentModule).find($('.vignette')).eq(_oldVignette).attr('src',"");
    },600);
    _oldVignette = _currentVignette;
    _currentVignette++;
    $('.headline').removeClass('active');
    if(_currentVignette == $('.module').eq(_currentModule).find($('.vignette')).length){
      
      if(_currentModule + 1 >= 3){

        return;
      }
      changeModule(_currentModule+1);
    }else{
      _oldHeadline = _currentHeadline;
      _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0);
      fillDot();
      _currentHeadline.addClass('active')
      $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).addClass('in');
      // $('.bg-video').get(_currentVignette).currentTime = 0;
     // console.log("module" + _currentModule, "vignette" + _currentVignette, "headline" + _currentHeadline.index())

      var vig = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette);

      if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        // no video
      }else{
        var src = vig.data('src') + videoType;
        loadBGVideo(vig, src, cloudfrontURL);
      }
      
      //$('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.bg-video')).get(0).play();
    }

    handleSaveDeepProgress();
    _pageResize();
    // _scrollHandler();
  }

  function loadBGVideo(vig, src, host){
    if($('#bg-vid').attr('data-src') != src){
          $('#bg-vid').attr('data-src', src);
          if (Modernizr.video) {

            var previousVid = _currentVideo;

            var videoContainer = $('<div class="vid-container" style="opacity: 0;"></div>');
            var vid1 = $('<video class="bg-video" src="" type="video/mp4" preload="auto" autoplay loop></video>');

            // var vid2 = $('<video class="bg-video" src="" style="opacity: 1;display:none;" type="video/mp4" preload="auto" autoplay></video>');
            var videoElement = vid1;
            $(videoContainer).append(vid1)/*.append(vid2)*/;
            _currentVideo = videoContainer;
            _pageResize();
            function onVideoPlay(){
              // _pageResize();
              $(videoContainer).delay(1000).animate({opacity:1}, 800, function(){
                // console.log("video fade in complete");
                if (previousVid){
                  $(previousVid).remove();
                }
              });
            }

            // function onVideoEnd(){
            //   console.log("VIDEO ENDED");
            //   // $(this).get(0).play(0);
            //   if (videoElement == vid1){
            //     videoElement = vid2;
            //     $(vid1).css('display', 'none');
            //   }
            //   else
            //   {
            //     videoElement = vid1;
            //     $(vid2).css('display', 'none');
            //   }
            //   $(videoElement).css('display', 'block');
            //   $(videoElement).get(0).play();
            // }

            function onVideoProgress(){
              console.log($(this).get(0).currentTime);
            }

            $(vid1).on('play', onVideoPlay);
            // $(vid2).on('play', onVideoPlay);

            // $(vid1).on('ended', onVideoEnd);
            // $(vid2).on('ended', onVideoEnd);

            // $(vid1).on('ontimeupdate', onVideoProgress);
            // $(vid2).on('ontimeupdate', onVideoProgress);

            // let's play some video! but what kind?
            var uri;
            if (Modernizr.video.webm) {
              
              videoURL = $( vig ).data()
              videoType = ".webm"
              $(vid1).addClass('in');
              // $(vid2).addClass('in');
              uri = host + videoURL['src'] + videoType;

            } else if (Modernizr.video.ogg) {

              videoURL = $( vig ).data()
              videoType = ".ogv"
              uri = host + videoURL['src'] + videoType;

            } 
            else if (Modernizr.video.h264){
   
              videoURL = $( vig ).data()
              videoType = ".mp4"
              uri = host + videoURL['src'] + videoType;
            }
            

            
            $(vid1).attr('src', uri);
            // $(vid2).attr('src', uri);
            
            $('#bg-vid').append($(videoContainer));
            


            //$('.bg-video').get(0).play();
            $('.bg-video').css({
              background: "#000"
            });

            // $(videoElement).css('display', 'block');


          }
        }
        _pageResize();
  }


  function createProgressOverlay() {
    var html = "<div class='section-title'>Risk Assessment</div>";
    for(var i=0;i < $('.prompt').length-1;i++){
      html += "<div class='progress-question'><b>Q" + (i+1) + ":</b><br><h4>" + $('.prompt').eq(i).html() + "</h4></div>"
    }
    $('.progress-overlay .questions .progress').after(html);
  }


   // $('a').click(function() {  
   //    //change the after-hash-sign-params to the value of the clicked link**
   //    $.address.value($(this).attr('href'));

   //    });
      
    $.address.externalChange(function(event) { 

      console.log('external URL change')
      console.log(event.value)
      if (event.value == '/home') {
        
        //$.address.path('/home');
        console.log('home')
      } 
      else if (event.value == '/education') {
        console.log('education')
        hideIntro();
        addCharts();
        toggleColumn();
      }
      else if (event.value == '/assessment') {
        console.log('assessment')
        hideIntro();
        addCharts();
      }      
      else {
        console.log('intro view')

        startIntro();
        $.address.path('/intro');
  
      };
      $('.vid-container').remove();
    });   

  $(document).ready(function() {
    _totalQuestions = $('.question').length;
    _totalHeadlines = $('.headline').length;
    _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0);
    fillDot();
    //position the header to be 90%;
    _$window = $(window);
    _$document = $(window.document);
    createProgressOverlay();
    createDots();
    for(var i=0;i<_totalHeadlines;i++){
      $('.headline').eq(i).attr('data-idx',i)
    }
    _registerEventListeners();
    _pageResize();
    initialized = true;



  });
})(jQuery);