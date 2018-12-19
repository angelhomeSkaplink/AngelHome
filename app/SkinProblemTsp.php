<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkinProblemTsp extends Model
{
    protected $table = 'skin_problem_tsp';
    protected $fillable = ['tsp_id','location','type','pain', 'healing', 'drainage','complaints', 'report', 'last_update_date_time'];
    protected $primaryKey ='skin_problem_id';
    public $timestamps = false;
}
