@extends('web.layouts.main')

@section('content')

    <div class="overlay male-overlay">
        <button class="sub close-btn">✕</button>
        <h1>Then <span class="share-btn">share<a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+AssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#/assessment" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess your personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a href="#" id="create-modal3" target="_blank" class="mail-icon"><i class="fa fa-envelope fa-lg"></i></a></span> this with someone you care about that does. You just might save her life.</h1>
    </div>

    <div class="fact-overlay">
        <button class="sub close-btn">✕</button>
        <div class="return"><div class="arrow"><img src="{{asset('img/arrow_left.png')}}"></div> <h4>Return to Assessment</h4></div>

        <div class="assessment-facts">
            <div class="fact in">
                @if(\Request::segment(1)=='question')
                    {!! $text_colum !!}
                @endif
            </div>
        </div>
    </div>

    <!--formulario de primerfa pregunta-->
    @if($question->id==17)
        <div id="dialog-form" title="Help me ask them" style="display:none">

            <form>
                <table class="modal-table">
                    <tr>
                        <td><label for="subject">subject</label></td>
                        <td> <input type="text" required name="subject" id="subject" placeholder="subject"
                                    value="{{$share->subject}}" class="text modal-text ui-widget-content ui-corner-all"></td>
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
                        <td><textarea name="" id="" cols="30" rows="6" class="modal-text">{{$share->body}}</textarea></td>
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
        @endif

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
        {!!Form::hidden('question_id',$question->id,['id'=>'question_id'])!!}


{{--RADIO BOTON--}}

        @if($question->question_type_id==1)

            {{--{{dd($question)}}--}}

        <div class="question in gif" data-question-id="2">
            @if($question->gif != '' || $question->gif != null)
            <div class="anim-gif calendar">
                <img src="{{asset('img/')}}/{!!$question->gif!!}">
            </div>
            @endif
            <div class="prompt">{!!$question->text!!}</div>

            <div class="answers" data-question-id2="{{$question->id}}">
                <div class="checkbox-list">
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
                        {{--<a href="mailto:name@email.com?subject=Can you help" target="_blank"><button class="sub ask">Help me ask them</button></a>--}}
                        <button id="create-modal2" class="sub ask">Help me ask them</button>


                        <div id="dialog-form" title="Help me ask them">

                            <form>
                                <table class="modal-table">
                                    <tr>
                                        <td><label for="subject">subject</label></td>
                                        <td> <input type="text" required name="subject" id="subject" placeholder="subject"
                                                    value="{{$question->email_subject}}" class="text modal-text ui-widget-content ui-corner-all"></td>
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
                                        <td><textarea name="" id="" cols="30" rows="6" class="modal-text">{{$question->email_body}}</textarea></td>
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



                    @endif
                </div>
            </div>

        </div>

        @elseif($question->question_type_id==2)
{{--CHECK BOX--}}

        <div class="question in">
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
                    <button id="create-modal2" class="sub ask">Help me ask them</button>


                    <div id="dialog-form" title="Help me ask them">

                        <form>
                            <table class="modal-table">
                                <tr>
                                    <td><label for="subject">subject</label></td>
                                    <td> <input type="text" required name="subject" id="subject" placeholder="subject"
                                                value="{{$question->email_subject}}" class="text modal-text ui-widget-content ui-corner-all"></td>
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
                                    <td><textarea name="" id="" cols="30" rows="6" class="modal-text">{{$question->email_body}}</textarea></td>
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
                @endif
            </div>
        </div>

        @elseif($question->question_type_id==3)
{{--BOTON--}}

        <div class="assessment-wrap">

            <div class="question @if($question->gif != '' || $question->gif != null) gif @endif in" data-question-id="{{$question->id}}">

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
                            <button id="create-modal2" class="sub ask">Help me ask them</button>


                            <div id="dialog-form" title="Help me ask them">

                                <form>
                                    <table class="modal-table">
                                        <tr>
                                            <td><label for="subject">subject</label></td>
                                            <td> <input type="text" required name="subject" id="subject" placeholder="subject"
                                                        value="{{$question->email_subject}}" class="text modal-text ui-widget-content ui-corner-all"></td>
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
                                            <td><textarea name="" id="" cols="30" rows="6" class="modal-text">{{$question->email_body}}</textarea></td>
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
                    @endif
                </div>
            </div>



        </div>
        @elseif($question->question_type_id==4)
        {{--ESPECIAL--}}

                @if($question->id == 33) {{--bottle--}}

                        <div class="question drinks-question in">
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
                        <div class="question in weight-question" data-question-id="3">
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

                        <div class="question out-up" id="height-question" data-question-id="{{$question->id}}" data-question-name="bmi">
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



        </div>

    </section>

