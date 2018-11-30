<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $table = 'file_upload';
	protected $fillable = ['pros_id', 'audio', 'user_id', 'facility_id', 'upload_date'];
	public $timestamps = false;
}
