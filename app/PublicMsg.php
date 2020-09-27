<?php

namespace App;
use App\User;
use App\Project;
use App\PublicNotify;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublicMsg extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['send_date', 'content', 'sender_id', 'project_id'];

    public function user()
     {
       return $this->belongsTo('App\User', 'sender_id');
         // return $this->belongsTo('App\User', 'sender_id')->withTrashed();
     }

     public function project()
     {
       return $this->belongsTo('App\Project');
       // return $this->belongsTo('App\Project')->withTrashed();
     }

     // public function public_notify()
     // {
     //   return $this->hasMany('App\PublicNotify', 'public_board_id');
     // }

}
