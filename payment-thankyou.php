<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";

include "header-2.php";

include "src/instamojo.php";

$temp_ID = $_REQUEST["temp_id"];

$payment_id = $_REQUEST["payment_request_id"];

$base_url = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'; 
 ?>
<div class="jumbotron text-center" style="height:100vh;">
  <div class="success_image"><img src="<?php echo $base_url; ?>/img/success.png" alt="Success" /></div>
  <h1 class="display-3">Payment successful.</h1>
  <p class="lead">Your submission has been received. Thank you!</p>
  <p class="lead">

<?php

$api = new Instamojo\Instamojo('18e5c4577d1a98abc5c0d87f89bf6a61', '97d89eb5d752f14f0bf69ce5cec2c70f','https://test.instamojo.com/api/1.1/');

$payid = $_GET["payment_request_id"];

try {
    $response = $api->paymentRequestStatus($payid);

    echo "<h4><b>Payment ID:</b> " . $response['payments'][0]['payment_id'] . "</h4>" ;
    echo "<h4><b>Payment Name:</b> " . $response['payments'][0]['buyer_name'] . "</h4>" ;
    echo "<h4><b>Payment Email:</b> " . $response['payments'][0]['buyer_email'] . "</h4>" ;

    $querys = "UPDATE B2B_workers SET amount_status='1', payment_request_id='$payment_id' WHERE temp_id='$temp_ID'";

    $data = mysqli_query ($link, $querys)or die(mysqli_error($link));

    $queryse = "SELECT * FROM B2B_workers WHERE temp_id='$temp_ID'";

    $resultse = mysqli_query($link, $queryse) or die(mysqli_error($link));

    $fetches = mysqli_fetch_row($resultse);

    $add_temp_ID= $fetches[33];

    $queryes = "UPDATE B2B_payment_history SET additional_amount_status='1', payment_request_id='$payment_id' WHERE temp_id='$add_temp_ID'";

    $data = mysqli_query ($link, $querys)or die(mysqli_error($link));

    $dataes = mysqli_query ($link, $queryes)or die(mysqli_error($link));

    ?>

    <?php
}
catch (Exception $e) {
   // print('Error: ' . $e->getMessage());
}

?>
  </p>  
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="<?php echo $base_url; ?>employees.php" role="button" style="background:#41AD49;border:none;">Continue to Employees list page</a>
  </p>
<p class="lead">
<span id="timer"></span></div>
</p>
<script type="text/javascript">
var count = 6;
var redirect = "<?php echo $base_url; ?>employees.php";
function countDown(){
    var timer = document.getElementById("timer");
    if(count > 0){
        count--;
        timer.innerHTML = "This page will redirect in "+count+" seconds.";
        setTimeout("countDown()", 1000);
}else{
      	window.location.href = redirect;
    }
}
countDown();
</script>
</div>
<?php include "footer.php";  ?>






