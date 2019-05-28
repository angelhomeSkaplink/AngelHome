<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityCalendar extends Model
{
    protected $table = 'activity_calendar';
	protected $fillable = ['event_name','emoji_code', 'event_description','open_to', 'event_place', 'event_date', 'event_end_date', 'event_time', 'duration', 'end_time', 'month', 'year', 'facility_id'];
	protected $privateKey = 'event_id'; 
	public $timestamps = false;
}
