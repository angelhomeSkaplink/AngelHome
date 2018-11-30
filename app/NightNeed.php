<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NightNeed extends Model
{
    protected $table = 'night_need';

    protected $fillable = ['pros_id', 'sleep_well', 'sleep_well_note', 'assist_at_night', 'assist_at_night_note', 'date_night', 'user_id', 'status'];

    public $timestamps = false;
}
