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

                @endif
            </div>
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
        $('.assessment').css('visibility','visible');

        $.get('questionloadajax',{
            slug:'has_a_doctor_told_you_as_a_result_of_a_mammogram'
        },function(e){
            $('.assessment-wrap').html(e);

        });


        $('button.button_type').click(function(){
            alert('a');
        });





        </script>



@endsection