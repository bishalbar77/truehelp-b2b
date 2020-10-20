{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Dashboard</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/boot.min.css">
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
                <i class="fa fa-arrow-circle-up"></i>
              </div>
              <a href="#" class="small-box-footer">Get Started <i class="fa fa-arrow-circle-right"></i></a>
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
                <i class="fa fa-arrow-circle-up"></i>
              </div>
              <a href="#" class="small-box-footer">Get Started <i class="fa fa-arrow-circle-right"></i></a>
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
                <i class="fa fa-arrow-circle-down"></i>
              </div>
              <a href="#" class="small-box-footer">Get Started <i class="fa fa-arrow-circle-right"></i></a>
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
                <i class="fa fa-arrow-circle-down"></i>
              </div>
              <a href="#" class="small-box-footer">Get Started <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    @if($employees!=NULL)
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
                    <table class="table">
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
    @endif
    @if($employees==NULL)
    <section class="content pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="Rectangle-Copy-6 pl-4 t-head">
              <div class="pt-4 pl-4 pb-2 pr-5">
                <h3  class=" My-employees">Recent Reports</h3>
                <hr>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <div class="container">
                  <div class="form-group row">
                    <div class="col-lg-5">
                      <img src="images/change.jpg" alt="User Avatar"  class="order-img">
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                      <div class="form-group row pt-2 pr-1">
                        <p class="Request-sent">
                        You have no reports generated
                        </p>
                      </div>
                      <div class="form-group row pr-1">
                        <p class="Lorem-ipsum-dolor-si">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor.
                        </p>
                      </div>
                      <div class="form-group row pr-1">
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
    @endif
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
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                      <div class="form-group row pt-2 pr-1">
                        <p class="Request-sent">
                        Request has been sent successfully
                        </p>
                      </div>
                      <div class="form-group row pr-1">
                        <p class="Lorem-ipsum-dolor-si">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor.
                        </p>
                      </div>
                      <div class="form-group row pr-1">
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
      </div>
      </div>
      <a class="p-2"></a>
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
