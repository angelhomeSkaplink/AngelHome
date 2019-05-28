<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicationIncidentAction extends Model
{
    protected $table = 'med_incident_action';
    protected $fillable = ['med_incident_record_id','res_diagnosis','medication','other_err', 'scope_severity', '	action_taken', 'prevention_step', 'user_supervised','updated_datetime','status'];
    protected $primaryKey ='id';
    public $timestamps = false;
}
