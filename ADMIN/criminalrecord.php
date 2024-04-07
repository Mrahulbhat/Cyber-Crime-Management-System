<?php
// PHP part for fetching all FIR details from the database

// Connecting to the database
$servername = "localhost";
$uname = "root";
$password = "";
$db_name = "cyber crime"; // Adjusted the database name

// Create a connection
$conn = mysqli_connect($servername, $uname, $password, $db_name);

if (!$conn) {
    die("Error in creating connection: " . mysqli_connect_error());
}

// Fetch all FIR details
$fetch_query = "SELECT * FROM `criminal_database`";
$result = mysqli_query($conn, $fetch_query);

if (!$result) {
    die("Error in fetching data: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/PhotoRoom-20231020_232757.png">
    <title>Criminal Record database</title>
    <style>
        /* Your existing styles remain unchanged */
        * {
            margin: 0;
            padding: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 100;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            color: black;
            background-image: url(images/newbg2.png);
            background-size: cover;
            font-size: 20px;
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

        .criminal-card {
            margin-top: 30px;
            margin-left: 60px;
            margin-right: 60px;
            font-size: 14px;
            width: 300px;
            background-color: rgb(187, 183, 183);
            border: 2px solid green;
            border-radius: 10px;
            padding: 3%;
            display: inline-block;
            margin-bottom: 20px;
        }

        .criminaldisplay {
            max-height: 60vh; /* Set maximum height */
            overflow-y: auto; /* Enable vertical scrolling when content exceeds max-height */
            border: 2px solid black;
        }


        .addinput {
            background-color: rgb(187, 183, 183);
            border: none;
            margin-bottom: 10px;
            width: 90%;
        }

        .add-criminal-form {
            display: none;
            margin-top: 20px;
            margin-left: 450px;
            margin-bottom: 100px;
        }

        .add-criminal-section form {
            margin-top: 20px;
            padding: 20px;
            background-color: grey;
            max-width: 50%;
            border: 2px solid #ddd;
            border-radius: 10px;
        }

        .add-criminal-section button {
            font-size: 15px;
            border: 2px solid #051f26;
            background-color: green;
            padding: 5px 8px;
            color: white;
            cursor: pointer;
            margin-top: 20px;
        }
        /* Add this CSS to style the photos within the criminal cards */
        .criminal-card img {
            max-width: 50%;
            height: auto; /* Ensures the photo maintains its aspect ratio */
            border-radius: 5px; /* Adds a slight border radius for a smoother appearance */
            margin-top: 10px; /* Adjusts the spacing between the text and the photo */
        }

    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="images/Cyber Crime.png" alt="Logo">
        </div>

        <div class="ribbon">
            <a href="displaycasedetails.php">Complaint Details</a>
            <a href="stats.php">INV Dashboard</a>
            <a href="logout.php">Log Out</a>

        </div>
    </div>

    <div class="criminaldisplay">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="criminal-card">
                <h2>Criminal ID: <?php echo $row['c_id']; ?></h2>
                <h2>Name: <?php echo $row['c_name']; ?></h2>
                <p>Date of Birth: <?php echo $row['c_dob']; ?></p>
                <p>Sex: <?php echo $row['c_sex']; ?></p>
                <p>Associated FIR ID: <?php  echo $row['assoc_fir_id']; ?></p>
                <p>No of Cases: <?php  echo $row['noc']; ?></p>
                <img src="<?php echo $row['c_pic']; ?>" alt="Criminal Photo">
            </div>
        <?php
        }
        ?>
    </div>

    <div class="add-criminal-section">
        <center><button onclick="toggleAddCriminalForm()">Add New Criminal</button></center>
        <div class="add-criminal-form" id="addCriminalForm" style="display: none;">
            <form action="criminalrecord.php" method="post" enctype="multipart/form-data">
                <label>Name:</label>
                <input class="addinput" type="text" id="newCriminalName" name="newCriminalName" required><br>

                <label>Date of Birth:</label>
                <input class="addinput" type="date" id="newCriminalDOB" name="newCriminalDOB" required><br>

                <label>Sex:</label>
                <select class="addinput" id="newCriminalSex" name="newCriminalSex" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>

                <label>Photo</label>
                <input class="addinput" type="file" id="photo" name="photo" required><br>

                <label>Assoc. FIR ID</label>
                <input type="text" id="assoc_fir_id" name="assoc_fir_id" required><br>
                <label>No Of Cases</label>
                <input type="number" id="noc" name="noc" required><br>

                <button type="submit">Add Criminal</button>
                <?php
// PHP part for updating FIR details in the database

// Connecting to the database
$servername = "localhost";
$uname = "root";
$password = "";
$db_name = "cyber crime"; // Adjusted the database name

// Create a connection
$conn = mysqli_connect($servername, $uname, $password, $db_name);

if (!$conn) {
    die("Error in creating connection: " . mysqli_connect_error());
}
// PHP part for updating FIR details in the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $c_name = $_POST['newCriminalName'];
    $c_dob = $_POST['newCriminalDOB'];
    $c_sex = $_POST['newCriminalSex'];
    $assoc_fir_id = $_POST['assoc_fir_id'];
    $noc = $_POST['noc'];

    // Handle file upload
    $targetDir = "uploads/";
    $fileName = basename($_FILES["photo"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if file is a valid image
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
            // Create a connection
            $conn = mysqli_connect($servername, $uname, $password, $db_name);
            if (!$conn) {
                die("Error in creating connection: " . mysqli_connect_error());
            }

            // Update criminal details in the database including the picture
            $insert_query = "INSERT INTO `criminal_database` (`c_id`, `c_name`, `c_dob`, `c_sex`,`c_pic`, `noc`, `assoc_fir_id`)
             VALUES (NULL, '$c_name', '$c_dob', '$c_sex','$targetFilePath', '$noc', '$assoc_fir_id')";
            $result = mysqli_query($conn, $insert_query);
            if ($result) {
                header("Location: criminalrecord.php");
                exit(); // Ensure script stops execution after redirection
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            mysqli_close($conn);
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type. Allowed types are jpg, jpeg, png, gif.";
    }
}

?>

            </form>
        </div>
    </div>
    <script>
        function toggleAddCriminalForm() {
            var addCriminalForm = document.getElementById('addCriminalForm');
            if (addCriminalForm.style.display === 'none' || addCriminalForm.style.display === '') {
                addCriminalForm.style.display = 'block';
            } else {
                addCriminalForm.style.display = 'none';
            }
        }
    </script>

</body>

</html>

<?php
mysqli_close($conn);
?>
