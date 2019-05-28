<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMedicalInfo extends Model
{
    protected $table = 'patient_medical_info';

    protected $fillable = ['pros_id', 'doctor_id', 'doctor_name', 'allergy','diet','medicine_name', 'quantity_of_med', 'course_date','apply_on', 'frequency_in_a_day', 'time_to_take_med', 'on_monday', 'on_tuesday', 'on_wednesday','on_thursday', 'on_friday', 'on_saturday', 'on_sunday','is_prn','effect_time','prn_reason','parameter','date_of_prescription', 'other_instructions','facility_id'];

    protected $primaryKey ='pat_medi_id';
    public $timestamps = false;
}
