<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    protected $table = 'question_types';

    public function question()
    {
        return $this->hasMany('App\Models\Question','question_type_id','id');
    }


}
