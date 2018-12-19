<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EyeProblemTsp extends Model
{
    protected $table = 'eye_problem_tsp';
    protected $fillable = ['tsp_id','eye_problem','precautions','pain', 'symptoms', 'safety_issue','amt_drainage', 'adverse_symptoms','complaints','last_update_date_time'];
    protected $primaryKey ='eye_problem_id';
    public $timestamps = false;
}
