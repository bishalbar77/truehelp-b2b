<?php
session_start();

 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
?>
<script>
function login() {
return 'false';
}
</script>
<?php 
} else {
?>
<script>
function login() {
 return 'true';
}
</script>
<?php } ?>

<?php
$page = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$cookie_name = "refUrl";
setcookie($cookie_name, $page, time() + (86400 * 30), "/");


$param_id = $_SESSION["id"]; 
        
if(!empty($param_id)){  
            
  $revQuery      = "SELECT * FROM employers WHERE id='$param_id'";

  $revResult     = mysqli_query($link, $revQuery) or die(mysqli_error($link));
  
  $revAllResult  = $revResult->fetch_all(MYSQLI_ASSOC); 
      
  $current_id    = $revAllResult[0]['id'];
      
  $yourname      = $revAllResult[0]['rep_full_name'];
  
  $email         = $revAllResult[0]['email'];
  
  $address       = $revAllResult[0]['address'];
   
  $companyname   = $revAllResult[0]['company_name'];
   
  $photo         = $revAllResult[0]['photo'];
  
  $phone         = $revAllResult[0]['phone']; 

  $role          = $revAllResult[0]['role'];    
    
}

?>


<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>TrueHelp - India's first ML/AI based complete, comprehensive and continuous verification&trade; service for employees. Take an informed decision before hiring your next maid, driver, gardener or just about any employee for your home or office. We help you get their Aadhar verified, background verification and criminal history checked.</title>
    <meta name="description" content="TrueHelp - India's first ML/AI based complete, comprehensive and continuous verification&trade; service for employees. Take an informed decision before hiring your next maid, driver, gardener or just about any employee for your home or office. We help you get their Aadhar verified, background verification and criminal history checked.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-submenu.css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/leaflet.css" type="text/css">
    <link rel="stylesheet" href="css/map.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css"  href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"  href="css/dropzone.css">
    <link rel="stylesheet" type="text/css"  href="css/slick.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="css/skins/default.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="img/logos/icon.png" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="css/ie10-viewport-bug-workaround.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script  src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script  src="js/html5shiv.min.js"></script>
    <script  src="js/respond.min.js"></script>
    <![endif]-->
 
   <script>

    function hide() {
       
         $(".navbar-toggler").hide();
    } 

   </script>
   <?php if(isset($_REQUEST["verificationID"]) && $_REQUEST["verificationID"]!=""){ ?>
   <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5dd4db4c6826a20014f08ad0&product=inline-share-buttons" async="async"></script>
   <?php } ?>
</head>
<body>
<div class="page_loader"></div>

<!-- Main header start -->
<header class="main-header header-2 fixed-header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo pad-0" href="index.php">
                <img src="img/logos/black-logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-nones" id="navbarSupportedContent">
                <div class="navbar-buttons ml-auto d-nones d-xl-block d-lg-block">
                    <ul>
                        <li>
                            <div class="dropdown btns">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    <?php 
                                            if(!empty($photo)){ ?>
                                            <img src="<?php echo $photo; ?>" alt="avatar">
                                            <?php } else { ?>
                                            <img src="img/dummy-image.jpg" alt="avatar">
                                            <?php } ?>
                                    My Account
                                </a>
                                <div class="dropdown-menu">                       
                                    <a class="dropdown-item" href="index.php">Dashboard</a>
                                    <a class="dropdown-item" href="notifications.php">Notifications</a>
                                    <a class="dropdown-item" href="employees.php">Employees</a>
                                    <a class="dropdown-item" href="my-profile.php">My profile</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="notifications.php">
                                <?php 
                                $querys = "SELECT * FROM company_notifications WHERE status='0' AND company_id='$current_id'"; 
                                $results = mysqli_query($link, $querys) or die(mysqli_error($link)); 
                                $rowes = $results->fetch_all(MYSQLI_ASSOC); 
                                if ($results->num_rows > 0) { ?>
                                    <img src="img/notifications.png" style="border: none; margin:20px 0 20px 0;" />
                                <?php } else { ?>
                                    <img src="img/notification.png" style="border: none; margin:20px 0 20px 0;" />
                                <?php } ?>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-theme btn-md" href="new-employee.php">New employee</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->
