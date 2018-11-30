<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsibleperson extends Model
{
    protected $table = 'responsible_person_details';	
	protected $fillable = ['pros_id', 'responsible_person_responsible', 'address1_responsible', 'address2_responsible', 'city_responsible', 
	'state_responsible', 'zipcode_responsible', 'phone_responsible', 'email_responsible', 'date_responsible', 'user_id', 'status'];
	public $timestamps = false;
}
