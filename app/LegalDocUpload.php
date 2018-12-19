<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalDocUpload extends Model
{
    protected $table = 'legal_doc_upload';
	protected $fillable = ['pros_id', 'doc_name', 'doc_file', 'user_id', 'facility_id', 'upload_date'];
	public $timestamps = false;
}
