<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentalStatus extends Model
{
    protected $table = 'mental_status';

    protected $fillable = ['pros_id', 'oriented', 'oriented_note', 'wanders', 'wanders_note', 'history_mental_ill', 'history_mental_ill_note', 'memory_lapses', 'memory_lapses_note', 'danger_to_s_o', 'danger_to_s_o_note', 'behaviors', 'behaviors_note', 'mental_date', 'user_id', 'status'];

    public $timestamps = false;
}
