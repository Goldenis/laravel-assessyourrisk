@extends('web.layouts.main')

@section('content')

    <div class="overlay male-overlay">
        <button class="sub close-btn">✕</button>
        <h1>Then <span class="share-btn">share<a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+AssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#/assessment" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess your personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a href="#" id="create-modal3" target="_blank" class="create-modal mail-icon" data-subject="{{$share->subject}}" data-body="{{$share->body}}"><i class="fa fa-envelope fa-lg"></i></a></span> this with someone you care about that does. You just might save her life.</h1>
    </div>

    <div class="fact-overlay">
        <button class="sub close-btn">✕</button>
        <div class="return"><div class="arrow"><img src="{{asset('img/arrow_left.png')}}"></div> <h4>Return to Assessment</h4></div>

        <div class="assessment-facts">
            @foreach($questions as $question)
                <div class="facts-mobil">
                    {!! $question->text_colum !!}
                </div>
            @endforeach
        </div>
    </div>

    <!-- ASSESSMENT-->
    <section class="assessment scrollpane">
        <!-- <div class="section-title">Assess Your Risk</div> -->
        <div class="assessment-dots dots active">
            <div class="btn-back"><img src="{{asset('img/arrow_left_pink.png')}}"></div>
            <div class="fact-icon in">
                i
            </div>
        </div>

        <div class="assessment-wrap">

            @foreach($questions as $question)
                {!!Form::hidden('question_id',$question->id,['id'=>'question_id'])!!}

                {{--RADIO BOTON--}}

                @if($question->question_type_id==1)

                    {{--{{dd($question)}}--}}

                    <div class="question out gif" data-question-id="{{$question->id}}">
                        @if($question->gif != '' || $question->gif != null)
                            <div class="anim-gif calendar">
                                <img src="{{asset('img/')}}/{!!$question->gif!!}">
                            </div>
                        @endif
                        <div class="prompt">{!!$question->text!!}</div>

                        <div class="answers-list" data-question-id2="{{$question->id}}">
                            <div class="checkbox-list" data-question-id2="{{$question->id}}">
                                <form>
                                    @foreach($question->questionOption as $option)
                                        <div class="checkbox @if($question->column2 == 1) column-2 @endif @if($question->column2_mobil == 0) column-2-not @endif">
                                            <input type="radio" name="radio" data-question-id="{{$question->id}}" data-option-id="{{$option->id}}" data-option-value="{{$option->value}}">
                                            <div class="label">{!! $option->text !!}</div>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                            <br>
                            <div class="answers">
                                <button class="radio_button" disabled>{{$question->button_text}}</button>
                                @if($question->email==1)
                                    <button class="create-modal sub ask" data-subject="{{$question->email_subject}}" data-body="{{$question->email_body}}">Help me ask them</button>
                                @endif
                            </div>
                        </div>

                    </div>

                @elseif($question->question_type_id==2)
                    {{--CHECK BOX--}}

                    <div class="question out"  data-question-id="{{$question->id}}">
                        @if($question->gif != '' || $question->gif != null)
                            <div class="anim-gif calendar">
                                <img src="{{asset('img/')}}/{!!$question->gif!!}">
                            </div>
                        @endif
                        <div class="prompt">{!!$question->text!!}</div>

                        <div class="checkbox-list" data-question-id2="{{$question->id}}">

                            @foreach($question->questionOption as $option)
                                <div class="checkbox @if($question->column2 == 1) column-2 @endif @if($question->column2_mobil == 0) column-2-not @endif" data-answer-id="1">
                                    <input name="check" type="checkbox" @if($option->unique==1) class="none-of-above" @endif data-question-id="{{$question->id}}" data-option-id="{{$option->id}}" data-option-value="{{$option->value}}">
                                    <div class="label">{!!$option->text!!}</div>
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="answers">
                            <button class="check_box" disabled data-question-id="{{$question->id}}">{{$question->button_text}}</button>
                            @if($question->email==1)
                                <button class="create-modal sub ask" data-subject="{{$question->email_subject}}" data-body="{{$question->email_body}}">Help me ask them</button>



                            @endif
                        </div>
                    </div>

                @elseif($question->question_type_id==3)
                    {{--BOTON--}}



                    <div class="question @if($question->gif != '' || $question->gif != null) gif @endif out" data-question-id="{{$question->id}}">

                        @if($question->gif != '' || $question->gif != null)
                            <div class="anim-gif calendar">
                                <img src="{{asset('img/')}}/{!!$question->gif!!}">
                            </div>
                        @endif

                        <div class="prompt">{!! $question->text !!}</div>

                        <div class="answers button">
                            @foreach($question->questionOption as $option)
                                <button class="button_type" data-option-id="{{$option->id}}" data-option-value="{{$option->value}}">{{$option->button_text}}</button>
                            @endforeach
                            @if($question->email==1)
                                <button class="create-modal sub ask" data-subject="{{$question->email_subject}}" data-body="{{$question->email_body}}">Help me ask them</button>



                            @endif
                        </div>
                    </div>




                @elseif($question->question_type_id==4)
                    {{--ESPECIAL--}}

                    @if($question->id == 33) {{--bottle--}}

                    <div class="question drinks-question out"  data-question-id="{{$question->id}}">
                        <div class="prompt">{!!$question->text!!}</div>
                        <div class="drink-slider">
                            <div class="bottle"><img src="{{asset('img/assessment/bottle.png')}}"></div>
                            <div class="answers drinks">
                                <div class="drink" data-answer-id="1"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <div class="drink" data-answer-id="2"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <div class="drink" data-answer-id="3"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <div class="drink" data-answer-id="4"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <div class="drink" data-answer-id="5"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <div class="drink" data-answer-id="6"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <div class="drink" data-answer-id="7"><img src="{{asset('img/assessment/drink_fill.png')}}"></div>
                                <br><br><br>
                                <button class="btn-bottle" data-question-id="{{$question->id}}">Continue</button>
                            </div>
                        </div>
                    </div>

                    @elseif($question->id == 34) {{--weight--}}
                    <div class="question weight-question" data-question-id="3">
                        <div class="weight-wrapper">
                            <div class="prompt weight-header">What is your weight?</div>
                            <span>Your answer will only be used to calculate your BMI,<br> which can affect your risk.</span>
                            <div class="visual">
                                <div class="weight-container-mask">
                                    <div class="weight-container">
                                        <div id="weight-base"></div>
                                        <div id="weight-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="answers weight-answer">
                                <button class="submit-weight">Continue</button>
                            </div>
                        </div>
                        <br>
                    </div>

                @elseif($question->id == 48) {{--height--}}

                    <div class="question height-question" id="height-question" data-question-id="{{$question->id}}" data-question-name="bmi">
                        <div class="bmi-result">
                            <div class="answers">
                                <button id="btn-bmi">Continue</button>
                            </div>
                        </div>

                        <div class="height-wrapper">
                            <div class="prompt height-header">What is your height?</div>
                            <div class="visual">
                                <div class="height-container-mask">
                                    <div class="height-container">
                                        <div id="height-base"></div>
                                        <div id="height-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn-calculate">Calculate</button>
                        </div>


                        <br>


                    </div>
                    @endif

                @endif

            @endforeach
        </div>


        <div id="dialog-form" title="Help me ask them">

            <form>
                <table class="modal-table">
                    <tr>
                        <td><label for="subject">subject</label></td>
                        <td> <input type="text" required name="subject" id="subject" placeholder="subject"
                                    value="" class="text modal-text ui-widget-content ui-corner-all"></td>
                    </tr>

                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" required name="email" id="email" placeholder="email" class="text modal-text ui-widget-content ui-corner-all"></td>
                    </tr>

                    <tr>
                        <td><label for="name">Name</label></td>
                        <td><input type="text" required name="name" id="name" placeholder="Name" class="text modal-text ui-widget-content ui-corner-all"></td>
                    </tr>

                    <tr>
                        <td valign="top"><label for="password">Body</label></td>
                        <td><textarea name="" id="" cols="30" rows="6" class="modal-text"></textarea></td>
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

    </section>


