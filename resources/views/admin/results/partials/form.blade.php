<div class="modal-body">

    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('subtitle', 'Subtitle', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::text('subtitle', null, ['class' => 'form-control', 'require']) !!}
        </div>
    </div>

    <div class="form-group">
            <div class="col-sm-2">
                {!! Form::label('title', 'Title', ['class'=>'control-label']) !!}
            </div>
            <div class="col-sm-10">
                {!! Form::text('title', null, ['class' => 'form-control', 'require']) !!}
            </div>
        </div>

    <div class="form-group">
            <div class="col-sm-2">
                {!! Form::label('content', 'Content', ['class'=>'control-label']) !!}
            </div>
            <div class="col-sm-10">
                {!! Form::textarea('content', null, ['class' => 'form-control', 'require', 'id' => 'textarea']) !!}
            </div>
        </div>

     <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('result_level_id', 'Level', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::select("result_level_id", $result_level, null, ["class" => "form-control"]) !!}
        </div>
    </div>

        <div class="form-group">
            <div class="col-sm-2">
                {!! Form::label('result_type_id', 'Type', ['class'=>'control-label']) !!}
            </div>
            <div class="col-sm-10">
                {!! Form::select("result_type_id", $result_type, null, ["class" => "form-control"]) !!}
            </div>
        </div>




    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('question_opcion_id', 'Option', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::select('question_opcion_id', $question_options, null, ['id'=>'question_options','required', 'placeholder'=>'Select a option','class'=>'form-control']) !!}
        </div>
    </div>




</div>