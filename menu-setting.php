<?php $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php'); ?>
<div class="dashboard-inner">
<h4>Main</h4>
<ul>       
    <li class="<?php echo $file_name == 'index' ? 'active' : ''; ?>"><a href="index.php"><i class="flaticon-dashboard"></i> Dashboard</a></li>
     <?php  
             $query = "SELECT * FROM B2B_messages WHERE company_id='$param_id' AND message_status='0'";

             $result = mysqli_query($link, $query) or die(mysqli_error($link));
        ?>
    <li class="<?php echo $file_name == 'messages' ? 'active' : ''; ?>"><a href="messages.php"><i class="flaticon-mail"></i> Messages <?php if ($result->num_rows!=0) { ?><span class="nav-tag"><?php echo $result->num_rows; ?> <?php } ?></span> </a></li>
</ul>
<h4>Listings</h4>
<ul>
   <li class="<?php echo $file_name == 'employees' ? 'active' : ''; ?>"><a href="employees.php"><i class="flaticon-people"></i> Employees</a></li>
   <li class="<?php echo $file_name == 'new-employee' ? 'active' : ''; ?>"><a href="new-employee.php"><i class="flaticon-plus"></i>New employee</a></li>
</ul>
<h4>Account</h4>
<ul>
    <li class="<?php echo $file_name == 'my-profile' ? 'active' : ''; ?>"><a href="my-profile.php"><i class="flaticon-people"></i>My profile</a></li>
    <li class="<?php echo $file_name == 'logout' ? 'active' : ''; ?>"><a href="logout.php"><i class="flaticon-logout"></i>Logout</a></li>
</ul>
</div>