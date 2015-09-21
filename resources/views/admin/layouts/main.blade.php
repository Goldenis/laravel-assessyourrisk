<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assess Your Risk - Admin</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{asset("backend/assets/css/theme-5/bootstrap.css?1422792965")}}" />
    <link type="text/css" rel="stylesheet" href="{{asset("backend/assets/css/theme-5/materialadmin.css?1425466319")}}" />
    <link type="text/css" rel="stylesheet" href="{{asset("backend/assets/css/theme-5/font-awesome.min.css?1422529194")}}" />
    <link type="text/css" rel="stylesheet" href="{{asset("backend/assets/css/theme-5/material-design-iconic-font.min.css?1421434286")}}" />
    <link type="text/css" rel="stylesheet" href="{{asset("backend/assets/css/theme-5/libs/rickshaw/rickshaw.css?1422792967")}}" />
    <link type="text/css" rel="stylesheet" href="{{asset("backend/assets/css/theme-5/libs/morris/morris.core.css?1420463396")}}" />
    <link type="text/css" rel="stylesheet" href="{{asset("backend/assets/css/theme-5/libs/toastr/toastr.css?1425466569")}}" />
    <link type="text/css" rel="stylesheet" href="{{asset("backend/assets/css/theme-5/libs/select2/select2.css?1424887856")}}" />
    <link type="text/css" rel="stylesheet" href="{{asset("backend/assets/css/main.css")}}" />


    @section('css')

    @show

    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{asset("backend/assets/js/libs/utils/html5shiv.js?1403934957")}}"></script>
    <script type="text/javascript" src="{{asset("backend/assets/js/libs/utils/respond.min.js?1403934956")}}"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed ">

<!-- BEGIN HEADER-->
<header id="header" >
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand" >
                    <div class="brand-holder">
                        <a href="../../html/dashboards/dashboard.html">
                            <span class="text-lg text-bold text-primary">PANEL ADMIN</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <ul class="header-nav header-nav-options">


                <li class="dropdown hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                        <i class="fa fa-area-chart"></i>
                    </a>
                    <ul class="dropdown-menu animation-expand">
                        <li class="dropdown-header">Server load</li>
                        <li class="dropdown-progress">
                            <a href="javascript:void(0);">
                                <div class="dropdown-label">
                                    <span class="text-light">Server load <strong>Today</strong></span>
                                    <strong class="pull-right">93%</strong>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-danger" style="width: 93%"></div></div>
                            </a>
                        </li><!--end .dropdown-progress -->
                        <li class="dropdown-progress">
                            <a href="javascript:void(0);">
                                <div class="dropdown-label">
                                    <span class="text-light">Server load <strong>Yesterday</strong></span>
                                    <strong class="pull-right">30%</strong>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-success" style="width: 30%"></div></div>
                            </a>
                        </li><!--end .dropdown-progress -->
                        <li class="dropdown-progress">
                            <a href="javascript:void(0);">
                                <div class="dropdown-label">
                                    <span class="text-light">Server load <strong>Lastweek</strong></span>
                                    <strong class="pull-right">74%</strong>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-warning" style="width: 74%"></div></div>
                            </a>
                        </li><!--end .dropdown-progress -->
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-options -->

            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">

								<span class="profile-info">
									{{$user = \Auth::user()->name}}
									<small>Administrator</small>
								</span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li class="dropdown-header">Config</li>
                        {{--<li><a href="../../html/pages/locked.html"><i class="fa fa-fw fa-lock"></i> Change Password</a></li>--}}
                        <li><a href="{{route('auth.logout')}}"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->

        </div><!--end #header-navbar-collapse -->
    </div>
