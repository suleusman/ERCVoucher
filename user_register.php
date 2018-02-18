<?php session_start();?>
<?php include("include/connection.php");?>
<?php include("include/authenticate_user.php");?>

<?php
if(isset($_POST['login'])){

$fname = $_POST['fname'];	
$surname = $_POST['surname'];
$mname = $_POST['mname'];
$dept = $_POST['dept'];
$type = $_POST['type'];
$username = $_POST['uname'];
$password = $_POST['password'];


if(empty($fname)){
	$msg1 = '<font color="#FF0000" size="2">Enter First Name</font>';
				}
	if(empty($surname)){
	$msg2 = '<font color="#FF0000" size="2">Enter Last SurName</font>';
						}
if(empty($dept)){
	$msg3 = '<font color="#FF0000" size="2">Enter Department</font>';
				}
if(empty($type)){
	$msg4 = '<font color="#FF0000" size="2">Select User Type</font>';
				}
if(empty($username)){
	$msg5 = '<font color="#FF0000" size="2">Enter User Name</font>';
				}
if(empty($password)){
	$msg6 = '<font color="#FF0000" size="2">Enter Password</font>';
				}

				
	else{

$sql = "INSERT INTO user_login(fname, surname, mname, dept, user_type, username, password)  VALUES('$fname', '$surname', '$mname','$dept', '$type', '$username', '$password')";
$query = mysqli_query($connection, $sql) or die(mysql_error());
if(mysqli_query($connection,$query)){
$msg = '<font color="#FF0000" size="2">Error in User Creation</font>';
}
else{
$msg = '<font color="#FF0000" size="2"> User Creation Succesful</font>';
}
  }
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Payment Voucher</title>
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
<div class="container"  style="max-width:700px;">  
<h3 >Enter New User's Details</h3> <h4><?php if(isset($msg)){ echo "  ".$msg;}?> </h4>
  <div class="row" style="background-color:#fff; padding:40px; border:#ddd thin solid; border-radius:1px; border-top:#3090c7 thick solid;" >
  <hr />
    <font >All fields marked with <b style="color:red;">*</b> are compulsory</font><br><br>
  <form  action="user_register.php" method="post">
    <div class="col-sm-12" > 
    <div class="form-group"> 
    <label>First Name<font style="color:red; font-size:20px;">*</font></label><?php if(isset($msg1)){ echo $msg1;} ?> 
    <input type="text" name="fname" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-12">
    <div class="form-group"> 
    <label>Surname<font style="color:red; font-size:20px;">*</font></label> <?php if(isset($msg2)){ echo $msg2;} ?>
    <input type="text" name="surname" class="form-control" />
     </div>
    </div>
      
      <div class="col-sm-12" > 
    <div class="form-group"> 
    <label>Middle Name</label>
    <input type="text" name="mname" placeholder="" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-12">
    <div class="form-group"> 
    <label>Department<font style="color:red; font-size:20px;">*</font></label><?php if(isset($msg3)){ echo $msg3;} ?> 
    <input type="text" name="dept" placeholder="" class="form-control" />
     </div>
    </div>
    
    <div class="col-sm-12" > 
    <div class="form-group"> 
    <label>User Type<font style="color:red; font-size:20px;">*</font></label> <?php if(isset($msg4)){ echo $msg4;} ?>
    <select name="type" class="form-control" >
    <option>Select...</option>
    <option value="1">Admin</option>
    <option value="2">Payment Voucher</option>
    <option value="3">Cash Advance</option>
    <option value="4">Adjustment Voucher</option>
    <option value="5" >Contract WHT VAT</option>
    </select>
     </div>
	</div>
    
    <div class="col-sm-12">
    <div class="form-group"> 
    <label>User Name<font style="color:red; font-size:20px;">*</font></label> <?php if(isset($msg5)){ echo $msg5;} ?>
    <input type="text" name="uname" class="form-control" />
     </div>
    </div>
    
    <div class="col-sm-12" > 
    <div class="form-group"> 
    <label>Password<font style="color:red; font-size:20px;">*</font></label> <?php if(isset($msg6)){ echo $msg6;} ?>
    <input type="text" name="password" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-12 text-right">
    <input type="submit" name="login" value="Submit" class="btn btn-primary"   />
    </div>
    </form>
    </div>
    </div>

<?php include("include/footer.php")?>

</body>
</html>
