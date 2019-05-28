<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $table = 'attendee';
	protected $fillable = ['pros_id', 'event_id','rsvp', 'attenedee_status', 'note', 'facility_id'];
	public $timestamps = false;
}
