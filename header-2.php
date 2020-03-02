<?php
$varificationID = "";
 
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
</head>
<body>
<div class="page_loader"></div>