<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';
	protected $fillable = ['pros_id', 'appointment_date', 'appointment_time', 'comments', 'user_id', 'status'];
	public $timestamps = false;
}
