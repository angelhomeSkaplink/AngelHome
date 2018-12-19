<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrinaryProblemTsp extends Model
{
    protected $table = 'urinary_tsp';
    protected $fillable = ['tsp_id','problem','precautions','pain', 'symptoms', 'appetite','temperature','pulse','respirations','bp','adverse_symptoms','complaints','last_update_date_time'];
    protected $primaryKey ='urinary_id';
    public $timestamps = false;
}
