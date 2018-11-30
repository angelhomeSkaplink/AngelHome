<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalEquipSuppResidentNeed extends Model
{
    protected $table = 'medical_equip_supp_resident_need';

    protected $fillable = ['pros_id', 'inconsistency_supplies_type', 'pressure_relief_dev_type', 'bed_pan_medical', 'walker_medical', 'trapeze_medical', 'comode_medical', 'wheelchair_medical', 'oxygen_medical', 'urinal_medical', 'cane_medical', 'protective_pads_medical', 'crutches_medical', 'hospital_beds_medical', 'other_medical', 'date', 'user_id', 'status'];

    public $timestamps = false;
}
