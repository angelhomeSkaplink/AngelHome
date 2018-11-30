<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicePlan extends Model
{
    protected $table = 'service_plan';
	protected $fillable = ['service_plan_id', 'service_plan_name', 'from_range', 'to_range', 'price', 'facility_id', 'service_plan_status'];
	//protected $fillable = ['service_plan_name', 'from_range', 'to_range', 'price', 'facility_id', 'service_plan_status'];	
	public $timestamps = false;
}
