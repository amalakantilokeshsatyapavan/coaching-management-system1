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
     </div>User Payment Page</div></h2>
 <form id="user Payment Page" method="post" action="./page2.php">
 <div class="form-group">
     <label for="name"><div class="card-header bg-warning">Name:</div></label>
      <input type="text" class="form-control" id="name" name="name" required>
       </div>
	<div class="form-group">
     <label for="Mobile No"><div class="card-header bg-warning">Mobile No:</div></label>
      <input type="number" class="form-control" id="Mobile NO" name="Mobile NO" required>
       </div>
<div class="form-group">
		<label  for="Payment Type"> <div class="card-header bg-warning">Payment Type</div> </label>
  <?php
	  
   include("./include/conn.php"); 
  $sql = "select * from payment_type "; 
	$rs = $conn->query ($sql); ?>
	 <select  name='Payment Type' id='Payment Type' class='form-control'> 
	  <option value=''><div class="card-header bg-danger">Select Payment Type</div></option> 
	<?php 
	while ($row =  $rs->fetch_assoc()) {  ?>
	<option  value=<?php echo $row['payment type'];?> > <?php echo $row['payment type'];?> </option>
     <?php      
	 }
	 ?>
 </select></div> 
 <div id='res' style='color:red;'></div> 
 <div class="form-group">
		<label  for="Transaction Type"> <div class="card-header bg-warning">Transaction Type</div> </label>
  <?php
	  
   include("./include/conn.php"); 
  $sql = "select * from transaction_type "; 
	$rs = $conn->query ($sql); ?>
	 <select  name='Transaction Type' id='Transaction Type' class='form-control'> 
	  <option value=''><div class="card-header bg-danger">Select Transaction Type</div></option> 
	<?php 
	while ($row =  $rs->fetch_assoc()) {  ?>
	<option  value=<?php echo $row['transaction type'];?> > <?php echo $row['transaction type'];?> </option>
     <?php      
	 }
	 ?>
 </select></div> 
 <button id="payButton" class="btn btn-primary">Payment</button>
    <div id="paymentStatus" style="display: none;">Your payment is done.</div>

    </form>
    <script>
        const payButton = document.getElementById("payButton");
const paymentStatus = document.getElementById("paymentStatus");

// Add a click event listener to the button
payButton.addEventListener("click", function() {
    // Clear everything on the page
    document.body.innerHTML = "";

    // Create a new div to display the payment status message
    const newPaymentStatus = document.createElement("div");
    newPaymentStatus.textContent = "Your payment is done.";
    document.body.appendChild(newPaymentStatus);
});
In this code, when the "Pay" button is clicked, it clears everything on the page by setting document.body.innerHTML to an empty string. Then, it creates a new div element with the payment status message and appends it to the body of the page. This approach effectively replaces the entire content of the page with the payment status message.
    </script>

    
 



	

    
 
</body>
</html>