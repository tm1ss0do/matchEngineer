<?php

namespace App;
use App\Project;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_icon', 'self_introduction', 'delete_flg'
    ];

   //  public function projects()
   // {
   //     return $this->hasMany('App\Project');
   // }


}
