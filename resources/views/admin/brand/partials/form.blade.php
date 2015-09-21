<div class="modal-body">

    <div class="form-group" id="button_row">
        <div class="col-sm-2">
            {!! Form::label('title', 'Brand', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('logo', 'Logo', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::file('logo', ['class' => 'form-control', 'require', 'id' => 'logo']) !!}
        </div>
    </div>

    <div class="form-group" id="button_row">
        <div class="col-sm-2">
            {!! Form::label('url', 'URL', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::text('url', null, ['class' => 'form-control', 'id' => 'url']) !!}
        </div>
    </div>


</div>