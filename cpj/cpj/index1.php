<?php
session_start();

if (isset($_GET['menu'])) {

    $menu = $_GET['menu'];
} else {
    $menu = 'Dashboard';
}

if (empty($_SESSION)) {
    include_once './login1.php';
    include_once './include/login1.php';
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <?php
        include_once 'include/head1.php';
     ?>
        <link rel="shortcut icon" href="./dist/img/dsr3.png">
        <link rel="icon" href="./dist/img/dsr3.png" type="image/x-icon">
        <style>
        body {
            background-image: url('https://thumbs.dreamstime.com/b/team-building-group-people-meeting-big-screen-coaching-business-background-137018255.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
        
    </head>

 <body class="hold-transition sidebar-mini layout-fixed">
 <div class="wrapper">

  <?php 
        include_once 'include/navbar1.php';
        include_once 'include/sidebar1.php';
   ?>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
               <div class="col-sm-6">
               <h1 class="m-0">Dashboard</h1>
                </div>
               <!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active"><?= $menu ?></li>
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="card">
                        <div class="card-header">User Dashboard</div>

                        <div class="card-body">
                            <div class="container-fluid p-2">

                                <!-- Small boxes (Stat box) -->
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->

                                        <!--card-->

                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>6</h3>



                                                <p>Total Departments</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-danger">
                                            <div class="inner">
                                                <h3>3</h3>

                                                <p>Total Courses</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                   </div>
                                <!-- /.row -->
                                <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-danger">
                                            <div class="inner">
                                                <h3>8</h3>


                                                <p>Total Students</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                 </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        
 <?php include_once './include/footer.php'; ?>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
       <?php include_once './include/scripts1.php'; ?>
    </body>

    </html>

<?php
}
?>