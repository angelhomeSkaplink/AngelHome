<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GastroProblemTsp extends Model
{
    protected $table = 'gastrointestinal_problem_tsp';
    protected $fillable = ['tsp_id','gastro_problem','precautions','pain', 'symptoms', 'appetite','weight', 'amt_drainage','temperature','pulse','respirations','bp','complaints','last_update_date_time'];
    protected $primaryKey ='gastro_id';
    public $timestamps = false;
}
