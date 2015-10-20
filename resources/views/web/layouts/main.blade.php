<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if IE 9]>    <html class="ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Assess Your Risk</title>
    <meta name="description" content="1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess your personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!">
    <meta property="og:url" content="http://www.assessyourrisk.org" />
    <meta property="og:title" content="Assess Your Risk" />
    <meta property="og:description" content="1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess your personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!" />
    <meta property="og:image" content="http://www.assessyourrisk.org/img/fb-share.png" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no, minimal-ui" />
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/vendor/modernizr-2.6.2.min.js')}}"></script>
    <script type='application/javascript' src='{{asset('/js/vendor/fastclick.js')}}'></script>
    <script type='application/javascript' src='{{asset('/js/vendor/base64.min.js')}}'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    <!-- Start of Woopra Code -->
    <script>
        /*(function(){
            var t,i,e,n=window,o=document,a=arguments,s="script",r=["config","track","identify","visit","push","call","trackForm","trackClick"],c=function(){var t,i=this;for(i._e=[],t=0;r.length>t;t++)(function(t){i[t]=function(){return i._e.push([t].concat(Array.prototype.slice.call(arguments,0))),i}})(r[t])};for(n._w=n._w||{},t=0;a.length>t;t++)n._w[a[t]]=n[a[t]]=n[a[t]]||new c;i=o.createElement(s),i.async=1,i.src="//static.woopra.com/js/w.js",e=o.getElementsByTagName(s)[0],e.parentNode.insertBefore(i,e)
        })("woopra");

        woopra.config({
            domain: 'assessyourrisk.org'
        });
        woopra.track();*/
    </script>
    <!-- End of Woopra Code -->

    <script>

        function fb_share(url, title, descr, image) {
            FB.ui( {
                method: 'feed',
                name: title,
                link: url,
                picture: image,
                caption: descr
            }, function( response ) {
                if ( response !== null && typeof response.post_id !== 'undefined' ) {
                    console.log( response );
                    // ajax call to save response
                    // $.post( 'http://www.webniraj.com/', { 'meta': response }, function( result ) {
                    //       console.log( result );
                    //   }, 'json' );
                }
            } );

        }
    </script>

    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KB6WGC"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KB6WGC');</script>
    <!-- End Google Tag Manager -->
</head>


<body>
<div class="border"></div>
<div class="logo">
    <a href="http://www.brightpink.org/" target="_blank"><img src={{ URL::asset("img/ayr_logo_bp.png") }}></a>

</div>
<div class="email-content"></div>


<div class="menu-icon">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
</div>







<!-- INTRO -->

@yield('content')

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

    <!-- UNDERSTAND -->
    <div class="toggle-box">

        @section('btn_mobile')

        @show

    </div>
    <div class="copyright">Copyright &copy; {{$year}} Bright Pink <div class="legal"><a href="http://www.brightpink.org/privacy-policy/" target="_blank">Privacy Policy</a> <a href="http://www.brightpink.org/disclaimer/" target="_bank">Terms and Conditions</a></div></div>
</div>

<!-- ASSESSMENT-->

<!-- EDUCATION -->


<!-- FOOTER -->

<footer id="site-footer" class="flex-container">
    <div class="flex-none">
        <a href="#"><span class="icon-facebook"></span></a>
        <a href="#"><span class="icon-twitter"></span></a>
    </div>
</footer>

<!--[if lt IE 9]>
<div class="overlay ie-overlay in">
    <h1>Please upgrade your browser</h1>
    <p>Unfortunately, your browser is outdated and likely insecure.  Please find the <a href="http://browsehappy.com/">most recent version of the browswer for your system here</a>, install it and return to the site.</p>
</div>
<![endif]-->


<div class="overlay landscape-overlay">
    <img src="{{asset('img/rotate-icon.png')}}">
    <h1>Please rotate<br>your device</h1>
</div>

{!! Form::open(['route'=>'sessione', 'method'=>'POST', 'id'=>'form-session']) !!}
{!! Form::close() !!}


<script>
    //sessionStorage.clear();
    //guarda en el storage el numero máximo de preguntas activas, para poder usarlo en el gráfico donut
    sessionStorage.setItem('num_question',{{$num_question}});
    sessionStorage.setItem('num_education',{{$num_education+2}});
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery-1.9.1.min.js')}}"><\/script>')</script>
<script src="{{asset('js/vendor/jquery.address-1.6.min.js')}}"></script>
<script src="{{asset('js/vendor/jquery.placeholder.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>

<script src="{{asset('js/anim.js')}}"></script>
<script type='application/javascript' src='{{asset('/js/jquery-ui.min.js')}}'></script>

<!--CDN links for the latest TweenLite, CSSPlugin, and EasePack-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script src="{{asset('js/weight.js')}}"></script>
<script src="{{asset('js/height.js')}}"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="{{asset('js/svg/DonutChartBuilder.js')}}"></script>
<script src="{{asset('js/svg/SVGHelper.js')}}"></script>


<script src='{{asset('js/pdf_gen.js')}}'></script>

<!-- CLIENT SIDE FACEBOOK SDK INCLUSION -->
<script>
    window.fbAsyncInit = function() {
        // init the FB JS SDK
        FB.init({
            appId      : '753349004746465',                        // App ID from the app dashboard
            // channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel file for x-domain comms
            status     : true,                                 // Check Facebook Login status
            xfbml      : true,                                  // Look for social plugins on the page
            version    : 'v2.2'
        });

        // Additional initialization code such as adding Event Listeners goes here
    };

    // Load the SDK asynchronously
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<script type="text/javascript" src="//tfaforms.com/js/ga_crossdomain_tracking.js"></script>

<!--[if lt IE11]>-->
<script>
    $(document).ready(function(){
        $('.border').css('display', 'none');

        var width = $(window).width();
        var height = $(window).height();//alto de ventana
        var language = x=window.navigator.language||navigator.browserLanguage;//detectamos el lenguaje


        if(localStorage.getItem('session')==undefined || localStorage.getItem('session')=='')
        {
            var form = $('#form-session');
            var data = form.serialize();
            var token = form.find('#token').val();

            $.post('sessione',data,function(last_id){
                localStorage.setItem('session',last_id);
                //carga metricas
               // $.get('{{ route('metric.load')  }}',{session:last_id,width:width,height:height,language:language},function(){});
            })
        }
        else
        {
            //numSession es el numero de id de la session del usuario
            var numSession = localStorage.getItem('session');
            //carga metricas
            $.get('{{ route('metric.load')  }}',{session:numSession,width:width,height:height,language:language},function(){});
        }
    });




</script>
<!--<![endif]-->

@section('script')



@show


</body>


</html> 