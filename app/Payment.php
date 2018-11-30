<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment_info';
	protected $fillable = ['pros_id', 'due_ammount', 'ammount_pay', 'balance', 'ammount_paid', 'payment_method', 'cheque_no', 'month', 'year', 'payment_status', 'facility_id'];
	public $timestamps = false;
}
