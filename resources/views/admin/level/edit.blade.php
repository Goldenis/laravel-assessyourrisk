@extends('admin.layouts.main')

@section('content')

    <section>

        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Conditions</li>
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
                <a class="btn btn-accent" href="{{route('admin.resultlevelcondition.level',\Request::segment(3))}}"> <i class="fa fa-long-arrow-left"></i> back</a>
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

                        {!! Form::model($condition,['route' => ['admin.resultlevelcondition.update', $condition->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'form-horizontal']) !!}

                        @include('admin.level.partials.form')

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
            function loadSelect2(){
                $('select').select2({
                    escapeMarkup: function (markup) { return markup; } // let our custom formatter work
                });
            }
            loadSelect2();
            $('select').removeAttr( "disabled" );

            //$('#questions').change(function(){

                var id = $('#questions').val();

                $.get("{{ URL::to('/admin/questionoption/loadselect') }}/"+id,{},function(result){
                    $('#options').html(result);
                    $('select').removeAttr( "disabled" );
                    loadSelect2();
                });
           // });
        });
    </script>

@endsection