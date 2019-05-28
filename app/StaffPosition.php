<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffPosition extends Model
{
  protected $table = 'staff_position';
	protected $fillable = ['dept', 'pos_title', 'shorthand', 'reports_to', 'staffing_guidance','notes','pc','printer','cellphone','uniform','facility_id', 'status'];
  protected $primaryKey ='staff_position_id';
	public $timestamps = false;
}
