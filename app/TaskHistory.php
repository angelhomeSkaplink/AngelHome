<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskHistory extends Model
{
    protected $table = 'task_history';
	protected $fillable = ['task_id', 'assignee', 'work_done_by', 'facility_id', 'history_date'];
	public $timestamps = false;
}
