<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    protected $fillable = ['question_id','result_type_id','result_level_id','condition','value'];

    public function resultLevel()
    {
        return $this->belongsTo('App\Models\Result_level','result_level_id','id');
    }

    public function resultType()
    {
        return $this->belongsTo('App\Models\Result_type','result_type_id','id');
    }

}
