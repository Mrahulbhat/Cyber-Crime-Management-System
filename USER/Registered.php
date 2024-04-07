<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/PhotoRoom-20231020_232757.png" style="border-radius: 50%;">
  <title>Registration Success</title>
  <style>
    body {
      margin: 0;
      height: fit-content;
      font-family: Arial, sans-serif;
      background:url(images/hackerbg.png);
      background-size: cover;
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

    .container {
      max-width: 800px;
      margin: 60px auto; /* Center the container */
      background-color: #aca5a5;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .status-button {
    display: inline-block;
    padding: 14px 16px;
    text-align: center;
    text-decoration: none;
    background-color: #051f26;
    margin-top: 30px;
    border: 3px solid #051f26;
    margin-left: 20px;
    color: #fff;
    border-radius: 6px;
    transition: background-color 0.3s ease;
  }

  .status-button:hover {
    background-color: #07588f;
    border:3px solid #051f26;
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
      <a href="statuscheck.php">Complaint Status</a>
      <a href="firid.php">FIR ID</a>
      <a href="https://cybercrime.gov.in/">More Info</a>
    </div>
  </div>

  <div class="container">
    <h1 style="color: rgb(5, 100, 5);">Your Complaint has been Registered Successfully!!</h1>
    <h3 style="text-align: left;">Thank You for Filing your case and Raising voice against Cyber Crime.<br>
        Our team will do their best to solve the case and will keep you updated with your case.
         Hence we request you to wait patiently.<br><br>
        You can always check the status of your case by Clicking on the <a href="statuscheck.php">Complaint Status</a> on the
         home page of the website.<br>To Know your FIR ID , click on FIR ID button
    </h3>
    
    <center><a class="status-button" href="statuscheck.php">Complaint Status</a>
    <a class="status-button" href="firid.php">Know my FIR ID</a>
  </center>
  </div>
  <div style="height: 20vh; background-color: #051f26;width: 100%; margin-top: 150px;">
    
  </div>
  
</body>
</html>
