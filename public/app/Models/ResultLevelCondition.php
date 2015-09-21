<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultLevelCondition extends Model
{
    protected $table = 'result_level_conditions';

    protected $fillable = array('question_id', 'question_option_id','active', 'result_level_id');

    public function resultLevel()
    {
        return $this->belongsTo('App\Models\Result_level','result_level_id','id');
    }

    public function question()
    {
        return $this->belongsTo('App\Models\Question','question_id','id');
    }

    public function questionOption()
    {
        return $this->belongsTo('App\Models\QuestionOpcion','question_option_id','id');
    }
}
