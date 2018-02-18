<?php session_start();?>
<?php include("include/connection.php");?>
<?php include("include/authenticate_user.php");?>

<?php
 
  if(isset($_GET['pvnum'])!="")
  {
  $pvnum=$_GET['pvnum'];
  $sql = "DELETE FROM cash_advance WHERE pv_num='$pvnum'";
$query = mysqli_query($connection, $sql) or die(mysql_error());
  if($query)
  {
      header("Location:list_ca.php");
  }
  else
  {
      echo mysql_error();
  }
  }
  ob_end_flush();
?>
}
