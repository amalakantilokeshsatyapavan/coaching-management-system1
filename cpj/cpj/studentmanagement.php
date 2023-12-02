<?php
include("./include/conn.php");
session_start();
 
$errormsg = '';
$action = "add";

$id='';
$sid='';
$fname='';
$lname='';
$email='';
$mobile='';
$address='';
$city='';
$state='';
$fee='';
$paidfee='';
$status='';
$batch='';
$fathername='';
$fathermob='';
$center='';
$dateofjion='';
$dateofleft='';



 
if(isset($_POST['save']))
{

$id= mysqli_real_escape_string($conn,$_POST['id']);
$sid= mysqli_real_escape_string($conn,$_POST['sid']);
$fname= mysqli_real_escape_string($conn,$_POST['fname']);
$lname= mysqli_real_escape_string($conn,$_POST['lname']);
$email= mysqli_real_escape_string($conn,$_POST['email']);
$mobile= mysqli_real_escape_string($conn,$_POST['mobile']);
$address= mysqli_real_escape_string($conn,$_POST['address']);
$city= mysqli_real_escape_string($conn,$_POST['city']);
$state= mysqli_real_escape_string($conn,$_POST['state']);
$fee= mysqli_real_escape_string($conn,$_POST['fee']);
$paidfee= mysqli_real_escape_string($conn,$_POST['paidfee']);
$status= mysqli_real_escape_string($conn,$_POST['status']);
$course= mysqli_real_escape_string($conn,$_POST['course']);
$batch= mysqli_real_escape_string($conn,$_POST['batch']);
$fathername= mysqli_real_escape_string($conn,$_POST['fathername']);
$fathermob= mysqli_real_escape_string($conn,$_POST['fathermob']);
$center= mysqli_real_escape_string($conn,$_POST['center']);
$dateofjoin= mysqli_real_escape_string($conn,$_POST['dateofjion']);
$dateofleft= mysqli_real_escape_string($conn,$_POST['dateofleft']);







   

 if($_POST['action']=="add")
 {
 
  $sql = $conn->query("INSERT INTO tblstudentmangement   VALUES ('$id','$sid','$fname','$lname','$email','$mobile','$address','$city','$state','$fee','$paidfee','$status','$course','$batch','$fathername'.'$fathermob','$center','$dateofjion','$dateofleft')") ;
    
    echo '<script type="text/javascript">window.location="studentmangement.php?act=1";</script>';
 
 }else
  if($_POST['action']=="update")
 {
 $id = mysqli_real_escape_string($conn,$_POST['id']);	
   $sql = $conn->query("UPDATE  tblstudentmangement  SET  sid  = '$sid', fname = '$fname' , lname ='$lname ' , email = '$email' , mobile = '$mobile' , address = '$address' , city = '$city' , state = '$state' , fee = '$fee' , paidfee = '$paidfee' , status = '$status' , course = '$course' , batch = '$batch' , fathername = '$fathername' , fathermob = '$fathermob' , center = '$center' dateofjion = '$dateofjion' dateofleft = '$dateofleft'WHERE  id  = '$id'");
   echo '<script type="text/javascript">window.location="studentmangement.php?act=2";</script>';
 }



}




if(isset($_GET['action']) && $_GET['action']=="delete"){

$conn->query("delete from tblstudentmangement    WHERE id='".$_GET['id']."'");
header("location: studentmangement.php?act=3");

}


$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" ){
$id = isset($_GET['id'])?mysqli_real_escape_string($conn,$_GET['id']):'';

