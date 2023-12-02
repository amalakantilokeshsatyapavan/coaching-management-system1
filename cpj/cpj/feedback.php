<!DOCTYPE html>
<html lang="en">
<head>
     <?php
	 session_start();
     include_once 'include/head1.php';

        ?>
        <link rel="shortcut icon" href="./dist/img/dsr3.png">
        <link rel="icon" href="./dist/img/dsr3.png" type="image/x-icon">
		
</head>
 <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
              
 <?php
            include_once 'include/navbar1.php';
            include_once 'include/sidebar1.php';
            ?>

<div class="content-wrapper">
  <section class="content">	
 <div class="col-md-12">  
 <h2><div class="card-header bg-maroon"><div class="icon">
 <i class="ion ion-ios-checkmark"></i>
     </div>FEEDBACK FORM Page</div></h2>
 <form id="feedback form Page" method="post" action="./include/feedback.php">
<div class="form-group">
		<label  for="about cms"> <div class="card-header bg-warning">About Coaching Management System</div> </label>
  <?php
	  
   include("./include/conn.php"); 
  $sql = "select * from tblfeed "; 
	$rs = $conn->query ($sql); ?>
	 <select  name='about cms' id='about cms' class='form-control'> 
	  <option value=''><div class="card-header bg-danger">Select your option</div></option> 
	<?php 
	while ($row =  $rs->fetch_assoc()) {  ?>
	<option  value=<?php echo $row['about cms'];?> > <?php echo $row['about cms'];?> </option>
     <?php      
	 }
	 ?>
 </select></div> 
 <button id="submitButton" class="btn btn-primary">submit</button>
    <div id="feedbackStatus" style="display: none;">Your feedback is submitted.</div>

    </form>
    <script>
        const submitButton = document.getElementById("submitButton");
const feedbackStatus = document.getElementById("feedbackStatus");

// Add a click event listener to the button
submitButton.addEventListener("click", function() {
    // Clear everything on the page
    document.body.innerHTML = "";

    // Create a new div to display the payment status message
    const newfeedbackStatus = document.createElement("div");
    newfeedbackStatus.textContent = "Your feedback is submitted.";
    document.body.appendChild(newfeedbackStatus);
});
In this code, when the "submit" button is clicked, it clears everything on the page by setting document.body.innerHTML to an empty string. Then, it creates a new div element with the feedback status message and appends it to the body of the page. This approach effectively replaces the entire content of the page with the feedback status message.
    </script>


    
 
</body>
</html>