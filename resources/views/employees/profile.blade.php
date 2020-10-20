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
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #b6b8c3;
}
.text-awesome {
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 500;
  color: #494949;
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
  <div class="modal fade" id="preferenceModal" tabindex="-1" role="dialog" aria-labelledby="preferenceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <div class="Add-Employees pt-3" id="exampleModalLabel">Edit Preferences</div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="signup-form">
        <form action="{{ url('/change-preferences') }}">
        @csrf
          <div class="form-group row text-awesome">
            <div class="col-lg-3">
              <label>SMS : </label> 
            </div>
            <div class="col-lg-6">
            <label><input type="checkbox" checked="checked" value="Y" name="sms">
            </div>
          </div>
          <div class="form-group row text-awesome">
            <div class="col-lg-3">
              <label>WhatsApp : </label> 
            </div>
            <div class="col-lg-6">
            <label><input type="checkbox" checked="checked" value="Y" name="whatsapp">
            </div>
          </div>
          <div class="form-group row text-awesome">
            <div class="col-lg-3">
              <label>Phone : </label> 
            </div>
            <div class="col-lg-6">
              <input type="checkbox" checked="checked" value="Y" name="phone">
            </div>
          </div>
          <div class="form-group row text-awesome">
            <div class="col-lg-3">
              <label>Timezone : </label> 
            </div>
            <div class="col-lg-6">
              <select name="time_zone" class="form-control form-control-sm">
              <option data-offset="-39600" value="International Date Line West">(GMT-11:00) International Date Line West</option>
																<option data-offset="-39600" value="Midway Island">(GMT-11:00) Midway Island</option>
																<option data-offset="-39600" value="Samoa">(GMT-11:00) Samoa</option>
																<option data-offset="-36000" value="Hawaii">(GMT-10:00) Hawaii</option>
																<option data-offset="-28800" value="Alaska">(GMT-08:00) Alaska</option>
																<option data-offset="-25200" value="Pacific Time (US &amp; Canada)">(GMT-07:00) Pacific Time (US &amp; Canada)</option>
																<option data-offset="-25200" value="Tijuana">(GMT-07:00) Tijuana</option>
																<option data-offset="-25200" value="Arizona">(GMT-07:00) Arizona</option>
																<option data-offset="-21600" value="Mountain Time (US &amp; Canada)">(GMT-06:00) Mountain Time (US &amp; Canada)</option>
																<option data-offset="-21600" value="Chihuahua">(GMT-06:00) Chihuahua</option>
																<option data-offset="-21600" value="Mazatlan">(GMT-06:00) Mazatlan</option>
																<option data-offset="-21600" value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
																<option data-offset="-21600" value="Central America">(GMT-06:00) Central America</option>
																<option data-offset="-18000" value="Central Time (US &amp; Canada)">(GMT-05:00) Central Time (US &amp; Canada)</option>
																<option data-offset="-18000" value="Guadalajara">(GMT-05:00) Guadalajara</option>
																<option data-offset="-18000" value="Mexico City">(GMT-05:00) Mexico City</option>
																<option data-offset="-18000" value="Monterrey">(GMT-05:00) Monterrey</option>
																<option data-offset="-18000" value="Bogota">(GMT-05:00) Bogota</option>
																<option data-offset="-18000" value="Lima">(GMT-05:00) Lima</option>
																<option data-offset="-18000" value="Quito">(GMT-05:00) Quito</option>
																<option data-offset="-14400" value="Eastern Time (US &amp; Canada)">(GMT-04:00) Eastern Time (US &amp; Canada)</option>
																<option data-offset="-14400" value="Indiana (East)">(GMT-04:00) Indiana (East)</option>
																<option data-offset="-14400" value="Caracas">(GMT-04:00) Caracas</option>
																<option data-offset="-14400" value="La Paz">(GMT-04:00) La Paz</option>
																<option data-offset="-14400" value="Georgetown">(GMT-04:00) Georgetown</option>
																<option data-offset="-10800" value="Atlantic Time (Canada)">(GMT-03:00) Atlantic Time (Canada)</option>
																<option data-offset="-10800" value="Santiago">(GMT-03:00) Santiago</option>
																<option data-offset="-10800" value="Brasilia">(GMT-03:00) Brasilia</option>
																<option data-offset="-10800" value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
																<option data-offset="-9000" value="Newfoundland">(GMT-02:30) Newfoundland</option>
																<option data-offset="-7200" value="Greenland">(GMT-02:00) Greenland</option>
																<option data-offset="-7200" value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
																<option data-offset="-3600" value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
																<option data-offset="0" value="Azores">(GMT) Azores</option>
																<option data-offset="0" value="Monrovia">(GMT) Monrovia</option>
																<option data-offset="0" value="UTC">(GMT) UTC</option>
																<option data-offset="3600" value="Dublin">(GMT+01:00) Dublin</option>
																<option data-offset="3600" value="Edinburgh">(GMT+01:00) Edinburgh</option>
																<option data-offset="3600" value="Lisbon">(GMT+01:00) Lisbon</option>
																<option data-offset="3600" value="London">(GMT+01:00) London</option>
																<option data-offset="3600" value="Casablanca">(GMT+01:00) Casablanca</option>
																<option data-offset="3600" value="West Central Africa">(GMT+01:00) West Central Africa</option>
																<option data-offset="7200" value="Belgrade">(GMT+02:00) Belgrade</option>
																<option data-offset="7200" value="Bratislava">(GMT+02:00) Bratislava</option>
																<option data-offset="7200" value="Budapest">(GMT+02:00) Budapest</option>
																<option data-offset="7200" value="Ljubljana">(GMT+02:00) Ljubljana</option>
																<option data-offset="7200" value="Prague">(GMT+02:00) Prague</option>
																<option data-offset="7200" value="Sarajevo">(GMT+02:00) Sarajevo</option>
																<option data-offset="7200" value="Skopje">(GMT+02:00) Skopje</option>
																<option data-offset="7200" value="Warsaw">(GMT+02:00) Warsaw</option>
																<option data-offset="7200" value="Zagreb">(GMT+02:00) Zagreb</option>
																<option data-offset="7200" value="Brussels">(GMT+02:00) Brussels</option>
																<option data-offset="7200" value="Copenhagen">(GMT+02:00) Copenhagen</option>
																<option data-offset="7200" value="Madrid">(GMT+02:00) Madrid</option>
																<option data-offset="7200" value="Paris">(GMT+02:00) Paris</option>
																<option data-offset="7200" value="Amsterdam">(GMT+02:00) Amsterdam</option>
																<option data-offset="7200" value="Berlin">(GMT+02:00) Berlin</option>
																<option data-offset="7200" value="Bern">(GMT+02:00) Bern</option>
																<option data-offset="7200" value="Rome">(GMT+02:00) Rome</option>
																<option data-offset="7200" value="Stockholm">(GMT+02:00) Stockholm</option>
																<option data-offset="7200" value="Vienna">(GMT+02:00) Vienna</option>
																<option data-offset="7200" value="Cairo">(GMT+02:00) Cairo</option>
																<option data-offset="7200" value="Harare">(GMT+02:00) Harare</option>
																<option data-offset="7200" value="Pretoria">(GMT+02:00) Pretoria</option>
																<option data-offset="10800" value="Bucharest">(GMT+03:00) Bucharest</option>
																<option data-offset="10800" value="Helsinki">(GMT+03:00) Helsinki</option>
																<option data-offset="10800" value="Kiev">(GMT+03:00) Kiev</option>
																<option data-offset="10800" value="Kyiv">(GMT+03:00) Kyiv</option>
																<option data-offset="10800" value="Riga">(GMT+03:00) Riga</option>
																<option data-offset="10800" value="Sofia">(GMT+03:00) Sofia</option>
																<option data-offset="10800" value="Tallinn">(GMT+03:00) Tallinn</option>
																<option data-offset="10800" value="Vilnius">(GMT+03:00) Vilnius</option>
																<option data-offset="10800" value="Athens">(GMT+03:00) Athens</option>
																<option data-offset="10800" value="Istanbul">(GMT+03:00) Istanbul</option>
																<option data-offset="10800" value="Minsk">(GMT+03:00) Minsk</option>
																<option data-offset="10800" value="Jerusalem">(GMT+03:00) Jerusalem</option>
																<option data-offset="10800" value="Moscow">(GMT+03:00) Moscow</option>
																<option data-offset="10800" value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
																<option data-offset="10800" value="Volgograd">(GMT+03:00) Volgograd</option>
																<option data-offset="10800" value="Kuwait">(GMT+03:00) Kuwait</option>
																<option data-offset="10800" value="Riyadh">(GMT+03:00) Riyadh</option>
																<option data-offset="10800" value="Nairobi">(GMT+03:00) Nairobi</option>
																<option data-offset="10800" value="Baghdad">(GMT+03:00) Baghdad</option>
																<option data-offset="14400" value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
																<option data-offset="14400" value="Muscat">(GMT+04:00) Muscat</option>
																<option data-offset="14400" value="Baku">(GMT+04:00) Baku</option>
																<option data-offset="14400" value="Tbilisi">(GMT+04:00) Tbilisi</option>
																<option data-offset="14400" value="Yerevan">(GMT+04:00) Yerevan</option>
																<option data-offset="16200" value="Tehran">(GMT+04:30) Tehran</option>
																<option data-offset="16200" value="Kabul">(GMT+04:30) Kabul</option>
																<option data-offset="18000" value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
																<option data-offset="18000" value="Islamabad">(GMT+05:00) Islamabad</option>
																<option data-offset="18000" value="Karachi">(GMT+05:00) Karachi</option>
																<option data-offset="18000" value="Tashkent">(GMT+05:00) Tashkent</option>
																<option data-offset="19800" value="Asia/pChennai">(GMT+05:30) Chennai</option>
																<option data-offset="19800" value="Asia/pKolkata">(GMT+05:30) Kolkata</option>
																<option data-offset="19800" value="Asia/pMumbai">(GMT+05:30) Mumbai</option>
																<option data-offset="19800" value="Asia/pNew Delhi">(GMT+05:30) New Delhi</option>
																<option data-offset="19800" value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
																<option data-offset="20700" value="Kathmandu">(GMT+05:45) Kathmandu</option>
																<option data-offset="21600" value="Astana">(GMT+06:00) Astana</option>
																<option data-offset="21600" value="Dhaka">(GMT+06:00) Dhaka</option>
																<option data-offset="21600" value="Almaty">(GMT+06:00) Almaty</option>
																<option data-offset="21600" value="Urumqi">(GMT+06:00) Urumqi</option>
																<option data-offset="23400" value="Rangoon">(GMT+06:30) Rangoon</option>
																<option data-offset="25200" value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
																<option data-offset="25200" value="Bangkok">(GMT+07:00) Bangkok</option>
																<option data-offset="25200" value="Hanoi">(GMT+07:00) Hanoi</option>
																<option data-offset="25200" value="Jakarta">(GMT+07:00) Jakarta</option>
																<option data-offset="25200" value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
																<option data-offset="28800" value="Beijing">(GMT+08:00) Beijing</option>
																<option data-offset="28800" value="Chongqing">(GMT+08:00) Chongqing</option>
																<option data-offset="28800" value="Hong Kong">(GMT+08:00) Hong Kong</option>
																<option data-offset="28800" value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
																<option data-offset="28800" value="Singapore">(GMT+08:00) Singapore</option>
																<option data-offset="28800" value="Taipei">(GMT+08:00) Taipei</option>
																<option data-offset="28800" value="Perth">(GMT+08:00) Perth</option>
																<option data-offset="28800" value="Irkutsk">(GMT+08:00) Irkutsk</option>
																<option data-offset="28800" value="Ulaan Bataar">(GMT+08:00) Ulaan Bataar</option>
																<option data-offset="32400" value="Seoul">(GMT+09:00) Seoul</option>
																<option data-offset="32400" value="Osaka">(GMT+09:00) Osaka</option>
																<option data-offset="32400" value="Sapporo">(GMT+09:00) Sapporo</option>
																<option data-offset="32400" value="Tokyo">(GMT+09:00) Tokyo</option>
																<option data-offset="32400" value="Yakutsk">(GMT+09:00) Yakutsk</option>
																<option data-offset="34200" value="Darwin">(GMT+09:30) Darwin</option>
																<option data-offset="34200" value="Adelaide">(GMT+09:30) Adelaide</option>
																<option data-offset="36000" value="Canberra">(GMT+10:00) Canberra</option>
																<option data-offset="36000" value="Melbourne">(GMT+10:00) Melbourne</option>
																<option data-offset="36000" value="Sydney">(GMT+10:00) Sydney</option>
																<option data-offset="36000" value="Brisbane">(GMT+10:00) Brisbane</option>
																<option data-offset="36000" value="Hobart">(GMT+10:00) Hobart</option>
																<option data-offset="36000" value="Vladivostok">(GMT+10:00) Vladivostok</option>
																<option data-offset="36000" value="Guam">(GMT+10:00) Guam</option>
																<option data-offset="36000" value="Port Moresby">(GMT+10:00) Port Moresby</option>
																<option data-offset="36000" value="Solomon Is.">(GMT+10:00) Solomon Is.</option>
																<option data-offset="39600" value="Magadan">(GMT+11:00) Magadan</option>
																<option data-offset="39600" value="New Caledonia">(GMT+11:00) New Caledonia</option>
																<option data-offset="43200" value="Fiji">(GMT+12:00) Fiji</option>
																<option data-offset="43200" value="Kamchatka">(GMT+12:00) Kamchatka</option>
																<option data-offset="43200" value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
																<option data-offset="43200" value="Auckland">(GMT+12:00) Auckland</option>
																<option data-offset="43200" value="Wellington">(GMT+12:00) Wellington</option>
																<option data-offset="46800" value="Nuku'alofa">(GMT+13:00) Nuku'alofa</option>
              </select>
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
          <div class="form-group pl-5 pt-5 pr-5">
            <div class="col-lg-12">
              <button type="button" data-toggle="modal" data-target="#preferenceModal" class="btn btn-primary float-right" style=" width: 102px;">Edit</button>
              <p class="body-text-4">Preferences</p>
            </div>
          </div>
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
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
            <button type="button" data-toggle="modal" data-target="#requestModal" class="btn btn-primary" style=" width: 192px;">Proceed</button>
          </div>
        </div>
       </div>
      </div>
    </div>
    <div class="container">
    <br><br></div>
  </div><br>
    <br>
  
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
