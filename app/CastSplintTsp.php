<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CastSplintTsp extends Model
{
    protected $table = 'cast_splint_tsp';
    protected $fillable = ['tsp_id','cast','splint','injuries', 'location', 'pain','skin_issues', 'transfer_ability','last_update_date_time'];
    protected $primaryKey ='cast_splint_id';
    public $timestamps = false;
}
