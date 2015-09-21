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
                <a href="{{route('admin.question.create')}}" class="btn ink-reaction btn-floating-action btn-primary" href="#" data-placement="left" data-original-title="Create Question">
                    <i class="md md-add"></i>
                </a>
            </div>
            <div class="col-lg-3 col-md-4">
                <article class="margin-bottom-xxl">
                    <p>
                        Use the sortable list in combination with the styled checkboxes to create the perfect todo list.
                    </p>
                </article>
            </div><!--end .col -->

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body no-padding">
                        <ul class="list" id="education_list">
                            @foreach($questions as $question)
                            <li class="@if($question->active!=1) text-red @endif tile" data-id="{{$question->id}}" id="{{$question->id}}">
                                <div class="checkbox checkbox-styled tile-text">

                                    <label>
                                        <span>
                                           {!!$question->text!!}
                                            <small>
                                                <b>Type:</b> {{$question->questionType->name}}
                                                 / <b>Active: </b> @if($question->active) yes @else no @endif
                                                / <b>Email: </b> @if($question->email) yes @else no @endif
                                                / <b>Indelible: </b> @if($question->indelible) yes @else no @endif
                                            </small>
                                        </span>
                                    </label>
                                </div>

                                <a href="{{route('admin.result.showByQuestion',$question->id)}}" class="btn btn-flat ink-reaction btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Results">
                                    <i class="fa fa-check-square-o"></i>
                                </a>

                                <a href="{{route('admin.question.show',$question->id)}}" class="btn btn-flat ink-reaction btn-default"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Options">
                                    <i class="fa fa-list"></i>
                                </a>
                                <a href="{{route('admin.question.edit', $question->id)}}" class="btn btn-flat ink-reaction btn-default"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#!" class="btn-delete btn btn-flat ink-reaction btn-default"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>

                            </li>
                            @endforeach
                        </ul>
                    </div><!--end .card-body -->
                </div><!--end .card -->

            </div><!--end .col -->
        </div><!--end .row -->

    </section>

    {!! Form::open(['route'=>['admin.question.destroy',':QUESTION_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
    {!! Form::close() !!}

@endsection

@section('script')
    <script src="{{asset("admin/assets/js/core/demo/DemoUILists.js")}}"></script>

    <script>
        $(document).ready(function(){

            $('.btn-delete').click(function(e){

                if(confirm('Are you sure?')) {

                    e.preventDefault();

                    var row = $(this).parents('li');
                    var id = row.data('id');
                    var form = $('#form-delete');
                    var url = form.attr('action').replace(':QUESTION_ID', id);
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
                    $.get('{{route('admin.question.updateOrder')}}',{data:data},function(result){
                        //alert(result.mensaje);
                        toastr.info('The order has been changed');
                    });
                }
            });
        });

    </script>
@endsection