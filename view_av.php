<style>
page[size="A4"] {
  background: white;
 /*width: 21.4cm;
  height: 30cm;*/
  display: block;
  margin: 0px auto;
  padding:2px;
    font-size:12px;

}
@media print {
  body, page[size="A4"] {
	  
	  border:none;
	  margin-top:0px;
	  margin-bottom:0px;
    box-shadow: 0;
	  font-size:12px;

  }
}
</style>

<?php  session_start();?>

<?php 
// connect to mysql server & select database
include("include/connection.php"); 
?>

<?php include('include/authenticate_user.php'); ?>
<?php include('include/functions.php'); ?>

<?php
if(isset($_GET['ret_no']))
$ret_no = $_GET['ret_no'];


$sql = "SELECT * FROM adjustmet_voucher WHERE ret_no = '$ret_no'";
$result = mysqli_query($connection,$sql) or die(mysql_error());
$record = mysqli_fetch_array($result);
	
	

?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
  <head>
    <meta charset="UTF-8">
    <title>User | Print Adjustment</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
   <link href="styles/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="styles/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <style>
	
	.border td,th{border: 1px solid #333; padding:2px;}
	.border{ border-bottom:1px solid #333;}
	
		.border1 td,th{ padding:5px; height:50px;}
	.border1{ border:0px solid #000;}
	
	.border11 td,th{ padding:5px;}
	.border11{ border:1px solid #000;}
    
    </style>
  </head>
  <body>
  <page size="A4">
<div style="margin:auto;  max-width:1000px; margin-top:0px; margin-bottom:0px; ">
        <div style="text-align:center;  font-size:20px; font-weight:bold; text-transform:uppercase;">FCT - Education Resource Centre</div>   
             <div style="text-align:center;  font-size:16px; font-weight:bold; text-transform:uppercase;">Fedral capital territory administration</div>
        <div style="text-align:center;  font-size:19px; font-weight:100; text-transform:uppercase; font-weight:bold; padding:5px;">Adjustment Voucher</div>

<div class="row" style="margin-top:20px;">
<div class="col-sm-12"><strong>Name of Beneficiary</strong> <b style="font-size:17px; text-transform:uppercase;"><?php echo $record['payee']; ?></b></div>
</div>

<div class="row" style="margin-top:5px; margin-bottom:15px;">
<div class="col-sm-12" >
    <table  border="1" class="border" style="width:100%;">
  <tr style="text-align:center; text-transform:capitalize; font-weight:bold; font-size:14px;">
    <td>&nbsp;Station</td>
    <td>&nbsp;Year</td>   
     <td>&nbsp;Month</td>
    <td>&nbsp;Retirement Number</td>

  </tr>
  <tr style="text-align:center; text-transform:capitalize; font-weight:bold;">
    <td>&nbsp;<?php echo $record['station']; ?></td>
    <td>&nbsp; <?php echo $record['year']; ?></td>    
    <td>&nbsp; <?php echo $record['month']; ?></td>
    <td>&nbsp; <?php echo $record['ret_no']; ?></td>

  </tr>

</table>
    </div></div>
 
 <div class="row" style="margin-top:5px; margin-bottom:15px; ">
 	<div class="col-sm-12">
 <table align="center" border="1" class="border" style="width:100%; margin-top:1px;">
  <tr style="font-weight: bold; font-size:14px;">
    <td colspan="2" width="60%" align="center">&nbsp;DETAILS</td>
    <td width="20%" align="center">&nbsp;DEBIT(₦)</td>
    <td width="20%" align="center">&nbsp;CREDIT(₦)</td>
  </tr>
  <tr style=" height:200px; font-size:14px;">
    <td colspan="2">&nbsp; <?php echo nl2br($record['details']); ?></td>
    <td align="center" style="font-weight: bold;">&nbsp;<?php echo number_format($record['dr'],2); ?> </td>
    <td align="center" style="font-weight: bold;">&nbsp; <?php echo number_format($record['cr'],2); ?></td>
  </tr>
    <tr style=" font-size:14px;">
    <td width="50%"><b> <?php echo digits_to_words($record['cr']); ?></b></td>
    <td width="10%" align="center">&nbsp;<b>TOTAL(₦)</b> </td>
	<td align="center" style="font-weight: bold;">&nbsp;<?php echo number_format($record['dr'],2); ?> </td>
    <td align="center" style="font-weight: bold;">&nbsp; <?php echo number_format($record['cr'],2); ?></td>
  </tr>

</table>
	</div>
</div>

<div class="row" style="margin-top:5px; margin-bottom:15px;">
	<div class="col-sm-12" style="font-weight:bold; line-height:30px; font-size:12px;">
<table align="center" border="0" class="border11" style="width:100%; margin-top:0px;">
  <tr style=" font-size:14px;">
    <td ><strong>Naration</strong>
    </td>
    </tr>
	<tr>
    <td style=" height:100px; font-size:14px;"><?php echo nl2br($record['naration']); ?></td>
  </tr>

</table>
	</div>
    
	<div class="col-sm-12" style=" font-size:14px;">
    <table align="center" border="0" class="border1"  style=" margin-top:2px; width:100%">
  <tr>
    <td width="30%"><strong>Prepared By</strong> </td><td width="30%"> &nbsp; &nbsp;<?php echo $record['prep_by']; ?></td><td width="40%">&nbsp;</td>
  </tr>
    <tr>
    <td width="30%"><strong>Checked By</strong></td>    <td width="30%">&nbsp; &nbsp;<?php echo $record['check_by']; ?></td><td width="40%">&nbsp;</td>
  </tr>
      
  <tr>
    <td width="30%"><strong>Signed By</strong> </td><td width="30%" align="left">&nbsp; &nbsp;<?php echo $record['sign_by']; ?></td><td width="40%">&nbsp;</td>
  </tr>
</table>

	</div>
</div>

<div class="row" style="margin-top:5px; margin-bottom:2px;">
	<div class="col-sm-12">
<p style="text-align:center;">(Officer Controlling Expenditure)</p>
	</div>
</div>

<!--<p class="no-print" style="text-align:center;"><button onclick="myFunction()">Print this page</button></p>-->

<script>
function myFunction() {
    window.print();
}
</script>
 </div>
 </page>
  </body>
 </html> 

