<?php

namespace App;
use App\Project;
use App\User;

use Illuminate\Database\Eloquent\Model;

class DirectMsgsBoard extends Model
{
    //
    protected $fillable = ['recruiter_id', 'applicant_id', 'project_id'];

    public function user()
   {
       return $this->belongsTo('App\User');
   }

    public function project()
    {
      return $this->belongsTo('App\Project');
    }


}
