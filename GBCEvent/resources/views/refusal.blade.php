@extends('layouts.app')

@section('content')

<div class="container">
    </div class="raw">
        <div class= "col-md-7 offset-3" >
           <h1> Event Refusal Reasoning for:</h1>
           <h4> event name:&nbsp; 
           <a href="/viewrec/{{$event->id}}">{{$event->eventName}}</a>&nbsp; owner:&nbsp;{{$event->eventOwner}}  </h4>
           </br>
            </br>
            <div class= "list-group" >
            <a href="/refuse_res/{{$event->id}}/3" class="list-group-item list-group-item-action list-group-item-warning"> 
                <h4>&nbsp;&nbsp;Racial or minority discrimination</h4></a>
            </br>
            <a href="/refuse_res/{{$event->id}}/4" class="list-group-item list-group-item-action list-group-item-warning"> 
                <h4>&nbsp;&nbsp;Event topic is out of scope / not actual</h4></a>
            </br>
            <a href="/refuse_res/{{$event->id}}/5" class="list-group-item list-group-item-action list-group-item-warning"> 
                <h4>&nbsp;&nbsp;Not comply with governmental regulations / by-law</h4></a>
            </br>
            <a href="/refuse_res/{{$event->id}}/6" class="list-group-item list-group-item-action list-group-item-warning"> 
                <h4>&nbsp;&nbsp;Event should be discussed with college administration first</h4></a>
            </br>
            <a href="/refuse_res/{{$event->id}}/7" class="list-group-item list-group-item-action list-group-item-warning"> 
                <h4>&nbsp;&nbsp;Date / time / location should be adjusted </h4></a>
            </div>
            </br>
            <a href="/dashboard" class="btn btn-success">Cancel</a>
        </div>
    </div>
</div>

@endsection

