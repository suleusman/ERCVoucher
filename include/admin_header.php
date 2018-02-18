<style>
  .navbar {
	 min-height:30px;
	 width:auto;
	 text-transform: uppercase;
	 font-weight:bold;
    border: 0;
    font-size: 13px !important;
    line-height: 1.42857143 !important;
}
/* main menu font */
  .navbar li a {
      color: #ddd !important;
	  font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	  font-weight:100;
	  padding-top:15px;
	  	margin-top:10px;

  }

/* Dropdown */
.open .dropdown-toggle {
    color: #fff ;
    background-color: #555 !important;
}

/* Dropdown links */
.dropdown-menu{
	width:px;
	}
/* Drop down menu font*/
.dropdown-menu li a {
    color: #000 !important;
	font-size:14px;
	display:block;
}

/* On hover, the dropdown links will turn red */
.dropdown-menu li a:hover {
	text-decoration:none;
	color:#3090c7;
}
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color:# !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }


</style>
<header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo" style="padding-bottom:20px;">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b> FCT ERC ABUJA</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <div class="navbar-custom-menu">
      <ul class="nav navbar-nav" >
        <li ><a href="payment_voucher.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Task
          </a>
          <ul class="dropdown-menu">
            <li><a href="Payment_voucher.php">Payment Voucher</a></li>
             <li><a href="cash_advance.php">Cash Advance</a></li>            
              <li><a href="adjustment_voucher.php">Adjustment Voucher</a></li>
            <li><a href="treasury_cash_book.php">Treasury Cash Book</a></li>
            <li><a href="contract_wht_vat.php">Contract WHT And VAT</a></li>
            <li><a href="recurrent_expenditure.php">Recurrent Expenditure</a></li>
          </ul>
          </li>
                  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Print
          </a>
          <ul class="dropdown-menu">
            <li><a href="print_pv.php">Payment Voucher</a></li>
             <li><a href="print_ca.php">Cash Advance</a></li>            
              <li><a href="print_adjustment.php">Adjustment Voucher</a></li>
            <li><a href="print_treasury.php">Treasury Cash Book</a></li>
            <li><a href="print_wht_vat.php">Contract WHT And VAT</a></li>
            <li><a href="#">Recurrent Expenditure</a></li>
          </ul>
          </li>

           <li  style="margin-right:10px;" ><a href="logout.php" class="btn btn-danger btn-flat">Sign Out</a></li>
  
                </ul>
            </ul>
          </div>

        </nav>
      </header>
