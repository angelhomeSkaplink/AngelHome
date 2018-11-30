<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProspectiveBasic extends Model
{
    protected $table = 'prospective_basic';
	protected $fillable = ['prospective_name', 'phone_no', 'email', 'self_or_other', 'person_name', 'relation', 'date', 'moc'];
	public $timestamps = false;
}
