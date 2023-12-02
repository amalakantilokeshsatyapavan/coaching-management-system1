<?php
include("./include/conn.php");
session_start();

$sql = "SELECT * FROM tblcourses";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'include/head1.php'; ?>
    <link rel="shortcut icon" href="./dist/img/dsr3.png">
        <link rel="icon" href="./dist/img/dsr3.png" type="image/x-icon">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include_once 'include/navbar1.php'; ?>
        <?php include_once 'include/sidebar1.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="col-md-12">
                    <h1 class="page-head-line">Courses</h1>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Courses
                    </div>
                    <div class="panel-body">
                        <div class="table-sorting table-responsive">
                             <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                <thead>
                                    <tr>
                                        <th>SNo</th>
                                        <th>Course code</th>
                                        <th>Courses</th>
                                        <th>Programcode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>
                                                <td>' . $i . '</td>
                                                <td>' . $row['coursecode'] . '</td>
                                                <td>' . $row['courses'] . '</td>
                                                <td>' . $row['programcode'] . '</td>
                                            </tr>';
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include_once './include/footer.php'; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once './include/scripts1.php'; ?>
</body>

</html>
