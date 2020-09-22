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
    <div class="card">
        <div class="card-header"><b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b></div>

        <div class="card-body">

            @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                <h2>{{ ucfirst($type) }}</h2>

                @foreach($modelSearchResults as $searchResult)
                    <ul>
                        <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
                    </ul>
                @endforeach
            @endforeach

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