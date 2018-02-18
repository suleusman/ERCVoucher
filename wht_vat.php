<?php  session_start();?>

<?php 
// connect to mysql server & select database
include("include/connection.php"); 
?>

<?php include('include/authenticate_user.php'); ?>

<?php

if(isset($_POST['submit'])){
	
		$agent = mysqli_real_escape_string($connection, $_POST['agent']);	
		$date = mysqli_real_escape_string($connection, $_POST['date']);
		$cname =  mysqli_real_escape_string($connection, $_POST['name']);
		$tin = mysqli_real_escape_string($connection, $_POST['tin']);
		$address = mysqli_real_escape_string($connection, $_POST['address']);
		$invnum = mysqli_real_escape_string($connection, $_POST['invnum']);
		$cdate =   mysqli_real_escape_string($connection, $_POST['cdate']);
		$periodcov = mysqli_real_escape_string($connection, $_POST['periodcov']);
		$description = mysqli_real_escape_string($connection, $_POST['description']);
		$amount =  mysqli_real_escape_string($connection, $_POST['amount']);
		$wht =  mysqli_real_escape_string($connection, $_POST['wht']);
		$vat =   mysqli_real_escape_string($connection, $_POST['vat']);
		$audit = mysqli_real_escape_string($connection, $_POST['audit']);
		$prep = mysqli_real_escape_string($connection, $_POST['prep']);

if(empty($agent)){
	$msg1 = '<font color="#FF0000" size="2">Enter Value</font>';
	}
	if(empty($date)){
	$msg2 = '<font color="#FF0000" size="2">Enter Value</font>';
	}
if(empty($cname)){
	$msg3 = '<font color="#FF0000" size="2">Enter Value</font>';
	}
if(empty($tin)){
	$msg4 = '<font color="#FF0000" size="2">Enter Value</font>';
	}
if(empty($address)){
	$msg5 = '<font color="#FF0000" size="2">Enter Value</font>';
	}
if(empty($invnum)){
	$msg6 = '<font color="#FF0000" size="2">Enter Value</font>';
	}
if(empty($cdate)){
	$msg7 = '<font color="#FF0000" size="2">Enter Value</font>';
	}
	if(empty($periodcov)){
	$msg8 = '<font color="#FF0000" size="2">Enter Value</font>';
	}
if(empty($description)){
	$msg9 = '<font color="#FF0000" size="2">Enter Value</font>';
	}
if(empty($amount)){
	$msg10 = '<font color="#FF0000" size="2">Enter Value</font>';
	}
if(empty($wht)){
	$msg11 = '<font color="#FF0000" size="2">Enter Value</font>';
	}
if(empty($vat)){
	$msg12 = '<font color="#FF0000" size="2">Enter Value</font>';
	}

else{
$user_id = $id;

$sql = "INSERT INTO whtvat_voucher(user_id, agent, date, cname, tin, address, inv_no, cdate, periodcov, description, amount, wht, vat, audit, prep)  VALUES('$user_id', '$agent', '$date', '$cname', '$tin', '$address', '$invnum', '$cdate', '$periodcov', '$description', '$amount', '$wht', '$vat', '$audit', '$prep')";
$query = mysqli_query($connection, $sql) or die(mysql_error());
if(mysqli_query($connection,$query)){
$msg = '<font color="#FF0000" size="2">Voucher Creation Error</fon t>';
}else
{
	$msg = '<font color="#FF0000" size="4">Voucher Creation Succesful</font>';
}
  
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contract WHT and VAT Page</title>
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
	include("include/whtvat_menu.php");

}
?>
<div class="container"  style="max-width:700px;">  
<h3 >Enter WHT and VAT Details</h3><h4><?php if(isset($msg)){echo $msg;} ?></h4>  
  <div class="row" style="background-color:#fff; padding:10px; border:#ddd thin solid; border-radius:1px; border-top:#3090c7 thick solid;" >
  <hr />
   <form role="form" action="wht_vat.php" method="POST">
    
    <div class="col-sm-6">
    <div class="form-group"> 
    <label>Tax Agent</label> <?php if(isset($msg1)){echo $msg1;} ?>
    <input type="text" name="agent" class="form-control" />
     </div>
    </div>
      
      <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Transaction Date</label> <?php if(isset($msg2)){echo $msg2;} ?>
    <input type="text" name="date" placeholder="12/09/2011" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6">
    <div class="form-group"> 
    <label>Beneficiary Name</label> <?php if(isset($msg3)){echo $msg3;} ?>
    <input type="text" name="name" placeholder="" class="form-control" />
     </div>
    </div>
    
    <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Beneficiary Tin</label> <?php if(isset($msg4)){echo $msg4;} ?>
    <input type="text" name="tin" class="form-control" />
     </div>
	</div>
    
     <div class="col-sm-12" > 
    <div class="form-group"> 
    <label>Beneficiary Address</label><?php if(isset($msg5)){echo $msg5;} ?> 
    <textarea name="address" class="form-control" ></textarea>
     </div>
	</div>
    
    <div class="col-sm-4">
    <div class="form-group"> 
    <label>Invoice No.</label> <?php if(isset($msg6)){echo $msg6;} ?>
    <input type="text" name="invnum" placeholder="" class="form-control" />
     </div>
    </div>
    
     <div class="col-sm-4" > 
    <div class="form-group"> 
    <label>Contract Date</label> <?php if(isset($msg7)){echo $msg7;} ?>
    <input type="text" name="cdate" placeholder="12/09/2011" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-4" > 
    <div class="form-group"> 
    <label>Period Covered</label> <?php if(isset($msg8)){echo $msg8;} ?>
    <input type="text" name="periodcov" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-12" > 
    <div class="form-group"> 
    <label>Contract Description</label> <?php if(isset($msg9)){echo $msg9;} ?>
    <textarea name="description" class="form-control" ></textarea>
     </div>
	</div>
    
    <div class="col-sm-4">
    <div class="form-group"> 
    <label>Contract Amount</label> <?php if(isset($msg10)){echo $msg10;} ?>
    <input type="text" name="amount" placeholder="" class="form-control" />
     </div>
    </div>
    
     <div class="col-sm-4" > 
    <div class="form-group"> 
    <label>WHT(%)</label> <?php if(isset($msg11)){echo $msg11;} ?>
    <input type="text" name="wht" placeholder="" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-4" > 
    <div class="form-group"> 
    <label>VAT(%)</label> <?php if(isset($msg12)){echo $msg12;} ?>
    <input type="text" name="vat" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Audited By</label> 
    <input type="text" name="audit" placeholder="" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Prepared By</label> 
    <input type="text" name="prep" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-12 text-right">
    <input type="submit" name="submit" value="Submit" class="btn btn-primary"   />
    </div>
    </form>
    </div>
    </div>

<div class="container text-center" style=" height:100px; width:100%; padding:30px; margin-top:5px;">
  <p>&copy;Copyright <?php echo date('Y');?>. All rights reserved. FCT - Secondary Education Board.</p>  
  
</div>


</body>
</html>
