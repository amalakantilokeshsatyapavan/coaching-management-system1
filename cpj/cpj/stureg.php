<!DOCTYPE html>
<html lang="en">
<head>
     <?php
	 session_start();
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
<div class="content-wrapper">
  <section class="content">	
 <div class="col-md-12">  
 <h2>Student Form</h2>
 <form id="studentForm" method="post"  action="insertstudent.php"  >
   <div class="form-group">
		<label  for="program"> Program </label>
  <?php
	  
   include("./include/conn.php"); 
  $sql = "select * from programs "; 
	$rs = $conn->query ($sql); ?>
	 <select  name='program' id='program' class='form-control'> 
	  <option value=''>Select Program </option> 
	<?php 
	while ($row =  $rs->fetch_assoc()) {  ?>
	<option  value=<?php echo $row['program'];?> > <?php echo $row['program'];?> </option>
     <?php      
	 }
	 ?>
 </select></div> 
 <div id='res' style='color:red;'></div> 
 

<div class="form-group">
<label  for="course">Course</label>
 <?php
$sql = "select * from tblcourses   "; 
	$rs = $conn->query ($sql);  ?>
  <select  name='course' id='course' class='form-control'> 
	  <option value=''>Select Course</option>
<?php 			 
	while ($row =  $rs->fetch_assoc()) {  ?>
	<option   value=<?php echo $row['courses'];?> > <?php echo $row['courses'];?> </option>
   <?php        }
      ?>                             
 </select> 
	</div>				 	
     <div class="form-group">
     <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
       </div>
      <div class="form-group">
      <label for="email">Email:</label>
       <input type="email" class="form-control" id="email" name="email" required>
         </div>
        <div class="form-group">
        <label for="age">Age:</label>
         <input type="number" class="form-control" id="age" name="age" required>
        </div>
         <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="result"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
   $(document).ready(function() {
   $("#studenForm").submit(function(e) {
    e.preventDefault();
                
        $.ajax({
            type: "POST",
             url: "insert76.php",
           data: $(this).serialize(),
           success: function(res) {
           $("#result").html(res);
              }
                });
            });
        });
    </script>
 
<script type="text/javascript">
$(document).ready(function(){
 $('#program').on('change',function(){
        var program= $(this).val();
         
        if(program){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'program='+program,
              success:function(res){
				  alert(res);
			data= res.split("#");
            $('#course').html(data[0]);
			$('#res').html(data[1]);
             }
            });
	 } 		
	  });					
   });   
 </script> 
        <!-- jQuery -->
<?php include_once './include/scripts.php'; ?>
</body>
</html>