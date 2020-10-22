@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">

                <div class="card-header h2">Modify Event:&nbsp;&nbsp;&nbsp;{{$event->eventName}}</div>

                <div class="card-body">
                    <form action="/update/{{$event->id}}" method="post">
                        <div class="row">
                            <label class="col-form-label col-6">Event Manager</label>
                            <input type="text" class="form-control col-6" name="eventOwner" value="{{$event->eventOwner}}" required>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-form-label col-6">Full Event Title</label>
                            <input type="text" class="form-control col-6" name="eventName" value="{{$event->eventName}}" required>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-form-label col-6"> Dates </label>
                            <div class="col-6">
                                <input type="date" class="form-control" name="eventDate1" value="{{$event->eventDate1}}" required>
                                <input type="time" class="form-control" name="eventTime1" value="{{$event->eventTime1}}" required>
                                <br>
                                <input type="date" class="form-control" name="eventDate2" value="{{$event->eventDate2}}" required>
                                <input type="time" class="form-control" name="eventTime2" value="{{$event->eventTime2}}" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-form-label col-6">Location</label>
                            <select class="form-control col-6" name="eventLocation">
                                <option name="cl" <?php if($selected=='Casa Loma') echo "selected='selected'";?>>Casa Loma</option>
                                <option name="sj" <?php if($selected=='St.James') echo "selected='selected'";?>>St.James</option>
                                <option name="wf" <?php if($selected=='Waterfront') echo "selected='selected'";?>>Waterfront</option>
                            </select>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-form-label col-6">Room</label>
                            <input type="text" name="eventRoom" class="form-control col-6"  value="{{$event->eventRoom}}" required >
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-form-label col-6"> Max. Participants </label>
                            <input type="text" class="form-control col-6" name="maxNumParticipants" value="{{$event->maxNumParticipants}}" required>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-form-label col-6"> Detailed Description</label>
                            <textarea type="text"  class="form-control col-6" name="eventDescription" required>{{$event->eventDescription}}"</textarea>
                        </div>
                        <hr>
                        {{csrf_field()}}
                        <div class="offset-4">
                    <input type="submit"  class="btn btn-success" name="Submit" value="Save Changes">&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/home" class="btn btn-success">Cancel</a>
                        </div>
                    </form>


                    </br>
                    <div class = "container">
                        <h6 align="center">Upload File</h6>
                        <!--https://www.youtube.com/watch?v=16WA9UeEfNs
                        https://www.youtube.com/watch?v=mf_vLlu0LI8 -->
                        @if(count($errors) > 0)
                            <div class = "alert alert-danger">
                                <br>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($message = Session::get('success'))
                            <div class = "alert-success alert-block">
                                <button type="button" class = "close" data-dismiss="alert">x</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            <img src="/images/{{Session::get('path') }}" width = "300"/>
                        @endif
                        <form method = "post" action = "{{ url('/uploadfile') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <table class="table">
                                    <tr>
                                        <td width="40%" align="right"><label>
                                                Select file to upload</label></td>
                                        <td width="30"><input type="file" name ="select_file"/><input type="hidden" name="event_id" value="{{ $event->id }}" /></td>
                                        <td width="30" align="left"><input type="submit" name ="upload" class="btn btn-primary" value = "Upload"/></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" align="right"></td>
                                        <td width="30%"><span class="text-muted">
                                                    jpeg, jpg, png, gif, pdf, docx, txt, ppt </span>
                                        </td>>
                                    </tr>
                                </table>
                            </div>
                        </form>
                        </br>
                    </div>


                </div>


            </div>
        </div>
        <div class="col-6" >
            <div id="stamp">
                Today is:&nbsp;&nbsp;&nbsp;&nbsp;<b><span id="ct"></span></b>
            </div>
            <div id="map">
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
            </div>
        </div>

    </div>
</div>
@endsection

