<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OverallLevelOfFunctioning extends Model
{
    protected $table = 'overall_level_of_functioning';

    protected $fillable = ['pros_id', 'level_ov', 'other_concerns', 'pre_acceptable', 'reasons', 'date_ov', 'user_id', 'status'];

    public $timestamps = false;
}
