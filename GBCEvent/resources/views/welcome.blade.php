<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cigo Tracker</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
         <script src="https://kit.fontawesome.com/bb250377d6.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <style>
            body{
                background-color: #d4d8f9;
            }
            .navbar{
                background-color: #e0e3f9;
            }
        </style>

    </head>

    <body>

        <div id="app">
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">

              

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <table>
                     <th><td>    
           
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <div class="navbar_brand">
                                    </br>
                             
                                    </br>
                     </td><td>                
                                </div>
                            </li>
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
             <!--   @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                            </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                        @endauth
                        </ul>
                     </td></th></table>
                    
                    </div>
                @endif -->
            </nav>




            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="card">
                            <div class="card-header h2" align="center"><i class="far fa-calendar-alt"></i>&nbsp;Add an Order
                            </div>
                            <div class="card-header h2">
                                
                                   <!-- <form class="navbar-form navbar-left form-inline" method="get" action="/searchEvent">
                                          <div class="form-group">
                                            <input type="text" class="form-control" name="pattern" placeholder="Type event name or its part">
                                          </div>&nbsp;
                                        <button type="submit" class="btn btn-success">Search</button>
                                        <!-- if (txtValue.toUpperCase().indexOf(filter) > -1) {  <-something like this 
                                    </form>-->
                                    
                                    <form action="/neworder" name="orderForm" method="post">
                                        <div class="row">
                                            <label class="col-form-label col-6">First Name*</label>
                                            <input type="text" class="form-control col-6" name="fname" value="First Name" required>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <label class="col-form-label col-6">Last Name</label>
                                            <input type="text" class="form-control col-6" name="lname" value="Last Name" required>
                                        </div>
                                         <div class="row">
                                            <label class="col-form-label col-6">Email</label>
                                            <input type="text" class="form-control col-6" name="email" value="youremail@sample.com" required>
                                        </div>
                                         <div class="row">
                                            <label class="col-form-label col-6">Phone Number*</label>
                                            <input type="text" class="form-control col-6" name="phone" value="+1(647)647-1234" required>
                                        </div>
                                        
                                        <br>
                                        <div class="row">
                                            <label class="col-form-label col-6"> Scheduled Date* </label>
                                            <div class="col-6">
                                                <input type="date" class="form-control" name="sdate" value="2020-07-31" required>
                                          
                                            </div>
                                        <div class="row">
                                            <label class="col-form-label col-6">Street Address*</label>
                                            <input type="text" class="form-control col-6" name="address" value="" required>
                                        </div>
                                         <div class="row">
                                            <label class="col-form-label col-6">City*</label>
                                            <input type="text" class="form-control col-6" name="city" value="" required>
                                        </div>
                                         <div class="row">
                                            <label class="col-form-label col-6">State/Province*</label>
                                            <input type="text" class="form-control col-6" name="state" value="" required>
                                        </div>
                                         <div class="row">
                                            <label class="col-form-label col-6">Postal/Zip Code*</label>
                                            <input type="text" class="form-control col-6" name="zip" value="" required>
                                        </div>
                                        
                                        </div>
                                        <br>
                                        <div class="row">
                                            <label class="col-form-label col-6">Country*</label>
                                            <select class="form-control col-6" name="country">
                                                <option name="ca">Canada</option>
                                                <option name="br">Brasil</option>
                                                <option name="us">Mexico</option>
                                                <option name="mx">United States</option>
                                                
                                            <!--    <option name="cl" < ?php if($selected=='Casa Loma') echo "selected='selected'";?>>Casa Loma</option>
                                                <option name="sj" < ?php if($selected=='St.James') echo "selected='selected'";?>>St.James</option>
                                                <option name="wf" < ?php if($selected=='Waterfront') echo "selected='selected'";?>>Waterfront</option> -->
                                            </select>
                                        </div>
                                        <br>
                                        <hr>
                                        {{csrf_field()}}
                                        <div class="offset-4">
                                        <input type="submit"  class="btn btn-success" name="Submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="" class="btn btn-success" name="Cancel" $("Cancel").on("click", $('#orderForm')[0].reset()) >Cancel</a>
                                        </div>
                                </form>
                            </div>
                            
                            
                            
                            <!--
                             <form action="/Searchstudent" method="POST" role="Searchstudent">

                                 <div class="input-group">
                                 
                                     <input type="text" class="form-control" name="q"
                                 
                                         placeholder="Search sickleave number"> <span class="input-group-btn">
                                         <button type="submit" class="btn btn-default">
                                             <span class="glyphicon glyphicon-search"></span>
                                         </button>
                                     </span>
                                 </div>
                                                    
                            
                           
                            -->
                            </div>
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                  
                                    <table class = "table table-striped table table-bordered table table-hover">
                                        
                                             <thead class="table-active">
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Date</th>
                                            <th>     </th>
                                            <th>Status</th>
                                            <th>()</th>
                                            
                                            </thead>
                                            <tbody>
                                            @if(isset($events) )    
                                            @foreach($events as $event)
                                              @if ($event->status_enabled > 0 AND $event->status_enabled < 3)  <!-- if event is approved by admin - display it ! -->
                                                <tr>
                                                    <td><a href="/viewrec/{{$event->id}}">{{$event->eventName}}</a></td>
                                                    <td>{{$event->eventOwner}}</td>
                                                    <td>{{$event->eventDate1}},&nbsp;&nbsp;</br>{{$event->eventTime1}}</td>
                                                    <td>{{$event->eventDate2}},&nbsp;&nbsp;</br>{{$event->eventTime2}}</td>
                                                    <td>{{$event->eventLocation}}, {{$event->eventRoom}}</td>
                                                    <td>{{$event->eventDescription}}</td>
                                                </tr>
                                              @endif
                                             @endforeach
                                             @endif
                                             
                                            @if(isset($cigos) )    
                                            @foreach($cigos as $order)
                                           
                                                <tr>
                                                    <td>{{$order->fname}}</td>
                                                    <td>{{$order->lname}}</td>
                                                    <td>{{$order->date}}</td>
                                                    <td></td>
                                                    
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            
                                                            @switch($order->status)
                                                                @case(0)
                                                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Pending
                                                                    </button>
                                                                    @break
                                                                @case(1)
                                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Assigned
                                                                    </button>
                                                                    @break
                                                                @case(2)
                                                                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    On Route
                                                                    </button>
                                                                    @break
                                                                @case(3)
                                                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Done
                                                                    </button>
                                                                    @break
                                                                @case(4)
                                                                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Cancelled
                                                                    </button>
                                                                    @break    
                                                            
                                                                @default
                                                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Dropdown button
                                                                    </button>
                                                            @endswitch
                                                            
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="newstatus/{{$order->id}}/0">Pending</a>
                                                            <a class="dropdown-item" href="newstatus/{{$order->id}}/1">Assigned</a>
                                                            <a class="dropdown-item" href="newstatus/{{$order->id}}/2">On Route</a>
                                                            <a class="dropdown-item" href="newstatus/{{$order->id}}/3">Done</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="newstatus/{{$order->id}}/4">Cancelled</a>
                                                          </div>
                                                        </div>
                                                        
                                                    </td>
                                                    
                                                    
                                                    <!-- only while order has pending or assigned status, it can be deleted-->
                                                    @if ((int)$order->status <2)  
                                                        <td><a onclick="return myFunction();" href="/deleteorder/{{$order->id}}">(X)</a></td>
                                                        <script>
                                                            function myFunction() {
                                                                if(!confirm("Are you sure about deleting this order?"))
                                                                     {event.preventDefault()} else
                                                                alert("This order has been deleted from the system!");
                                                            }
                                                        </script>
                                                    @else
                                                        <td>(X)</td>
                                                    @endif
                                                </tr>
                                         
                                             @endforeach
                                             @endif 
                                             
                                            </tbody>
                                        </table>
                                        <br>
                                        
                                        <div class="col-6 offset-4">
                                         @if(isset($events) )      
                                            {{$events->links()}}  <!-- Pagination-->
                                         @endif    
                                        </div>
                                    
                                </div>
                                   

                            </div>
                                        <!--<div class="col-2">
                                            <img src="{{ URL::asset('images/banner.png') }}"/>
                                        </div> -->
                        </div>
                    </div>
                </div>
                </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
