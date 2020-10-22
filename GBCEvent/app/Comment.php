<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    // https://appdividend.com/2018/06/20/create-comment-nesting-in-laravel/#Step_5_Create_a_form_to_add_a_comment
  protected $fillable = ['event_id', 'user_id', 'status_enabled','message', 'parent_id'];

  public function user()
    {
        return $this->belongsTo(User::class);
    }
  public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id'); // event_id is a Primary key
    }
}
