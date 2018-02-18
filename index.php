<?php 
session_start();
include("include/connection.php");
?>
<?php 
if(isset($_POST['sign_in'])){
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	
	//Fetch user from data base
	$sql = "SELECT * FROM user_login WHERE username = '$username' AND password = '$password' LIMIT 1";
	$query = mysqli_query($connection,$sql) or die(mysqli_error());
	$data = mysqli_fetch_array($query);
	
	if(mysqli_num_rows($query)== true){
		
		if($data['user_type']==1){
		$_SESSION['username'] = $username;
		header("location:admin_home.php");
		}else
		if($data['user_type']==2){
		$_SESSION['username']=$username;
		header("location:pv_home.php");
		}else
		if($data['user_type']==3){
		$_SESSION['username']=$username;
		header("location:ca_home.php");
		}else
		if($data['user_type']==4){
		$_SESSION['username']=$username;
		header("location:av_home.php");
		}else
		if($data['user_type']==5){
		$_SESSION['username']=$username;
		header("location:wht_vat_home.php");
		}else
		{
		$_SESSION['username']='';
	$_SESSION['password']='';
	
	$error = "Invalid Username and Password";
		}
		
	}else
	$_SESSION['username']='';
	$_SESSION['password']='';
	
	$error = "Invalid Username and Password";
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FCT ERC Voucher Payment System</title>
<style>
body { 
  background: url(images/b2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
<link href="styles/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="styles/css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container" style="margin:auto; max-width:1000px; background-color:transparent; text-align:center;" >
<div class="col-sm-12">
<img src="images/erc.jpg" width="120" height="120" class="img-circle" style="padding:2px; border:#FFF thin solid; background-color:#fff; margin-top:5px;" />
 <div style="text-align:center;  font-size:24px; font-weight:bold; text-transform:uppercase; color:#fff;">FCT - Education Resource Centre</div>   
<div style="text-align:center;  font-size:21px; font-weight:bold; text-transform:uppercase; color:#fff;">Education Secretariat</div>
<h2 style="color:#eee; font-weight:bold; text-transform:uppercase; font-size:20px;">Payment System Solution 2.0</h2>
</div>
</div>

<div class="container" style="margin:auto; width:100%;">
<div class="col-sm-12">
<div style="margin:auto; font-weight:bold; max-width:500px; border:thin #ccc solid; min-height:300px; border-radius:5px; background-color:#eee; padding-left:50px; padding-right:50px;">
<form action="index.php" method="post"  >
<div class="row" style="text-align:center;">
<h1 style=" font-size:28px; font-weight:bold; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">User Log In <img src="images/key2.jpg"  height="70" width="70" style=" margin:10px; "  class="img-rounded" /></h1>
<h4 style="color:red;"><?php if(isset($error)){echo $error; }?></h4>
 	</div>
    <div class="form-group has-feedback">
  <input type="text"  name="username" placeholder="Enter Username" class="form-control" />
      <span class="glyphicon glyphicon-user form-control-feedback" style="color:#888;"></span>

   </div>
            
  <div class="form-group has-feedback">
  <input type="password"  name="password" placeholder="Enter Password"  class="form-control" />
    <span class="glyphicon glyphicon-lock form-control-feedback" style="color:#888;"></span>
  </div>
              
				<div class="form-group"> <input  style="font-weight:bolder; font-size:16px;" type="submit" value="Sign In" name="sign_in" class="btn btn-primary form-control" />
                </div>
</form>
</div>
</div>
</div>
<?php include("include/footer.php"); ?>

</body>
</html>