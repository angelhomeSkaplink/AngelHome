<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewMedicationTsp extends Model
{
    protected $table = 'new_medication_tsp';
    protected $fillable = ['tsp_id','medication_order','precautions','symptoms', 'complaints','last_update_date_time'];
    protected $primaryKey ='new_medication_id';
    public $timestamps = false;
}
