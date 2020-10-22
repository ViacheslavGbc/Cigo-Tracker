@extends('layouts.app')

@section('content')

<script src="https://kit.fontawesome.com/bb250377d6.js" crossorigin="anonymous"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-9 offset-1">

                <div class="card-header h2" align="center">
                    Profile page <!--Upcoming Events-->
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
                                <th>Dates</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                          <br>
                    
                        <div class="col-6 offset-4">

                            <!--Declaration for events was here -->

                        </div>
                </div>
               </div>
            @if (Auth::user()->user_type > 1) <!-- not an owner or admin logged in? No access! -->
                <a href="/callcreate"><button class="btn btn-success new"><i class="fas fa-plus"></i></button></a>
                <a href="/home"><button class="btn btn-success"> <i class="far fa-calendar-alt"></i>&nbsp;Upcoming Events </button></a>
                @if (Auth::user()->user_type > 2) <!-- Hey, admin!  -->
                    <a href="/dashboard"><button class="btn btn-success"> Dashboard </button></a>
                @endif
                <p>New events will be displayed to users after approval</p>


            @endif
        </div>
        </div>
    </div>


@endsection
