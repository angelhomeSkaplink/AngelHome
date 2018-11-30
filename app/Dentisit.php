<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dentisit extends Model
{
    protected $table = 'dentist';
	
	protected $fillable = ['pros_id', 'dentist_name', 'dentist_phone', 'dentist_address_1', 'dentist_address', 'dentist_city', 'user_id', 'status', 'dentist_date'];
	public $timestamps = false;
}
