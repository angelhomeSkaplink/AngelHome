<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentCommonValue extends Model
{
    protected $table = 'assessment_common_value';
	protected $fillable = ['assessment_id', 'facility_id', 'point', 'current_status'];
	public $timestamps = false;
}
