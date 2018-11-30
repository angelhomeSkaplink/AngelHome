<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crm extends Model
{
    protected $table = 'sales_pipeline';
	protected $fillable = ['pros_unique_id', 'pros_name', 'phone_p', 'email_p', 'address_p', 'address_p_two', 'city_p', 'state_id_p', 'zip_p', 'contact_person', 'phone_c',
	'email_c', 'address_c', 'address_c_two', 'city_c', 'stste_id_c', 'zip_c', 'relation', 'source', 'service_image', 'facility_id', 'user_id', 'marketing_id', 'date', 'stage'];
	public $timestamps = false;
}
