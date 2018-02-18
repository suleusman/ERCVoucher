<?php session_start();?>
<?php include("include/connection.php");?>
<?php include("include/authenticate_user.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>List of Registered Payment Voucher</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link hrel="styles/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="styles/css/bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="styles/js/jQuery-2.1.4.min.js"></script>
  <script src="styles/js/bootstrap.min.js"></script>
  <?php include("include/bodycss.php")?>

<style>

table, th, td {
    border: 0px solid #428bca;
    border-collapse: collapse;
}
td {
    padding: 10px;
	
}
th {
    padding: 10px;
    text-align: center;
}
table#mytable tr:nth-child(even) {
    background-color: #eee;
}
table#mytable tr:nth-child(odd) {
   background-color:#fff;
}
table#mytable th	{
    background-color:#428bca;
    color: white;
}
</style>

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
<div class="container"  style="max-width:1200px;">  
<h3 >List of Registered Payment Voucher</h3>
  <div class="row" style="background-color:#fff; padding:5px; border:#ddd thin solid; border-radius:1px; border-top:#3090c7 thick solid;" >
  <table width="100%" border="0" class="table" id="mytable">
  <tr style="font-weight:bold;"><th>S/No</th><th>Head</th><th>Subhead</th><th>Classification Code</th><th>Payee</th><th>Date</th><th>Voucher No.</th><th>Action</th></tr>
    
	<?php
$sql = "SELECT * FROM payment_voucher ORDER BY date";
$query = mysqli_query($connection, $sql) or die(mysql_error());

if(mysqli_num_rows($query) > 0){
	//output result
	while(	$list = mysqli_fetch_array($query)){
		$count = 0;
	$type = $list['user_id'];
	if($type==1){$user_post = "Admin";
	}else
	if($type==2){$user_post = "Payment Voucher";
	}else
	if($type==3){$user_post = "Cash Advance";
	}else
	if($type==4){$user_post = "Adjustment Voucher";
	}else
	if($type==5){$user_post = "Contract WHT & VAT";
	}
	$vnum = $list['vnum'];
	?>
    
	 <tr>
	<td><?php echo $list['pay_id']; ?></td>
	<td><?php echo $list['head']; ?></td>
	<td><?php echo $list['subhead'];?></td>
	<td><?php echo $list['ccode'];?> </td> 
	<td><?php echo $list['payee'];?> </td>
	<td><?php echo $list['date'];?> </td> 
	<td><?php echo $vnum ;?></td> 
   <td> <a href="view_pv.php?vnum=<?php echo $vnum; ?>" target="_new"> View | </a> 
	 <a href="delete_pv.php?vnum=<?php echo $vnum; ?>" target="_new" onclick="return confirm('Are you sure you wish to delete this Record?')" > Delete </a>
	</td>
	</tr>
    <?php
	
}	
	
}else
echo "No Payment Voucher List to view"; 
?>
   </table>
    </div>
    </div>

<?php include("include/footer.php")?>

</body>
</html>
