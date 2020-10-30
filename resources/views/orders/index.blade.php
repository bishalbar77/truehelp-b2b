{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Order Verification</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/boot.min.css">
<style>
body {
  background-color: #ffffff !important;
}
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
.My-employees {
  font-family: Montserrat;
  font-size: 18px;
  font-weight: 800;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: var(--black);
}
.t-head {
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: var(--black);
  overflow-x:auto;
}
.t-body {
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #85899a;
  overflow-x:auto;
}
.Rectangle-Copy-6 {
  border-radius: 15px;
  box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.14);
  background-color: #ffffff;
}
.nav-menu {
  height: 25px;
  font-family: Helvetica;
  font-size: 14.3px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.43;
  letter-spacing: normal;
  color: #ffffff;
}
.table-side-tag {
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #167aff;
}
.order-img {
  width: 90%;
}
.Request-sent {
  width:100%;
  font-family: Montserrat;
  font-size: 19px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: var(--black);
}
.Lorem-ipsum-dolor-si {
  height: 66px;
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #b6b8c3;
}
.fa-icon-lg {
  font-size: 1.6em;
  line-height: 0.05em;
  vertical-align: -35%;
}
.container-tag
{
  border: 2px solid #ccc;
  background-color: #ffffff;
}
.tab {
  float: left;
  border: 2px solid #ccc;
  background-color: #ffffff;
  width: 100%;
  height: 55rem;
  border-radius : 2px;
  padding: .8rem;
}
/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-family: Montserrat;
  font-weight: 600;
  font-size: 15px;
}
.content-box
{
  width:100%;
}
/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  font-family: Montserrat;
  font-weight: 600;
  font-size: 15px;
  background-color: #e8f2fe;
}
.text-name {
  font-family: Montserrat;
  font-size: 18.1px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.45;
  letter-spacing: normal;
  color: #000000;
}
.text-para {
  font-family: Montserrat;
  font-size: 13.1px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.45;
  letter-spacing: normal;
  color: #000000;
}
.para-button {
  width: 175px;
  height: 44px;
  border-radius: 5.6px;
  background-color: #167aff;
}
.para-text 
{
  font-family: Montserrat;
  font-size: 14.8px;
  font-weight: bold;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #ff8585;
}
.input-search {
  width: 100%;
  height: 40px;
  border-radius: 20.1px;
  border: solid 0.9px #e1e1e1;
  background-color: #fafafa;
  outline: none;
}
.inner-addon { 
    position: relative; 
}

.form-label-text {
  font-family: Montserrat;
  font-size: 14px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #000000;
}
.button-proceed {
  border-radius: 8px;
  background-color: #fecf3a;
}
.Proceed {
  font-family: Montserrat;
  font-size: 13px;
  font-weight: 700;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1px;
  text-align: center;
  color: var(--black);
}
.check-box-unselected {
  font-family: Montserrat;
  font-size: 14px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1px;
  text-align: center;
  color: #999999;
}
.check-box-selected {
  font-family: Montserrat;
  font-size: 14px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1px;
  text-align: center;
  color: #352641;
}
.Employee-currently-w {
  font-family: Montserrat;
  font-size: 14px;
  font-weight: 800;
  font-stretch: normal;
  font-style: bold;
  line-height: normal;
  letter-spacing: normal;
  color: #000000;
}
.upload-pink {
  width: 250px;
  height: 130px;
  border-radius: 10px;
  background-color: #ffe9f6;
}
.upload-blue {
  width: 250px;
  height: 130px;
  border-radius: 10px;
  background-color: #e9f6fe;
}
.Download-the-Excel-s {
  width: 526px;
  height: 25px;
  font-family: Montserrat;
  font-size: 19px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: var(--black);
}
.Lorem-ipsum-dolor-si {
  height: 66px;
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #b6b8c3;
}
.Download-Template {
  height: 20px;
  font-family: Montserrat;
  font-size: 14.8px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #167aff;
}
.VERIFIED {
  width: 78px;
  height: 19px;
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #07901a;
}
.Verify- {
  width: 68px;
  height: 22px;
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #167aff;
}
.UNVERIFIED {
  width: 104px;
  height: 19px;
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #9295a5;
}
.Path-107 {
  width: 6px;
  height: 13px;
  border: solid 1px #171819;
}
.Upload-Employee-Pic {
  height: 13px;
  font-family: Montserrat;
  font-size: 13px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  margin-left: 24px;
  margin-top: 10px;
  /* position: absolute; */
  position: relative;
  color: Black;
  z-index: 5;
}
.custom-file-input {
  color: transparent;
}
.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
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
.inner-addon { 
    position: relative; 
}

