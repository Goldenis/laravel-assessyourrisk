@extends('admin.layouts.main')

@section('content')

    <section>

        <div class="section-body">

            <!-- BEGIN INTRO -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-primary">By Question</h1>
                </div><!--end .col -->
                <div class="col-lg-8">
                    <article class="margin-bottom-xxl">
                        <p class="lead">
                        </p>
                    </article>
                </div><!--end .col -->
            </div><!--end .row -->
            <!-- END INTRO -->

            <!-- BEGIN RESPONSIVE TABLE 1 -->
            <div class="row">

                <div class="col-md-8">

                </div><!--end .col -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table no-margin table-hover">
                                    <thead>
                                    <tr>

                                        <th>Session</th>
                                        <th>Quiz</th>
                                        <th>Question id</th>
                                        <th>Question</th>
                                        <th>Question order</th>

                                        <th>Answer id</th>
                                        <th>Answer</th>
                                        <th>Domain</th>
                                        <th>Create</th>
                                        <th>Update</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($metricanswers as $metricanswer)
                                    <tr>
                                        <td>{{$metricanswer->session_id}}</td>
                                        <td>{{$metricanswer->quiz_id}}</td>
                                        <td>{{$metricanswer->question_id}}</td>
                                        <td>{!!str_limit($metricanswer->question->text,60)!!}</td>
                                        <td>{{$metricanswer->question_order}}</td>

                                        <td>{{$metricanswer->answer_id}}</td>
                                        <td>{!!str_limit($metricanswer->answer_text,60)!!}</td>
                                        <td>{{$metricanswer->domain}}</td>
                                        <td>{{$metricanswer->created_at}}</td>
                                        <td>{{$metricanswer->updated_at}}</td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>







                                {!! $metricanswers->appends(\Input::except('page'))->setPath('')->render() !!}




                            </div><!--end .table-responsive -->
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </div><!--end .col -->
            </div><!--end .row -->
            <!-- END RESPONSIVE TABLE 1 -->



        </div>
    </section>


@endsection

@section('script')


    <script>
        $(document).ready(function(){





        });

    </script>
@endsection