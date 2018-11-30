<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomBook extends Model
{
    protected $table = 'resident_room';

	protected $fillable = ['pros_id', 'room_id', 'price', 'orgnl_price', 'status'];
	
	public $timestamps = false;
}
