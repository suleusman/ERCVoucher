<style>
page[size="A4"] {
  background: white;
/* width: 21.4cm;
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

<?php include('include/functions.php'); ?>

<?php
if(isset($_GET['pvnum']))
$pvnum = $_GET['pvnum'];

$sql = "SELECT * FROM cash_advance WHERE pv_num = '$pvnum'";
$result = mysqli_query($connection,$sql) or die(mysql_error());
$record = mysqli_fetch_array($result);
	
	

?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
  <head>
    <meta charset="UTF-8">
    <title>User | Print Cash Advance</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
   <link href="styles/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="styles/css/bootstrap.css" rel="stylesheet" type="text/css" />
   <style>
	.border td,th{border: 1px solid #333; padding:2px;}
	.border{ border-bottom:1px solid #333;}
	
		.border1 td,th{ padding-bottom:30px; padding-left:5px; padding-top:3px;}
	.border1{ border:1px solid #000;}
	
	.border11 td,th{ padding:5px;}
	.border11{ border:1px solid #000;}
    
    </style>
  </head>
  <body>
  <page size="A4">
<div style="margin:auto;  max-width:1000px; margin-top:0px; margin-bottom:0px;  padding:2px;">
          <div style="text-align:center;  font-size:20px; font-weight:bold; text-transform:uppercase;">FCT - Education Resource Centre</div>   
             <div style="text-align:center;  font-size:16px; font-weight:bold; text-transform:uppercase;">Fedral capital territory administration</div>
       
       <div style="text-align:center;  font-size:19px; font-weight:100; margin-bottom:20px; text-transform:uppercase; font-weight:bold; padding:5px;">Cash Advance</div>


<div class="row" style="margin-top:5px; margin-bottom:15px;">
<div class="col-sm-12">
    <table  border="1" class="border" style="width:100%;">
  <tr style=" text-transform:capitalize; ">
    <td style=" text-transform:uppercase; ">&nbsp;<strong>PV-NO.:</strong> &nbsp;&nbsp;&nbsp;<?php echo $record['pv_num']; ?> </td>
    <td>&nbsp;<strong>Date: </strong>&nbsp;&nbsp;&nbsp;<?php echo $record['date']; ?></td>  
  </tr>
  <tr>
    <td >&nbsp;<strong>Name of Claimant:</strong> <span style=" text-transform:uppercase;"> &nbsp;&nbsp;&nbsp;<?php echo $record['name']; ?> </span></td>
    <td >&nbsp;<strong>Department:</strong> &nbsp;&nbsp;&nbsp;<span style=" text-transform:uppercase;"><?php echo $record['dept']; ?></span></td>  
  </tr>
</table>
    </div></div>
 
 <div class="row" style="margin-top:5px; margin-bottom:15px;">
 	<div class="col-sm-12">
 <table align="center" border="0" class="border11" style="width:100%; margin-top:1px;">
  
  <tr style=" height:100px;">
    <td  width="25%" align="">&nbsp; <span style="font-weight:bold; text-align: right; font-size:16px;">Please Advance:</span></td>
    <td  width="20%"  style="font-weight:bold; text-align:left;">&nbsp;<?php echo '₦'.number_format($record['amount'],2); ?> </td>
    <td width="55%" ><span style="font-weight: bold;">Head/Subhead:</span> &nbsp; <?php echo $record['head']; ?></td>
  </tr>
    <td  colspan="3"><b> <?php echo digits_to_words($record['amount']); ?></b></td>
  </tr>

</table>
	</div>
</div>

<div class="row" style="margin-top:0px; margin-bottom:15px;">
	<div class="col-sm-12" style="font-weight:bold; line-height:30px; font-size:12px;">
<table align="center" border="0" class="border11" style="width:100%; margin-top:0px;">
  <tr>
    <td ><span style="font-weight: bold; font-size:16px;">The Purpose of Advance:</span>
    </td>
    </tr>
	<tr>
    <td style=" height:200px"><?php echo nl2br($record['purpose']); ?></td>
  </tr>

</table>
	</div>
    
	<div class="col-sm-12">
    <table align="center" border="0" class="border1"  style=" margin-top:15px; width:100%">
  <tr>
    <td width="50%"><strong>Authorized By</strong>&nbsp;&nbsp;<span style=" text-transform:uppercase;"><?php echo $record['auth1']; ?></span></td>
        <td width="50%"><strong>Authorized By</strong>&nbsp;&nbsp;<span style=" text-transform:uppercase;"><?php echo $record['auth2']; ?></span></td>
   </tr>
   <tr>
    <td><strong>Signature</strong> ......................</td>     <td><strong>Signature</strong> ......................</td>
    </tr>
    <tr>
    <td><strong>Date</strong>&nbsp;&nbsp;<?php echo $record['date1']; ?></td>    <td><strong>Date</strong>&nbsp;&nbsp;<?php echo $record['date2']; ?></td>
  </tr>
 
</table>

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

