<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResidentDetails extends Model
{
    protected $table = 'resident_details';	
	protected $fillable = ['pros_id', 'height_resident', 'weight_resident','gender','dob','pob','marital','religion','social_security_resident', 'medicare_resident', 
	'va_resident', 'other_insurance_name_resident', 'date_resident', 'user_id', 'status'];
	public $timestamps = false;
}
