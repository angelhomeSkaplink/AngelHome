<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespiratoryProblemTsp extends Model
{
    protected $table = 'respiratory_problem_tsp';
    protected $fillable = ['tsp_id','problem_char','precautions','pain', 'symptoms', 'appetite','amount_sputum', 'temperature', 'pulse', 'bp','adverse_symptoms','complaints','last_update_date_time'];
    protected $primaryKey ='respiratory_tsp_id';
    public $timestamps = false;
}
