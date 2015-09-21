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
                <h4>&nbsp;</h4>
            </div><!--end .col -->
            <div class="col-lg-3 col-md-4">
                <article class="margin-bottom-xxl">
                    <h2>
                        {!! $question->text !!}
                    </h2>
                    <p>({{$question->questionType->name}}-{{$question->question_type_id}})</p>
                    <a class="btn btn-accent" href="{{route('admin.result.showByQuestion',$question->id)}}"> <i class="fa fa-long-arrow-left"></i> back</a>
                </article>
            </div><!--end .col -->

            <div class="col-lg-offset-1 col-md-8">
                <div class="card card-underline">
                    <div class="card-head"><header>Create a option</header>
                        <div class="tools">
                            <div class="btn-group">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        {!! Form::open(['route' => ['admin.result.store'], 'method' => 'POST', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                            @include('admin.results.partials.form')
                        {!! Form::hidden('question_id',$question->id) !!}
                        <div class="modal-footer">
                            {!! Form::submit('Create',["class"=>"btn btn-primary"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div><!--end .col -->
        </div><!--end .row -->

    </section>

@endsection

@section('script')

    <script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('textarea');
        $('select').select2({
            escapeMarkup: function (markup) { return markup; } // let our custom formatter work
        });
    </script>

@endsection