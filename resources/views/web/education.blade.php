@extends('web.layouts.educations')

@section('content')

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
    {{--formulario para cargar pldge--}}
    {!! Form::open(['route'=>['pledge.store'], 'method'=>'POST', 'id'=>'form-pledge']) !!}
    {!! Form::close() !!}

@endsection

@section('script')

    <script>
        $('.right-column').addClass('in in2 left');
        $('.education').addClass('in');
        $('.logo').animate({opacity: 0}, 3000);
//lifestyle
        //agregamos clases y html para la primera vigneta
        $('#lifestyle-list .vignette').first().addClass('main');
        $('#lifestyle-list .vignette').first().find('.headline').prepend(

                '<div class="section-title">Understand Your Risk</div>'
        );
        $('#lifestyle-list .vignette').first().find('.headline').append(
                '<h6 class="scroll-dive">Scroll</h6><div class="btn-begin arrow"><img src="img/arrow_right.png"></div>'
        );

        //agregamos clases y html para la ultima vigneta
        $('#lifestyle-list .vignette').last().addClass('last');
        $('#lifestyle-list .vignette').last().find('.headline').addClass('last');
        $('#lifestyle-list .vignette').last().find('.headline').prepend(
                '<div class="arrow"><img src="img/arrow_right.png"></div>');


        $.get('pledge/countByCategory',{
            category:1,
            session:localStorage.getItem('session')
        },function(result){
            if(result==1){


                $('#lifestyle-list .vignette').last().find('.headline h3').first().addClass('hidden');
                $('#lifestyle-list .vignette').last().find('.headline h5').first().addClass('hidden');

                $('#lifestyle-list .vignette').last().find('.headline h3').addClass('lifestyle-pledge-number');

                $('#lifestyle-list .vignette').last().find('.headline h5').after(
                        '<h3 class="lifestyle-pledge-number">You and '+{{$pledge_lifestyle}}+' women have pledged to improve your lifestyles</h3>');

            }else{
                $('#lifestyle-list .vignette').last().find('.headline h3').prepend('<span class="lifestyle-count">{{$pledge_lifestyle}}</span> ');
                $('#lifestyle-list .vignette').last().find('.headline h3').addClass('lifestyle-pledge-number');

                $('#lifestyle-list .vignette').last().find('.headline h5').after(
                        '<button class="facebook lifestyle">Pledge</button>');

                buttons();
            }
        });

        $('#lifestyle-list .vignette').last().find('.headline').append(
                '<button class="btn-continue sub">CONTINUE TO KNOW YOUR NORMAL →</button>');





// normal

        //agregamos clases y html para la primera vigneta
        $('#normal-list .vignette').first().addClass('main');
        $('#normal-list .vignette').first().find('.headline').prepend(
                '<div class="section-title">Understand Your Risk</div>'
        );
        $('#normal-list .vignette').first().find('.headline').append(
                '<h6 class="scroll-dive">Scroll</h6><div class="btn-begin arrow"><img src="img/arrow_right.png"></div>'
        );

        //agregamos clases y html para la ultima vigneta
        $('#normal-list .vignette').last().addClass('last');
        $('#normal-list .vignette').last().find('.headline').addClass('last');
        $('#normal-list .vignette').last().find('.headline').prepend(
                '<div class="arrow"><img src="img/arrow_right.png"></div>'
        );

        $.get('pledge/countByCategory',{
            category:2,
            session:localStorage.getItem('session')
        },function(result){
            if(result==1){


                $('#normal-list .vignette').last().find('.headline h3').first().addClass('hidden');
                $('#normal-list .vignette').last().find('.headline h5').first().addClass('hidden');

                $('#normal-list .vignette').last().find('.headline h3').addClass('knowing-pledge-number');

                $('#normal-list .vignette').last().find('.headline h5').after(
                        '<h3 class="normal-pledge-number">You and '+{{$pledge_normal}}+' women have pledged to improve your normals</h3>');

            }else{
                $('#normal-list .vignette').last().find('.headline h3').prepend('<span class="normal-count">{{$pledge_normal}}</span> ');
                $('#normal-list .vignette').last().find('.headline h3').addClass('knowing-pledge-number');

                $('#normal-list .vignette').last().find('.headline h5').after(
                        '<button class="facebook knowing">Pledge</button>');

                buttons();
            }
        });

        $('#normal-list .vignette').last().find('.headline').append(
                '<button class="btn-continue sub">CONTINUE TO FAMILY HISTORY →</button>');

