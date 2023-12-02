<?php
//Include database configuration file
 include("./include/conn.php"); 


if(  isset($_POST["program"]) && !empty($_POST["program"])){
     $s="SELECT courses FROM tblcourses where programcode='".$_POST["program"]."' ";
    $rs = $conn->query($s);
     
    //Count total number of rows
    $rowCount = $rs->num_rows;
    
    if($rowCount > 0){
   echo '<option value="">Select  Courses</option>';
   while($row = $rs->fetch_assoc()){ 
   echo '<option value="'.$row['courses'].'">'.$row['courses'].'</option>';
        }
    }else{
       echo '<option value="">Courses not available</option>';
    }
	
	$query = $conn->query("SELECT * FROM programs where programcode='".$_POST["program"]."' ");
	if($row = $query->fetch_assoc()){
		echo "#".$row['program'];
	}
}

$conn->close();
?>