<style>
page[size="A4"] {
  background: white;
 /* width: 21cm;
  height: 29.7cm;*/
  display: block;
  margin: 0px auto;
  padding:2px;

  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
@media print {
  body, page[size="A4"] {
	  border:none;
	  margin-top:0px;
	  margin-bottom:0px;
    box-shadow: 0;
  }
}
</style>

<?php  session_start();?>

<?php 
// connect to mysql server & select database
include("include/connection.php"); 
?>

<?php include('include/authenticate_admin.php'); ?>
<?php include('include/functions.php'); ?>

<?php
	$vnum = $_SESSION['vnum'];

$sql = "SELECT * FROM payment_info WHERE vnum = '$vnum'";
$result = mysqli_query($connection,$sql) or die(mysql_error());
$record = mysqli_fetch_array($result);
	
	

?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
  <head>
    <meta charset="UTF-8">
    <title>Admin | View Recurrent Expenditure</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php  include("include/styles.php"); ?>
    <style>
	
	.border td,th{border: 1px solid #333; padding:2px;}
	.border{ border-bottom:1px solid #333;}
	
		.border1 td,th{ padding:5px;}
	.border1{ border:2px solid #000;}

    
    </style>
  </head>
  <body>
  <page size="A4">
<div style="margin:auto;  max-width:1000px; margin-top:0px; margin-bottom:0px; border: thin solid #000; padding:2px;">
        <div style="text-align:center;  font-size:24px; font-weight:bold;">FCT EDUCATION RESOURCE CENTRE</div>   
             <div style="text-align:center;  font-size:17px; font-weight:bold; text-transform:uppercase;">Fedral capital territory administration</div>
        <div style="text-align:center;  font-size:14px; font-weight:bold; text-transform:uppercase;">federal government of nigeria <br></div>
        <div style="text-align:center;  font-size:20px; font-weight:100; text-transform:uppercase; font-weight:bold;">Payment Voucher</div>

<div class="row" style="margin-top:10px;">
<div class="col-sm-4"><b style="font-size:20px; text-transform:uppercase;"><?php echo $record['vnum']; ?></b></div>
<div class="col-sm-8">Check and passed for payment at &nbsp;&nbsp;&nbsp; <strong>ABUJA</strong></div>
</div>

<div class="row" style="margin-top:5px; margin-bottom:2px;">
<div class="col-sm-8">
    <table  border="1" class="border" style="width:100%;">
  <tr style="text-align:center; text-transform:capitalize; font-weight:bold;">
    <td>&nbsp;Date</td>
    <td>&nbsp;Amount</td>
  </tr>
  <tr style="text-align:center; text-transform:capitalize; font-weight:bold;">
    <td>&nbsp;<?php echo $record['date']; ?></td>
    <td>&nbsp; <?php echo number_format($record['amount'],2); ?></td>
  </tr>

  <tr style="text-align:center; text-transform:capitalize; font-weight:bold;">
    <td colspan="2">&nbsp;Classification Details</td>
  </tr>
  <tr style="text-align:center; text-transform:capitalize; font-weight:bold;">
    <td colspan="2">&nbsp;<?php echo $record['ccode']; ?></td>
  </tr>
</table>
    </div>
    <div class="col-sm-4">
<table  border="1" class="border" style="width:100%;">
  <tr style=" font-weight:bold;">
    <td colspan="2">&nbsp;Station &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; ABUJA</td>
  </tr>
  <tr style=" font-weight:bold;">
    <td style="width:40%;">&nbsp;Head</td>
    <td>&nbsp;<?php echo $record['head']; ?></td>
  </tr>
  <tr style="font-weight:bold;">
    <td style="width:40%;">&nbsp;Subhead</td>
    <td>&nbsp;<?php echo $record['subhead']; ?></td>
  </tr>
</table>
    </div>
  </div>



<div class="row" style="margin-top:5px; margin-bottom:2px; font-weight:bold;">
	<div class="col-sm-12">    
 <table border="1" class="border" style="width:100%;">
  <tr>
    <td colspan="3">&nbsp; PAYEE: &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $record['payee']; ?></td>
  </tr>
  <tr>
    <td colspan="2" style="text-transform:uppercase;">&nbsp; PAYEE ADDRESS: &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $record['address']; ?></td>
    <td>&nbsp; BANKER: </td>
  </tr>
  <tr>
    <td>&nbsp; ACCOUNT NUMBER:</td>
    <td>&nbsp; SORT CODE: </td>
    <td>&nbsp; BRANCH:</td>
  </tr>
</table>
 	</div>
   </div> 
 
 <div class="row" style="margin-top:5px; margin-bottom:2px;">
 	<div class="col-sm-12">
 <table align="center" border="1" class="border" style="width:100%; margin-top:1px;">
  <tr style="font-weight: bold;">
    <td width="9%" align="center">&nbsp;DATE</td>
    <td width="55%" align="center">&nbsp;PURPOSE</td>
    <td width="15" align="center">&nbsp;RATE(₦)</td>
    <td width="6" align="center">&nbsp;VAT(%)</td>
    <td width="20%" align="center">&nbsp;AMOUNT(₦)</td>
  </tr>
  <tr style=" height:100px;">
    <td align="center">&nbsp; <?php echo $record['date']; ?></td>
    <td>&nbsp; <?php echo nl2br($record['description']); ?></td>
    <td align="center" style="font-weight: bold;">&nbsp;<?php echo number_format($record['rate'],2); ?> </td>
     <td align="center" style="font-weight: bold;">&nbsp;<?php echo $record['vat']; ?> </td>
    <td align="center" style="font-weight: bold;">&nbsp; <?php echo number_format($record['amount'],2); ?></td>
  </tr>
    <tr">
    <td colspan="2">Checked and Passed for payment: &nbsp;<b> <?php echo digits_to_words($record['amount']); ?></b></td>
    <td colspan = "2" align="center">&nbsp;<b>TOTAL</b> </td>
    <td align="center">&nbsp; <b><?php echo number_format($record['amount'],2); ?></b></td>
  </tr>

</table>
	</div>
</div>

<div class="row" style="margin-top:5px; margin-bottom:2px;">
	<div class="col-sm-5" style="font-weight:bold; line-height:30px; font-size:12px;">
<table align="center" border="0" class="border1" style="width:100%; margin-top:0px;">
  <tr>
    <td colspan="2">Payable at &nbsp;&nbsp;&nbsp;<strong>ERC ABUJA</strong></td>
  </tr>
  <tr>
    <td colspan="2">Signature ------------------------------------------------</td>
  </tr>
  <tr>
    <td  colspan="2">Name In Block Letters:</td>
  </tr>
  <tr>
  <td>Stations:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td>Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $record['date']; ?></td>
  </tr>
    <tr>
    <td  colspan="2" style="text-align:center;">Financial Authority: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>

</table>
	</div>
	<div class="col-sm-7">
    <p style="margin-bottom:0px;">&nbsp; &nbsp;&nbsp;&nbsp; <strong>CERTIFICATE</strong></p>
    <table align="center" border="0" class="border1"  style=" margin-top:0px;">
  <tr>
    <td style="line-height:15px; font-size:12px;">I certify that the above amount is correct, and was incurred under the Authority Quoted; that the services has been duly performed; that the rate/price charged is according to regulations / contract is fair and reasonable that the amount of <strong><?php  echo digits_to_words($record['amount']); ?></strong>  may be paid under the Classification quoted. </td>
  </tr>
</table>
<table align="center" border="0" class="border1" style=" margin-top:5px; font-size:12px; border-collapse:collapse; line-height:10px; margin-left:0px; padding-right:0px;">
  <tr>
    <td>----------------------------------------------<br>Signature of officer Controlling Expenditure</td>
  </tr>
    <tr>
    <td>Place: ---------- &nbsp&nbsp;&nbsp;&nbsp; Date: -----------</td>
  </tr>
  <tr>
    <td>Designation ------------</td>
  </tr>
</table>

	</div>
</div>

<div class="row" style="margin-top:5px; margin-bottom:2px;">
	<div class="col-sm-12">
<p>Recieved from FEDERAL CAPITAL TERRITORY ADMINISTRATION the sum of <b><?php  echo digits_to_words($record['amount']);  ?></b> in full settlement of the Account.</p>
	</div>
</div>
<div class="row" style="margin-top:3px; margin-bottom:2px;">
	<div class="col-sm-4">
    <p>Signature - - -  -  - - - - - - - - - - -  -</p>
    </div>
	<div class="col-sm-8">
        <p>Date - - -  -  - - - - - - - - - - &nbsp;&nbsp;&nbsp;Place - - - - -  - - - -  - </p>
	</div>
    </div>

<p class="no-print" style="text-align:center;"><button onclick="myFunction()">Print this page</button></p>

<script>
function myFunction() {
    window.print();
}
</script>
 </div>
 </page>
  </body>
 </html> 

