<?php  session_start();?>

<?php 
// connect to mysql server & select database
include("include/connection.php"); 
?>

<?php include('include/authenticate_user.php'); ?>

<?php

if(isset($_POST['login'])){

$details = mysqli_real_escape_string($connection, $_POST['details']);	
$dr = mysqli_real_escape_string($connection, $_POST['debit']);
$cr = mysqli_real_escape_string($connection, $_POST['credit']);
$station = mysqli_real_escape_string($connection, $_POST['station']);
$retno = mysqli_real_escape_string($connection, $_POST['ret_no']);
$year = mysqli_real_escape_string($connection, $_POST['year']);
$month = mysqli_real_escape_string($connection, $_POST['month']);
$naration = mysqli_real_escape_string($connection, $_POST['naration']);
$payee = mysqli_real_escape_string($connection, $_POST['payee']);
$prepby = mysqli_real_escape_string($connection, $_POST['prepby']);
$checkby = mysqli_real_escape_string($connection, $_POST['checkby']);
$signby = mysqli_real_escape_string($connection, $_POST['signby']);

if(empty($details)){
	$msg1 = '<font color="#FF0000" size="2">Error</font>';
	}
	if(empty($dr)){
	$msg2 = '<font color="#FF0000" size="2">Error</font>';
	}
if(empty($cr)){
	$msg3 = '<font color="#FF0000" size="2">Error</font>';
	}
if(empty($station)){
	$msg4 = '<font color="#FF0000" size="2">Error</font>';
	}
if(empty($retno)){
	$msg5 = '<font color="#FF0000" size="2">Error</font>';
	}
if(empty($year)){
	$msg6 = '<font color="#FF0000" size="2">Error</font>';
	}
if(empty($month)){
	$msg7 = '<font color="#FF0000" size="2">Error</font>';
	}
	if(empty($naration)){
	$msg8 = '<font color="#FF0000" size="2">Error</font>';
	}
if(empty($payee)){
	$msg9 = '<font color="#FF0000" size="2">Error</font>';
	}

	
	else{
//$rate = number_format((float)$rate, 2);
$user_id = $id;

$sql = "INSERT INTO adjustmet_voucher(user_id, details, dr, cr, station, ret_no, year, month, naration, payee, prep_by, check_by, sign_by)  VALUES('$user_id', '$details', '$dr', '$cr','$station', '$retno', '$year', '$month', '$naration', '$payee', '$prepby', '$checkby', '$signby')";
$query = mysqli_query($connection, $sql) or die(mysql_error());
if(mysqli_query($connection,$query)){
	$msg = '<font color="#FF0000" size="4">Error in Voucher Creation </font>';
	}
else{
	$msg = '<font color="#FF0000" size="4">Voucher Creation Succesful</font>';
}
  }
  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Adjustment Voucher Home</title>
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
$user_id = $id;
if($user_id ==1){
include("include/admin_menu.php");
}
else
{
	include("include/av_menu.php");

}
?>

<div class="container"  style="max-width:700px;">  
<h3 >Enter Adjustment Voucher Details</h3> <h4><?php if(isset($msg)){echo $msg;}?></h4> 
  <div class="row" style="background-color:#fff; padding:10px; border:#ddd thin solid; border-radius:1px; border-top:#3090c7 thick solid;" >
  <hr />
  <form  action="av.php" method="post">
   <div class="col-sm-12" > 
    <div class="form-group"> 
    <label>Details:</label><?php if(isset($msg1)){echo $msg1;}?> 
    <textarea name="details" class="form-control" ></textarea>
     </div>
	</div>
    <div class="col-sm-4" > 
    <div class="form-group"> 
    <label>Debit:</label> <?php if(isset($msg2)){echo $msg2;}?>
    <input type="text" name="debit" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-4">
    <div class="form-group"> 
    <label>Credit:</label><?php if(isset($msg3)){echo $msg3;}?> 
    <input type="text" name="credit" class="form-control" />
     </div>
    </div>
      
      <div class="col-sm-4" > 
    <div class="form-group"> 
    <label>Station:</label> <?php if(isset($msg4)){echo $msg4;}?>
    <input type="text" name="station"  class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-4">
    <div class="form-group"> 
    <label>Retirement Number:</label> <?php if(isset($msg5)){echo $msg5;}?>
    <input type="text" name="ret_no"  class="form-control" />
     </div>
    </div>
    
    <div class="col-sm-4" > 
    <div class="form-group"> 
    <label>Year:</label> <?php if(isset($msg6)){echo $msg6;}?>
    <input type="text" name="year" placeholder="2010" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-4">
    <div class="form-group"> 
    <label>Month:</label><?php if(isset($msg7)){echo $msg7;}?> 
    <input type="text" name="month" placeholder="june" class="form-control" />
     </div>
    </div>
    
     <div class="col-sm-12" > 
    <div class="form-group"> 
    <label>Naration:</label> <?php if(isset($msg8)){echo $msg8;}?>
    <textarea name="naration" class="form-control" ></textarea>
     </div>
	</div>
    <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Payee:</label> <?php if(isset($msg9)){echo $msg9;}?>
    <input type="text" name="payee" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6">
    <div class="form-group"> 
    <label>Prepared By:</label> 
    <input type="text" name="prepby" class="form-control" />
     </div>
    </div>
    
    <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Checked By:</label> 
    <input type="text" name="checkby" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Signed By:</label> 
    <input type="text" name="signby" class="form-control" />
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
