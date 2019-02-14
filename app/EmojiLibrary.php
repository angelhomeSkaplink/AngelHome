<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmojiLibrary extends Model
{
    protected $table = 'emoji_library';
    protected $fillable = ['title','category','code'];
    protected $primaryKey ='id';
    public $timestamps = false;
}
