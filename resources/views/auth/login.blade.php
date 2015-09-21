@extends('auth.layouts.main')

@section('content')

    <div class="img-backdrop" style="background-image: url('{{asset('backend/assets/img/family.jpg')}}')">




    </div>  {{--<video  id="vid-fd" poster="first-frame.jpg" autoplay="autoplay" loop="loop">
            <source type="video/webm" src="http://brightpink-videos.s3.amazonaws.com/family.mp4" />
            <source type="video/mp4" src="http://brightpink-videos.s3.amazonaws.com/family.mp4" />
            <source type="video/ogv" src="http://brightpink-videos.s3.amazonaws.com/family.ogv" />
        </video>--}}
    <div class="spacer"></div>
    <div class="card contain-sm style-transparent">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <br/>
                    <span class="text-lg text-bold text-primary">ASSESS YOUR RISK - ADMIN</span>
                    <br/><br/>
                    {!! Form::open(['route' => 'auth.login', 'method' => 'POST', 'class' => 'form floating-label', 'accept-charset'=>'utf-8']) !!}
                    {!! csrf_field() !!}

                        <div class="form-group">

                            {!! Form::email('email',null,["class"=>"form-control"]) !!}
                            <label for="username">Username</label>
                        </div>
                        <div class="form-group">

                            {!! Form::password('password',["class"=>"form-control"]) !!}
                            <label for="password">Password</label>
                            <p class="help-block"><a href="#">Forgotten?</a></p>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <div class="checkbox checkbox-inline checkbox-styled">
                                    <label>
                                       {!! Form::checkbox('active'); !!}
                                    </label>
                                </div>
                            </div><!--end .col -->
                            <div class="col-xs-6 text-right">
                               {!! Form::submit('Login',["class"=>"btn btn-primary btn-raised"]) !!}
                            </div><!--end .col -->
                        </div><!--end .row -->
                    {!! Form::close() !!}
                </div><!--end .col -->

            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
@endsection