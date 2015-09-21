<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result_type extends Model
{
    protected $table = 'result_types';

    public function result()
    {
        return $this->hasMany('App\Models\Result','result_type_id','id');
    }


}
