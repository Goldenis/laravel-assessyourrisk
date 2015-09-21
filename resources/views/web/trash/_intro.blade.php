@extends('web.layouts.main')

@section('content')

    <section class="intro" class="flex-container vertical-container">

        <div class="wheel-container">
            <!--[if lt IE 10]>
            <img src="img/wheel_fallback.jpg">
            <![endif]-->
            <div id="wheel-base"><!-- <div class="spin">CLICK TO SPIN</div> --></div>
            <div id="wheel-overlay"></div>
        </div>

        <div class="intro-message">
            <p>
                <b><span class="pink-text">1 in 8</span> women will develop breast cancer at some point in her lifetime.  <span class="pink-text">1 in 67</span> will develop ovarian cancer.</b>
            </p>
            <br>
            <p>
                <b>Your body. Your life.<br>
                    Don’t leave it up to chance.</b>
            </p>
            <a id="Begin" href="{{route('web.assessment')}}"></span><button class="action lifestyle"> Assess Your Risk </button> </a>
        </div>
    </section>

    <div class="overlay landscape-overlay">
        <img src="{{asset('frontend/img/rotate-icon.png')}}">
        <h1>Please rotate<br>your device</h1>
    </div>



    <!-- RIGHT COLUMN -->
    <div class="right-column active">

        <!-- DASH -->

        <div class="dashboard">
            <h6 class="label">MY PROGRESS</h6>
            <div class="progress">
                <div class="percentage percquiz"></div>
                <div class="chart chart-2"></div>
                <h6>Assess</h6>
            </div>
            <div class="progress">
                <div class="percentage percdive"></div>
                <div class="chart chart-3"></div>
                <h6>Understand</h6>
            </div>
        </div>

        @include('web.partials.button_togle')

        <div class="copyright">Copyright &copy; <?php echo date("Y"); ?> Bright Pink <div class="legal"><a href="http://www.brightpink.org/privacy-policy/" target="_blank">Privacy Policy</a> <a href="http://www.brightpink.org/disclaimer/" target="_bank">Terms and Conditions</a></div></div>
    </div>
@endsection

@section('script')

    <script>
        $(document).ready(function(){
            TweenLite.to($('.logo'), .5, {opacity: 1, delay: 1});
            TweenLite.to($('.intro-message'), .5, {opacity: 1, delay: 0});

        });

        $('.border').css('display', 'none');

    </script>
    @endsection