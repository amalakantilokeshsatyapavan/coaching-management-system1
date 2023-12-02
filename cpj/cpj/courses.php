<?php
include("./include/conn.php");
session_start();
 
$errormsg = '';
$action = "add";

$coursecode='';
$courses='';
$programcode='';

 
if(isset($_POST['save']))
{

$coursecode= mysqli_real_escape_string($conn,$_POST['coursecode']);
$courses= mysqli_real_escape_string($conn,$_POST['courses']);
$programcode= mysqli_real_escape_string($conn,$_POST['programcode']);

   

 if($_POST['action']=="add")
 {
 
  $sql = $conn->query("INSERT INTO tblcourses   VALUES ('$coursecode','$courses','$programcode' )") ;
    
    echo '<script type="text/javascript">window.location="courses.php?act=1";</script>';
 
 }else
  if($_POST['action']=="update")
 {
 $coursecode = mysqli_real_escape_string($conn,$_POST['coursecode']);	
   $sql = $conn->query("UPDATE  tblcourses  SET  courses  = '$courses', programcode   = '$programcode'    WHERE  coursecode  = '$coursecode'");
   echo '<script type="text/javascript">window.location="courses.php?act=2";</script>';
 }



}




if(isset($_GET['action']) && $_GET['action']=="delete"){

$conn->query("delete from tblcourses    WHERE coursecode='".$_GET['coursecode']."'");
header("location: courses.php?act=3");

}


$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" ){
$coursecode = isset($_GET['coursecode'])?mysqli_real_escape_string($conn,$_GET['coursecode']):'';

$sqlEdit = $conn->query("SELECT * FROM tblcourses WHERE coursecode='".$coursecode."'");
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
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Courses Added successfully</div>";
}else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="2")
{
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Courses Edited successfully</div>";
}
else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="3")
{
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Courses Deleted successfully</div>";
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
                        <h1 class="page-head-line">Courses  
						<?php
						echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")?
						' <a href="courses.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>':'<a href="courses.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add </a>';
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
                           <?php echo ($action=="add")? "Add Courses": "Edit Courses "; ?>
                        </div>
						<form action="courses.php" method="post" id="signupForm1" class="form-horizontal">
                        <div class="panel-body">
						
						
						
						
						<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">CourseCode</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="coursecode" name="coursecode" value="<?php echo $coursecode;?>"  />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="Password"> Courses </label>
								<div class="col-sm-10">
	                        <textarea class="form-control" id="courses" name="courses"><?php echo $courses ;?></textarea >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Programcode/label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="programcode" name="programcode" value="<?php echo $programcode;?>"  /> 
								
							</div>
								
								
							</div>
							
							
							
							
							
							 
						
						<div class="form-group">
								<div class="col-sm-8 col-sm-offset-2">
								<input type="hidden" name="id" value="<?php echo $coursecode;?>">
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
                                            
											 
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$sql = "select * from tblcourses ";
									$q = $conn->query($sql);
									$i=1;
				while($r = $q->fetch_assoc())
									{
									echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$r['coursecode'].'</td>
                                            <td>'.$r['courses'].'</td>
											<td>'.$r['programcode'].'</td>
                                            
											  
											<td>
											<a href="courses.php?action=edit&coursecode='.$r['coursecode'].'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
											
											<a onclick="return confirm(\'Are you sure you want to delete this record\');" href="courses.php?action=delete&coursecode='.$r['coursecode'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a> </td>
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

 