@endsection

@section('btn_mobile')

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

@endsection


@section('script')

    <script>
        $(document).ready(function(){
            $('.right-column').addClass('in');
            $('.logo').animate({opacity: 1}, 3000);
            //$('.question').fadeIn();
            // $('.question').animate({opacity: 1}, 3000);
            $('.assessment').animate({opacity: 1}, 2000);
            $('.assessment').css('visibility','visible');
            $('.dot').css('background-color','#ff0000');

            var _totalQuestions = sessionStorage.getItem('num_question');
            var _totalHeadlines = sessionStorage.getItem('num_education');


            if(sessionStorage.getItem('current_question_position')!=undefined){
                _currentQuestion = sessionStorage.getItem('current_question_position');
               var current_question_id = $('.question').eq(_currentQuestion).data('question-id');

                sessionStorage.setItem('current_question_id',current_question_id);
            }else{
                sessionStorage.setItem('current_question_position',0);
                _currentQuestion = 0;
                sessionStorage.setItem('current_question_id',0);
            }

           // console.log(_currentQuestion);

            sessionStorage.setItem('question_mutation_id',0);


            $('.assessment .question').eq(_currentQuestion).removeClass('out');
            $('.assessment .question').eq(_currentQuestion).addClass('in');

            $('.fact').removeClass('in');
            $('.facts').eq(_currentQuestion).addClass('in');

            $('.fact-mobil').removeClass('in');
            $('.facts').eq(_currentQuestion).addClass('in');

//boton

            $('button.button_type').click(function(){
                var question_id = $(this).parents('.question').data('question-id');
                var dato = $(this).text();
                var option = $(this).data('option-id');

                // exclusive for question id=17 / male overlay
                if(dato == 'No' && question_id == 17){
                    $('.male-overlay').addClass('in');
                    $('.fact-icon').removeClass('in');
                    overlayOpen = true;
                    return false;
                }else{

                    if(question_id == {{$last_question->id}} ){
                        showResult();
                    }else{
                        nextQuest();
                    }

                    saveAnswers(question_id, option);

                    // var url_next = '{{--$url--}}';
                    // $(location).attr('href',url_next);
                }
            });

//radioboton
            // $('button.radio_button').prop('disabled', !this.checked);

            var quest =  $('.answers').data('question-id2');
            var item = sessionStorage.getItem(quest);

            //var optionn = $('.answers .checkbox input').data('option-id');



            //verifico si hay algun radioboton seleccionado en la pregunta

            $('input[name="radio"]').change(function(i,val){

                var lista = $(this).parent().parent().parent();

                lista.find('.checkbox input').each(function(){
                    if($(this).data('option-id')==item){
                        $(this).prop("checked", "checked");
                    }
                });

                var option = $(this).data('option-id');
                sessionStorage.setItem('question_mutation_id',option);

                //deshabilitando el boton
                $(this).parent().parent().parent().parent().find('.radio_button').prop('disabled', !this.checked);
            });

            /*$('input[name="radio"]').each(function(i,val){
             if($(this).prop('checked')){
                 $('button.radio_button').removeAttr("disabled");
             }
             });*/

            $('button.radio_button').click(function(){

                var question_id = $(this).parents('.question').data('question-id');

                var option = [];

                $(this).parent().parent().find('.checkbox-list input:checked').each(function() {
                    option.push($(this).data('option-id'));
                });

                saveAnswers(question_id, option);

                if(question_id == {{$last_question->id}} ){
                    showResult();
                }else{
                    nextQuest();
                }


            });





//check box



            $('input[name="check"]').each(function(i,val){
                if($(this).prop('checked')){
                    $('button.check_box').removeAttr("disabled");
                }
            });


            $('input[name="check"]').change(function() {

                var boton = $(this).parent().parent().parent().find('.check_box');

                var allCheckboxes = $(this).parent().parent().parent().find('input[name="check"]');
                var noneChecked = true;
                var isChecked = $(this).prop('checked');
                if (isChecked) {
                    if ($(this).hasClass('not-sure') || $(this).hasClass('none-of-above')) {
                        $(allCheckboxes).prop('checked', false);
                    }
                    else {
                        $('input[name="check"].not-sure').prop('checked', false);
                        $('input[name="check"].none-of-above').prop('checked', false);
                    }

                    $(this).prop('checked', true);
                }
                allCheckboxes.each(function (index, item) {
                   // console.log(item.checked);
                    if (item.checked) {
                        noneChecked = false;
                        return false;
                    }
                });

                boton.prop('disabled', noneChecked);
            });

            $('button.check_box').click(function(){

                var question_id = $(this).data('question-id');

                var options = [];

                $(this).parent().parent().find('.checkbox-list input:checked').each(function() {
                    options.push($(this).data('option-id'));
                });
              //  console.log(question_id+' | '+options);

                saveAnswers(question_id, options);

                if(question_id == {{$last_question->id}} ){
                    showResult();
                }else{
                    nextQuest();
                }

            });


//ESPECIALES

            // bottle
            $('.btn-bottle').click(function(){

                row_back();
                maxquestion();
                updateDotsQuestion(_currentQuestion);

                var question_id = $(this).data('question-id');
                var option = sessionStorage.getItem('bottle');

                var bottle_w =  sessionStorage.setItem('bottle_w',$('.drink-slider').width());

                //convertimos el string en numero
                var bottle = parseInt(option);

                saveAnswers(question_id, bottle);

                nextQuest();

            });


            var num_bottles = sessionStorage.getItem('bottle');
            num_bottles = num_bottles*1;

            var bottle_w = sessionStorage.getItem('bottle_w');

            var distancia = (bottle_w*num_bottles)/6;
            //console.log(num_bottles);

            $('.bottle').css('left',distancia);

            for(i=0; i<num_bottles+1; i++) {
                $('.answers.drinks .drink img').eq(i).css({opacity: 1});
            }

//WEIGHT
            $('.submit-weight').click(function(){
                var question_id = $('.weight-question').data('question-id');
              //  console.log(window.weightInPounds);
                $('.weight-question').addClass('out-up');
                $('.weight-question').removeClass('in');
                $('#height-question').addClass('in');
                $('#height-question').removeClass('out-up');

                nextQuest();

                //saveAnswers(question_id, window.weightInPounds);

            });

//HEIGHT
            $('.btn-calculate').click(function(){
                $('.height-wrapper').addClass('out-up');
            });


//BMI
            $('#btn-bmi').click(function(){
                var bmi = $('#height-question .bmi-result h3').text();
                var question_id = $('#height-question').data('question-id');
                var bmi_int;

                bmi_int = parseFloat(bmi);
                saveAnswers(question_id, bmi_int);
                nextQuest();
            });

            function maxquestion()
            {
                if(sessionStorage['highQuestion']!=undefined)
                {
                    maxQuestion = sessionStorage.getItem('highQuestion');

                }
                else
                {
                    sessionStorage.setItem('highQuestion',(_currentQuestion+1));
                    maxQuestion = 0;
                }



            }
            maxquestion();

            function maxquestionback(){

            }

            function createDotsQuestion() {

                for (var i = 0; i < {{$count}}-1; i++) {

                    if(i<maxQuestion){
                        var dot = '<div class="dot on"></div>';
                    }else{
                        var dot = '<div class="dot"></div>';
                    }

                    if(i==_currentQuestion){
                        var dot = '<div class="dot active"></div>';
                    }
                    $('.assessment-dots').append(dot);
                }

                /*for (var i = 0; i < _totalHeadlines; i++) {
                 var dot = '<div class="dot"></div>';
                 $('.education .dots').append(dot);
                 };
                 $('.percdive').html(0 + '/' + _totalHeadlines);
                 $('.percquiz').html(0 + '/' + _totalQuestions);*/
            }

            function updateDotsQuestion(_currentQuestion) {

                if(_currentQuestion>=maxQuestion)
                {
                    sessionStorage.setItem('highQuestion',(_currentQuestion*1+1));

                }else if(_currentQuestion<maxQuestion){
                    //sessionStorage.setItem('highQuestion',(_currentQuestion));

                }



                var _oldQuestion = _currentQuestion-1;

                for (var i = 0; i < {{$count}}; i++) {

                    if(i<=sessionStorage.getItem('highQuestion')-1){
                        $('.assessment-dots .dot').eq(i).addClass('on');
                        $('.assessment-dots .dot').eq(i).removeClass('active');
                    }

                    $('.assessment-dots .dot').eq(_currentQuestion).addClass('active');
                }
            }

            createDotsQuestion();

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

            function updateCharts() {

                $('.dashboard').addClass('flash');
                setTimeout(function() {
                    $('.dashboard').removeClass('flash');
                }, 300);
                // percquiz percdive
                //for questions------------


                   // var recupero = sessionStorage.getItem('answersResult');
                  //  var datos = JSON.parse(recupero);
                  //  var questionsAnswered = Object.keys(datos).length;

                    var preguntasResueltas = sessionStorage.getItem('highQuestion') - 1;



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

            addCharts();
            updateCharts();

            function prevQuest(){

                if(_currentQuestion > 0){
                    var _oldQuestion = _currentQuestion;


                    $('.assessment .question').eq(_currentQuestion).addClass('out');
                    $('.assessment .question').eq(_currentQuestion).removeClass('in');

                    var current_option = sessionStorage.getItem('question_mutation_id');
                    var current_question = sessionStorage.getItem('current_question_id');
                    if((current_question==36 && current_option==56) || (current_question==36 && current_option==58) || (current_question==36 && current_option== 59)){
                        _currentQuestion-=2;
                    }else{
                        _currentQuestion--;
                    }
                    $('.assessment .question').eq(_currentQuestion).removeClass('out');
                    $('.assessment .question').eq(_currentQuestion).removeClass('out-up');
                    setTimeout(function(){
                        $('.assessment .question').eq(_currentQuestion).addClass('in')},10)

                    sessionStorage.setItem('current_question_id',$('.assessment .question').eq(_currentQuestion).data('question-id'));

                    //$('.fact').removeClass('in');
                   // $('.fact').eq(_currentQuestion).addClass('in');

                    $('.facts').removeClass('in');
                    //$('.fact').eq(_currentQuestion).removeClass('out');
                    $('.facts').eq(_currentQuestion).addClass('in');

                    $('.facts-mobil').removeClass('in');
                    //$('.fact').eq(_currentQuestion).removeClass('out');
                    $('.facts-mobil').eq(_currentQuestion).addClass('in');



                    $('.assessment-dots .dot').eq(_oldQuestion).removeClass('active');
                    $('.assessment-dots .dot').eq(_currentQuestion).addClass('on');
                    $('.assessment-dots .dot').eq(_currentQuestion).addClass('active');

                    //este es para saber en cual pregunta se ha quedadop, si cambia y de página y regresa va a observar la pregunta donde se quedó
                    sessionStorage.setItem('current_question_position',_currentQuestion);

                }
            }

            function nextQuest(){

                $('.assessment .question').eq(_currentQuestion).addClass('out');
                $('.assessment .question').eq(_currentQuestion).removeClass('in');

                var current_option = sessionStorage.getItem(35);
                var current_question = sessionStorage.getItem('current_question_id');
                if((current_question==35 && current_option==56) || (current_question==35 && current_option==58) || (current_question==35 && current_option== 59)){
                    _currentQuestion+=2;
                }else{
                    _currentQuestion++;
                }
                $('.assessment .question').eq(_currentQuestion).removeClass('out');
                $('.assessment .question').eq(_currentQuestion).removeClass('out-up');
                //$('.assessment .question').eq(_currentQuestion).addClass('in');
                setTimeout(function()
                {
                    $('.assessment .question').eq(_currentQuestion).addClass('in')
                },10);

                sessionStorage.setItem('current_question_id',$('.assessment .question').eq(_currentQuestion).data('question-id'));

               // console.log(_currentQuestion);
                $('.facts').removeClass('in');
                //$('.fact').eq(_currentQuestion).removeClass('out');
                $('.facts').eq(_currentQuestion).addClass('in');

                $('.facts-mobil').removeClass('in');
                //$('.fact').eq(_currentQuestion).removeClass('out');
                $('.facts-mobil').eq(_currentQuestion).addClass('in');



                sessionStorage.setItem('current_question_position',_currentQuestion);

                row_back();
                maxquestion();
                updateDotsQuestion(_currentQuestion);
                updateCharts();
            }


//boton de back de los dots
            function row_back()
            {
                //la flecha : aparece / desaparece
                if(_currentQuestion==0){
                    $('.assessment-dots .btn-back').removeClass('active');
                }else if(_currentQuestion>0){
                    $('.assessment-dots .btn-back').addClass('active');
                }
            }
            row_back();

            $('.btn-back').on('click',function(){
                prevQuest();
                row_back();
            });


            var answersResult = {};

            function saveAnswers(id_question, value)
            {
                //recupero el json si existe, el storage es string lo convierto a json para poder agregarle propiedades
                if(sessionStorage['answersResult']!=undefined)
                {
                    var recupero = sessionStorage.getItem('answersResult');
                    answersResult = JSON.parse(recupero);
                }

                var property = id_question;

                //agrego una nueva propiedad al json
                answersResult[property] = value;

                //convierto en string para pode guardarlo en el storage
                answersResultString =  JSON.stringify(answersResult);

                //creamos el sesionstorage
                sessionStorage.setItem('answersResult', answersResultString);
                sessionStorage.setItem(id_question,value);
                // loadAnswer(value);
            }

            //al refrescar la página o cuandpo regresas de educación, esta función carga todos los inputs ingresados hasta ese momento

            function completeInput(){

                $('.question').each(function(i,val){
                    var question_id = $(this).find('.checkbox-list').data('question-id2');


                    //console.log(question_id+'/'+$(this).find('.checkbox-list').data('question-id2'));



                    if(sessionStorage[question_id]!=undefined){

                        //habilita el boton que tenga alguna respuesta y deshabilita cuando no tiene
                        if($(this).find('.checkbox-list').data('question-id2')==question_id){
                            $(this).find('button').eq(0).removeAttr("disabled");

                        }

                        var option_session = sessionStorage.getItem(question_id);

                        if ($.type(option_session) == 'string') {
                            var myArray = option_session.split(',');
                        } else {
                            var myArray = [];
                        }

                        $(this).find('.checkbox-list .checkbox input').each(function(){
                            var now = $(this);
                            $.each(myArray, function(i,val){
                                if(now.data('option-id')==val){
                                    now.prop("checked", "checked");
                                }
                            });
                        });

                    }
                });
            }
            completeInput();

           function showResult(){
               var url = '../answers/results';
               $(location).attr('href',url);
           }






            $('.understand').on('click', function() {

                var url = '../education';
                $(location).attr('href',url);
            })

        });


    </script>

    <script>
        // modal
        $(function() {
            var dialog, form,

            // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
                    emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                    name = $( "#name" ),
                    email = $( "#email" ),
                    password = $( "#password" ),
                    allFields = $( [] ).add( name ).add( email ).add( password ),
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

            function addUser() {
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
                    "Send e-mail": addUser
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
                // addUser();
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


        });

    </script>

@endsection