<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineStockHistory extends Model
{
    protected $table = 'medicine_stock_history';
    protected $fillable = ['prescription_id', 'pharmacy_id', 'medicine_name', 'stock_order_date', 'course_end_date','stock_upto', 'recv_date', 'order_status', 'stock_alert', 'user_id', 'pros_id', 'facility_id'];
    public $timestamps = false;
}
