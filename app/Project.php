<?php

namespace App;
use App\User;
use App\PublicMsg;
use App\PublicNotify;


use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
     protected $fillable = ['project_title', 'project_status', 'project_type', 'project_reception_end', 'project_max_amount', 'project_mini_amount', 'project_detail_desc', 'user_id'];

     protected $dates = ['project_reception_end'];

     public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function public_msgs()
    {
      return $this->hasMany('App\PublicMsg');
    }

    public function public_notify()
    {
      return $this->hasMany('App\PublicNotify', 'public_board_id');
    }
}
