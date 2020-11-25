{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Health Check</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/boot.min.css">
<style>
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
  margin-bottom: 25px;
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
.button-upload {
  width: 170px;
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
  font-weight: 1000;
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
.inner-addon { 
    position: relative; 
}

/* style icon */
.inner-addon .glyphicon {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}

/* align icon */
.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }

.card-box-top {
  border-radius: 16.6px;
  margin-top:10px;
  box-shadow: 0 13px 14px 0 rgba(0, 0, 0, 0.1);
  background-color: #ffffff;
}
.blue {
  border: solid 0.6px #2d87ff;
}
.purple {
    border: solid 0.6px #211f72;
}
.orange {
    border: solid 0.6px #f77766;
}
.green {
    border: solid 0.6px #27cd90;
}
.yellow {
    border: solid 0.6px #f9b24b;
}
.pink {
    border: solid 0.6px #c937f9;
}
.body {
    background-color: #ffffff !important;
}
.text-font {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 800;
  padding-top: 20px !important;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #131415;
}
.text-font-sm {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 800;
  padding-top: 20px !important;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #131415;
}
.col-lg-2, .col-lg-3 {
    position: relative;
    width: 100%;
    padding-right: 5px !important;
    padding-left: 5px !important;
}
.text-blue-2 {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 29.5px;
  font-weight: 600;
  font-stretch: normal;
  padding-left: 20px !important;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1.23px;
  color: #167aff !important;
}

.text-purple-2 {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 29.5px;
  font-weight: 600;
  font-stretch: normal;
  padding-left: 20px !important;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1.23px;
  color: #090763 !important;
}

.text-orange-2 {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 29.5px;
  font-weight: 600;
  font-stretch: normal;
  padding-left: 20px !important;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1.23px;
  color: #f76551 !important;
}

.text-green-2 {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 29.5px;
  font-weight: 600;
  font-stretch: normal;
  padding-left: 20px !important;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1.23px;
  color: #0fc884 !important;
}

.text-yellow-2 {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 29.5px;
  font-weight: 600;
  font-stretch: normal;
  padding-left: 20px !important;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1.23px;
  color: #f9aa37 !important;
}
.text-pink-2 {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 29.5px;
  font-weight: 600;
  font-stretch: normal;
  padding-left: 20px !important;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1.23px;
  color: #c937f9 !important;
}
.red {
  width: 69px;
  height: 19px;
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 700;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #ff0000;
}
.unsafe {
  width: 69px;
  height: 19px;
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 700;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #ffbc00;
}
.safe {
  width: 69px;
  height: 19px;
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 700;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #0bc224;
}
.arrow-head {
  color: #000000 !important;
}
.card-body {
  padding-top: 0px !important;
  
}
table.dataTable thead th {
  border-bottom: none !important;
}
table.dataTable.no-footer {
  border-bottom: none !important;
}
.dataTables_wrapper .dataTables_length label {
    font-weight: bolder !important;
    text-align: right !important;
    white-space: nowrap !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .d .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
    font-weight: bolder !important;
ataTables_wrapper}
.search-box {
  height: 40px !important;
  border-radius: 11px !important;
  box-shadow: 0 8px 13px 0 rgba(0, 0, 0, 0.02) !important;
  background-color: #f3f3f3 !important;
  position: relative !important;
  left: -5px !important;
  content: "\f002" !important;
}
@media screen and (min-width: 500px) {
    #myChart {
    background: transparent url(../../images/<?php echo $image; ?>.png) no-repeat 13% 2rem !important;
    background-size:contain !important;
    object-position: 0% 50% !important;
    display: block;
    margin-left: auto !important;
    margin-right: auto !important;
  }
}
@media screen and (max-width: 700px) {
    #myChart {
    background: none !important;
    background-size:contain !important;
    object-position: 0% 50% !important;
    display: block;
    margin-left: auto !important;
    margin-right: auto !important;
  }
}

@media screen and (min-width: 500px) {
    #myChart2 {
    background: transparent url(../../images/visitor.png) no-repeat 13% 2rem !important;
    background-size:contain !important;
    object-position: 0% 50% !important;
    display: block;
    margin-left: auto !important;
    margin-right: auto !important;
  }
}

@media screen and (max-width: 700px) {
    #myChart2 {
    background: none !important;
    background-size:contain !important;
    object-position: 0% 50% !important;
    display: block;
    margin-left: auto !important;
    margin-right: auto !important;
  }
}

