<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to coaching management system</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
            background-color: lightgray; /* Light gray background color */
        }

        #video-background {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        #content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: blue;
            padding: 20px;
            font-size: 30px;
        }
        #content1 {
            position: relative;
            z-index: 1;
            text-align: center;
            color: red;
            padding: 20px;
            font-size: 20px;
 
        }

        /* Style for the navigation bar */
        nav {
            background-color: blue; /* Dark background color for the navbar */
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav li {
            margin: 0 15px;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>
<body>

<nav>
    <ul>
        <li><a href="login.php">Admin</a></li>
        <li><a href="login1.php">User</a></li>
        <li><a href="register.php">User Register</a></li>
        <li><a href="contacts.php">Contact</a></li>
        <li><a href="details.php">contact details</a></li>

    </ul>
</nav>

<video id="video-background" autoplay muted loop>
    <source src="dist\img\video.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
<div id="content">


    <h1>Welcome To Coaching Management System</h1>
    </div>
<div id="content1">
    <p>Whatever you choose content will be displayed above navbar .</p>
</div>
</body>
</html>
