{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Dashboard</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
<script defer src="{{ asset('js/app.js') }}"></script>
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
  width: 346px;
  height: 242px;
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
</style>
@endsection

{{-- Content --}}
@section('content')
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
  </nav>
  <!-- /.navbar -->

    <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="border-radius: 12px;">
              <div class="inner">
                <h3>{{ $registered_employees }}</h3>

                <p>Registered Employess</p>
              </div>
              <div class="icon">
                <i class="fas fa-arrow-circle-up"></i>
              </div>
              <a href="#" class="small-box-footer">Get Started <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success" style="border-radius: 12px;">
              <div class="inner">
                <h3>{{ $pending_verifications }}<sup style="font-size: 20px"></sup></h3>

                <p>Pending Verification</p>
              </div>
              <div class="icon">
                <i class="fas fa-arrow-circle-up"></i>
              </div>
              <a href="#" class="small-box-footer">Get Started <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning" style="border-radius: 12px;">
              <div class="inner">
                <h3>{{ $verified_employees }}</h3>

                <p>Verified Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-arrow-circle-down"></i>
              </div>
              <a href="#" class="small-box-footer">Get Started <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger" style="border-radius: 12px;">
              <div class="inner">
                <h3>{{ $red_cases }}</h3>

                <p>Red Cases</p>
              </div>
              <div class="icon">
                <i class="fas fa-arrow-circle-down"></i>
              </div>
              <a href="#" class="small-box-footer">Get Started <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <section class="content pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="Rectangle-Copy-6 pl-4 t-head">
              <div class="pt-4 pl-4 pb-2 pr-5">
                <h3  class=" My-employees">Recent Reports</h3>
                <a href="{{ url('employees') }}" class="table-side-tag float-right">SEE ALL</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php $sl=1 ?>
                        <tbody class="t-body">
                          @foreach($employees as $employee)
                            @if($sl>4)@continue;@endif
                              <tr>
                                  <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                <td>{{ $employee->type }}</td>
                                <td>{{ $employee->emp_email ?? '' }}</td>
                                <td>{{ $employee->mobile }}</td>
                                <td>{{ $employee->emp_status == 'I' ? 'In-Active' : 'Active' }}</td>
                                <td>
                                  <a href="{{ url('employees/details/'.$employee->employee_id) }}" type="submit">
                                    View Details <i class="fa fa-angle-right" aria-hidden="true"></i>
                                  </a>
                                </td>
                              </tr>
                            <?php $sl++ ?>
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
    <section class="content pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="Rectangle-Copy-6 pl-4 t-head">
              <div class="pt-4 pl-4 pb-2 pr-5">
                <h3  class=" My-employees">Your Orders</h3>
                <hr>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <div class="container">
                  <div class="form-group row">
                    <div class="col-lg-5">
                      <img src="images/request.jpg" alt="User Avatar"  class="order-img">
                    </div>
                    <div class="col-lg-7">
                      <div class="form-group row pt-2 pl-5 pr-5">
                        <p class="Request-sent">
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
                      <div class="form-group row pr-5 pl-5">
                        <a href="/employees"><button type="button" class="btn btn-primary">+ Add Candidate</button></a>
                        <a class="pl-5"></a>
                      </div>
                    </div>
                  </div>
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
    <section class="content pt-5">
      <div class="container-fluid">
        
      </div>
    </section>
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
