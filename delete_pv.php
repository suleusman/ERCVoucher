<?php session_start();?>
<?php include("include/connection.php");?>
<?php include("include/authenticate_user.php");?>

<?php
 
  if(isset($_GET['vnum'])!="")
  {
  $vnum=$_GET['vnum'];
  $sql = "DELETE FROM payment_voucher WHERE vnum='$vnum'";
$query = mysqli_query($connection, $sql) or die(mysql_error());
  if($query)
  {
      header("Location:list_pv.php");
  }
  else
  {
      echo mysql_error();
  }
  }
  ob_end_flush();
?>
}
