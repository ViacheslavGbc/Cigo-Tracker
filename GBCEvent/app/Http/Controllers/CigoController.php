<?php

namespace App\Http\Controllers;
use App\Cigo;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;



class CigoController extends Controller
{
    //Cancel adding
    // Submit order
    // Change Status
    // Cancel Order
    
     public function neworder(Request $request)
    {
        $order = new Cigo();
   
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->sdate = $request->sdate;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->zip = $request->zip;
        $order->country = $request->country;
        $order->status = 0;
        
        $order->save();

        return redirect('/');
    }
    
     public function deleteorder($id)
    {
        $order = Cigo::find($id);
        $order->delete();
        return redirect("/");
    }
    
      public function newstatus($id, $status_id) // assigning new status to the order
    {
        //$int = (int) preg_replace('/\D/', '', $status_id); // sanitising variable value
       
        Cigo::where('id', $id)->update(array('status'=>$status_id));
        return redirect ("/");
        
    }
    
    
    
}