/* style icon */
.inner-addon .fa {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}
.col-lg-4 {
  padding-right: 0px !important;
  padding-left: 0px !important;
}
/* align icon */
.left-addon .fa  { 
  left:  0px;
  opacity: 0.5;
}
.right-addon .fa { right: 0px;}

.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }
</style>

@endsection

{{-- Content --}}
@section('content')
  <!-- /.navbar -->
  @include('layouts.header')
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>
  <!--body-->
  <div class="content-wrapper">
    <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="content-box">
              <div class="form-group row">
                <div class="col-lg-4">
                  <div class="tab">
                    <div class="inner-addon left-addon">
                      <i class="fa fa-search"></i>
                      <input class="input-search" type="text" placeholder="Search...">
                      <a class="p-2">&nbsp;</a>
                    </div>
                    <a onclick="openCity(event, 'default')" id="defaultOpen"></a>
                    <button class="tablinks" style="border: 1px solid #ededed;" onclick="openCity(event, 'Aadhar')">Aadhar verification <a class="float-right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a></button>
                    <button class="tablinks" style="border: 1px solid #ededed;" onclick="openCity(event, 'Criminal')">Criminal verification<a class="float-right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a></button>
                    <button class="tablinks" style="border: 1px solid #ededed;" onclick="openCity(event, 'Voter')">Voter ID Verification<a class="float-right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a></button>
                    <button class="tablinks" style="border: 1px solid #ededed;" onclick="openCity(event, 'Driving')">Driving licence verification<a class="float-right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a></button>
                    <button class="tablinks" style="border: 1px solid #ededed;" onclick="openCity(event, 'Employment')">Employment verification<a class="float-right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a></button>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="tab">
                    <div class="inner-addon left-addon">
                      <i class="fa fa-search"></i>
                      <input class="input-search" type="text" placeholder="Search...">
                      <a class="p-2">&nbsp;</a>
                    </div>
                    <?php $a=1; $b=1; $c=1; $d=1; $e=1; $f=1; $g=1; $h=1; $i=1; $j=1; ?>
                    <div id="default">
                      <a  onclick="openCity2(event, 'default')" id="defaultOpen2">
                      </a>
                    </div>
                    <div id="Aadhar" class="tabcontent" >
                      @foreach($employees as $employee)
                      <button class="tablinks2"  style="border: 1px solid #ededed;"  onclick="openCity2(event, 'Aadhar{{ $a++ }}')">
                        <input type="checkbox" style="  border-radius: 3.6px; border: solid 0.9px #9e9e9e; background-color: #fafafb;">
                        <a class="pl-4"></a>{{ $employee->first_name }} {{ $employee->last_name }}
                        <a class="float-right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a>
                      </button>
                      @endforeach
                    </div>
                    <div id="Voter" class="tabcontent" >
                      @foreach($employees as $employee)
                      <button class="tablinks2"  style="border: 1px solid #ededed;"  onclick="openCity2(event, 'Voter{{ $b++ }}')" >
                        <input type="checkbox" style="  border-radius: 3.6px; border: solid 0.9px #9e9e9e; background-color: #fafafb;">
                        <a class="pl-4"></a>{{ $employee->first_name }} {{ $employee->last_name }}
                        <a class="float-right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a>
                      </button>
                      @endforeach
                    </div>
                    <div id="Driving" class="tabcontent" >
                      @foreach($employees as $employee)
                      <button class="tablinks2"  style="border: 1px solid #ededed;"  onclick="openCity2(event, 'Driving{{ $c++ }}')" >
                        <input type="checkbox" style="  border-radius: 3.6px; border: solid 0.9px #9e9e9e; background-color: #fafafb;">
                        <a class="pl-4"></a>{{ $employee->first_name }} {{ $employee->last_name }}
                        <a class="float-right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a>
                      </button>
                      @endforeach
                    </div>
                    <div id="Employment" class="tabcontent" >
                      @foreach($employees as $employee)
                      <button class="tablinks2"  style="border: 1px solid #ededed;"  onclick="openCity2(event, 'Employment{{ $d++ }}')" >
                        <input type="checkbox" style="  border-radius: 3.6px; border: solid 0.9px #9e9e9e; background-color: #fafafb;">
                        <a class="pl-4"></a>{{ $employee->first_name }} {{ $employee->last_name }}
                        <a class="float-right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a>
                      </button>
                      @endforeach
                    </div>
                    <div id="Criminal" class="tabcontent" >
                      @foreach($employees as $employee)
                      <button class="tablinks2"  style="border: 1px solid #ededed;"  onclick="openCity2(event, 'Criminal{{ $e++ }}')" >
                        <input type="checkbox" style="  border-radius: 3.6px; border: solid 0.9px #9e9e9e; background-color: #fafafb;">
                        <a class="pl-4"></a>{{ $employee->first_name }} {{ $employee->last_name }}
                        <a class="float-right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a>
                      </button>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="tab">
                    @foreach($employees as $employee)
                    <div id="Aadhar{{ $f++ }}" class="tabcontent2">
                      <h3 class="text-name">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                      <p class="para-text">Aadhar card image unavailable.</p> 
                      <div>
                        <div class="p-4">
                          <div class="upload-pink pl-4">
                            <span class="upload-pink"><input type="file" class="custom-file-input" /></span>
                            <i class="fa fa-picture-o fa-2x pl-5" style="margin-left:20px;" aria-hidden="true"></i>
                            <div><p class="Upload-Employee-Pic" style="color:black;">Upload Document Pic</p></div>
                          </div>
                          <div class="pt-5">
                            <p class="text-para">Any missing field</p>
                            <input type="text" class="form-control">
                            <div  class="pt-3">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @foreach($employees as $employee)
                    <div id="Voter{{ $g++ }}" class="tabcontent2">
                      <h3 class="text-name">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                      <p class="para-text">Voter card image unavailable.</p> 
                      <div>
                        <div class="p-4">
                          <div class="upload-pink pl-4">
                            <span class="upload-pink"><input type="file" class="custom-file-input" /></span>
                            <i class="fa fa-picture-o fa-2x pl-5" style="margin-left:20px;" aria-hidden="true"></i>
                            <div><p class="Upload-Employee-Pic" style="color:black;">Upload Document Pic</p></div>
                          </div>
                          <div class="pt-5">
                            <p class="text-para">Any missing field</p>
                            <input type="text" class="form-control">
                            <div  class="pt-3">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @foreach($employees as $employee)
                    <div id="Driving{{ $h++ }}" class="tabcontent2">
                      <h3 class="text-name">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                      <p class="para-text">Driving License image unavailable.</p> 
                      <div>
                        <div class="p-4">
                          <div class="upload-blue pl-4">
                            <span class="upload-blue"><input type="file" class="custom-file-input" /></span>
                            <i class="fa fa-picture-o fa-2x pl-5" style="margin-left:20px;" aria-hidden="true"></i>
                            <div><p class="Upload-Employee-Pic" style="color:black;">Upload Document Pic</p></div>
                          </div>
                          <div class="pt-5">
                            <p class="text-para">Any missing field</p>
                            <input type="text" class="form-control">
                            <div  class="pt-3">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @foreach($employees as $employee)
                    <div id="Employment{{ $i++ }}" class="tabcontent2">
                      <h3 class="text-name">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                      <p class="para-text">Employment history related documents.</p> 
                      <div>
                        <div class="p-4">
                          <div class="upload-pink pl-4">
                            <span class="upload-pink"><input type="file" class="custom-file-input" /></span>
                            <i class="fa fa-picture-o fa-2x pl-5" style="margin-left:20px;" aria-hidden="true"></i>
                            <div><p class="Upload-Employee-Pic" style="color:black;">Upload Document Pic</p></div>
                          </div>
                          <div class="pt-5">
                            <p class="text-para">Any missing field</p>
                            <input type="text" class="form-control">
                            <div  class="pt-3">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @foreach($employees as $employee)
                    <div id="Criminal{{ $j++ }}" class="tabcontent2">
                      <h3 class="text-name">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                      <p class="para-text">Criminal history document unavailable.</p> 
                      <div>
                        <div class="p-4">
                          <div class="upload-blue pl-4">
                            <span class="upload-blue"><input type="file" class="custom-file-input" /></span>
                            <i class="fa fa-picture-o fa-2x pl-5" style="margin-left:20px;" aria-hidden="true"></i>
                            <div><p class="Upload-Employee-Pic" style="color:black;">Upload Document Pic</p></div>
                          </div>
                          <div class="pt-5">
                            <p class="text-para">Any missing field</p>
                            <input type="text" class="form-control">
                            <div  class="pt-3">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <div id="8" class="tabcontent">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          &nbsp;
        </div>
      </div>
    </section>
  </div>

@endsection

@section('scripts')
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script>
function openCity2(evt, cityName2) {
  var i, tabcontent2, tablinks2;
  tabcontent2 = document.getElementsByClassName("tabcontent2");
  for (i = 0; i < tabcontent2.length; i++) {
    tabcontent2[i].style.display = "none";
  }
  tablinks2 = document.getElementsByClassName("tablinks2");
  for (i = 0; i < tablinks2.length; i++) {
    tablinks2[i].className = tablinks2[i].className.replace(" active", "");
  }
  document.getElementById(cityName2).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen2").click();
</script>
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
