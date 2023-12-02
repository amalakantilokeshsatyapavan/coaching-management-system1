<?php
include("./include/conn.php");
session_start();
 
$errormsg = '';
$action = "add";

$id='';
$eid='';
$fname='';
$lname='';
$email='';
$mobileno='';
$address='';
$city='';
$state='';
$salary='';
$subject='';
$course='';
$center='';
 
if(isset($_POST['save']))
{

$id= mysqli_real_escape_string($conn,$_POST['id']);
$eid= mysqli_real_escape_string($conn,$_POST['eid']);
$fname= mysqli_real_escape_string($conn,$_POST['fname']);
$lname= mysqli_real_escape_string($conn,$_POST['lname']);
$email= mysqli_real_escape_string($conn,$_POST['email']);
$mobileno= mysqli_real_escape_string($conn,$_POST['mobileno']);
$address= mysqli_real_escape_string($conn,$_POST['address']);
$city= mysqli_real_escape_string($conn,$_POST['city']);
$state= mysqli_real_escape_string($conn,$_POST['state']);
$salary= mysqli_real_escape_string($conn,$_POST['salary']);
$subject= mysqli_real_escape_string($conn,$_POST['subject']);
$course= mysqli_real_escape_string($conn,$_POST['course']);
$center= mysqli_real_escape_string($conn,$_POST['center']);

   

 if($_POST['action']=="add")
 {
 
  $sql = $conn->query("INSERT INTO tblstaffmanagement   VALUES ('$id','$eid','$fname','$lname','$email','$mobileno','$address','$city','$state','$salary','$subject','$course','$center' )") ;
    
    echo '<script type="text/javascript">window.location="staffmanagement.php?act=1";</script>';
 
 }else
  if($_POST['action']=="update")
 {
 $id = mysqli_real_escape_string($conn,$_POST['id']);	
   $sql = $conn->query("UPDATE  tblstaffmanagement  SET  eid  = '$eid', fname = '$fname' , lname ='$lname ' , email = '$email' , mobileno = '$mobileno' , address = '$address' , city = '$city' , state = '$state' , salary = '$salary' , subject = '$subject' , course = '$course' , center = '$center' WHERE  id  = '$id'");
   echo '<script type="text/javascript">window.location="staffmanagement.php?act=2";</script>';
 }



}




if(isset($_GET['action']) && $_GET['action']=="delete"){

$conn->query("delete from tblstaffmanagement    WHERE id='".$_GET['id']."'");
header("location: staffmanagement.php?act=3");

}


$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" ){
$id = isset($_GET['id'])?mysqli_real_escape_string($conn,$_GET['id']):'';

$sqlEdit = $conn->query("SELECT * FROM tblstaffmanagement WHERE id='".$id."'");
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
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Staffmanagement Added successfully</div>";
}else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="2")
{
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Staffmanagement Edited successfully</div>";
}
else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="3")
{
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Staffmanagement Deleted successfully</div>";
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
                        <h1 class="page-head-line">Staffmanagement  
						<?php
						echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")?
						' <a href="staffmanagement.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>':'<a href="staffmanagement.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add </a>';
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
                           <?php echo ($action=="add")? "Add Staffmangement": "Edit Staffmanagement"; ?>
                        </div>
						<form action="staffmanagement.php" method="post" id="signupForm1" class="form-horizontal">
                        <div class="panel-body">
						
						
						
						
						<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Id</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="id" name="id" value="<?php echo $id;?>"  />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="Password"> Eid </label>
								<div class="col-sm-10">
	                        <textarea class="form-control" id="eid" name="eid"><?php echo $eid ;?></textarea >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Fname</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname;?>"  /> 
							</div>
								
								
							</div>
							
							
							
							<div class="form-group">
								<label class="col-sm-2 control-label" for="Old"> Lname </label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname;?>"  />
								</div>
							</div>


                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Email</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>"  />
								</div>
							</div>


                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Mobileno</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="mobileno" name="mobileno" value="<?php echo $mobileno;?>"  />
								</div>
							</div>


                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Address</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address;?>"  />
								</div>
							</div>


                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">City</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $city;?>"  />
								</div>
							</div>


                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">State</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="state" name="state" value="<?php echo $state;?>"  />
								</div>
							</div>



                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Salary</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $salary;?>"  />
								</div>
							</div>


                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Subject</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $subject;?>"  />
								</div>
							</div>

                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Course</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="course" name="course" value="<?php echo $course;?>"  />
								</div>
							</div>

                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Center</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="center" name="center" value="<?php echo $center;?>"  />
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
                            Manage Staffmanagement  
                        </div>
                        <div class="panel-body">
                             <div class="table-sorting table-responsive">

                                <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                    <thead>
                                        <tr>
                                            <th>SNo</th>
                                            <th>Id</th>
											<th>Eid</th>
                                            <th>Fname</th>
                                            <th>Lname</th>
                                            <th>Email</th>
                                            <th>Mobileno</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Salary</th>
                                            <th>Subject</th>
                                            <th>Course</th>
                                            <th>Center</th>
                                            
											 
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$sql = "select * from tblstaffmanagement ";
									$q = $conn->query($sql);
									$i=1;
				while($r = $q->fetch_assoc())
									{
									echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$r['id'].'</td>
                                            <td>'.$r['eid'].'</td>
											<td>'.$r['fname'].'</td>
                                            <td>'.$r['lname'].'</td>
                                            <td>'.$r['email'].'</td>
											<td>'.$r['mobileno'].'</td>
                                            <td>'.$r['address'].'</td>
                                            <td>'.$r['city'].'</td>
											<td>'.$r['state'].'</td>
                                            <td>'.$r['salary'].'</td>
                                            <td>'.$r['subject'].'</td>
											<td>'.$r['course'].'</td>
                                            <td>'.$r['center'].'</td>
                                            
                                            
											  
											<td>
											<a href="staffmanagement.php?action=edit&id='.$r['id'].'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
											
											<a onclick="return confirm(\'Are you sure you want to delete this record\');" href="staffmanagement.php?action=delete&id='.$r['id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a> </td>
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

 