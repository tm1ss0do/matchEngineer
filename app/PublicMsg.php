<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicMsg extends Model
{
    //
    protected $fillable = ['send_date', 'content', 'read_flg'];

}
