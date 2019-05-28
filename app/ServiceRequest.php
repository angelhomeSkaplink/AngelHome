<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $table = 'service_request';
    protected $fillable = ['res_id','title','description','notes','req_date','status','facility_id','user','fulfill_date'];
    protected $primaryKey = 'req_id';
    public $timestamps = false;
}
