@extends('web.layouts.main')

@section('content')



    <!-- INTRO -->

    <section class="intro" class="flex-container vertical-container">
     

       
      <div class="wheel-container">
        <!--[if lt IE 10]>
        <img src="img/wheel_fallback.jpg">
        <![endif]-->
        <div id="wheel-base"><!-- <div class="spin">CLICK TO SPIN</div> --></div>
        <div id="wheel-overlay"></div>


      </div>

      <div class="intro-message">

          {!!$intro->text!!}



        <a class="btn-desktop" href="{{route('web.assessment')}}"><button class="action lifestyle"> {{$intro->button}}</button> </a>


      </div>
    </section>

   @endsection

@section('btn_mobile')

    <div class="assess-start">
        <h3>Assess Your Risk<br></h3>
    </div>

@endsection


@section('script')
    <script src="js/roulette.js"></script>
    <script>
        session = localStorage.getItem('session');
        $(document).ready(function(){
            $('.logo').animate({opacity: 1}, 3000);
        });

    </script>
@endsection