@extends('web.layouts.main')

@section('content')

    <section class="assessment scrollpane">
        <!-- <div class="section-title">Assess Your Risk</div> -->
        <div class="assessment-dots dots">
            <div class="btn-back"><img src="{{asset('img/arrow_left_pink.png')}}"></div>
            <div class="fact-icon">
                i
            </div>
        </div>

        <div class="assessment-wrap">

            <div class="share in">
                <button class="btn-results">VIEW YOUR RESULTS</button><br><br>
                <h4 class="save-share">Save the life of somebody you love. Tell them to complete this experience too.</h4><button class="share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess you personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a id="create-modal2" href="#" target="_blank" class="mail-icon"><i class="fa fa-envelope fa-lg"></i></a>SHARE</button>


                <div id="dialog-form" title="Share">
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



            </div>
        </div>







        {{-------------OVERLAY-------------}}

        <div class="overlay progress-overlay">
            <div class="question-stats">
            </div>
            <button class="sub close-btn">✕</button>
            <div class="share in2">
                <div class="share-copy">
                    <h5>Save the life of somebody you love. Tell them to complete this experience too.</h5>
                </div>
                <div class="share-btn-wrapper">
                    <button class="share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+AssessYourRisk.org" target="_blank"><i class="fa fa-twitter fa-lg"></i></a><a href="#" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess you personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><i class="fa fa-facebook fa-lg"></i></a><a id="create-modal3" href="#" target="_blank" class="mail-icon"><i class="fa fa-envelope fa-lg"></i></a>SHARE</button>
                </div>
            </div>

            <div class="results" style="display: block;">
                <div class="your-risk">
                    <!-- Chart - Removed -->
                    <!--           <div class="progress-result">
                                <div class="percentage percquiz"></div>
                                <div class="chart chart-4"></div>
                              </div> -->
                    <!-- <div class='section-title'>Assessment</div> -->
                    <!-- Insert the TRIGGERED Text Div -->
                    <h2>Your Baseline Risk is <span class="risk-level"></span></h2>
                </div>
                <div class="paragraph-wrapper">
                    <div class="paragraph-box">

                        <!-- Average -->
                        <div class="results-copy-average on">
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
                            <button class="sub email">EMAIL</button><a id="pdf-btn" href="{{URL::to('pdf/report/')}}/" target="_blank" class="pdf"><button>PDF</button></a><button class="sub email-doctor">SHARE WITH MY DOCTOR</button>
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

                        @if(in_array($favor->question_opcion_id,$answers_array->toArray(),true))

                        <span class="level">
                            <div class="item item-{{$favor->question_opcion_id}}">
                                <div class="section-title">{{$favor->subtitle}}</div>
                                <h4>{{$favor->title}}</h4>
                                {!!$favor->content!!}
                            </div>
                        </span>

                        @endif

                    @endforeach







                </div>

                <!-- Negative -->
                <div class="card negative">  <div class="factors-title"><h3>Not Working in Your Favor</h3></div>

                    @foreach($no_favors as $no_favor)
                        @if(in_array($no_favor->question_opcion_id,$answers_array->toArray(),true))

                        <span class="level">
                            <div class="item item-{{$no_favor->question_opcion_id}}">
                                <div class="section-title">{{$no_favor->subtitle}}</div>
                                <h4>{{$no_favor->title}}</h4>
                                {!!$no_favor->content!!}
                            </div>
                        </span>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>

    </section>
    {!! Form::open(['route'=>['answer.store'], 'method'=>'POST', 'id'=>'form-answer']) !!}
    {!! Form::close() !!}

@endsection

@section('btn_mobile')


    <div class="understand">
        <h4>Understand<br>Your Risk<br></h4>
        <div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div>
        <!-- FACTS -->
        <div class="assessment-facts">
            <div class="fact in">

            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        var level = sessionStorage.getItem('level');
        $(document).ready(function(){

            //creamos el atributo para el generador de pdf
            var atributo =  $('.pdf').parent().find('a').attr('href');
            var new_atributo = atributo+sessionStorage.getItem('quizz')+'/'+sessionStorage.getItem('level');

            $('.pdf').parent().find('a').attr('href',new_atributo);

            function explode(){
                $(".progress-overlay").addClass('in');
            }
            setTimeout(explode, 3000);

            /*
            * botón para ir a educatión
            * */

            //$('div.cards span').find('.item').fadeOut(); //oculta todos los items a favor y no favor
          $('.level').find('.item').fadeIn(); //oculta todos los items a favor y no favor


             $('.understand').on('click', function() {
                var url_prev = '../education';
                $(location).attr('href',url_prev);
            })


            $('.right-column').addClass('in');
            $('.logo').animate({opacity: 1}, 3000);
            $('.assessment').animate({opacity: 1}, 2000);


            $.get('{{URL::to('/resultlevel')}}/'+level,{},function(e){

                var datos = JSON.parse(e);

                $('.risk-level').html(datos.name);
                $('.col-izq-1').html(datos.text_less);
                $('.col-der-1').html(datos.text_less_col2);
                $('.col-izq-2').html(datos.text_more);
                $('.col-der-2').html(datos.text_more_col2);
            });

            var result = sessionStorage.getItem('answersResult');
            var obj = JSON.parse(result);

            /*$.each(obj, function( i, val ) {
                $.each(val, function(i2,val2){
                    $('.level').find('.item-'+val2).fadeIn();
                    // $('.level-'+level).find('.item-'+val2).html('jaja');
                    console.log(val);
                });
            });

            $.each(obj, function( i, val ) {
               $('.level').find('.item-'+val).fadeIn();
                console.log(i+'/'+val);
            });*/

//envío de e-mails

            $('.sub.send-user-email').click(function(){
                var name = $(this).parent().find('#your-name').val();
                var email = $(this).parent().find('#user-email-address').val();
                var atributo = sessionStorage.getItem('quizz');
                var level = sessionStorage.getItem('level');

                $.get('{{URL::to('/sendmail/mail')}}',{type:user,name:name,email:email,atributo:atributo,level:level},function(){});

            });


            $('.sub.send-dr-email').click(function(){
                var name = $(this).parent().find('#your-name-dr').val();
                var email = $(this).parent().find('#dr-email-address').val();
                var atributo = sessionStorage.getItem('quizz');
                var level = sessionStorage.getItem('level');

                $.get('{{URL::to('/sendmail/mail')}}',{type:dr,name:name,email:email,atributo:atributo,level:level},function(){});
            });


            $( "#create-modal" ).click(function(e) {
                e.preventDefault();
               alert('hola');
            });


        });

    </script>

    <script src="{{asset('js/email-modal.js')}}"></script>

@endsection