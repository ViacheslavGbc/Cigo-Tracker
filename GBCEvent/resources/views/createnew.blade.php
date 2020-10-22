@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div id="stamp" class="text-center">
                    Today is:&nbsp;&nbsp;&nbsp;&nbsp;
                    <b><span id="ct"></span></b>
                </div>
                <div class="card">

                    <div class="card-header h2" align="center">
                        Create An Event
                    </div>
                    <div class="card-body">
                        <form action="/create" method="post">

                            <div class="row">
                                <label class="col-form-label col-6">Event Manager</label>
                                <input type="text" name="eventOwner" class="form-control col-6" placeholder="Owner Name" required>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-form-label col-6"> Full Event Title </label>
                                <input type="text" name="eventName" class="form-control col-6" placeholder="Master-Class" required>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-form-label col-6">Dates & Times</label>
                                <div class="col-6">
                                    <input type="date" name="eventDate1" class="form-control" required>
                                    <input type="time" name="eventTime1" class="form-control" required>
                                    <br>
                                    <input type="date" name="eventDate2" class="form-control" >
                                    <input type="time" name="eventTime2" class="form-control" >
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-form-label col-6">Location</label>
                                <select class="form-control col-6" name="eventLocation">
                                    <option name="cl">Casa Loma</option>
                                    <option name="sj">St.James</option>
                                    <option name="wf">Waterfront</option>
                                </select>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-form-label col-6">Room</label>
                                <input type="text" name="eventRoom" class="form-control col-6" placeholder="C418" required >
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-form-label col-6">Max. Participants</label>
                                <input type="text" name="maxNumParticipants" class="form-control col-6" placeholder="100" required>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-form-label col-6">Detailed Description</label>
                                <textarea type="text" name="eventDescription" class="form-control col-6"
                                          rows=4 placeholder="Unexpectedly sharp and bright seminar" required>
                                </textarea>
                            </div>
                            <br>
                            {{csrf_field()}}
                            <div class="col-sm-6 offset-4">
                                <input type="submit" name="Submit" class="btn btn-success" value="Add Record">&nbsp&nbsp&nbsp&nbsp
                                <a href="/home" class="btn-success btn">Cancel</a>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
