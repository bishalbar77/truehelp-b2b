<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TrueHelp | Upload Response</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="stylesheet" href="/css/app.css" />
    <script defer src="/employeesjs/app.js"></script>
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <!--Manual CSS -->
    <link href="/css/dashboard.css" rel="stylesheet" type="text/css">
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
.error {
  font-size: 10.8px;
  align: center;
  color: red;
  font-weight: 700;
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


ol.progtrckr {
        display: table;
        list-style-type: none;
        margin: 0;
        padding: 0;
        table-layout: fixed;
        width: 100%;
    }
    ol.progtrckr li {
        display: table-cell;
        text-align: center;
        line-height: 3em;
    }

    ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
    ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
    ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
    ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
    ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
    ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
    ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
    ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

    ol.progtrckr li.progtrckr-done {
        color: black;
        border-bottom: 4px solid yellowgreen;
    }
    ol.progtrckr li.progtrckr-todo {
        color: silver; 
        border-bottom: 4px solid silver;
    }

    ol.progtrckr li:after {
        content: "\00a0\00a0";
    }
    ol.progtrckr li:before {
        position: relative;
        bottom: -2.5em;
        float: left;
        left: 50%;
        line-height: 1em;
    }
    ol.progtrckr li.progtrckr-done:before {
        content: "\2713";
        color: white;
        background-color: yellowgreen;
        height: 1.2em;
        width: 1.2em;
        line-height: 1.2em;
        border: none;
        border-radius: 1.2em;
    }
    ol.progtrckr li.progtrckr-todo:before {
        content: "\039F";
        color: silver;
        background-color: #f4f6f7;
        font-size: 1.5em;
        bottom: -1.6em;
    }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

  <!-- /.navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
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
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto pl-5">
      <a class="pl-5"></a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">+ Add Survey</button>
      <a class="pl-5"></a>
    </ul>
  </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 side-bar">
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
      <img src="{{ asset('images/Logo-07.png') }}" alt="TrueHelp Logo" class="brand-image">
      <span class="brand-text font-weight-light pl-5 ls-5"><img src="{{ asset('images/truehelp-01.png') }}" alt="TrueHelp Logo" class="brand-image"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header nav-menu-tag">MENU</li>
          <li class="nav-item">
            <a href="{{ url('home') }}" class="nav-link {{ Request::is('/') || Request::is('home') ? 'active' : '' }}">
              <i class="nav-icon fa fa-th"></i>
              <p class="nav-menu">
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('orders') }}" class="nav-link {{ Request::is('orders')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-user-circle-o"></i>
              <p class="nav-menu">
                Order Verification
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('employees') }}" class="nav-link {{ Request::is('employees')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-user"></i>
              <p class="nav-menu">
                My Candidate
                <!-- <span class="right"><i class="fa fa-exclamation-circle"></i></span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('search') }}" class="nav-link {{ Request::is('search')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-user-circle-o"></i>
              <p class="nav-menu">
                Search Candidate
              </p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('surveys/dashboard') || Request::is('surveys/') || Request::is('surveys/details/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('surveys/dashboard') || Request::is('surveys/') ? 'active' : '' }}">
              <i class="nav-icon fa fa-list-alt"></i>
              <p class="nav-menu">
                Health Check
                <i class="right fa fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('/dashboard')  ? 'active' : '' }}">
                  <i class="nav-icon fa fa-angle-double-right"></i>
                  <p class="nav-menu">
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('surveys/') }}" class="nav-link {{ Request::is('surveys/') || Request::is('surveys/details/*')  ? 'active' : '' }}">
                  <i class="nav-icon fa fa-angle-double-right"></i>
                  <p class="nav-menu">
                    Reports
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header nav-menu-tag">SETTINGS</li>
          <li class="nav-item">
            <a href="{{ url('profile') }}" class="nav-link {{ Request::is('profile')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-cog"></i>
              <p class="nav-menu">Preferences</p>
            </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" style="display: none;">
            @csrf
          </form>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-sign-out"></i>
              <p class="nav-menu">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
  <div>
      <ol class="progtrckr" data-progtrckr-steps="5">
        <li class="progtrckr-done">Upload</li>
        <li class="progtrckr-todo">Check</li>
        <li class="progtrckr-todo">Import</li>
        <li class="progtrckr-todo">Done</li>
      </ol>
    </div>
    <section class="content pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            @if (session('message'))
            <div class="Rectangle-Copy-6">
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            </div>
            @endif
            @if (session('status'))
            <div class="Rectangle-Copy-6">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
            @endif
            @if (isset($errors) && $errors->any())
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      {{ $error }}
                  @endforeach
              </div>
            @endif

            @if (session()->has('failures'))
            <div class="Rectangle-Copy-6 pl-4 t-head">
              <div class="pt-4 pl-4">
                <h3  class=" My-employees">Upload Response</h3>
              </div>
              <div class="card-body" >
                <table class="table table-stripped">
                    <tr>
                        <th>Co Relation</th>
                        <th>Parent Email</th>
                        <th>Parent Mobile</th>
                        <th>Parent First Name</th>
                        <th>Parent Middle Name</th>
                        <th>Parent Last Name</th>
                        <th>Parent DOB</th>
                        <th>Parent Gender</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Student Code</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Employee Type ID</th>
                    </tr>
                    <?php $temp=0; ?>
                    @foreach (session()->get('failures') as $validation)
                      <tr>
                        @if( $temp != $validation->row())
                        @foreach ($validation->values() as $crew)

                              <td><input class="form-control" value="{{ $crew }}" style="width:170px;"></td>
                        <?php $temp=$validation->row(); ?>
                        @endforeach
                        @endif
                      </tr>
                    @endforeach
                </table>
                <div class="p-4">
                  <button type="submit" class="btn-primary button-upload Proceed">Upload</button><a class="p-5"></a>
                </div>
              </div>
            </div>
            @endif
            <br>
            <div class="Rectangle-Copy-6 p-4 t-head">
              <div class="p-4">
                <h3  class=" My-employees">Upload Response</h3>
              </div>
              <form action="/upload" method="post" id="quickForm">
              @csrf
              <div class="card-body" >
              <table class="table" id="datatable" name="registration">
                        <thead>
                            <tr>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Student Code</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Employee Type ID</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Co Relation</th>
                            <th>Parent Email</th>
                            <th>Parent Mobile</th>
                            <th>Parent First Name</th>
                            <th>Parent Middle Name</th>
                            <th>Parent Last Name</th>
                            <th>Parent DOB</th>
                            <th>Parent Gender</th>
                            </tr>
                        </thead>
                        <tbody class="t-body">
                        <?php $a=0; $b=0; $c=0; $d=0; $e=0; $f=0; $g=0;?>
                          @foreach($data as $employee)
                           @foreach($employee as $key )
                            <tr>
                            <td><div class="form-group">
                                 <input class="form-control" name="first_name[{{ $b++ }}]" value="{{ $key['first_name']}}" style="width:170px;" required>
                                 </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="middle_name[]" value="{{ $key['middle_name']}}" style="width:170px;">
                                 </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="last_name[{{ $c++ }}]" value="{{ $key['last_name']}}" style="width:170px;" required>
                                 </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="student_code[]" value="{{ $key['student_code']}}" style="width:170px;">
                                 </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="dob[{{ $d++ }}]" value="{{ $key['dob']}}" style="width:170px;" required>
                                 </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="gender[{{ $e++ }}]" value="{{ $key['gender']}}" style="width:170px;" required>
                                 </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="employee_types_id[{{ $f++ }}]" value="{{ $key['employee_types_id']}}" style="width:170px;" required>
                                 </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" id="email" name="email[{{ $g++ }}]" value="{{ $key['email']}}" style="width:170px;">
                                </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" id="mobile" name="mobile[{{ $a++ }}]" value="{{ $key['mobile']}}" style="width:170px;" required>
                                 </div>
                                </td>
                                <td>
                                <input class="form-control" name="co_relation[]" value="{{ $key['co_relation']}}" style="width:170px;">
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="parent_email[]" value="{{ $key['parent_email']}}" style="width:170px;">
                                </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="parent_mobile[]" value="{{ $key['parent_mobile']}}" style="width:170px;">
                                </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="parent_first_name[]" value="{{ $key['parent_first_name']}}" style="width:170px;">
                                </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="parent_middle_name[]" value="{{ $key['parent_middle_name']}}" style="width:170px;">
                                </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="parent_last_name[]" value="{{ $key['parent_last_name']}}" style="width:170px;">
                                </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="parent_dob[]" value="{{ $key['parent_dob']}}" style="width:170px;">
                                </div>
                                </td>
                                <td><div class="form-group">
                                 <input class="form-control" name="parent_gender[]" value="{{ $key['parent_gender']}}" style="width:170px;">
                                </div>
                                </td>
                            </tr>
                            @endforeach
                          @endforeach
                        </tbody>
                    </table>
                    <div class="p-4">
                  <button type="submit" id="submit" class="btn-primary button-upload Proceed">Upload</button><a class="p-5"></a>
                </div>
              </form>
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
    <!-- /.content -->
  </div>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.js"></script>
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function(form) {
      // do other things for a valid form
      form.submit();
    }
  });
  $('#quickForm').validate({
    rules: {
      "email[]": {
        required: true,
        email: true,
      },
      "mobile[]": {
        required: true,
        minlength: 10
      },
      "first_name[]": {
        required: true,
      },
      "last_name[]": {
        required: true,
      },
      "gender[]": {
        required: true,
      },
      "dob[]": {
        required: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      "email[]": {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      "mobile[]": {
        required: "Please provide a mobile number",
        minlength: "Your mobile number must be at least 10 digits long"
      },
      "first_name[]": {
        required: "Please provide a first name"
      },
      "last_name[]": {
        required: "Please provide a last name"
      },
      
      "gender[]": {
        required: "Please provide a gender"
      },
      "dob[]": {
        required: "Please provide DOB"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
        <script src="/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <!-- jquery-validation -->
        <script src="/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="/plugins/jquery-validation/additional-methods.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/dist/js/adminlte.min.js"></script>
        <!-- ChartJS -->
        <script src="/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="/plugins/moment/moment.min.js"></script>
        <script src="/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="/dist/js/adminlte.js"></script>
        <script src="/dist/js/pages/dashboard.js"></script>
        <script src="/dist/js/demo.js"></script>

    </body>
</html>