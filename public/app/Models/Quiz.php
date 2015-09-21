<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';

    public function answers()
    {
        return $this->hasMany('App\Models\Answer','quiz_id','id');
    }



}