@endsection

@section('btn_mobile')

    <div class="understand">
        <h4>Understand<br>Your Risk<br></h4>
        <div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div>
        <!-- FACTS -->
        <div class="assessment-facts">
            <div class="fact in">

                @if(\Request::segment(1)=='question')
                    {!! $text_colum !!}
                @endif
            </div>
        </div>
    </div>

@endsection


@section('script')

    <script>
        $('.right-column').addClass('in');
        $('.logo').animate({opacity: 1}, 3000);
        $('.question').fadeIn();
        $('.question').animate({opacity: 1}, 3000);
        $('.assessment').animate({opacity: 1}, 2000);

        var url_question ='{{Request::segment(1)}}/{{Request::segment(2)}}/{{Request::segment(3)}}';
        sessionStorage.setItem('url',url_question);


        //definimos hasta que pregunta como máximo ha llegado y grabado en el storage
        //esto es para cuando regrese a preguntas anteriores se mantengan los dots grises

        if(sessionStorage['highQuestion']!=undefined)
        {
            var maxQuestion = sessionStorage.getItem('highQuestion');
            if({{$question->order}}>maxQuestion)
            {
                sessionStorage.setItem('highQuestion',{{$question->order}});
            }
        }
        else
        {
            sessionStorage.setItem('highQuestion',{{$question->order}});
            var maxQuestion = 0;
        }

       // $('#text-question-colum').html(texto);


//boton


       /*
        var result = sessionStorage.getItem('answersResult');
        var obj = JSON.parse(result);
        console.log(obj[35]);*/

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
                  saveAnswers(question_id, option);
                 // var url_next = '{{--$url--}}';
                 // $(location).attr('href',url_next);
              }
          });

//radioboton

        $('button.radio_button').prop('disabled', !this.checked);

        var quest =  $('.answers').data('question-id2');
        var item = sessionStorage.getItem(quest);
        //alert(item);
        //var optionn = $('.answers .checkbox input').data('option-id');

        $('.answers .checkbox input').each(function(i,val){
            if($(this).data('option-id')==item){
                $(this).prop("checked", "checked");
            }
        });

        //verifico si hay algun radioboton seleccionado

        $('input[name="radio"]').change(function(){
            $('button.radio_button').prop('disabled', !this.checked);
        });

        $('input[name="radio"]').each(function(i,val){
            if($(this).prop('checked')){
                $('button.radio_button').removeAttr("disabled");
            }
        });




    if({{$question->id}}==35){

        //seleccion especial de las opciones
        $('input[name="radio"]').change(function(){

           var opcion = $(this).data('option-id');

            if((opcion == 55) || (opcion == 57)){
                 url_next = '{{$url}}';
                mutation_value = 0;

            }else{
                 url_next = '{{$url_renext}}';
                mutation_value = 1;
            }

        });
    }else{
        url_next = '{{$url}}';
            mutation_value = 1;
    }


        $('button.radio_button').click(function(){

            var age = $('input[name="radio"]:checked');
           // var age = $('input[name="radio"]').prop("checked");
            var question_id = age.data('question-id');
            var option = age.data('option-id');

            saveAnswers(question_id, option);
           // alert(option);

           if(option==56 || option==59 || option==60){
               saveAnswers(47, 94);
           }

           // console.log(url_next);
            sessionStorage.setItem('question_mutation',mutation_value);
            $(location).attr('href',url_next);
        });

        /*--este es especial, para la pregunta que va a depender de esta respuesta--*/




