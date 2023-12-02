<?php
include("./include/conn.php");
session_start();
 
$errormsg = '';
$action = "add";

$id='';
$sid='';
$fromdate='';
$todate='';
$timing='';
$batch='';
$status='';
$center='';
$course='';
if(isset($_POST['save']))
{

$id= mysqli_real_escape_string($conn,$_POST['id']);
$sid= mysqli_real_escape_string($conn,$_POST['sid']);
$fromdate= mysqli_real_escape_string($conn,$_POST['fromdate']);
$todate= mysqli_real_escape_string($conn,$_POST['todate']);
$timing= mysqli_real_escape_string($conn,$_POST['timing']);
$batch= mysqli_real_escape_string($conn,$_POST['batch']);
$status= mysqli_real_escape_string($conn,$_POST['status']);
$center= mysqli_real_escape_string($conn,$_POST['center']);
$course= mysqli_real_escape_string($conn,$_POST['course']);
   

 if($_POST['action']=="add")
 {
 
  $sql = $conn->query("INSERT INTO tblstudentattendence   VALUES ('$id','$sid','$fromdate','$todate','$timing','$batch','$status','$center','$course' )") ;
    
    echo '<script type="text/javascript">window.location="studentattendence.php?act=1";</script>';
 
 }else
  if($_POST['action']=="update")
 {
 $deptcode = mysqli_real_escape_string($conn,$_POST['id']);	
   $sql = $conn->query("UPDATE  tblstudentattendence  SET  sid  = '$sid', fromdate  = '$fromdate' , todate ='$todate '  , timing = '$timing' , batch = '$batch' , status = '$status' , center = '$center' , course = '$course' WHERE  id  = '$id'");
   echo '<script type="text/javascript">window.location="studentattendence.php?act=2";</script>';
 }



}




if(isset($_GET['action']) && $_GET['action']=="delete"){

$conn->query("delete from tblstudentattendence    WHERE id='".$_GET['id']."'");
header("location: studentattendence.php?act=3");

}


$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" ){
$id = isset($_GET['id'])?mysqli_real_escape_string($conn,$_GET['id']):'';


$sqlEdit = $conn->query("SELECT * FROM tblstudentattendence WHERE id='".$id."'");
if($sqlEdit->num_rows)
{
$rowsEdit = $sqlEdit->fetch_assoc();
extract($rowsEdit);
$action = "update";
}else
{
$_GET['action']="";
}

}


if(isset($_REQUEST['act']) && @$_REQUEST['act']=="1")
{
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Studentattendence Added successfully</div>";
}else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="2")
{
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Studentattendence Edited successfully</div>";
}
else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="3")
{
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Studentattendence Deleted successfully</div>";
}

?>

 


    
 
 <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php
        include_once 'include/head.php';
        ?>
        <link rel="shortcut icon" href="./dist/img/dsr3.png">
        <link rel="icon" href="./dist/img/dsr3.png" type="image/x-icon">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
              
 <?php
            include_once 'include/navbar.php';
            include_once 'include/sidebar.php';
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                  <section class="content">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Studentattendemce 
						<?php
						echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")?
						' <a href="studentattendence.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>':'<a href="studentattendence.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add </a>';
						?>
						</h1>
                     
<?php

echo $errormsg;
?>
                    </div>
 
				
				
				
        <?php 
		 if(isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
		 {
		?>
		
			 
                <div class="row">
				   <div class="col-md-8 offset-md-2">
                    
               <div class="panel panel-primary">
                        <div class="panel-heading">
                           <?php echo ($action=="add")? "Add studentattendence": "Edit studentattendence"; ?>
                        </div>
						<form action="studentattendence.php" method="post" id="signupForm1" class="form-horizontal">
                        <div class="panel-body">
						
						
						
						
						<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Id</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="id" name="id" value="<?php echo $id;?>"  />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="Password"> Sid </label>
								<div class="col-sm-10">
	                        <textarea class="form-control" id="sid" name="sid"><?php echo $sid ;?></textarea >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Fromdate</label>
								<div class="col-sm-10">
								<input type="date" class="form-control" id="fromdate" name="fromdate" value="<?php echo $fromdate;?>"  /> 
							</div>
								
								
							</div>
							
							
							
							<div class="form-group">
								<label class="col-sm-2 control-label" for="Password">Todate</label>
								<div class="col-sm-10">
	                        <input type="date" class="form-control" id="todate" name="todate" value="<?php echo $todate;?>"  />
								</div>
							</div>
							

                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Password">Timing</label>
								<div class="col-sm-10">
	                        <input type="timings" class="form-control" id="timing" name="timing" value="<?php echo $timing;?>"  />
								</div>
							</div>

                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Password">Batch</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="batch" name="batch" value="<?php echo $batch;?>"  />
								</div>
							</div>

                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Password">Status</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="status" name="status" value="<?php echo $status;?>"  />
								</div>
							</div>

                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Password">Center</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="center" name="center" value="<?php echo $center;?>"  />
								</div>
							</div>

                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Password">Course</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="course" name="course" value="<?php echo $course;?>"  />
								</div>
							</div>
							 
						
						<div class="form-group">
								<div class="col-sm-8 col-sm-offset-2">
								<input type="hidden" name="id" value="<?php echo $id;?>">
								<input type="hidden" name="action" value="<?php echo $action;?>">
								
									<button type="submit" name="save" class="btn btn-primary">Save </button>
								</div>
							</div>
                         
                           
                           
                         
                           
                         </div>
							</form>
							
                        </div>
                            </div>
            
			  </div>
              
               

			   
			   
		 


			   
		<?php
		}else{
		?>
		
		 
		 
		 
		<div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Studentattendemce  
                        </div>
                        <div class="panel-body">
                             <div class="table-sorting table-responsive">

                                <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                    <thead>
                                        <tr>
                                            <th>SNo</th>
                                            <th>Id</th>
											<th>Sid</th>
                                            <th>Fromdate</th>
                                            <th>Todate</th>
											<th>Timing</th>
                                            <th>Batch</th>
                                            <th>Status</th>
											<th>Center</th>
                                            <th>Course</th>
                                            
                                            
                                            
											 
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$sql = "select * from tblstudentattendence ";
									$q = $conn->query($sql);
									$i=1;
				while($r = $q->fetch_assoc())
									{
									echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$r['id'].'</td>
                                            <td>'.$r['sid'].'</td>
											<td>'.$r['fromdate'].'</td>
                                            <td>'.$r['todate'].'</td>
                                            <td>'.$r['timing'].'</td>
											<td>'.$r['batch'].'</td>
                                            <td>'.$r['status'].'</td>
                                            <td>'.$r['center'].'</td>
											<td>'.$r['course'].'</td>
                                            
											  
											<td>
											<a href="studentattendence.php?action=edit&id='.$r['id'].'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
											
											<a onclick="return confirm(\'Are you sure you want to delete this record\');" href="studentattendence.php?action=delete&id='.$r['id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a> </td>
                                        </tr>';
										$i++;
									}
									?>
									
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     
	 
		
		<?php
		}
		?>
				
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
<?php include_once './include/scripts.php'; ?>
    </body>

    </html>

 