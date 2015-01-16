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
  var _currentQuestion = 0;
  var _currentVignette = 0;
  var _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0);
  var _myL = 0;
  var _preL = 0;

  setInterval(function(){
    $('.person').html(people[Math.floor(Math.random()*people.length)])
  },2000);

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
      //_scrollHandler();
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
    _currentFrame -= distance/10;
    _currentFrame = Math.floor(Math.max(_currentFrame,0));
    //_scrollHandler();
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
      //_scrollHandler();
      if(Math.abs(distance) < .2){
        clearInterval(inertiaInterval)
      }
    },10)
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
    $('.wheel-container').css({
      'transform': 'scale(' + (_winW*_winH)/1048438 + ') translate(-50%,-50%)'
    });
  }
  function setFontScale (el,min,max,type){
    type = typeof type !== "undefined" ? type : "em";
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
    console.log("numHeadlines: " + numHeadlines, "nextHeadline: " + nextHeadline)
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
      e.stopPropagation();
      hideIntro();
      addCharts();
    })
    $('.male-overlay .close-btn').on('click',function () {
      overlayOpen = false;
      $('.male-overlay').removeClass("in");
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
      $('.dot').eq(_currentQuestion).addClass('active');
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
    $('.fact-group').on('click',function(){
      toggleColumn();
    })
    $('.module-hero').on('click',function(){
      changeModule($(this).index());
    })
    $('.progress-overlay .vignettes h2').on('click',function(){
      changeModule($(this).index());
      closeProgressOverlay();
      $('.assessment').removeClass('in');
      $('.right-column').addClass('left');
      $('.education').addClass('in');
    })
    $('.progress-overlay .questions h4').on('click',function() {
      toggleLogo();
      closeProgressOverlay();
      $('.assessment').addClass('in');
      $('.right-column').removeClass('left');
      $('.education').removeClass('in');
    })
    $('.progress,.menu-icon').on('click',function(){
      if(!overlayOpen){
        openProgressOverlay();
      }else{
        closeProgressOverlay();
      }
    })
    $('.nav-item').on('click',function () {
      changeModule($(this).index());
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
        distance = x-e.pageX;
        l = Math.max(50,$('.bottle').position().left-distance);
        l = Math.min(l,550);
        var glassW = 59;
        if(_smallScreen){
          glassW = 22;
        }
        currentGlass = Math.floor((l-5)/glassW);
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
    _currentModule = i;
    $('.progress-overlay .vignettes h2').eq(i).addClass('done');
    
    expandModule(i);
  }
  function expandModule(){
    _currentVignette = 0;
    $('.headline').removeClass('active');

    handleSaveDeepProgress();
    $('.nav').addClass('in');
    $('.right-column').addClass('down');
    $('.nav-item').removeClass('active');
    $('.nav-item').eq(_currentModule).addClass('active');
    _currentFrame = 0;
    $('.education-menu').addClass('out');

    $('.module').removeClass('in');
    $('.vignette').removeClass('in');

    $('.module').eq(_currentModule).addClass('in');

    $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).addClass('in');
    $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0).addClass('active');
    
    $('.education .section-title').addClass('in');
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
    var quizProgress = questionsAnswered/22;
    $(".percquiz").html(Math.ceil(quizProgress * 100) + "%");
    chart2.transitionToValues (5,
        8,
        [quizProgress, 1-quizProgress], 
        ['#D7006D','#FFFFFF']);
    chart4.transitionToValues (5,
        8,
        [quizProgress, 1-quizProgress], 
        ['#D7006D','#FFFFFF']);    

    var deepViewed = 0;
    for (v in savedDiveProgress) deepViewed++;
    var diveProgress = deepViewed/($('.headline').length -1);
    $(".percdive").html(Math.ceil(diveProgress * 100) + "%");
    chart3.transitionToValues (5,
        8,
        [diveProgress, 1-diveProgress], 4
        ['#D7006D','#FFFFFF']);
    chart5.transitionToValues (5,
        8,
        [diveProgress, 1-diveProgress], 4
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
    
    // 3 - .answers .drinks
    // 13 - Have any of your immediate family members
    // 15 - gene mutation have you or your relative
    // 16 - Within one side of the family
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
    if (_currentQuestion == 3) ansTxt = currentGlass;
    if (_currentQuestion == 13) {
      var data = [];
      $('.cb1 input:checked').each(function() {
          data.push($(this).attr('data-answer-id'));
      });
      ansTxt = data;
    }

//    console.log(_currentQuestion)
    if (_currentQuestion == 14 && ansTxt == '+1') {
      //console.log('not')
      _currentQuestion = 15;
      savedQuizProgress['14'] = ansTxt;
    }
 

    if (_currentQuestion == 15) {
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
    if (_currentQuestion == 16) {
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

    if(_currentQuestion >= $('.question').length-1){
      addCustomResults()
      openProgressOverlay();
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
      $('.dot').eq(_oldQuestion).removeClass('active')
      $('.dot').eq(_currentQuestion).addClass('active')
    },1000)
    $('.question').eq(_currentQuestion).addClass('in')
  }
  function nextVignette(){
    console.log("Next Vignette")
    _currentFrame = 0;

    var videoURL;

    $('.vignette').removeClass('in');
    var _oldVignette = _currentVignette;
    setTimeout(function(){
      // $('.module').eq(_currentModule).find($('.vignette')).eq(_oldVignette).attr('src',"");
    },600);
    _currentVignette++;
    $('.headline').removeClass('active');
    if(_currentVignette == $('.module').eq(_currentModule).find($('.vignette')).length){
      _currentModule++;
      
      if(_currentModule >= 3){
        openProgressOverlay();
        return;
      }
      changeModule(_currentModule);
    }else{
      
      _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0);
      _currentHeadline.addClass('active')
      $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).addClass('in');
      // $('.bg-video').get(_currentVignette).currentTime = 0;
      console.log("module" + _currentModule, "vignette" + _currentVignette, "headline" + _currentHeadline.index())

      var vig = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette);

      if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        // no video
      }else{
        if($('.bg-video').attr('src') != vig.data('src') + videoType){

          if (Modernizr.video) {
            // let's play some video! but what kind?
            if (Modernizr.video.webm) {
              
              videoURL = $( vig ).data()
              videoType = ".webm"
              $('.bg-video').attr('src',videoURL['src'] + videoType);

            } else if (Modernizr.video.ogg) {

              videoURL = $( vig ).data()
              videoType = ".ogv"
              $('.bg-video').attr('src',videoURL['src'] + videoType);

            } else if (Modernizr.video.h264){
   
              videoURL = $( vig ).data()
              videoType = ".mp4"
              $('.bg-video').attr('src',videoURL['src'] + videoType);
            }
            $('.bg-video').get(0).play();
            $('.bg-video').css({
              background: "#D7006D"
            });
          }
        }  
      }
      
      //$('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.bg-video')).get(0).play();
    }

    handleSaveDeepProgress();
    
    // _scrollHandler();
  }
  function createProgressOverlay() {
    var html = "<div class='section-title'>Risk Assessment</div>";
    for(var i=0;i < $('.prompt').length-1;i++){
      html += "<div class='progress-question'><b>Q" + (i+1) + ":</b><br><h4>" + $('.prompt').eq(i).html() + "</h4></div>"
    }
    $('.progress-overlay .questions').append(html);
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
    });   

  $(document).ready(function() {

    //position the header to be 90%;
    _$window = $(window);
    _$document = $(window.document);
    createProgressOverlay();
    _registerEventListeners();
    _pageResize();
    initialized = true;



  });
})(jQuery);