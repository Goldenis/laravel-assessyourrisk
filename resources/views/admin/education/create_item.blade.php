@extends('admin.layouts.main')

@section('content')

    <section>

        <div class="section-header">
            <ol class="breadcrumb">
                <li>Education</li>
                <li class="active"> {{$category->name}} </li>
            </ol>
        </div>


        <div class="row">

            <!-- BEGIN INBOX NAV -->
            <div class="col-sm-4 col-md-3 col-lg-2 hidden-xs">

                <ul class="nav nav-pills nav-stacked nav-icon">

<a class="btn btn-accent" href="{{route('admin.education.show', $category->id)}}"> <i class="fa fa-long-arrow-left"></i> back</a>


                </ul>
            </div><!--end . -->
            <!-- END INBOX NAV -->

            <!-- BEGIN MAIL COMPOSE -->
            <div class="col-sm-8 col-md-9 col-lg-10">

                <div class="card card-underline">
                    <div class="card-head"><header>Add Education </header>
                        <div class="tools">
                            <div class="btn-group">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                         {!! Form::open(['route' => 'admin.education.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                            @include('admin.education.partials.form')
                            {!! Form::hidden('education_category_id',$category->id) !!}
                            <div class="modal-footer">
                                {!! Form::submit('Create',["class"=>"btn btn-primary", "id"=>"send_form"]) !!}
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>


            </div><!--end .col -->
            <!-- END MAIL COMPOSE -->






        </div>
    </section>


@endsection

@section('script')
    <script src="{{asset("admin/assets/js/core/demo/DemoUILists.js")}}"></script>
    <script src="http://cdn.ckeditor.com/4.5.2/standard/ckeditor.js"></script>
    <script>

        CKEDITOR.replace( 'text' );
    </script>

@endsection