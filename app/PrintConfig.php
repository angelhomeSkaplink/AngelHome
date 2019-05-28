<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintConfig extends Model
{
    protected $table="print_config";
    protected $fillable =['facility_id','initial_assess','screening','policy_doc','legal_doc','lease_signing_doc','status'];
    protected $primaryKey ='print_config_id';
    public $timestamps = false;
}
