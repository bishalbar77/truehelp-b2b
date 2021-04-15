<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register | TrueHelp - India first ML/AI based complete service for employees.</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>

  <style>
  .third {
  border-color: #3498db;
  color: #3e4061;
  box-shadow: 0 0 40px 40px #4fab40 inset, 0 0 0 0 #4fab40;
  -webkit-transition: all 150ms ease-in-out;
  transition: all 150ms ease-in-out;
}
.third:hover {
  box-shadow: 0 0 10px 0 #4fab40 inset, 0 0 10px 4px #4fab40;
}
.btn {
  box-sizing: border-box;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background-color: transparent;
  border: 2px solid #3e4061;
  border-radius: 0.6em;
  color: #ffffff;
  cursor: pointer;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-align-self: center;
      -ms-flex-item-align: center;
          align-self: center;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1;
  margin: 20px;
  padding: 1.2em 2.8em;
  text-decoration: none;
  text-align: center;
  text-transform: uppercase;
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
}
.btn:hover, .btn:focus {
  color: #000000;
  outline: 0;
}
  </style>
</head>
<body>
	<div class="page-content">
		<div class="form-v1-content">
			<div class="wizard-form">
		        <form class="form-register" method="post" action="/register">
              @csrf
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<p class="step-icon"><span>01</span></p>
			            	<span class="step-text">Peronal Infomation</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Peronal Infomation</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.  </p>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>First Name</legend>
											<input type="text" class="form-control" id="first-name" name="first_name" placeholder="First Name" required>
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Last Name</legend>
											<input type="text" class="form-control" id="last-name" name="last_name" placeholder="Last Name" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Your Email</legend>
											<input type="text" name="email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Phone Number</legend>
											<input type="text" class="form-control" id="phone" name="mobile" placeholder="+1 888-999-7777" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="special-label">Birth Date:</label>
										<input type="date" class="form-control" id="phone" name="dob" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label>Gender:</label>
										<select name="gender" class="form-control" style="background: none !important;">
											<option value="Select" disabled selected>Select Gender</option>
											<option value="M">M</option>
											<option value="F">F</option>
											<option value="Others">Others</option>
										</select>
									</div>
								</div>
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<p class="step-icon"><span>02</span></p>
			            	<span class="step-text">Connect Bank Account</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Connect Bank Account</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.</p>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-1">
										<input type="text" name="find_bank" id="find_bank" placeholder="Find Your Bank" class="form-control" required>
									</div>
								</div>
								<div class="form-row-total">
									<div class="form-row">
				                		<div class="form-holder form-holder-2 form-holder-3">
				                			<input type="radio" class="radio" name="bank-1" id="bank-1" value="bank-1" checked>
				                			<label class="bank-images label-above bank-1-label" for="bank-1">
				                				<img src="images/form-v1-1.png" alt="bank-1">
				                			</label>
											<input type="radio" class="radio" name="bank-2" id="bank-2" value="bank-2">
											<label class="bank-images label-above bank-2-label" for="bank-2">
												<img src="images/form-v1-2.png" alt="bank-2">
											</label>
											<input type="radio" class="radio" name="bank-3" id="bank-3" value="bank-3">
											<label class="bank-images label-above bank-3-label" for="bank-3">
												<img src="images/form-v1-3.png" alt="bank-3">
											</label>
				                		</div>
				                	</div>
				                	<div class="form-row">
				                		<div class="form-holder form-holder-2 form-holder-3">
				                			<input type="radio" class="radio" name="bank-4" id="bank-4" value="bank-4">
				                			<label class="bank-images bank-4-label" for="bank-4">
				                				<img src="images/form-v1-4.png" alt="bank-4">
				                			</label>
											<input type="radio" class="radio" name="bank-5" id="bank-5" value="bank-5">
											<label class="bank-images bank-5-label" for="bank-5">
												<img src="images/form-v1-5.png" alt="bank-5">
											</label>
											<input type="radio" class="radio" name="bank-6" id="bank-6" value="bank-6">
											<label class="bank-images bank-6-label" for="bank-6">
												<img src="images/form-v1-6.png" alt="bank-6">
											</label>
				                		</div>
				                	</div>
								</div>
							</div>
			            </section>
			            <!-- SECTION 3 -->
			            <h2>
			            	<p class="step-icon"><span>03</span></p>
			            	<span class="step-text">Set Financial Goals</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Set Financial Goals</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.</p>
								</div>
								<div class="form-row">
			                		<div class="form-holder form-holder-2">
			                			<input type="radio" class="radio" name="radio1" id="plan-1" value="plan-1">
			                			<label class="plan-icon plan-1-label" for="plan-1">
		                					<img src="images/form-v1-icon-2.png" alt="pay-1">
			                			</label>
			                			<div class="plan-total">
		                					<span class="plan-title">Specific Plan</span>
		                					<p class="plan-text">Pellentesque nec nam aliquam sem et volutpat consequat mauris nunc congue nisi.</p>
		                				</div>
			                			<input type="radio" class="radio" name="radio1" id="plan-2" value="plan-2">
			                			<label class="plan-icon plan-2-label" for="plan-2">
			                					<img src="images/form-v1-icon-2.png" alt="pay-1">
			                			</label>
			                			<div class="plan-total">
		                					<span class="plan-title">Medium Plan</span>
		                					<p class="plan-text">Pellentesque nec nam aliquam sem et volutpat consequat mauris nunc congue nisi.</p>
		                				</div>
										<input type="radio" class="radio" name="radio1" id="plan-3" value="plan-3" checked>
										<label class="plan-icon plan-3-label" for="plan-3">
		                					<img src="images/form-v1-icon-3.png" alt="pay-2">
										</label>
										<div class="plan-total">
		                					<span class="plan-title">Special Plan</span>
		                					<p class="plan-text">Pellentesque nec nam aliquam sem et volutpat consequat mauris nunc congue nisi.</p>
		                				</div>
			                		</div>
			                	</div>
                        <button class="btn third" type="submit">Get Started</button>
							</div>
			            </section>
		        	</div>
		        </form>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.steps.js"></script>
	<script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>