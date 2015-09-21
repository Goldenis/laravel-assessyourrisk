<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metric_answer extends Model
{
    protected $table = 'metric_answers';
    protected $fillable = ['session_id','question_id','question_text','question_order','domain','answer_id','answer_text'];

    public function question()
    {
        return $this->belongsTo('App\Models\Question','question_id','id');
    }

    public function getanswer()
    {
        return $this->belongsTo('App\Models\Answer','answer_id','id');
    }


}
