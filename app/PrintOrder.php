<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintOrder extends Model
{
    protected $table="print_order";
    protected $fillable =['facility_id','elm_order','status','last_updated'];
    protected $primaryKey ='print_order_id';
    public $timestamps = false;
}
