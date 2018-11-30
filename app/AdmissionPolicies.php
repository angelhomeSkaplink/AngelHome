<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionPolicies extends Model
{
    protected $table = 'admission_policies';

	protected $fillable = ['policy_title', 'policy_desc', 'pol_effected_date', 'policy_status', 'facility_id', 'user_id', 'date_of_add'];

	public $timestamps = false;
}
