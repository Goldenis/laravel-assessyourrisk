@extends('admin.layouts.main')

@section('content')

    <section>

        <div class="section-body">

            <!-- BEGIN INTRO -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-primary">Metric Visit</h1>
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
                                        <th>Browser</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Device</th>
                                        <th>ip</th>
                                        <th>Language</th>
                                        <th>OS</th>
                                        <th>PID</th>
                                        <th>Screen</th>
                                        <th>Create</th>
                                        <th>Update</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($metrics as $metric)
                                    <tr>
                                        <td>{{$metric->session_id}}</td>
                                        <td>{{$metric->browser}}</td>
                                        <td>{{$metric->city}}</td>
                                        <td>{{$metric->state}}</td>
                                        <td>{{$metric->country}}</td>
                                        <td>{{$metric->device}}</td>
                                        <td>{{$metric->ip}}</td>
                                        <td>{{$metric->language}}</td>
                                        <td>{{$metric->os}}</td>
                                        <td>{{$metric->pid}}</td>
                                        <td>{{$metric->screen}}</td>
                                        <td>{{$metric->created_at}}</td>
                                        <td>{{$metric->updated_at}}</td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>







                                {!! $metrics->appends(\Input::except('page'))->setPath('')->render() !!}




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