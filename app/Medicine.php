<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicine';
    protected $fillable = ['medicine_name'];
    public $timestamps = false;
}
