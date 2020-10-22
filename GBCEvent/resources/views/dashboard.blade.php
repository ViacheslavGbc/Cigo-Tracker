@extends('layouts.app')

@section('content')

<!--@svg('brands/github')
@svg('regular/bars', 'text-white') // I thought this directive would work for fontawesome, nope. -->

  <script src="https://kit.fontawesome.com/bb250377d6.js" crossorigin="anonymous"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-9 offset-1">
                
               <span id="top"></span>
                
                <div class="card-header h2" align="center">
                    Main Dashboard 
                    <div class="row" style="height: 20px">
                    </div>
                     <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 offset-1 border border-success text-success bg-light" style="height: 80px; width: 100px" >
                                <i class="fas fa-sitemap"></i>&nbsp;<h5> {{$cevents}} Events Total</h5>
                            </div>
                            <div class="col-md-3 offset-1 border border-success text-success bg-light" style="height: 80px; width: 100px" >
                               <i class="fa fa-users"></i>&nbsp; <h5 class="text-success"> {{$cparticipants}} Active Users </h5>
                            </div>
                            <div class="col-md-3 offset-1 border border-success text-success bg-light" style="height: 80px; width: 100px" >
                               <i class="fas fa-key"></i>&nbsp;<h5 class="text-success"> {{$cowners}} Owners </h5>
                            </div>
                        </div>
                       <div class="row" style="height: 15px">
                       </div>
                        <div class="row">
                            <div class="col-md-3 offset-1 border border-success text-success bg-light" style="height: 80px; width: 100px" >
                                <i class="far fa-bell"></i>&nbsp;<h5 class="text-success"> {{$cusers}} Users Registered Total </h5>
                            </div>
                            <div class="col-md-3 offset-1 border border-success text-success bg-light" style="height: 80px; width: 100px" >
                                <i class="far fa-comments"></i>&nbsp;<h5 class="text-success"> {{$ccomments}} Comments Added </h5>
                            </div>
                            <div class="col-md-3 offset-1 border border-success text-success bg-light" style="height: 80px; width: 100px" >
                               <i class="fas fa-paperclip"></i>&nbsp;<h5 class="text-success"> {{$cnewEvents}} New Events Created </h5>
                            </div>
                        </div>
                     </div>
                    <div class="row" style="height: 20px">
                    </div>
                    

                           
                            
                            <!--  <div class="container-fluid">
                           
                               <ul class="nav navbar-nav"> 
                              <table class = "table table-hover card-header h4">
                                  <thead>
                                  
                              
                                 <th><li class="active"><a href="/home"><i class="fa fa-home-lg-alt"></i>Home </a></li></th>
                                 
                                  <th><li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="far fa-calendar-alt"></i>&nbsp; Events <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li><a href="/callcreate">Create Event</a></li>
                                      <li><a href="/profile">My Events</a></li>
                                      <li><a href="#">All New Events</a></li>
                                      <li><a href="#">Current Changes</a></li>
                                      <li><a href="#">Delete Events</a></li>
                                     </ul>
                                   </li>
                                </th>
                                <th>
                                  
                                   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-users"></i>&nbsp; Users <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Create New Owner</a></li>
                                      <li><a href="#">Change User Status</a></li>
                                      <li><a href="#">Delete User</a></li>
                                    </ul>
                                  </li>
                                </th>
                                <th>
                                   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="far fa-comments"></i>&nbsp;Comments <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">New Comments</a></li>
                                      <li><a href="#">Delete Comment</a></li>
                                    </ul>
                                  </li>
                            
                                </th>
                                
                                 </thead>
                                </table>
                                </ul>
                              </div> -->
                            

