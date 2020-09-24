<?php

namespace App;
use App\Project;
use App\User;
use App\DirectMsgs;
use App\DirectNotify;

use Illuminate\Database\Eloquent\Model;

class DirectMsgsBoard extends Model
{
    //
    protected $fillable = ['reciever_id', 'sender_id', 'project_id'];

    public function reciever()
    {
      return $this->belongsTo('App\User', 'reciever_id');
    }

    public function sender()
    {
      return $this->belongsTo('App\User', 'sender_id');
    }

    public function project()
    {
      return $this->belongsTo('App\Project');
    }

    public function direct_msgs()
    {
      return $this->hasMany('App\DirectMsgs', 'board_id');
    }
    public function direct_notify()
    {
      return $this->hasMany('App\DirectNotify', 'direct_board_id');
    }

}
