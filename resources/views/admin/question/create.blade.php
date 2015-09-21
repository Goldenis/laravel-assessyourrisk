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
            <div class="section-floating-action-row">
                <a href="{{route('admin.question.create')}}" class="btn ink-reaction btn-floating-action btn-primary" data-placement="left" data-original-title="Create Question">
                    <i class="md md-add"></i>
                </a>
            </div>
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
                    <div class="card-head"><header>Create a Question </header>
                        <div class="tools">
                            <div class="btn-group">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        {!! Form::open(['route' => 'admin.question.store', 'method' => 'POST', 'files'=>'true', 'role' => 'form', 'class' => 'form-horizontal']) !!}

                        @include('admin.question.partials.form')

                        <div class="modal-footer">
                            {!! Form::submit('Create',["class"=>"btn btn-primary", "id"=>"send_form"]) !!}
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



            $('input[name=email]').change(function(){
               $('#email-subject').slideToggle('slow');
               $('#email-body').slideToggle('slow');
            });


        });
    </script>

@endsection