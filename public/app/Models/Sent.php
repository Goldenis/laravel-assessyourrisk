<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sent extends Model
{
    protected $table = 'sent';

    public function senttype()
    {
        return $this->belongsTo('App\Models\Senttype','sent_type_id','id');
    }



}
