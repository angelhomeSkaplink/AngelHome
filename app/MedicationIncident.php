<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicationIncident extends Model
{
    protected $table = 'med_incident_record';
    protected $fillable = ['pros_id','err_made_emp','emp_role','dt_incident', 'shift_incident', '	time_incident','dt_recording', 'err_desc', 'err_contribution', 'dt_physcn_infrmd', 'tm_physcn_infrmd', 'resident_infrmd', 'physcn_response', 'physcn_action', 'resp_person_infrmd', 'direction_received', 'user_err_entry', 'facility_id','status'];
    protected $primaryKey ='med_incident_record_id';
    public $timestamps = false;
}
