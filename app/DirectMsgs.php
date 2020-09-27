<?php

namespace App;
use App\User;
use App\DirectMsgsBoard;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DirectMsgs extends Model
{
    //
    use SoftDeletes;
    
    protected $fillable = ['send_date', 'content', 'read_flg', 'sender_id', 'board_id'];

    public function user()
   {
       return $this->belongsTo('App\User','sender_id');
   }

   public function direct_msgs_board()
   {
     return $this->belongsTo('App\DirectMsgsBoard', 'board_id');
   }


}
