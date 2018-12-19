<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $table = 'insurance';
	protected $fillable = ['pros_id', 'ss', 'medicare', 'supplemental_insurance_name', 'policy', 'medicaid', 'personal_responcible', 'case_manager', 'manager_phone','inc_date','user_id', 'status'];
	public $timestamps = false;
}
