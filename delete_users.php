<?php session_start();?>
<?php include("include/connection.php");?>
<?php include("include/authenticate_user.php");?>

<?php
 
  if(isset($_GET['username'])!="")
  {
  $username=$_GET['username'];
  $sql = "DELETE FROM user_login WHERE username='$username'";
$query = mysqli_query($connection, $sql) or die(mysql_error());
  if($query)
  {
      header("Location:view_user.php");
  }
  else
  {
      echo mysql_error();
  }
  }
  ob_end_flush();
?>
}
