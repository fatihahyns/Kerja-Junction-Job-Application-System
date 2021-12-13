<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
    body {
    color: black;
    background: #f7f7f7; /* background*/
    font-family: 'Roboto', sans-serif;
}
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">KERJA JUNCTION</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Employer.php">Our Employer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="AboutUs.php">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="ContactUs.php">Contact Us</a>
    </li>
  </ul>
  <div class="navbar-nav ml-auto action-buttons">
      <div class="navbar-nav">
        <a href="applicant/ApplicantSignin.php" class="nav-item nav-link">Job Seeker</a>
        <a href="employer/signin.php" class="btn btn-primary">Employer</a>
      </div>
      
      </div>
</nav>
<br>

</body>
</html>

</body>
</html>