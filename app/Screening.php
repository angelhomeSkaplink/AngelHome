<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    protected $table = 'screening';
    protected $fillable = ['pros_id','facility_id','resp_per','sign_per','res_details','doctor','pharmacy','med_equip','funeral_home','legal_doc','insurance','all_scr'];
    public $timestamps = false;
}
