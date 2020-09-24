<?php

namespace App;
use App\Project;
use App\PublicMsg;
use App\DirectMsgs;
use App\DirectMsgsBoard;
use App\PublicNotify;
use App\DirectNotify;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// class User extends Authenticatable
class User extends Authenticatable implements MustVerifyEmailContract
{
    // use Notifiable;
    use MustVerifyEmail, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_icon', 'self_introduction', 'delete_flg'
    ];

    public function projects()
     {
         return $this->hasMany('App\Project');
     }
     public function public_msgs()
     {
       return $this->hasMany('App\PublicMsg','sender_id');
     }

     public function direct_msgs()
     {
       return $this->hasMany('App\DirectMsgs','sender_id');
     }
     public function direct_msgs_boards()
     {
       return $this->hasMany('App\DirectMsgsBoard');
     }

     public function public_notify()
     {
       return $this->hasMany('App\PublicNotify');
     }

     public function direct_notify()
     {
       return $this->hasMany('App\DirectNotify');
     }


}
