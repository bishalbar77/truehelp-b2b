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
</style>
<?php
   $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');
        // dd($api_token);
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->post('https://api.gettruehelp.com/api/notification-count',[
                            'api_key' => $apiKeys
                        ]);
        $contents = $response->getBody();
        $data = json_decode($contents);
        $count = $data->response->data->messages;
?>
@endsection

{{-- Content --}}
@section('content')
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="{{ route('search') }}" method="POST">
    @csrf
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="query" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav ml-auto" id="navbar">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown navbar-collapse collapse">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell fa-icon-lg text-primary"></i>
          <span class="badge badge-primary navbar-badge">{{$count}}</span>
        </a>
        <div class="dropdown-menu card-box dropdown-menu-lg dropdown-menu-right">
        <div class="notification-top text-center p-2"><h3>{{$count}} New</h3><p class="opacity-75">App Notifications</p></div>
          <div class="dropdown-divider"></div>
          <?php $n=1 ?>
          @foreach ($nf_message as $message)
          @if($n++>4)@continue;@endif
          @if($message->is_seen=='Y')
            <a href="{{ url('seenNotification/'.$message->id.'/'.$message->nf_action_url) }}" class="dropdown-item" style="color:rgb(192,192,192);">
              <i class="fa fa-user mr-2"></i> {{$message->nf_message}}
            </a>
          <div class="dropdown-divider"></div>
          @else
          <a href="{{ url('seenNotification/'.$message->id.'/'.$message->nf_action_url) }}" class="dropdown-item">
            <i class="fa fa-user mr-2"></i> {{$message->nf_message}}
          </a>
          <div class="dropdown-divider"></div>
          @endif
          @endforeach
          <div class="text-center pt-1"><a href="/notifications"><span>Read All Notifications</span></a></div>
        </div>
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
