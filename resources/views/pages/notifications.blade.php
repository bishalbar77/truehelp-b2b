{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Dashboard</title>
<link rel="stylesheet" href="{{ mix('css/app.css') }}" />
<script defer src="{{ mix('js/app.js') }}"></script>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

<style type="text/css">
.Oval {
  width: 40px;
  height: 40px;
}
.nav-name {
  margin-top: 3px;
  font-family: Helvetica;
  font-size: 15.8px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.25;
  letter-spacing: normal;
  color: #121212;
}

body{
  font-family: Montserrat;
}

/*
responsive*/

@media screen and (min-width: 601px) {


.ver5 {
font-size: 17px;
/*font-size: 120%;*/  
}
.ver4{
font-size: 18px;
}
.ver3{
font-size: 150%;
}
}

@media screen and (max-width: 600px) {
.ver5 {
font-size: 14px;
}


.ver3{
font-size: 20px;
}







.ver2{
font-size: 15px;
}
.ver4{
font-size: 15px;
}

}



.ver3,.ver4,.ver5{
font-weight: 700;
}
.pro-wgt{
font-weight: 600;
}

.wi{
color: rgb(253 253 253);
}




.bl{
color: rgb( 19 20 21);

}

.shade-bl{
color:rgb(153 153 153);

}

.gr{
color: rgb( 12 175 82);

}

.re{
color: rgb(235 75 75);
}
.full-bl{
color:rgb(0 0 0);
}

.medium-bl{
color: rgb(76 77 76);
}

.blu{
color: rgb(0 122 255);
}

.ver2{
font-family: 'Montserrat'; color: rgb(255 255 255);
}
.wgt-600{
font-weight: 600;
}


.card-new {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 15px;
}
.card-new-grey {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: rgb(232 232 232);
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 15px; 
}
/*responsive*/


</style>

@endsection

{{-- Content --}}
@section('content')
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
      <li>
        <div class="pl-4">
          <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar"  class="Oval img-circle">
        </div>
      </li>
      <li class="pl-2 pt-2">
        <p class="nav-name">{{ session()->get('first_name') }}</p>
      </li>
      <li class="pl-2 pt-2">
        <i class="fa fa-caret-down"></i>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto pl-5">
    </ul>
  </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>

  <div class="container col-md-8 my-4">
    @foreach ($nf_message as $message)
    @if($message->is_seen=='Y')
    <div class="card-new my-3 rad shadow">
      @else
      <div class="card-new my-3 rad shadow" style="background-color: lightskyblue ;">
      @endif
      <div class="card-body">

        <a href="{{ url('seenNotification/'.$message->id.'/'.$message->nf_action_url) }}">
        <h5 class="ver5"><div class="d-flex align-items-stretch ">
          <div class="w-100 full-bl wgt-600"><i class="fa fa-user-circle"> &nbsp</i>{{$message->nf_message}}</div>
          {{$message->date}}
          <!-- surveys/reports --><!-- 
          <a href="url('seenNotification/'.$message->id) " class="full-bl">  <div class="flex-grow-1 "><i class="fa fa-angle-right"></i></div></a> -->

        </div></h5></a>

      </div>
    </div>
    @endforeach

  <!--   <div class="card-new my-3 rad shadow ">
      <div class="card-body">
        <h5 class="ver5"><div class="d-flex align-items-stretch ">
          <div class="w-100 full-bl wgt-600"><i class="fa fa-edit"> &nbsp</i><span class="re">Possible criminal record </span>found for Mr. Leoroy sane
          </div>


          <a href="" class="full-bl">  <div class="flex-grow-1 "><i class="fa fa-angle-right"></i></div></a>

        </div></h5>
      </div>
    </div>

    <div class="card-new my-3 shadow rad">
      <div class="card-body">
       <h5 class="ver5"><div class="d-flex align-items-stretch ">
        <div class="w-100 full-bl wgt-600"><i class="fa fa-user-circle"> &nbsp</i>Driving License Verification for Rohan Sakore, Serjio Augeoro, David Silva, and 3others is completed
        </div>

        
        <a href="" class="full-bl">  <div class="flex-grow-1 "><i class="fa fa-angle-right"></i></div></a>

      </div></h5>
    </div>
  </div>

  <div class="card-new my-3 shadow rad">
    <div class="card-body">
      <h5 class="ver5"><div class="d-flex align-items-stretch ">
        <div class="w-100 full-bl wgt-600"><i class="fa fa-user-circle"> &nbsp</i>Verification for Rohan Sakore, Serjio Augeoro, David Silva, and 3 others is completed.
        </div>


        <a href="" class="full-bl">  <div class="flex-grow-1 "><i class="fa fa-angle-right"></i></div></a>
      </div></h5>
    </div>
  </div>

  <div class="card-new-grey my-3 shadow rad">
    <div class="card-body">
     <h5 class="ver5"><div class="d-flex align-items-stretch ">
      <div class="w-100 full-bl wgt-600"><i class="fa fa-edit"> &nbsp</i><span class="re">Possible criminal record </span>found for Mr. Leoroy sane
      </div>


      <a href="" class="full-bl">  <div class="flex-grow-1 "><i class="fa fa-angle-right"></i></div></a>

    </div></h5>
  </div>
</div>

<div class="card-new-grey my-3 radius shadow ">
  <div class="card-body">
    <h5 class="ver5"><div class="d-flex align-items-stretch ">
      <div class="w-100 full-bl wgt-600"><i class="fa fa-user-circle"> &nbsp</i>Criminal Record Verification for Rohan Sakore, Serjio Audeoro, David Silva, and 3 others is completed
      </div>


      <a href="" class="full-bl">  <div class="flex-grow-1 "><i class="fa fa-angle-right"></i></div></a>

    </div></h5>
  </div>
</div>

<div class="card-new-grey my-3 rad shadow ">
  <div class="card-body">
   <h5 class="ver5"><div class="d-flex align-items-stretch ">
    <div class="w-100 full-bl wgt-600"><i class="fa fa-user-circle"> &nbsp</i>Verification for Rohan Sakore, Serjio Audeoro, David Silva, and 3 others is completed
    </div>

    <a href="" class="full-bl">  <div class="flex-grow-1 "><i class="fa fa-angle-right"></i></div></a>

  </div></h5>
</div>
</div>
 -->
</div>


@endsection

@section('scripts')
<link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
@if (app()->isLocal())
  <script src="{{ asset('js/app.js') }}"></script>
@else
  <script src="{{ mix('js/manifest.js') }}"></script>
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
@endif

<link rel="stylesheet" href="{{ mix('css/app.css') }}" />
<script defer src="{{ mix('js/app.js') }}"></script>
@endsection