$sqlEdit = $conn->query("SELECT * FROM tblstudentmangement WHERE id='".$id."'");
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
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Studentmangement Added successfully</div>";
}else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="2")
{
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Studentmangement Edited successfully</div>";
}
else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="3")
{
$errormsg = "<div class='alert alert-success'><strong>Success!</strong> Studentmangement Deleted successfully</div>";
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
                        <h1 class="page-head-line">Studentmangement  
						<?php
						echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")?
						' <a href="studentmangement.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>':'<a href="studentmangement.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add </a>';
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
                           <?php echo ($action=="add")? "Add Studentmangement": "Edit Studentmangement"; ?>
                        </div>
						<form action="studentmangement.php" method="post" id="signupForm1" class="form-horizontal">
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
								<label class="col-sm-2 control-label" for="Old">Mobile</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile;?>"  />
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
								<label class="col-sm-2 control-label" for="Old">Fee</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="fee" name="fee" value="<?php echo $fee;?>"  />
								</div>
							</div>


                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Paidfee</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="paidfee" name="paidfee" value="<?php echo $paidfee;?>"  />
								</div>
							</div>

                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Status</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="status" name="status" value="<?php echo $status;?>"  />
								</div>
							</div>

                            <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Course</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="course" name="course" value="<?php echo $course;?>"  />
								</div>
                               </div>

                               <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Batch</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="batch" name="batch" value="<?php echo $batch;?>"  />
								</div>
                               </div>

                               <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Fathername</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="fathername" name="fathername" value="<?php echo $fathername;?>"  />
								</div>
                               </div>

                               <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Fathermob</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="fathermob" name="fathermob" value="<?php echo $fathermob;?>"  />
								</div>
                               </div>

                               <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Center</label>
								<div class="col-sm-10">
	                        <input type="text" class="form-control" id="center" name="center" value="<?php echo $center;?>"  />
								</div>
                               </div>

                               <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Dateofjion</label>
								<div class="col-sm-10">
	                        <input type="date" class="form-control" id="dateofjion" name="dateofjion" value="<?php echo $dateofjion;?>"  />
								</div>
                               </div>

                               <div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Dateofleft</label>
								<div class="col-sm-10">
	                        <input type="date" class="form-control" id="dateofleft" name="dateofleft" value="<?php echo $dateofleft;?>"  />
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
                            Manage Studentmangement  
                        </div>
                        <div class="panel-body">
                             <div class="table-sorting table-responsive">

                                <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                    <thead>
                                        <tr>
                                            <th>SNo</th>
                                            <th>Id</th>
											<th>Sid</th>
                                            <th>Fname</th>
                                            <th>Lname</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Fee</th>
                                            <th>Paidfee</th>
                                            <th>Status</th>
                                            <th>Course</th>
                                            <th>Batch</th>
                                            <th>Fathername</th>
                                            <th>Fathermob</th>
                                            <th>Center</th>
                                            <th>Dateofjoin</th>
                                            <th>Dateofleft</th>
                                            
											 
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$sql = "select * from tblstudentmangement ";
									$q = $conn->query($sql);
									$i=1;
				while($r = $q->fetch_assoc())
									{
									echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$r['id'].'</td>
                                            <td>'.$r['sid'].'</td>
											<td>'.$r['fname'].'</td>
                                            <td>'.$r['lname'].'</td>
                                            <td>'.$r['email'].'</td>
											<td>'.$r['mobile'].'</td>
                                            <td>'.$r['address'].'</td>
                                            <td>'.$r['city'].'</td>
											<td>'.$r['state'].'</td>
                                            <td>'.$r['fee'].'</td>
                                            <td>'.$r['paidfee'].'</td>
											<td>'.$r['status'].'</td>
                                            <td>'.$r['course'].'</td>
                                            <td>'.$r['batch'].'</td>
                                            <td>'.$r['fathername'].'</td>
                                            <td>'.$r['fathermob'].'</td>
                                            <td>'.$r['center'].'</td>
                                            <td>'.$r['dateofjion'].'</td>
                                            <td>'.$r['dateofleft'].'</td>
                                            
                                            
											  
											<td>
											<a href="studentmangement.php?action=edit&id='.$r['id'].'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
											
											<a onclick="return confirm(\'Are you sure you want to delete this record\');" href="studentmangement.php?action=delete&id='.$r['id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a> </td>
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

 