    var resultLevel = 'average';
    var savedQuestionsAnswers = {};
    var endCards = {};  

(function($, undefined) {
    var _$window;
    var _$document;
    var _winH;
    var _winW;
    var _smallScreen;
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
    var _currentQuestion = 0;
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

    $('.module').on('scroll', function(e) {
        // if(overlayOpen){
        //   return;
        // }
        _scrollHandler();
    });


    function _pageResize() {
        $('.module').scrollTop(0);
        _winH = _$window.height();
        _winW = _$window.width();
        if (_winW <= 768) {
            _smallScreen = true;
            $('.module-hero h1').eq(1).html('Normal')
            $('.module-hero h1').eq(2).html('Family')
        } else {
            _smallScreen = false;
            $('.module-hero h1').eq(1).html('Knowing Your Normal')
            $('.module-hero h1').eq(2).html('Family & Health History')
        }
        sizeBGMedia();
        setFontScale($('html'), 11, 16, 'px');
        setHeadlineTops();
        if(_smallScreen){
            $('.wheel-container').css({
                left: Math.max(-27,((_winW - 320) + ((320-_winW)/2)-27))
            });
        }else if(_winW < 1024){
            $('.wheel-container').css({
                left: _winW/10
            });
        }else{
            $('.wheel-container').css({
                left: '25%'
            });
        }
        $('.education .dots h6').eq(1).css({
            left: $('.module').eq(0).find($(".headline")).length * 22
        })
        $('.education .dots h6').eq(2).css({
            left: $('.education h6').eq(1).position().left + $('.module').eq(1).find($(".headline")).length * 22
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

    function fillDot() {
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
        $('.education .dot').eq(hNum).addClass('active');
        $('.education .dot').eq(hNum).addClass('on');
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
          console.log('pledges ' +data[moduleCategories[i]])
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
          console.log(error);
        });
      }

    function _registerEventListeners() {
        $('#Begin, .assess-start').on('click', function(e) {
            $('.vid-container').remove();
            e.stopPropagation();
            hideIntro();
            addCharts();
            //window._currentPath = '/assessment';
            $.address.path('/assessment');
            //$.address.path('/assessment');
        })

//buttons
        $('input[name="age-radio"]').change(function(){
            $('#age-btn').prop('disabled', !this.checked);
        });

        $('input[name="cancerhistory-radio"]').change(function(){
            $('#cancerhistory-btn').prop('disabled', !this.checked);
        });

        $('input[name="famdiag-check"]').change(function(){
            $('#famdiag-check-btn').prop('disabled', !this.checked);
        });

        $('input[name="mutation-radio"]').change(function(){
            $('#mutation-btn').prop('disabled', !this.checked);
        });

        $('input[name="mutation-sub"]').change(function(){
            $('#mutation-sub-btn').prop('disabled', !this.checked);
        });

        $('.testPDF, .pdf').on('click', function() {
            createPinkPDF(resultLevel, savedQuestionsAnswers);
        })


        $('.facebook.lifestyle').on('click', function() {
            console.log('clicked')

            $('.lifestyle-pledge-number').text('You and ' + lifestylePledgeCount +'  women have pledged to improve your lifestyles')
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
        })

        $('.facebook.knowing').on('click', function() {
            console.log('clicked')

            $('.knowing-pledge-number').text('You and ' + knowingPledgeCount +'  women have pledged to know your normal')
            $('.facebook.knowing').css({
                display: "none"
            })


            resp = $.ajax({
              type : "GET",
              cache: false,
              url : "/count/add/knowing",
              dataType: 'json'
            }).done(function(data) {
              console.log(data);
            }).fail(function(error) {
              console.log(error);
            });
        })

        $('.facebook.family').on('click', function() {
            console.log('clicked')

            $('.family-pledge-number').text('You and ' + familyPledgeCount +'  women have pledged to learn about their family history')
            $('.facebook.family').css({
                display: "none"
            })

            resp = $.ajax({
              type : "GET",
              cache: false,
              url : "/count/add/family",
              dataType: 'json'
            }).done(function(data) {
              console.log(data);
            }).fail(function(error) {
              console.log(error);
            });
        })        

        $('.male-overlay .close-btn').on('click', function() {
            $('.vid-container').remove();
            overlayOpen = false;
            $('.male-overlay').removeClass("in");
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
                $(this).html('Read Less');
                $('.more-results').css({
                    display: 'block'
                })
            }else{
                $(this).html('Read More');
                $('.more-results').css({
                    display: 'none'
                })
            }
        })   

        $('.progress-overlay .email-pdf').on('click', function() {
            window.open('mailto:?subject=111Here are the results of your risk assessment&amp;body=I thought you might find this information interesting','');
        })
        $('.sub.email').on('click', function() {
            console.log('click');
            var content = $('.email-content').text();
            window.open('mailto:?subject=Here are the results of your risk assessment&amp;body=Your Questions %0D%0A' + content)
        })


        $('.progress-overlay .share-btn').on('click', function() {
            //window.open('mailto:?subject=Saving your life&body=You’re welcome: http://www.brightpink.com/assessment','');
        })
        $('.progress-overlay .close-btn').on('click', closeProgressOverlay);
        $('.assessment-intro button, .lets-go').on('click', function() {
            $('.right-column').addClass('in2')
            $('.assessment-intro').addClass('out-up');
            $('.assessment-intro').removeClass('in');
            $('.question').eq(0).addClass('in');
            $('.fact').eq(_currentQuestion).addClass('in');
            $('.assessment-dots .dot').eq(_currentQuestion).addClass('on');
            $('.assessment-dots .dot').eq(_currentQuestion).addClass('active');
        })
        $('.ask').on('click', askHandler);
        $('.btn-calculate').on('click', function(e) {
            calculateWeight($(this));
        })
        $('.question .answers button').on('click', function(e) {
            if (!$(this).hasClass('sub')) { 
                answerQuestion($(this));
            }
        })
        $('.btn-back').on('click', function(e) { 
            prevQuestion();
        })
        $('.asterisk').on('mouseenter', function() {
            $(this).next().addClass("show");
            $(this).next().css({
                left: $(this).offset().left
            })
        })
        $('.asterisk').on('mouseleave', function() {
            $(this).next().removeClass("show")
        })
        $('.assess').on('click', function() {
            toggleColumn();
            window._currentPath = '/assessment';
            $.address.path('/assessment');
        })
        $('.understand').on('click', function() {
            toggleColumn();
            window._currentPath = '/education';
            $.address.path('/education');
        })
        $('.module-hero').on('click', function() {
            changeModule($(this).index());
        })
        $('.progress-overlay .vignettes h3').on('click', function() {
            changeModule($('.progress-overlay .vignettes h3').index($(this)));
            closeProgressOverlay();
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
        $('.menu-icon, .btn-results').on('click', function() {
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
            e.preventDefault();
            var x = e.pageX;
            var distance = 0;
            var l;

            _$window.on('mousemove', function(e) {
                var newX = e.pageX;
                dragBottle(x, newX)
                x = e.pageX;
                distance = 0;
            });
        });
        _$window.on('mouseup', function() {
            _$window.off('mousemove');
            _$window.off('touchmove');
        });
        $('.bottle').on('touchstart', function(e) {
            var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
            e.preventDefault();
            var x = touch.pageX;
            var distance = 0;
            var l;

            _$window.on('touchmove', function(e) {
                var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
                var newX = touch.pageX;
                dragBottle(x, newX)
                x = touch.pageX;
                distance = 0;
            })
        })
        _$window.on('touchend', function() {
            _$window.off('touchmove');
            _$window.off('mousemove');
        })
        _$window.on('resize', _pageResize);
    }

    function dragBottle(x, newX) {
        distance = x - newX;
        var min = 50;
        if (_smallScreen) {
            min = 20;
        }
        l = Math.max(min, $('.bottle').position().left - distance);
        l = Math.min(l, 550);
        var glassW = 59;
        if (_smallScreen) {
            glassW = 25;
        }
        currentGlass = Math.floor((l - 5) / glassW);
        for (var i = 0; i < $('.drink').length; i++) {
            if (i <= currentGlass) {
                $('.drink img').eq(i).css({
                    opacity: 1
                })
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

    function createDots() {
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
    }

    function hideIntro() {

        console.log('hideIntro');
         // $('.logo').css('opacity', 1);
         TweenLite.to($('.logo'), .5, {opacity: 1, delay: 1});

        $('.intro').addClass('out-up')
        $('.right-column').addClass('in')
        $('.assessment').addClass('in');
        $('.border').addClass('white');
    };

    function goHome(){
        console.log('goHome');
        TweenLite.to($('.logo'), .5, {opacity: 1, delay: 0});
        TweenLite.to($('.intro'), .5, {opacity: 1, delay: 1});
        $('.intro').removeClass('out-up')
        $('.right-column').removeClass('in')
        $('.assessment').removeClass('in');
        $('.border').removeClass('white');
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
        if (_currentView == "left") {
            _currentView = "right";
            $('.logo').addClass('out');
            if (_currentModule != undefined) {
                setTimeout(function() {
                    $('.right-column').addClass('down');
                    $('.nav').addClass('in');
                }, 800)
            }
        } else {
            $('.logo').removeClass('out');
            _currentView = "left"
            setTimeout(function() {
                $('.right-column').removeClass('down');
                $('.nav').removeClass('in');
            }, 800)
        }
        $('.assessment').toggleClass('in');
        $('.right-column').toggleClass('left');
        $('.menu-icon').toggleClass('left');
        $('.education').toggleClass('in');
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


        //    console.log("getHeightInInches:" + window.heightInInches);
        //    console.log("weightInPounds:" + window.weightInPounds);
        // BMI = Formula: weight (lb) / [height (in)]2 x 703
        var BMI = ((window.weightInPounds / (window.heightInInches * window.heightInInches)) * 703).toPrecision(4);
        $(".bmi-result .answers").before("<h4>Your BMI result is</h4><h3>" + BMI + "</h3>");
        console.log(BMI)
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
        setTimeout(function() {
            $('.dashboard').removeClass('flash');
        }, 300);
        // percquiz percdive
        var questionsAnswered = 0;
        for (q in savedQuizProgress) questionsAnswered++;

        var quizProgress = questionsAnswered + '/' + _totalQuestions;
        var quizPercent = questionsAnswered / _totalQuestions;
        $(".percquiz").html(quizProgress);

        chart2.transitionToValues(5,
            8, [quizPercent, 1 - quizPercent], ['#D7006D', '#FFFFFF']);
        chart4.transitionToValues(5,
            8, [quizPercent, 1 - quizPercent], ['#D7006D', '#FFFFFF']);

        var deepViewed = 0;
        for (v in savedDiveProgress) deepViewed++;
        var diveProgress = deepViewed + '/' + _totalHeadlines;
        var divePercent = deepViewed / _totalHeadlines;
        if (divePercent == 1) {

        }
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
        updateCharts();
    }




    function handleSaveQuizAnswer(answer) {
            
        var answers = null;


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

            if (_currentQuestion == 4) {
            console.log(bmi)    
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

        if (_currentQuestion == 5) {
            var data = [];
            var ans5Text = []; 
            $('.cb1 input:checked').each(function() {
                data.push($(this).attr('data-answer-id'));
                ans5Text.push($(this).next().html());
            });
            console.log(ans5Text);
            ansTxt = data;
            answers = ans5Text;
        }

        var mutationCheck = $('input[name="mutation-radio"]:checked');
        if (_currentQuestion == 7) {
            ansTxt = mutationCheck.attr("data-answer-id");
            answers = mutationCheck.next().html();
        }
          console.log(mutationCheck.attr("data-answer-id"))

        if (_currentQuestion == 7 && ansTxt == '+1') {
            $('.assessment-dots .dot').eq(_currentQuestion).removeClass('active')
            _currentQuestion = 8;
            $('.assessment-dots .dot').eq(_currentQuestion).addClass('on')
            savedQuizProgress['7'] = ansTxt;
            delete savedQuizProgress[8];
            var specialQ = {'questionnumber': '7', 'questionTxt' : 'Have you or any of your close relatives (parent, sibling, grandparent, aunt, or uncle) been diagnosed with a genetic mutation that increases breast or ovarian cancer risk?', 'questionanswer' : answers};

            savedQuestionsAnswers['7'] = specialQ;        
        }


        if (_currentQuestion == 8 && savedQuizProgress['7'] != '+1') {
            var data = [];
            var ans8Text = []; 
            $('.cb2 input:checked').each(function() {
                data.push($(this).attr('data-answer-id'));
                ans8Text.push($(this).next().html());    
            });
            ansTxt = data;
            answers = ans8Text;

            if (ansTxt == '1|-2') {
                console.log('high')
                $('.risk-level').html('High');
//using result level for pdf work
                resultLevel = 'high';
                $('.results-copy-average, .results-copy-moderate').removeClass('on');  
                $('.results-copy-high').addClass('on');                   
            }

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


        if (ansTxt == '-1' && $('.risk-level').html() == 'Average') {
            $('.risk-level').html('Increased');
            resultLevel = 'moderate';
            $('.results-copy-average').removeClass('on');   
            $('.results-copy-moderate').addClass('on');  

        }
        
        var questionTxt = $('.question').eq(_currentQuestion).find('.prompt').text();
        
        var questionObj = {'questionnumber': _currentQuestion, 'questionTxt' : questionTxt, 'questionanswer' : answers};

        savedQuestionsAnswers[String(_currentQuestion)] = questionObj;
        savedQuizProgress[String(_currentQuestion)] = ansTxt;

        $('.question-stats').html('');

        for (var key in savedQuizProgress) {
            $('.question-stats').append('question number ' + key + '  answer' + savedQuizProgress[key] + '<br>');
        }

        updateCharts();
        //console.log('Object savedQuizProgress = ', savedQuizProgress)

        // if (_currentQuestion == 0) return;
        //console.log('Object savedQuestionsAnswers = ', savedQuestionsAnswers)
        //console.log(savedQuestionsAnswers[0].questionTxt)

        getUserAnswersForEmail();
    
    }

    function getUserAnswersForEmail() {
        var emailqs;
        
         $('.email-content').html('');

         $.each(savedQuestionsAnswers, function( key, value ) {
            // console.log( value.questionnumber );
            // console.log( value.questionTxt );
            // console.log( value.questionanswer );
            questionID = parseInt(value.questionnumber + 1);

            if (key == 3) {
                questionID = value.questionnumber - 1;
                return; 
            }

            if (key == 4) {
                value.questionTxt = 'Your BMI Score is'
            }

            $('.email-content').append('<div class="email-content-q"> %0D%0A %0D%0A' + questionID + '.  ' + value.questionTxt + '%0D%0A' + value.questionanswer + '%0D%0A</div>')
            //emailqs = value.questionnumber + value.questionTxt + value.questionanswer 
        });

         var resultCopy = $('.results-copy-high').text();

         //console.log(resultCopy)

         //$('.email-content').append('%0D%0A %0D%0A %0D%0A Your Result Text %0D%0A %0D%0A ' + encodeURIComponent(resultCopy));

         //return emailqs;
    }

    function addCustomResults() {

        // var bmiHigh = savedQuizProgress[2] == '-1';
        // var drinksHigh = savedQuizProgress[3] > 3;
        // var badGene = $.inArray("1|-2", savedQuizProgress[2]);

        var cardsObj;
        var cardContent;

//bmi card
        if (savedQuizProgress[4] == '+1') { 
            $('.item.bmi-low').css({
                display: 'block'
            })
            cardContent = $('.item.bmi-low').text();
            cardsObj = {'fact': cardContent};
            console.log(cardsObj)
        }    
        else 
            $('.item.bmi-high').css({
                display: 'block'
             })  
            cardContent = $('.item.bmi-high').text();
            cardsObj = {'fact': cardContent};
            console.log(cardsObj)        


//drinks card
        if (savedQuizProgress[6] <= '2') { 
            $('.item.alcohol-low').css({
                display: 'block'
            })
        }    
        else 
            $('.item.alcohol-high').css({
                display: 'block'
             })            
                

//exercise card
        if (savedQuizProgress[9] == '+1') { 
            $('.item.exercise-low').css({
                display: 'block'
            })
        }    
        else 
            $('.item.exercise-high').css({
                display: 'block'
             })   

//period card
        if (savedQuizProgress[13] == '-1') { 
            $('.item.period-high').css({
                display: 'block'
            })
        } 

//birth-control card
        if (savedQuizProgress[15] == '+1') { 
            $('.item.birth-control-low').css({
                display: 'block'
            })
        }    
        else 
            $('.item.birth-control-high').css({
                display: 'block'
             })     

//pregnancy card
        if (savedQuizProgress[17] == '+1') { 
            $('.item.pregnancy-low').css({
                display: 'block'
            })
        }    
        else 
            $('.item.pregnancy-high').css({
                display: 'block'
             })   

//BREASTFEEDING card
        if (savedQuizProgress[18] == '+1') { 
            $('.item.breastfeeding-low').css({
                display: 'block'
            })   
        }
        if (savedQuizProgress[18] == '-1') { 
            $('.item.breastfeeding-high').css({
                display: 'block'
            })   
        }
    
//previous cancer history
      if (savedQuizProgress[2] == '-1') { 
            $('.triggered-cancer-copy').addClass('show')
            // $('.triggered-cancer-copy').css({
            //     display: 'block !important' 
            // })  
        }

    }

    function askHandler(e) {
        e.stopPropagation();
        switch ($(this).closest(".question").attr("data-question-id")) {
            case "14":
                window.open("mailto:?subject=Can you help me answer this%3F&body=Hey, %0D%0A \
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
Do you know if anybody in the family has been diagnosed with any of these%3F");
                break;
            case "17":
                window.open("mailto:?subject=Can you help me answer this%3F&body=Hey, %0D%0A \
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
Do you know if anybody in the family has been diagnosed with any of these%3F")
                break;
            case "20":
                window.open("mailto:?subject=Can you help me answer this%3F&body=Hey, %0D%0A \
I'm doing a breast and ovarian cancer risk assessment on http://brightpink.com/assessment and one of the questions is: \
%0D%0A\
%0D%0A\
Do you have one or more immediate family members (parent, sibling, grandparent, aunt/uncle) that have had breast cancer at age 50 or older%3F \
%0D%0A\
%0D%0A\
Do you know if I do%3F");
                break;
        }
    }
    function answerQuestion(answer) {

        if (_currentQuestion >= _totalQuestions -1) {
            addCustomResults()
            setTimeout(function(){
                openProgressOverlay();
            },1000)
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
        switch (_currentQuestion) {
            case 0:
                if (answer.html() != "Yes") {
                    $('.male-overlay').addClass('in');
                    overlayOpen = true;
                }
                break;
            case 1:
                if (answer.html() == "Yes") {
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

        if (!$(this).hasClass('submit-weight')) {
            handleSaveQuizAnswer(answer)
        }
        var _oldQuestion = _currentQuestion;
        _currentQuestion++;
        setTimeout(function() {
            $('.fact').eq(_currentQuestion).addClass('in');
            $('.assessment-dots .dot').eq(_oldQuestion).removeClass('active')
            $('.assessment-dots .dot').eq(_currentQuestion).addClass('on')
            $('.assessment-dots .dot').eq(_currentQuestion).addClass('active')
        }, 1000)
        $('.question').eq(_currentQuestion).addClass('in')
        $('.question').eq(_currentQuestion).removeClass('out-up')
    }

    function prevQuestion(){
        if(_currentQuestion > 0){

            console.log(_currentQuestion)

            console.log(savedQuizProgress['7'])
            if (_currentQuestion == 9 && savedQuizProgress['7'] == '+1') {
                $('.assessment-dots .dot').eq(_currentQuestion).removeClass('active')
                
                $('.fact').eq(_currentQuestion).removeClass('in');
                $('.fact').eq(_currentQuestion).addClass('out');
   
                $('.question').eq(_currentQuestion).addClass('out-up')
                $('.question').eq(_currentQuestion).removeClass('in')

                _currentQuestion = 8;
                $('.assessment-dots .dot').eq(_currentQuestion).addClass('on')
            }

            if (_currentQuestion == 4) {


                $('.bmi-result.answers').css({
                    opacity: 0
                })   

                $('.question').eq(_currentQuestion).addClass('out-up')
                $('.question').eq(_currentQuestion).removeClass('in')

                $('.fact').eq(_currentQuestion).removeClass('in');
                $('.fact').eq(_currentQuestion).addClass('out');
         
              
                $('.bmi-result h4, h3').remove();

                $('.btn-calculate').css({
                    visibility: 'visible'
                })

                $('.height-wrapper').css({
                    display: "block"
                })

               $('.bmi-result').css({
                    opacity: 0
                })

            }


            $('.fact').eq(_currentQuestion).removeClass('in');
            $('.fact').eq(_currentQuestion).addClass('out');
            
            $('.question').eq(_currentQuestion).addClass('out-up')
            $('.question').eq(_currentQuestion).removeClass('in')

            var _oldQuestion = _currentQuestion;
            _currentQuestion--;
            setTimeout(function() {
                $('.fact').eq(_currentQuestion).addClass('in');
                $('.assessment-dots .dot').eq(_oldQuestion).removeClass('active')
                $('.assessment-dots .dot').eq(_currentQuestion).addClass('on')
                $('.assessment-dots .dot').eq(_currentQuestion).addClass('active')
            }, 1000)
            $('.question').eq(_currentQuestion).removeClass('out-up')
            $('.question').eq(_currentQuestion).addClass('in')
            $('.assessment .share').removeClass('in')
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

        var imgSrc = 'img/video_stills/' + vig.data('src') + '_' + _currentModule + '_' + _currentVignette + '.jpg';

        if (/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
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

        //console.log('currentPath', _currentPath);



        // if (event.value == '/home' || event.value == '/' && event.value !== _currentPath) {

        //     //$.address.path('/home');
        //     console.log('GO HOME');
            
        //     if (_currentPath !== '/education' && _currentPath !== '/intro'){
        //         //goHome();
        //     }
        //     else if (_currentPath === '/education')
        //     {
        //         toggleColumn();
        //     }
        //     else
        //     {
        //         // $.address.path('/assessment');
        //     }
        //     _currentPath = newPath;
        // } else 
        if (event.value == '/education') {
            console.log('education');            
            hideIntro();
            addCharts();
            toggleColumn();
            _currentPath = newPath;
        } else if (event.value == '/education/lifestyle') {
            console.log('education/lifestyle');            
            hideIntro();
            addCharts();
            toggleColumn();
            _currentPath = newPath;            
        } else if (event.value == '/assessment') {
            console.log('assessment');
            _currentPath = newPath;
            hideIntro();
            addCharts();
        } else {
            console.log('intro view')       
            startIntro();
            $.address.path('/intro');
            _currentPath = newPath;
        };
        $('.vid-container').remove();

    });

    $(document).ready(function() {
        _totalQuestions = $('.question').length;
        _totalHeadlines = $('.headline').length;
        console.log(_totalHeadlines)
        headline_tops = [];
        _currentHeadline = $('.module').eq(_currentModule).find($('.vignette')).eq(_currentVignette).find($('.headline')).eq(0);
        fillDot();
        //position the header to be 90%;
        _$window = $(window);
        _$document = $(window.document);
        createProgressOverlay();
        createDots();
        for (var i = 0; i < _totalHeadlines; i++) {
            $('.headline').eq(i).attr('data-idx', i)
        }
        getUserCount();
        _registerEventListeners();
        _pageResize();
        initialized = true;

    });
})(jQuery);

    function shareMail(){
        window.open("mailto:?subject=Bright Pink Risk Assessment: 5 Minutes Could Save Your Life&body=Hi, %0D%0A \
%0D%0A\
%0D%0A\
I want to share something important with you. \
%0D%0A\
%0D%0A\
Bright Pink—a non-profit organization focused on saving women’s lives from breast and ovarian cancer—created a tool that will help you assess your personal level of risk for these cancers.  By looking at your health and family history alongside some of your lifestyle choices, you will not only learn about your risk, but also about the actions you can take to reduce it. \
%0D%0A\
%0D%0A\
1 in 8 women will develop breast cancer at some point in her lifetime; Please consider assessing your own level of risk by checking out the tool at http://brightenup.sew.la.");
    }

