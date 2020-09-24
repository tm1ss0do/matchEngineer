<?php

namespace App;
use App\User;
use App\Project;

use Illuminate\Database\Eloquent\Model;

class PublicMsg extends Model
{
    //
    protected $fillable = ['send_date', 'content', 'read_flg', 'sender_id', 'project_id'];

    public function user()
     {
         return $this->belongsTo('App\User', 'sender_id');
     }

     public function project()
     {
       return $this->belongsTo('App\Project');
     }

}
