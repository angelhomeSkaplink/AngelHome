<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeclineTsp extends Model
{
    protected $table = 'decline_tsp';
    protected $fillable = ['tsp_id','specific_symptoms','ongoing_symptoms','assistance_provided', 'appetite_issue', 'temperature','pulse', 'bp', 'last_update_date_time'];
    protected $primaryKey ='decline_id';
    public $timestamps = false;
}
