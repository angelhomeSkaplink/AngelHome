<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stage extends Model
{
    protected $table = 'stage_pipeline';
	protected $fillable = ['lead_id', 'sales_stage', 'date', 'pipeline_id', 'status', 'notes', 'moc'];
	public $timestamps = false;
}
