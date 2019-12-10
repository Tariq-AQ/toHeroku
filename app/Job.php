<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id',
    ];


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

    public function upVoteAndSave()
    {
        $this->likes += 1;
        $this->update();
    }
    public function downVoteAndSave()
    {
        $this->likes -= 1;
        $this->update();
    }
}
