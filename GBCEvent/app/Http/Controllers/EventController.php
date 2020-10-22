<?php

namespace App\Http\Controllers;

use App\Event;
use App\Comment;
use App\User;
//use File;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{

    public function callcreate(Request $request)
    {
      return view('createnew');
    }

    public function profile()
    {
        return view('/profile');
    }

    public function dashboard()
    {
        $events = Event::all();
        $comments = Comment::all();
        $users = User::all();
        
        $count_events=count($events);
        $count_users=count($users);
        $count_comments=count($comments);
        
        $count_owners = User::where ('user_type', 2)->count();
        $participants = User::where ('user_type', 1)->count();
        $count_newEvents = Event::where('status_enabled', 0)->count();

        return view('dashboard', ['events'=>$events, 'comments'=>$comments, 'users'=>$users,
        'cevents'=>$count_events,'cusers'=>$count_users,'ccomments'=>$count_comments,
        'cowners'=>$count_owners, 'cparticipants'=>$participants, 'cnewEvents'=>$count_newEvents,]);

    }


    public function create(Request $request)
    {
        $event = new Event();
        $event->created_by = Auth::user()->id; //Who is logged in when event is being created.
        $event->eventOwner = $request->eventOwner;
        $event->eventName = $request->eventName;
        $event->eventDate1 = $request->eventDate1;
        $event->eventDate2 = $request->eventDate2;  // But what if date is single ?!!!
        $event->eventTime1 = $request->eventTime1;
        $event->eventTime2 = $request->eventTime2;
        $event->eventLocation = $request->eventLocation;
        $event->eventRoom = $request->eventRoom;
        $event->maxNumParticipants = $request->maxNumParticipants;
        $event->eventDescription = $request->eventDescription;
        $event->save();

        return redirect('/home');
    }

    public function viewrec($id)
    {
        $event = Event::findOrFail($id);
        $selected = $event->eventLocation;
    
        $user = Auth::id();// Get the currently authenticated user's ID...
        $isRegestered = $event->users()->where('user_id', $user)->count(); 

        $result = [];
        $path = public_path('images\\').$id;
        //dd($path);

        if (File::exists($path)) {
                //dd($path);
                //$dirs = Storage::disk('public')->allFiles($path);
                //dd(File::allFiles($path));
            //$dirs = File::allFiles($path);

                //C:\xampp\htdocs\laravel\laravel\GBCEvent\public\images\5
            //var_dump($dirs);
            //foreach ($dirs as $dir) {
            //    var_dump($dir); //actually string: /home/mylinuxiser/myproject/public"
                $files = File::files($path);
                //dd($files);
                foreach ($files as $f) {
                    //var_dump($f);
                    //actually object SplFileInfo
                    //object(Symfony\Component\Finder\SplFileInfo)#628 (4) {
                    //["relativePath":"Symfony\Component\Finder\SplFileInfo":private]=>
                    //string(0) ""
                    //["relativePathname":"Symfony\Component\Finder\SplFileInfo":private]=>
                    //string(14) "text1_logo.png"
                    //["pathName":"SplFileInfo":private]=>
                    //string(82) "/home/mylinuxiser/myproject/public/img/text1_logo.png"
                    //["fileName":"SplFileInfo":private]=>
                    //string(14) "text1_logo.png"
                    //}

                    if (ends_with($f, ['.png', '.jpg', '.jpeg', '.gif', '.pdf', '.ppt', '.pptx', '.docx', '.doc', '.txt'])) {
                        $result[] = $f->getRelativePathname(); //prefix your public folder here if you want
                    }
                    //dd($f);

                    //var_dump($result);
                }

            //}
        }
        return view('record', ['event' => $event, 'selected' => $selected, 'result' => $result, 'canSignUp'=>$isRegestered,]);
    }

    public function editrec($id)
    {
        $event = Event::find($id);
        $selected = $event->eventLocation;
        return view('update', ['event' => $event, 'selected' => $selected]);
    }
    public function allowEvent($id)
    {
        /*$event = Event::find($id);
        if($event){
            $event->status_enabled = '1';
            $event->save();
        }*/
        Event::where('id', $id)->update(array('status_enabled'=>'1'));

       return back();
    }
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->eventOwner = $request->eventOwner;
        $event->eventName = $request->eventName;
        $event->eventDate1 = $request->eventDate1;
        $event->eventDate2 = $request->eventDate2;  // What if date is single ?!!!
        $event->eventTime1 = $request->eventTime1;
        $event->eventTime2 = $request->eventTime2;
        $event->eventLocation = $request->eventLocation;
        $event->eventRoom = $request->eventRoom;
        $event->maxNumParticipants = $request->maxNumParticipants;
        $event->eventDescription = $request->eventDescription;
        $event->save();
        return redirect('/home');

    }
    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect("/dashboard");
    }
    
    public function refuse($id)
    {
        $event = Event::find($id);
      
        return view ("refusal", ['event'=>$event]);
    }
    
    public function refuse_res($id, $reason_id) // reasoning the refusal
    {
        //$int = (int) preg_replace('/\D/', '', $reason_id); // sanitising variable value
       
        Event::where('id', $id)->update(array('status_enabled'=>$reason_id));
      
        return redirect ("/dashboard");
        
    }
    

    public function subscribe($event_id, $user_id)
    {
        $event = Event::find($event_id);
        $selected = $event->eventLocation; // showing related google map
        $user = Auth::id();// Get the currently authenticated user's ID...
        $event->users()->attach($user);
        //return 'You have successfully subscribed for this event';
        $isRegestered = 1; // authenticated user is signed up from now
       
       return view('record', ['event' => $event, 'selected' => $selected, 'canSignUp'=>$isRegestered,]);
    }
    
    public function search(Request $request)
    {
        $search4 = Input::get ('pattern');     //var_dump($search4);
       
        $events = Event::where ( 'eventName', 'LIKE', '%' . $search4 . '%' )->paginate(5);
        
        if (count($events) > 0) {
            return view('welcome')->with(compact('events'));
        } else {
             return redirect('/');
            }
    }
  }
