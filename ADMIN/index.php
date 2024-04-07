<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cyber crime";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    // Get user input
    $investigatorId = $_POST['id'];
    $password = $_POST['password'];

    // Sanitize inputs to prevent SQL injection
    $investigatorId = mysqli_real_escape_string($conn, $investigatorId);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if the investigator exists
    $query = "SELECT * FROM investigator WHERE inv_id = '$investigatorId' AND inv_pass = '$password'";
    $result = $conn->query($query);

    // Check if there is a matching record
    if ($result->num_rows > 0) 
    {
        // Login successful
        $row = $result->fetch_assoc();
        
        // Store user data in session variables
        $_SESSION['investigatorId'] = $row['inv_id'];
        $_SESSION['investigatorName'] = $row['inv_name'];
        
        // Redirect to investigator.php
        header("Location: stats.php");
        exit(); // Make sure to exit after header redirection
    } else {
        // Login failed
        echo '<script>alert("Incorrect ID or Password");</script>';

    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/PhotoRoom-20231020_232757.png">

    <title>Investigator Login Dashboard</title>
    

    <style>
        body {
            margin: 0;
            height: fit-content;
            font-family: Arial, sans-serif;
            background-size: cover;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #051f26;
            color: #fff;
            width: 100%;
            height: 12vh;
            box-sizing: border-box;
        }

        .logo img {
            height: 8vh;
            padding-bottom: 10px;
        }

        .ribbon {
            display: flex;
            margin-right: 20px;
        }

        .ribbon a {
            color: #fff;
            text-decoration: none;
            padding: 12px;
            font-size: 21px;
            margin: 10px 15px;
            display: inline-block;
        }

        .ribbon a:hover {
            background-color: #113e5c;
            transition: background-color 0.3s;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin-top: 0;
            color: #051f26;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        label {
            margin-bottom: 5px;
            font-size: 16px;
            color: #333;
            text-align: left;
            width: 100%;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .password-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .password-left, .password-right {
            flex: 1;
        }

        button {
            background-color: #051f26;
            color: #fff;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        button:hover {
            background-color: #113e5c;
        }

        img {
            max-width: 100%;
            margin-top: 20px;
        }

        .left-image {
            position: absolute;
            left: 0;
            top: 0;
            height: 100vh;
            z-index: -1;
        }

        .right-image {
            position: absolute;
            right: 0;
            top: 0;
            height: 100vh;
            z-index: -1;
        }

        .error-message {
            color: red;
        }
        .success-message{
            color: rgb(4, 216, 4);
        }
    </style>

</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="images/Cyber Crime.png" alt="Logo">
        </div>

        <div class="ribbon">
            <a href="admin.php">Admin</a>
        </div>
    </div>

    <img style="height: 40vh; width: auto; margin-left: 38px; border-radius: 100%; margin-top: 180px;" src="images/indianccdlogo.jpeg" alt="Left Image" class="left-image">

    <div style="margin-top: 80px;" class="container">
        <h1>Investigator Login Dashboard</h1>
        
        <form action="index.php" method="post">
            <label for="id">Investigator Id</label>
            <input type="number" placeholder="Enter Investigator Id" id="id" name="id">
            <label style="text-align: left;" for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password">
            
            <button type="submit">Login</button>
        </form>
        <p style="margin-top: 10px;" id="message"></p>
    </div>

    <img class="right-image" style="margin-top: 120px; margin-right: 50px; height: 15vh; width: auto;" src="images/g2india.jpeg" alt="Right Image">
</body>
</html>
