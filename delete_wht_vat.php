<?php session_start();?>
<?php include("include/connection.php");?>
<?php include("include/authenticate_user.php");?>

<?php
 
  if(isset($_GET['inv_no'])!="")
  {
  $inv_no=$_GET['inv_no'];
  $sql = "DELETE FROM whtvat_voucher WHERE inv_no='$inv_no'";
$query = mysqli_query($connection, $sql) or die(mysql_error());
  if($query)
  {
      header("Location:list_wht_vat.php");
  }
  else
  {
      echo mysql_error();
  }
  }
  ob_end_flush();
?>
}
