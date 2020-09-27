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

use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;

use Illuminate\Database\Eloquent\SoftDeletes;

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
    // 論理削除を行う
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'profile_icon', 'self_introduction', 'deleted_at'
    ];

    public function sendEmailVerificationNotification()
    {
       $this->notify(new CustomVerifyEmail());
    }

    public function sendPasswordResetNotification($token) {
         $this->notify(new CustomResetPassword($token));
     }


    public function projects()
     {
         // return $this->hasMany('App\Project');
         return $this->hasMany('App\Project')->withTrashed();
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
       return $this->hasMany('App\DirectMsgsBoard', 'reciever_id');
     }

     public function public_notify()
     {
       return $this->hasMany('App\PublicNotify');
     }

     public function direct_notify()
     {
       return $this->hasMany('App\DirectNotify');
     }

     public static function boot()
      {
          parent::boot();

          static::deleted(function ($user) {
              $user->projects()->delete();
              $user->public_msgs()->delete();
              $user->direct_msgs()->delete();
              $user->direct_msgs_boards()->delete();
              $user->public_notify()->delete();
              $user->direct_notify()->delete();
          });
      }


}
