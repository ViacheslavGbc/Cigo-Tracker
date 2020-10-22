<?php

namespace App\Http\Controllers;

use App\Event;
use App\Cigo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
        $this->middleware(['auth', 'verified'])->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(5);
        return view('home', ['events'=>$events]);
        
        $orders = Cigo::paginate(5);
        return view('welcome', ['cigos'=>$orders]);
        
    }

    public function welcome()
    {
     //   $events = Event::paginate(5);
     //   return view('welcome', ['events'=>$events]);
        
        $orders = Cigo::paginate(5);
        return view('welcome', ['cigos'=>$orders]);
    }




}
