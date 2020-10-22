<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    protected $fillable = ['eventName', 'eventOwner', 'created_by','eventDescription','eventLocation', 'eventRoom', 'eventDate1', 'eventDate2','maxNumParticipants'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'event_user');
    }
    public function comments()
    {
        //return $this->hasMany(Comment::class)->whereNull('parent_id');  //comments v.2
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id'); //comments v.1
    }
}
