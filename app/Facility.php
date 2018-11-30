<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facility';
	protected $fillable = ['id','facility_name','address','phone_no','email'];
    public $timestamps = false;
}
