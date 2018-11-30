<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bathing extends Model
{
    protected $table = 'bathing';

    protected $fillable = ['pros_id', 'need_assist', 'need_assist_note', 'spec_equip', 'spec_equip_note', 'date_bathing', 'user_id', 'status'];

    public $timestamps = false;
}
