@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 ">
                <div class="card">
                    <div class="card-header h2" align="center">Event Details:&nbsp;&nbsp;&nbsp;&nbsp;{{$event->eventName}}</div>
                    <div class="card-body">

                            <div class="row">
                                <label class="col-form-label col-6"> Event Manager: </label>
                                <input type="text" class="form-control col-6" name="eventOwner" value="{{$event->eventOwner}}" readonly>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-form-label col-6"> Location </label>
                                <input type="text" class="form-control col-6" name="eventLocation" value="{{$event->eventLocation}}" readonly>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-form-label col-6"> Room </label>
                                <input type="text" class="form-control col-6" name="eventRoom" value="{{$event->eventRoom}}" readonly>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-form-label col-6"> Dates </label>
                                <p class="col-6">
                                    <input type="date"  class="form-control" name="eventDate1" value="{{$event->eventDate1}}" readonly>
                                    <input type="time"  class="form-control" name="eventTime1" value="{{$event->eventTime1}}" readonly>
                                    <br>
                                    <input type="date"  class="form-control" name="eventDate2" value="{{$event->eventDate2}}" readonly>
                                    <input type="time"  class="form-control" name="eventTime2" value="{{$event->eventTime2}}" readonly>
                                </p>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-form-label col-6"> Event Description</label>
                                <textarea type="text" class="form-control col-6" name="eventDescription" readonly>{{$event->eventDescription}}</textarea>
                            </div>
                            <br>

                            <div class="row">
                                <label class="col-form-label col-6"> # Of Participants</label>
                                <!-- Taking count of users, registered for an event here: -->
                                <input type="text" class="form-control col-6" name="eventDescription" value="{{$event->users()->count()}}" readonly><hr>


                            </div>
                            @if(isset(Auth::user()->id)) <!--Only when user is logged in -->
                                @if($canSignUp == 0)
                                    <form method="post" action="/subscribe/{{$event->id}}/{{Auth::user()->id}}" >
                                        {{csrf_field()}}
    
                                       <!--!!! https://www.tutorialspoint.com/laravel/laravel_sending_email.htm -->
    
                                        <input type="submit" name="Submit" value="Sign Up">
                                    </form>
                                @else
                                    </br>
                                    <h5 class="text-success"> You already signed up for this event </h5>
                                    </br>
                                @endif
                                <a href="/" class="btn btn-success">Back</a>
                                @if (isset($result) and !empty($result))
                                    <hr>
                                    <h4>Files to Download </h4>

                                     @foreach($result as $res)

                                        <a href="/file/download/{{$event->id}}/{{$res}}">{{$res}}</a>
                                         <br>
                                     @endforeach
                                @endif

                                <!--<a href={{--asset('file/logoDAAA.jpg')--}}>Thing</a> -->
                                <!--Storage::allFiles(app/public/images/{{--$event->id--}}); -->

                                <!--Storage::allFiles(storage/app/public/uploads{{--$event->id--}});
                                <a href="{{--route('downloadfile', $file->id)--}} " class="btn btn-primary ">Download</a>-->
                            
                                <hr />

                                <h4>Comments</h4>
                            <!--
                                @include('commentsReply', ['comments' => $event->comments, 'event_id' => $event->id])
                            -->
                                @include('partials._comment_replies', ['comments' => $event->comments, 'event_id' => $event->id])

                                <form method="post" action="/comments/store">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" name="message"></textarea>
                                        <input type="hidden" name="event_id" value="{{ $event->id }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Add Comment" />
                                    </div>
                                </form>

                            @else
                            <label>Please, log in to subscribe for this event..</label>
                        @endif
                            <br>
                        <div class="offset-5">
                        @if(!isset(Auth::user()->id)) <!--Only while user is NOT logged in -->
                            <a href="/home" class="btn btn-success">Log In</a>
                        @endif
                            <a href="/" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6" >
                <div id="stamp">
                    Today is:&nbsp;&nbsp;&nbsp;&nbsp;<b><span id="ct"></span></b>
                </div>
                <div id="map">
                    <!-- link describes why $selected has not been set, so map is not shown:  https://stackoverflow.com/questions/53500201/undefined-variable-laravel-->
                    @if(isset($selected))

                        <!-- Displaying the map -->
                        <?php

                            if ($selected == "Casa Loma"){
                                echo "<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2885.65543464594!2d-79.41267698477122!3d43.67613545896579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b349c7e14727f%3A0x8bd06e05bd9af30d!2sGeorge+Brown+College+Casa+Loma+Campus!5e0!3m2!1sen!2sca!4v1550117318645' width='500' height='350' frameborder='0' style='border:0' allowfullscreen></iframe>";
                            }
                            else if($selected == "St.James"){
                                echo "<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.8500436395975!2d-79.372422384772!3d43.65128816057281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb308d8c451f%3A0x2a2d39cb9b79ac42!2sGeorge+Brown+College+St.+James+Campus!5e0!3m2!1sen!2sca!4v1550117358751' width='500' height='350' frameborder='0' style='border:0' allowfullscreen></iframe>";
                            }
                            else{
                                echo "<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2887.1109232844424!2d-79.36687739508416!3d43.645860485513914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb24382107b9%3A0xd5913915d08fdc8a!2sGeorge+Brown+College+Waterfront+Campus!5e0!3m2!1sen!2sca!4v1550117470344' width='500' height='350' frameborder='0' style='border:0' allowfullscreen></iframe>";
                            }
                        ?>

                    @endif
                </div>




            </div>
        </div>
    </div>
@endsection
