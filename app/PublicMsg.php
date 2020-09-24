<?php

namespace App;
use App\User;
use App\Project;
use App\PublicNotify;

use Illuminate\Database\Eloquent\Model;

class PublicMsg extends Model
{
    //
    protected $fillable = ['send_date', 'content', 'sender_id', 'project_id'];

    public function user()
     {
         return $this->belongsTo('App\User', 'sender_id');
     }

     public function project()
     {
       return $this->belongsTo('App\Project');
     }

     // public function public_notify()
     // {
     //   return $this->hasMany('App\PublicNotify', 'public_board_id');
     // }

}
