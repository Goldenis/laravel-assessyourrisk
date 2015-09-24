<div class="modal-body">

    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('question_id', 'Question', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::select('question_id', $questions, null, ['placeholder'=>'Select a question','class'=>'form-control','id'=>'questions']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('question_option_id', 'Option', ['class'=>'control-label']) !!}
        </div>
        <div class="col-sm-10" id="options">
            {!! Form::select('question_option_id', ['select'=>''], null, ['id'=>'question_options','required'=>'required', 'disabled','placeholder'=>'Select a option','class'=>'form-control']) !!}
        </div>
    </div>

    {!! Form::hidden('active','1') !!}
    {!! Form::hidden('result_level_id' , $level_id) !!}

</div>