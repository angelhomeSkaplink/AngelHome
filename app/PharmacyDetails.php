<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyDetails extends Model
{
    protected $table = 'pharmacy_details';

    protected $fillable = ['pros_id', 'pharmacy', 'phone_pharmacy', 'mortuary', 'phone2_mortuary', 'special_med_needs_pharmacy', 'date_pharmacy', 'user_id', 'status'];

    public $timestamps = false;
}
