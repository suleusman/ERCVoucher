<?php  session_start();?>

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
	 	  margin-top:0px;
	  margin-bottom:0px;
    box-shadow: 0;
  }
}
</style>

<?php 
// connect to mysql server & select database
include("include/connection.php"); 
?>

<?php include('include/authenticate_user.php'); ?>
<?php include('include/functions.php'); ?>

<?php
if(isset($_GET['inv_no']))
$inv_no = $_GET['inv_no'];


$sql = "SELECT * FROM whtvat_voucher WHERE inv_no = '$inv_no'";
$result = mysqli_query($connection,$sql) or die(mysql_error());
$record = mysqli_fetch_array($result);
	
	

?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
  <head>
    <meta charset="UTF-8">
    <title>User | Print Contract WHT &amp; VAT</title>
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
<div style="margin:auto;  max-width:1000px; margin-top:0px; margin-bottom:0px; border: thin solid #; padding:2px;">
        <div style="text-align:center;  font-size:18px; font-weight:bold;">CONTRACT WITHHOLDING TAX AND VALUE ADDED TAX PAYMENT</div>   
             <div style="text-align:left;  font-size:14px; font-weight:bold; margin-top:10px; text-transform:uppercase;">Tax Payer/Agent Name: FCT - Education Resource Centre</div>
             <div style="text-align:left;  font-size:14px; font-weight:bold; text-transform:uppercase;">Tax Payer/Agent Address: Wuse Zone 7, Abuja</div>
        <div style="text-align:left;  font-size:14px; font-weight:bold; text-transform:uppercase;">tax payer/agent tin: 000009988-0001</div>
 <div style="text-align:left;  font-size:14px; font-weight:bold; text-transform:;"><span style="text-transform:uppercase; ">transaction date:</span> &nbsp;&nbsp;<?php echo $record['date']; ?></div>

        

<div class="row" style="margin-top:10px;">
<div class="col-sm-12"><strong>Name of Beneficiary: </strong> <b style="font-size:14px; text-transform:uppercase;"><?php echo $record['cname']; ?></b></div>
</div>

<div class="row" style="margin-top:5px; margin-bottom:2px;">
<div class="col-sm-12">
    <table  border="1" class="border" style="width:100%;">
  <tr style="text-align:center; text-transform:uppercase; font-size:14px; font-weight:bold;">
    <td>&nbsp;tin no.</td>
    <td>&nbsp;company name</td>   
     <td>&nbsp;company address</td>
    <td>&nbsp;contract date</td>
    <td>&nbsp;invoice no.</td>
    <td>&nbsp;contract description</td>   
     <td>&nbsp;contract amount(₦)</td>
    <td>&nbsp;WHT(%)</td>
    <td>&nbsp;VAT(%)</td>
    <td>&nbsp;period covered</td>   
     
  </tr>
  <tr style="font-size:14px;">
    <td align="center"><?php echo $record['tin']; ?></td>
    <td> <?php echo $record['cname']; ?></td>    
    <td> <?php echo nl2br($record['address']); ?></td>
    <td align="center"> <?php echo $record['cdate']; ?></td>
    <td align="center"><?php echo $record['inv_no']; ?></td>
    <td> <?php echo nl2br($record['description']); ?></td>    
    <td align="center"> <?php echo $record['amount']; ?></td>
    <td align="center"> <?php echo $record['wht']; ?></td>
    <td align="center"><?php echo $record['vat']; ?></td>
    <td align="center"><?php echo $record['periodcov']; ?></td>    
  </tr>

 <tr style="font-size:14px;">
    <td colspan="6" align="right">&nbsp;<strong>TOTAL(₦)</strong></td>
    <td align="center"><b> <?php echo $record['amount']; ?></b></td>
    <td colspan="3">&nbsp;</td>    
  </tr>
</table>
    </div></div>
 
 


    
	<div class="col-sm-12">
    <table align="center" border="0" class="border1"  style=" margin-top:25px; width:100%">
  <tr style="font-size:14px;">
    <td><strong>Prepared By&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><span style="text-transform:capitalize;">
     <?php echo $record['prep']; ?></span><br><br>----------------------------------- </td>
    <td> <strong>Checked By&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><span style="text-transform:capitalize;">
     <?php echo $record['audit']; ?></span><br><br>----------------------------------- </td>
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

