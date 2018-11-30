<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dressing extends Model
{
    protected $table = 'dressing';

    protected $fillable = ['pros_id', 'choose_own_clothes', 'choose_own_clothes_note', 'need_assist_dressing', 'need_assist_dressing_note', 'date_dressing', 'user_id', 'status'];

    public $timestamps = false;
}