</header>
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->

    <!-- BEGIN CONTENT-->
    <div id="content">



            @yield('content')



        </section>
    </div><!--end #content-->
    <!-- END CONTENT -->

    <!-- BEGIN MENUBAR-->
    <div id="menubar" class="menubar-inverse ">
        <div class="menubar-fixed-panel">
            <div>
                <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="expanded">
                <a href="#">
                    <span class="text-lg text-bold text-primary ">PANEL&nbsp;ADMIN</span>
                </a>
            </div>
        </div>
        <div class="menubar-scroll-panel">

            <!-- BEGIN MAIN MENU -->
            <ul id="main-menu" class="gui-controls">

                <!-- BEGIN DASHBOARD -->
                <li>
                    <a href="{{ route('admin.home') }}" class="active">
                        <div class="gui-icon"><i class="md md-home"></i></div>
                        <span class="title">Dashboard</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END DASHBOARD -->

                <!-- BEGIN QUESTIONS -->
                <li>
                    <a href="{{ route('admin.question.index') }}">
                        <div class="gui-icon"><i class="md md-check-box"></i></div>
                        <span class="title">Questions</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END QUESTIONS -->

                <!-- RESULTS LEVEL -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="glyphicon glyphicon-signal"></i></div>
                        <span class="title">Result Levels</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        @foreach($result_levels as $result_level)
                            <li><a href="{{ route('admin.resultlevelcondition.level',$result_level->id) }}" ><span class="title">{{$result_level->name}}</span></a></li>
                        @endforeach
                    </ul><!--end /submenu -->
                </li><!--end /menu-li -->
                <!-- END RESULTS LEVEL -->



                <!-- BEGIN INTROS -->
                <li>
                    <a href="{{ route('admin.intro.show',1) }}">
                        <div class="gui-icon"><i class="md md-format-align-justify"></i></div>
                        <span class="title">Intros - text</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END INTROS -->

                <!-- BEGIN EDUCATIONS -->
                <li>
                    <a href="{{ route('admin.education.show',1) }}">
                        <div class="gui-icon"><i class="md md-school"></i></div>
                        <span class="title">Educations</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END EDUCATIONS -->

              <!-- BEGIN EMAIL -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="md md-email"></i></div>
                        <span class="title">Sent</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        @foreach($sent_types as $sent_type)
                        <li><a href="{{ route('admin.sent.listByType',$sent_type->id) }}" ><span class="title">{{$sent_type->name}}</span></a></li>
                        @endforeach
                     </ul><!--end /submenu -->
                </li><!--end /menu-li -->
                <!-- END EMAIL -->

                <!-- BEGIN EDUCATIONS -->
                <li>
                    <a href="{{ route('admin.brand.index') }}">
                        <div class="gui-icon"><i class="fa fa-tags"></i></div>
                        <span class="title">Brands</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END EDUCATIONS -->


                <!-- RESULTS LEVEL -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="fa fa-bar-chart"></i></div>
                        <span class="title">Metrics</span>
                    </a>
                    <!--start submenu -->
                    <ul>

                        <li><a href="{{ route('admin.metric.index') }}" ><span class="title">Visit</span></a></li>
                        <li><a href="{{ route('admin.metricanswer.index') }}" ><span class="title">By Question</span></a></li>

                    </ul><!--end /submenu -->
                </li><!--end /menu-li -->
                <!-- END RESULTS LEVEL -->



            </ul><!--end .main-menu -->
            <!-- END MAIN MENU -->


        </div><!--end .menubar-scroll-panel-->
    </div><!--end #menubar-->
    <!-- END MENUBAR -->



</div><!--end #base-->
<!-- END BASE -->


<script src="{{asset("backend/assets/js/libs/jquery/jquery-1.11.2.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/jquery-ui/jquery-ui.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/bootstrap/bootstrap.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/spin.js/spin.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/autosize/jquery.autosize.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/moment/moment.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/flot/jquery.flot.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/flot/jquery.flot.time.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/flot/jquery.flot.resize.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/flot/jquery.flot.orderBars.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/flot/jquery.flot.pie.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/flot/curvedLines.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/jquery-knob/jquery.knob.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/sparkline/jquery.sparkline.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/d3/d3.min.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/d3/d3.v3.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/rickshaw/rickshaw.min.js")}}"></script>
<script src="{{asset("backend/assets/js/core/source/App.js")}}"></script>
<script src="{{asset("backend/assets/js/core/source/AppNavigation.js")}}"></script>
<script src="{{asset("backend/assets/js/core/source/AppOffcanvas.js")}}"></script>
<script src="{{asset("backend/assets/js/core/source/AppCard.js")}}"></script>
<script src="{{asset("backend/assets/js/core/source/AppForm.js")}}"></script>
<script src="{{asset("backend/assets/js/core/source/AppNavSearch.js")}}"></script>
<script src="{{asset("backend/assets/js/core/source/AppVendor.js")}}"></script>
<script src="{{asset("backend/assets/js/core/demo/Demo.js")}}"></script>
<script src="{{asset("backend/assets/js/core/demo/DemoUIMessages.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/toastr/toastr.js")}}"></script>
<script src="{{asset("backend/assets/js/libs/select2/select2.min.js")}}"></script>

{{--<script src="{{asset("backend/assets/js/core/demo/DemoDashboard.js")}}"></script>--}}

@section('script')

@show



</body>
</html>
