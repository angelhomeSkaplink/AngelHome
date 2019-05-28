<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NextAssessment extends Model
{
    protected $table = 'next_assessment';
    protected $fillable = ['pros_id', 'next_assessment_date', 'assessment_status','user_id','facility_id'];
    public $timestamps = false;
}
