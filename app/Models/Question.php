<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = ['question_type_id','text','text_colum', 'button_text','email','slug','indelible', 'order','active'];

    public function setPathAttribute($path)
    {
        $this->attributes['path'] = '10'.$path->getClienOriginalName();
        $name = '10'.$path->getClienOriginalName();
        \Storage::disk('local')->put($name, \File::get($path));
    }

    public function questionOption()
    {
        return $this->hasMany('App\Models\QuestionOpcion','question_id','id');
    }

    public function ResultLevelCondition()
    {
        return $this->hasMany('App\Models\ResultLevelCondition','question_id','id');
    }

    public function questionType()
    {
        return $this->belongsTo('App\Models\QuestionType','question_type_id','id');
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
