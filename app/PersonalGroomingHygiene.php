<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalGroomingHygiene extends Model
{
    protected $table = 'personal_grooming_hygiene';

    protected $fillable = ['pros_id', 'aware_of_needs', 'aware_of_needs_note', 'need_assist_groom', 'need_assist_groom_note', 'special_equip_groom', 'special_equip_groom_note', 'date_groom', 'user_id', 'status'];

    public $timestamps = false;
}
