{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Health Report Details</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../../css/boot.min.css">
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
.card-layout {
  width: 100%;
  height: 31%;
  background-color: #1e2933;
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
.body-text-2 {
  height: 18%;
  font-family: Montserrat;
  font-size: 1rem;
  font-weight: 400;
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
  font-size: 20px;
  font-weight: 800;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #167aff;
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
.table-text-cyan {
  font-family: Montserrat !important;
  font-size: 17px !important;
  font-weight: 800 !important;
  font-stretch: normal !important;
  font-style: normal !important;
  line-height: normal !important;
  letter-spacing: normal !important;
  color: #27cd90 !important;
}
.table-text-not-done {
  font-family: Montserrat !important;
  font-size: 17px !important;
  font-weight: 800 !important;
  font-stretch: normal !important;
  font-style: normal !important;
  line-height: normal !important;
  letter-spacing: normal !important;
  color: #ffb40c !important;
}
.table-text-red {
  font-family: Montserrat !important;
  font-size: 17px !important;
  font-weight: 800 !important;
  font-stretch: normal !important;
  font-style: normal !important;
  line-height: normal !important;
  letter-spacing: normal !important;
  color: #ff0c23 !important;
}
.safe {
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 700;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #27cd90;
}
.unsafe {
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 700;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #b02155;
}
.not-done {
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 700;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #efbd48;
}
.para-text-top {
  font-family: Montserrat;
  font-size: 13px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: right;
  color: #dadada;
}
.inner-addon { 
    position: relative; 
}
body{
  background-color: #ffffff !important;
}
/* style icon */
.inner-addon .glyphicon {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}
.order-img {
  width: 90%;
}
/* align icon */
.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }

a {
    color: none !important;
    text-decoration: none !important;
    background-color: transparent !important;
}
</style>
@endsection

{{-- Content --}}
@section('content')
@include('layouts.header')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="card-layout">
      <div class="container">
        <div class="form-group row">
          <div class="col-lg-6">
            <div class="p-xl-5 pt-xl-5">
              <div class="form-group row">
                <div class="col-lg-3">
                  <img src="{{ asset('dist/img/avatar.png') }}" alt="User Avatar"  class="img-circle Mask">
                </div>
                <div class="col-lg-9 pt-1 pl-5">
                  <p class="Name">{{ $visitor_details->first_name }} {{ $visitor_details->last_name }}</p>
                  <p class="bottom-text">Visitor</p>
                  <p class="bottom-text">Ph no: {{ $visitor_details->mobile }}</p>  
                  @if($surveys->severity == "GREEN")
                  <p class="safe">CURRENT STATUS : SAFE</p>
                  @elseif($surveys->severity == "RED")
                  <p class="unsafe">CURRENT STATUS : UNSAFE</p>
                  @else
                  <p class="not-done">CURRENT STATUS : NOT DONE</p>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3"></div>
          <div class="col-lg-3">
            <div class="pt-xl-5">
              <p class="para-text-top pt-3">Last verified on <br>{{ strftime("%d %b %Y",strtotime($surveys->survey_end)) }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @if($surveys->survey_status == "COMPLETE")
    <div class="container  p-4 ">
      <div class="Rectangle-Copy-6 t-head">
        <div class="pt-4 pl-4">
          <h3  class=" My-employees">LAST REPORT</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" >
          <div class="table-responsive">
            <table class="table table-hover mb-0">
            @if(isset($surveys))
              <tbody>
                    <tr>
                      <th>Survey Start Time</th>
                      <td class="table-text-cyan">{{ date("g:i A",strtotime($surveys->survey_start)) }}</td>
                    </tr>
                    <tr>
                      <th>Survey End Time</th>
                      <td class="table-text-cyan">{{ date("g:i A",strtotime($surveys->survey_end)) }}</td>
                    </tr>
                @if($answers)
                  @foreach($answers as $answer)
                    <tr>
                      <th>{{ $answer->text ?? '' }}</th>
                      @if(strlen($answer->question_answer) >=20 )
                      <td class="table-text-cyan"><a href="{{ $answer->question_answer }}" target="_blank">View</a></td>
                      @else
                      <td class="table-text-cyan">{{ $answer->question_answer }}</td>
                      @endif
                    </tr>
                  @endforeach
                @endif
              </tbody>
            @endif
            </table>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    @else
    <div class="container  p-4 ">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="Rectangle-Copy-6 pl-4 t-head">
            <div class="pt-4 pl-4 pb-2 pr-5">
              <h3  class=" My-employees">LAST REPORT</h3>
              <hr>
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
              <div class="container">
                <div class="form-group row">
                  <div class="col-lg-5">
                    <img src="../../images/change.jpg" alt="User Avatar"  class="order-img">
                  </div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-6">
                    <div class="form-group row pt-2 pr-1">
                      <p class="Request-sent">
                      Survey Report Not Found
                      </p>
                    </div>
                    <div class="form-group row pr-1">
                      <p class="Lorem-ipsum-dolor-si">
                      Visitor have not completed the survey yet,
                      ask them to complete the survey.
                      </p>
                    </div>
                    <div class="form-group row pr-1">
                      <a href="{{ route('getsurvey') }}"><button type="button" class="btn btn-primary">Check Reports</button></a>
                      <a class="pl-5"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.col -->
        </div>
      </div>
    </div>
    @endif
  </div>
@endsection

@section('scripts')
<script>
		 $(document).ready(function() {
          $('#empdatatable').DataTable( {
              "ordering": false,
              "info":     false,
              "dom": 'lrtip',
          } );
      } );
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
