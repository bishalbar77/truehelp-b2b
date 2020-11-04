{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Notifications</title>
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
  background-color: #ffffff !important;
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
  
@include('layouts.header')
  <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>

  <div class="container col-md-8 my-4">
    @foreach ($nf_message as $message)
      @if($message->is_seen=='N')
      <div class="card-new my-3 rad shadow" style="background-color:#eceff3;">
        <div class="card-body">
          <h5 class="ver5"><div class="d-flex align-items-stretch ">
            <div class="w-75 full-bl wgt-600"><i class="fa fa-user-circle"> &nbsp</i>{{$message->nf_message}}</div>
                  <a class="padding-right: 10.75rem">{{ date(" H:i:s M d, Y",strtotime($message->date)) }} </a>
            <a href="" class="full-bl pl-4" style="float: right !important;"><i class="fa fa-angle-right"></i></a>
          </h5>
        </div>
      </div>
      @else
      <div class="card-new my-3 rad shadow" style="background-color:#fffffc;">
        <div class="card-body">
          <h5 class="ver5"><div class="d-flex align-items-stretch ">
            <div class="w-75 full-bl wgt-600"><i class="fa fa-user-circle"> &nbsp</i>{{$message->nf_message}}</div>
                  <a class="padding-right: 10.75rem">{{ date(" H:i:s M d, Y",strtotime($message->date)) }} </a>
            <a href="" class="full-bl pl-4" style="float: right !important;"><i class="fa fa-angle-right"></i></a>
          </h5>
        </div>
      </div>
      @endif
    @endforeach
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
