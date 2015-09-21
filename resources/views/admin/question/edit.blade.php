@extends('admin.layouts.main')

@section('content')

    <section>

        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Questions</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h4>Todo Lists</h4>
            </div><!--end .col -->

            <div class="col-lg-3 col-md-4">
                <article class="margin-bottom-xxl">
                    <p>
                        Use the sortable list in combination with the styled checkboxes to create the perfect todo list.
                    </p>
                </article>
                <a class="btn btn-accent" href="{{route('admin.question.index')}}"> <i class="fa fa-long-arrow-left"></i> back</a>
            </div><!--end .col -->

            <div class="col-md-9">
                <div class="card card-underline">
                    <div class="card-head"><header>Edit a Question</header>
                        <div class="tools">
                            <div class="btn-group">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        {!!Form::open(['route'=>['admin.question.deleteimg',$question->id],'id'=>'form-img', 'method' => 'POST', 'role' => 'form'])!!}
                        {!!Form::close()!!}

                        {!! Form::model($question,['route' => ['admin.question.update', $question->id], 'method' => 'PUT', 'files'=>'true', 'role' => 'form', 'class' => 'form-horizontal']) !!}


                        @if($question->gif!=null || $question->gif!='')
                        <div class="form-group gif-img">
                            <div class="col-sm-2">
                                Current Gif
                            </div>
                            <div class="col-sm-10">
                                <img src="{{asset('img/')}}/{{$question->gif}}" alt="" width="50px;"/>
                                <a id="delete-img" class="btn btn-xs btn-danger">delete image </a>
                            </div>
                        </div>
                        @endif


                        @include('admin.question.partials.form')

                        <div class="modal-footer">
                            {!! Form::submit('Update',["class"=>"btn btn-primary", "id"=>"send_form"]) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>

            </div><!--end .col -->
        </div><!--end .row -->

    </section>






@endsection

@section('script')
    <script src="{{asset("admin/assets/js/core/demo/DemoUILists.js")}}"></script>
    <script src="http://cdn.ckeditor.com/4.5.2/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('text');
        CKEDITOR.replace('text_colum');
    </script>
    <script>

        $(document).ready(function(){
            $('#question_type_id').change(function(){
                if($(this).val()==3)
                {
                     $('#button_row').fadeOut();
                }
                else
                {
                    $('#button_row').fadeIn();
                }
            });


            if($('input[name=email]').is(":checked")){
                $('#email-subject').slideToggle('slow');
                $('#email-body').slideToggle('slow');
            }

            $('input[name=email]').change(function(){
                $('#email-subject').slideToggle('slow');
                $('#email-body').slideToggle('slow');
            });



            $('#delete-img').click(function(e){
                e.preventDefault();

                var form = $('#form-img');
                var url = form.attr('action');
                var data = form.serialize();

                $('.gif-img').fadeOut();

               $.post(url, data, function (result) {

                }).fail(function () {
                    alert("Don't has been delete");
                   $('.gif-img').show();
                });

            });

        });
    </script>

@endsection