<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $table = 'facility_pharmacy';
    protected $fillable = ['pharmacy_name', 'pharmacy_location', 'pharmacy_email', 'pharmacy_phone', 'facility_id'];
    public $timestamps = false;
}
