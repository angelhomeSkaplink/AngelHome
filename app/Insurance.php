<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $table = 'insurance';
	protected $fillable = ['pros_id', 'ss', 'medicare', 'supplemental_insurance_name', 'policy', 'medicaid', 'personal_responcible', 'name', 'phone', 
	'address_1', 'address_2', 'city', 'state_id', 'zip', 'case_manager', 'manager_phone', 'user_id', 'status'];
	public $timestamps = false;
}
