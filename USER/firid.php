<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/PhotoRoom-20231020_232757.png">
    <title>FIND FIR ID </title>
    <style>
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

        body{
            color: black;
            background-image: url(images/newbg.png);
            background-size: cover;
            font-size: 20px;
        }
        .container {
            margin-top: 30px;
            margin-left: 470px;
            margin-right: 400px;
            background-color: rgb(187, 183, 183);
            border: 2px solid green;
            width: fit-content;
            border-radius: 10px;
            padding: 3%;
        }
        input{
            border:1px solid #051f26;
            margin: 22px;
            background-color: rgb(220, 223, 222);
            font-size: 18px;

        }

        button{
            font-size: 18px;
            padding: 12px 30px;
            margin: 20px;
            background-color: rgb(42, 143, 42);
            color: white;
            border: 1px solid white;
            border-radius: 7px;
            transition: background 0s;
        }
        button:hover{
            background-color: rgb(12, 70, 12);
            border: 1px solid black;
        }

        .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #051f26;
      padding: 10px;
      color: #fff;
    }

    .logo img {
      height: 10vh;
    }

    .ribbon {
      display: flex;
    }

    .ribbon a {
      color: #fff;
      text-decoration: none;
      font-size: 19px;
      padding: 10px 20px;
      display: inline-block;
    }

    .ribbon a:hover {
      background-color: #113e5c;
      transition: 200ms;
    }

                
        .showdetailsstatus {
            margin-top: 30px;
            margin-left: 400px;
            margin-right: 400px;
            background-color: rgb(187, 183, 183);
            border: 2px solid green;
            border-radius: 10px;
            padding: 3%;
            overflow: auto; /* Add this line to enable scrolling for the table if needed */
        }

        .showdetailsstatus table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .showdetailsstatus table, .showdetailsstatus th, .showdetailsstatus td {
            border: 1px solid black;
            text-align: center;
        }

        .showdetailsstatus th, .showdetailsstatus td {
            padding: 10px;
            text-align: center;
        }

        .showdetailsstatus thead {
            background-color: rgb(42, 143, 42);
            color: white;
        }
        .firnotfound {
            margin-top: 20px; /* Adjust the top margin as needed */
            color: red;
            font-family: 'Times New Roman', Times, serif;
            width: fit-content;
            font-weight: bold;
            font-size: 30px;
            border-radius: 10px;
            padding: 5px;
            background-color: rgb(187, 183, 183);
            text-align: center;
        }
        .firfound {
            margin-top: 20px; /* Adjust the top margin as needed */
            color: green;
            font-family: 'Times New Roman', Times, serif;
            width: fit-content;
            font-weight: bold;
            font-size: 30px;
            border-radius: 10px;
            padding: 5px;
            background-color: rgb(187, 183, 183);
            text-align: center;
        }


    </style>
</head>
<body>
<div class="header">
    <div class="logo">
      <img src="images/Cyber Crime.png" alt="Logo">
    </div>

    <div class="ribbon">
      <a href="index.html">Home</a>
      <a href="#">FAQ'S</a>
      <a href="https://cybercrime.gov.in/">More Info</a>
    </div>
  </div>
    <div>
        <center><h1 style="margin-top: 40px; color: white;">FID ID </h1></center>
        
        <form class="container" method="POST" action="">
            <table>
               
                <tr>
                    <td><label for="email">Email : </label></td>
                    <td><input type="email" name="email" id="email" placeholder="Enter your Email ID" required></td>
                </tr>
            </table>
            <center><button href="showdetailsstatus" type="submit">Submit</button></center>
        </form>
        <div class="firfound">
            
        </div>
    </d>

    <?php
// PHP part for fetching FIR details from the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Connecting to the database
    $servername = "localhost";
    $uname = "root";
    $password = "";
    $db_name = "cyber crime"; // Adjusted the database name

    // Create a connection
    $conn = mysqli_connect($servername, $uname, $password, $db_name);

    if (!$conn) {
        die("Error in creating connection: " . mysqli_connect_error());
    } else {
        // Obtain user id through email
        $user_id_query = "SELECT user_id FROM `users` WHERE `email`='$email'";
        $result_user_id = mysqli_query($conn, $user_id_query);

        if ($result_user_id && mysqli_num_rows($result_user_id) > 0) {
            $row_user_id = mysqli_fetch_assoc($result_user_id);
            $user_id = $row_user_id['user_id'];

            $check_query = "SELECT * FROM `case_details` WHERE `user_id` = '$user_id'";
            $result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($result) > 0) {
                // FIR number exists, fetch details
                $row = mysqli_fetch_assoc($result);
                echo "<center><div class='firfound'>Your FID is " . $row['fir_id'];"</div></center>";
            } else {
                echo "<center><div class='firnotfound'>No details found for this user</div></center>";
            }
        } else {
            echo "<center><div class='firnotfound'>This Email does not exist</div></center>";
        }
    }
}
?>

    
   
    
  </div>
</body>
</html>
