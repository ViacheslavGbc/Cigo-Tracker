<?php

namespace App\Http\Controllers;

use App\Event;
use App\Comment;
use App\User;
//use File;
//use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function makeOwner($id)
    {
        User::where('id', $id)->update(array('user_type'=>'2'));

        return back()->with('success', 'User account has been updated successfully');
    }
    
    public function makeActive($id)
    {
        User::where('id', $id)->update(array('user_type'=>'1'));

        return back()->with('success', 'User account has been activated...');
    }

    public function blockUser($id)
    {
        User::where('id', $id)->update(array('user_type'=>'0'));

        return back()->with('success', 'User account has been blocked...');
    }

     public function deleteUser($id)
    {
        User::where('id', $id)->delete();
        return back()->with('success', 'User account has been successfully deleted');
    }
   
}
