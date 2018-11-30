<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherMedicalInfo extends Model
{
    protected $table = 'other_medical_info';	
	protected $fillable = ['pros_id', 'funeral_home', 'funeral_phone', 'hospital', 'hospital_phone', 'pharmacy', 'pharmacy_phone', 'allergies',
	'diagnosis', 'cpr_status', 'user_id', 'status', 'medical_date'];
	public $timestamps = false;
}