.active-card {
  background-color: #f3f3f3 !important;
  box-shadow: none !important;
}
.hover-effect {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}
.card-box-top:hover .hover-effect {
  opacity: 0.3;
}
a:hover {
    text-decoration: none !important;
}
a {
     text-decoration: none !important;
}
#empdatatable_filter input {
  height: 40px !important;
  border-radius: 7px !important;
  box-shadow: 0 8px 13px 0 rgba(0, 0, 0, 0.02) !important;
  background-color: #f3f3f3 !important;
  position: relative !important;
}
#empdatatable2_filter input {
  height: 40px !important;
  border-radius: 11px !important;
  box-shadow: 0 8px 13px 0 rgba(0, 0, 0, 0.02) !important;
  background-color: #f3f3f3 !important;
  position: relative !important;
}
#empdatatable3_filter input {
  height: 40px !important;
  border-radius: 11px !important;
  box-shadow: 0 8px 13px 0 rgba(0, 0, 0, 0.02) !important;
  background-color: #f3f3f3 !important;
  position: relative !important;
}
#empdatatable4_filter input {
  height: 40px !important;
  border-radius: 11px !important;
  box-shadow: 0 8px 13px 0 rgba(0, 0, 0, 0.02) !important;
  background-color: #f3f3f3 !important;
  position: relative !important;
}
#empdatatable5_filter input {
  height: 40px !important;
  border-radius: 11px !important;
  box-shadow: 0 8px 13px 0 rgba(0, 0, 0, 0.02) !important;
  background-color: #f3f3f3 !important;
  position: relative !important;
}
#empdatatable6_filter input {
  height: 40px !important;
  border-radius: 11px !important;
  box-shadow: 0 8px 13px 0 rgba(0, 0, 0, 0.02) !important;
  background-color: #f3f3f3 !important;
  position: relative !important;
}
#dataTables_filter input {
  height: 40px !important;
  border-radius: 11px !important;
  box-shadow: 0 8px 13px 0 rgba(0, 0, 0, 0.02) !important;
  background-color: #f3f3f3 !important;
  position: relative !important;
}
.content-header {
    padding: 5px 1rem !important;
    background-color: white !important;
    height: 3rem !important;
    border :solid 1px #eee;
}
[data-href] { cursor: pointer; }

.table-style {
  transition: 0.3s;
}

.table-style:hover {
  background-color: #eeeeee;
}
</style>

@endsection

