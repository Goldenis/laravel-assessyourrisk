<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    protected $fillable = ['education_category_id','title','text','order','active'];


    public function educationcategories()
    {
        return $this->belongsTo('App\Models\EducationCategory','education_category_id','id');
    }

    /**
     * mostrar activos
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
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

