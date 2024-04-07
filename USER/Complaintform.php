<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Form</title>
    <link rel="icon" href="images/PhotoRoom-20231020_232757.png" style="border-radius: 50%;">
    <style>
            body {
                font-family: Arial, sans-serif;
                background-color: rgb(85, 81, 81);
                margin: 0;
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
                background-color: #2980b9;
            }
            .container {
                max-width: 800px;
                margin: 20px auto;
                padding-left: 90px;
                padding-right: 90px;
                border-radius: 19px;
                background-color: #dbd8d8;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            form {
                text-align: left;
            }

            h1 {
                color: #333;
            }

            label {
                display: inline-block;
                margin-bottom: 5px;
            }

            input,
            select {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #085513;
                box-sizing: border-box;
            }

            button {
                padding: 10px 20px;
                background-color: #1a8b0b;
                color: #fff;
                border: 2px solid #1a8b0b;
                border-radius: 8px;
                font-size: large;
                margin-bottom: 30px;
                cursor: pointer;
            }

            button:hover {
                background-color: #085513;
                border: 2px solid #1a8b0b;


            }

            table {
                width: 100%;
                margin-bottom: 20px;
            }
            table input[type="radio"] {
                margin-left: -300px;
            }
            td {
                padding: 8px;
            }

            .footer{
                height: 20vh;
                width: 100%;
                background-color: #051F26;
                margin-top: 30px;
            }
            .note{
                margin-left: 20%;
                text-align: left;
            }

            select {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #085513;
                box-sizing: border-box;
                border-radius: 5px;
                appearance: none;
                background: white url('data:image/svg+xml;utf8,<svg fill="%23085513" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>') no-repeat 95% 50%;
                background-position: calc(100% - 10px) center;
            }

            select option {
                background-color: #dbd8d8;
                font-size: 16px;
                color: #333;
                padding: 2px;
            }

    </style>
    
</head>
<body >
<div class="header">
    <div class="logo">
      <img src="images/Cyber Crime.png" alt="Logo">
    </div>

    <div class="ribbon">
      <a href="index.html">Home</a>
      <a href="https://cybercrime.gov.in/webform/FAQ.aspx">FAQ'S</a>
      <a href="https://cybercrime.gov.in/Webform/Helpline.aspx">Helpline</a>
      <a href="https://cybercrime.gov.in/Webform/Crime_NodalGrivanceList.aspx">Contact</a>
    </div>
  </div>
    <div class="container">
        <form action="Complaintform.php" method="post">
            <h1 style="text-align: center;padding: 20px; margin-top: 30px; margin-bottom: 30px;">Complaint Registration Form</h1>
            <table>
                <tr>
                    <td><label for="username">Full Name : </label></td>
                    <td><input type="text" id="username" name="username" placeholder="Enter Full Name" required></td>
                </tr>
                <tr>
                    <td><label>Gender/Sex :</label></td>
                    <td>
                        <select id="gender" name="gender">
                            <option class="male">Male</option>
                            <option class="female">Female</option>
                            <option class="other">Other</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Date of Birth : </label></td>
                    <td><input type="date" name="dob" id="dob" required></td>
                </tr>

                <tr>
                    <td><label>Phone Number : </label></td>
                    <td><input type="number"name="phone" id="phone" placeholder="Enter Phone Number"></td>
                </tr>

                <tr>
                    <td><label for="email">Email : </label></td>
                    <td><input type="email" id="email" name="email" placeholder="Enter Email Address"></td>
                </tr>
                <tr>
                    <td><label for="address">Address : </label></td>
                    <td><input style="height: 17vh;" type="text" name="address" id="address" placeholder="Enter address including pincode and state"></td>
                </tr>

                <tr>
                    <td><label for="domain">Domain:</label></td>
                    <td>
                        <select id="domain" name="domain" required>
                            <option value="Phishing">Phishing</option>
                            <option value="Online Fraud">Online Fraud</option>
                            <option value="Hacking and Unauthorized Access">Hacking and Unauthorized Access</option>
                            <option value="Malware and Virus Complaints">Malware and Virus Complaints</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label for="frauded_amount">Frauded Amount : </label></td>
                    <td><input type="number" name="amount" id="amount" placeholder="Enter Amount Frauded in Rs" required></td>
                </tr>

                
                
                <tr>
                    <td><label for="case_exp">Case Explanation : </label></td>
                    <td><input style="height: 38vh;" type="text" name="case_exp" id="case_exp" placeholder="Explain the incident"></td>
                </tr>

            </table>
            <br>
            <center><button class="button" type="submit">File Complaint</button></center>
            <br>
           
        </form>
    </div><br><br>
    <?php 
    //php part for inserting values into database
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_name = $_POST['username'];
        $user_dob= $_POST['dob'];
        $user_sex= $_POST['gender'];
        $phone= $_POST['phone'];
        $address=$_POST['address'];
        $email=$_POST['email'];

        $case_desc=$_POST['case_exp'];
        $domain= $_POST['domain'];
        $amount=$_POST['amount'];
                  
        
        //connecting to a database
        $servername = "localhost";
        $uname = "root";
        $password = "";
        $db_name = "cyber crime";

        //create a connection
        $conn = mysqli_connect($servername, $uname, $password, $db_name);

        if (!$conn) {
            die("Error in creating connection" . mysqli_connect_error());
        } else {
            
        }
    
        //insert into table users

        $sql1 = "INSERT INTO `users` (`user_name`, `user_dob`, `user_sex`, `phone`, `address`, `email`)
         VALUES ('$user_name', '$user_dob', '$user_sex', '$phone', '$address', '$email')";

        $result1 = mysqli_query($conn, $sql1);

        // Retrieve the last inserted user_id
        $user_id = mysqli_insert_id($conn);

        if($user_id %2 ==0)
        {
            $inv_id_assoc='1';
        }
        else
        {
            $inv_id_assoc='2';
        }

        $sql2 = "INSERT INTO `case_details` (`user_id`, `case_desc`, `date_filed`, `status`, `domain`, `amount`,`inv_id`) 
                VALUES ('$user_id', '$case_desc', CURRENT_TIMESTAMP, 'PENDING', '$domain', '$amount','$inv_id_assoc')";

        $result2 = mysqli_query($conn, $sql2);

      
        if ($result1 && $result2) {
            echo '<script>
                    window.location.href = "Registered.php";
                  </script>';
        }
    
     else {
        echo  mysqli_error($conn) ;
    }

}
                
?>
     <div class="note">
        <h3 >NOTE : If you are undergone a fraud , immediately report to the nearest Police Station and file and FIR</h3>
    </div>
    <div class="footer">   
    </div>
</body>
</html>


<!---------------------------------------------------------html css js --------------------------------------->


