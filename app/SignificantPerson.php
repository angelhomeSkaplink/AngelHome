<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignificantPerson extends Model
{
    protected $table = 'significant_person_details';	
	protected $fillable = ['pros_id', 'other_significant_person_significant', 'address1_significant', 'address2_significant', 'city_significant', 
	'state_significant', 'zipcode_significant', 'phone_significant', 'email_significant', 'date_significant', 'user_id', 'status'];
	public $timestamps = false;
}
