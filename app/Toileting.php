<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toileting extends Model
{
    protected $table = 'toileting';

    protected $fillable = ['pros_id', 'physical_assist', 'physical_assist_note', 'incont_supplies', 'incont_supplies_note', 'agree_to_wear', 'agree_to_wear_note', 'date_toileting', 'user_id', 'status'];

    public $timestamps = false;
}
