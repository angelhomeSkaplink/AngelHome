<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteTaker extends Model
{
    protected $table = 'note_taker';
    protected $fillable = ['res_id','notes','date','time','recorder'];
    public $timestamps = false;
}
