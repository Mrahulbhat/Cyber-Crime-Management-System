<?php
$servername = "localhost";
$uname = "root";
$password = "";
$db_name = "cyber crime"; 
$conn = mysqli_connect($servername, $uname, $password, $db_name);

if (!$conn) {
    die("Error in creating connection: " . mysqli_connect_error());
}
session_start();


$fetch_query = "SELECT * FROM `case_details`";
$result = mysqli_query($conn, $fetch_query);

if (!$result) {
    die("Error in fetching data: " . mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>
<link rel="icon" href="images/PhotoRoom-20231020_232757.png">
<link rel="stylesheet" href="stats.css">
</head>
<body>

<div class="header">
    <div class="logo">
        <img src="images/Cyber Crime.png" alt="Logo">
    </div>

    <div class="ribbon">
        <a href="displaycasedetails.php">Complaint Details</a>
        <a href="criminalrecord.php">Criminal Record</a>
        <a href="admin.html">Database</a>
        <a href="logout.php">Logout</a>
        <a style="background-color:green; color:white;" href="#"><?php echo "ADMIN"; ?></a>
    <style>
        .ribbon a{
            border-radius: 10px;
            margin-left: 10px;
        }
        .ribbon a:hover{
            border-radius: 10px;
        }
    </style>
</a>

    </div>
</div>

<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Allcases')" id="defaultOpen">All Cases</button>
    <button class="tablinks" onclick="openCity(event, 'Pending')">Pending Cases</button>
    <button class="tablinks" onclick="openCity(event, 'Solved')">Solved Cases</button>
    <button class="tablinks" onclick="openCity(event, 'update')">Edit Role</button>
    
</div>

<div id="Allcases" class="tabcontent">
    <h1>List of All Cases</h1>
    <div class="displaycases">
        <table border=1 style="width:120%;margin-left:-70px;">
            <tr>
                <th>Fir Id</th>
                <th>User Id</th>
                <th>User Name</th>
                <th>Inv Id</th>
                <th>Domain</th>
                <th>Date of Report</th>
                <th>Date Solved</th>
                <th>Criminal Id</th>
                <th>Status</th>

            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['user_id']; 
                $sql_username = "SELECT `user_name` FROM `users` WHERE `user_id` = '$user_id'";
                $result_username = mysqli_query($conn, $sql_username);
            
                if (!$result_username) {
                    die("Error in fetching usernames: " . mysqli_error($conn));
                }
            
                $row_users = mysqli_fetch_assoc($result_username); 
            
                echo "<tr>";
                echo "<td>" . $row['fir_id'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row_users['user_name'] . "</td>"; 
                echo "<td>" . $row['inv_id'] . "</td>";
                echo "<td>" . $row['domain'] . "</td>";
                echo "<td>" . $row['date_filed'] . "</td>";
                echo "<td>" . $row['date_solved'] . "</td>";
                echo "<td>" . $row['c_id'] . "</td>";                
                echo "<td class='" . ($row['status'] == 'PENDING' ? 'case-Pending' : 'case-approved') . "'>" . $row['status'] . "</td>";
                echo "</tr>";
            }
            
            
            if(mysqli_num_rows($result)==0)
            {
                //echo ;
                echo "<tr>";
                echo "<td colspan='5' style='font-weight: bold;'>No Data Found</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>

<div id="Pending" class="tabcontent">
<h1>List of All Pending Cases</h1>
    <div class="displaycases">
        <table border=1>
            <tr>
                <th>Fir Id</th>
                <th>Date of Report</th>
                <th>User Id</th>
                <th>Domain</th>
                <th>Status</th>
            </tr>
            <?php
            // Display all rows from the result set
            $fetch_query_pending = "SELECT * FROM `case_details` WHERE `status`='PENDING'";

            $result_pending = mysqli_query($conn, $fetch_query_pending);
            while ($row = mysqli_fetch_assoc($result_pending)) {
                echo "<tr>";
                echo "<td>" . $row['fir_id'] . "</td>";
                echo "<td>" . $row['date_filed'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['domain'] . "</td>";
                echo "<td class='" . ($row['status'] == 'PENDING' ? 'case-Pending' : 'case-approved') . "'>" . $row['status'] . "</td>";
                echo "</tr>";
            }
            if(mysqli_num_rows($result_pending)==0)
            {
                //echo ;
                echo "<tr>";
                echo "<td colspan='5' style='font-weight: bold;'>No Data Found</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>

<div id="Solved" class="tabcontent">
<h1>List of All Solved Cases</h1>
    
    <div class="displaycases">
        <table border=1 style="width:120%;margin-left:-70px;">
            <tr>
                <th>Fir Id</th>
                <th>User Id</th>
                <th>User Name</th>
                <th>Inv Id</th>
                <th>Domain</th>
                <th>Date of Report</th>
                <th>Date Solved</th>
                <th>Criminal Id</th>
                <th>Status</th>

            </tr>
            <?php
            $fetch_query_success = "SELECT * FROM `case_details` WHERE `status`='success'";
            $result_success = mysqli_query($conn, $fetch_query_success);
            while ($row = mysqli_fetch_assoc($result_success)) {
                $user_id = $row['user_id']; 
                $sql_username = "SELECT `user_name` FROM `users` WHERE `user_id` = '$user_id'";
                $result_username = mysqli_query($conn, $sql_username);
            
                if (!$result_username) {
                    die("Error in fetching usernames: " . mysqli_error($conn));
                }
            
                $row_users = mysqli_fetch_assoc($result_username); 
            
                echo "<tr>";
                echo "<td>" . $row['fir_id'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row_users['user_name'] . "</td>"; 
                echo "<td>" . $row['inv_id'] . "</td>";
                echo "<td>" . $row['domain'] . "</td>";
                echo "<td>" . $row['date_filed'] . "</td>";
                echo "<td>" . $row['date_solved'] . "</td>";
                echo "<td>" . $row['c_id'] . "</td>";                
                echo "<td class='" . ($row['status'] == 'PENDING' ? 'case-Pending' : 'case-approved') . "'>" . $row['status'] . "</td>";
                echo "</tr>";
            }
            
            
            if(mysqli_num_rows($result)==0)
            {
                //echo ;
                echo "<tr>";
                echo "<td colspan='5' style='font-weight: bold;'>No Data Found</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>
<style>
    #update{
        background-image: url(images/update.png);
        background-size: cover;
    }
</style>
<div id="update" class="tabcontent">
    <h1>Transfer Case to other Investigator</h1>
    <div class="updatetable">
        <form action="Investigator.php" method="post">
        <table border="1">
            <tr>
                <td class="updatelabel">FIR ID</td>
                <td><input class="updateinput" type="number" id="fir_id" name="fir_id" placeholder="Enter FIR ID"></td>
            </tr>
            <tr>
                <td class="updatelabel">Investigator Id</td>
                <td><input class="updateinput" type="number" id="inv_id" name="inv_id" placeholder="Enter INV ID"></td>
            </tr>
           
                        
        </table>
        <button class="btn-edit1" type="submit" >Update</button>
        <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fir_id_t = $_POST['fir_id'];
    $inv_id_new = $_POST['inv_id'];

    $update_query = "UPDATE `case_details` SET `inv_id` = '$inv_id_new' WHERE `fir_id` = '$fir_id_t'";
    $result_update = mysqli_query($conn, $update_query);



    if ($result_update) {
        echo "<script>alert('Case Transferred  successfully.');
        window.location.href = window.location.href;</script>";
    }
     else {
        echo "<script>alert('Error updating case status.')</script>";
    }
}
?>
        
    </form>    
    <style>
        
        .updatetable {
    margin: 20px;
    border: none;
    margin-left: 400px;
    margin-right: 400px;
}

.updatetable table {
    border-collapse: collapse;
    width: 100%;
}

.updatetable td {
    padding: 8px;
    border: 1px solid #ddd;
}

.updatetable .updatelabel {
    font-weight: bold;
}

.updatetable .updateinput {
    width: 100%;
    padding: 6px;
    box-sizing: border-box;
}

.btn-edit1 {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

.btn-edit1:hover {
    background-color: #45a049;
}

    </style>    
    </center>
</div>
</div>


<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</body>
</html>
