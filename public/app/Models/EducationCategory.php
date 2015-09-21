<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationCategory extends Model
{
    protected $table = 'education_categories';

    public function educations()
    {
        return $this->hasMany('App\Models\Education','education_category_id','id');
    }

    public function pleged()
    {
        return $this->hasMany('App\Models\Pledge','education_category_id','id');
    }



    /**
     * ordena ascendente
     * @param $query
     * @return mixed
     */
    public function scopeOrderAsc($query)
    {
        return $query->orderBy('order','asc');
    }

    /**
     * ordena descendente
     * @param $query
     * @return mixed
     */
    public function scopeOrderDesc($query)
    {
        return $query->orderBy('order','desc');
    }

}
