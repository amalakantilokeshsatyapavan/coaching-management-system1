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

// Process registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $level = $_POST["level"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, password, level) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $level);

    // Execute the statement
    if ($stmt->execute()) {
        $registrationMessage = "Registration successful!";
    } else {
        $registrationMessage = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            color: #4caf50;
            margin-top: 16px;
        }

        .error {
            color: #f44336;
            margin-top: 16px;
        }
    </style>
</head>
<body>

<form id="registerForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <label for="level">level:</label>
    <div class="card-header bg-danger">enter only user</div>

    <input type="text" name="level" id="level">

    <button type="submit">Register</button>

    <?php
    if (isset($registrationMessage)) {
        echo '<p class="message">' . $registrationMessage . '</p>';
    }
    ?>
</form>

</body>
</html>