//checkbox

       // if($('.checkbox-list').data('question-id2')==0){
            var quest_check =  $('.checkbox-list').data('question-id2');
            var item_check = sessionStorage.getItem(quest_check);


          if($.type(item_check)=='string'){
              var myArray = item_check.split(',');
          }else{
              var myArray=[];
          }
        //lleno los checks


            $('.checkbox-list .checkbox input').each(function(i,val){
                var now = $(this);
                $.each(myArray, function(i,val){
                    if(now.data('option-id')==val){
                        now.prop("checked", "checked");
                    }
                });
            });

        $('input[name="check"]').each(function(i,val){
            if($(this).prop('checked')){
                $('button.check_box').removeAttr("disabled");
            }
        });


        $('input[name="check"]').change(function() {
            var allCheckboxes = $('input[name="check"]');
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
                console.log(item.checked);
                if (item.checked) {
                    noneChecked = false;
                    return false;
                }
            });

            $('button.check_box').prop('disabled', noneChecked);
        });

        $('button.check_box').click(function(){

            var question_id = $(this).data('question-id');

            var options = [];
            $('.checkbox-list input:checked').each(function() {
                options.push($(this).data('option-id'));
            });
            console.log(question_id+' | '+options);

            saveAnswers(question_id, options);

            var url_next = '{{$url}}';
            $(location).attr('href',url_next);
        });


//ESPECIALES
        // bottle
        $('.btn-bottle').click(function(){
            var question_id = $(this).data('question-id');
            var option = sessionStorage.getItem('bottle');

            //convertimos el string en numero
            var bottle = parseInt(option);

            saveAnswers(question_id, bottle);

            var url_next = '{{$url}}';
            $(location).attr('href',url_next);
        });


        var num_bottles = sessionStorage.getItem('bottle');
        num_bottles = num_bottles*1;

        var bottle_w = $('.drink-slider').width();

        var distancia = (bottle_w*num_bottles)/6;

        $('.bottle').css('left',distancia);

          for(i=0; i<num_bottles+1; i++){
            $('.answers.drinks .drink img').eq(i).css({opacity: 1});
        }




        //WEIGHT
        $('.submit-weight').click(function(){

            console.log(window.weightInPounds);
            $('.weight-question').addClass('out-up');
            $('.weight-question').removeClass('in');
            $('#height-question').addClass('in');
            $('#height-question').removeClass('out-up');

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

            var url_next = '{{$url}}';
            $(location).attr('href',url_next);
        });


        function createDotsQuestion() {

            for (var i = 1; i < {{$count}}+1; i++) {

                if(i<=maxQuestion){
                    var dot = '<div class="dot on"></div>';
                }else{
                    var dot = '<div class="dot"></div>';
                }

                if(i=={{$question->order}}){
                    var dot = '<div class="dot active"></div>';
                }

                $('.assessment-dots').append(dot);
            };

            /*for (var i = 0; i < _totalHeadlines; i++) {
                var dot = '<div class="dot"></div>';
                $('.education .dots').append(dot);
            };
            $('.percdive').html(0 + '/' + _totalHeadlines);
            $('.percquiz').html(0 + '/' + _totalQuestions);*/
        }

        createDotsQuestion();

        //boton de back de los dots
        if({{$question->order}}==1){
            $('.assessment-dots .btn-back').removeClass('active');
        }else{
            $('.assessment-dots .btn-back').addClass('active');
        }
        $('.assessment-dots .btn-back.active').click(function(){

            if(sessionStorage.getItem('question_mutation')==1 && $('.question').data('question-id') == 36){
                var url_prev = '{{$url_reprev}}';
            }else{
                var url_prev = '{{$url_prev}}';
            }

            $(location).attr('href',url_prev);

        })

        /*
        *Esta función crea y agrega session storage para almacenra momentaneamente las respuestas
        */
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
            loadAnswer(value);
        }

        /*
        * botón para ir a educatión
        * */
        $('.understand').on('click', function() {
            var url_prev = '../../education';
            $(location).attr('href',url_prev);
        })

        /*
        * Metricas
        */
        function loadAnswer(answer_id)
        {
            var session_id = localStorage.getItem('session');
            var quiz_id = sessionStorage.getItem('quizz');
            var question_id = $('#question_id').val();

            var question_order = {{$question->order}};

            if($.type(answer_id)=='array'){

                $.each(answer_id, function( index, value ) {

                    $.get('../../metricanswer/load',{
                        session_id:session_id,
                        question_id:question_id,
                        quiz_id:quiz_id,
                        question_order:question_order,
                        answer_id:value
                    },function(){});
                });

           }else{
                $.get('../../metricanswer/load',{
                    session_id:session_id,
                    question_id:question_id,
                    quiz_id:quiz_id,
                    question_order:question_order,
                    answer_id:answer_id
                },function(){});
           }
        }




        </script>

    <script src="{{asset('js/email-modal.js')}}"></script>

@endsection