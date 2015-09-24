@extends('admin.layouts.main')

@section('content')

    <section>

        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Education</li>
            </ol>
        </div>


        <div class="row">

            <!-- BEGIN INBOX NAV -->
            <div class="col-sm-4 col-md-3 col-lg-2 hidden-xs">
                <ul class="nav nav-pills nav-stacked nav-icon">
                    @foreach($educationcategories as $educationcategory)
                    <li @if(Request::segment(3)==$educationcategory->id) class="active" @endif>
                        <a href="{{route('admin.education.show',$educationcategory->id)}}">{{$educationcategory->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div><!--end . -->
            <!-- END INBOX NAV -->

            <!-- BEGIN MAIL COMPOSE -->
            <div class="col-sm-8 col-md-9 col-lg-10">

                Pleged  <span class="badge">{{$category->pleged->count()}}</span>

             

                {{--ITEMS--}}
                @include('admin.partials.message')
                <div class="card card-underline">
                    <div class="card-head"><header>Items </header>
                        <div class="tools">
                            <div class="btn-group">
                                <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                                <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                                <a href="{{route('admin.education.create_item', $category->id)}}" type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary" ><i class="md md-add"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <ul class="list" id="education_list">

                            @foreach($educations as $education)
                                <li class="@if($education->active!=1) text-red @endif tile" data-id="{{$education->id}}" id="{{$education->id}}">
                                    <div class="checkbox checkbox-styled tile-text">
                                        <label>
                                            <span>
                                               <b>{{$education->title}}</b><br>
                                                {!!$education->text!!}
                                            </span>
                                            <small><b>Video name:</b> {{ $education->video }}</small>
                                        </label>
                                    </div>

                                    <a href="{{route('admin.education.edit',$education->id)}}" class="btn btn-flat ink-reaction btn-default"   data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-flat ink-reaction btn-default"   data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                        <i class="btn-delete fa fa-trash"></i>

                                    </a>

                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div><!--end .col -->
            <!-- END MAIL COMPOSE -->

            {!! Form::open(['route'=>['admin.education.destroy',':EDUCATION_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
            {!! Form::close() !!}

        </div>
    </section>


@endsection

@section('script')
    <script src="{{asset("admin/assets/js/core/demo/DemoUILists.js")}}"></script>
    <script src="http://cdn.ckeditor.com/4.5.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'plegedtext' );
        CKEDITOR.replace( 'firsttext' );

    </script>
    <script>
        $(document).ready(function(){



            $('#formModal').on('hidden.bs.modal', function (e) {
               //$('#education_list').html('<p>lista</p>');
               $.ajax({
                    method:'get',
                    url:'education_list_ajax'
               }).done(function(data){
                    $('#education_list').html(data);
               });

            });

            $('#send_form').click(function(){

                var education_title = $('#education_title').val();
                var education_text = $('#education_text').html();
                var active = $('#active').val();
                var token =  $('#education_form').find( 'input[name=_token]' ).val();

               $.post('{{URL::to('admin/education')}}',
                    {
                        education_title:education_title,

                        active:active,
                        '_token': token
                    },
                    function(){
                        alert('salio');
                    });

            });

            $('.btn-delete').click(function(e){

                if(confirm('Are you sure?')) {

                    e.preventDefault();

                    var row = $(this).parents('li');
                    var id = row.data('id');
                    var form = $('#form-delete');
                    var url = form.attr('action').replace(':EDUCATION_ID', id);
                    var data = form.serialize();

                    row.fadeOut();

                    $.post(url, data, function (result) {

                    }).fail(function () {
                        alert("Don't has been delete");
                        row.show();
                    });
                }

            });


            $('#education_list').sortable({
                axis: 'y',
                opacity: 0.8,
                update: function(event,ui){
                    var data = $(this).sortable('toArray');

                    $.get('{{route('admin.education.updateOrder',$category->id)}}',{data:data},function(result){
                        //alert(result.mensaje);
                        toastr.info('The order has been changed');
                    });
                }

            });

        });

    </script>
@endsection