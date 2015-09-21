<div class="modal-body">
    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('title', 'Title', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::text('title',null,['class'=>'form-control', 'require', 'id'=>'title']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('video', 'Video Name (only name)', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::text('video', null, ['class'=>'form-control', 'id'=>'video', 'placeholder'=>'example=alcohol']) !!}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('text', 'Content', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::textarea('text',null,['class'=>'form-control', 'require', 'id'=>'text']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
            <div class="checkbox checkbox-styled">
                <label>
                    {!! Form::checkbox('active', '1'); !!}
                    <span>Active</span>
                </label>
            </div>
        </div>
    </div>
</div>