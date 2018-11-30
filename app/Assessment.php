<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $table = 'assessment_entry';
	protected $fillable = ['assessment_id', 'assessment_json', 'created_at', 'updated_at'];
}
