{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Candidate Details</title>
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
.edit-pic {
  width: 100%;
  height: 24px;
  font-family: Montserrat;
  font-size: 16px;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: left;
  color: lightblue;
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
@include('layouts.header_v5')
  <!-- /.navbar -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="Add-Employees pt-3" id="exampleModalLabel">Add Candidate</div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="form-group row pl-3">
            <label class="checkbox-inline check-box-selected p-2"><input type="checkbox" checked ="Checked"><a class="pl-2">Individually</a></label>
            <label class="checkbox-inline check-box-unselected p-2"><input type="checkbox" data-dismiss="modal" data-toggle="modal" data-target="#bulkModal"><a class="pl-2">Upload List</a></label>
          </div>
        <div class="signup-form">
        <form action="{{ route('employees.store') }}" method="post">
        @csrf
          <div class="form-group row">
              <div class="col-lg-4">
                <label class="form-label-text">First Name</label>
                <input type="text" class="form-control" name="first_name" required="required">
              </div>
              <div class="col-lg-4">
              <label class="form-label-text">Middle Name:</label>
              <input type="text" class="form-control" name="middle_name" required="required">
              </div>  	
              <div class="col-lg-4">
              <label class="form-label-text">Last Name:</label>
              <input type="text" class="form-control" name="last_name" required="required">
              </div>  	
              </div>
              <div class="form-group row">
              <div class="col-lg-4">
              <label class="form-label-text">Email:</label>
              <input type="email" class="form-control" name="email" required="required">
              </div>
                <div class="col-lg-4">
                <label class="form-label-text">Mobile</label>
                <input type="phone" class="form-control" name="mobile" required="required">
                </div>
                <div class="col-lg-4">
                <label class="form-label-text">Date of Birth:</label>
                <input type="date" class="form-control" name="dob" required="required">
                </div>  	           
                </div>
                    <div class="form-group row">
                <div class="col-lg-4">
                <label class="form-label-text">Address:</label>
                <input type="text" class="form-control" name="address" required="required">
                </div>
                <div class="col-lg-4">
                <label class="form-label-text">Gender:</label>
                <select name="gender" class="form-control" id="gender">
                    <option value="">Select Gender</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                    <option value="Others">Others</option>
                </select>
                </div>
                <div class="col-lg-4">
                <label class="form-label-text">Designation:</label>
                <input type="text" class="form-control" name="user_type" required="required">
                </div>
              </div>   
              <div class="form-group row">
                <div class="col-lg-4">
                  <label class="form-label-text">Guardian Name</label>
                  <input type="text" class="form-control" name="guardian_name" required="required">
                </div>
                  <div class="col-lg-4">
                    <label class="form-label-text">Guardian Phone</label>
                    <input type="phone" class="form-control" name="guardian_phone" required="required">
                  </div>
                  <div class="col-lg-4">
                  <label class="form-label-text">Relationship</label>
                    <select name="guardian_relation" class="form-control" id="guardian_relation">
                        <option value="">Select Relation</option>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Brother">Brother</option>
                        <option value="Sister">Sister</option>
                        <option value="Others">Others</option>
                    </select>
                  </div>  	           
                </div>
              <div class="form-group row pl-3">
            <label class="Employee-currently-w"><input type="checkbox"><a class="pl-2">Employee currently works with you</a></label>
          </div>
          <div class="form-group row pl-3">
            <div class="col-lg-4">
              <div class="upload-pink">
                <span class="upload-pink"><input type="file" class="custom-file-input" />
                <i class="fa fa-picture-o pl-5" style="margin-left:20px;" aria-hidden="true"></i>
                  <div><p class="Upload-Employee-Pic" style="color:black;">Upload Candidate Pic</p></div>
                </span>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="upload-blue">
                <span class="upload-blue"><input type="file" class="custom-file-input" /></span>
                <i class="fa fa-picture-o pl-5" style="margin-left:20px;" aria-hidden="true"></i>
                <div><p class="Upload-Employee-Pic" style="color:black;">Upload Document</p></div>
              </div>
            </div>
          </div>
          <div class="form-group row float-right">
                  <button type="submit" class="btn-warning button-proceed Proceed">Proceed</button>
              </div>
          </form>
      </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="bulkModal" tabindex="-1" role="dialog" aria-labelledby="bulkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <div class="Add-Employees pt-3" id="exampleModalLabel">Add Candidates</div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row pl-3">
            <label class="checkbox-inline check-box-unselected p-2"><input type="checkbox" data-dismiss="modal" data-toggle="modal" data-target="#exampleModal"><a class="pl-2">Individually</a></label>
            <label class="checkbox-inline check-box-selected p-2"><input type="checkbox" checked ="Checked"><a class="pl-2">Upload List</a></label>
          </div>
        <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
          {{ csrf_field() }}
          <div class="form-group row pt-5 pl-5">
            <p class="Download-the-Excel-s">
            Download the Excel sheet >> Fill details >> Upload
            </p>
          </div>
          <div class="form-group row pr-5 pl-5">
            <p class="Lorem-ipsum-dolor-si">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore 
            Ut enim ad minim veniam, quis nostrud exercitation 
            </p>
          </div>
          <div class="form-group row pr-5 pl-5">
              <a class="Download-Template pl-2" href="/export"><i class="nav-icon fa fa-user pr-2"></i>Download Template</a>
          </div>
          <div class="form-group row pt-2 pl-5">
            <div class="col-lg-4">
              <div class="upload-blue">
                <span class="upload-blue"><input type="file" name="select_file"  class="custom-file-input"/></span>
                <i class="fa fa-picture-o pl-5" style="margin-left:24px;" aria-hidden="true"></i>
                <div><p class="Upload-Employee-Pic" style="color:black;">Upload Excel template</p></div>
              </div>
            </div>
          </div>
          <div class="form-group row float-right">
              <button type="submit" class="btn-warning button-proceed Proceed">Proceed</button><a class="p-5"></a>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="picModal" tabindex="-1" role="dialog" aria-labelledby="picModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="Add-Employees pt-3" id="picModalLabel">Upload Profile Picture</div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="signup-form">
        <form action="{{ route('employees.picture') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="employee_id" value="{{ $id}}">
          <div class="form-group row pl-3">
            <div class="col-lg-4">
              <div class="upload-pink">
                <span class="upload-pink"><input type="file" name="file" id="file" class="custom-file-input" accept=".png, .jpg, .jpeg">
                <i class="fa fa-picture-o pl-5" style="margin-left:20px;" aria-hidden="true"></i>
                  <div><p class="Upload-Employee-Pic" style="color:black;">Upload Candidate Pic</p></div>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group row float-right">
                  <button type="submit" class="btn-warning button-proceed Proceed">Proceed</button>
              </div>
          </form>
      </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="signup-form">
            <div class="form-group row pl-5">
              <img src="{{ asset('images/request.jpg') }}" alt="User Avatar"  class="request-img">
            </div>
            <div class="form-group row pt-2 pl-5 pr-5">
              <p class="Request-sent" align="center">
              Request has been sent successfully
              </p>
            </div>
            <div class="form-group row pr-5 pl-5">
              <p class="Lorem-ipsum-dolor-si">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
              sed do eiusmod tempor incididunt ut labore et dolore 
              Ut enim ad minim veniam, quis nostrud exercitation 
              </p>
            </div>
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
      <div class="container">
      <div class="form-group row">
        <div class="col-lg-8">
          <div class="p-xl-5 pt-xl-5">
            <div class="form-group row">
              <div class="col-lg-2">
              <?php $temp = null; ?>
              @foreach($user_pics ?? '' as $user_pics)
                <img src="{{ $user_pics->photo_url ?? asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar"  class="img-circle Mask">
              <?php $temp = $user_pics->photo_url; ?>
              @break;
              @endforeach
              @if($temp==null)
                <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar"  class="img-circle Mask">
              @endif
              </div>
              <div class="col-lg-8 pt-1 pl-5">
                <p class="Name">{{ $user->first_name }} {{ $user->last_name }} </i></p>
                <p class="bottom-text">{{ $user->type }}</p>
                <p class="bottom-text">Phone no: {{ $user->mobile }}</p>  
                <p class="Verified-user pt-2"><i class="fa fa-check-circle fa-lg pr-2" aria-hidden="true"></i></i>Verified</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="p-xl-5 pt-xl-5">
            <a href="#"><img src="{{ asset('images/png/facebook.png') }}" alt="User Avatar"  class="icon-shape"></a>
            <a href="#"><img src="{{ asset('images/png/twitter.png') }}" alt="User Avatar"  class="icon-shape"></a>
            <a href="#"><img src="{{ asset('images/png/033-google-plus.png') }}" alt="User Avatar"  class="icon-shape"></a>
            <a href="#"><img src="{{ asset('images/png/005-whatsapp.png') }}" alt="User Avatar"  class="icon-shape"></a>
            <a href="#"><img src="{{ asset('images/png/027-linkedin.png') }}" alt="User Avatar"  class="icon-shape"></a>
            <a href="#"><img src="{{ asset('images/png/029-instagram.png') }}" alt="User Avatar"  class="icon-shape"></a>
          </div>
        </div>
      </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="box-item">
            <div class="form-group row pt-5 pl-5">
              <div class="col-lg-6">
              <p class="body-text-4">Department</p>
              <p class="body-text-sm-4">{{ $user->type }}</p>
              </div>
              <div class="col-lg-6">
              <p class="body-text-4">Age</p>
              <p class="body-text-sm-4">{{\Carbon\Carbon::parse($user->dob)->diff(\Carbon\Carbon::now())->format('%y years')}}</p>
              </div>
            </div>
            <div class="form-group row  pl-5">
              <div class="col-lg-6">
              <p class="body-text-4">Join Date</p>
              <p class="body-text-sm-4">{{\Carbon\Carbon::parse($user->employment_start)->diff(\Carbon\Carbon::now())->format('%y years & %m months')}}</p>
              </div>
              <div class="col-lg-6">
              <p class="body-text-4">Salary</p>
              <p class="body-text-sm-4">{{ $user->salary }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="box-item">
            <div class="form-group row pt-5 pl-5">
              <div class="col-lg-6">
                <p class="body-text-4">Documents</p>
              </div>
            </div>
            <div class="form-group row pl-5 pb-3">
              <div class="col-lg-12">
              <img src="{{ asset('images/plus-sign-icon-31.png') }}" alt="User Avatar"  class="Add">
              @if(isset($user_docs) && !empty($user_docs))
                @foreach($user_docs as $user_doc)
                  <a href="{{ $user_doc->doc_url }}" target="_blank">
                    <img src="{{ asset('images/aadhar.png') }}" alt="User Avatar"  class="aadhar">
                  </a>
                @endforeach
              @endif
              <a class="p-2">&nbsp;</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-lg-12">
        <div class="box-item">
          <p class="body-text-4 p-5">Employee Work History</p>
          <hr>
          @foreach($employee_lookup_histories as $history)
          <div class="pl-5 pt-3">
            <table class="body-text-2">
            <tr>
            <td width="200px">Name</td>
            <td>{{ $history->first_name }} {{ $history->last_name }}</td>
            </tr>
            <tr>
            <td>Position</td>
            <td>{{ $history->employee_type}}</td>
            </tr>
            <tr>
            <td>Document Verified</td>
            <td>{{ $history->document_type}}</td>
            </tr>
            </table>
            <br><br>
          </div>
          @endforeach
        </div>
       </div>
      </div>
      <div class="row">
       <div class="col-lg-12">
        <div class="box-item">
          <p class="body-text-8 pl-5 pt-5">Verifcation Plans</p>
          <hr>
          @if(isset($verification_types))
            @foreach($verification_types as $vtype)
              <div class="pl-5">
                <p class="body-text-4">{{ $vtype->name}}</p>
                <p class="amount">Rs. {{ $vtype->amount}}</p>
                <p class="Lorem-ipsum-dolor-si">{{ $vtype->description}}</p>
              </div>
            @endforeach
          @endif
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
