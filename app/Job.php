<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id', 'likes',
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
    public function likes()
    {
        return $this->hasMany('App\LikeDetails ');
    }

    public function upvoteAndSave()
    {
        $this->likes += 1;
        $this->timestamps = false;
        $this->update();
        $this->timestamps = true;
    }
    public function downvoteAndSave()
    {
        $this->likes -= 1;
        $this->timestamps = false;
        $this->update();
        $this->timestamps = true;
    }
}
