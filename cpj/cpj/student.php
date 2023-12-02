php
<?php
// Establish a database connection
$conn = mysqli_connect("localhost", "username", "password", "database");

// Check if the form is submitted
if(isset($_POST['submit'])){
    // Get the form data
    $program = $_POST['program'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $age = $_POST['age'];


    // Insert the data into the database
    $query = "INSERT INTO students (program, course, email, name, age) VALUES ('$program', '$course', '$email', '$name', '$age')";
    mysqli_query($conn, $query);

    // Close the database connection
    mysqli_close($conn);

    // Redirect to a success page
    header("Location: success.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
</head>
<body>
    <h2>Student Form</h2>
    <form method="POST" action="">
        <label>;Program:</label>
        <input type="text" name="program" required><br>

        <label>Course:</label>
        <input type="number" name="course" required><br>

        <label>:Email</label>
        <input type="text" name="email" required><br>


        <label>Name:</label>
        <input type="text" name="name" required><br>


        <label>Age:</label>
        <input type="text" name="age" required><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>


