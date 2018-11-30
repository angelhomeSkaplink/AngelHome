<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Change_Records extends Model
{
    protected $table = 'change_pross_record';
	protected $fillable = ['pros_id', 'phone_p', 'email_p', 'address_p', 'address_p_two', 'city_p', 'state_id_p', 'zip_p', 'contact_person', 'phone_c',
	'email_c', 'address_c', 'address_c_two', 'city_c', 'stste_id_c', 'zip_c', 'relation', 'source', 'source_detail', 'remarks', 'user_id', 'facility_id', 'marketing_id', 'date', 'stage'];
	public $timestamps = false;
}
