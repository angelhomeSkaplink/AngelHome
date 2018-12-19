<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuneralHome extends Model
{
    protected $table = 'funeral_home';
	protected $fillable = ['pros_id', 'funeral_home', 'city', 'phone', 'address','date','user_id', 'status'];
	public $timestamps = false;
}
