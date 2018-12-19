<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FallTsp extends Model
{
    protected $table = 'fall_tsp';
    protected $fillable = ['tsp_id','fall_date','fall_time','injuries', 'pain', 'further_injury','ability_to_transfer', 'mental_status', 'temperature','pulse','bp','complete_report','last_update_date_time'];
    protected $primaryKey ='fall_id';
    public $timestamps = false;
}
