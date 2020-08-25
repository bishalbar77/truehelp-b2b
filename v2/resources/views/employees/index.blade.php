{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | My Employees</title>
<link rel="stylesheet" href="{{ mix('css/app.css') }}" />
<script defer src="{{ mix('js/app.js') }}"></script>
<style>
	.signup-form{
		width: 95%;
		margin: 30px auto;
	}
	.signup-form form{
		color: #999;
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
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
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
</style>
@endsection

{{-- Content --}}
@section('content')

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto pl-5">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bulkModal">Upload Employee List</button>
      <a class="pl-5"></a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Employee</button>
      <a class="pl-5"></a>
    </ul>
  </nav>
  <!-- /.navbar -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="signup-form">
      <form action="{{ route('employees.store') }}" method="post">
      @csrf
        <div class="form-group row">
            <div class="col-lg-4">
              <label>First Name:</label>
              <input type="text" class="form-control" name="first_name" required="required">
            </div>
            <div class="col-lg-4">
            <label>Middle Name:</label>
            <input type="text" class="form-control" name="middle_name" required="required">
            </div>  	
            <div class="col-lg-4">
            <label>Last Name:</label>
            <input type="text" class="form-control" name="last_name" required="required">
            </div>  	
            </div>
            <div class="form-group row">
            <div class="col-lg-4">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" required="required">
            </div>
              <div class="col-lg-4">
              <label>Mobile</label>
              <input type="phone" class="form-control" name="mobile" required="required">
              </div>
              <div class="col-lg-4">
              <label>Date of Birth:</label>
              <input type="date" class="form-control" name="dob" required="required">
              </div>  	           
              </div>
                  <div class="form-group row">
              <div class="col-lg-6">
              <label>Address:</label>
              <input type="text" class="form-control" name="address" required="required">
              </div>
              <div class="col-lg-6">
              <label>Gender:</label>
              <select name="gender" class="form-control" id="gender">
                  <option value="">Select Gender</option>
                  <option value="M">M</option>
                  <option value="F">F</option>
                  <option value="Others">Others</option>
              </select>
              </div>
            </div>   
            <div class="form-group row pl-3">
          <label class="checkbox-inline"><input type="checkbox"> Employee currently works with you</a></label>
        </div>
        <div class="form-group row float-right">
                <button type="submit" class="btn btn-warning">Proceed</button>
            </div>
        </form>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="bulkModal" tabindex="-1" role="dialog" aria-labelledby="bulkModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Employee List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
        {{ csrf_field() }}
        <div class="form-group">
        <table class="table">
          <tr>
          <td width="40%" align="right"><label>Select File for Upload</label></td>
          <td width="30">
            <input type="file" name="select_file" />
          </td>
          <td width="30%" align="left">
            <input type="submit" name="upload" class="btn btn-primary" value="Upload">
          </td>
          <td width="30%" align="left">
            <a href="/export" class="btn btn-success">Sample</a>
          </td>
          </tr>
        </table>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="images/Logo-07.png" alt="TrueHelp Logo" class="brand-image elevation-3">
      <span class="brand-text font-weight-light pl-4 ls-5" word-spacing: "30px">TRUEHELP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">MENU</li>
               <li class="nav-item">
                 <a href="/home" class="nav-link">
                   <i class="nav-icon fas fa-th"></i>
                   <p>
                     Dashboard
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="/employees" class="nav-link active">
                   <i class="nav-icon fa fa-user"></i>
                   <p>
                     My Employee
                     <span class="right"><i class="fa fa-exclamation-circle"></i></span>
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="pages/widgets.html" class="nav-link">
                   <i class="nav-icon fa fa-user-circle-o"></i>
                   <p>
                     Search Employee
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="/order" class="nav-link">
                   <i class="nav-icon fa fa-list-alt"></i>
                   <p>
                     Orders
                   </p>
                 </a>
               </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-bell-o"></i>
              <p>
                Notifications
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-address-card-o"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-header">SUPPORT</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Need help?
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
              <p>
                Contact us
              </p>
            </a>
          </li>
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>Account</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-moon-o"></i>
              <p>Dark Mode</p>
            </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <table class="table table-striped table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                <td>{{ $employee->mobile }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>
                                @if( $employee->is_active==1)
                                <span class="label label-lg font-weight-bold label-light-success label-inline">Active</span>
                                @else
                                <span class="label label-lg font-weight-bold label-light-danger label-inline">Disabled</span>
                                @endif
                                </td>
                                <td>
                                @if( $employee->is_active==1)
                                <a href="{{ route('employees.changestatus', $employee->id )}}" type="submit" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="Delete">								
                                <i class="fas fa-trash text-danger"></i></a>
                                @else
                                <a href="{{ route('employees.changestatus', $employee->id )}}" type="submit" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="Delete">								
                                <i class="fas fa-undo text-warning"></i></a>
                                @endif
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
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
  
@endsection

@section('scripts')

@endsection
