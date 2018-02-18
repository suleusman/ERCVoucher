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
            <li><a href="pv.php">Payment Voucher</a></li>
            <li><a href="ca.php">Cash Advance</a></li>
            <li><a href="av.php">Adjustment Voucher</a></li>
            <li><a href="wht_vat.php">Contract WHT And VAT</a></li> 
          </ul>
          </li>
          
          
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-check"></span> List
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="list_pv.php">Payment Voucher</a></li>
            <li><a href="list_ca.php">Cash Advance</a></li>
            <li><a href="list_av.php">Adjustment Voucher</a></li>
            <li><a href="list_wht_vat.php">Contract WHT And VAT</a></li> 
          </ul>
          </li>
          
        <li><a href="user_register.php"><span class="glyphicon glyphicon-user"></span> Create User</a></li>
       <li><a href="view_user.php"><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span>View Users</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-lock"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>