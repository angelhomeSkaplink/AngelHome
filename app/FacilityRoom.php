<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityRoom extends Model
{
    protected $table = 'facility_room';

	protected $fillable = ['room_no', 'room_type', 'special_feature', 'price', 'facility_id', 'status'];
	
	public $timestamps = false;
}
