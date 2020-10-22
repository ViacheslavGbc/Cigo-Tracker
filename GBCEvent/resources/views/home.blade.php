@extends('layouts.app')

@section('content')

<script src="https://kit.fontawesome.com/bb250377d6.js" crossorigin="anonymous"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-9 offset-1">

                <div class="card-header h2" align="center">
                    Welcome Home!<!--Upcoming Events-->
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
                                <th>Date 1</th>
                                <th>Date 2</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                    @if (Auth::user()->id == $event->created_by )  <!-- owner only can see her or his events-->
                                        <tr>
                                            <td><a href="/viewrec/{{$event->id}}">{{$event->eventName}}</a></td>
                                            <td>{{Auth::user()->name}}&nbsp;{{Auth::user()->lname}}</td>
                                            <td>{{$event->eventDate1}},&nbsp;&nbsp;{{$event->eventTime1}}</td>
                                            <td>{{$event->eventDate2}},&nbsp;&nbsp;{{$event->eventTime2}}</td>
                                            <td>{{$event->eventLocation}}, {{$event->eventRoom}}</td>
                                            <td>{{$event->eventDescription}}</td>
                                            <td>
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
                                            @else
                                                <span class="text-success">Enabled</span>
                                            @endif
                                            </td>
                                           
                                           @if (Auth::user()->user_type > 1) <!-- not an owner or admin logged in? No access!-->
                                            <td>
                                                <a href="/editrec/{{$event->id}}">Edit</a>
                                                |
                                                <a onclick="return myFunction();"href="/delete/{{$event->id}}">Delete</a>

                                                <script>
                                                    function myFunction() {
                                                        if(!confirm("Are you sure to delete this event?"))
                                                            event.preventDefault();
                                                    }
                                                </script>
                                                |
                                                <a href="">View Report</a>
                                            </td>
                                           @endif
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                          <br>

                        <div class="col-6 offset-4">
                            {{$events->links()}}
                        </div>

                </div>
               </div>
            @if (Auth::user()->user_type > 1) <!-- not an owner or admin logged in? No access! -->
                <a href="/callcreate"><button class="btn btn-success new"><i class="fas fa-plus"></i></button></a>
                <a href="/profile"><button class="btn btn-success"> <i class="far fa-calendar-alt"></i>&nbsp;My Events </button></a>
                @if (Auth::user()->user_type > 2) <!-- Hi, Maziar!  -->
                    <a href="/dashboard"><button class="btn btn-success"> Dashboard </button></a>
                @endif
                <p>New events will be displayed to users after approval</p>
            @endif
        </div>
        </div>
    </div>


@endsection
