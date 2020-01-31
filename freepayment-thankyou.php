<?php
// Initialize the session
session_start();

include "header-2.php";

$base_url = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'; 
 ?>
<div class="jumbotron text-center" style="height:100vh;">
  <div class="success_image"><img src="<?php echo $base_url; ?>/img/success.png" alt="Success" /></div>
  <h1 class="display-3">Thank you!</h1>
  <p class="lead">Your submission has been received.</p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="<?php echo $base_url; ?>employees.php" role="button" style="background:#41AD49;">Continue to Employees list page</a>
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
