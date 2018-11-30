<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedingNutrition extends Model
{
    protected $table = 'feeding_nutrition';

    protected $fillable = ['pros_id', 'feed_self', 'feed_self_note', 'spec_equip_feeding', 'spec_equip_feeding_note', 'special_diet', 'special_diet_note', 'allergies_feeding', 'allergies_feeding_note', 'limitation_feeding', 'limitation_feeding_note', 'good_appetite', 'good_appetite_note' ,'date_feeding', 'user_id', 'status'];

    public $timestamps = false;
}
