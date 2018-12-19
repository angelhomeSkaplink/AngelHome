<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryServicePlan extends Model
{
    protected $table = 'temporary_service_plan';

    protected $fillable = ['facility_id', 'pros_id', 'tsp_date', 'fall', 'decline','increase_pain','new_medication', 'skin_problem', 'respiratory_problem','cast_splint', 'eye_problem', 'gastrointestinal', 'urinary', 'last_update_date_time'];
    protected $primaryKey ='tsp_id';
    public $timestamps = false;
}
