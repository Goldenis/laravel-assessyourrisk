<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Kyslik\ColumnSortable\Sortable;

class Metric extends Model
{

    protected $table = 'metrics';
    protected $fillable = ['session_id','bpref','browser','city','state','country','date','device','ip','language','os','pid','referrer','resolution','screen'];
   // protected $sortable = ['session_id','browser','city','state','country','date','device','ip','language','os','pid','referrer','resolution','screen','created_at',
    //    'updated_at'];




}
