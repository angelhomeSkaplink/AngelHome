<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class EmergencyContact extends Model
{
    protected $table = 'emergency_contact';
	
	protected $fillable = ['pros_id', 'name_1', 'relation_1', 'address_1', 'address_2', 'city_1', 'home_phn_1', 'work_phone_1',
	'name_2', 'relation_2', 'address_1_1', 'address_1_1', 'city_2', 'home_phn_2', 'work_phone_2', 
	'poa', 'poa_relation', 'poa_phone', 'guardian', 'guardian_phone', 'guardian_address_1', 'guardian_address_2', 'guardian_city', 'user_id',
	'status', 'emergency_date'];
	public $timestamps = false;
}
