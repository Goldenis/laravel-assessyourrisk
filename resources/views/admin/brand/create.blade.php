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

            <div class="col-lg-3 col-md-4">
                <article class="margin-bottom-xxl">
                    <p>

                    </p>
                </article>
                <a class="btn btn-accent" href="{{route('admin.brand.index')}}"> <i class="fa fa-long-arrow-left"></i> back to brands</a>
            </div><!--end .col -->

            <div class="col-md-9">
                <div class="card card-underline">
                    <div class="card-head"><header>Create a brand </header>
                        <div class="tools">
                            <div class="btn-group">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        {!! Form::open(['route' => 'admin.brand.store', 'method' => 'POST', 'files'=>'true',  'role' => 'form', 'class' => 'form-horizontal']) !!}

                        @include('admin.brand.partials.form')

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

@endsection