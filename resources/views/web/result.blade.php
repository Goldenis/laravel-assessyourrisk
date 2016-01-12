@extends('web.layouts.main')

@section('content')




    <!-- OVERLAYS -->

    <div class="overlay progress-overlay">
        <div class="question-stats">
        </div>
        <button class="sub close-btn">✕</button>
        <div class="share in2">
            <div class="share-copy">
                <h5>Save the life of somebody you love. Tell them to complete this experience too.</h5>
            </div>
            <div class="share-btn-wrapper">
                <span class="btn share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+AssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess you personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a data-subject="{{$share_result_overlay->subject}}" data-body="{{$share_result_overlay->body}}" id="create-modal3" href="#" target="_blank" class="mail-icon create-modal"><i class="fa fa-envelope fa-lg"></i></a>SHARE</span>
            </div>
        </div>




        <div class="results" style="display: block;">
            <div class="your-risk">
                <h2>Your Baseline Risk is <span class="risk-level"></span></h2>
            </div>



            <div class="paragraph-wrapper">
                <div class="paragraph-box">

                    <!-- Average -->
                    <div class="results-copy-average on">
						<h5 class="warning-header pink-text">There is potential that you may be High Risk. Read on.</h5>
                        <!-- paragraph-one (left) -->
                        <div class="column">
                            <div class="col-izq-1"></div>
                            <div class="col-izq-2 more-results"></div>

                        </div>
                        <!-- paragraph-two (right) -->
                        <div class="column">
                            <div class="col-der-1"></div>
                            <div class="col-der-2 more-results"></div>

                            <div class="read-more-box">
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- Pink Email/PDF/Doctor Footer on first card -->
                <div class="email-pdf-doctor">
                    <!-- <div class="email-pdf"><a href='mailto:?subject=Here are the results of my risk assessment&amp;body=I thought you might find this information interesting' target="_blank">Email to your Doctor</a> -->
                    <div class="email-pdf-copy">
                        <h4>Would you like a copy of your results?</h4>
                    </div>
                    <div class="email-pdf-btns">
                        <button class="sub email">EMAIL</button><a id="pdf-btn" href="{{URL::to('pdf/report/')}}/" target="_blank" class="pdf"><button class="pdf">PDF</button></a><button class="sub email-doctor">SHARE WITH MY DOCTOR</button>
                    </div>
                    <div class="email-fields-doctor">
                        <h4>Share results with my doctor.</h4>

                        <input type="text" placeholder="Your Full Name" id="your-name-dr" required="">
                        <input type="text" placeholder="Doctor's email address" id="dr-email-address" required=""><button class="sub send-dr-email">SEND</button> <button class="sub cancel">Cancel</button>

                    </div>
                    <div class="email-fields-user">
                        <h4>Share my results with me.</h4>

                        <input type="text" placeholder="Your Full Name" id="your-name" required="">
                        <input type="text" placeholder="My email address" id="user-email-address" required=""><button class="sub send-user-email">SEND</button><button class="sub cancel">Cancel</button>
                    </div>
                </div>
                <!-- paragraph wrapper close -->
            </div>
        </div>

        <!-- End of Results div -->

        <div class="cards" style="display: block;">

            <div class="card-intro-text">
                <h3>Life Affects Your Life: Understanding Your Other Risk Factors</h3><br><br>
                <p>Your baseline risk above is your starting point.
                    The lifestyle and personal health history factors below can potentially increase or decrease that baseline risk.
                    Talk to your doctor about how these risk factors may be affecting your total risk—make it a goal to get or keep as much as you can working in your favor.
                </p>

            </div>

            <br>

            <!-- Positivo -->
            <div class="card positive">
                <div class="factors-title"><h3>Working In Your Favor</h3></div>



                @foreach($favors as $favor)

                    {{--@if(in_array($favor->question_opcion_id,$answers_array->toArray(),true))--}}

                    {{-- <span class="level">--}}
                    <div class="item item-{{$favor->question_opcion_id}}">
                        <div class="section-title">{{$favor->subtitle}}</div>
                        <h4>{{$favor->title}}</h4>
                        {!!$favor->content!!}
                    </div>
                    {{--  </span>--}}
                    {{--@endif--}}

                @endforeach







            </div>

            <!-- Negative -->
            <div class="card negative">  <div class="factors-title"><h3>Not Working in Your Favor</h3></div>

                @foreach($no_favors as $no_favor)
                    {{--@if(in_array($no_favor->question_opcion_id,$answers_array->toArray(),true))--}}

                    {{-- <span class="level">--}}
                    <div class="item item-{{$no_favor->question_opcion_id}}">
                        <div class="section-title">{{$no_favor->subtitle}}</div>
                        <h4>{{$no_favor->title}}</h4>
                        {!!$no_favor->content!!}
                    </div>
                    {{--  </span>--}}
                    {{--@endif--}}
                @endforeach

            </div>
        </div>

    </div>

    <div class="overlay menu-overlay">
        <button class="sub close-btn">✕</button>
        <div class="vignettes">
            <!-- <div class="progress">
              <div class="percentage percdive"></div>
              <div class="chart chart-5"></div>
            </div> -->
            <div class="sections">
                <h3>Lifestyle</h3><br>
                <h3>Your Normal</h3><br>
                <h3>Family & Health History</h3>
            </div>
        </div>
        <div class="share">
            <div class="share-copy">
                <h5>Save the life of somebody you love. Tell them to complete this experience too.</h5>
            </div>
            <div class="share-btn-wrapper">
                <button class="share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+AssessYourRisk.org" target="_blank"><img src="img/twitter.png"></a><a href="#" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess you personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><img src="img/facebook.png"></a><a href="#" id="create-modal" target="_blank" class="mail-icon"><img src="img/mail.png"></a>SHARE</button>
            </div>
        </div>
    </div>










    <div class="overlay male-overlay">
        <button class="sub close-btn">✕</button>
        <h1>Then <span class="share-btn">share<a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+AssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess your personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a href="#" id="create-modal3" target="_blank" class="create-modal mail-icon" data-subject="{{$share->subject}}" data-body="{{$share->body}}"><i class="fa fa-envelope fa-lg"></i></a></span> this with someone you care about that does. You just might save her life.</h1>
    </div>

    <div class="fact-overlay">
        <button class="sub close-btn">✕</button>
        <div class="return">
            <div class="arrow"><img src="{{asset('img/arrow_left.png')}}"></div>
            <h4>Return to Assessment</h4></div>


        <div class="assessment-facts">
            @foreach($questions as $question)
                <div class="facts-mobil">
                    {!! $question->text_colum !!}
                </div>
            @endforeach
        </div>

    </div>



    <!-- ASSESSMENT QUESTIONS -->
    <section class="assessment scrollpane" style="    opacity: 1 !important;">
        <!-- <div class="section-title">Assess Your Risk</div> -->
        <div class="assessment-dots dots">
            <div class="btn-back">
                <a href="{{Route('index')}}">
                    <img src="{{asset('img/arrow_left_pink.png')}}">
                </a>
            </div>
            <div class="fact-icon"> i </div>
        </div>



        <!-- ASSESSMEN intro   -->



        <div class="assessment-wrap">

            <div class="share result">
                <button class="btn-results">VIEW YOUR RESULTS</button><br><br>
                <h4 class="save-share">Save the life of somebody you love. Tell them to complete this experience too.</h4><span class="btn share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess you personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a class="create-modal mail-icon" data-subject="{{$share_result->subject}}" data-body="{{$share->body}}"  href="#" target="_blank" class=""><i class="fa fa-envelope fa-lg"></i></a>SHARE</span>


                <!-- ecuando se le hace click a cualquier boton va a rremplazar el value tanto del subjet como del body,
                actualmente tiene caergado el de educacion por que ese boton share es cargado por medio de ajax y no se pudo cargar
                de otra  manera cuando se hace click el botn de share de educacion se va a ver este contenido, pero cuando se abra
                 cualquier optro se va a reemplazar por el attributo data-subject o data-body de cada boton-->
                <div id="dialog-form" title="Share">
                    <form>
                        <table class="modal-table">
                            <tr>
                                <td><label for="subject">subject</label></td>
                                <td> <input type="text" required name="subject" id="subject" placeholder="subject"
                                            value="{{$share_education->subject}}" class="text modal-text ui-widget-content ui-corner-all"></td>
                            </tr>

                            <tr>
                                <td><label for="email">To</label></td>
                                <td><input type="email" required name="email" id="email" placeholder="Recipient Email" class="text modal-text ui-widget-content ui-corner-all" value=""></td>
                            </tr>

                            <tr>
                                <td><label for="myemail">From</label></td>
                                <td><input type="email" required name="myemail" id="myemail" placeholder="Your Email" class="text modal-text ui-widget-content ui-corner-all" value=""></td>
                            </tr>

                            <tr>
                                <td><label for="name">Name</label></td>
                                <td><input type="text" required name="name" id="name" placeholder="Your Name" class="text modal-text ui-widget-content ui-corner-all" value=""></td>
                            </tr>

                            <tr>
                                <td valign="top"><label for="emailbody">Body</label></td>
                                <td><textarea disabled name="emailbody" id="emailbody" cols="30" rows="6" class="modal-text">{{$share_education->body}}</textarea></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><!-- Allow form submission with keyboard without duplicating the dialog button -->
                                    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                                </td>
                            </tr>

                        </table>
                    </form>
                </div>

            </div>

        </div>

    </section>



    <!-- EDUCATION -->

    {{--formulario para cargar pldge--}}
    {!! Form::open(['route'=>['pledge.store'], 'method'=>'POST', 'id'=>'form-pledge']) !!}
    {!! Form::close() !!}


    {{--formulario para crear sesiones--}}
    {!! Form::open(['route'=>'sessione', 'method'=>'POST', 'id'=>'form-session']) !!}
    {!! Form::close() !!}

    <section class="education">
        <div class="fb-faces">
            <div class="faces lifestyle"></div>
            <div class="faces knowing"></div>
            <div class="faces family"></div>
        </div>
        <!-- MASTER VIDEO -->
        <div id="bg-vid" class="video">
            <!-- <video class="bg-video" src="" type="video/mp4" preload="auto" autoplay loop></video> -->
        </div>
        <div class="dots">
            <h6>Lifestyle</h6>
            <h6>Your Normal</h6>
            <h6>Family History</h6>
        </div>
        <div class="nav">
            <div class="nav-item">Lifestyle</div>
            <div class="nav-item">Your Normal</div>
            <div class="nav-item">Family & Health History </div>
        </div>
        <div class="education-menu">
            <div class="module-hero">
                <div class="how">Understand How</div>
                <h1>Lifestyle</h1>
                <div class="effect">Affects Your Risk</div>
            </div>
            <div class="module-hero">
                <div class="how">Understand How</div>
                <h1>Knowing Your Normal</h1>
                <div class="effect">Affects Your Risk</div>
            </div>
            <div class="module-hero">
                <div class="how">Understand How</div>
                <h1>Family & Health History</h1>
                <div class="effect">Affects Your Risk</div>
            </div>
        </div>

        <!-- LIFESTYLE -->

        <div class="module lifestyle" id="lifestyle-list">
            @foreach($lifestyle_list as $lifestyles)
                <div class="vignette" data-src="{{$lifestyles->video}}">
                    <div class="headlines">
                        <div class="headline">

                            <h3>{!! $lifestyles->title !!}</h3>
                            <h5>{!! $lifestyles->text !!}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- KNOW YOUR NORMAL -->

        <div class="module normal" id="normal-list">
            @foreach($normal_list as $normals)
                <div class="vignette" data-src="{{$normals->video}}">
                    <div class="headlines">
                        <div class="headline">
                            <h3>{!! $normals->title !!}</h3>
                            <h5>{!! $normals->text !!}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- FAMILY HISTORY -->

        <div class="module family-history" id="family-list">
            @foreach($family_list as $familys)
                <div class="vignette" data-src="{{$familys->video}}">
                    <div class="headlines">
                        <div class="headline">
                            <h3>{!! $familys->title !!}</h3>
                            <h5>{!! $familys->text !!}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>




    </section>




