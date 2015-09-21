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
                <h4>.</h4>
            </div><!--end .col -->
            <div class="section-floating-action-row">
                <a class="btn ink-reaction btn-floating-action btn-accent" href="#" data-toggle="modal" data-target="#formModal" data-placement="left" data-original-title="Create Question">
                    <i class="md md-add"></i>
                </a>
            </div>

            <div class="col-lg-3 col-md-4">
                <article class="margin-bottom-xxl">
                    <h2>
                        Have you ever been diagnosed with either of the following?
                    </h2>
                    <a class="btn btn-accent" href="{{route('admin.question.index')}}"> <i class="fa fa-long-arrow-left"></i> back</a>
                </article>
            </div><!--end .col -->

            <div class="col-lg-offset-1 col-md-8">
                <div class="card">
                    <div class="card-body no-padding">
                        <ul class="list" data-sortable="true">

                            <li class="tile">
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <span>
                                            Breast cancer
                                            <small>
                                                Value: -1
                                            </small>
                                        </span>
                                    </label>
                                </div>
                                                                <a class="btn btn-flat ink-reaction btn-default">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-flat ink-reaction btn-default">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </li>

                            <li class="tile">
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <span>
                                            Ovarian cancer (epithelial; non-germ cell) or Fallopian tube cancer
                                            <small>
                                                Value: -1
                                            </small>
                                        </span>
                                    </label>
                                </div>
                                                                <a class="btn btn-flat ink-reaction btn-default">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-flat ink-reaction btn-default">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </li>

                            <li class="tile">
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <span>
                                            Both
                                            <small>
                                                Value: -1
                                            </small>
                                        </span>
                                    </label>
                                </div>
                                                                <a class="btn btn-flat ink-reaction btn-default">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-flat ink-reaction btn-default">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </li>

                            <li class="tile">
                                <div class="checkbox checkbox-styled tile-text">
                                    <label>
                                        <span>
                                            Neither
                                            <small>
                                                Value: 0
                                            </small>
                                        </span>
                                    </label>
                                </div>
                                                                <a class="btn btn-flat ink-reaction btn-default">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-flat ink-reaction btn-default">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </li>



                        </ul>
                    </div><!--end .card-body -->
                </div><!--end .card -->
                <em class="text-caption">Todo list</em>
            </div><!--end .col -->
        </div><!--end .row -->

    </section>



    <!-- BEGIN FORM MODAL MARKUP -->
    <div class="modal fade " id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="formModalLabel">Add Question</h4>
                </div>

                <form class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="email1" class="control-label">Question</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea  name="questionname" id="ckeditor" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="password1" class="control-label">Type</label>
                            </div>
                            <div class="col-sm-10">
                                <select id="select1" name="select1" class="form-control">
                                    <option value="">&nbsp;</option>
                                    <option value="30">Radio Button</option>
                                    <option value="40">Check Box</option>
                                    <option value="50">Button</option>

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Login</button>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END FORM MODAL MARKUP -->



@endsection

@section('script')
    <script src="{{asset("admin/assets/js/core/demo/DemoUILists.js")}}"></script>
    <script src="//cdn.ckeditor.com/4.5.2/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'questionname' );
    </script>
@endsection