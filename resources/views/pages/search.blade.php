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
body{margin-top:20px;
}

.btn {
    margin-bottom: 5px;
}

.grid {
    position: relative;
    width: 100%;
    color: #666666;
    border-radius: 10px;
    background: white;
    margin-bottom: 25px;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.6);
}

.grid .grid-body {
    padding: 15px 20px 15px 20px;
    font-size: 1em;
    line-height: 1.9em;
}

.search table tr td.rate {
    color: #f39c12;
    line-height: 50px;
}

.search table tr:hover {
    cursor: pointer;
}

.search table tr td.image {
	width: 50px;
}

.search table tr td img {
	width: 50px;
	height: 50px;
}

.search table tr td.rate {
	color: #f39c12;
	line-height: 50px;
}

.search table tr td.price {
	font-size: 1.5em;
	line-height: 50px;
}

.search #price1,
.search #price2 {
	display: inline;
	font-weight: 600;
}
/*responsive*/
.Verify {
  margin-top: 20px !important;
  font-family: Montserrat  !important;
  font-size: 15px  !important;
  font-weight: 700  !important;
  font-stretch: normal  !important;
  font-style: normal  !important;
  line-height: normal  !important;
  letter-spacing: normal  !important;
  color: #167aff  !important;
}

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
  <div class="content-wrapper">
  <div class="pr-5 my-4 d-flex align-items-stretch">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
  <!-- BEGIN SEARCH RESULT -->
  <div class="col-md-12">
    <div class="grid search">
      <div class="grid-body">
        <div class="row">
          <!-- BEGIN RESULT -->
          <div class="col-md-12">
            <h5><i class="fas fa-search p-2 "></i>Search Result</h5>
            <hr>
            <p>Showing all results matching to your search</p>
            
            <div class="padding"></div>
            
            <!-- BEGIN TABLE RESULT -->
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody>
                @foreach($employees as $employee)
                @foreach($id as $data)
                @if($employee->employee_id == $data)
                @if(strlen($data) < 5)
                <tr>
                  <td class="product"><strong>{{ $employee->first_name }} {{ $employee->last_name }}</strong><br>Search results from User list.</td>
                  <td class="Verify text-right pt-4">
                  <a href="{{ url('employees/details/'.$employee->employee_id) }}" type="submit">
                    View Details <i class="fa fa-angle-right" aria-hidden="true"></i>
                  </a> </td>
                </tr>
                @endif
                @endif
                @endforeach
                @endforeach

                @foreach($orders as $order)
                @foreach($id as $data)
                @if(md5($order->id) == $data)
                @if(strlen($data) >= 5)
                <tr>
                  <td class="product"><strong>{{ $order->first_name }} {{ $order->last_name }}</strong><br>Search results from Report list.</td>
                  <td class="Verify text-right pt-4"><a href="{{ url('/surveys/details/'.$data) }}"> View Details <i class="fa fa-angle-right" aria-hidden="true"></i></a> </td>
                </tr>
                @endif
                @endif
                @endforeach
                @endforeach
              </tbody></table>
            </div>
            <!-- END TABLE RESULT -->
          </div>
          <!-- END RESULT -->
        </div>
      </div>
    </div>
  </div>
  <!-- END SEARCH RESULT -->
</div>
</div>
</div>
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
