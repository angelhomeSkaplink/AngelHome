<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasksheet extends Model
{
    protected $table = 'tasksheet';
	protected $fillable = ['pros_id', 'title', 'frequency', 's_time', 'e_time', 's_date', 'e_date', 'special_equipment', 'status', 'person_required', 'facility_id'];
	public $timestamps = false;
}
