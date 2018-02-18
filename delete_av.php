<?php session_start();?>
<?php include("include/connection.php");?>
<?php include("include/authenticate_user.php");?>

<?php
 
  if(isset($_GET['ret_no'])!="")
  {
  $ret_no=$_GET['ret_no'];
  $sql = "DELETE FROM adjustmet_voucher WHERE ret_no='$ret_no'";
$query = mysqli_query($connection, $sql) or die(mysql_error());
  if($query)
  {
      header("Location:list_av.php");
  }
  else
  {
      echo mysql_error();
  }
  }
  ob_end_flush();
?>
}
