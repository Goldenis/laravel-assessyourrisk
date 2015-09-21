<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = ['quiz_id','question_id','question_option_id'];

    public function question()
    {
        return $this->belongsTo('App\Models\Question','question_id','id');
    }

    public function questionoption()
    {
        return $this->belongsTo('App\Models\QuestionOpcion','question_option_id','id');
    }

}
