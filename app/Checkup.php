<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    protected $table = 'check_up';
	protected $fillable = ['res_id', 'weight', 'sugar', 'pressure', 'temperature', 'o2_stat', 'date','time','recorder'];
	public $timestamps = false;
}
