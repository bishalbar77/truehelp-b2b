<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

/*echo $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$url_components = parse_url($url);

parse_str($url_components['query'], $params);

echo ' Hi '.$params['ID'];*/


if ( !isset($_GET['ID']) || empty($_GET['ID']) ) {


} else {

      $stonevar = $_GET['ID'] ? $_GET['ID'] : NULL;

      $stonevar_action = $_GET['action'] ? $_GET['action'] : NULL;

      if ( $stonevar===NULL || $stonevar_action===NULL) {
      header("Location: index.php");
      exit();
      }
}

// Include config file
require_once "config.php";

$type_err= "";

$amount_err= "";

$empID = trim($_REQUEST["ID"]);

$action = trim($_REQUEST["action"]);

$param_id = $_SESSION["id"]; 
    	
if(!empty($param_id)){  

  $revQuery      = "SELECT * FROM B2B_company_details WHERE ID='$param_id'";

  $revResult     = mysqli_query($link, $revQuery) or die(mysqli_error($link));
  
  $revAllResult  = $revResult->fetch_all(MYSQLI_ASSOC); 
      
  $current_id    = $revAllResult[0]['ID'];
      
  $yourname      = $revAllResult[0]['rep_full_name'];
  
  $email         = $revAllResult[0]['email'];
  
  $address       = $revAllResult[0]['address'];
   
  $companyname   = $revAllResult[0]['company_name'];
   
  $photo         = $revAllResult[0]['photo'];
  
  $phone         = $revAllResult[0]['phone']; 

  $role          = $revAllResult[0]['role']; 

}


if($_SERVER["REQUEST_METHOD"] == "POST"){
   	
       if(empty(trim($_POST["verification-type"]))) {
          $type_err = "Please enter verification type.";
       } else {
          $veriftype = trim($_POST["verification-type"]);
       }
 	
       
       if($_POST["verification-amount"]=="") {
          $amount_err = "Please enter verification amount.";
       } else {
          $verifamount = trim($_POST["verification-amount"]);
       } 

       $source      = $_POST['source'];
       $docRequired = $_POST['docRequired'] ? $_POST['docRequired'] : 0;
       $isAddress   = $_POST['isAddress'] ? $_POST['isAddress'] : 0;

   	  $IDs = trim($_POST["typeID"]);
          
          if(empty($type_err) && empty($amount_err)){	

	     if($_POST["action"]=="update"){
		
                $query = "UPDATE B2B_verification_type SET verification_type='$veriftype', verification_amount='$verifamount' WHERE ID=$IDs";
            
             } else {

	        $query = "INSERT INTO B2B_verification_type (verification_type,verification_amount,source,docRequired,isAddress) VALUES ('$veriftype','$verifamount','$source','$docRequired','$isAddress')";

	     }

	  $data = mysqli_query ($link, $query)or die(mysqli_error($link));

	  if($data)
	  {
	     header("location: manage-verification-type.php");
	  } 		
	  
	}

}

?>

<?php include "header.php"; ?>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