@endsection

@section('btn_mobile')
    <div class="assess-start">
        <h3>Assess Your Risk<br></h3>
    </div>
    <div class="lets-go">
        <h3>Let’s Go<br></h3>
    </div>
    <div class="understand">
        <div class="understand-contain">
            <h4>Understand<br>Your Risk<br></h4>
            <div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div>
        </div>
        <!-- FACTS -->
        <div class="assessment-facts">
            @foreach($questions as $question)
                <div class="facts">
                    {!! $question->text_colum !!}
                </div>
            @endforeach
        </div>
    </div>
    <div class="assess">
        <h4>Assess<br>Your Risk<br></h4>
        <div class="arrow"><img src="{{asset('img/arrow_left.png')}}"></div>
        <!-- <div class="logo-white"><img src="img/brightpink_logo_white.png"></div> -->
        <div class="logo-white"><img src={{ URL::asset('img/brightpink_logo_white.png') }}></div>
    </div>

@endsection


@section('script')

    <script>
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

            console.log('{{route('sendmail.mail')}}');

            if (sessionStorage.getItem('test_final') == undefined) {

                var url = 'index.php';
                $(location).attr('href', url);
            } else {


            _$window = $(window);
            _$document = $(window.document);
            $('.right-column').addClass('in');
            $('.right-column').addClass('in2');
            $('.logo').animate({opacity: 1}, 3000);
            $('.assessment').addClass('peru');
            //$('.question').fadeIn();
            // $('.question').animate({opacity: 1}, 3000);
            //$('.assessment').animate({opacity: 1}, 2000);
            // $('.assessment').addClass('in');
            //$('.assessment').css('visibility','visible');


            if (sessionStorage.getItem('level') == undefined) {
                sessionStorage.setItem('level', 1);
            }


            $('.dot').css('background-color', '#ff0000');
            setTimeout(function () {
                // $('.assessment').addClass('in');

            }, 1000)

            var _currentView = "left";
            var _currentModule = null;

            $('.module-hero').on('click', function () {
                // changeModule($(this).index());

                _currentModule = $(this).index();
                // updateCharts();
                $('.menu-icon').addClass('module-open')
            })

            var _totalQuestions = sessionStorage.getItem('num_question');
            var _totalHeadlines = sessionStorage.getItem('num_education');


            //intro boton
            $('.action.lifestyle, .assess-start').click(function () {
                $('.assessment').addClass('in');
                $('.intro').addClass('out-up');
                $('.assessment-intro').addClass('in');
                $('.right-column').addClass('in');
            });

            //boton navegacvion para cel
            $('.lets-go').click(function () {
                $('.right-column').addClass('in2');
                $('.assessment-intro').addClass('out-up');
                $('.assessment-intro').removeClass('in');
                $('.question').eq(_currentQuestion).addClass('in');
                $('.question').eq(_currentQuestion).removeClass('out');
                $('.facts').eq(_currentQuestion).addClass('in');
                $('.assessment-dots .dot').eq(_currentQuestion).addClass('on');
                $('.assessment-dots .dot').eq(_currentQuestion).addClass('active');
                $('.assessment-dots').addClass('active');
                $('.fact-icon').addClass('in');

            });

            $('.assessment-intro button').on('click', function () {
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


            })


            $('.send-dr-email').click(function () {

                var pdf = $('#pdf-btn').attr('href');
                var name = $('input#your-name-dr').val();
                var email = $('input#dr-email-address').val();
                var type = 1;
                $.ajax({
                    type: 'GET',
                    cache: false,
                    url: '{{route("sendpdf")}}',
                    data: 'email=' + email + '&name=' + name + '&pdf=' + pdf + '&type=' + type
                }).done(function (data) {
                    alert("Email sent successfully.");
                }).fail(function (error) {
                    alert('Email failed to send.');
                });
            });


            $('.send-user-email').click(function () {

                var pdf = $('#pdf-btn').attr('href');
                var name = $('input#your-name').val();
                var email = $('input#user-email-address').val();
                var type = 2;
                $.ajax({
                    type: 'GET',
                    cache: false,
                    url: '{{route("sendpdf")}}',
                    data: 'email=' + email + '&name=' + name + '&pdf=' + pdf + '&type=' + type
                }).done(function (data) {
                    alert("Email sent successfully.");
                }).fail(function (error) {
                    alert('Email failed to send.');
                });
            });


            //funciones de level
            function getlevel(question_id, question_option_id) {
                //console.log('question:' +question_id+' opcion:'+question_option_id);
                // var obj = JSON.parse(question_option_id);

                $.each(question_option_id, function (i, val) {
                    $.get("{{ URL::to('/resultlevelcondition/findlevel') }}", {
                        question_id: question_id,
                        question_option_id: val
                    }, function (resultado) {
                        // console.log('level: '+resultado);

                        if (sessionStorage.getItem('level') != undefined) {

                            if (sessionStorage.getItem('level') < resultado) {
                                sessionStorage.setItem('level', resultado);
                            }
                        }
                        else {
                            sessionStorage.setItem('level', resultado);
                        }
                    });
                    /*get*/
                });
                /*each*/
            }


            if (sessionStorage.getItem('current_question_position') != undefined) {
                _currentQuestion = sessionStorage.getItem('current_question_position');
                var current_question_id = $('.question').eq(_currentQuestion).data('question-id');

                sessionStorage.setItem('current_question_id', current_question_id);
            } else {
                sessionStorage.setItem('current_question_position', 0);
                _currentQuestion = 0;
                sessionStorage.setItem('current_question_id', 0);
            }

            // console.log(_currentQuestion);

            sessionStorage.setItem('question_mutation_id', 0);


            $('.assessment .question').eq(_currentQuestion).removeClass('out');
            // $('.assessment .question').eq(_currentQuestion).addClass('in');

            $('.fact').removeClass('in');
            //$('.facts').eq(_currentQuestion).addClass('in');

            $('.fact-mobil').removeClass('in');
            // $('.facts').eq(_currentQuestion).addClass('in');


//radioboton
            // $('button.radio_button').prop('disabled', !this.checked);

            var quest = $('.answers').data('question-id2');
            var item = sessionStorage.getItem(quest);


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
                setTimeout(transCharts, 500);
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

            function maxquestion() {
                if (sessionStorage['highQuestion'] != undefined) {
                    maxQuestion = sessionStorage.getItem('highQuestion');

                }
                else {
                    sessionStorage.setItem('highQuestion', (_currentQuestion + 1));
                    maxQuestion = 0;
                }
            }

            maxquestion();
            function createDotsQuestion() {


                for (var i = 0; i < {{$count}}-1; i++) {

                    if (i < maxQuestion) {
                        var dot = '<div class="dot on"></div>';
                    } else {
                        var dot = '<div class="dot"></div>';
                    }

                    if (i == _currentQuestion) {
                        var dot = '<div class="dot active"></div>';
                    }
                    $('.assessment-dots').append(dot);


                }

                $('.assessment-dots').addClass('active');
                $('.btn-back').addClass('in');

                for (var i = 0; i < _totalHeadlines; i++) {
                    var dot = '<div class="dot"></div>';
                    $('.education .dots').append(dot);
                }
                ;
                /*$('.percdive').html(0 + '/' + _totalHeadlines);
                 $('.percquiz').html(0 + '/' + _totalQuestions);*/
            }

            createDotsQuestion();


            function updateCharts() {

                $('.dashboard').addClass('flash');
                setTimeout(function () {
                    $('.dashboard').removeClass('flash');
                }, 300);
                // percquiz percdive
                //for questions------------


                var preguntasResueltas = sessionStorage.getItem('highQuestion') - 1;
                if (preguntasResueltas > _totalQuestions) {
                    preguntasResueltas = _totalQuestions;
                }


                var quizProgress = preguntasResueltas + '/' + _totalQuestions;
                var quizPercent = preguntasResueltas / _totalQuestions;
                $(".percquiz").html(quizProgress);

                chart2.transitionToValues(5,
                        8, [quizPercent, 1 - quizPercent], ['#D7006D', '#FFFFFF']);
                chart4.transitionToValues(5,
                        8, [quizPercent, 1 - quizPercent], ['#D7006D', '#FFFFFF']);


//vamos a sumar todos los educations que han sido vistos
//para eso vamos a utilizar el storage dots_education que es un objeto
                if (sessionStorage.getItem('dots_education') != undefined) {

                    var recupero = sessionStorage.getItem('dots_education');
                    var dots_on = JSON.parse(recupero);
                    var i = 0;

                    $.each(dots_on, function (key, value) {
                        if (value == 1 && key >= 0) {
                            i++;
                        }
                    });


                    deepViewed = i;
                } else {
                    deepViewed = 0;
                }

                //deepViewed = sessionStorage.getItem('num_education');

                sessionStorage.setItem('educationView', deepViewed);
                //alert(deepViewed);

                var diveProgress = deepViewed + '/' + _totalHeadlines;
                var divePercent = deepViewed / _totalHeadlines;

                $(".percdive").html(diveProgress);
                chart3.transitionToValues(5,
                        8, [divePercent, 1 - divePercent], 4['#D7006D', '#FFFFFF']);
                chart5.transitionToValues(5,
                        8, [divePercent, 1 - divePercent], 4['#D7006D', '#FFFFFF']);

                console.log(divePercent + '/index/ ' + divePercent);
            }

            //addCharts();
            setTimeout(addCharts, 800);
            setTimeout(updateCharts, 1000);


            function showResult() {

                $('.question').eq(_currentQuestion).addClass('in');
                $('.question').eq(_currentQuestion).removeClass('out');

                $('.share.result').addClass('in');

                function explode() {
                    $(".progress-overlay").addClass('in');
                }

                setTimeout(explode, 100);

                //carga datos según el level
                var level = sessionStorage.getItem('level');
                $.get('{{URL::to('/resultlevel')}}/' + level, {}, function (e) {

                    var datos = JSON.parse(e);

                    $('.risk-level').html(datos.name);
                    $('.col-izq-1').html(datos.text_less);
                    $('.col-der-1').html(datos.text_less_col2);
                    $('.col-izq-2').html(datos.text_more);
                    $('.col-der-2').html(datos.text_more_col2);
					if (datos.name == "Increased") {
						$('.results-copy-average .warning-header').show();
					}
					else {
						$('.results-copy-average .warning-header').hide();
					}
                });

                //mostrando a favor y  not a favor

                var recupero = sessionStorage.getItem('answersResult');
                console.log(recupero);
                answersResult = JSON.parse(recupero);

                console.log(answersResult);
                if (answersResult) {
                    $.each(answersResult, function (i, val) {
                        console.log(i);
                        console.log(val);


                        if (typeof val == 'object' && val) {
                            $.each(val, function (j, val2) {
                                console.log(val2);
                                //$('.cards .item-'+val2).addClass('item-color2');
                                $('.cards .item-' + val2).addClass('item-in');
                            });
                        } else {
                            //botella
                            if (i == 33) {
                                if (val == 0) {
                                    val = 44;
                                } else if (val == 1) {
                                    val = 45;
                                } else if (val == 2) {
                                    val = 46;
                                } else if (val == 3) {
                                    val = 47;
                                } else if (val == 4) {
                                    val = 48;
                                } else if (val == 5) {
                                    val = 49;
                                } else if (val == 6) {
                                    val = 50;
                                }
                            }

                            //bmi
                            if (i == 49) { // 49 es para internet
                                if (val < 18.5) {
                                    val = 95;
                                } else if (val >= 18.5 && val <= 24.9) {
                                    val = 96;
                                } else if (val >= 25 && val <= 29.9) {
                                    val = 97;
                                } else if (val >= 30) {
                                    val = 98;
                                }
                            }

                            if ( i != 34 ) {
                                //console.log(val+' numero');
                                $('.cards .item-' + val).addClass('item-in');
                            }
                        }
                    });
                }

               /* $.get('{{--URL::to('answers/results')--}}', {
                    data: answersResult,
                    quiz: sessionStorage.getItem('quiz'),
                    session: localStorage.getItem('session')
                    //question_id:i

                }, function (e) {*/
                        //sessionStorage.setItem('quiz',e);
                        //creamos el atributo para el generador de pdf
                    var atributo = $('.pdf').parent().find('a').attr('href');
                    var new_atributo = atributo + sessionStorage.getItem('quiz') + '/' + sessionStorage.getItem('level');
                    $('.pdf').parent().find('a').attr('href', new_atributo);

                        // var url = 'results';
                        // $(location).attr('href',url);

                function copycancer(){
                    if ($.inArray(answersResult[19][0], [29, 30, 31]) > -1) {
                        console.log("Showing triggered-cancer-copy");
                        console.log($('.triggered-cancer-copy').attr('class'));
                        $('.triggered-cancer-copy').addClass('showable')
                        console.log($('.triggered-cancer-copy').attr('class'));
                    }
                    else {
                        console.log(answersResult[19][0] + " is not in [29, 30, 31]");
                    }
                }

                setTimeout(copycancer,2000);






               // });

                /*var property = id_question;

                 //agrego una nueva propiedad al json
                 answersResult[property] = value;*/
}


            showResult();


            function toggleColumn() {


                if (_currentView == "left") {
                    _currentView = "right";
                    $('.logo').addClass('out');
                    if (_currentModule != undefined) {
                        setTimeout(function () {
                            $('.right-column').addClass('down');
                            $('.nav').addClass('in');
                        }, 800)
                    }
                } else {
                    $('.logo').removeClass('out');
                    _currentView = "left"
                    setTimeout(function () {
                        $('.right-column').removeClass('down');
                        $('.nav').removeClass('in');
                    }, 800)
                }
                $('.fact-icon').toggleClass('out');
                $('.assessment').toggleClass('in');
                $('.right-column').toggleClass('left');
                $('.menu-icon').toggleClass('left');
                $('.education').toggleClass('in');
            }


            $('.understand').on('click', function () {
                toggleColumn();
                console.log('salio');

                $('.assessment-dots.dots').removeClass('active');


                // var url = '../education';
                //$(location).attr('href',url);
            })

            $('.assess').on('click', function () {

                toggleColumn();
                setTimeout(function(){ $('.assessment-dots.dots').addClass('active');},600);

                // window._currentPath = '/assessment';
                // $.address.value('/assessment');
            })

        }/*este es el final de la condicional para regresar al inicio o quedarse si es que no hay datos en session storage*/

        });


        // modal
        $(function() {
            var dialog, form,

            // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
                    emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                    name = $( "#name" ),
                    email = $( "#email" ),
                    emailbody = $( "#emailbody" ),
                    myemail = $( "#myemail" ),
                    subject = $( "#subject" ),
                    allFields = $( [] ).add( name ).add( email ).add( emailbody).add( myemail ).add( subject ),
                    tips = $( ".validateTips" );

            function updateTips( t ) {
                tips
                        .text( t )
                        .addClass( "ui-state-highlight" );
                setTimeout(function() {
                    tips.removeClass( "ui-state-highlight", 1500 );
                }, 500 );
            }

            function checkLength( o, n, min, max ) {
                if ( o.val().length > max || o.val().length < min ) {
                    o.addClass( "ui-state-error" );
                    updateTips( "Length of " + n + " must be between " +
                    min + " and " + max + "." );
                    return false;
                } else {
                    return true;
                }
            }

            function checkRegexp( o, regexp, n ) {
                if ( !( regexp.test( o.val() ) ) ) {
                    o.addClass( "ui-state-error" );
                    updateTips( n );
                    return false;
                } else {
                    return true;
                }
            }

            function sendEmail() {
                var valid = true;
                allFields.removeClass( "ui-state-error" );

                valid = valid && checkLength( name, "username", 3, 16 );
                valid = valid && checkLength( email, "email", 6, 80 );

                valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
                valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );

                if ( valid ) {
                    $( "#users tbody" ).append( "<tr>" +
                    "<td>" + name.val() + "</td>" +
                    "<td>" + email.val() + "</td>" +
                    "</tr>" );
                    dialog.dialog( "close" );
                }
                return valid;

            }

            dialog = $("#dialog-form").dialog({

                autoOpen: false,
                height: 500,
                width: 350,
                modal: true,
                buttons: {
                    "Send e-mail": sendEmail
                    /*Cancel: function() {
                     dialog.dialog( "close" );
                     }*/
                },
                close: function() {
                    form[ 0 ].reset();
                    allFields.removeClass( "ui-state-error" );
                }
            });

            form = dialog.find( "form" ).on( "submit", function( event ) {
                event.preventDefault();
                // sendEmail();
            });


            $( ".create-modal" ).click(function(e) {
                e.preventDefault();
                $("#dialog-form").find('textarea').html($(this).data('body'));
                $("#dialog-form").find('#subject').attr('value',$(this).data('subject'));
                dialog.dialog( "open" );
            });

            /* //este es cuando hay dos share en la misma pagina
             $( "#create-modal2" ).click(function(e) {
             e.preventDefault();
             dialog.dialog( "open" );

             });

             $( "#create-modal3" ).click(function(e) {
             e.preventDefault();
             dialog.dialog( "open" );

             });*/









            function buttons(){

                $('.facebook.lifestyle').click(function() {
                    console.log('click');

                    var form = $('#form-pledge');
                    var url = form.attr('action');
                    var data = form.serialize();
                    var session = localStorage.getItem('session');
                    var category = 1;
                    data = data+'&session='+session+'&category_id='+category;

                    $('.lifestyle-pledge-number').text('You and '+ {{$pledge_lifestyle}} +' women have pledged to improve your lifestyles');
                    $('.lifestyle-pledge-number').next().text('');
                    $('.facebook.lifestyle').css({display: "none"});

                    $.post(url,data,function(){
                        //localStorage.setItem('session',last_id);
                    })




                })

                $('.facebook.knowing').click(function() {
                    console.log('click');

                    var form = $('#form-pledge');
                    var url = form.attr('action');
                    var data = form.serialize();
                    var session = localStorage.getItem('session');
                    var category = 2;
                    data = data+'&session='+session+'&category_id='+category;

                    $('.knowing-pledge-number').text('You and '+ {{$pledge_normal}} +' women have pledged to know your normal');
                    $('.knowing-pledge-number').next().text('');
                    $('.facebook.knowing').css({display: "none"});

                    $.post(url,data,function(){
                        //localStorage.setItem('session',last_id);
                    })
                })



                $('.facebook.family').click(function() {
                    console.log('click');

                    var form = $('#form-pledge');
                    var url = form.attr('action');
                    var data = form.serialize();
                    var session = localStorage.getItem('session');
                    var category = 3;
                    data = data+'&session='+session+'&category_id='+category;

                    $('.family-pledge-number').text('You and '+ {{$pledge_normal}} +' women have pledged to learn about their family history');
                    $('.family-pledge-number').next().text('');
                    $('.facebook.family').css({display: "none"});

                    $.post(url,data,function(){
                        //localStorage.setItem('session',last_id);
                    })
                })
            }

            buttons();




            //EDUCATION

//lifestyle
            $('#lifestyle-list .vignette').first().addClass('main');
            $('#lifestyle-list .vignette').first().find('.headline').prepend(

                    '<div class="section-title">Understand Your Risk</div>'
            );
            $('#lifestyle-list .vignette').first().find('.headline').append('<h6 class="scroll-dive">Scroll</h6><div class="btn-begin arrow"><img src="{{asset('img/arrow_right.png')}}"></div>');

            //agregamos clases y html para la ultima vigneta
            $('#lifestyle-list .vignette').last().addClass('last');
            $('#lifestyle-list .vignette').last().find('.headline').addClass('last');
            $('#lifestyle-list .vignette').last().find('.headline').prepend('<div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div>');

            $.get('{{route("pledge/countByCategory")}}',{
                category:1,
                session:localStorage.getItem('session')
            },function(result){

                if(result==1){


                    $('#lifestyle-list .vignette').last().find('.headline h3').first().addClass('hidden');
                    $('#lifestyle-list .vignette').last().find('.headline h5').first().addClass('hidden');

                    $('#lifestyle-list .vignette').last().find('.headline h3').addClass('lifestyle-pledge-number');

                    $('#lifestyle-list .vignette').last().find('.headline h5').after('<h3 class="lifestyle-pledge-number">You and '+{{$pledge_lifestyle}}+' women have pledged to improve your lifestyles</h3>');

                }else{
                    $('#lifestyle-list .vignette').last().find('.headline h3').prepend('<span class="lifestyle-count">{{$pledge_lifestyle}}</span>');
                    $('#lifestyle-list .vignette').last().find('.headline h3').addClass('lifestyle-pledge-number');

                    $('#lifestyle-list .vignette').last().find('.headline h5').after('<button class="facebook lifestyle">Pledge</button>');

                    buttons();
                }
            });

            $('#lifestyle-list .vignette').last().find('.headline').append('<button class="btn-continue sub">CONTINUE TO KNOW YOUR NORMAL →</button>');

// normal

            //agregamos clases y html para la primera vigneta
            $('#normal-list .vignette').first().addClass('main');
            $('#normal-list .vignette').first().find('.headline').prepend('<div class="section-title">Understand Your Risk</div>');
            $('#normal-list .vignette').first().find('.headline').append('<h6 class="scroll-dive">Scroll</h6><div class="btn-begin arrow"><img src="{{asset('img/arrow_right.png')}}"></div>');

            //agregamos clases y html para la ultima vigneta
            $('#normal-list .vignette').last().addClass('last');
            $('#normal-list .vignette').last().find('.headline').addClass('last');
            $('#normal-list .vignette').last().find('.headline').prepend('<div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div>');

            $.get('{{route("pledge/countByCategory")}}',{
                category:2,
                session:localStorage.getItem('session')
            },function(result){
                if(result==1){


                    $('#normal-list .vignette').last().find('.headline h3').first().addClass('hidden');
                    $('#normal-list .vignette').last().find('.headline h5').first().addClass('hidden');

                    $('#normal-list .vignette').last().find('.headline h3').addClass('knowing-pledge-number');

                    $('#normal-list .vignette').last().find('.headline h5').after('<h3 class="normal-pledge-number">You and '+{{$pledge_normal}}+' women have pledged to improve your normals</h3>');

                }else{
                    $('#normal-list .vignette').last().find('.headline h3').prepend('<span class="normal-count">{{$pledge_normal}}</span> ');
                    $('#normal-list .vignette').last().find('.headline h3').addClass('knowing-pledge-number');

                    $('#normal-list .vignette').last().find('.headline h5').after('<button class="facebook knowing">Pledge</button>');

                    buttons();
                }
            });

            $('#normal-list .vignette').last().find('.headline').append('<button class="btn-continue sub">CONTINUE TO FAMILY HISTORY →</button>');




//family
            //agregamos clases y html para la primera vigneta
            $('#family-list .vignette').first().addClass('main');
            $('#family-list .vignette').first().find('.headline').prepend(
                    '<div class="section-title">Understand Your Risk</div>'
            );
            $('#family-list .vignette').first().find('.headline').append(
                    '<h6 class="scroll-dive">Scroll</h6><div class="btn-begin arrow"><img src="{{asset('img/arrow_right.png')}}"></div>'
            );

            //agregamos clases y html para la ultima vigneta
            $('#family-list .vignette').last().addClass('last');
            $('#family-list .vignette').last().find('.headline').addClass('last');
            $('#family-list .vignette').last().find('.headline').prepend('<div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div>');

            $.get('{{route("pledge/countByCategory")}}',{
                category:3,
                session:localStorage.getItem('session')
            },function(result){
                if(result==1) {

                    $('#family-list .vignette').last().find('.headlines').append('<div class="headline"><h3 class="family-pledge-number">You and '+{{$pledge_family}}+' women have pledged to learn about their family history</h3></div>');
                    $('#family-list .vignette').last().find('.headlines').append('<div class="headline last"><div class="share"><div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div><h3>Save the life of somebody you love. Tell them to complete this experience too.</h3><br><span class="btn share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#" onclick="fb_share(\'http://www.assessyourrisk.org\', \'Assess Your Risk\', \'1 in 8 women will develop breast cancer at some point in her lifetime. 1 in 67 will develop ovarian cancer.\', \'http://www.assessyourrisk.org/img/fb-share.png\', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a   href="#" id="create-modal" target="_blank" class="mail-icon create-modal"><i class="fa fa-envelope fa-lg"></i></a>SHARE</span></div></div>');


                }else{
                    $('#family-list .vignette').last().find('.headlines').append('<div class="headline"><h3 class="family-pledge-number"> Women Have Pledged to Collect Their Family History</h3><h5>You can join them. By clicking the pledge button below, you’ll make that number go higher.</h5><button class="facebook family">Pledge</button></div>');
                    $('#family-list .vignette').last().find('.headlines').append('<div class="headline last"><div class="share"><div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div><h3>Save the life of somebody you love. Tell them to complete this experience too.</h3><br><span class="btn share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#" onclick="fb_share(\'http://www.assessyourrisk.org\', \'Assess Your Risk\', \'1 in 8 women will develop breast cancer at some point in her lifetime. 1 in 67 will develop ovarian cancer.\', \'http://www.assessyourrisk.org/img/fb-share.png\', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a  href="#" id="create-modal2" target="_blank" class="mail-icon create-modal"><i class="fa fa-envelope fa-lg"></i></a>SHARE</span></div></div>');
                    $('#family-list .vignette').last().find('.headline .family-pledge-number').prepend('{{$pledge_family}}');
                    buttons();



                }

                function modal_up(){

                    var dialog, form,

                    // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
                            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                            name = $( "#name" ),
                            email = $( "#email" ),
                            subject = $( "#subject" ),
                            myemail = $( "#myemail" ),
                            emailbody = $( "#emailbody" ),

                            allFields = $( [] ).add( name ).add( email).add( subject ).add( myemail).add( emailbody ),
                            tips = $( ".validateTips" );

                    function updateTips( t ) {
                        tips
                                .text( t )
                                .addClass( "ui-state-highlight" );
                        setTimeout(function() {
                            tips.removeClass( "ui-state-highlight", 1500 );
                        }, 500 );
                    }

                    function checkLength( o, n, min, max ) {
                        if ( o.val().length > max || o.val().length < min ) {
                            o.addClass( "ui-state-error" );
                            updateTips( "Length of " + n + " must be between " +
                            min + " and " + max + "." );
                            return false;
                        } else {
                            return true;
                        }
                    }

                    function checkRegexp( o, regexp, n ) {
                        if ( !( regexp.test( o.val() ) ) ) {
                            o.addClass( "ui-state-error" );
                            updateTips( n );
                            return false;
                        } else {
                            return true;
                        }
                    }

                    function sendEmail() {
                        var valid = true;
                        allFields.removeClass( "ui-state-error" );

                        valid = valid && checkLength( name, "username", 3, 16 );
                        valid = valid && checkLength( email, "email", 6, 80 );
                        valid = valid && checkLength( myemail, "myemail", 6, 80 );
                        valid = valid && checkLength( subject, "subject", 3, 200 );
                        valid = valid && checkLength( emailbody, "emailbody", 3, 20000 );

                        //valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
                        valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
                        valid = valid && checkRegexp( myemail, emailRegex, "eg. ui@jquery.com" );

                        if ( valid ) {
                            resp = $.ajax({
                                type : "GET",
                                cache: false,
                                url : "{{route('sendmail.mail')}}",
                                data : 'name=' + name.val() + '&email=' + email.val() + '&myemail=' + myemail.val() + '&subject=' + subject.val() + '&emailbody=' + encodeURIComponent(emailbody.val())
                            }).done(function(data) {
                                alert("Email sent successfully.");
                            }).fail(function(error) {
                                alert("Email failed to send.");
                            });

                            $( "#users tbody" ).append( "<tr>" +
                            "<td>" + name.val() + "</td>" +
                            "<td>" + email.val() + "</td>" +
                            "</tr>" );
                            dialog.dialog( "close" );
                        }
                        return valid;

                    }

                    dialog = $( "#dialog-form" ).dialog({
                        autoOpen: false,
                        height: 500,
                        width: 350,
                        modal: true,
                        buttons: {
                            "Send e-mail": sendEmail
                            /*Cancel: function() {
                             dialog.dialog( "close" );
                             }*/
                        },
                        close: function() {
                            form[ 0 ].reset();
                            allFields.removeClass( "ui-state-error" );
                        }
                    });

                    form = dialog.find( "form" ).on( "submit", function( event ) {
                        event.preventDefault();
                        sendEmail();
                    });

                    $( "#create-modal" ).click(function(e) {
                        e.preventDefault();
                        dialog.dialog( "open" );

                    });

                    $( ".create-modal" ).click(function(e) {
                        e.preventDefault();
                        $("#dialog-form").find('textarea').html($(this).data('body'));
                        $("#dialog-form").find('#subject').attr('value',$(this).data('subject'));
                        dialog.dialog( "open" );
                    });
                }


                modal_up();
                $('#create-modal2').click(modal_up);
            });



            /*function closeModule(num) {
             $('.module').eq(num).removeClass('in');

             if (num < _currentModule) {
             $('.module').eq(num).addClass('left');
             } else {
             $('.module').eq(num).removeClass('left');
             }


             }*/




            /*$('.menu-icon').on('click', function() {
             alert('a');
             if (!overlayOpen) {
             openMenuOverlay();
             } else {
             closeMenuOverlay();
             }
             })*/



            /* LOS RESULTADOS */
            //sacar el nivel





        });

    </script>

    <script src="{{asset('js/main.js')}}?cversion=7"></script>

<script type="text/javascript">

/* <![CDATA[ */
var google_conversion_id = 1033468455;
var google_conversion_language = “en”;
var google_conversion_format = “3”;
var google_conversion_color = “ffffff”;
var google_conversion_label = “UD3lCPjbsl4Qp_Tl7AM”;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1033468455/?label=UD3lCPjbsl4Qp_Tl7AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

@endsection
