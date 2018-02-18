<?php session_start();?>
<?php include("include/connection.php");?>
<?php include("include/authenticate_user.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registered User List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link hrel="styles/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="styles/css/bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="styles/js/jQuery-2.1.4.min.js"></script>
  <script src="styles/js/bootstrap.min.js"></script>
  <?php include("include/bodycss.php")?>

</head>
<body>

<div class="jumbotron">

  <div class="container" style="max-width:700px; width:auto;">
  <div class="col-sm-12" style=" text-align:center;">
    <h2 style="color:#3090c7; font-weight:bold; text-align:center;">FCT ERC Payment Solution 2.0</h2>      
    </div>
  </div>
</div>

<?php 
include("include/admin_menu.php");
?>

<div class="container"  style="max-width:1000px;">  
<h3 >List of Registered Users</h3>
  <div class="row" style="background-color:#fff; padding:5px; border:#ddd thin solid; border-radius:1px; border-top:#3090c7 thick solid;" >
  <table width="100%" border="0" class="table">
  <tr style="font-weight:bold;"><td>S/No</td><td>Surname</td><td>Mid Name</td><td>First Name</td><td>Department</td><td>User Type</td><td>Username</td><td>Password</td><td>Action</td></tr>
    
	<?php
$sql = "SELECT * FROM user_login";
$query = mysqli_query($connection, $sql) or die(mysql_error());

if(mysqli_num_rows($query) > 0){
	//output result
	while(	$users = mysqli_fetch_array($query)){
	$type = $users['user_type'];
	if($type==1){$user_post = "Admin";
	}else
	if($type==2){$user_post = "Payment Voucher";
	}else
	if($type==3){$user_post = "Cash Advance";
	}else
	if($type==4){$user_post = "Adjustment Voucher";
	}else
	if($type==5){$user_post = "Contract WHT & VAT";
	}
	$username = $users['username'];
	?>
 <tr>
	<td><?php echo $users['user_id'];?></td>
	<td><?php echo $users['surname'];?></td>
	<td><?php echo $users['mname'];?></td>
	<td><?php echo  $users['fname'];?></td>
	<td><?php echo $users['dept'];?></td>
	<td><?php echo $user_post;?></td>
	<td><?php echo $users['username'];?></td>
	<td><?php echo $users['password'];?></td>
     <td>	 <a href="delete_users.php?username=<?php echo $username; ?>" target="_new" onclick="return confirm('Are you sure you wish to delete this Record?')" > Delete </a>
</td>
</tr>
<?php
}
	
}else
echo "No Registered User to view"; 
?>
   </table>
    </div>
    </div>

<?php include("include/footer.php")?>

</body>
</html>
