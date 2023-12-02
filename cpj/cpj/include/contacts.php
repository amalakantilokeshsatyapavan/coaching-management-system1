<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cmsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a form with fields like 'name', 'email', and 'message'
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// SQL query to insert data into a 'contacts' table
$sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

// Perform the query
if ($conn->query($sql) === TRUE) {
    echo "Contact details saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();

?>