<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionOpcion extends Model
{
    protected $table = 'question_opcions';
    protected $fillable = ['question_id','text','value', 'button_text','indelible', 'order','active'];

    public function question()
    {
        return $this->belongsTo('App\Models\Question','question_id','id');
    }

    public function resultLevelCondition()
    {
        return $this->hasMany('App\Models\ResultLevelCondition','question_option_id','id');
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer','question_option_id','id');
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
     * mostrar activos
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
