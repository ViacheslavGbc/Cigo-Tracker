<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Event;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    // https://appdividend.com/2018/06/20/create-comment-nesting-in-laravel/#Step_5_Create_a_form_to_add_a_comment
    
 
    
    
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->message = $request->message;
        $comment->event_id = $request->event_id;
        $comment->user_id = Auth::user()->id;
        //$comment->user()->associate($request->user());
        $event = Event::find($request->event_id);
        $event->comments()->save($comment);

        return back();
    }
    
    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->message = $request->message;
        $reply->user_id = Auth::user()->id;
        //$reply->user()->associate($request->user());
        $reply->parent_id = $request->comment_id;
        $reply->event_id = $request->event_id;
        $event = Event::find($request->event_id);
        $event->comments()->save($reply);

        return back();

    }
    
     public function postComment($id)
    {
        Comment::where('id', $id)->update(array('status_enabled'=>'1'));

        return back()->with('success', 'Comment has been successfully enabled');
    }    
    
         
         public function blockComment($id)
    {
        Comment::where('id', $id)->update(array('status_enabled'=>'0'));

        return back()->with('success', 'Comment has been blocked');
    }    


    public function deleteComment($id)
    {
        Comment::where('id', $id)->delete();
        return back()->with('success', 'Comment has been successfully deleted');
    }    



}
