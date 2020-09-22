{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | My Candidate</title>
<link rel="stylesheet" href="{{ mix('css/app.css') }}" />
<script defer src="{{ mix('js/app.js') }}"></script>
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
.search-text {
  font-family: Montserrat;
  font-size: 14px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #352641;
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
    font-weight: bolder !important;
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
      <!-- <button type="button" class="btn btn-primary">Order Verification</button> -->
      <a class="pl-5"></a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">+ Add Candidate</button>
      <a class="pl-5"></a>
    </ul>
  </nav>
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
      <form action="https://enterprise.gettruehelp.com/v2/public/employees" method="post">
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
            <label class="form-label-text">Email:</label>
            <input type="email" class="form-control" name="email">
            </div>
            <div class="col-lg-4">
              <label class="form-label-text">Country Code</label>
              <input type="number" class="form-control" name="country_code" value="91">
              </div>
              <div class="col-lg-4">
              <label class="form-label-text">Mobile</label>
              <input type="phone" class="form-control" name="mobile" required="required">
              </div>
              <div class="col-lg-4">
              <label class="form-label-text">Student Code</label>
              <input type="text" class="form-control" name="student_code">
              </div>
              </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
              <label class="form-label-text">Candidate Type:</label>
              <select name="emp_type" class="form-control" id="emp_type">
                  <option value="9">Select Candidate Type</option>
                  @foreach ($emp_type as $emp)
                  <option value={{$emp->id}}>{{$emp->type}}</option>
                  @endforeach
              </select>
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
              <label class="form-label-text">Date of Birth:</label>
              <input type="date" class="form-control" name="dob" required="required">
              </div>  
            </div> 
            <label for="cars">Is Student is above 18:</label>  
            <select id="test" name="form_select" onchange="showDiv(this)">
               <option value="0">Yes</option>
               <option value="1">No</option>
            </select>
            <div id="hidden_div" style="display:none";>
                    <div class="form-group row">
                        <div class="col-lg-4">
                          <label class="form-label-text">Parent First Name</label>
                          <input type="text" class="form-control" name="parent_first_name">
                        </div>
                        <div class="col-lg-4">
                        <label class="form-label-text">Parent Middle Name:</label>
                        <input type="text" class="form-control" name="parent_middle_name">
                        </div>    
                        <div class="col-lg-4">
                        <label class="form-label-text">Parent Last Name:</label>
                        <input type="text" class="form-control" name="parent_last_name">
                        </div>    
                    </div>
                    <div class="form-group row">
                          <div class="col-lg-4">
                          <label class="form-label-text">Parent Email:</label>
                          <input type="email" class="form-control" name="parent_email" >
                          </div>
                            <div class="col-lg-4">
                            <label class="form-label-text">Parent Mobile</label>
                            <input type="phone" class="form-control" name="parent_mobile" >
                            </div>
                            <div class="col-lg-4">
                            <label class="form-label-text">Parent Date of Birth:</label>
                            <input type="date" class="form-control" name="parent_dob" >
                            </div>               
                    </div>
                    <div class="form-group row">
                      <div class="col-lg-4">
                          <label class="form-label-text">Parent Gender:</label>
                          <select name="parent_gender" class="form-control" id="parent_gender" >
                              <option value="">Select Gender</option>
                              <option value="M">M</option>
                              <option value="F">F</option>
                              <option value="Others">Other</option>
                          </select>
                          </div>
                          <div class="col-lg-4">
                          <label class="form-label-text">Co-relation:</label>
                          <select name="relation" class="form-control" id="relation" >
                              <option value="">Select Relation</option>
                              <option value="FATHER">Father</option>
                              <option value="MOTHER">Mother</option>
                              <option value="GAURDIAN">Gaurdian</option>
                          </select>
                          </div>
                    </div>
            </div>
            <div class="form-group row pl-3">
          <label class="Employee-currently-w"><input type="checkbox"><a class="pl-2">Candidate currently works with you</a></label>
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
          @if (isset($errors) && $errors->any())
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      {{ $error }}
                  @endforeach
              </div>
          @endif
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
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>
  <div class="content-wrapper">
    <section class="content pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

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
                        <th>Error at Row</th>
                        <th>Attribute</th>
                        <th>Errors</th>
                        <th>Inserted Data</th>
                    </tr>

                    @foreach (session()->get('failures') as $validation)
                        <tr>
                            <td>{{ $validation->row() }}</td>
                            <td>{{ $validation->attribute() }}</td>
                            <td>
                            @foreach ($validation->errors() as $e)
                                <ul>{{ $e }}</ul>
                            @endforeach
                            </td>
                            <td>
                                {{ $validation->values()[$validation->attribute()] }}
                            </td>
                        </tr>
                    @endforeach
                </table>
              </div>
            </div>
            @endif
            <br>
            <div class="Rectangle-Copy-6 pl-4 t-head">
              <div class="pt-4 pl-4">
                <h3  class=" My-employees">My Candidates</h3>
              </div>
              <div class="card-body">
                <form id="clear">
                  <div class="row">               
                    <div class="col-lg-4 mb-lg-0 mb-6">
                      <div class="form-group" id="filter_col0" data-column="0">
                        <label class="search-text">Name</label>
                        <input type="text" name="search_name" class="form-control form-control-sm column_filter" id="col0_filter" placeholder="Name" value="{{ request('search_name', '') }}">
                      </div>
                    </div>
                    <div class="col-lg-4 mb-lg-0 mb-6">
                      <div class="form-group" id="filter_col1" data-column="1">
                        <label class="search-text">Designation</label>
                        <select type="text" class="form-control form-control-sm column_filter" id="col1_filter" placeholder="Designation">
                          <option value="">Select Candidate Type</option>
                          @foreach ($emp_type as $emp)
                          <option value="{{$emp->type}}">{{$emp->type}}</option>
                          @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-4 mb-lg-0 mb-6">
                      <div class="form-group" id="filter_col2" data-column="2">
                        <label class="search-text">Email</label>
                        <input type="text" name="Name" class="form-control form-control-sm column_filter" id="col2_filter" placeholder="Email Address">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-body" >
              <table id="datatable" class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="t-body">
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
  <script type="text/javascript">
function showDiv(select){
   if(select.value==1){
    document.getElementById('hidden_div').style.display = "block";
   } else{
    document.getElementById('hidden_div').style.display = "none";
   }
} 
</script>
@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
          $('#datatable').DataTable( {
              "ordering": false,
              "info":     false,
              "ajax": "{{ route('api.employees.index') }}",
              "columns": [
                  {
                    "data": null,
                    "render": function(data, type, full, meta){
                        return full["first_name"] + " " + full["last_name"];
                    }
                  },
                  { "data": "type" },
                  { "data": "emp_email" },
                  { "data": "mobile" },
                  {
                      "mData": null,
                      "bSortable": false,
                      "mRender": function (o) { return '<a href=/employees/details/' + o.employee_id + '>' + 'View Details <i class="fa fa-angle-right" aria-hidden="true"></i>' + '</a>'; }
                  }
              ]
          } );
      } );
    </script>
@endsection