</div>



                    
                    <div id="aevents" class="card-header h4" align="center">
                        Events  <h6><a href="#ausers">Go Users</a> &nbsp;/ &nbsp; <a href="#acomments">Go Comments </a></h6>
                    </div> 
                    
                    
                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class = "table table-hover">
                            <thead>
                                <th>Title</th>
                                <th>Owner</th>
                                <th>Date1</th>
                                <th>Date2</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($events as $event)

                                    <tr>
                                        <td><a href="/viewrec/{{$event->id}}">{{$event->eventName}}</a></td>
                                        <td>{{$event->eventOwner}}</td>
                                        <td>{{$event->eventDate1}},&nbsp;&nbsp;{{$event->eventTime1}}</td>
                                        <td>{{$event->eventDate2}},&nbsp;&nbsp;{{$event->eventTime2}}</td>
                                        <td>{{$event->eventLocation}}, {{$event->eventRoom}}</td>
                                        <td>{{$event->eventDescription}}</td>
                                        
                                        <td>
                                            @if($event->status_enabled == 0)
                                                <span class="text-success"><b>New Event</b></span>
                                            @endif  
                                            @if($event->status_enabled == 1)
                                                <span class="text-success">Enabled</span>
                                            @endif 
                                            @if($event->status_enabled > 2) 
                                                <span class="text-danger">Blocked / 
                                                @if($event->status_enabled == 3)
                                                    Descrimination issue
                                                @endif
                                                @if($event->status_enabled == 4)
                                                    Scope issue
                                                @endif
                                                @if($event->status_enabled == 5)
                                                    Not Legal 
                                                @endif
                                                @if($event->status_enabled == 6)
                                                    Contact college administration for details
                                                @endif
                                                @if($event->status_enabled == 7)
                                                    Date, Time  or Location adjustment required 
                                                @endif
                                                </span>
                                            @endif
                                        </td>



                                        <td>
                                            <!--<a href="/editrec/{{--$event->id--}}">Post It</a> -->
                                            @if($event->status_enabled != 1 ) 
                                                <a onclick="return myFunctionEvent();"href="/allowEvent/{{$event->id}}">Make&nbspVisible</a>
                                                <br>
                                            @endif
                                            <a onclick="return myFunction();"href="/delete/{{$event->id}}">Delete</a>
                                            <br>
                                            <a onclick="return FunctionBlock();"href="/refuse/{{$event->id}}">Block Event</a>

                                            <script>
                                                function myFunction() {
                                                    if(!confirm("Are you sure to delete this event?"))
                                                         {event.preventDefault()} else
                                                    alert("This event has been deleted from the system!");
                                                }
                                                function myFunctionEvent() {
                                                    if(!confirm("Ok to make this visible to users?"))
                                                         {event.preventDefault()} else
                                                    alert("This event is successfully published!");
                                                }
                                                function FunctionBlock() { 
                                                    if(!confirm("You are about to block an event.."))
                                                         {event.preventDefault()} else
                                                    alert("Redirecting..");
                                                }
                                            </script>
                                            <!--<br>
                                            <a href="">View&nbsp;Report</a>-->
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                    <hr>
                        <div id="ausers" class="card-header h4" align="center">
                            Users <h6><a href="#aevents"> Go Events</a>&nbsp; / &nbsp;<a href="#acomments">Go Comments </a></h6>
                        </div>
                        <table class = "table table-hover">
                            <thead>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Email verified</th>
                            <th>Status</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)

                                <tr>

                                    <td>{{$user->lname}},&nbsp {{$user->name}}&nbsp;</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->email_verified_at}}</td>
                                    <td>
                                            @if($user->user_type == 0) 
                                                <span class="text-danger">Blocked</span>
                                            @endif    
                                            @if($user->user_type == 1)     
                                                <span class="text-success">Active</span>
                                            @endif
                                            @if($user->user_type == 2)     
                                                <span class="text-success">Owner</span>
                                            @endif
                                            @if($user->user_type == 3)     
                                                <span class="text-primary"><b>Admin</b></span>
                                            @endif
                                    </td>
                                    <td>
                                        @if($user->user_type ==0) 
                                            <a onclick="return myFunctionAdd();"href="/makeActive/{{$user->id}}">Add User</a>
                                            <br>
                                        @endif
                                        @if($user->user_type ==1) 
                                            <a onclick="return myFunctionOwner();"href="/makeOwner/{{$user->id}}">Make an Owner</a>
                                            <br>
                                        @endif
                                        @if($user->user_type !=0) 
                                            <a onclick="return myFunctionBlock();"href="/blockUser/{{$user->id}}">Block account</a>
                                            <br>
                                        @endif
                                        <a onclick="return myFunctionUser();"href="/deleteUser/{{$user->id}}">Delete user</a>

                                        <script>
                                             function myFunctionAdd() {
                                                if(!confirm("Do you want to make this account active?"))
                                                     {event.preventDefault()} else
                                                    alert("This account is activated!");
                                            }
                                            function myFunctionUser() {
                                                if(!confirm("Do you want to completely delete this account?"))
                                                     {event.preventDefault()} else
                                                    alert("This account has been terminated!");
                                            }
                                            function myFunctionBlock() {
                                                if(!confirm("Do you want to block this account?"))
                                                    {event.preventDefault()} else
                                                    alert("This account has been blocked!");
                                            }
                                           function myFunctionOwner() {
                                                if(!confirm("Do you want allow this user to create new events?"))
                                                {event.preventDefault()} else
                                                    alert("Owner successfully created!");
                                            }
                                        </script>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <br>
                        <hr>
                        <div id="acomments" class="card-header h4" align="center">
                            Comments <h6><a href="#aevents"> Go Events</a> &nbsp;/ &nbsp; <a href="#ausers">Go Users </a></h6>
                        </div>
                        <table class = "table table-hover">
                            <thead>
                            <th>Event id</th>
                            <th>User id</th>
                            <th>Message</th>
                            <th>Created</th>
                            <th>Status</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)

                                <tr>
                                    <td><a href="/viewrec/{{$comment->event_id}}">{{$comment->event_id}}</a></td>
                                    <td><a href="/viewrec/{{$comment->user_id}}">{{$comment->user_id}}</a></td>
                                    <td>{{$comment->message}}</td>
                                    <td>{{$comment->created_at}}</td>
                                    <td> 
                                            @if($comment->status_enabled == 0) 
                                                <span class="text-danger">Blocked</span>
                                            @endif    
                                            @if($comment->status_enabled == 1)     
                                                <span class="text-success">Visible</span>
                                            @endif
                                    </td>
                                    <td>
                                        @if($comment->status_enabled == 0) 
                                            <a onclick="return myFunctionPost();"href="/postComment/{{$comment->id}}">Post it</a>
                                            <br>
                                        @endif
                                        @if($comment->status_enabled == 1) 
                                            <a onclick="return myFunctionStop();"href="/blockComment/{{$comment->id}}">Block comment</a>
                                            <br>
                                        @endif
                                        <a onclick="return myFunctionDiscard();"href="/discardComment/{{$comment->id}}">Discard</a>

                                        <script>
                                            function myFunctionPost() {
                                                if(!confirm("You are allowing this comment?"))
                                                     {event.preventDefault()} else
                                                    alert("This comment is posted...");
                                            }
                                            function myFunctionStop() {
                                                if(!confirm("Are you sure you want to block this comment?"))
                                                     {event.preventDefault()} else
                                                    alert("This comment has been blocked...");
                                            }
                                            function myFunctionDiscard() {
                                                if(!confirm("Discard this comment?"))
                                                     {event.preventDefault()} else
                                                    alert("This comment has been deleted from the system...");
                                            }
                                        </script>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                          <br>
                    
                        <div class="col-6 offset-4">
                         <!-- Declaration for $events was here-->

                        </div>
                </div>
               </div>

                <a href="/callcreate"><button class="btn btn-success new"><i class="fas fa-plus"></i></button></a>
                <a href="/profile"><button class="btn btn-success"> <i class="far fa-calendar-alt"></i>&nbsp;My Events </button></a>
                <a href="/home"><button class="btn btn-success"> Upcoming events </button></a>
                
            <br>
            <p>New events and comments will be displayed to users after the approval</p>
            <a href="#top"> Go Top </a>
        </div>
        </div>
    </div>


@endsection
