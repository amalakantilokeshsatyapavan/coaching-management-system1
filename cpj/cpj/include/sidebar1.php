<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index1.php" class="brand-link">
        <img src="dist/img/dsr3.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
 <div class="user-panel mt-3 pb-3 mb-3 d-flex">
   <div class="image">
                <img src="dist/img/avatar4.png" class="img-circle  elevation-1" style="width:50px" alt="User Image">
            </div>
            <div class="info">
          <a href="#" class="d-block"><?=  $_SESSION['name'] ?></a>
                
            </div>
        </div>



        <!-- Sidebar Menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item  ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
				  <?php

   if ($_SESSION['level'] == 'user') {
                ?>
     <li class="nav-item menu-open">
         <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-database"></i>
           <p>
          Master Data
           <i class="right fas fa-angle-left"></i>
           </p>
         </a>
           <ul class="nav nav-treeview">
            <li class="nav-item">
             <a href="./dept1.php" class="nav-link ">
              <i class="far fa-user nav-icon"></i>
             <p>Department</p>
            </a>
           </li>
		  <li class="nav-item">
             <a href="./stureg1.php" class="nav-link ">
              <i class="far fa-user nav-icon"></i>
             <p>Student</p>
            </a>
           </li>
           <li class="nav-item">
             <a href="./courses1.php" class="nav-link ">
              <i class="far fa-user nav-icon"></i>
             <p>Courses</p>
            </a>
           </li>
           <li class="nav-item">
             <a href="./payment.php" class="nav-link ">
              <i class="far fa-user nav-icon"></i>
             <p>user payment</p>
            </a>
           </li>
           <li class="nav-item">
             <a href="./feedback.php" class="nav-link ">
              <i class="far fa-user nav-icon"></i>
             <p>user feedback</p>
            </a>
           </li>

                <?php } ?>
                
                
 <li class="nav-item  ">
   <a href="./login1.php" class="nav-link bg-red">
 <i class="nav-icon fas fa-power-off"></i>
   <p>
    Logout
    </p>
     </a>
</li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
