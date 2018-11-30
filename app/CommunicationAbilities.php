<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunicationAbilities extends Model
{
    protected $table = 'communication_abilities';

    protected $fillable = ['pros_id', 'speech_comm', 'speech_comm_note', 'vision_comm', 'vision_comm_note', 'hearing_comm', 'hearing_comm_note', 'date_comm', 'user_id', 'status'];

    public $timestamps = false;
}
