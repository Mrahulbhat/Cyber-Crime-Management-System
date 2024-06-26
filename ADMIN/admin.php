<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $conn = mysqli_connect('localhost', 'root', '', 'cyber crime');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get user-entered password
    $user_password = $_POST["password"];

    // Query to get admin password
    $sql = "SELECT `password` FROM `admin` WHERE `id`='1'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch password from the result set
        $row = mysqli_fetch_assoc($result);
        $admin_password = $row['password'];

        // Compare user-entered password with admin password
        if ($user_password == $admin_password) {
            // Password is correct, redirect to admin dashboard or perform desired actions
            header("Location: Investigator.php");
            session_start();
            exit();
        } else {
            // Password is incorrect, display error message
            $message = "Incorrect password. Please try again.";
        }
    } else {
        // No admin found with the provided ID, display error message
        $message = "Admin not found.";
    }

    // Close database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/PhotoRoom-20231020_232757.png">
    <title>Admin login Portal</title>
    <style>
        .error-message {
            color: red;
        }
        .success-message{
            color: rgb(4, 216, 4);
        }
        *{
    margin:0;
    padding: 0;
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-weight: 100;
    box-sizing: border-box;
}

html{
    scroll-behavior: smooth;
}
#element{
    color:#5abbf3 ;
    font-size: 28px;
}

body{
    color: white;
    background-color: #051f26;
}

nav{
    display:flex;
    justify-content: flex-end;
    flex-wrap: wrap;
    line-height: 40px;
    font-weight: 300;
    margin-top: 0px;
    margin-left: 55px;
}

/* Add this CSS for the transparent ribbon */
nav.ribbon {
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000; /* Ensure it's above other elements */
}

nav ul li{
    display: inline-block;
    list-style: none;
    margin: 10px 20px;
}
nav ul li a{
    color: white;
    text-decoration: none;
    font-size: 19px;
    font-weight: 100;
    margin-left: 3px;
    font-weight: bolder;
    position: relative;
}

nav ul li a::after{
    content:'' ;
    width: 0%;
    height:3px;
    background:#098ad4;
    position: absolute;
    left: 0;
    bottom: -6px;
    transition: 0.5%;
}

nav ul li a:hover::after{
    width: 100%;

}
.login {
    display: flex;
    background: #182b3a;
    height: auto;
    align-items: center;
    justify-content: center;
    width: fit-content;
    margin: 0 auto;
    margin-top: 40vh; /* Center the element horizontally */
    padding: 2%;
}


.loginbox{
    margin-top: 20px;
    font-size: large;

}

.pass{
    margin: 0;
    padding: 0;
    display: flex;
    background: url(images/pass1.jpg);
    background-size: 100% ;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.password-container {
    background: #182b3a;
    padding: 60px;
    margin-top: 19vh;
    width: 400px;
    height: 41vh;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.password-form {
    display: flex;
    flex-direction: column;
}
h2 {
    color: #fff;
    text-align: center;
}

label {
    margin-top: 10px;
    color: #fff;
}

input {
    padding: 8px;
    margin-top: 5px;
}

button {
    padding: 10px;
    margin-top: 15px;
    background: #4caf50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.pass a{
    font-size: medium;
    margin-top: 12px;
    text-align: right;
    margin-left: 120px;
    color: rgb(231, 200, 231);
    text-decoration: none;
}


button:hover {
    background: #45a049;
}

#header{
    width: 100%;
    height:100vh;
    background-image: url(images/Untitled\ design\ \(1\).png);
    background-size:cover;
    margin-right: 10px;
    background-position: right;
}

.container{
    padding: 10px 10%;
}

.header-text{
    margin-top:18%;
    margin-left: -28px;
    line-height: 49px;
    font-size:30px;
}

.header-text h1{
    font-size: 30px;
    margin-top: 20px;
}

.header-text h1 span{
    color: #3099d6 ;
}

.btn-tocontact{
    display: block;
    margin-top: 70px;
    font-size: 20px;
    background-image: linear-gradient(315deg, #182b3a 0%, #098ad4 74%);
    width: fit-content;
    border: 4.5px solid linear-gradient(315deg, #182b3a 0%, #038ddd 74%);
    padding: 15px 60px;
    border-radius: 6px;
    text-decoration: none;
    color: #fff;
    transition: background 0s;
}

.btn-tocontact:hover{
    background:#1d54a7;
    border: 2px solid #f4f7fa;
}



/*----------------------------contact------------------*/

#contact{
    margin-top: 60px;
    background-color: #020a0c;
    
}


.contact-container{
    display: block;
    margin-left: 270px;
    margin-right: 300px;
}

.contact p  {
    font-size: 20px;
}
.contact i{
    color: #ff004f;
    
}
.social-icons{
    font-size: 30px;
    color: #ababab;
    margin: 5px;
    transition: transform 0.3s ease-in-out; /* Add smooth transition for hover effect */
}

.social-icons:hover{
    font-size: 30px;
    color: #ff004f;
    transform: scale(1.2); /* Increase the scale on hover */;
    margin: 5px;
}





.copyright{
    width: 100%;
    text-align: center;
    padding: 25px 0;
    background-color: #020a0c;
    font-weight: 300;
}

.copyright i{
    color: #ff004f;
}
/*----------------------------second pg-----------------------*/

.secondpg{
    width: 100%;
    height: fit-content;
    background-color: #051f26;
    padding: 10px;
    margin: 30px;
}

.dp-container {
    display: block;
    margin-left: 120px;
    width: fit-content;
    margin-top: 40px;
    border: 5px solid #2078fc;
    margin-right: 120px;
    background-color: #051f26;
    font-size: 17px;
    padding: 28px;
    border-radius: 30px;
    word-spacing: 3.5px;
    line-height: 22px;
    transition: transform 0.3s ease-in-out; /* Add smooth transition for hover effect */
}

.dp-container:hover {
    transform: scale(1.05); /* Increase the scale on hover */
    background-color: #020a0c;
    border: 5px solid #ff004f;
}


.btn-sec{
    display: block;
    margin-top: 50px;
    font-size: 17px;
    background-image: linear-gradient(315deg, #182b3a 0%, #098ad4 74%);
    width: fit-content;
    border: 4.5px solid linear-gradient(315deg, #182b3a 0%, #038ddd 74%);
    padding: 15px 60px;
    border-radius: 6px;
    text-decoration: none;
    color: #fff;
    transition: background 1s;
}

.btn-sec:hover{
    background:#ff004f;
    border: 1px solid #f4f7fa;
}

.video-c{

 display: block;
    margin-left: 300px;
    width: fit-content;
    margin-top: 60px;
    height: 40%;
    border: 5px solid #2078fc;
    margin-right: 250px;
    background-color: #051f26;
    font-size: 18px;
    padding: 22px;
    border-radius: 30px;
    word-spacing: 3.5px;
    line-height: 22px;
    transition: transform 0.3s ease-in-out;
}

.video-c:hover{
    background-color: #020a0c;
    border: 5px solid #ff004f;

}
    </style>
</head>
<body style="margin-top: 00PX;">
    <div class="pass" id="loginscreen">
        <div class="password-container" style="margin-bottom: 350px;">
        <form class="password-form" action="admin.php" method="post">
            <h2 style="margin-bottom: 20px;"> Admin Login Dashboard</h2>
            <input type="password" id="password" placeholder="Enter password" name="password" required>
            <button type="submit">Submit</button>
        </form>
        <p style="margin-top: 10px;" id="message"><?php if(isset($message)) { echo $message; } ?></p>
        </div>
</div>
    
</body>
</html>
