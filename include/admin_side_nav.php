 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="images/erc.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <a href="#"><i class="fa fa-circle text-success"></i></a>
            </div>
          </div>
          <!-- search form -->
                        <p style="color:#fff;">	<?php	$username = $_SESSION['username']; echo $username; ?></p>

          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder=""/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!--li class="header">MAIN NAVIGATION</li-->
            <!--li class="active treeview">
              <a href="home.php">
                <i class="fa fa-dashboard"></i> <span>Home</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li-->
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            
           
             <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            
            <!--li class="treeview">
              <a href="view_employees.php">
                <i class="fa fa-folder"></i> <span>View employees</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            
            <li class="treeview">
              <a href="view_payrolls.php">
                <i class="fa fa-folder"></i> <span>Preview Payrolls</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li-->
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
