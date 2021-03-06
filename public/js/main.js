    var resultLevel = 'average';
    var isDoctorEmail = null;
    var pdfWindow;
    var savedQuestionsAnswers = {};
    var endCards = {};  
    var cardsLow = [{facttitle: 'BMI', factheadline: 'Your BMI is within 18.5 and 24.9', factbody: 'This is within a healthy range! Keep up the good work.'}, {facttitle: 'ALCOHOL', factheadline: 'You have one or fewer drinks a day.', factbody: 'Something to celebrate: your cocktail consumption likely doesn’t increase your baseline risk.'}, {facttitle: 'PHYSICAL ACTIVITY', factheadline: 'You get enough exercise.', factbody: 'Your active lifestyle will benefit your health in many ways. Stick to it!'}, {facttitle: 'BIRTH CONTROL', factheadline: 'You’ve taken birth control for at least five years.', factbody: 'You likely made this choice for other reasons, but just by taking oral contraceptives for a total of at least five years, you’ve decreased your risk of ovarian cancer by up to 50%.  That’s no small feat.'}, {facttitle: 'BREASTFEEDING', factheadline: 'You have breastfed, or plan to in the future.', factbody: 'Breastfeeding is good for both you and your baby; doing it for a total of at least 1-2 years helps lower your risk.'}, {facttitle: 'PREGNANCY', factheadline: 'You have given birth.', factbody: 'One of the many joys of motherhood can be risk reduction — pregnancy lowers your risk by reducing your lifetime exposure to estrogen and stabilizing your breast tissue.'}];


    var cardsHigh = [{facttitle: 'BMI', factheadline: 'Your BMI is outside of the healthy range.', factbody: 'Be good to yourself! Talk to your doctor or nutritionist about steps you can take to achieve a healthier BMI.'}, {facttitle: 'ALCOHOL', factheadline: 'You have more than one drink a day.', factbody: 'Consider cutting back on cocktails, as alcohol increases your baseline risk. We advise no more than one drink per day.'}, {facttitle: 'PHYSICAL ACTIVITY', factheadline: 'You’re not getting enough exercise.', factbody: 'Not moving your body enough increases your risk.  You don’t have to become a gym rat — walking counts! 30+ minutes most days is the goal to work toward.'}, {facttitle: 'BIRTH CONTROL', factheadline: 'You haven’t taken birth control for at least five years.', factbody: 'Consider talking to your doctor about whether birth control pills might be a good option for you—if you take them for a total of at least five years in your 20s and 30s, you can reduce your ovarian cancer risk by up to 50%. That’s no small feat.'}, {facttitle: 'BREASTFEEDING', factheadline: 'You have not breastfed, or do not plan to in the future.', factbody: 'Breastfeeding is a personal choice, but if it presents itself as an option in the future, just know that doing it for a total of 1-2 years can help lower your risk.'}, {facttitle: 'PREGNANCY', factheadline: 'You have not given birth.', factbody: 'If you’ve chosen not to have children, or if childbearing simply isn’t in the cards, be aware that never giving birth slightly increases your risk.'}, {facttitle: 'PERIOD', factheadline: 'Your period started early.', factbody: 'Starting your period under the age of 12 increases your risk for breast cancer later because it increases your total lifetime exposure to estrogen. You obviously can’t change this, but it’s another reason to stay proactive where other modifiable risk factors are considered, especially BMI.'}];


    var cancerContent = [{content: 'SINCE YOU’VE BEEN DIAGNOSED WITH BREAST OR OVARIAN CANCER: It may seem like being at “average risk” when you’ve already been diagnosed with breast or ovarian cancer seems strange, but as noted above, the majority of breast and ovarian cancers are diagnosed in women with average risk. The information below may be less relevant to you now, post-diagnosis, but we still recommend bringing it to your doctor to discuss which strategies you should still incorporate (most of these recommendations are good to keep in mind for general health anyway). And the most important thing we can recommend is talking to your doctor or a genetic counselor about pursing genetic testing, if you haven’t already had it. This testing will help determine if your cancer was likely the result of a gene mutation. If it was, your baseline risk is actually higher than average and you will need to discuss enhanced risk management strategies with your doctor. \n \n'}, {content: 'SINCE YOU’VE BEEN DIAGNOSED WITH BREAST OR OVARIAN CANCER: The recommendation above regarding genetic testing is particularly relevant to you. If you’ve not yet been tested, it’s important to rule out the involvement of a genetic mutation in your cancer and the potential that your baseline risk may actually be higher. (It may seem strange to think of yourself as not already at high risk, given your diagnosis, but keep in mind that the majority of breast and ovarian cancers occur in women with an average baseline risk.) And though some of the risk-reduction and early detection information below may be less relevant to you now, post-diagnosis, we still recommend bringing these results to your doctor to discuss which strategies you may still need to incorporate. \n \n'}, {content: 'SINCE YOU’VE BEEN DIAGNOSED WITH BREAST OR OVARIAN CANCER: Some of the risk-reduction and early detection information below may be less relevant to you now, post-diagnosis. We still recommend bringing these results to your doctor to discuss which strategies you may still need to incorporate. \n \n'}]; 

