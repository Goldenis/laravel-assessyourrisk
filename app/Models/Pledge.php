<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pledge extends Model
{
    protected $table = 'pledges';

    public function educationCategory()
    {
        return $this->belongsTo('App\Models\EducationCategory','education_category_id','id');
    }
}
