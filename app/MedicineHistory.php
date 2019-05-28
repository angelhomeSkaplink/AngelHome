<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineHistory extends Model
{
    protected $table = 'medicine_history';
    protected $fillable = ['pros_id','frequency','time_to_take_med','pat_medi_id','freq','mar_date', 'action_performed_on','reason', 'user_id', 'facility_id'];
    public $timestamps = false;
}
