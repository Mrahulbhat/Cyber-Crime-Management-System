<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/PhotoRoom-20231020_232757.png">
    <title>Complaint Status</title>
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
            margin-left: 400px;
            margin-right: 400px;
            background-color: rgb(187, 183, 183);
            border: 2px solid green;
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
            width: fit-content;
            font-weight: bold;
            border-radius: 10px;
            padding: 5px;
            background-color: rgb(187, 183, 183);
            text-align: center;
        }

        .case-pending {
            background-color: yellow;
        }

        .case-approved {
            background-color: green;
        }


        .showdetailsstatus {
            display: none; /* Initially hide the table */
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
      <a href="firid.php">FIR ID</a>
      <a href="#">FAQ'S</a>
      <a href="https://cybercrime.gov.in/">More Info</a>
    </div>
  </div>
    <div>
        <center><h1 style="margin-top: 40px; color: white;">Complaint Status </h1></center>
        
        <form class="container" method="POST" action="">
            <table>
                <tr>
                    <td><label for="fir_no">FIR Number : </label></td>
                    <td><input type="number" name="fir_no" id="fir_no" placeholder="Enter FIR Number" required></td>
                </tr>
            </table>
            <center><button href="showdetailsstatus" type="submit">Check Status</button></center>
        </form>
    </div>

    <?php
    // PHP part for fetching FIR details from the database
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fir_no = $_POST['fir_no'];

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
            // Check if FIR number exists in the database
            $check_query = "SELECT * FROM `case_details` WHERE `fir_id` = '$fir_no'";
            $result = mysqli_query($conn, $check_query);

            $q1="SELECT `c_name` FROM `criminal_database` WHERE c_id=(SELECT `c_id` FROM `case_details` WHERE `fir_id`='$fir_no')";
            $r1=mysqli_query($conn,$q1);
            
            if (mysqli_num_rows($result) > 0) {
                // FIR number exists, fetch details
                $row = mysqli_fetch_assoc($result);
                $fir_no_result = $row['fir_id']; 
                $case_status = $row['status'];

                if(mysqli_num_rows($r1)>0)
                {
                    $row2 = mysqli_fetch_assoc($r1);
                    $Criminal_name= $row2['c_name'];
                }
                
                $case_exp= $row['case_desc'];
                echo "<style>.showdetailsstatus {display: block;}</style>";
            } else {
                echo "<center><div class='firnotfound'>FIR number not found.</div></center>";
            }
        }
    }
    ?>
    
    <div class="showdetailsstatus" id="showdetailsstatus">
        <!-- Table to display FIR details -->
        <center><table border="1">
            <h2 style="margin-bottom:25px;"> Case Status</h2>
            <tr>
                <td>FIR ID</td>
                <td><?php echo $fir_no_result; ?></td>
            </tr>

            <tr>
                <td>Case Status</td>
                <td class="<?php echo ($case_status == 'Pending'|| 'PENDING') ? 'case-pending' : 'case-approved'; ?>">
                    <?php echo $case_status; ?>
                </td>
            </tr>

            <tr>
                <td>Case Details</td>
                <td><?php echo $case_exp; ?></td>
            </tr>

                        
        </table></center>
    </div>
    <div style="height: 10vh; background-color: #051f26;width: 100%; margin-top: 190px;">
    
  </div>
</body>
</html>
