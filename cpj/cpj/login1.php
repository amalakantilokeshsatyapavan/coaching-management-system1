<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<head>
  <style>
  body
  {
    background-image: url('https://www.corporatecomplianceinsights.com/wp-content/uploads/2017/10/multiple-devices.jpg');
  }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> user | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img class='w-25' src="./dist/img/dsr1.png" alt="" style='border-radius:50px;'><br>
      <a href="./index1.php"><b>user</b></a>
      <hr>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Login </p>

        <form action="./include/login1.php" method="post">
          <div class="input-group mb-3">
            <input type="text" name='username' class="form-control" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name='password' class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
			<?php 
	if (isset($_SESSION['error']) 
		and !empty($_SESSION['error']))
	{
	
	$msg = "<div class='alert alert-danger'><strong>Fail!</strong>  ".$_SESSION['error']."</div>";
	echo $msg;
	$_SESSION['error']="";
			}
	?> 
            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    
</body>

</html>