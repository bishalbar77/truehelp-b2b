{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Create Products</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/boot.min.css">
<style>
* {
  box-sizing: border-box;
}

.columns {
  float: left;
  width: 25%;
  padding: 8px;
}

.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2);
  border-radius: 25px 25px 25px 25px ;
}

.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
  border-radius: 25px 25px 0 0;
}

.grey2 {
    background-color: #eee;
    font-size: 20px;
}
.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}
.price {
  
  border-radius: 25px 25px 25px 25px !important;
}
.price .grey {
  background-color: #eee;
  font-size: 20px;
  border-radius: 0 0 25px 25px;
}

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
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
a:hover {
    text-decoration: none !important;
}
/* align icon */
.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }

</style>

@endsection

{{-- Content --}}
@section('content')

  <!-- /.navbar -->
  @include('layouts.header')

    <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->
        <h2 style="text-align:center">Create new Plan</h2>
        <div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="Rectangle-Copy-6 pl-4 t-head">
                    <div class="pt-4 pl-4 pb-2 pr-5">
                        <div class="row">
                        <form action="{{ route('payment.store') }}" method="POST">
                                @csrf
                            
                                <div class="row p-3">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Product ID:</strong>
                                            <input type="text" name="id" class="form-control" placeholder="Product ID">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Product Name:</strong>
                                            <input type="text" name="name" class="form-control" placeholder="Product Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Description:</strong>
                                            <input type="text" name="description" class="form-control" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Amount:</strong>
                                            <input type="text" name="amount" class="form-control" placeholder="Amount">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Currency:</strong>
                                            <input type="text" name="currency" class="form-control" placeholder="Currency">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Interval Time:</strong>
                                            <select type="text" name="interval" class="form-control" placeholder="Name">
                                            <option value="One Time">One Time</option>
                                            <option value="day">Day</option>
                                            <option value="week">Week</option>
                                            <option value="month">Month</option>
                                            <option value="year">Year</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Main content -->
  </div>


@endsection

@section('scripts')
@if (app()->isLocal())
  <script src="https://enterprise.gettruehelp.com/js/app.js"></script>
@else
  <script src="https://enterprise.gettruehelp.com/js/manifest.js"></script>
  <script src="https://enterprise.gettruehelp.com/js/vendor.js"></script>
  <script src="https://enterprise.gettruehelp.com/js/app.js"></script>
@endif

<link rel="stylesheet" href="https://enterprise.gettruehelp.com/css/app.css" />
<script defer src="https://enterprise.gettruehelp.com/js/app.js"></script>
@endsection






