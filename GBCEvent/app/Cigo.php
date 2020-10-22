<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Cigo extends Model
{
    //use Notifiable;
    
      protected $fillable = [

        'fname', 'lname', 'email', 'phone',
        'sdate', 'address', 'city', 'state',
        'zip', 'country','status'
    ];
    
    //
}
