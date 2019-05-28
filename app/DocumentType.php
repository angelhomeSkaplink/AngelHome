<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $table="documents";
    protected $fillable =['doc_type','doc_name','facility_id','status'];
    protected $primaryKey ='id';
    public $timestamps = false;
}
