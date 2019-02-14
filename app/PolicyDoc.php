<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolicyDoc extends Model
{
    protected $table = 'policy_doc';
    protected $fillable = ['doc_name','doc_file','file_type','facility_id','user_id','upload_date','status'];
    protected $primaryKey = 'doc_id';
    public $timestamps = false;

}
