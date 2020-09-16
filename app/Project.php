<?php

namespace App;
use App\User;
use App\PublicMsg;


use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
     protected $fillable = ['project_title', 'project_status', 'project_type', 'project_reception_end', 'project_max_amount', 'project_mini_amount', 'project_detail_desc', 'user_id'];

     public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function public_msgs()
    {
      return $this->hasMany('App\PublicMsg');
    }
}
