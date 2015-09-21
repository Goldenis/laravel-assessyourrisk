<div class="modal-body">

    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('gif', 'Content', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::file('gif', null, ['class' => 'form-control', 'id' => 'gif']) !!}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('text', 'Content', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::textarea('text', null, ['class' => 'form-control', 'require', 'id' => 'text']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('text_colum','Column Right', ['class' => 'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::textarea('text_colum', null, ['class' => 'form-control', 'id' => 'text_colum']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('question_type_id', 'Type', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::select("question_type_id", $questionstype, null, ["class" => "form-control", "required", "id" => "question_type_id"]) !!}
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

    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('slug', 'Slug', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) !!}
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

        <div class="col-md-3">
            <div class="checkbox checkbox-styled">
                <label>
                    {!! Form::checkbox('email', '1'); !!}
                    <span>Email</span>
                </label>
            </div>
        </div>

        <div class="col-md-3">
            <div class="checkbox checkbox-styled">
                <label>
                    {!! Form::checkbox('indelible', '1'); !!}
                    <span>Indelible</span>
                </label>
            </div>
        </div>
    </div>


    <div hidden class="form-group" id="email-subject">
        <div class="col-sm-2">
            {!! Form::label('email_subject', 'Subject', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::text('email_subject', null, ['class' => 'form-control', 'id' => 'email_subject']) !!}
        </div>
    </div>


    <div hidden class="form-group" id="email-body">
        <div class="col-sm-2">
            {!! Form::label('email_body','E-mail Body', ['class' => 'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::textarea('email_body', null, ['class' => 'form-control', 'id' => 'email_body']) !!}
        </div>
    </div>



</div>