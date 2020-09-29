{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | My Candidate</title>
<link rel="stylesheet" href="{{ mix('css/app.css') }}" />
<script defer src="{{ mix('js/app.js') }}"></script>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<style>
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
.card-box {
  width: 700px;
  border-radius: .7rem !important;
  box-shadow: 0 15px 30px 0 rgba(0,0,0,.11),0 5px 15px 0 rgba(0,0,0,.08)!important;
}
.card-layout {
  width: 100%;
  background-color: #1e2933;
}
.card-layout-2 {
  width: 100%;
  background-color: #FFFFFF;
}
.card-2nd {
  width: 45%;
  height: 276px;
  transform: rotate(-360deg);
  opacity: 0.05;
  background-image: linear-gradient(184deg, #167aff 124%, #99bff2 9%);
}
.Mask {
  width: 126px;
  height: 126px;
}
.Name {
  width: 100%;
  height: 24px;
  font-family: Montserrat;
  font-size: 26px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: left;
  color: #ffffff;
}
.Name-dark {
  width: 100%;
  height: 20%;
  font-family: Montserrat;
  font-size: 26px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: left;
  color: #000000;
}
.Name-dark-2 {
  width: 100%;
  height: 45%;
  font-family: Montserrat;
  font-size: 26px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: left;
  color: #000000;
}
.bottom-text {
  height: 10px;
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: left;
  color: #dadada;
}
.bottom-text-dark {
  height: 10px;
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: left;
  color: #black;
}
.Unverified {
  height: 0px;
  font-family: Montserrat;
  font-size: 11px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: left;
  color: red;
}
.Verified-user {
  height: 0px;
  font-family: Montserrat;
  font-size: 11px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: left;
  color: green;
}
.icon-shape {
  width: 22px;
  height: 22px;
  margin: 5px;
}
.box-item {
  width: 100%;
  height: 100%;
  border-radius: 10px;
  box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.14);
  background-color: #ffffff;
  margin-top: 45px;
}
.body-text-4 {
  height: 18%;
  font-family: Montserrat;
  font-size: 1.2rem;
  font-weight: 900;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: var(--black);
}
.body-text-8 {
  height: 18%;
  font-family: Montserrat;
  font-size: 1rem;
  font-weight: 900;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: var(--black);
}
.body-text-sm-4 {
  font-family: Montserrat;
  font-size: 0.9rem;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #939396;
}
.btn-hire {
  width: 192px;
  height: 48px;
  border-radius: 6.2px;
  background-color: #167aff;
}
.signup-form{
  width: 95%;
  margin: 30px auto;
  background-color: var(--black);
}
.signup-form form{
  color: #000000;
    margin-bottom: 15px;
      background: #fff;
      padding: 30px;
  }
.signup-form h2 {
  color: #333;
  font-weight: bold;
      margin-top: 0;
  }
  .signup-form hr {
      margin: 0 -30px 20px;
  }    
.signup-form .form-group{
  margin-bottom: 20px;
}

.signup-form .row div:first-child{
  padding-right: 10px;
}
.signup-form .row div:last-child{
  padding-left: 10px;
}
  .signup-form .hint-text {
  padding-bottom: 15px;
  text-align: center;
  }
  .modal-lg {
  max-width: 80%;
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
.nav-menu-tag {
  font-family: Helvetica;
  font-size: 11.8px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.67;
  letter-spacing: 1.23px;
  color: #9ba4b0;
}
.side-bar {
  background-color: #1e2933;
}
.Add-Employees {
  font-family: Montserrat;
  font-size: 20px;
  font-weight: 700;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #352641;
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
  width: 270px;
  height: 40px;
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
  width: 180px;
  height: 90px;
  border-radius: 10px;
  background-color: #ffe9f6;
}
.upload-blue {
  width: 180px;
  height: 90px;
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
.Path-107 {
  width: 6px;
  height: 13px;
  border: solid 1px #171819;
}
.Upload-Employee-Pic {
  height: 13px;
  font-family: Montserrat;
  font-size: 11px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  text-align: center;
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
.Add {
  width: 82px;
  height: 82px;
  margin: 5px;
}
.aadhar {
  width: 84px;
  height: 64px;
  border-radius: 10px;
  box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.14);
  background-color: #ffffff;
  margin: 5px;
}
.amount {
  height: 2%px;
  font-family: Montserrat;
  font-size: 14px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #167aff;
}
.request-img {
  width: 570px;
  height: 380px;
}
</style>
@endsection

{{-- Content --}}
@section('content')
  <!-- /.navbar -->
  @include('layouts.header')
 <!-- /.navbar -->
  <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <div class="Add-Employees pt-3" id="exampleModalLabel">Change Password</div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="signup-form">
        <form action="{{ url('/change-password') }}">
        @csrf
          <div class="form-group row">
            <div class="col-lg-12">
              <label class="form-label-text">Current Password</label>
              <input type="Password" class="form-control" name="old_password" required="required">
            </div>  
          </div>
          <div class="form-group row">
            <div class="col-lg-12">
              <label class="form-label-text">New Password</label>
              <input type="Password" class="form-control" name="new_password" required="required">
            </div>  
          </div>
          <div class="form-group row">
            <div class="col-lg-12">
              <label class="form-label-text">Confirm Password</label>
              <input type="Password" class="form-control" name="confirm_password" required="required">
            </div>  
          </div>
            <div class="form-group row"><a class="p-2"></a></div>
            {{ method_field('PUT') }}
        <div class="form-group row float-right">
                <button type="submit" class="btn-warning button-proceed Proceed">Proceed</button>
            </div>
        </form>
    </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="card-layout">
      @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif 
      <div class="container">
        <div class="form-group row">
          <div class="col-lg-6">
            <div class="p-xl-5 pt-xl-5">
              <div class="form-group row">
                <div class="col-lg-3">
                  <img src="{{ ('dist/img/user1-128x128.jpg') }}" alt="User Avatar"  class="img-circle Mask">
                </div>
                <div class="col-lg-9 pt-1 pl-5">
                  <p class="Name">{{ session()->get('first_name') }}</p>
                  <p class="bottom-text">Admin</p>
                  <p class="bottom-text">Ph no: {{ session()->get('mobile') }}</p>             
                  <p class="Verified-user pt-2"><i class="fa fa-check-circle fa-lg pr-2" aria-hidden="true"></i></i>Verified</p>        
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2"></div>
          <div class="col-lg-4">
            <div class="p-xl-5 pt-xl-5">
              <a href="#"><img src="{{ ('images/png/facebook.png') }}" alt="User Avatar"  class="icon-shape"></a>
              <a href="#"><img src="{{ ('images/png/twitter.png') }}" alt="User Avatar"  class="icon-shape"></a>
              <a href="#"><img src="{{ ('images/png/033-google-plus.png') }}" alt="User Avatar"  class="icon-shape"></a>
              <a href="#"><img src="{{ ('images/png/005-whatsapp.png') }}" alt="User Avatar"  class="icon-shape"></a>
              <a href="#"><img src="{{ ('images/png/027-linkedin.png') }}" alt="User Avatar"  class="icon-shape"></a>
              <a href="instagram.com"><img src="{{ ('images/png/029-instagram.png') }}" alt="User Avatar"  class="icon-shape"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="box-item">
            <div class="form-group row">
              <div class="col-lg-6">
                <div class="p-xl-5 pt-xl-5">
                  <div class="form-group row">
                    <div class="col-lg-3">
                      <img src="{{ asset('dist/img/avatar5.png') }}" alt="User Avatar"  class="img-circle Mask">
                    </div>
                    <div class="col-lg-9 pt-1 pl-5">
                      <p class="Name-dark-2">{{ $account->b2b_company_name }}</p>
                      <p class="bottom-text-dark">{{ $account->email }}</p>
                      <p class="bottom-text-dark">Ph no: {{ $account->mobile }}</p>             
                      <p class="Verified-user pt-2"><i class="fa fa-check-circle fa-lg pr-2" aria-hidden="true"></i></i>Verified</p>        
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="p-xl-5 pt-xl-5">
                  <div class="form-group row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-9 pt-1 pl-5">
                      <p class="Name-dark">{{ $account->b2b_brand_name }}</p>
                      <p class="bottom-text-dark">GST No: {{ $account->b2b_gst_no }}</p>
                      <p class="bottom-text-dark">PAN No: {{ $account->b2b_pan_no }}</p>             
                      <a href="{{ $account->b2b_website }}" target="_blank"><p class="web pt-2"><i class="fa fa-internet-explorer fa-lg pr-2" aria-hidden="true"></i>{{ $account->b2b_website }}</p></a>        
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="container">
      <div class="row">
       <div class="col-lg-12">
        <div class="box-item">
          <p class="body-text-4 pl-5 pt-5">Preferences</p>
          <div class="pl-5 pt-3">
            <p class="Lorem-ipsum-dolor-si">
            <label><input type="checkbox" checked="checked" onclick="return false;"><a class="pl-2">SMS</a></label><br>
            <label><input type="checkbox" checked="checked" onclick="return false;"><a class="pl-2">WhatsApp</a></label><br>
            <label><input type="checkbox" checked="checked" onclick="return false;"><a class="pl-2">Phone</a></label><br>
            <label>Timezone : {{ $preferences->time_zone}}</label>
            </p>
          </div>
        </div>
       </div>
      </div>
    </div>
    <div class="container">
    <br><br></div>
    <div class="container">
      <div class="row">
       <div class="col-lg-12">
        <div class="box-item">
          <p class="body-text-8 pl-5 pt-5">General Settings</p>
          <hr>
          <div class="pl-5 pt-3">
            <p class="body-text-4">Change Password</p>
            <p class="amount">Two factor verification</p>
            <p class="Lorem-ipsum-dolor-si">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore 
            Ut enim ad minim veniam, quis nostrud exercitation 
            </p>
            <button type="button" data-toggle="modal" data-target="#requestModal" class="btn btn-primary" style=" width: 192px;">Proceed</button>
          </div>
        </div>
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
