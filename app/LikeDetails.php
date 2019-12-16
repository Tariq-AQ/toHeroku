<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeDetails extends Model
{
    public function user()
    {
        $this->belongsTo('App\User');
    }
    public function job()
    {
        $this->belongsTo('App\Job');
    }
}
