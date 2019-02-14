<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProsService extends Model
{
    protected $table = 'pros_service';
    protected $fillable = ['ps_id','pros_id','period','service_plan_id','status','facility_id'];
    public $timestamps = false;
}
