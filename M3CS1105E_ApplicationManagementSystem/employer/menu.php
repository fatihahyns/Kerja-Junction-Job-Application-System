<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
  	body {
	color: black;
	background: #f7f7f7; /* background*/
	font-family: 'Roboto', sans-serif;

  .btn {
  background-color: #f7f7f7 ;
  border: none;
  color: black;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;

  .btn:hover {
  background-color: white;
}
}
  </style>
</head>
<body>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">KERJA JUNCTION | EMPLOYER</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="manageVacancy.php">Post Job</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="listVacancy.php">List of Jobs</a>
    </li>
  </ul>

  <ul class="nav navbar-nav ml-auto">
      <button class="btn"><a href="listApplicants.php"><i class="fa fa-bell"></i></button>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["name"];?></a>
                <div class="dropdown-menu dropdown-menu-right">
                     <a class="dropdown-item" href="manageProfile.php">Profile</a>
                    <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>

</nav>
<br>
<?php

?>
</body>
</html>

</body>
</html>