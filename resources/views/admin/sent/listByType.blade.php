@extends('admin.layouts.main')

@section('content')

    <section>

        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Sent {{$name}}</li>
            </ol>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Quiz Id</th>
                                <th>Fecha</th>
                                <th class="text-right">Acciones</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sent as $send)
                            <tr  data-id="{{$send->id}}">
                                <td>1</td>
                                <td>{{$send->name}}</td>
                                <td>{{$send->email}}</td>
                                <td>{{$send->quiz_id}}</td>
                                <td>{{$send->created_at}}</td>
                                <td class="text-right">
                                   {{-- <button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit row"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Copy row"><i class="fa fa-copy"></i></button>--}}
                                    <button type="button" class="btn-delete btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete row"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div><!--end .table-responsive -->
                </div><!--end .card-body -->

            </div><!--end .card -->

            {!! Form::open(['route'=>['admin.sent.destroy',':SENT_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

            {!! Form::close() !!}

            <nav>

                {!! $sent->setPath('')->render() !!}

            </nav>
        </div>

    </section>


@endsection

@section('script')
    <script src="{{asset("admin/assets/js/core/demo/DemoUILists.js")}}"></script>
    <script>
        $(document).ready(function(){
            $('.btn-delete').click(function(e){

               if(confirm('Are you sure?')) {

                   e.preventDefault();

                   var row = $(this).parents('tr');
                   var id = row.data('id');
                   var form = $('#form-delete');
                   var url = form.attr('action').replace(':SENT_ID', id);
                   var data = form.serialize();

                   row.fadeOut();

                   $.post(url, data, function (result) {

                   }).fail(function () {
                       alert("Don't has been delete");
                       row.show();
                   });
               }

            });
        });

    </script>
@endsection