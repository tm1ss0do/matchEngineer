<?php

namespace App;
use App\User;
use App\Project;
use App\PublicNotify;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublicMsg extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['send_date', 'content', 'sender_id', 'project_id'];

    public function user()
     {
       return $this->belongsTo('App\User', 'sender_id');
         
     }

     public function project()
     {
       return $this->belongsTo('App\Project');

     }

}
