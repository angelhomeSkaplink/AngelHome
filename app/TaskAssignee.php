<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskAssignee extends Model
{
    protected $table = 'task_assingee';
	protected $fillable = ['task', 'user_id', 'task_date', 'facility_id', 'status'];
	public $timestamps = false;
}
