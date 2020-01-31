<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if ( !isset($_GET['ID']) || empty($_GET['ID']) ) {


} else {

      $stonevar = isset($_GET['ID']) ? $_GET['ID'] : NULL;

      $stonevar_action = isset($_GET['action']) ? $_GET['action'] : NULL;

      if (empty($stonevar) || empty($stonevar_action)) {
      header("Location: index.php");
      exit();
      }
}


// Include config file
require_once "config.php";

$title_err= "";

$description_err= "";

$param_id = $_SESSION["id"]; 

$empID = trim($_REQUEST["ID"]);

$action = trim($_REQUEST["action"]);
    	
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
   	
       if(empty(trim($_POST["title"]))) {
          $title_err = "Please enter employee type.";
       } else {
          $title = trim($_POST["title"]);
       }

       if(empty(trim($_POST["source"]))) {
          $source_err = "Please enter employee type.";
       } else {
          $source = trim($_POST["source"]);
       }       
       
       if(empty(trim($_POST["description"]))) {
          $description_err = "Please enter description.";
       } else {
          $description = trim($_POST["description"]);
       } 

   	  $IDs = trim($_POST["typeID"]);
          
        if(empty($title_err)){	

	      if($_POST["action"]=="update"){
		
              $query = "UPDATE B2B_employee_type SET emp_type='$title', emp_description='$description', source='$source' WHERE ID=$IDs";
            
        } else {

	        $query = "INSERT INTO B2B_employee_type (emp_type,emp_description,source) VALUES ('$title','$description','$source')";

	     }

	  $data = mysqli_query ($link, $query)or die(mysqli_error($link));

	  if($data)
	  {
	     header("location: manage-types.php");
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
                            <div class="col-sm-12 col-md-6"><h4>Manage employee types</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li class="active">Manage employee types</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

              		<div class="submit-address dashboard-list">	
              		   <?php if($_REQUEST["status"]=="error"){ ?><span class="help-block">Can't delete a employee type.</span><?php } ?>
              		   <table class="table-responsive custom-table" style="display: inline-table;">
                       <tr>
                         <th>ID</th>
                         <th>Employee type</th>
                         <th>Description</th>
			                   <th>Action</th>
                       </tr>
                        <?php
                        $queryes = "SELECT * FROM B2B_employee_type WHERE source='B'";

                        $resultes = mysqli_query($link, $queryes) or die(mysqli_error($link));

                        $count=1;

                        if ($resultes->num_rows!=0) {

                        while ($row=mysqli_fetch_row($resultes)){

                        $ID = $row[0];

                        $type = ucfirst($row[1]);

                        $desc = $row[2];
                       ?>
                       <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $type; ?></td>
                        <td><?php echo $desc; ?></td>
                      <td><a href="manage-types.php?ID=<?php echo $ID; ?>&action=update">Edit</a> | <a href="delete-types.php?ID=<?php echo $ID; ?>" onclick="return confirm('Are you sure you want to delete this employee type?');">Delete</a></td>
                      </tr>
                      <?php $count++; } } ?>
                      </table>
                      </div>
                    <div class="submit-address dashboard-list">
                          <?php
                          $queryss = "SELECT * FROM B2B_employee_type WHERE ID='$empID'";

                          $resultss = mysqli_query($link, $queryss) or die(mysqli_error($link));

                          $fetchVals = mysqli_fetch_row($resultss);

                          $title = $fetchVals[1];

                          $description = $fetchVals[2]; 

                          ?>
                         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">  
                             <h4 class="bg-grea-3">Add employee type</h4>                         
                            <div class="row pad-20">
                                <div class="col-lg-12">                                   
                                    <input type="text" class="input-text" maxlength="50" name="title" placeholder="Enter employee type" value="<?php echo $title; ?>" />
				                            <span class="help-block"><?php echo $title_err; ?></span>
                                </div>
                            </div>
			                      <div class="row pad-20">
                                <div class="col-lg-12">
                                    <textarea class="input-text" name="description" maxlength="250" placeholder="Enter description here..."><?php echo $description; ?></textarea>
                                    <span class="help-block"><?php echo $description_err; ?></span>
                                </div>
                            </div>

                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <select class="input-text" name="source" id="source">
                                      <option value="B" selected>B2B</option>
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

