<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrimaryDoctorDetails extends Model
{
    protected $table = 'primary_doctor_details';

    protected $fillable = ['pros_id', 'primary_doctor_primary', 'address1_primary', 'address2_primary', 'city_primary', 'state_primary', 
	'zipcode_primary', 'phone_primary_doctor'. 'medical_diagnosis', 'other_m_p_prob_primary', 'email_primary_doctor', 'fax_primary_doctor',
	'specialist_doctor_primary', 'specialist_address1_primary', 'specialist_address2_primary', 'specialist_city_primary', 'specialist_state_primary', 
	'specialist_zipcode_primary', 'specialist_phone_primary_doctor','dentist','dentist_city','dentist_phone','dentist_address1','dentist_zip','dentist_address1','dentist_state','date', 'user_id', 'status'];

    public $timestamps = false;
}
