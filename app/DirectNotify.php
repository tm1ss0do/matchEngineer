<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\DirectMsgsBoard;
use Illuminate\Database\Eloquent\SoftDeletes;

class DirectNotify extends Model
{
  use SoftDeletes;
  
    //
    protected $table = 'direct_notifies';
    //
    protected $fillable = ['direct_board_id', 'user_id', 'read_flg'];

    public function direct_board()
    {
      return $this->belongsTo('App\DirectMsgsBoard');
    }
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
