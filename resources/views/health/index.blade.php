{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Health Check Reports</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
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
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
    font-weight: bolder;
    
}
.dataTables_wrapper .dataTables_paginate .paginate_button {
  font-weight: bolder !important;
}
</style>
@endsection

{{-- Content --}}
@section('content')

@include('layouts.header_v4')
    <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>
  <div class="content-wrapper">
    <section class="content pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="Rectangle-Copy-6 pl-4 t-head">
              <div class="pt-4 pl-4">
                <h3  class=" My-employees">Health Check Reports</h3>
              </div>
              <div class="card-body">
                <form id="clear">
                  <div class="row">              
                    <div class="col-lg-4 mb-lg-0 mb-6">
                      <div class="form-group" id="filter_col1" data-column="1">
                        <label class="search-text">Candidate Name</label>
                        <input type="text" name="Name" class="form-control form-control-sm column_filter" id="col1_filter" placeholder="Name">
                      </div>
                    </div>
                    <div class="col-lg-4 mb-lg-0 mb-6">
                      <div class="form-group" id="filter_col2" data-column="2">
                        <label class="search-text">Severty</label>
                        <select type="text" class="form-control form-control-sm column_filter" id="col2_filter">
                          <option value="">Select Type</option>
                          <option>RED</option>
                          <option>GREEN</option>
                          </select>
                      </div>
                    </div> 
                    <div class="col-lg-4 mb-lg-0 mb-6">
                      <div class="form-group" id="filter_col6" data-column="6">
                        <label class="search-text">Status</label>
                        <select type="text" class="form-control form-control-sm column_filter" id="col6_filter">
                          <option value="">Select Status Type</option>
                          <option>COMPLETE</option>
                          <option>DRAFT</option>
                          </select>
                      </div>
                    </div> 
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <table id="empdatatable" class="table">
                  <thead>
                    <tr>
                        <th>Survey Type</th>
                        <th>Candidate</th>
                        <th>Severty</th>
                        <th>Survey Start</th>
                        <th>Survey End</th>
                        <th>Create At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="t-body">
                  @if($orders!=NULL)
                  @foreach($orders as $order)
                    <tr>
                        <td>{{ str_replace('_', ' ', $order->survey_type) }}</td>
                        <td>{{ $order->first_name.' '.$order->middle_name.' '.$order->last_name }}</td>
                        <td>{{ $order->severity ?? 'NOT DONE' }}</td>
                        <td>{{ $order->survey_start }}</td>
                        <td>{{ $order->survey_end }}</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($order->created_at)) }}</td>
                        <td>{{ $order->survey_status }}</td>
                        <td>
                          <a href="{{ url('health/details/'.md5($order->id)) }}" class="pl-1" type="submit">View Details ></a>
                          |
                          @if($order->employee_id=='')
                          <a href="https://www.gettruehelp.com/healthcheck/?vid={{ md5($order->visitor_id) }}" class="pl-1" type="submit" target="-_blank">View Survey ></a>
                          @else
                           <a href="https://www.gettruehelp.com/healthcheck/?eid={{ md5($order->employee_id) }}" class="pl-1" type="submit" target="-_blank">View Survey ></a>
                          @endif
                          </td>
                    </tr>
                  @endforeach
                  @endif
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

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <div class="Add-Employees pt-3" id="exampleModalLabel">Add Survey</div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="signup-form">
               <form action="/survey/add" method="post">
                  @csrf
                  <div class="form-group row">
                     <div class="col-lg-12">
                        <label class="form-label-text">Select Candidate</label>
                        <select class="form-control" name="employee_id" required="required">
                          @if($orders!=NULL)
                          @foreach($employees as $order)
                          @if(isset($order->parent_first_name))
                            <option value="{{ $order->employee_id }}">{{ $order->parent_first_name.' '.$order->parent_middle_name.' '.$order->parent_last_name }}</option>
                          @else
                            <option value="{{ $order->employee_id }}">{{ $order->first_name.' '.$order->middle_name.' '.$order->last_name }}</option>
                          @endif
                          @endforeach
                          @endif
                        </select>
                     </div>
                  </div>
                  <div class="form-group row float-right">
                     <button type="submit" class="btn-warning button-proceed Proceed">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
          $('#empdatatable').DataTable( {
              "ordering": false,
              "info":     false,
              "dom": 'lrtip'
          } );
      } );
    </script>
@endsection
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
