<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrequencyMed extends Model
{
    protected $table="medicine_frequency";
    protected $fillable =['pat_med_id','frequency','time_to_take','affect_after','facility_id','status'];
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
}
