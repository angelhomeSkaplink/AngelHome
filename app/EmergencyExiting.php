<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmergencyExiting extends Model
{
    protected $table = 'emergency_exiting';

    protected $fillable = ['pros_id', 'need_assist_emer', 'need_assist_emer_note', 'equip_need_emer', 'equip_need_emer_note', 'activity_pref_emer', 'date_emer', 'user_id', 'status'];

    public $timestamps = false;
}