//family
        //agregamos clases y html para la primera vigneta
        $('#family-list .vignette').first().addClass('main');
        $('#family-list .vignette').first().find('.headline').prepend(
                '<div class="section-title">Understand Your Risk</div>'
        );
        $('#family-list .vignette').first().find('.headline').append(
                '<h6 class="scroll-dive">Scroll</h6><div class="btn-begin arrow"><img src="img/arrow_right.png"></div>'
        );

        //agregamos clases y html para la ultima vigneta
        $('#family-list .vignette').last().addClass('last');
        $('#family-list .vignette').last().find('.headline').addClass('last');
        $('#family-list .vignette').last().find('.headline').prepend('<div class="arrow"><img src="img/arrow_right.png"></div>');
        $.get('pledge/countByCategory',{
            category:3,
            session:localStorage.getItem('session')
        },function(result){
            if(result==1) {

                $('#family-list .vignette').last().find('.headlines').append('<div class="headline"><h3 class="family-pledge-number">You and '+{{$pledge_family}}+' women have pledged to learn about their family history</h3></div>');
                $('#family-list .vignette').last().find('.headlines').append('<div class="headline last"><div class="share"><div class="arrow"><img src="img/arrow_right.png"></div><h3>Save the life of somebody you love. Tell them to complete this experience too.</h3><br><button class="share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><img src="img/twitter.png"></a><a href="#/education" onclick="fb_share(\'http://www.assessyourrisk.org\', \'Assess Your Risk\', \'1 in 8 women will develop breast cancer at some point in her lifetime. 1 in 67 will develop ovarian cancer.\', \'http://www.assessyourrisk.org/img/fb-share.png\', 520, 350)"><img src="img/facebook.png"></a><a href="mailto:name@email.com?subject=Bright Pink Risk Avarian cancer—created a tool that will help you assess your personal level of risk for these cancers.  By looking at your health and family history alongside some of your lifestyle choices, you will not only learn about your risk, but also about the actions you can take to reduce it.      1 in 8 women will develop breast cancer at some point in her lifetime.  Please consider assessing your own level of risk by checking out the tool at AssessYourRisk.org." target="_blank" class="mail-icon"><img src="img/mail.png"></a>SHARE</button></div></div>');


            }else{
                $('#family-list .vignette').last().find('.headlines').append('<div class="headline"><h3 class="family-pledge-number"> Women Have Pledged to Collect Their Family History</h3><h5>You can join them. By clicking the pledge button below, you’ll make that number go higher.</h5><button class="facebook family">Pledge</button></div>');
                $('#family-list .vignette').last().find('.headlines').append('<div class="headline last"><div class="share"><div class="arrow"><img src="img/arrow_right.png"></div><h3>Save the life of somebody you love. Tell them to complete this experience too.</h3><br><button class="share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><img src="img/twitter.png"></a><a href="#/education" onclick="fb_share(\'http://www.assessyourrisk.org\', \'Assess Your Risk\', \'1 in 8 women will develop breast cancer at some point in her lifetime. 1 in 67 will develop ovarian cancer.\', \'http://www.assessyourrisk.org/img/fb-share.png\', 520, 350)"><img src="img/facebook.png"></a><a href="mailto:name@email.com?subject=Bright Pink Risk Avarian cancer—created a tool that will help you assess your personal level of risk for these cancers.  By looking at your health and family history alongside some of your lifestyle choices, you will not only learn about your risk, but also about the actions you can take to reduce it.      1 in 8 women will develop breast cancer at some point in her lifetime.  Please consider assessing your own level of risk by checking out the tool at AssessYourRisk.org." target="_blank" class="mail-icon"><img src="img/mail.png"></a>SHARE</button></div></div>');
                $('#family-list .vignette').last().find('.headline .family-pledge-number').prepend('{{$pledge_family}}');
                buttons();

            }
        });





      //  fillDot();
        //_totalHeadlines = $('.headline').length;
        _totalHeadlines = sessionStorage.getItem('num_education');

        for (var i = 0; i < _totalHeadlines; i++) {
            var dot = '<div class="dot"></div>';
            $('.education .dots').append(dot);
        };

        /*
         * botón para ir a assessment
         */
        $('.assess').on('click', function() {
            var url_prev = sessionStorage.getItem('url');
            $(location).attr('href',url_prev);
        })



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








        </script>

@endsection