@extends('web.layouts.main')

@section('content')

    <!-- ASSESSMENT-->
    <section class="assessment scrollpane">
        <!-- <div class="section-title">Assess Your Risk</div> -->
        <div class="assessment-dots dots">
            <div class="btn-back"><img src="img/arrow_left_pink.png"></div>
            <div class="fact-icon">
                i
            </div>
        </div>


        <section class="assessment-intro in">

            {!! $intro->text !!}

            <a href="{{route('web.question.questions2')}}"><button class="action">{{ $intro->button  }}</button></a>
            <div class="copyright copyright-mobile">Copyright © {{$year}} Bright Pink
                <div class="legal">
                    <a href="http://www.brightpink.org/privacy-policy/" target="_blank">Privacy Policy</a>
                    <a href="http://www.brightpink.org/disclaimer/" target="_bank">Terms and Conditions</a>
                </div>
            </div>
        </section>


    </section>
@endsection

@section('btn_mobile')

    <div class="lets-go" style="left:0">
        <h3>Let’s Go<br></h3>
    </div>

    <div class="understand">
        <div class="understand-contain">
           <h4>Understand<br>Your Risk<br></h4>
            <div class="arrow"><img src="{{asset('img/arrow_right.png')}}"></div>
        </div>
        <!-- FACTS -->
        <div class="assessment-facts">
            <div class="fact in">
                <h5 class="mobile-only">Look here throughout the quiz to discover relevant info and learn more about the question.</h5>
                @if(\Request::segment(1)=='question')
                    {!! $text_colum !!}
                @endif
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

        var url_assessment ='{{Request::segment(1)}}';
        sessionStorage.setItem('url',url_assessment);

        sessionStorage.setItem('highQuestion',1);


            $('.right-column').addClass('in');

            $('.logo').animate({opacity: 1}, 3000);
            $('.assessment').animate({opacity: 1}, 2000);

            $('.understand').on('click', function() {
                var url_prev = 'education';
                $(location).attr('href',url_prev);
            });

            $('.lets-go').click(function(){

                var url = 'question/questions2';
                $(location).attr('href',url);
            });

        $('.lets-go').addClass('left0');

        $('.right-column').addClass('in');

    </script>
    <script src="{{asset('js/main.js')}}"></script>
@endsection