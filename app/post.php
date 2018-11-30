<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['fld_PostName', 'fld_TotalPost', 'fld_GradePay', 'fld_SanctionNo', 'fld_SanctionDate', 'fld_PayScale_lower_limit', 'fld_PayScale_uper_limit', 'salary_type', 'fld_Status'];
	public $timestamps = false;
}
