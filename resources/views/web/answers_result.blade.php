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
                <h4 class="save-share">Save the life of somebody you love. Tell them to complete this experience too.</h4><button class="share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><img src="{{asset('img/twitter.png')}}"></a><a href="#/assessment" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess you personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><img src="{{asset('img/facebook.png')}}"></a><a href="mailto:name@email.com?subject=Bright Pink Risk Assessment: 5 Minutes Could Save Your Life&body=Hi,
%0D%0A
%0D%0A
I want to share something important with you.
%0D%0A
%0D%0A
Bright Pink—a non-profit organization focused on saving women’s lives from breast and ovarian cancer—created a tool that will help you assess your personal level of risk for these cancers.  By looking at your health and family history alongside some of your lifestyle choices, you will not only learn about your risk, but also about the actions you can take to reduce it.
%0D%0A
%0D%0A
1 in 8 women will develop breast cancer at some point in her lifetime.  Please consider assessing your own level of risk by checking out the tool at AssessYourRisk.org." target="_blank" class="mail-icon"><img src="{{asset('img/mail.png')}}"></a>SHARE</button>
            </div>
        </div>









    </section>
    {!! Form::open(['route'=>['answer.store'], 'method'=>'POST', 'id'=>'form-answer']) !!}
    {!! Form::close() !!}

@endsection

@section('script')

    <script>
        $(document).ready(function(){



         /*
                * botón para ir a educatión
                * */
                $('.understand').on('click', function() {
                    var url_prev = '../education';
                    $(location).attr('href',url_prev);
                })

            var highQuestion = sessionStorage.getItem('highQuestion');
            highQuestion++;
            sessionStorage.setItem('level',1);
            sessionStorage.setItem('highQuestion',highQuestion);
            var cuestion_count = {{$questions}};


            var result = sessionStorage.getItem('answersResult');
            var obj = JSON.parse(result);
           // alert(result.length);

            var k = 1;
            $.each( obj, function( i, val ) {
                var form = $('#form-answer');
                var url = form.attr('action');
                data = form.serialize();

                data = data+'&question_id='+i+'&question_option_id='+val;
              // console.log(data);

                $.post(url,data,function(result){
                    //esto carga un quiz y los resultados
                    sessionStorage.setItem('quizz',result);
                    console.log(k+'/'+cuestion_count );

                    if( k == cuestion_count ){goUrl()}
                    k++;

                });

                $.get("{{ URL::to('/resultlevelcondition/findlevel') }}",data,function(resultado){
                     //console.log('level: '+resultado);

                   if(sessionStorage.getItem('level')!=undefined){

                        if(sessionStorage.getItem('level')<resultado){
                            sessionStorage.setItem('level',resultado);
                        }
                   }
                   else
                   {
                        sessionStorage.setItem('level',resultado);
                   }

                });
                data='';
            });



            function goUrl()
            {
                var quizz = sessionStorage.getItem('quizz');
                document.location.href = "results_final/"+quizz;
            }


            setTimeout(goUrl, 3000);





        });

    </script>

@endsection