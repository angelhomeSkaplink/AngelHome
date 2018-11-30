<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareplanSave extends Model
{
    protected $table = 'care_plan';
	protected $fillable = ['assessment_id', 'care_plan_detail', 'total_point', 'user_id', 'care_plan_status'];
	public $timestamps = false;
}
