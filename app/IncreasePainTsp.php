<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncreasePainTsp extends Model
{
    protected $table = 'increase_pain__tsp';
    protected $fillable = ['tsp_id','specific_symptoms','pain_location','symptoms', 'pain_type_loc', 'swelling_bruising','pulse', 'bp', 'last_update_date_time'];
    protected $primaryKey ='increase_pain_id';
    public $timestamps = false;
}
