<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectMsgs extends Model
{
    //
    protected $fillable = ['send_date', 'content', 'read_flg', 'sender_id', 'board_id'];

}
