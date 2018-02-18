<?php  session_start();?>
<?php 
// connect to mysql server & select database
include("include/connection.php"); 
?>

<?php include('include/authenticate_user.php'); ?>

<?php

if(isset($_POST['login'])){

$name =  mysqli_real_escape_string($connection, $_POST['name']);	
$pvnum =  mysqli_real_escape_string($connection, $_POST['pvnum']);
$formno =  mysqli_real_escape_string($connection, $_POST['fno']);
$amount =  mysqli_real_escape_string($connection, $_POST['amount']);
$dept =  mysqli_real_escape_string($connection, $_POST['dept']);
$date =  mysqli_real_escape_string($connection, $_POST['date']);
$head =  mysqli_real_escape_string($connection, $_POST['head']);
$purpose =  mysqli_real_escape_string($connection, $_POST['purpose']);
$auth1 =  mysqli_real_escape_string($connection, $_POST['auth1']);
$date1 =  mysqli_real_escape_string($connection, $_POST['date1']);
$auth2 =  mysqli_real_escape_string($connection, $_POST['auth2']);
$date2 =  mysqli_real_escape_string($connection, $_POST['date2']);

//$address = mysqli_real_escape_string($connection, $_POST['address']);
//$desc = mysqli_real_escape_string($connection, $_POST['desc']);

if(empty($name)){
	$msg1 = '<font color="#FF0000" size="2">Enter Claimant Name</font>';
	}
	if(empty($pvnum)){
	$msg2 = '<font color="#FF0000" size="2">Enter PV Number</font>';
	}

if(empty($amount)){
	$msg4 = '<font color="#FF0000" size="2">Enter Amount</font>';
	}
if(empty($dept)){
	$msg5 = '<font color="#FF0000" size="2">Enter Departmentt</font>';
	}
if(empty($date)){
	$msg6 = '<font color="#FF0000" size="2">Enter Date</font>';
	}
if(empty($head)){
	$msg7 = '<font color="#FF0000" size="2">Enter Head and Subhead</font>';
	}
	if(empty($purpose)){
	$msg8 = '<font color="#FF0000" size="2">Enter Purpose</font>';
	}



else{
//$rate = number_format((float)$rate, 2);
$user_id = $id;

$sql = "INSERT INTO cash_advance(user_id, name, pv_num, form_no, amount, dept, date, head, purpose,  auth1, date1, auth2, date2)  VALUES('$user_id', '$name', '$pvnum', '$formno', '$amount', '$dept', '$date', '$head', '$purpose', '$auth1', '$date1', '$auth2', '$date2')";
$query = mysqli_query($connection, $sql) or die(mysql_error());
if(mysqli_query($connection,$query)){
$msg = '<font color="#FF0000" size="2">Error in Voucher Creation</font>';
}
else{
$msg = '<font color="#FF0000" size="4">Cash Advance Creation Succesful </font>';}
  }
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cash Advance Page</title>
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
	include("include/ca_menu.php");

}
?>

<div class="container"  style="max-width:700px;">  
<h3 >Enter Cash Advance Details</h3>   <h4><?php if(isset($msg)){echo $msg;}?></h4>      
  
  <div class="row" style="background-color:#fff; padding:10px; border:#ddd thin solid; border-radius:1px; border-top:#3090c7 thick solid;" >
  <hr />
  <form  action="" method="post">
    <div class="col-sm-12" > 
    <div class="form-group"> 
    <label>Name of Claimant:</label> <?php if(isset($msg1)){echo $msg1;}?>
    <input type="text" name="name" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6">
    <div class="form-group"> 
    <label>PV Number:</label>  <?php if(isset($msg2)){echo $msg2;}?>
    <input type="text" name="pvnum" class="form-control" />
     </div>
    </div>
      
      <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Form Number:</label>  
    <input type="text" name="fno" placeholder="" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6">
    <div class="form-group"> 
    <label>Amount:</label>  <?php if(isset($msg4)){echo $msg4;}?>
    <input type="text" name="amount" placeholder="452345.63" class="form-control" />
     </div>
    </div>
    
    <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Department:</label>  <?php if(isset($msg5)){echo $msg5;}?>
    <input type="text" name="dept" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6">
    <div class="form-group"> 
    <label>Transaction Date:</label>  <?php if(isset($msg6)){echo $msg6;}?>
    <input type="text" name="date" placeholder="13/01/1989" class="form-control" />
     </div>
    </div>
     <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Head/Subhead:</label> <?php if(isset($msg7)){echo $msg7;}?> 
    <input type="text" name="head" class="form-control" />
     </div>
	</div>
    <div class="col-sm-12" > 
    <div class="form-group"> 
    <label>Purpose of Payment:</label> <?php if(isset($msg8)){echo $msg8;}?>
     <textarea name="purpose" class="form-control" ></textarea>
     </div>
	</div>
    
    <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Authoring 1:</label>  
    <input type="text" name="auth1" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6">
    <div class="form-group"> 
    <label>Date 1:</label> 
    <input type="text" name="date1" placeholder="12/06/2010" class="form-control" />
     </div>
    </div>
    
    
    <div class="col-sm-6" > 
    <div class="form-group"> 
    <label>Authoring 2:</label>  
    <input type="text" name="auth2" class="form-control" />
     </div>
	</div>
    
    <div class="col-sm-6">
    <div class="form-group"> 
    <label>Date 2:</label>  
    <input type="text" name="date2" placeholder="12/06/2010" class="form-control" />
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
