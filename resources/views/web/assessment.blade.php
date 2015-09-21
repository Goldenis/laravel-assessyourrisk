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

            <a href="{{route('web.question.showSlug',$first_question->slug)}}"><button class="action">{{ $intro->button  }}</button></a>
            <div class="copyright copyright-mobile">Copyright © 2015 Bright Pink
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

@endsection

@section('script')
    <script>


            $('.right-column').addClass('in');

            $('.logo').animate({opacity: 1}, 3000);
            $('.assessment').animate({opacity: 1}, 2000);

            $('.understand').on('click', function() {
                var url_prev = 'education';
                $(location).attr('href',url_prev);
            });

            $('.lets-go').click(function(){

                var url = '{{route('web.question.showSlug',$first_question->slug)}}';
                $(location).attr('href',url);
            });

        $('.lets-go').addClass('left0');

        $('.right-column').removeClass('in');


    </script>
@endsection