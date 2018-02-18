<?php session_start();?>
<?php include("include/connection.php");?>
<?php include("include/authenticate_user.php");?>

<?php
if(isset($_POST['login'])){

$head = $_POST['head'];	
$subhead = $_POST['subhead'];
$date = $_POST['date'];
$gross = $_POST['gross'];
$vnum = $_POST['vnum'];
$ccode = $_POST['ccode'];
$vat1 = $_POST['vat'];
$wht1 = $_POST['wht'];
$amount = $gross - (float)($gross/100)*($vat1+$wht1);
$vat = (float)($gross/100)*$vat1;
$wht = (float)($gross/100)*$wht1;
$payee = $_POST['payee'];
$address = mysqli_real_escape_string($connection, $_POST['address']);
$desc = mysqli_real_escape_string($connection, $_POST['description']);

if(empty($head)){
	$msg1 = '<font color="#FF0000" size="2">Enter Head</font>';
				}
	if(empty($subhead)){
	$msg2 = '<font color="#FF0000" size="2">Enter SubHead</font>';
						}
if(empty($date)){
	$msg3 = '<font color="#FF0000" size="2">Enter Date</font>';
				}
if(empty($gross)){
	$msg4 = '<font color="#FF0000" size="2">Enter Gross</font>';
				}
if(empty($vnum)){
	$msg5 = '<font color="#FF0000" size="2">Enter Voucher Number</font>';
				}
if(empty($ccode)){
	$msg6 = '<font color="#FF0000" size="2">Enter Classification Code</font>';
				}
if(empty($vat1)){
	$msg7 = '<font color="#FF0000" size="2">Enter Vat</font>';
				}
if(empty($wht1)){
	$msg8 = '<font color="#FF0000" size="2">Enter wht</font>';
				}
if(empty($payee)){
	$msg9 = '<font color="#FF0000" size="2">Enter Payee</font>';
				}
	
if(empty($address)){
	$msg10 = '<font color="#FF0000" size="2">Enter Address</font>';
				}
if(empty($desc)){
	$msg11 = '<font color="#FF0000" size="2">Enter Description</font>';
				}
	else{
$user_id = $id;
$username = $_SESSION['username'];

$sql = "INSERT INTO payment_voucher(user_id, head, subhead, date, gross, amount, vnum, ccode, vat, wht, payee, payee_address, description)  VALUES('$username', '$head', '$subhead', '$date','$gross', '$amount', '$vnum', '$ccode', '$vat','$wht', '$payee', '$address', '$desc')";
$query = mysqli_query($connection, $sql) or die(mysql_error());
if(mysqli_query($connection,$query)){
$msg = '<font color="#FF0000" size="2">Error in Voucher Creation</font>';
}
else{
$msg = '<font color="#FF0000" size="2"> Voucher Creation Succesful</font>';
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
$user_id = $id;
if($user_id ==1){
include("include/admin_menu.php");
}
else
{
	include("include/pv_menu.php");

}
?><div class="container"  style="max-width:700px;">  
<h3 >Enter Payment Details</h3> <h4><?php if(isset($msg)){ echo "  ".$msg;}?> </h4>
  <div class="row" style="background-color:#fff; padding:10px; border:#ddd thin solid; border-radius:1px; border-top:#3090c7 thick solid;" >
  <hr />
  <form  action="pv.php" method="post">
    <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Head</label><?php if(isset($msg1)){ echo $msg1;} ?> 
    <input type="text" name="head" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6">
    <div class="form-group"> 
    <label>SubHead</label> <?php if(isset($msg2)){ echo $msg2;} ?>
    <input type="text" name="subhead" class="form-control" />
     </div>
    </div>
      
      <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Date</label> <?php if(isset($msg3)){ echo $msg3;} ?>
    <input type="text" name="date" placeholder="12/03/2010" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6">
    <div class="form-group"> 
    <label>Gross</label><?php if(isset($msg4)){ echo $msg4;} ?> 
    <input type="text" name="gross" placeholder="452345.63" class="form-control" />
     </div>
    </div>
    
    <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Voucher Number</label> <?php if(isset($msg5)){ echo $msg5;} ?>
    <input type="text" name="vnum" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6">
    <div class="form-group"> 
    <label>Classification Code</label> <?php if(isset($msg6)){ echo $msg6;} ?>
    <input type="text" name="ccode" class="form-control" />
     </div>
    </div>
    
    <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>VAT(%)</label> <?php if(isset($msg7)){ echo $msg7;} ?>
    <input type="text" name="vat" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6">
    <div class="form-group"> 
    <label>WHT(%)</label><?php if(isset($msg8)){ echo $msg8;} ?> 
    <input type="text" name="wht" class="form-control" />
     </div>
    </div>
    
    <div class="col-sm-12" > 
    <div class="form-group"> 
    <label>Payee</label> <?php if(isset($msg9)){ echo $msg9;} ?>
    <input type="text" name="payee" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-12">
    <div class="form-group"> 
    <label>Payee Address</label> <?php if(isset($msg10)){ echo $msg10;} ?>
    <textarea name="address" class="form-control" ></textarea>
     </div>
    </div>
    
    <div class="col-sm-12" > 
    <div class="form-group"> 
    <label>Detail Description of Service/Work</label><?php if(isset($msg11)){ echo $msg11;} ?> 
    <textarea name="description" class="form-control" ></textarea>
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
