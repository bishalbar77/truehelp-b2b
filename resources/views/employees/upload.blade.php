{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | My Candidate</title>
<link rel="stylesheet" href="{{ mix('css/app.css') }}" />
<script defer src="{{ mix('js/app.js') }}"></script>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="css/screen.css">
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
</style>
@endsection

{{-- Content --}}
@section('content')

  <!-- /.navbar -->
  @include('layouts.header')
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
                <h3  class=" My-employees">My Candidates</h3>
              </div>
              <form action="/upload/data" method="post" id="validate_form">
              @csrf
              <div class="card-body" >
                    <table class="table" id="datatable" name="registration">
                        <thead>
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
                        </thead>
                        <tbody class="t-body">
                          @foreach($data as $employee)
                           @foreach($employee as $key )
                            <tr>
                                <td>
                                <input class="form-control" name="co_relation[]" value="{{ $key['co_relation']}}" style="width:170px;">
                                </td>
                                <td><input class="form-control" name="parent_email[]" value="{{ $key['parent_email']}}" style="width:170px;">
                                </td>
                                <td><input class="form-control" name="parent_mobile[]" value="{{ $key['parent_mobile']}}" style="width:170px;">
                                </td>
                                <td><input class="form-control" name="parent_first_name[]" value="{{ $key['parent_first_name']}}" style="width:170px;">
                                </td>
                                <td><input class="form-control" name="parent_middle_name[]" value="{{ $key['parent_middle_name']}}" style="width:170px;">
                                </td>
                                <td><input class="form-control" name="parent_last_name[]" value="{{ $key['parent_last_name']}}" style="width:170px;">
                                </td>
                                <td><input class="form-control" name="parent_dob[]" value="{{ $key['parent_dob']}}" style="width:170px;">
                                </td>
                                <td><input class="form-control" name="parent_gender[]" value="{{ $key['parent_gender']}}" style="width:170px;">
                                </td>
                                <td><input class="form-control @error('email') is-invalid @enderror" name="email[]" value="{{ $key['email']}}" style="width:170px;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </td>
                                <td><input class="form-control @error('phone') is-invalid @enderror" id="mobile" name="mobile[]" value="{{ $key['mobile']}}" style="width:170px;" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </td>
                                <td><input class="form-control @error('name') is-invalid @enderror" name="first_name[]" value="{{ $key['first_name']}}" style="width:170px;" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </td>
                                <td><input class="form-control" name="middle_name[]" value="{{ $key['middle_name']}}" style="width:170px;">
                                </td>
                                <td><input class="form-control @error('last_name') is-invalid @enderror" name="last_name[]" value="{{ $key['last_name']}}" style="width:170px;" required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </td>
                                <td><input class="form-control" name="student_code[]" value="{{ $key['student_code']}}" style="width:170px;">
                                </td>
                                <td><input class="form-control @error('dob') is-invalid @enderror" name="dob[]" value="{{ $key['dob']}}" style="width:170px;" required>
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </td>
                                <td><input class="form-control @error('gender') is-invalid @enderror" name="gender[]" value="{{ $key['gender']}}" style="width:170px;" required>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </td>
                                <td><input class="form-control" name="employee_types_id[]" value="{{ $key['employee_types_id']}}" style="width:170px;" required>
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
  <script type="text/javascript">
function showDiv(select){
   if(select.value==1){
    document.getElementById('hidden_div').style.display = "block";
   } else{
    document.getElementById('hidden_div').style.display = "none";
   }
} 
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" type="text/javascript"></script>
<script type="text/javascript" src="Jquery-plugin/jquery.validate.js"></script>
<script type="text/javascript">
	
	$(document).ready(function (){

		$.validator.setDefaults({
			submitHandler:function(){
				alert("Submited");
				console.log("Submited");
			}
		});

		$.validator.addMethod("regex", function(value, element, regexp){
			var re = new RegExp(regexp);
			return this.optional(element) || re.test(value);
		}, "Please Check Your Input" );

		$.validator.addMethod("checknull", function(value, element, arg){
			return arg !== value;
		}, "Please Check Your input" );

		$('#validate_form').validate({

			rules : {
				mobile : {
					required : {
						depends:function(){
							$(this).val($.trim($(this).val()));
							return true;
						}
					},
					minlength : 10,
					maxlength : 12
				},
				emailadd : {
					required : true,
					minlength : 10
				},
				phonenum : {
					required : true,
					regex : /^[+]?(\d{1,2})?[\s.-]?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/
				},
				pass1 : {
					required : true,
					minlength : 5,
					maxlength : 20
				},
				confirmpass : {
					required : true,
					minlength : 5,
					maxlength : 20,
					equalTo : "#pass1"
				},
				message : {
					required : true,
					minlength : 10
				},
				country : {
					checknull : ""
				},
				dob : {
					checknull : ""
				},
				policy : {
					required : true
				}

			},
			messages : {
				username : {
					required : "Please Enter User Name",
					minlength : "Please Enter Valid User Name", 
					maxlength : "User Name is Too Long"
				},
				emailadd : {
					required : "Please Enter Email Address",
					minlength : "Please Enter Valid Email"
				},
				phonenum : {
					required : "Please Enter Phone Number",
					regex : "Enter Number On Proper Format"
				},
				pass1 : {
					required : "Please Enter Password",
					minlength : "Minumun 5 Charter Required",
					maxlength : "Password Too Long (20 Allow)"
				},
				confirmpass : {
					required : "Please Enter Confirm Password",
					minlength : "Minumun 5 Charter Required",
					maxlength : "Password Too Long (20 Allow)",
					equalTo : "Password Does Not Match"
				},
				message : {
					required : "Please Enter Message",
					minlength : "Please Enter More then 10 Charater"
				},
				country : {
					checknull : "Please Select Country"
				},
				dob : {
					checknull : "Please Select Date Of Birth"
				},
				policy : {
					required : "Please Agree With Our Policy"
				}

			},
			highlight:function(element){
				$(element).addClass("is-invalid").removeClass("is-valid");
			},
			unhighlight:function(element){
				$(element).addClass("is-valid").removeClass("is-invalid");
			}

		})

	});

</script>
@endsection

@section('scripts')
@endsection
