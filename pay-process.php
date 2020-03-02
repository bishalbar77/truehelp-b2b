<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

// Include config file
require_once "config.php";

$param_id = $_SESSION["id"];

if(!empty($param_id)){  
    $query_employers    = "SELECT * FROM employers WHERE id='$param_id'";
    $employer_result    = mysqli_query($link, $query_employers) or die(mysqli_error($link));
    $emp_result         = $employer_result->fetch_all(MYSQLI_ASSOC);
    $current_id         = $emp_result[0]['id'];
    $yourname           = $emp_result[0]['rep_full_name'];
    $email              = $emp_result[0]['email'];
    $photo              = $emp_result[0]['photo'];
    $phone              = $emp_result[0]['phone'];    
    $role               = $emp_result[0]['role'];
}

$order_id = $_GET['order_id'];
$worker_id = $_GET['worker_id'];

$key1 = "order_id";
$key2 = "worker_id";
$key3 = "amount";
$encrypted1 = $_GET["order_id"];
$encrypted2 = $_GET["worker_id"];
$encrypted3 = $_GET["amount"];
$order_id = openssl_decrypt(hex2bin($encrypted1),'AES-128-CBC',$key1);
$worker_id = openssl_decrypt(hex2bin($encrypted2),'AES-128-CBC',$key2);
$amount = openssl_decrypt(hex2bin($encrypted3),'AES-128-CBC',$key3);

include ("header.php");
?>

<button id="rzp-button1">Pay</button>

<?php include("footer.php"); ?>

<script type="text/javascript">
jQuery(document).ready(function($){
    $("#rzp-button1").trigger("click");
});    
</script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
var amount = <?php echo $amount; ?>;
var gst = (18 / 100) * <?php echo $amount; ?>;
var finalamt = gst + amount;
var options = {
    "key": "rzp_test_By6ICfenWJr859", // Enter the Key ID generated from the Dashboard
    "amount": finalamt * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise or INR 500.
    "currency": "INR",
    "name": "TrueHelp Enterprise",
    "description": "TrueHelp",
    "image": "https://home.gettruehelp.com/app/icons/icon-384x384.png",
    "order_id": "",//This is a sample Order ID. Create an Order using Orders API. (https://razorpay.com/docs/payment-gateway/orders/integration/#step-1-create-an-order). Refer the Checkout form table given below
    "handler": function (response){
                if (typeof response.razorpay_payment_id == 'undefined' ||  response.razorpay_payment_id < 1) {
                  updateAmount()
                  redirect_url = 'payment-failure.php?temp_id='+<?php echo $order_id; ?>+'&worker_id='+<?php echo $worker_id; ?>+'';
                } else {
                  updateAmount()
                  redirect_url = 'payment-thankyou.php?temp_id='+<?php echo $order_id; ?>+'&payment_request_id='+response.razorpay_payment_id+'&worker_id='+<?php echo $worker_id; ?>+'';
                }

                location.href = redirect_url;
    },
    "modal": {
        "ondismiss": function(){
            updateAmount()
            redirect_url = 'payment-failure.php?temp_id='+<?php echo $order_id; ?>+'&worker_id='+<?php echo $worker_id; ?>+'';
            location.href = redirect_url;
        }
    },
     "prefill": {
        "email": '<?php echo $email ?>',
        "contact": '<?php echo $phone ?>'
    },
    "notes": {
        "comments": 'TrueHelp Enterprise'
    },
    "theme": {
        "color": "#ff0000"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

<script type="text/javascript">
function updateAmount(){
    jQuery.ajax({
        url:"update-amount.php",
        method:"POST",
        data: {
            'company_id' : '<?php echo $param_id; ?>',
            'worker_id'  : '<?php echo $worker_id; ?>',
            'order_id'   : '<?php echo $order_id; ?>',
            'subTotal'   : '<?php echo $amount; ?>',
            'gst'        : '<?php echo $gst = (18 / 100) * $amount; ?>',
            'finalTotal' : '<?php echo $amount + $gst; ?>',
        },
        success: function(data) {
           
        }
    });
}   
</script>
