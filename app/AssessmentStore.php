<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentStore extends Model
{
    protected $table = 'resident_assessment';
	protected $fillable = ['pros_id', 'assessment_id', 'assessment_json','result_json','score', 'assessment_date', 'facility_id', 'assessment_status'];
	public $timestamps = false;
}
