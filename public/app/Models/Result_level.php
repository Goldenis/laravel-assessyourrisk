<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result_level extends Model
{
    protected $table = 'result_levels';

    public function result()
    {
        return $this->hasMany('App\Models\Result','result_level_id','id');
    }

    public function resultLevelCondition()
    {
        return $this->hasMany('App\Models\ResultLevelCondition','result_level_id','id');
    }

}
