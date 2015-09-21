<div class="modal-body">

    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('text', 'Content', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::textarea('text', null, ['class' => 'form-control', 'require', 'id' => 'text']) !!}
        </div>
    </div>



    <div class="form-group" id="button_row">
        <div class="col-sm-2">
            {!! Form::label('button_text', 'Button Text', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::text('button_text', null, ['class' => 'form-control', 'id' => 'button_text']) !!}
        </div>
    </div>

    <div class="form-group" id="button_row">
        <div class="col-sm-2">
            {!! Form::label('value', 'Value', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::text('value', null, ['class' => 'form-control', 'id' => 'value']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 col-md-offset-2">
            <div class="checkbox checkbox-styled">
                <label>
                    {!! Form::checkbox('active', '1'); !!}
                    <span>Active</span>
                </label>
            </div>
        </div>

        <div class="col-md-3"  id="unique_row">
            <div class="checkbox checkbox-styled">
                <label>
                    {!! Form::checkbox('unique', '1') !!}
                    <span>Unique</span>
                </label>
            </div>
        </div>


    </div>
</div>