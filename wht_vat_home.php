<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contract WHT &amp; VAT Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link hrel="styles/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="styles/css/bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="styles/js/jQuery-2.1.4.min.js"></script>
  <script src="styles/js/bootstrap.min.js"></script>
  
  <?php include("include/bodycss.php")?>
</head>
<body>

<div class="jumbotron" style="height:170px;">

  <div class="container" style="max-width:900px; width:auto;">
  <div class="col-sm-3 text-right"><img src="images/erc.jpg" width="100" height="100" style="padding:5px;"></div>
  <div class="col-sm-9">
    <h2 style="color:#3090c7; font-weight:bold; text-align:center;">FCT ERC Payment Solution 2.0</h2>      
    </div>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-edit"></span> Select Task
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="wht_vat.php">Contract WHT and VAT</a></li>
          </ul>
          </li>
`			<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-print"></span> List
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="list_wht_vat.php">Contract WHT And VAT</a></li> 
          </ul>
          </li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-lock"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container text-justify" style="max-width:1000px;">    
  <div class="row">
    <div class="col-sm-12" style="min-height:350px; border:#eee thin solid; border-radius:5px;">
    <p style="font-size:22px; padding:20px; line-height:2; letter-spacing:5px; color:#000;">Welcome <strong>Staff User Name</strong> to FCT Education Resource Center (ERC) Accounting Payments Solution Software. This software will make it easy for you to create, store and access all your vouchers.<br>
    Please, enjoy......</p>
      
    </div>
    </div>
    </div>

<?php include("include/footer.php")?>

</body>
</html>
