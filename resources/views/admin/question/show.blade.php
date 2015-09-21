@extends('admin.layouts.main')

@section('content')

    <section>

        <div class="section-header">
            <ol class="breadcrumb">
                <li>Questions</li>
                <li class="active">Options</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h4>&nbsp;</h4>
            </div><!--end .col -->
            <div class="section-floating-action-row">
                <a href="{{route('admin.questionoption.createOpcionQuestion',$question->id)}}" class="btn ink-reaction btn-floating-action btn-accent" data-placement="left" data-original-title="Create Question">
                    <i class="md md-add"></i>
                </a>
            </div>

            <div class="col-lg-3 col-md-4">
                <article class="margin-bottom-xxl">
                    <h2>
                        {!! $question->text !!}
                    </h2>
                    <p>({{$question->questionType->name}}-{{$question->question_type_id}})</p>
                    <a class="btn btn-accent" href="{{route('admin.question.index')}}"> <i class="fa fa-long-arrow-left"></i> back to questions</a>
                </article>
            </div><!--end .col -->

            <div class="col-lg-offset-1 col-md-8">
                <div class="card">
                    <div class="card-body no-padding">

                        <ul class="list" id="education_list">

                            @foreach($questionoptions as $questionoption)

                                <li class="@if($questionoption->active!=1) text-red @endif tile" data-id="{{$questionoption->id}}" id="{{$questionoption->id}}">
                                    <div class="checkbox checkbox-styled tile-text">
                                        <label>
                                            <span>
                                                {!! $questionoption->text !!}
                                                @if($question->question_type_id==3)
                                                <p><b>Button text: </b>{{$questionoption->button_text}}</p>
                                                @endif
                                                <small>
                                                    <b>Value: </b> {{ $questionoption->value }}
                                                    /  <b>Active: </b> @if($questionoption->active==1) yes @else no @endif
                                                    @if($question->question_type_id==2)
                                                    /  <b>Unique: </b> @if($questionoption->unique==1) yes @else no @endif
                                                    @endif
                                                </small>
                                            </span>
                                        </label>
                                    </div>
                                    <a href="{{route('admin.questionoption.edit', $questionoption->id )}}" class="btn btn-flat ink-reaction btn-default"   data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn-delete btn btn-flat ink-reaction btn-default"   data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </li>

                            @endforeach

                        </ul>
                    </div><!--end .card-body -->
                </div><!--end .card -->
                <em class="text-caption">Todo list</em>
            </div><!--end .col -->
        </div><!--end .row -->
        {!! Form::open(['route'=>['admin.questionoption.destroy',':QUESTION_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
        {!! Form::close() !!}

    </section>


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
                    var data = form. alert(url);
                    row.fadeOut();

                    $.post(url, data, function (result) {


                    }).fail(function () {
                        alert("Don't has been delete");
                        row.fadeIn();
                    });
                }

            });


            $('#education_list').sortable({
                axis: 'y',
                opacity: 0.8,
                update: function(event,ui){
                    var data = $(this).sortable('toArray');

                   $.get('{{route('admin.questionoption.updateOrder')}}',{data:data},function(result){
                        //alert(result.mensaje);
                        toastr.info('The order has been changed');
                   });
                }

            });

        });

    </script>
@endsection