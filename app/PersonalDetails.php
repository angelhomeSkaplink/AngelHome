<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalDetails extends Model
{
    protected $table = 'personal_details';
	protected $fillable = ['pros_id', 'gender', 'dob', 'pob', 'age', 'ms', 'spouse_name', 'religion', 'comment', 'status'];
	public $timestamps = false;
}
