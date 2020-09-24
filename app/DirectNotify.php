<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\DirectMsgsBoard;

class DirectNotify extends Model
{
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
