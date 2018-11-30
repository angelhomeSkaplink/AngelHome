<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmbulationTransfer extends Model
{
 	protected $table = 'ambulation_transfer';

	protected $fillable = ['pros_id', 'tired_easy', 'tired_easy_note', 'need_assist_ambu', 'need_assist_ambu_note', 'walking_ambu', 'walking_ambu_note', 'transfers_ambu', 'transfers_ambu_note', 'date_ambu', 'user_id', 'status'];
	
	public $timestamps = false;

}
