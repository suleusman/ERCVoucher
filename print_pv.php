<?php session_start();?>
<?php 
include("include/connection.php");
include("include/authenticate_user.php");

?>
<?php
if(isset($_POST['sign_in'])){
	$vnum = $_POST['vnum'];	
	$_SESSION['vnum'] = $vnum;
	
if(empty($vnum)){
	$msg = '<font color="#F00" size="2">Voucher Number cannot be Empty</font>';
	}else
	{
	$sql = "SELECT * FROM payment_voucher WHERE vnum = '$vnum'";
		// If the result matched $username & $password, then table row must be equal to 1;
	$result = mysqli_query($connection,$sql) or die(mysql_error());
	$record = mysqli_fetch_array($result);
	
	if(mysqli_num_rows($result) > 0){
			header("location: view_pv.php");
    			} 
	
	else{
		$msg = "Invalid Voucher Number!";
		}

	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Print Payment Voucher</title>
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
?>

<div class="container"  style="max-width:500px;">  
<h3 >Print Payment Voucher</h3> 
  <div class="row" style="background-color:#fff;  border:#ddd thin solid;  border-top:#3090c7 thick solid;" >
  <hr />
    <h4 style="color:#f00;" ><?php if(isset($msg)){echo $msg;}?></h4> 
  <form action="print_pv.php" method="post" target="_new"  style="padding:40px;" >
    <div class="form-group has-feedback">
  <label class=" form-control btn btn-danger" style="font-weight:bold; text-transform:uppercase; background-color:#F62817;">Enter Voucher Number</label>
  			</div>
            
  			 <div class="form-group has-feedback">
  <input type="text"  name="vnum" placeholder="Voucher Number"  class="form-control" />
    <span class="glyphicon glyphicon-search form-control-feedback" style="color:#888;"></span>

			  </div>
              
				<div class="form-group"> 
                <input  style="text-transform:uppercase;" type="submit" value="Print" name="sign_in" class="btn btn-primary form-control" />
                </div>
</form>
  </div>
</div>

<?php include("include/footer.php")?>

</body>
</html>
