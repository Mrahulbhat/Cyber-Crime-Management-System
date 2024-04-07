<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/PhotoRoom-20231020_232757.png">
    <title>Complaint Details</title>
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
            background-image: url(images/newbg2.png);
            background-size: cover;
            font-size: 20px;
        }
        .container {
            margin-top: 30px;
            margin-left: auto;
            margin-right: auto;
            max-width: 600px;
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
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
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
            margin-left: auto;
            margin-right: auto;
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
      <a href="stats.php">Home</a>
      <a href="stats.php">Investigator Portal</a>
      <a href="https://cybercrime.gov.in/">More Info</a>
    </div>
</div>
<div>
    <center><h1 style="margin-top: 40px; color: white;">Complaint Details</h1>

        <form class="container" method="POST" action="displaycasedetails.php">
            <table>
                <tr>
                    <td><label for="fir_no">FIR Number : </label></td>
                    <td><input type="number" name="fir_no" id="fir_no" placeholder="Enter FIR Number" required></td>
                </tr>
            </table>
            <button type="submit">Check Status</button></center>
        </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fir_no = $_POST['fir_no'];

    $servername = "localhost";
    $uname = "root";
    $password = "";
    $db_name = "cyber crime";

    $conn = mysqli_connect($servername, $uname, $password, $db_name);

    if (!$conn) {
        die("Error in creating connection: " . mysqli_connect_error());
    } else {
        $query = "SELECT cd.*, u.user_name, u.user_dob, u.user_sex, u.phone, u.email 
                  FROM case_details cd
                  JOIN users u ON cd.user_id = u.user_id
                  WHERE cd.fir_id = '$fir_no'";
        
        $result = mysqli_query($conn, $query);

        if ($result === false) {
            die("Error in executing query: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $fir_no_result = $row['fir_id'];
            $case_status = $row['status'];
            $case_desc = $row['case_desc'];
            $username = $row['user_name'];
            $age = $row['user_dob'];
            $gender = $row['user_sex'];
            $phone_no = $row['phone'];
            $email = $row['email'];
            $domain=$row['domain'];
            $amount=$row['amount'];

            echo "<style>.showdetailsstatus {display: block;}</style>";
        } else {
            echo "<div class='firnotfound'>FIR ID not found.</div>";
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
                <td>User Name</td>
                <td><?php echo $username;?></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><?php echo $age; ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $gender; ?></td>
            </tr>
            <tr>
                <td>Phone no</td>
                <td><?php echo $phone_no; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php  echo $email;?></td>
            </tr>

            <tr>
                <td>Domain</td>
                <td><?php  echo $domain;?></td>
            </tr>

            <tr>
                <td>Amount</td>
                <td><?php  echo $amount;?></td>
            </tr>
            <tr>
                <td>Case Status</td>
                <td class="<?php echo ($case_status == 'Pending') ? 'case-pending' : 'case-approved'; ?>">
                    <?php echo $case_status; ?>
                </td>
            </tr>
            <tr>
                <td>Case Details</td>
                <td><?php echo $case_desc; ?>
            </td>
           
        </table></center>
</div>
<div style="height: 10vh; background-color: #051f26;width: 100%; margin-top: 190px;">
</div>
</body>
</html>
