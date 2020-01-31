<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   // header("location: login.php");
   // exit;
}

$workID = $_REQUEST["workerID"];

$varificationID = $_REQUEST["verificationID"];

$status = $_REQUEST["status"];

if($status=="" || $workID=="" || $varificationID==""){
    header("location: employees.php");
    exit;
}

include "header-2.php"; 

?>

<style>
#page-wrap {
    width: 850px;
    margin: 0 auto;
    padding: 0 20px;
}

#page-wrap textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
#page-wrap table { border-collapse: collapse; }
#page-wrap table td, table th { border: 1px solid black; padding: 5px; }

#header { display: inline-block; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; text-decoration: uppercase; padding: 8px 0px; }
#footer { display: inline-block; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font-size:15px; text-decoration: uppercase; padding: 8px 0px; }

#address { width: 250px; height: 150px; float: left; }
#customer { overflow: hidden; }

div#logo img {
    width: 70px;
}
.print_button {
    margin-top: 20px;
    text-align: center;
}
#logo { text-align: right; margin-right: 140px; float: right; position: relative; margin-top: 10px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }
#logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
#logohelp input { margin-bottom: 5px; }
.edit #logohelp { display: block; }
.edit #save-logo, .edit #cancel-logo { display: inline; }
.edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
#customer-title { font-size: 20px; font-weight: bold; float: left; }

#meta { margin-top: 1px; width: 350px; float: right; }
#meta td { text-align: right;  }
#meta td.meta-head { text-align: left; background: #eee; }
#meta td textarea { width: 100%; height: 20px; text-align: right; }

#items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
#items th { background: #eee; }
#items textarea { width: 80px; height: 50px; }
#items tr.item-row td { border: 0; vertical-align: top; }
#items td.description { width: 300px; }
#items td.item-name { width: 175px; }
#items td.description textarea, #items td.item-name textarea { width: 100%; }
#items td.total-line { border-right: 0; text-align: right; }
#items td.total-value { border-left: 0; padding: 10px; }
#items td.total-value textarea { height: 20px; background: none; }
#items td.balance { background: #eee; }
#items td.blank { border: 0; }

#terms { text-align: center; margin: 20px 0 0 0; }
#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
#terms textarea { width: 100%; text-align: center;}

textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }

.delete-wpr { position: relative; }
.delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }


</style>

<div id="page-wrap">

<h3 id="header">True Help Enterprise</h3>

<?php 

    $revQuery      = "SELECT * FROM B2B_workers WHERE worker_id='$workID'";

    $revResult     = mysqli_query($link, $revQuery) or die(mysqli_error($link));

    $revAllResult  = $revResult->fetch_all(MYSQLI_ASSOC);

	$name = $revAllResult[0]['worker_fullname'];

	$mname = $revAllResult[0]['mname'];

	$address = $revAllResult[0]['address'];
	
	$street = $revAllResult[0]['street'];

	$state = $revAllResult[0]['state'];

	$postal_code = $revAllResult[0]['postal_code'];

	$phone = $revAllResult[0]['contact_phone'];

    $email = $revAllResult[0]['contact_email'];

	$dates = $revAllResult[0]['regisration_date'];

	$newDate = date("m-d-Y H:i A", strtotime($dates));

?>
		
    <div id="identity">		
    <div id="address"><b><?php echo $name." ".$mname; ?></b></br><?php echo $address.", ".$street.", ".$state.", Postal code: ".$postal_code; ?></br>
    Phone: <?php echo $phone; ?></br>
    Email: <?php echo $email; ?>
    </div>

            <div id="logo">
              <img id="image" src="img/logos/black-logo.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <div id="customer-title">
		<?php if($status==0){ ?>
		    <img src="img/icons/failed.jpg" alt="Failed" />
	        <?php } else if($status==1){ ?>
		    <img src="img/icons/verified.jpg" alt="Verified" />
		<?php } else if($status==2){ ?>
		    <img src="img/icons/pending.jpg" alt="Pending" />
		<?php } ?> 	
	    </div>

            <table id="meta">
                <tr>
                    <td class="meta-head">Verification Status</td>
                    <td><div class="due">
			<?php if($status==0){ ?>
				Failed
			<?php } else if($status==1){ ?>
				Verified	
			<?php } else if($status==2){ ?>
				Pending
			<?php } ?>	
			</div></td>
                </tr>

		<tr>
                    <td class="meta-head">Date / Time</td>
                    <td><div id="date"><?php echo $newDate; ?></div></td>
                </tr>

		<tr>
		    <td class="meta-head">Verification type</td>

			<?php

	                   $queryess = "SELECT * FROM B2B_verification_type WHERE ID='$varificationID'";

                           $resultess = mysqli_query($link, $queryess) or die(mysqli_error($link));

			   $row = mysqli_fetch_row($resultess);

			   $type = ucfirst($row[1]);

                         ?>

		    <td><div id="date"><?php echo $type; ?></div></td>
                </tr>
            </table>
		
		</div>
	    <div id="footer">Copyright 2019, TrueHelp Enterprise.</div>
	    <div class="footer_share_icons"><div class="sharethis-inline-share-buttons"></div></div>
	    <div class="print_button"><button onclick="myFunction()">Print</button></div>
</div>

<?php include("footer.php"); ?>

<script>
function myFunction() {
  $(".footer_share_icons").hide();
  $(".print_button").hide();
  window.print();
}


$(window).load(function() {
    $('img[data-url]').each(function() {
        $.ajax({
        	url: 'https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=' + $(this).data('url') + '&screenshot=true',
        	context: this,
        	type: 'GET',
        	dataType: 'json',
        	success: function(data) {
           		data = data.screenshot.data.replace(/_/g, '/').replace(/-/g, '+');
            	$(this).attr('src', 'data:image/jpeg;base64,' + data);
            }
        });
    });


});

</script>
