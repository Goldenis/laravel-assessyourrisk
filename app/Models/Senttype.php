<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Senttype extends Model
{
    protected $table = 'sent_types';

    public function sent()
    {
        return $this->hasMany('App\Models\Sent','sent_type_id','id');
    }



}
