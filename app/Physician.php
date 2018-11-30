<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Physician extends Model
{
    protected $table = 'physician';
	
	protected $fillable = ['pros_id', 'primary_physician', 'pry_phone', 'pry_add_1', 'pry_add_2', 'pry_city', 'spc_physician', 'spc_type',
	'spc_phone', 'user_id', 'status', 'phy_date'];
	public $timestamps = false;
}
