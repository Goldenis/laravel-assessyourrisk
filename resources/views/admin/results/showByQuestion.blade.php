@extends('admin.layouts.main')

@section('content')

    <section>

        <div class="section-header">
            <ol class="breadcrumb">
                <li>Questions</li>
                <li class="active">Resultados</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @include('admin.partials.message')
                <h4>&nbsp;</h4>
            </div><!--end .col -->
            <div class="section-floating-action-row">
                <a href="{{route('admin.result.createByQuestion',$question->id)}}" class="btn ink-reaction btn-floating-action btn-accent" data-placement="left" data-original-title="Create Question">
                    <i class="md md-add"></i>
                </a>
            </div>

            <div class="col-lg-3 col-md-4">
                <article class="margin-bottom-xxl">
                    <h2>{!! $question->text !!}</h2>
                    <p>({{$question->questionType->name}}-{{$question->question_type_id}})</p>
                    <a class="btn btn-accent" href="{{route('admin.question.index')}}"> <i class="fa fa-long-arrow-left"></i> back to questions</a>
                </article>
            </div><!--end .col -->

            <div class="col-lg-offset-1 col-md-8">

            @foreach($results as $result)
                <div class="card card-underline">
                    <div class="card-head"><header>{{$result->resultType->name}}</header></div>
                    <div class="card-body no-padding">

                        <ul class="list" id="education_list">

                            <?php $datos = \App\Models\Result::where('result_type_id',$result->resultType->id)
                                                          ->where('question_id',$result->question_id)
                                                          ->orderBY('result_level_id')
                                                          ->get()  ?>

                            {{dd($datos)}}

                                  @foreach($datos as $dato)

                                    <li class="tile" data-id="{{$dato->id}}" id="{{$dato->id}}" style="border-bottom: 1px solid #eee">
                                        <div class="checkbox checkbox-styled tile-text">
                                            <label>
                                                <span>
                                                <small>{{$dato->resultLevel->name}}</small>
                                                   <h5><u>{!! $dato->subtitle !!}- {{$dato->id}}</u> </h5>
                                                    <h4>{!! $dato->title !!}</h4>
                                                    <p>{!! $dato->content !!}</p>
                                                <small><b>Type:</b> ({{$dato->resultType->name}}) / <b>Option:</b> {{$dato->result}}</small>
                                                </span>
                                            </label>
                                        </div>
                                        <a href="{{route('admin.result.edit', $dato->id)."?question=".$result->question_id}} " class="btn btn-flat ink-reaction btn-default">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a class="btn-delete btn btn-flat ink-reaction btn-default">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </li>
                                @endforeach

                        </ul>
                    </div><!--end .card-body -->
                </div><!--end .card -->
                @endforeach

            </div><!--end .col -->
        </div><!--end .row -->
        {!! Form::open(['route'=>['admin.result.destroy',':RESULT_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
        {!! Form::close() !!}

    </section>


@endsection

@section('script')


    <script>
        $(document).ready(function(){


            $('.btn-delete').click(function(e){

                if(confirm('Are you sure?')) {

                    e.preventDefault();

                    var row = $(this).parents('li');
                    var id = row.data('id');
                    var form = $('#form-delete');
                    var url = form.attr('action').replace(':RESULT_ID', id);
                    var data = form.serialize();

                    row.fadeOut();

                    $.post(url, data, function (result) {

                    }).fail(function () {
                        alert("Don't has been delete");
                        row.fadeIn();
                    });
                }

            });




        });

    </script>
@endsection