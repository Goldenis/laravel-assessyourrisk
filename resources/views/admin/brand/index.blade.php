@extends('admin.layouts.main')

@section('content')

    <section>

        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Brands</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h4>&nbsp;</h4>
            </div><!--end .col -->
            <div class="section-floating-action-row">
                <a href="{{route('admin.brand.create')}}" class="btn ink-reaction btn-floating-action btn-primary" href="#" data-placement="left" data-original-title="Create Question">
                    <i class="md md-add"></i>
                </a>
            </div>

        @foreach($brands as $brand)
            <!-- BEGIN BRANDIN -->
            <div class="brand-item col-xs-6 col-sm-4 col-md-3" data-id="{{$brand->id}}">

                <div class="card card-underline">
                    <div class="card-head"><header>{{$brand->title}}</header>
                        <div class="tools">
                            <div class="btn-group">
                                <a href="{{route('admin.brand.edit',$brand->id)}}" class="btn btn-icon-toggle"><i class="md md-edit"></i></a>
                                <a href="#!" class="btn-delete btn btn-icon-toggle"><i class="md md-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="col-md-8 col-md-offset-2 brand-logo">
                            <img class="img-responsive" src="{{asset('img/'.$brand->logo)}}" alt=""/>
                        </div>
                        <div class="col-md-12">
                            <p>{{$brand->url}}</p>
                        </div>
                    </div>
                </div>

            </div>
                <!--end .col -->
            <!-- END BRANDIN -->
        @endforeach





        </div>
    </section>
    {!! Form::open(['route'=>['admin.brand.destroy',':BRAND_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
    {!! Form::close() !!}

@endsection

@section('script')


    <script>
        $(document).ready(function(){


            $('.btn-delete').click(function(e){

                if(confirm('Are you sure?')) {

                    e.preventDefault();

                    var row = $(this).parents('.brand-item');
                    var id = row.data('id');
                    var form = $('#form-delete');
                    var url = form.attr('action').replace(':BRAND_ID', id);
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

                    $.get('{{route('admin.questionoption.updateOrder')}}',{data:data},function(result){
                        //alert(result.mensaje);
                        toastr.info('The order has been changed');
                    });
                }

            });

        });

    </script>
@endsection