(function($, undefined) {
    var _$window;
    var _$document;
    var _winH;
    var _winW;
    var _smallScreen;
    var _airScreen;
    var _lapScreen;
    var _isTouchDevice = Modernizr.touch;
    var _ie = window.navigator.userAgent.indexOf("MSIE ") >= 0;
    if (_ie) {
        $('.body').addClass('ie');
    }
    var _android = window.navigator.userAgent.indexOf("Android") >= 0;
    var _iPhone = window.navigator.userAgent.indexOf("iPhone") >= 0;
    var _currentFrame = 0;
    var inertiaInterval;
    var containerTop = 0;
    var _frameRange;
    var touchInterval;
    var touchStartY;
    var preRollInterval;
    var vidW = 1271;
    var overlayOpen;
    var initialized;

    var cloudfrontURL = "http://brightpink-videos.s3.amazonaws.com/"
    var videoURL;
    var videoType;
    var closest = 0;
    var newClosest = 0;

    var _currentView = "left";
    var _currentModule = null;
    var _oldModule;
    if(sessionStorage.getItem('current_question_position')!=undefined){
        var _currentQuestion = sessionStorage.getItem('current_question_position');
    }else{
        var _currentQuestion = 0;
    }

    var _totalQuestions;
    var _totalHeadlines;
    var headline_tops;
    var _currentVignette = 0;
    var _oldVignette;
    var _currentHeadline;
    var _oldHeadline;
    var _myL = 0;
    var _preL = 0;

    var _currentVideo;
    var _currentImage;
    var _currentPath = '/';
    var _currentLevel;

    // setInterval(function(){
    //   $('.person').html(people[Math.floor(Math.random()*people.length)])
    // },2000);

    var MOBILE_WIDTH = "767";
    var TABLET_WIDTH = "1024";
    var DESKTOP_WIDTH = "1350";

    var people = ["sister", "aunt", "mom", "girl crush", "partner in crime", "friend-at-first-sight", "maid of honor"];

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
    var moduleCategories = ['lifestyle','knowing','family']
    var lifestylePledgeCount = 0;
    var knowingPledgeCount = 0;
    var familyPledgeCount = 0;    

    $('.module').on('touchmove', function(e){
        _scrollHandler();
    });

    $('.module').on('scroll', function(e) {
        // if(overlayOpen){
        //   return;
        // }
        _scrollHandler();
    });

    //cardsLow[0]{factbody: ''}
    //['factbody', '']
    //cardsLow[0]['factbody'] = "new string", ['facttitle'] = "new";
    // console.log(cardsLow[0]['factbody'])

    function _pageResize() {
        $('.module').scrollTop(0);
        _winH = _$window.height();
        _winW = _$window.width();
        if (_winW <= 600) {
            _smallScreen = true;
            _airScreen = false;
            _lapScreen = false;
            minS = .7;
            $('.module-hero h1').eq(1).html('Normal')
            $('.module-hero h1').eq(2).html('Family')
            $('.vignettes h3').eq(1).html('Normal')
            $('.vignettes h3').eq(2).html('Family')
            if(_winW > _winH){
                $('.landscape-overlay').addClass('active')
            }else{
                $('.landscape-overlay').removeClass('active')
            }
        }else if(_winW <= 960){
            _smallScreen = false;
            _lapScreen = false;
            _airScreen = true;
            minS = .8;
            $('.vignettes h3').eq(1).html('Know Your Normal')
            $('.vignettes h3').eq(2).html('Family & Health History')
            $('.module-hero h1').eq(1).html('Your Normal')
            $('.module-hero h1').eq(2).html('Family History')
            $('.landscape-overlay').removeClass('active')
        } else {
            _smallScreen = false;
            _airScreen = false;
            _lapScreen = true;
            minS = .8;
            $('.vignettes h3').eq(1).html('Know Your Normal')
            $('.vignettes h3').eq(2).html('Family & Health History')
            $('.module-hero h1').eq(1).html('Knowing Your Normal')
            $('.module-hero h1').eq(2).html('Family & Health History')
            $('.landscape-overlay').removeClass('active')
        }
        sizeBGMedia();
        setFontScale($('html'), 11, 16, 'px');
        setHeadlineTops();
        if(_smallScreen){
            $('.assessment-facts').appendTo('.fact-overlay')
            $('.wheel-container').css({
                left: Math.max(-27,((_winW - 320) + ((320-_winW)/2)-27))
            });
        }else if(_airScreen){
            $('.wheel-container').css({
                left: _winW/10
            });
        }else if(_lapScreen){
            $('.wheel-container').css({
                left: _winW/5
            });
        }else{
            $('.wheel-container').css({
                left: _winW/5
            });
        }
        $('.education .dots h6').eq(1).css({
            left: $('.module').eq(0).find($(".headline")).length * 22
        })
        $('.education .dots h6').eq(2).css({
            left: $('.education h6').eq(1).position().left + $('.module').eq(1).find($(".headline")).length * 22
        })
        addCharts();
        updateCharts();
        $('.wheel-container').css({
            '-webkit-transform': 'matrix('+Math.max(minS,1 * ($(window).width()/1024))+', 0, 0,'+ Math.max(minS,1 * ($(window).width()/1024))+', 0, 0)',
            '-moz-transform': 'matrix('+Math.max(minS,1 * ($(window).width()/1024))+', 0, 0,'+ Math.max(minS,1 * ($(window).width()/1024))+', 0, 0)',
            'transform': 'matrix('+Math.max(minS,1 * ($(window).width()/1024))+', 0, 0,'+ Math.max(minS,1 * ($(window).width()/1024))+', 0, 0)'
        })
    }

    function sizeBGMedia() {
        if (_winW / _winH > 1.8) {

    		$('video').css({
                width: _winW,
                height: 'auto'
            });
            
        } else {
        	$('video').css({
                height: _winH,
                width: 'auto'
            });
        }
    }

    function setFontScale(el, min, max, type) {
        if(_airScreen){
            min = 12;
        }
        type = typeof type !== "undefined" ? type : "rem";
        el.css({
            'font-size': Math.min(max, Math.max(min, max * ((_winW * _winH) / 1348438))) + type
        })
    }

    function redraw() {
        if (_isTouchDevice) {
            // window.requestAnimationFrame(function() {

            // });
        }
    }

    function setHeadlineTops() {
        headline_tops = [
            [],
            [],
            []
        ];
        var l1 = $('.module').eq(0).find($('.headline')).length;
        var l2 = l1 + $('.module').eq(1).find($('.headline')).length;
        var l3 = l2 + $('.module').eq(2).find($('.headline')).length;
        for (var i = 0; i < _totalHeadlines; i++) {
            if (i < l1) {
                headline_tops[0].push($('.headline').eq(i).offset().top);
            } else if (i < l2) {
                headline_tops[1].push($('.headline').eq(i).offset().top);
            } else if (i < l3) {
                headline_tops[2].push($('.headline').eq(i).offset().top);
            }
        }
    }

    function showNextHeadline() {
        // _currentFrame += 15;

        var numHeadlines = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).length;
        console.log(numHeadlines)
        var nextHeadline = _currentHeadline.index() + 1;
        if (initialized && nextHeadline < numHeadlines) {
            console.log(nextHeadline, numHeadlines)
            // _currentHeadline.removeClass('active');
            // _currentHeadline.addClass('out');
            _oldHeadline = _currentHeadline;
            _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(nextHeadline);
            fillDot();
            // _currentHeadline.removeClass('out');
            _currentHeadline.addClass('active');

            handleSaveDeepProgress();
        } else {
            nextVignette();
        }
    }
    var kk=0;
    function fillDot() {
        //alert('salio');
        var hNum = $('.headline').index(_currentHeadline)
        $('.education .dots h6').removeClass('active')

        if(hNum < $('.module').eq(0).find($(".headline")).length){
            $('.education .dots h6').eq(0).addClass('active')
        }else if(hNum < $('.module').eq(1).find($(".headline")).length + $('.module').eq(0).find($(".headline")).length){
            $('.education .dots h6').eq(1).addClass('active')
        }else if(hNum < $('.module').eq(2).find($(".headline")).length + $('.module').eq(1).find($(".headline")).length + $('.module').eq(0).find($(".headline")).length){
            $('.education .dots h6').eq(2).addClass('active')
        }

        $('.education .dot').removeClass('active');
        $('.education .dot').eq(hNum).addClass('active on');

        if(sessionStorage.getItem('dots_education')!=undefined){

            var recupero = sessionStorage.getItem('dots_education');
            var dots_on = JSON.parse(recupero);
           // console.log(dots_on);

            $.each(dots_on,function(key,value){
                if(value==1 && key >= 0){
                    $('.education .dot').eq(key).addClass('on');
                }
            });

        }else{
            $('.education .dot').eq(hNum).addClass('on');
        }

        // esta condicional se hizpo por que al comenzar siempre marcaba "cero" (0)
        //hNum y por lo tanto cargaba un valor como education leido (storage = dots_education)
        if(kk==0){
            hNum = -1;
            createDotsOn(hNum);
        }else{
            createDotsOn(hNum);
        }
        kk++;

       //alert(kk);


        //console.log(hNum);  // este va a alimentyar un array que voy a cargar en el storage
    }

    function _scrollHandler() {
        var scrollTop = $('.module').eq(_currentModule).scrollTop() + (_winH / 3);
        for (var i = 0; i < headline_tops[_currentModule].length; i++) {
            if (Math.abs(headline_tops[_currentModule][i] - scrollTop) < Math.min(Math.abs(headline_tops[_currentModule][closest] - scrollTop), Math.abs(headline_tops[_currentModule][newClosest] - scrollTop))) {
                newClosest = i;
            }
        }
        if (newClosest !== closest) {
            $('.module').eq(_currentModule).find($('.headline')).eq(closest).removeClass('active')
            closest = newClosest;
            $('.module').eq(_currentModule).find($('.headline')).eq(closest).addClass('active')
            var offset = 0;
            if(_currentModule == 1){
                offset = $('.module').eq(0).find($('.headline')).length
            }else if(_currentModule == 2){
                offset = $('.module').eq(0).find($('.headline')).length + $('.module').eq(1).find($('.headline')).length
            }
            changeHeadline(closest + offset);
        }
    }

    function addCharts() {
        chart1 = new DonutChartBuilder('.chart-1',
            10,
            3, [1, .01, .01, .01, .01, .01, .01, .01], ['#FFFFFF', '#FFFFFF', '#FFFFFF', '#FFFFFF', '#FFFFFF', '#FFFFFF', '#FFFFFF', '#FFFFFF'],
            null);
        chart2 = new DonutChartBuilder('.chart-2',
            8,
            0, [.01, .99], ['#D7006D', '#FFFFFF'],
            null);
        chart3 = new DonutChartBuilder('.chart-3',
            8,
            0, [.01, .99], ['#D7006D', '#FFFFFF'],
            null);
        chart4 = new DonutChartBuilder('.chart-4',
            8,
            8, [.01, .99], ['#D7006D', '#FFFFFF'],
            null);
        chart5 = new DonutChartBuilder('.chart-5',
            8,
            8, [.01, .99], ['#D7006D', '#FFFFFF'],
            null);
        setTimeout(transCharts, 1000);
        /* Only use this if it needs to watch the container and resize with the div
        $( window ).resize(function() {
          a.updateDims();
        });
        */
    }

    function transCharts() {
        chart1.transitionToValues(5,
            10, [1, 1, 1, 1, 1, 1, 1, 1], ['#FFB4AA', '#FFB4AA', '#FFB4AA', '#FFB4AA', '#FFB4AA', '#FFB4AA', '#FFB4AA', '#D7006D']);
    }

    function getUserCount() {

        resp = $.ajax({
          type : "GET",
          cache: false,
          //url : '/pledge/'+ type + '/count/',
          url : '/count',
          dataType: 'json'
        }).done(function(data) {

        lifestylePledgeCount = data[moduleCategories[0]];
        knowingPledgeCount = data[moduleCategories[1]];
        familyPledgeCount = data[moduleCategories[2]];

        for (i=0; i<moduleCategories.length; i++) {
         // console.log('pledges ' +data[moduleCategories[i]])
          if(i===0){
            pledgeMessage = "Women Have Pledged to Improve Their Lifestyles."
          }else if(i===1){
            pledgeMessage = "Women Have Pledged to Know Their Normal."
          }else if(i===2){
            pledgeMessage = "Women Have Pledged to Collect Their Family History."
          }
          $('.' +moduleCategories[i]+ '-pledge-number').html(data[moduleCategories[i]]+ " "+ pledgeMessage);
          }

        }).fail(function(error) {
        //  console.log(error);
        });
      }



    function _registerEventListeners() {
        $('#Begin').on('click', function(e) {
            $('.vid-container').remove();

            e.stopPropagation();
            hideIntro();
            addCharts();
            //window._currentPath = '/assessment';
            //$.address.path('/assessment');
            $(location).attr('href','assessment');
            //$.address.path('/assessment');

            /*woopra.track("click", {
                intent: "begin",
                type: "button"
            });*/
        })



//buttons
        $('input[name="age-radio"]').change(function(){
            $('#age-btn').prop('disabled', !this.checked);
        });

        $('input[name="cancerhistory-radio"]').change(function(){
            $('#cancerhistory-btn').prop('disabled', !this.checked);
        });

        $('input[name="famdiag-check"]').change(function(){
            var allCheckboxes = $('input[name="famdiag-check"]');
            var noneChecked = true;
            var isChecked = $(this).prop('checked');
            if(isChecked){
                if ($(this).hasClass('not-sure') || $(this).hasClass('none-of-above')){
                    $(allCheckboxes).prop('checked', false);
                }
                else
                {
                    $('input[name="famdiag-check"].not-sure').prop('checked', false);
                    $('input[name="famdiag-check"].none-of-above').prop('checked', false);
                    
                }


                $(this).prop('checked', true);
            }
            allCheckboxes.each(function(index, item){
                console.log(item.checked);
                if (item.checked){
                    noneChecked = false;
                    
                    return false;
                }
            });


            $('#famdiag-check-btn').prop('disabled', noneChecked);
        });

        $('input[name="mutation-radio"]').change(function(){
            $('#mutation-btn').prop('disabled', !this.checked);
        });

        $('input[name="cancer-plus-chk"]').change(function(){
            var allCheckboxes = $('input[name="cancer-plus-chk"]');
            var isChecked = $(this).prop('checked');
            var noneChecked = true;
            if (isChecked){
                if ($(this).hasClass('not-sure') || $(this).hasClass('none-of-above')){
                    $(allCheckboxes).prop('checked', false);
                }
                else
                {
                    $('input[name="cancer-plus-chk"].not-sure').prop('checked', false);
                    $('input[name="cancer-plus-chk"].none-of-above').prop('checked', false);
                    
                }


                $(this).prop('checked', true);
            }
            allCheckboxes.each(function(index, item){

                if (item.checked){
                    noneChecked = false;
                    
                    return false;
                }
            });
            $('#mobile-button-left').prop('disabled', noneChecked);
        });


        $('input[name="mutation-sub"]').change(function(){
            var allCheckboxes = $('input[name="mutation-sub"]');
            var noneChecked = true;
            var isChecked = $(this).prop('checked');
            if(isChecked){
                if ($(this).hasClass('not-sure')){
                    $(allCheckboxes).prop('checked', false);
                }
                else
                {
                    $('input[name="mutation-sub"].not-sure').prop('checked', false);                    
                }


                $(this).prop('checked', true);
            }
            allCheckboxes.each(function(index, item){
                console.log(item.checked);
                if (item.checked){
                    noneChecked = false;
                    
                    return false;
                }
            });


            // $('#famdiag-check-btn').prop('disabled', noneChecked);







            $('#mutation-sub-btn').prop('disabled', noneChecked);
        });

       /* $('.testPDF, .pdf').on('click', function() {
            $(this).attr('disabled', 'disabled');
        	woopra.track("click", {
                intent: "getPDF",
                type: "button"
            });
            isDoctorEmail = null;
            pdfWindow = window.open('', '_blank');
            pdfWindow.document.write('Loading PDF results...');
            createPinkPDF(resultLevel);
        })*/






        /*$('.facebook.lifestyle').on('click', function() {
            //console.log('clicked')

            *//*woopra.track("click", {
             intent: "pledge",
             location: "lifestyle",
             type: "button"
             });*//*

            $('.lifestyle-pledge-number').text('You and ' + lifestylePledgeCount +'  women have pledged to improve your lifestyles');

            $('.lifestyle-pledge-number').next().text('');

            $('.facebook.lifestyle').css({
                display: "none"
            })

            resp = $.ajax({
                type : "GET",
                cache: false,
                url : "/count/add/lifestyle",
                dataType: 'json'
            }).done(function(data) {
                console.log(data);
            }).fail(function(error) {
                console.log(error);
            });
        })*/

        $('.facebook.knowing').on('click', function() {
           // console.log('clicked')
            
/*
            woopra.track("click", {
                intent: "pledge",
                location: "knowing",
                type: "button"
            });
*/
            
            $('.knowing-pledge-number').text('You and ' + knowingPledgeCount +'  women have pledged to know your normal')

            $('.knowing-pledge-number').next().text('');

            $('.facebook.knowing').css({
                display: "none"
            })


            resp = $.ajax({
              type : "GET",
              cache: false,
              url : "/count/add/knowing",
              dataType: 'json'
            }).done(function(data) {
             // console.log(data);
            }).fail(function(error) {
             // console.log(error);
            });
        })

        $('.facebook.family').on('click', function() {
           // console.log('clicked')
            
/*
            woopra.track("click", {
                intent: "pledge",
                location: "family",
                type: "button"
            });
*/
            
            $('.family-pledge-number').text('You and ' + familyPledgeCount +'  women have pledged to learn about their family history')

            $('.family-pledge-number').next().text('');

            $('.facebook.family').css({
                display: "none"
            })

            resp = $.ajax({
              type : "GET",
              cache: false,
              url : "/count/add/family",
              dataType: 'json'
            }).done(function(data) {
           //   console.log(data);
            }).fail(function(error) {
           //   console.log(error);
            });
        })        

        $('.male-overlay .close-btn').on('click', function() {
            $('.vid-container').remove();
            overlayOpen = false;
            $('.male-overlay').removeClass("in");
            $('.fact-icon').addClass('in');
        })
        // $('.your-risk .read-more').on('click', function() {
        //     $('.vid-container').remove();
        //     $(this).css({
        //         display: "none"
        //     })
        //     $('.more-results').css({
        //         display: 'block'
        //     })
        // })

        $('.paragraph-box .read-more').on('click', function() {
            if($(this).html() == 'Read More'){
            	
            	/*woopra.track("click", {
                    intent: "expand",
                    location: "Read More",
                    type: "button"
                });*/
            	
                $(this).html('Read Less');
                $('.more-results').css({
                    display: 'block'
                })
            }else{
            	
/*            	woopra.track("click", {
                    intent: "collapse",
                    location: "Read More",
                    type: "button"
                });*/
            	
                $(this).html('Read More');
                $('.more-results').css({
                    display: 'none'
                })
            }
        })   


		$('.quiz-start').click(function() {
			$('.nsgc-logo').hide();
		});

        $('.email-doctor').on('click', function(event) {
            event.preventDefault();     
     
          /*  woopra.track("click", {
                intent: "email",
                location: "doctor",
                type: "button"
            });*/
            
            $('.email-pdf-doctor').addClass('show-fields-dr');
        })

        $('.sub.email').on('click', function(event) {
          //  console.log('click my email');
                // cancels the form submission
             event.preventDefault();
            
           /* woopra.track("click", {
             intent: "email",
             location: "mydelf",
             type: "button"
             });*/
            
            
            $('.email-pdf-doctor').addClass('show-fields-user');
        })

        $('.email-fields-doctor button.cancel').on('click', function() {
            $('.email-pdf-doctor').removeClass('show-fields-dr');
        })
        $('.email-fields-user button.cancel').on('click', function() {
            $('.email-pdf-doctor').removeClass('show-fields-user');
        })        
        
        $('.sub.send-dr-email').on('click', function() {
          //  console.log('drclick')
            
           /* woopra.track("click", {
                intent: "complete email",
                location: "doctor",
                type: "button"
            });*/
            
            isDoctorEmail = true;
          //  console.log(isDoctorEmail)
           // createPinkPDF(resultLevel);
        })
        $('.sub.send-user-email').on('click', function() {
         //   console.log('userclick')
            
           /* woopra.track("click", {
                intent: "complete email",
                location: "user",
                type: "button"
            });*/
            
            isDoctorEmail = false;
          //  console.log(isDoctorEmail)
            //createPinkPDF(resultLevel);
        })

        $('.progress-overlay .share-btn').on('click', function() {
        	/*woopra.track("click", {
                intent: "share",
                location: "social",
                type: "button"
            });*/
        })

        //$('.mail-icon').on('click',shareMail());

        $('.fact-icon').on('click', openFactOverlay);
        $('.fact-overlay .return').on('click', closeFactOverlay);
        $('.menu-overlay .close-btn').on('click', closeMenuOverlay);
        $('.progress-overlay .close-btn').on('click', closeProgressOverlay);
      /*  $('.assessment-intro button').on('click', function() {
            $('.right-column').addClass('in2')
            $('.assessment-intro').addClass('out-up');
            $('.assessment-intro').removeClass('in');
            $('.question').eq(_currentQuestion).addClass('in');
            $('.question').eq(_currentQuestion).removeClass('out');
            $('.facts').eq(_currentQuestion).addClass('in');
            $('.assessment-dots .dot').eq(_currentQuestion).addClass('on');
            $('.assessment-dots .dot').eq(_currentQuestion).addClass('active');
            $('.assessment-dots').addClass('active');
            $('.fact-icon').addClass('in');



        })*/



        /*
         $('.assessment-intro button, .lets-go').on('click', function() {
         $('.right-column').addClass('in2')
         $('.assessment-intro').addClass('out-up');
         $('.assessment-intro').removeClass('in');
         $('.question').eq(0).addClass('in');
         $('.fact').eq(_currentQuestion).addClass('in');
         $('.assessment-dots .dot').eq(_currentQuestion).addClass('on');
         $('.assessment-dots .dot').eq(_currentQuestion).addClass('active');
         $('.assessment-dots').addClass('active');
         $('.fact-icon').addClass('in');
         })
        * */
        $('.ask').on('click', askHandler);
        $('.btn-calculate').on('click', function(e) {
            calculateWeight($(this));
        })
        $('.question .answers button').on('click', function(e) {
            if (!$(this).hasClass('sub')) { 
                answerQuestion($(this));
            }
        })
       /* $('.btn-back').on('click', function(e) {
            prevQuestion();
        })*/
        $('.asterisk').on('mouseenter', function() {
            $(this).next().addClass("show");
            $(this).next().css({
                left: $(this).offset().left
            })
        })
        $('.asterisk').on('mouseleave', function() {
            $(this).next().removeClass("show")
        })
        /*  $('.assess').on('click', function() {
        	woopra.track("click", {
                intent: "toggle",
                location: "assessment",
                type: "button"
            });
            toggleColumn();
            window._currentPath = '/assessment';
            $.address.value('/assessment');
        })*/
       /* $('.understand').on('click', function() {
        	woopra.track("click", {
                intent: "toggle",
                location: "education",
                type: "button"
            });
            toggleColumn();
            window._currentPath = '/education';
            $.address.value('/education');
        })*/




        $('.module-hero').on('click', function() {
            changeModule($(this).index());
            updateCharts();
            $('.menu-icon').addClass('module-open')
        })
        $('.menu-overlay .vignettes h3').on('click', function() {
            changeModule($('.menu-overlay .vignettes h3').index($(this)));
            closeMenuOverlay();
            $('.assessment').removeClass('in');
            $('.right-column').addClass('left');
            $('.menu-icon').addClass('left');
            $('.education').addClass('in');
        })
        $('.progress-overlay .questions h4').on('click', function() {
            toggleLogo();
            closeProgressOverlay();
            $('.assessment').addClass('in');
            $('.right-column').removeClass('left');
            $('.menu-icon').removeClass('left');
            $('.education').removeClass('in');
        })
        $('.menu-icon').on('click', function() {
            if (!overlayOpen) {
                openMenuOverlay();
            } else {
                closeMenuOverlay();
            }
        })
        $('.btn-results').on('click', function() {
            if (!overlayOpen) {
                openProgressOverlay();
            } else {
                closeProgressOverlay();
            }
        })
        $('.nav-item').on('click', function() {
            changeModule($(this).index());
        })
        $('.text-me').on('click', function() {
        	woopra.track("click", {
                intent: "text me",
                location: "reminders",
                type: "button"
            });
            window.open('http://www.brightpink.org/awareness-to-action/breast-health-reminders/');
        })
        $('.btn-begin').on('click', function() {
            showNextHeadline();
            $('.module').eq(_currentModule).animate({
                scrollTop: _winH
            }, 1000);
        })

            $('.btn-continue').on('click', function(e) {
                e.stopPropagation();
                showNextHeadline();
            })

        $('.bottle').on('mousedown', function(e) {
            if (e.which !== 1){
                return;
            }

            e.preventDefault();
            var x = e.pageX;

            var distance = 0;
            var l;
            _$window.off('mousemove touchmove');
            _$window.on('mousemove', function(e) {
                var newX = e.pageX;
                dragBottle(x, newX)
                x = e.pageX;
                distance = 0;
            });
            _$window.on('mouseup', function() {
             //   console.log('MOUSE UP!!!');
                _$window.off('mousemove mouseup');
            });
        });

        $('.bottle').on('touchstart', function(e) {
          console.log('touch start');
          // ('TOUCH START');
            var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
            e.preventDefault();
            var x = touch.pageX;
            var distance = 0;
            var l;
            _$window.off('touchmove mousemove');
            _$window.on('touchmove', function(e) {
                var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
                var newX = touch.pageX;
                dragBottle(x, newX)
                x = touch.pageX;
                distance = 0;
            });
            _$window.on('touchend', function() {
            //    console.log('TOUCH UP!!!');
                _$window.off('touchmove touchend');
            });
        })
        // _$window.on('touchend', function() {
        //     _$window.off('touchmove');
        //     _$window.off('mousemove');
        // })
        _$window.on('resize', _pageResize);
    }

    function dragBottle(x, newX) {
        distance = x - newX;
        var min = 50;
        if (_smallScreen) {
            min = 20;
        }else if (_airScreen) {
            min = 40;
        }
        l = Math.max(min, $('.bottle').position().left - distance);
        //console.log(l,$('.bottle').position().left,x,newX)
        l = Math.min(l, 370);
        var glassW = 59;
        if (_smallScreen) {
            glassW = 25;
        }else if (_airScreen){
            glassW = 38;
        }
        currentGlass = Math.floor((l - 5) / glassW);

        for (var i = 0; i < $('.drink').length; i++) {

            if (i <= currentGlass) {
                $('.drink img').eq(i).css({
                    opacity: 1
                })

                sessionStorage.setItem('bottle',currentGlass);

            } else {
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

   /* function createDots() {
        for (var i = 0; i < _totalQuestions; i++) {
            var dot = '<div class="dot"></div>';
            $('.assessment-dots').append(dot);
        };
        for (var i = 0; i < _totalHeadlines; i++) {
            var dot = '<div class="dot"></div>';
            $('.education .dots').append(dot);
        };
        $('.percdive').html(0 + '/' + _totalHeadlines);
        $('.percquiz').html(0 + '/' + _totalQuestions);
    }*/

    function hideIntro() {
    	
    	/*woopra.track("click", {
            intent: "navigate",
            location: "hide intro",
            type: "button"
        });*/
    	
      //  console.log('hideIntro');
         // $('.logo').css('opacity', 1);
        // TweenLite.to($('.logo'), .5, {opacity: 1, delay: 1});

        $('.intro').addClass('out-up')
        $('.right-column').addClass('in')
        $('.assessment').addClass('in');
        $('.border').addClass('white');
    };

    function goHome(){
    	
    	woopra.track("click", {
            intent: "navigate",
            location: "home",
            type: "button"
        });
    	
      //  console.log('goHome');
      //  TweenLite.to($('.logo'), .5, {opacity: 1, delay: 0});
        TweenLite.to($('.intro'), .5, {opacity: 1, delay: 1});
        $('.intro').removeClass('out-up')
        $('.right-column').removeClass('in')
        //$('.assessment').removeClass('in');
        $('.border').removeClass('white');
    }

    function openMenuOverlay() {
        $('.menu-overlay').addClass('in');
        overlayOpen = true;
    }
      
    function closeMenuOverlay() {
        $('.menu-overlay').removeClass("in");
        overlayOpen = false;
    }

    function openFactOverlay() {
        $('.fact-overlay').addClass('in');
        $('.fact-icon').removeClass('in');
        $('.fact-icon').removeClass('new')
        factoverlayOpen = true;
    }
      
    function closeFactOverlay() {
        $('.fact-overlay').removeClass("in");
        $('.fact-icon').addClass('in');
        overlayOpen = false;
    }

    function openProgressOverlay() {
        $('.progress-overlay').addClass('in');
        overlayOpen = true;
    }

    function closeProgressOverlay() {
        $('.progress-overlay').removeClass("in");
        overlayOpen = false;
    }

    function changeModule(i) {
        _oldModule = _currentModule;
        _currentModule = i;

        $('.module').eq(_currentModule).scrollTop(0);
        _oldVignette = null;
        _currentVignette = 0;
        _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0);
        closest = 0;
        newClosest = 0;
        $('.vid-container').remove();
        if (_oldModule !== undefined) {
            closeModule(_oldModule);
        }
        $('.progress-overlay .vignettes h2').eq(i).addClass('done');

        expandModule(i);
    }

    function changeHeadline(idx) {
        _oldModule = _currentModule;
        _currentHeadline = $('.headline').eq(idx);
        var _newVignette = $('.module').eq(_currentModule).find(_currentHeadline.closest('.vignette')).index();
        //console.log('current',_currentVignette,' new',_newVignette)
        if (_currentVignette != _newVignette) {
            _currentVignette = _newVignette;
            changeVideo();
        }
        fillDot();
        handleSaveDeepProgress();
    }

    function expandModule() {
        handleSaveDeepProgress();
        $('.nav').addClass('in');
        $('.right-column').addClass('down');
        $('.nav-item').removeClass('active');
        $('.nav-item').eq(_currentModule).addClass('active');
        // _currentFrame = 0;
        $('.education-menu').addClass('out');
        // $('.headline').removeClass('active');
        // $('.headline').removeClass('out');
        // $('.vignette').removeClass('in');
        if (_ie){
            $('.module').css('display','none');
        }
        $('.module').eq(_currentModule).removeClass('left');
        $('.module').eq(_currentModule).addClass('in');
        if (_ie){
            $('.module').eq(_currentModule).css('display','block');
        }

        $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).addClass('in');
        _currentHeadline.addClass('active');
        fillDot();

        $('.education .section-title').addClass('in');
        changeVideo();
    }

    function closeModule(num) {
        $('.module').eq(num).removeClass('in');
        if (_ie){
            $('.module').eq(num).css('display','none');
        }
        if (num < _currentModule) {
            $('.module').eq(num).addClass('left');
        } else {
            $('.module').eq(num).removeClass('left');
        }

        
    }

    function toggleColumn() {
        //if (_currentView == "left") {
        //    _currentView = "right";
        //    $('.logo').addClass('out');
        //    if (_currentModule != undefined) {
        //        setTimeout(function() {
        //            $('.right-column').addClass('down');
        //            $('.nav').addClass('in');
        //        }, 800)
        //    }
        //} else {
        //    $('.logo').removeClass('out');
        //    _currentView = "left"
        //    setTimeout(function() {
        //        $('.right-column').removeClass('down');
        //        $('.nav').removeClass('in');
        //    }, 800)
        //}
        //$('.fact-icon').toggleClass('out');
        //$('.assessment').toggleClass('in');
        //$('.right-column').toggleClass('left');
        //$('.menu-icon').toggleClass('left');
        //$('.education').toggleClass('in');
    }

    function toggleLogo() {
        if (_currentView == "left") {
            _currentView = "right";
            $('.logo').addClass('out');
        } else {
            $('.logo').removeClass('out');
            _currentView = "left"
        }
    }

    function calculateWeight(obj) {
        $('.btn-calculate').css({
            visibility: 'hidden'
        })

        $('.height-wrapper').css({
            display: "none"
        })

        $('.bmi-result').css({
            opacity: 1
        })


           // console.log("getHeightInInches:" + window.heightInInches);
           // console.log("weightInPounds:" + window.weightInPounds);
        // BMI = Formula: weight (lb) / [height (in)]2 x 703
        var BMI = ((window.weightInPounds / (window.heightInInches * window.heightInInches)) * 703).toPrecision(4);
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
//grafics dashboard
    /*
    * Esta función se actualiza cada vez que el scroll de educación baja
    * aca voy a colocar una funcion que carga la cantidad de education vistas
    * por medio de sessionstorage*/
    function updateCharts() {

        $('.dashboard').addClass('flash');
        setTimeout(function() {
            $('.dashboard').removeClass('flash');
        }, 300);
        // percquiz percdive
        //for questions------------


        var preguntasResueltas = sessionStorage.getItem('highQuestion') - 1;
        if(preguntasResueltas > _totalQuestions){
            preguntasResueltas = _totalQuestions;
        }


        //for (q in savedQuizProgress) questionsAnswered++;

        var quizProgress = preguntasResueltas + '/' + _totalQuestions;
        var quizPercent = preguntasResueltas / _totalQuestions;
        $(".percquiz").html(quizProgress);

        chart2.transitionToValues(5,
            8, [quizPercent, 1 - quizPercent], ['#D7006D', '#FFFFFF']);
        chart4.transitionToValues(5,
            8, [quizPercent, 1 - quizPercent], ['#D7006D', '#FFFFFF']);


        //for education------------

       /* if(sessionStorage.getItem('educationView')!=undefined){
            var deepViewed = sessionStorage.getItem('educationView');
        }else{
            var deepViewed = 0;
        }*/

        // for (v in savedDiveProgress) deepViewed++;

//vamos a sumar todos los educations que han sido vistos
//para eso vamos a utilizar el storage dots_education que es un objeto
        if(sessionStorage.getItem('dots_education')!=undefined){

            var recupero = sessionStorage.getItem('dots_education');
            var dots_on = JSON.parse(recupero);
            var i=0;

            $.each(dots_on,function(key,value){
                if(value==1 && key >= 0){
                    i++;
                }
            });

          //  console.log(i);
            deepViewed = i;
        }

        sessionStorage.setItem('educationView',deepViewed);
        //  console.log(deepViewed);

        var diveProgress = deepViewed + '/' + _totalHeadlines;
        var divePercent = deepViewed / _totalHeadlines;

        $(".percdive").html(diveProgress);
        chart3.transitionToValues(5,
            8, [divePercent, 1 - divePercent], 4['#D7006D', '#FFFFFF']);
        chart5.transitionToValues(5,
            8, [divePercent, 1 - divePercent], 4['#D7006D', '#FFFFFF']);
    }


    function handleSaveDeepProgress() {

        // check for invalid values (bugs)
        if (_currentModule < 0 || _currentVignette < 0 || _currentHeadline.index() < 0) return;

        var id = _currentModule + "_" + _currentVignette + "_" + _currentHeadline.index();

        // handle scroll repeditive saves
        if (id == lastDeepSave) return;

        savedDiveProgress[id] = true;

        lastDeepSave = id;
        //console.log(lastDeepSave);


       updateCharts( );

        //TODO
        // user progress the the 
       /* woopra.track("progress", {
         module: _currentModule,
         vignette: _currentVignette,
         headline: _currentHeadline.index()
         });*/
    }



    function createDotsOn($eduView)
    {
        if(sessionStorage['dots_education']!=undefined)
        {
            var recupero = sessionStorage.getItem('dots_education');
            dots_on = JSON.parse(recupero);
        }else{
            var educationView = sessionStorage.getItem('num_education');
            var dots_on = {};

            for(var i=0; i<educationView; i++){
                dots_on[i]=0;
            }
        }

        dots_on[$eduView]=1;

        //convierto en string para poder guardarlo en el storage
        dots_education =  JSON.stringify(dots_on);

        //creamos el sesionstorage
        sessionStorage.setItem('dots_education', dots_education);
    }


    function addResultCopy (){

        $('.results-copy-average').removeClass('on'); 
        $('.results-copy-moderate').removeClass('on'); 
        $('.results-copy-high').removeClass('on'); 

        if ($.inArray("1|-2", savedQuizProgress[8]) > -1 ) {
            resultLevel = 'high';
            $('.risk-level').html('High');
        //using result level for pdf work
            $('.results-copy-high').addClass('on'); 
            return;             
        }

        if (savedQuizProgress[7] === '-1' || ($.inArray("2|-1", savedQuizProgress[8]) !==-1) || ($.inArray("3|-1", savedQuizProgress[8]) !==-1) || ($.inArray("7|0", savedQuizProgress[5]) ===-1 )  || ($.inArray("12|0", savedQuizProgress[10]) ===-1 )|| savedQuizProgress[11] === '-1' || savedQuizProgress[12] === '-1' || savedQuizProgress[14] === '-1' || savedQuizProgress[16] === '-1') { 


            resultLevel = 'moderate';   
            $('.risk-level').html('Increased');
        //using result level for pdf work
            $('.results-copy-moderate').addClass('on'); 
            return;
        }
  
        else {
  
            resultLevel = 'average';   
            $('.risk-level').html('Average');
        //using result level for pdf work
            $('.results-copy-average').addClass('on');   
        }
    }


    function handleSaveQuizAnswer(answer) {
            
        var answers = null;
        var questionTxt;
        var questionObj; 


         //console.log(answer)      
        /*
          BMI
          Weight Status
          Below 18.5  Underweight
          18.5 – 24.9 Normal
          25.0 – 29.9 Overweight
          30.0 and Above  Obese
          */

        // 4 - BMI result
        // 6 - .answers .drinks
        // 5 - Have any of your immediate family members
        // 7 - gene mutation have you or your relative
        // 10 - Within one side of the family
        answers = answer.html();
        //console.log(answers)
        var ansTxt = answer.attr("data-answer-id");
        //if ($.contains(_currentQuestion, $('.bmi-result'))) {
        var bmi = ((window.weightInPounds / (window.heightInInches * window.heightInInches)) * 703).toPrecision(4);

//doesn't affect risk level

        if (_currentQuestion == 4 || _currentQuestion == 6 || _currentQuestion == 9  || _currentQuestion == 15 || _currentQuestion == 17 || _currentQuestion == 18) {

            if (_currentQuestion == 4) {
  
                answers = bmi + " BMI Result"
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


           if (_currentQuestion == 6) {
                ansTxt = currentGlass;
                answers = currentGlass + "  alcohol drinks a day";            
            }

                questionTxt = $('.question').eq(_currentQuestion).find('.prompt').text();           
                questionObj = {'questionnumber': _currentQuestion, 'questionTxt' : questionTxt, 'questionanswer' : answers};


                savedQuestionsAnswers[String(_currentQuestion)] = questionObj;
                savedQuizProgress[String(_currentQuestion)] = ansTxt;
                updateCharts();

              
                return;
        };

        var age = $('input[name="age-radio"]:checked');
        if (_currentQuestion == 1) {
            ansTxt = age.attr("data-answer-id");
            answers = age.next().html();
        }

        var cancerHistoryCheck = $('input[name="cancerhistory-radio"]:checked');
        if (_currentQuestion == 2) {
            ansTxt = cancerHistoryCheck.attr("data-answer-id");
            answers = cancerHistoryCheck.next().html();
        }

        if (_currentQuestion == 5) {
            var data = [];
            var ans5Text = []; 
            $('.cb1 input:checked').each(function() {
                data.push($(this).attr('data-answer-id'));
                ans5Text.push($(this).next().html());
            });
           // console.log(ans5Text);
            ansTxt = data;
            answers = ans5Text;
        }

        var mutationCheck = $('input[name="mutation-radio"]:checked');
        if (_currentQuestion == 7) {
            ansTxt = mutationCheck.attr("data-answer-id");
            answers = mutationCheck.next().html();
        }
        //  console.log(mutationCheck.attr("data-answer-id"))

        if (_currentQuestion == 7 && ansTxt == '+1') {
            $('input[name="mutation-sub"]:checked').removeAttr('checked');
            $('.assessment-dots .dot').eq(_currentQuestion).removeClass('active');
            _currentQuestion = 8;
            $('.assessment-dots .dot').eq(_currentQuestion).addClass('on');
            savedQuizProgress[7] = ansTxt;
            delete savedQuizProgress[8];
            var specialQ = {'questionnumber': '7', 'questionTxt' : 'Have you or any of your close relatives (parent, sibling, grandparent, aunt, or uncle) been diagnosed with a genetic mutation that increases breast or ovarian cancer risk?', 'questionanswer' : answers};

            savedQuestionsAnswers[7] = specialQ;        
        }

        if (_currentQuestion == 8 && savedQuizProgress[7] != '+1') {
            var data = [];
            var ans8Text = []; 
            $('.cb2 input:checked').each(function() {
                data.push($(this).attr('data-answer-id'));
                ans8Text.push($(this).next().html());    
            });
            ansTxt = data;
            answers = ans8Text;
        }
        
        if (_currentQuestion == 10) {
            var data = [];
            var ans10Text = [];             
            $('.cb3 input:checked').each(function() {
                data.push($(this).attr('data-answer-id'));
                ans10Text.push($(this).next().html());   
            });
            ansTxt = data;
            answers = ans10Text;
        }
        
        questionTxt = $('.question').eq(_currentQuestion).find('.prompt').text();        
        questionObj = {'questionnumber': _currentQuestion, 'questionTxt' : questionTxt, 'questionanswer' : answers};

        savedQuestionsAnswers[String(_currentQuestion)] = questionObj;
        savedQuizProgress[String(_currentQuestion)] = ansTxt;

        $('.question-stats').html('');

        for (var key in savedQuizProgress) {
            $('.question-stats').append('question number ' + key + '  answer' + savedQuizProgress[key] + '<br>');
        }

        updateCharts();
        addResultCopy();
        addCustomResults();  
       // console.log('Object savedQuizProgress = ', savedQuizProgress);

      //  console.log('Object savedQuestionsAnswers = ', savedQuestionsAnswers)
        //console.log(savedQuestionsAnswers[0].questionTxt)

        woopra.track("Question Answered", {
            question_number: _currentQuestion,
            question_text: questionTxt,
            question_answer: answers
        });
    
    }


    function addCustomResults() {

     //   console.log(savedQuizProgress);

        // var bmiHigh = savedQuizProgress[2] == '-1';
        // var drinksHigh = savedQuizProgress[3] > 3;
        // var badGene = $.inArray("1|-2", savedQuizProgress[2]);
        addResultCopy();  
        var cardsObj;
        var cardContent;

// BMI
// ALCOHOL
// PHYSICAL ACTIVITY
// BIRTH CONTROL
// BREASTFEEDING
// PREGNANCY

        if (savedQuizProgress[4] === '+1') { 
            $('.item.bmi-low').css({
                display: 'block'
            })
            // cardContent = $('.item.bmi-low').text();
            //cardsHigh[0]['factbody'] = "new string";
            cardsHigh[0]['facttitle'] = "";    
            cardsHigh[0]['factheadline'] = "";     
            cardsHigh[0]['factbody'] = "";    
        }    
        else if (savedQuizProgress[4] === '-1') { 
            $('.item.bmi-high').css({
                display: 'block'
             })  
            // cardContent = $('.item.bmi-high').text();
            cardsLow[0]['facttitle'] = "";    
            cardsLow[0]['factheadline'] = "";     
            cardsLow[0]['factbody'] = "";    
        }

//drinks card
        if (savedQuizProgress[6] <= '1') { 
            $('.item.alcohol-low').css({
                display: 'block'
            })
            cardsHigh[1]['facttitle'] = "";    
            cardsHigh[1]['factheadline'] = "";     
            cardsHigh[1]['factbody'] = "";             
        }    
        else if (savedQuizProgress[6] >= '2') { 
            $('.item.alcohol-high').css({
                display: 'block'
             })            
            cardsLow[1]['facttitle'] = "";    
            cardsLow[1]['factheadline'] = "";     
            cardsLow[1]['factbody'] = "";                   
        }

//exercise card
        if (savedQuizProgress[9] === '+1') { 
            $('.item.exercise-low').css({
                display: 'block'
            })
            cardsHigh[2]['facttitle'] = "";    
            cardsHigh[2]['factheadline'] = "";     
            cardsHigh[2]['factbody'] = "";             
        }    
        else if (savedQuizProgress[9] === '-1') { 
            $('.item.exercise-high').css({
                display: 'block'
             })   
            cardsLow[2]['facttitle'] = "";    
            cardsLow[2]['factheadline'] = "";     
            cardsLow[2]['factbody'] = "";  
        }

//period card
        if (savedQuizProgress[13] == '-1') { 
            $('.item.period-high').css({
                display: 'block'
            })
        } 
        else if (savedQuizProgress[13] === '+1') {  
            cardsHigh[6]['facttitle'] = "";    
            cardsHigh[6]['factheadline'] = "";     
            cardsHigh[6]['factbody'] = "";  
        }

//birth-control card
        if (savedQuizProgress[15] === '+1') { 
            $('.item.birth-control-low').css({
                display: 'block'
            })
            cardsHigh[3]['facttitle'] = "";    
            cardsHigh[3]['factheadline'] = "";     
            cardsHigh[3]['factbody'] = "";             
        }    
        else if (savedQuizProgress[15] === '-1') {
            $('.item.birth-control-high').css({
                display: 'block'
             })     
            cardsLow[3]['facttitle'] = "";    
            cardsLow[3]['factheadline'] = "";     
            cardsLow[3]['factbody'] = "";  
        }

//pregnancy card
        if (savedQuizProgress[17] === '+1') { 
            $('.item.pregnancy-low').css({
                display: 'block'
            })
            cardsHigh[5]['facttitle'] = "";    
            cardsHigh[5]['factheadline'] = "";     
            cardsHigh[5]['factbody'] = "";             
        }    
        else if (savedQuizProgress[17] === '-1') { 
            $('.item.pregnancy-high').css({
                display: 'block'
             })   
            cardsLow[5]['facttitle'] = "";    
            cardsLow[5]['factheadline'] = "";     
            cardsLow[5]['factbody'] = "";           
        }

//BREASTFEEDING card
        if (savedQuizProgress[18] === '+1') { 
            $('.item.breastfeeding-low').css({
                display: 'block'
            })
            cardsHigh[4]['facttitle'] = "";    
            cardsHigh[4]['factheadline'] = "";     
            cardsHigh[4]['factbody'] = "";             
        }    
        else if (savedQuizProgress[18] === '-1') { 
            $('.item.breastfeeding-high').css({
                display: 'block'
             })   
            cardsLow[4]['facttitle'] = "";    
            cardsLow[4]['factheadline'] = "";     
            cardsLow[4]['factbody'] = "";           
        }

    
//previous cancer history
      if (savedQuizProgress[2] === '-1') { 
            $('.triggered-cancer-copy').addClass('showable');
        }

//supress cards when 40+ is selected 
        if (savedQuizProgress[1] === '5') { 
            

            $('.item.birth-control-low').css({
                display: 'none'
            })
            $('.item.birth-control-high').css({
                display: 'none'
            })
            $('.item.pregnancy-low').css({
                display: 'none'
            })
            $('.item.pregnancy-high').css({
                display: 'none'
            })
            $('.item.breastfeeding-low').css({
                display: 'none'
            }) 
            $('.item.breastfeeding-high').css({
                display: 'none'
            })             

            cardsLow[3]['facttitle'] = "";    
            cardsLow[3]['factheadline'] = "";     
            cardsLow[3]['factbody'] = "";  
            cardsHigh[3]['facttitle'] = "";    
            cardsHigh[3]['factheadline'] = "";     
            cardsHigh[3]['factbody'] = "";  

            cardsLow[4]['facttitle'] = "";    
            cardsLow[4]['factheadline'] = "";     
            cardsLow[4]['factbody'] = "";  
            cardsHigh[4]['facttitle'] = "";    
            cardsHigh[4]['factheadline'] = "";     
            cardsHigh[4]['factbody'] = "";  

            cardsLow[5]['facttitle'] = "";    
            cardsLow[5]['factheadline'] = "";     
            cardsLow[5]['factbody'] = "";  
            cardsHigh[5]['facttitle'] = "";    
            cardsHigh[5]['factheadline'] = "";     
            cardsHigh[5]['factbody'] = "";  
        } 
    }

    function askHandler(e) {
        e.stopPropagation();
    }
    
    function answerQuestion(answer) {

		if (_currentQuestion == 0) {
			$('.copyright .nsgc-logo').hide();
		}
        if (_currentQuestion >= _totalQuestions -1) {
           // addCustomResults()
            setTimeout(function(){
                //openProgressOverlay();
                if(_smallScreen){
                    $('.progress-overlay').scrollTop(450);
                }
            },1000)
            //$('.assessment .share').addClass('in')
            $('.results, .cards').css({
                display: 'block'
            })
            $('.questions').css({
                display: 'none'
            })
        }

        if(_currentQuestion == 0 && answer.html() !== "Yes"){
                //$('.male-overlay').addClass('in');
                //$('.fact-icon').removeClass('in');
                //overlayOpen = true;

        } else {
           $('.progress-overlay .progress-question').eq(_currentQuestion).css({
               opacity: .3
           })
           $('.question').eq(_currentQuestion).addClass('out-up')
           $('.question').eq(_currentQuestion).removeClass('in')
           $('.fact-icon').removeClass('new')

           if (!$(this).hasClass('submit-weight')) {
               handleSaveQuizAnswer(answer)
           }
           var _oldQuestion = _currentQuestion;
           _currentQuestion++;
           setTimeout(function() {
              // $('.fact').eq(_currentQuestion).addClass('in')
               $('.fact-icon').addClass('new')
               $('.assessment-dots .dot').eq(_oldQuestion).removeClass('active')
               $('.assessment-dots .dot').eq(_currentQuestion).addClass('on')
               $('.assessment-dots .dot').eq(_currentQuestion).addClass('active')
               $('.assessment-dots .btn-back').addClass('active')
           }, 1000)
           setTimeout(function(){
               $('.assessment-wrap').scrollTop(0);
           }, 500)
           $('.question').eq(_currentQuestion).addClass('in')
           $('.question').eq(_currentQuestion).removeClass('out-up') 
        }
    }
    function prevQuestion(){


        if(_currentQuestion > 0){




            
            $('.question').eq(_currentQuestion).addClass('out-up')
            $('.question').eq(_currentQuestion).removeClass('in')

            var _oldQuestion = _currentQuestion;
            _currentQuestion--;
            setTimeout(function() {
                //$('.fact').eq(_currentQuestion).addClass('in');
                $('.assessment-dots .dot').eq(_oldQuestion).removeClass('active')
                $('.assessment-dots .dot').eq(_currentQuestion).addClass('on')
                $('.assessment-dots .dot').eq(_currentQuestion).addClass('active')

            }, 1000)
            $('.question').eq(_currentQuestion).removeClass('out-up')
            $('.question').eq(_currentQuestion).addClass('in')
           // $('.assessment .share').removeClass('in')
            if(_currentQuestion == 0){
                $('.assessment-dots .btn-back').removeClass('active')
            }
           // console.log(_currentQuestion)

        }
    }
    function nextVignette() {

        // $('.vignette').removeClass('in');
        setTimeout(function() {
            // $('.module').eq(_currentModule).find($('.vignette')).eq(_oldVignette).attr('src',"");
        }, 600);
        _oldVignette = _currentVignette;
        _currentVignette++;
        // $('.headline').removeClass('active');
        if (_currentVignette == $('.module').eq(_currentModule).find($('.vignette')).length) {

            if (_currentModule + 1 >= 3) {

                return;
            }
            changeModule(_currentModule + 1);
        } else {
            _oldHeadline = _currentHeadline;
            _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0);
            fillDot();
            _currentHeadline.addClass('active')
            var currentVin = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette);

            currentVin.addClass('in');
            
            // $('.bg-video').get(_currentVignette).currentTime = 0;
            // console.log("module" + _currentModule, "vignette" + _currentVignette, "headline" + _currentHeadline.index())
            changeVideo();
            //$('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.bg-video')).get(0).play();   
        }   

        handleSaveDeepProgress();
    }

    function changeVideo() {

        var vig = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette);

        var imgSrc = 'img/video_stills/' + vig.data('src') + '.jpg';

        if (/Android|webOS|iPhone|iPod|iPad|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            loadBGImg(imgSrc);
        } else if ($('html').hasClass('ie9')) {
            loadBGImg(imgSrc);
        } else {
            var src = vig.data('src') + videoType;
            loadBGVideo(vig, src, cloudfrontURL);
        }
    }

    function loadBGImg(src) {

    	if (_currentImage === src){
    		return;
    	}

    	var vid = $('#bg-vid');
    	var img = $('#bg-img');
    	if(!$(img).length){
	    	img = $('<div id="bg-img" class="img-container"></div>');
	    	vid.after(img);
		}
		var previousImage = _currentImage;
		
		var imgContainer = $('<img style="opacity: 0;" src="' + src + '">');
		
		img.append(imgContainer);
		sizeBGMedia();

		_currentImage = imgContainer;
		$(imgContainer).animate({
            opacity: 1
        }, 800, function() {
            // console.log("video fade in complete");
            if (previousImage) {
                $(previousImage).remove();
            }
        });
    }

    function loadBGVideo(vig, src, host) {
        if ($('#bg-vid').attr('data-src') != src) {
            $('#bg-vid').attr('data-src', src);
            if (Modernizr.video) {

                var previousVid = _currentVideo;

                var videoContainer = $('<div class="vid-container" style="opacity: 0;"></div>');
                var vid1 = $('<video class="bg-video" preload="auto" autoplay loop></video>');

                // var vid2 = $('<video class="bg-video" src="" style="opacity: 1;display:none;" type="video/mp4" preload="auto" autoplay></video>');
                var videoElement = vid1;
                $(videoContainer).append(vid1) /*.append(vid2)*/ ;
                _currentVideo = videoContainer;
                sizeBGMedia();

                function onVideoPlay() {
                    // _pageResize();
                    $(videoContainer).delay(1000).animate({
                        opacity: 1
                    }, 800, function() {
                        // console.log("video fade in complete");
                        if (previousVid) {
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

                function onVideoProgress() {
                    // console.log($(this).get(0).currentTime);
                }

                $(vid1).on('play', onVideoPlay);
                // $(vid2).on('play', onVideoPlay);

                // $(vid1).on('ended', onVideoEnd);
                // $(vid2).on('ended', onVideoEnd);

                // $(vid1).on('ontimeupdate', onVideoProgress);
                // $(vid2).on('ontimeupdate', onVideoProgress);

                // let's play some video! but what kind?
                var uri;

                // if (Modernizr.video.ogg) {

                    videoURL = $(vig).data()
                    videoType = ".ogv"
                    uri = host + videoURL['src'] + videoType;
                    $(vid1).append('<source src="' + uri + '" type="video/ogg">');
                // } 
                // else if (Modernizr.video.h264) {

                    videoURL = $(vig).data()
                    videoType = ".mp4"
                    uri = host + videoURL['src'] + videoType;
                    $(vid1).append('<source src="' + uri + '" type="video/mp4">');
                

                // }
                // else if (Modernizr.video.webm) {

                    videoURL = $(vig).data()
                    videoType = ".webm"
                    $(vid1).addClass('in');
                    // $(vid2).addClass('in');
                    uri = host + videoURL['src'] + videoType;
                    $(vid1).append('<source src="' + uri + '" type="video/webm">');

                // } 


                // $(vid1).attr('src', uri);
                // $(vid2).attr('src', uri);

                $('#bg-vid').append($(videoContainer));



                //$('.bg-video').get(0).play();
                $('.bg-video').css({
                    background: "#000"
                });

                // $(videoElement).css('display', 'block');


            }
        }
        sizeBGMedia();
    }


    function createProgressOverlay() {
        var html = "<div class='section-title'>Risk Assessment</div>";
        for (var i = 0; i < $('.prompt').length - 1; i++) {
            html += "<div class='progress-question'><b>Q" + (i + 1) + ":</b><br><h4>" + $('.prompt').eq(i).html() + "</h4></div>"
        }
        $('.progress-overlay .questions .progress').after(html);
    }


  $.address.externalChange(function(event) {

        var oldPath = _currentPath;
        var newPath = event.value;

      //  console.log('oldpath', oldPath)
     //   console.log('newpath', newPath)

       // if (oldPath === '/education' && newPath === '/assessment' ){
       ////     console.log('true')
       //    // toggleColumn();
       //  //   _currentPath = newPath;
       // }
       // else if (oldPath === '/assessment' && newPath === '/assessment' ){
       ////     console.log('true')
       //     //toggleColumn();
       //   //  _currentPath = newPath;
       // }
       // else if (oldPath === '/education' && newPath === '/intro' ){
       //   //  console.log('true')
       //    // toggleColumn();
       //   //  _currentPath = '/assessment';
       // }
       // else if (oldPath === '/intro' && newPath === '/intro' ){
       //   //  console.log('true')
       //  //   toggleColumn();
       //   //  _currentPath = '/assessment';
       // }
       //  else if (oldPath === '/intro' && newPath === '/assessment' ){
       //    // console.log('true')
       //     // toggleColumn();
       //    // _currentPath = newPath;
       // }
        // else if (oldPath === '/education' && newPath === '/intro' ){
        //     console.log('trueintro')
        //     //toggleColumn();
        //     window.location.href = '/#' +newPath;
        //     _currentPath = newPath;
        // }


        if (event.value == '/education') {
           // console.log(_currentView)
          //  console.log('education');
            //_currentView = "left";
            hideIntro();
           addCharts();
            toggleColumn();
            _currentPath = newPath;
        } else if (event.value == '/education/lifestyle') {
          //  console.log('education/lifestyle');
            hideIntro();
            addCharts();
            toggleColumn();
            _currentPath = newPath;
        } else if (event.value == '/assessment') {
            //_currentView = "right";
         //   console.log('assessment');
        //    console.log(_currentView)
            hideIntro();
            addCharts();
            //toggleColumn();
            _currentPath = newPath;
        } else {
          //  console.log('intro view')
           // console.log(_currentView)
            startIntro();
            $.address.path('/');
            _currentPath = newPath;
        };
        $('.vid-container').remove();

    });


    $(document).ready(function() {

if (typeof localStorage === 'object') {
    try {
        localStorage.setItem('localStorage', 1);
        localStorage.removeItem('localStorage');
    } catch (e) {
        Storage.prototype._setItem = Storage.prototype.setItem;
        Storage.prototype.setItem = function() {};
    }
}
        _totalQuestions = sessionStorage.getItem('num_question');
        //_totalHeadlines = $('.headline').length;
        _totalHeadlines = sessionStorage.getItem('num_education');

        headline_tops = [];
        _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0);
        fillDot();
        //position the header to be 90%;
        _$window = $(window);
        _$document = $(window.document);
       // createProgressOverlay();
        //createDots();
        for (var i = 0; i < _totalHeadlines; i++) {
            $('.headline').eq(i).attr('data-idx', i)
        }
       // getUserCount();
        _registerEventListeners();
        _pageResize();
        setTimeout(function(){
            _pageResize();

        },1000);

        initialized = true;
        setTimeout(function(){
            $('.right-column').addClass('active');
            $('.wheel-container').addClass('shrink');
        },6000)
        $('input, textarea').placeholder(); // Initialize jquery-placeholder
		$("div[data-question-id='42'] .anim-gif").removeClass("calendar").addClass("birth")
		$("div[data-question-id='18'] .anim-gif").removeClass("calendar").addClass("calendar2")
		$("div[data-question-id='18'] .ch-radio").addClass("cal-radio")
		$("div[data-question-id='36'] .anim-gif").removeClass("calendar").addClass("stopwatch")

    });

})(jQuery);
