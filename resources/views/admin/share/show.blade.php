@extends('admin.layouts.main')

@section('content')

    <section>

        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Share email</li>
            </ol>
        </div>


        <div class="row">

            <!-- BEGIN INBOX NAV -->
            <div class="col-sm-4 col-md-3 col-lg-2 hidden-xs">

                <ul class="nav nav-pills nav-stacked nav-icon">
                @foreach($shares as $share)

                    <li @if(Request::segment(3)==$share->id) class="active" @endif>
                        <a href="{{route('admin.share.show',$share->id)}}">{{$share->title}}</a>
                    </li>
                @endforeach
                </ul>
            </div><!--end . -->
            <!-- END INBOX NAV -->

            <!-- BEGIN MAIL COMPOSE -->
            <div class="col-sm-8 col-md-9 col-lg-10">

                <div class="card card-underline">
                    <div class="card-head"><header>{{ $sharedetail->title }}</header>
                        <div class="tools">
                            <div class="btn-group">
                                <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                                <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        {!! Form::open(['route' => ['admin.share.update',$sharedetail->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                            <div class="modal-body">

                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label for="email1" class="control-label">Title</label>
                                    </div>
                                    <div class="col-sm-10">
                                        {!! Form::text('title',$sharedetail->title,["class"=>"form-control"]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label for="email1" class="control-label">Subject</label>
                                    </div>
                                    <div class="col-sm-10">
                                        {!! Form::text('subject',$sharedetail->subject,["class"=>"form-control"]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label for="email1" class="control-label">Body</label>
                                    </div>
                                    <div class="col-sm-10">
                                        {!! Form::textarea('body',$sharedetail->body,["class"=>"form-control"]) !!}
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                {!! Form::submit('Update',["class"=>"btn btn-primary"]) !!}
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>







            </div><!--end .col -->
            <!-- END MAIL COMPOSE -->


            <!-- BEGIN FORM MODAL MARKUP -->
            <div class="modal fade " id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="formModalLabel">Add Item</h4>
                        </div>

                        <form class="form-horizontal" role="form">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label for="email1" class="control-label">Item</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <textarea  name="education" id="ckeditor" cols="30" rows="10"></textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Create</button>
                            </div>
                        </form>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- END FORM MODAL MARKUP -->



        </div>
    </section>


@endsection

@section('script')

    <script>

    </script>
@endsection