<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //Table Name
    protected $table = 'jobs';

    //Primary Key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;
    //Creating relation ship between user and associated jobs
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
