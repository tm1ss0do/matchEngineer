<?php

namespace App;
use App\User;
// use App\PublicMsg;
use App\Project;

use Illuminate\Database\Eloquent\Model;

class PublicNotify extends Model
{
    protected $table = 'public_notifies';
    //
    protected $fillable = ['public_board_id', 'user_id', 'read_flg'];

    // public function public_msg()
    // {
    //   return $this->belongsTo('App\PublicMsg');
    // }
    public function projects()
    {
      return $this->belongsTo('App\PublicMsg');
    }
    public function user()
    {
      return $this->belongsTo('App\User');
    }

}