{{-- Content --}}
@section('content')
<?php $visitors=0; $survey_candidates=0; ?>
@foreach($orders ?? '' as $employee)
@if(\Carbon\Carbon::parse($employee->created_at)->format('d/m/Y') == Carbon\Carbon::today()->format('d/m/Y'))
<?php $survey_candidates++; ?>
@if($employee->visitor_id!=null)
<?php $visitors++; ?>
@endif
@endif
@endforeach
  <!-- /.navbar -->
  @include('layouts.header_v2')
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="Add-Employees pt-3" id="exampleModalLabel">Add Visitor</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="signup-form">
      <form action="{{ route('visitors.store') }}">
      @csrf
        <div class="form-group row">
            <div class="col-lg-4">
              <label class="form-label-text">First Name</label>
              <input type="text" class="form-control" name="first_name" required="required">
            </div>
            <div class="col-lg-4">
            <label class="form-label-text">Middle Name:</label>
            <input type="text" class="form-control" name="middle_name">
            </div>    
            <div class="col-lg-4">
            <label class="form-label-text">Last Name:</label>
            <input type="text" class="form-control" name="last_name" required="required">
            </div>    
            </div>
            <div class="form-group row">
            <div class="col-lg-4">
              <label class="form-label-text">Country Code</label>
              <input type="number" class="form-control" name="country_code" value="91">
            </div>
            <div class="col-lg-4">
              <label class="form-label-text">Mobile</label>
              <input type="phone" class="form-control" name="mobile" required="required">
            </div>
           </div>
           <div class="form-group row">
            <a class="p-2"></a>
           </div>
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
    <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <div class="form-group">
      <div class="content-header">
        <div class="card-box-subheader">
          <div class="float-right">
            <ul class="navbar-nav" id="navbar">
              <li class="nav-item dropdown navbar-collapse collapse">
                <p class="para-date">Date</p>
              </li>
              <li>
                <form id="form2" onsubmit="get_action(this);">
                  @csrf
                      <select id="select1" class="select-date" type="date" name="date" style="font-size: 12px;font-weight: 500;">
                      <option>Select Date</option>
                        <option data-url="{{ route('health.dashboard') }}">Today</option>
                        <option data-url="{{ route('survey.dashboard', 7) }}">Last week</option>
                        <option data-url="{{ route('survey.dashboard', 14) }}">Last month</option>
                      </select>
                {{ method_field('PUT') }}
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <br> -->
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-2">
            <!-- small box -->
            <div class="card-box-top blue">
              <a onclick="openCity(event, 'default')" id="defaultOpen"  class="hover-effect tablinks">
                <p class="text-font pr-2 pl-2">Registered candidates</p>
                <p class="text-blue-2">{{ $survey_candidates }}</p>
              </a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-2">
            <!-- small box -->
            <div class="card-box-top pink {{ Request::is('health/survey/unsafe')  ? 'active-card' : '' }}">
              <a onclick="openCity(event, 'visitors')" class="hover-effect tablinks">
                <p class="text-font pr-3 pl-3">Visitors</p>
                <p class="text-pink-2">{{ $visitors }}</p>
              </a>
            </div>
          </div>
          <div class="col-lg-2">
            <!-- small box -->
              <div class="card-box-top purple  {{ Request::is('health/survey/completed')  ? 'active-card' : '' }}">
                <a onclick="openCity(event, 'completed')" class="hover-effect tablinks">
                  <p class="text-font pr-3 pl-3">Surveys Completed</p>
                  <p class="text-purple-2">{{ $survey_completed }}</p>
                </a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2">
            <!-- small box -->
            <div class="card-box-top orange {{ Request::is('health/survey/positive')  ? 'active-card' : '' }}">
              <a onclick="openCity(event, 'positive')" class="hover-effect tablinks">
                <p class="text-font pr-3 pl-3">COVID positive</p>
                <p class="text-orange-2">{{ $survey_postive }}</p>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2">
            <!-- small box -->
            <div class="card-box-top green {{ Request::is('health/survey/safe')  ? 'active-card' : '' }}">
              <a onclick="openCity(event, 'safe')" class="hover-effect tablinks">
                <p class="text-font pr-3 pl-3">Safe candidates</p>
                <p class="text-green-2">{{ $safe }}</p>
              </a>
            </div>
          </div>
          <!-- ./col -->
            <!-- ./col -->
          <div class="col-lg-2">
            <!-- small box -->
            <div class="card-box-top yellow {{ Request::is('health/survey/unsafe')  ? 'active-card' : '' }}">
              <a onclick="openCity(event, 'unsafe')" class="hover-effect tablinks">
                <p class="text-font pr-3 pl-3">Unsafe candidates</p>
                <p class="text-yellow-2">{{ $survey_unsafe }}</p>
              </a>
            </div>
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
    @if($orders ?? ''!=NULL)
    <section class="content pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="form-group row">
                <div class="col-lg-6 pt-4 ">
                  <div class="Rectangle-Copy-6 pl-4 t-head">
                    <!-- /.card-body -->
                    <div class="p-2"> <canvas id="myChart" width="600" height="350"></canvas></div>
                  </div>
                </div>
                <div class="col-lg-6 pt-4 ">
                  <div class="Rectangle-Copy-6 pl-4 t-head">
                    <!-- /.card-body -->
                   <div class="p-2"> <canvas id="barchart" width="600" height="350"></canvas></div>
                  </div>
                </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    @endif
    <section class="content pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="form-group row">
              <div class="col-lg-6 pt-4 ">
                <div class="Rectangle-Copy-6 pl-4 t-head">
                  <!-- /.card-body -->
                <div class="p-2"> <canvas id="barchart2" width="600" height="350"></canvas></div>
                </div>
              </div>
              <div class="col-lg-6 pt-4 ">
                <div class="Rectangle-Copy-6 pl-4 t-head">
                  <!-- /.card-body -->
                  <div class="p-2"> <canvas id="myChart2" width="600" height="350"></canvas></div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <div id="visitors"  class="tabcontent">
      <section class="content pt-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="Rectangle-Copy-6 pl-4 t-head">
                <div class="row pt-4 pl-4 pr-5" style="width:100% !important;">
                  <div class="col-lg-10"><h3  class=" My-employees">Visitor Log<a href="{{ url('surveys') }}" class="table-side-tag pl-4">SEE ALL</a></h3></div>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body" >
                      <table class="table" id="empdatatable6">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Verification Status</th>
                                  <th>Updated on</th>
                                  <th>Risk Factor</th>
                                  <th>Candidate Type</th>
                              </tr>
                          </thead>
                          <tbody class="t-body">
                            
                            @foreach($orders ?? '' as $employee)
                            @if($employee->visitor_id!=null)
                            @if(\Carbon\Carbon::parse($employee->created_at)->format('d/m/Y') == Carbon\Carbon::today()->format('d/m/Y'))
                                <tr class="table-style" onclick="window.location='{{ url('health/visitor/'.md5($employee->id)) }}';">
                                  <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                  @if($employee->survey_status=="COMPLETE")
                                  <td class="pl-4">Completed</td>
                                  @else
                                  <td class="pl-4">Incomplete</td>
                                  @endif
                                  <td><span class="safe">{{ date(" M d, H:i  Y",strtotime($employee->updated_at)) }}</span></td>
                                  @if($employee->severity=="GREEN")
                                  <td class="pl-4"><span class="safe">SAFE</span> </td>
                                  @elseif($employee->severity=="RED")
                                  <td class="pl-4"><span class="red">POSITIVE</span> </td>
                                  @elseif($employee->severity=="YELLOW")
                                  <td class="pl-4"><span class="unsafe">UNSAFE</span> </td>
                                  @else
                                  <td class="pl-4" style="color: #07901a;">&nbsp;&nbsp;&nbsp;-</td>
                                  @endif
                                  <td class="pl-4">Visitor</td>
                                </tr>
                            @endif
                            @endif
                            @endforeach
                          </tbody>
                      </table>
                      <div class="pt-4 pl-4 pb-2 pr-5">
                  
                </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    </div>

    <div id="completed" class="tabcontent" >
      <section class="content pt-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="Rectangle-Copy-6 pl-4 t-head">
                <div class="row pt-4 pl-4 pr-5" style="width:100% !important;">
                  <div class="col-lg-10"><h3  class=" My-employees">Survey Completed Reports<a href="{{ url('surveys') }}" class="table-side-tag pl-4">SEE ALL</a></h3></div>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body" >
                      <table class="table" id="empdatatable2">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Verification Status</th>
                                  <th>Risk Factor</th>
                                  <th>Candidate Type</th>
                              </tr>
                          </thead>
                          <?php $a=0 ?>
                          <tbody class="t-body">
                            
                            @foreach($orders ?? '' as $employee)
                            @if($employee->survey_status=="COMPLETE")
                            @if($a++ < $survey_completed)
                              @if(isset($employee->visitor_id))
                                <tr class="table-style" onclick="window.location='{{ url('health/visitor/'.md5($employee->id)) }}';">
                                  <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                  <td class="pl-4">Completed</td>
                                  @if($employee->severity=="GREEN")
                                  <td class="pl-4"><span class="safe">SAFE</span> </td>
                                  @elseif($employee->severity=="RED")
                                  <td class="pl-4"><span class="red">POSITIVE</span> </td>
                                  @elseif($employee->severity=="YELLOW")
                                  <td class="pl-4"><span class="unsafe">UNSAFE</span> </td>
                                  @else
                                  <td class="pl-4" style="color: #07901a;">&nbsp;&nbsp;&nbsp;-</td>
                                  @endif
                                  <td class="pl-4">Visitor</td>
                                </tr>
                              @else
                                <tr class="table-style"  onclick="window.location='{{ url('health/details/'.md5($employee->id)) }}';">
                                  <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                  <td class="pl-4">Completed</td>
                                  @if($employee->severity=="GREEN")
                                  <td class="pl-4"><span class="safe">SAFE</span> </td>
                                  @elseif($employee->severity=="RED")
                                  <td class="pl-4"><span class="red">POSITIVE</span> </td>
                                  @elseif($employee->severity=="YELLOW")
                                  <td class="pl-4"><span class="unsafe">UNSAFE</span> </td>
                                  @else
                                  <td class="pl-4" style="color: #07901a;">&nbsp;&nbsp;&nbsp;-</td>
                                  @endif
                                  <td class="pl-4">Employee</td>
                              @endif
                            @endif
                            @endif
                            @endforeach
                          </tbody>
                      </table>
                      <div class="pt-4 pl-4 pb-2 pr-5">
                  
                </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    </div>
    <a class="p-4"></a>
    
    <div id="safe" class="tabcontent" >
      <section class="content pt-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="Rectangle-Copy-6 pl-4 t-head">
                <div class="row pt-4 pl-4 pr-5" style="width:100% !important;">
                  <div class="col-lg-10"><h3  class=" My-employees">Safe Candidates<a href="{{ url('surveys') }}" class="table-side-tag pl-4">SEE ALL</a></h3></div>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body" >
                      <table class="table" id="empdatatable5">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Verification Status</th>
                                  <th>Risk Factor</th>
                                  <th>Candidate Type</th>
                              </tr>
                          </thead>
                          <?php $b=0 ?>
                          <tbody class="t-body">
                            
                            @foreach($orders ?? '' as $employee)
                            @if($employee->severity=="GREEN")
                            @if($b++ < $safe)
                            @if(isset($employee->visitor_id))
                                <tr class="table-style" onclick="window.location='{{ url('health/visitor/'.md5($employee->id)) }}';">
                                  <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                  <td class="pl-4">Completed</td>
                                  @if($employee->severity=="GREEN")
                                  <td class="pl-4"><span class="safe">SAFE</span> </td>
                                  @elseif($employee->severity=="RED")
                                  <td class="pl-4"><span class="red">POSITIVE</span> </td>
                                  @elseif($employee->severity=="YELLOW")
                                  <td class="pl-4"><span class="unsafe">UNSAFE</span> </td>
                                  @else
                                  <td class="pl-4" style="color: #07901a;">&nbsp;&nbsp;&nbsp;-</td>
                                  @endif
                                  <td class="pl-4">Visitor</td>
                                </tr>
                              @else
                                <tr class="table-style"  onclick="window.location='{{ url('health/details/'.md5($employee->id)) }}';">
                                  <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                  <td class="pl-4">Completed</td>
                                  @if($employee->severity=="GREEN")
                                  <td class="pl-4"><span class="safe">SAFE</span> </td>
                                  @elseif($employee->severity=="RED")
                                  <td class="pl-4"><span class="red">POSITIVE</span> </td>
                                  @elseif($employee->severity=="YELLOW")
                                  <td class="pl-4"><span class="unsafe">UNSAFE</span> </td>
                                  @else
                                  <td class="pl-4" style="color: #07901a;">&nbsp;&nbsp;&nbsp;-</td>
                                  @endif
                                  <td class="pl-4">Employee</td>
                              @endif
                            @endif
                            @endif
                            @endforeach
                          </tbody>
                      </table>
                      <div class="pt-4 pl-4 pb-2 pr-5">
                  
                </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    </div>
    <a class="p-4"></a>

    <div id="unsafe" class="tabcontent" >
      <section class="content pt-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="Rectangle-Copy-6 pl-4 t-head">
                <div class="row pt-4 pl-4 pr-5" style="width:100% !important;">
                  <div class="col-lg-10"><h3  class=" My-employees">Unsafe Candidates<a href="{{ url('surveys') }}" class="table-side-tag pl-4">SEE ALL</a></h3></div>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body" >
                      <table class="table" id="empdatatable3">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Verification Status</th>
                                  <th>Risk Factor</th>
                                  <th>Candidate Type</th>
                              </tr>
                          </thead>
                          <?php $c=0 ?>
                          <tbody class="t-body">
                            
                            @foreach($orders ?? '' as $employee)
                            @if($employee->severity=="YELLOW")
                            @if($c++ < $survey_unsafe)
                            @if(isset($employee->visitor_id))
                                <tr class="table-style" onclick="window.location='{{ url('health/visitor/'.md5($employee->id)) }}';">
                                  <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                  <td class="pl-4">Completed</td>
                                  @if($employee->severity=="GREEN")
                                  <td class="pl-4"><span class="safe">SAFE</span> </td>
                                  @elseif($employee->severity=="RED")
                                  <td class="pl-4"><span class="red">POSITIVE</span> </td>
                                  @elseif($employee->severity=="YELLOW")
                                  <td class="pl-4"><span class="unsafe">UNSAFE</span> </td>
                                  @else
                                  <td class="pl-4" style="color: #07901a;">&nbsp;&nbsp;&nbsp;-</td>
                                  @endif
                                  <td class="pl-4">Visitor</td>
                                </tr>
                              @else
                                <tr class="table-style"  onclick="window.location='{{ url('health/details/'.md5($employee->id)) }}';">
                                  <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                  <td class="pl-4">Completed</td>
                                  @if($employee->severity=="GREEN")
                                  <td class="pl-4"><span class="safe">SAFE</span> </td>
                                  @elseif($employee->severity=="RED")
                                  <td class="pl-4"><span class="red">POSITIVE</span> </td>
                                  @elseif($employee->severity=="YELLOW")
                                  <td class="pl-4"><span class="unsafe">UNSAFE</span> </td>
                                  @else
                                  <td class="pl-4" style="color: #07901a;">&nbsp;&nbsp;&nbsp;-</td>
                                  @endif
                                  <td class="pl-4">Employee</td>
                              @endif
                            @endif
                            @endif
                            @endforeach
                          </tbody>
                      </table>
                      <div class="pt-4 pl-4 pb-2 pr-5">
                  
                </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    </div>
    <a class="p-4"></a>

    <div id="positive" class="tabcontent" >
      <section class="content pt-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="Rectangle-Copy-6 pl-4 t-head">
                <div class="row pt-4 pl-4 pr-5" style="width:100% !important;">
                  <div class="col-lg-10"><h3  class=" My-employees">COVID Positive Candidates<a href="{{ url('surveys') }}" class="table-side-tag pl-4">SEE ALL</a></h3></div>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body" >
                      <table class="table" id="empdatatable4">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Verification Status</th>
                                  <th>Risk Factor</th>
                                  <th>Candidate Type</th>
                              </tr>
                          </thead>
                          <?php $d=0 ?>
                          <tbody class="t-body">
                            
                            @foreach($orders ?? '' as $employee)
                            @if($employee->severity=="RED")
                            @if($d++ < $survey_postive)
                            @if(isset($employee->visitor_id))
                                <tr class="table-style" onclick="window.location='{{ url('health/visitor/'.md5($employee->id)) }}';">
                                  <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                  <td class="pl-4">Completed</td>
                                  @if($employee->severity=="GREEN")
                                  <td class="pl-4"><span class="safe">SAFE</span> </td>
                                  @elseif($employee->severity=="RED")
                                  <td class="pl-4"><span class="red">POSITIVE</span> </td>
                                  @elseif($employee->severity=="YELLOW")
                                  <td class="pl-4"><span class="unsafe">UNSAFE</span> </td>
                                  @else
                                  <td class="pl-4" style="color: #07901a;">&nbsp;&nbsp;&nbsp;-</td>
                                  @endif
                                  <td class="pl-4">Visitor</td>
                                </tr>
                              @else
                                <tr class="table-style"  onclick="window.location='{{ url('health/details/'.md5($employee->id)) }}';">
                                  <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                  <td class="pl-4">Completed</td>
                                  @if($employee->severity=="GREEN")
                                  <td class="pl-4"><span class="safe">SAFE</span> </td>
                                  @elseif($employee->severity=="RED")
                                  <td class="pl-4"><span class="red">POSITIVE</span> </td>
                                  @elseif($employee->severity=="YELLOW")
                                  <td class="pl-4"><span class="unsafe">UNSAFE</span> </td>
                                  @else
                                  <td class="pl-4" style="color: #07901a;">&nbsp;&nbsp;&nbsp;-</td>
                                  @endif
                                  <td class="pl-4">Employee</td>
                              @endif
                            @endif
                            @endif
                            @endforeach
                          </tbody>
                      </table>
                      <div class="pt-4 pl-4 pb-2 pr-5">
                  
                </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    </div>
    <a class="p-4"></a>

    <div id="default"  class="tabcontent">
      <section class="content pt-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="Rectangle-Copy-6 pl-4 t-head">
                <div class="row pt-4 pl-4 pr-5" style="width:100% !important;">
                  <div class="col-lg-10"><h3  class=" My-employees">Reports<a href="{{ url('surveys') }}" class="table-side-tag pl-4">SEE ALL</a></h3></div>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body" >
                      <table class="table" id="empdatatable">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Verification Status</th>
                                  <th>Risk Factor</th>
                                  <th>Candidate Type</th>
                              </tr>
                          </thead>
                          <tbody class="t-body">
                            
                            @foreach($orders ?? '' as $employee)
                            @if(\Carbon\Carbon::parse($employee->created_at)->format('d/m/Y') == Carbon\Carbon::today()->format('d/m/Y'))
                            @if(isset($employee->visitor_id))
                                <tr class="table-style" onclick="window.location='{{ url('health/visitor/'.md5($employee->id)) }}';">
                                  <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                  @if($employee->survey_status=="COMPLETE")
                                  <td class="pl-4">Completed</td>
                                  @else
                                  <td class="pl-4">Incomplete</td>
                                  @endif
                                  @if($employee->severity=="GREEN")
                                  <td class="pl-4"><span class="safe">SAFE</span> </td>
                                  @elseif($employee->severity=="RED")
                                  <td class="pl-4"><span class="red">POSITIVE</span> </td>
                                  @elseif($employee->severity=="YELLOW")
                                  <td class="pl-4"><span class="unsafe">UNSAFE</span> </td>
                                  @else
                                  <td class="pl-4" style="color: #07901a;">&nbsp;&nbsp;&nbsp;-</td>
                                  @endif
                                  <td class="pl-4">Visitor</td>
                                </tr>
                              @else
                                <tr class="table-style"  onclick="window.location='{{ url('health/details/'.md5($employee->id)) }}';">
                                  <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                  @if($employee->survey_status=="COMPLETE")
                                  <td class="pl-4">Completed</td>
                                  @else
                                  <td class="pl-4">Incomplete</td>
                                  @endif
                                  @if($employee->severity=="GREEN")
                                  <td class="pl-4"><span class="safe">SAFE</span> </td>
                                  @elseif($employee->severity=="RED")
                                  <td class="pl-4"><span class="red">POSITIVE</span> </td>
                                  @elseif($employee->severity=="YELLOW")
                                  <td class="pl-4"><span class="unsafe">UNSAFE</span> </td>
                                  @else
                                  <td class="pl-4" style="color: #07901a;">&nbsp;&nbsp;&nbsp;-</td>
                                  @endif
                                  <td class="pl-4">Employee</td>
                              @endif
                            @endif
                            @endforeach
                          </tbody>
                      </table>
                      <div class="pt-4 pl-4 pb-2 pr-5">
                  
                </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    </div>
    <a class="p-4"></a>

    <a class="p-4"></a>

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
    tablinks[i].className = tablinks[i].className.replace(" active-card", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script>
 // Return with commas in between
 var numberWithCommas = function(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  };

var dataPack1 = [<?php echo $positive[7]; ?>, <?php echo $positive[6]; ?>,<?php echo $positive[5]; ?>,<?php echo $positive[4]; ?>,
<?php echo $positive[3]; ?>,<?php echo $positive[2]; ?>,<?php echo $positive[1]; ?>,<?php echo $positive[0]; ?>];
var dataPack2 = [<?php echo $negative[7]; ?>, <?php echo $negative[6]; ?>,<?php echo $negative[5]; ?>,<?php echo $negative[4]; ?>,<?php echo $negative[3]; ?>,
<?php echo $negative[2]; ?>,<?php echo $negative[1]; ?>,<?php echo $negative[0]; ?>,];
var dataPack3 = [<?php echo $total[7]; ?>, <?php echo $total[6]; ?>,<?php echo $total[5]; ?>,<?php echo $total[4]; ?>,<?php echo $total[3]; ?>,
<?php echo $total[2]; ?>,<?php echo $total[1]; ?>,<?php echo $total[0]; ?>,];
var dates = ["<?php echo $day[7]; ?>","<?php echo $day[6]; ?>","<?php echo $day[5]; ?>","<?php echo $day[4]; ?>","<?php echo $day[3]; ?>",
"<?php echo $day[2]; ?>","<?php echo $day[1]; ?>","<?php echo $day[0]; ?>",];

// Chart.defaults.global.elements.rectangle.backgroundColor = '#FF0000';

var bar_ctx = document.getElementById('barchart');
var bar_chart = new Chart(bar_ctx, {
    type: 'bar',
    align: 'start',
    data: {
        labels: dates,
        
         datasets: [
        {
            label: 'Positive',
            data: dataPack1,
						backgroundColor: "rgb(255, 16, 96)",
						hoverBackgroundColor: "rgb(255,16,90)",
						hoverBorderWidth: 2,
						hoverBorderColor: 'lightgrey'
        },
        {
            label: 'Safe',
            data: dataPack2,
						backgroundColor: "rgb(39,205,144)",
						hoverBackgroundColor: "rgb(39,205,140)",
						hoverBorderWidth: 2,
						hoverBorderColor: 'lightgrey'
        },
        {
            label: 'Total',
            data: dataPack3,
						backgroundColor: "rgb(45,135,255)",
						hoverBackgroundColor: "rgb(45,135,250)",
						hoverBorderWidth: 2,
						hoverBorderColor: 'lightgrey'
        },
        ]
    },
    options: {
        title: {
            display: true,
            text: 'Total vs Safe vs Positive',
            fontSize : 18,
            fontFamily : 'Montserrat',
            align: 'start',
        },
     		animation: {
        	duration: 10,
        },
        tooltips: {
					mode: 'label',
          callbacks: {
          label: function(tooltipItem, data) { 
          	return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
          }
          }
         },
        scales: {
          xAxes: [{ 
            barPercentage: 0.4,
          	stacked: true, 
            gridLines: { display: false },
            }],
          yAxes: [{ 
          	stacked: true, 
            ticks: {
        			callback: function(value) { return numberWithCommas(value); },
     				}, 
            }],
        }, // scales
        legend: {display: true}
    } // options
   }
);
</script>
<script>
    Chart.pluginService.register({
      beforeDraw: function(chart) {
        if (chart.config.options.elements.center) {
          // Get ctx from string
          var ctx = chart.chart.ctx;

          // Get options from the center object in options
          var centerConfig = chart.config.options.elements.center;
          var fontStyle = centerConfig.fontStyle || 'Arial';
          var txt = centerConfig.text;
          var color = centerConfig.color || '#000';
          var maxFontSize = centerConfig.maxFontSize || 75;
          var sidePadding = centerConfig.sidePadding || 20;
          var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
          // Start with a base font of 30px
          ctx.font = "30px " + fontStyle;

          // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
          var stringWidth = ctx.measureText(txt).width;
          var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

          // Find out how much the font can grow in width.
          var widthRatio = elementWidth / stringWidth;
          var newFontSize = Math.floor(30 * widthRatio);
          var elementHeight = (chart.innerRadius * 2);

          // Pick a new font size so it will not be larger than the height of label.
          var fontSizeToUse = Math.min(newFontSize, elementHeight, maxFontSize);
          var minFontSize = centerConfig.minFontSize;
          var lineHeight = centerConfig.lineHeight || 25;
          var wrapText = false;

          if (minFontSize === undefined) {
            minFontSize = 20;
          }

          if (minFontSize && fontSizeToUse < minFontSize) {
            fontSizeToUse = minFontSize;
            wrapText = true;
          }

          // Set font settings to draw it correctly.
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
          var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
          ctx.font = fontSizeToUse + "px " + fontStyle;
          ctx.fillStyle = color;

          if (!wrapText) {
            ctx.fillText(txt, centerX, centerY);
            return;
          }

          var words = txt.split(' ');
          var line = '';
          var lines = [];

          // Break words up into multiple lines if necessary
          for (var n = 0; n < words.length; n++) {
            var testLine = line + words[n] + ' ';
            var metrics = ctx.measureText(testLine);
            var testWidth = metrics.width;
            if (testWidth > elementWidth && n > 0) {
              lines.push(line);
              line = words[n] + ' ';
            } else {
              line = testLine;
            }
          }

          // Move the center up depending on line height and number of lines
          centerY -= (lines.length / 2) * lineHeight;

          for (var n = 0; n < lines.length; n++) {
            ctx.fillText(lines[n], centerX, centerY);
            centerY += lineHeight;
          }
          //Draw text in center
          ctx.fillText(line, centerX, centerY);
        }
      }
    });


var config = {
  type: 'doughnut',
  data: {
    labels: [
      "Surveys completed",
      "COVID postive",
      "Safe Candidates",
      "Unsafe Candidates",
      "Registered Candidates"
    ],
    datasets: [{
      data: [<?php echo $survey_completed; ?>, <?php echo $survey_postive; ?>, <?php echo $safe; ?>, <?php echo $survey_unsafe; ?>, <?php echo $survey_candidates; ?>],
      backgroundColor: [
        "#484edb",
        "rgb(255, 16, 96)",
        "rgb(39,205,144)",
        "#fe983f",
        "rgb(45,135,255)"
      ],
      borderWidth: 4,
      hoverBackgroundColor: [
        "#484edb",
        "rgb(255, 16, 96)",
        "rgb(39,205,144)",
        "#fe983f",
        "rgb(45,135,255)"
      ]
    }]
  },
  options: {
    title: {
            display: true,
            text: '<?php echo $text; ?>',
            fontSize : 20,
            fontColor : '<?php echo $font; ?>',
            fontFamily : 'Montserrat',
            align: 'start',
        },
    cutoutPercentage: 60,
    legend: {
            display: true,
            position: 'right',
            align: 'end'
        },
    percentageInnerCutout: 10,
    elements: {
      center: {
        text: '',
        color: '#FF6384', // Default is #000000
        fontStyle: 'Arial', // Default is Arial
        sidePadding: 20, // Default is 20 (as a percentage)
        minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
        lineHeight: 25 // Default is 25 (in px), used for when text wraps
      }
    }
  }
};

var ctx = document.getElementById("myChart").getContext("2d");
var myChart = new Chart(ctx, config);
</script>
<script>
 // Return with commas in between
 var numberWithCommas = function(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  };

var dataPack1 = [<?php echo $visitor_bar[7]; ?>, <?php echo $visitor_bar[6]; ?>,<?php echo $visitor_bar[5]; ?>,<?php echo $visitor_bar[4]; ?>,
<?php echo $visitor_bar[3]; ?>,<?php echo $visitor_bar[2]; ?>,<?php echo $visitor_bar[1]; ?>,<?php echo $visitor_bar[0]; ?>];
var dates = ["<?php echo $day[7]; ?>","<?php echo $day[6]; ?>","<?php echo $day[5]; ?>","<?php echo $day[4]; ?>","<?php echo $day[3]; ?>",
"<?php echo $day[2]; ?>","<?php echo $day[1]; ?>","<?php echo $day[0]; ?>",];

// Chart.defaults.global.elements.rectangle.backgroundColor = '#FF0000';

var bar_ctx = document.getElementById('barchart2');
var bar_chart = new Chart(bar_ctx, {
    type: 'bar',
    align: 'start',
    data: {
        labels: dates,
        
         datasets: [
        {
            label: 'Total',
            data: dataPack1,
						backgroundColor: "rgb(30,144,255)",
						hoverBackgroundColor: "rgb(65,105,225)",
						hoverBorderWidth: 2,
						hoverBorderColor: 'lightgrey'
        },
        ]
    },
    options: {
        title: {
            display: true,
            text: 'Visitor History',
            fontSize : 18,
            fontFamily : 'Montserrat',
            align: 'start',
        },
     		animation: {
        	duration: 10,
        },
        tooltips: {
					mode: 'label',
          callbacks: {
          label: function(tooltipItem, data) { 
          	return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
          }
          }
         },
        scales: {
          xAxes: [{ 
            barPercentage: 0.4,
          	stacked: true, 
            gridLines: { display: false },
            }],
          yAxes: [{ 
          	stacked: true, 
            ticks: {
        			callback: function(value) { return numberWithCommas(value); },
     				}, 
            }],
        }, // scales
        legend: {display: true}
    } // options
   }
);
</script>
<script>
    Chart.pluginService.register({
      beforeDraw: function(chart) {
        if (chart.config.options.elements.center) {
          // Get ctx from string
          var ctx = chart.chart.ctx;

          // Get options from the center object in options
          var centerConfig = chart.config.options.elements.center;
          var fontStyle = centerConfig.fontStyle || 'Arial';
          var txt = centerConfig.text;
          var color = centerConfig.color || '#000';
          var maxFontSize = centerConfig.maxFontSize || 75;
          var sidePadding = centerConfig.sidePadding || 20;
          var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
          // Start with a base font of 30px
          ctx.font = "30px " + fontStyle;

          // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
          var stringWidth = ctx.measureText(txt).width;
          var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

          // Find out how much the font can grow in width.
          var widthRatio = elementWidth / stringWidth;
          var newFontSize = Math.floor(30 * widthRatio);
          var elementHeight = (chart.innerRadius * 2);

          // Pick a new font size so it will not be larger than the height of label.
          var fontSizeToUse = Math.min(newFontSize, elementHeight, maxFontSize);
          var minFontSize = centerConfig.minFontSize;
          var lineHeight = centerConfig.lineHeight || 25;
          var wrapText = false;

          if (minFontSize === undefined) {
            minFontSize = 20;
          }

          if (minFontSize && fontSizeToUse < minFontSize) {
            fontSizeToUse = minFontSize;
            wrapText = true;
          }

          // Set font settings to draw it correctly.
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
          var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
          ctx.font = fontSizeToUse + "px " + fontStyle;
          ctx.fillStyle = color;

          if (!wrapText) {
            ctx.fillText(txt, centerX, centerY);
            return;
          }

          var words = txt.split(' ');
          var line = '';
          var lines = [];

          // Break words up into multiple lines if necessary
          for (var n = 0; n < words.length; n++) {
            var testLine = line + words[n] + ' ';
            var metrics = ctx.measureText(testLine);
            var testWidth = metrics.width;
            if (testWidth > elementWidth && n > 0) {
              lines.push(line);
              line = words[n] + ' ';
            } else {
              line = testLine;
            }
          }

          // Move the center up depending on line height and number of lines
          centerY -= (lines.length / 2) * lineHeight;

          for (var n = 0; n < lines.length; n++) {
            ctx.fillText(lines[n], centerX, centerY);
            centerY += lineHeight;
          }
          //Draw text in center
          ctx.fillText(line, centerX, centerY);
        }
      }
    });


var config = {
  type: 'doughnut',
  data: {
    labels: [
      "Total Visitors","Safe Visitors","Unsafe Visitors"
    ],
    datasets: [{
      data: [<?php echo $visitor_bar[0]; ?>,<?php echo $visitor_safe; ?>, <?php echo $visitor_unsafe; ?>],
      backgroundColor: [
        "rgb(56, 88, 255)",
        "rgb(86, 58, 255)",
        "rgb(25,25,112)"
      ],
      borderWidth: 4,
      hoverBackgroundColor: [
        "rgb(48, 77, 224)",
        "rgb(73, 48, 224 )",
        "rgb(25,25,112)"
      ]
    }]
  },
  options: {
    title: {
            display: true,
            text: 'Distribution',
            fontSize : 20,
            fontColor : 'rgb(54, 35, 166)',
            fontFamily : 'Montserrat',
            align: 'start',
            fontStyle: "800",
        },
    cutoutPercentage: 80,
    legend: {
            display: true,
            position: 'right',
            align: 'end'
        },
    percentageInnerCutout: 10,
    elements: {
      center: {
        text: '',
        color: '#FF6384', // Default is #000000
        fontStyle: 'Arial', // Default is Arial
        sidePadding: 20, // Default is 20 (as a percentage)
        minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
        lineHeight: 25 // Default is 25 (in px), used for when text wraps
      }
    }
  }
};

var ctx = document.getElementById("myChart2").getContext("2d");
var myChart = new Chart(ctx, config);
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
		 $(document).ready(function() {
          $('#empdatatable').DataTable( {
            language: 
            {
              searchPlaceholder: "Search",
              search: "",
            },
              "ordering": false,
              "info":     false,
          } );
      } );
		</script>
    <script>
		 $(document).ready(function() {
          $('#empdatatable2').DataTable( {
            language: 
            {
              searchPlaceholder: "Search",
              search: "",
            },
              "ordering": false,
              "info":     false,
          } );
      } );
		</script>
    
    <script>
		 $(document).ready(function() {
          $('#empdatatable3').DataTable( {
            language: 
            {
              searchPlaceholder: "Search",
              search: "",
            },
              "ordering": false,
              "info":     false,
          } );
      } );
		</script>
    
    <script>
		 $(document).ready(function() {
          $('#empdatatable4').DataTable( {
            language: 
            {
              searchPlaceholder: "Search",
              search: "",
            },
              "ordering": false,
              "info":     false,
          } );
      } );
		</script>
    
    <script>
		 $(document).ready(function() {
          $('#empdatatable5').DataTable( {
            language: 
            {
              searchPlaceholder: "Search",
              search: "",
            },
              "ordering": false,
              "info":     false,
          } );
      } );
		</script>
    <script>
		 $(document).ready(function() {
          $('#empdatatable6').DataTable( {
            language: 
            {
              searchPlaceholder: "Search",
              search: "",
            },
              "ordering": false,
              "info":     false,
          } );
      } );
		</script>
@endsection