<!-- Dashboard start -->
<div class="dashboard submit-property">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="dashboard-nav d-nones d-xl-block d-lg-block hide_div">
                <?php include "menu-setting.php"; ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Manage verification types</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li class="active">Manage verification types</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

		<div class="submit-address dashboard-list">	
		   <?php if($_REQUEST["status"]=="error"){ ?><span class="help-block">Can't delete a verification type.</span><?php } ?>
		   <table class="table-responsive custom-table">
                       <tr>
                         <th>ID</th>
                         <th>Verification name</th>
                         <th>Amount</th>
			 <th>Status</th>
			 <th>Action</th>
			 <th>Action status</th>
                       </tr>
		       <?php
              		$queryes = "SELECT * FROM B2B_verification_type";

                        $resultes = mysqli_query($link, $queryes) or die(mysqli_error($link));

			$count=1;

                        if ($resultes->num_rows!=0) {

                            while ($row=mysqli_fetch_row($resultes)){

			    $ID = $row[0];

                            $type = ucfirst($row[1]);

			    $amount = $row[2];
			
			    $status = $row[3];
				
			    if($status==0){
				$stat = "Inactive";
			    } else {
				$stat = "Active";
			    }

                       ?>
                       <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $type; ?></td>
                        <td><?php echo $amount; ?></td>
			<td><?php echo $stat; ?></td>
			<td><a href="manage-verification-type.php?ID=<?php echo $ID; ?>&action=update">Edit</a> | <a href="delete-verify-type.php?ID=<?php echo $ID; ?>" onclick="return confirm('Are you sure you want to delete this verification type?');">Delete</a> </td>
			<td><label class="switch">
  			     <input type="checkbox" value="<?php echo $ID; ?>" <?php if($status==1){ ?>checked <?php } ?>>
                             <span class="slider round"></span>
                             </label>
			</td>
                       </tr>
		       <?php $count++; } } ?>
                    </table>
		</div>
                    <div class="submit-address dashboard-list">
			<?php
               		   $queryss = "SELECT * FROM B2B_verification_type WHERE ID='$empID'";

                           $resultss = mysqli_query($link, $queryss) or die(mysqli_error($link));

                           $fetchVals = mysqli_fetch_row($resultss);

                           $Vtype = $fetchVals[1];

			   $Vamount = $fetchVals[2]; 

			 ?>
                         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">  
                            <h4 class="bg-grea-3">Add verification</h4>                         
                            <div class="row pad-20">
                                <div class="col-lg-12">                                   
                                    <input type="text" class="input-text" maxlength="50" name="verification-type" placeholder="Enter verification type" value="<?php echo $Vtype; ?>" />
				                            <span class="help-block"><?php echo $type_err; ?></span>
                                </div>
                            </div>
			                      <div class="row pad-20">
                                <div class="col-lg-12">
                                    <input type="text" class="input-text" maxlength="5" name="verification-amount" id="verification_amount"  placeholder="Enter verification amount" value="<?php echo $Vamount; ?>" />
                                    <span class="help-block"><?php echo $amount_err; ?></span>
                                </div>
                            </div>

                            <div class="row" style="padding: 5px 0 5px 25px;">
                                <div class="col-lg-12">
                                    <label><input type="checkbox" name="isAddress" id="isAddress" value="1"> Address Required</label>
                                </div>
                            </div>

                            <div class="row" style="padding: 5px 0 5px 25px;">
                                <div class="col-lg-12">
                                    <label><input type="checkbox" name="docRequired" id="docRequired" value="1"> Document Required</label>
                                </div>
                            </div>

                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <select class="input-text" name="source" id="source">
                                      <option value="B">B2B</option>
                                      <option value="C">B2C</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row pad-20">
                              <div class="col-lg-4 col-md-12 col-sm-12">
  				                      <input type="hidden" name="action" value="<?php echo $action; ?>" /> 
  			                        <input type="hidden" name="typeID" value="<?php echo $empID; ?>" />	                                
                                <input type="submit" class="btn btn-md button-theme" name="add_type" value="Submit">                                 
                              </div>
                            </div>
                        </form>
                    </div>
                    <p class="sub-banner-2 text-center">Copyright 2019, TrueHelp Enterprise.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard end -->

<?php include("footer.php"); ?>

<script>

jQuery(document).ready(function(){	

	jQuery("#verification_amount").keydown(function (event) {

	  // Allow only backspace and delete

	  if(jQuery(this).val().length <= 6 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )

	  {

	      if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9) {

	          // let it happen, don't do anything

	      } else {

	          // Ensure that it is a number and stop the keypress

	          if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {

	              event.preventDefault();

	          }

	      }

	  }else{

	      event.preventDefault();

	  }      
	  
	});

});	

</script>

<script>
jQuery(document).ready(function($){
      $(".switch input").click(function(){
           if($(this).is(":checked")) {
           var values = $(this).val();

	     if(values) {
             	 window.location = "varification-action.php?verifyid="+ values +"&action=update&status=1";
             }

           } else {
		var values = $(this).val();
           	window.location = "varification-action.php?verifyid="+ values +"&action=update&status=0";     
           }
     });
});
</script>

<script>
//jQuery("#verification_amount").keypress(function(e){ 
  // if (this.value.length == 0 && e.which == 48 ){
    //  return false;
   //}
//});

</script>
