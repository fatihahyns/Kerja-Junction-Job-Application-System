<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: signin.php')?>

<?php 
	require '../includes/db_connect.php';

	if (isset($_POST["add"])){

	$CompanyName=$_SESSION['name'];
	$ID = isset($_POST['job_ID']) ? $_POST['job_ID'] : '';
	$Title = isset($_POST['job_Title']) ? $_POST['job_Title'] : '';
	$Category = isset($_POST['job_Category']) ? $_POST['job_Category'] : '';
	$Salary = isset($_POST['job_Salary']) ? $_POST['job_Salary'] : '';
	$Qualification = isset($_POST['job_Qualification']) ? $_POST['job_Qualification'] : '';
	$WorkExperience = isset($_POST['job_Experience']) ? $_POST['job_Experience'] : '';
	$PreferedGender = isset($_POST['job_PreferedGender']) ? $_POST['job_PreferedGender'] : '';
	$Description = isset($_POST['job_Description']) ? $_POST['job_Description'] : '';
	$Status = isset($_POST['job_Status']) ? $_POST['job_Status'] : '';
	$DatePosted = isset($_POST['job_DatePosted']) ? $_POST['job_DatePosted'] : date('d-m-Y');

		
	$sql = "INSERT INTO job (job_ID, employer_Name, job_Title, job_Category, job_Salary, job_Qualification, job_Experience, job_PreferedGender, job_Description) values ('$ID', '$CompanyName','$Title','$Category', '$Salary','$Qualification', '$WorkExperience','$PreferedGender', '$Description')";	

	$result = mysqli_query($connect, $sql);
		
			if ($result)
			{

				echo '<script>alert(New data added.");</script>';
				echo "<script>window.location.href ='listVacancy.php'</script>";		
			}
		
			else
			{
				//echo "Query failed. $connect->error";
				echo '<script>alert("Failed to add new data. Please try again.");</script>';
				echo "<script>window.location.href ='manageVacancy.php'</script>";	
			}	
			
	
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Post Job</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #404E67;
    font-family: 'Roboto', sans-serif;
}
.table-wrapper {
    width: 700px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;	
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
} 
.bttn {        
	font-size: 16px;
	color: white;
	background: #5cb656;
	border: none;
	margin-top: 20px;
	min-width: 100px;
	border-radius: 8px;
	padding: 10px;
	#d8544e
}

.bttn1 {        
	font-size: 16px;
	color: white;
	background: #d8544e;
	border: none;
	margin-top: 20px;
	min-width: 100px;
	border-radius: 8px;
	padding: 10px;
	
}



  </style>

</head>
<body>
	<?php require 'menu.php';?>

<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Post a <b>Job</b></h2></div>
                </div>
            </div>
         		  <form class="form-horizontal" name="addvacancy" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-4">Job Title:</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" placeholder="Enter job title" name="job_Title" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4">Category:</label>
      <div class="col-sm-12">
        <select class="form-control" name="job_Category" required>

          <option value="" disabled selected>Select</option>
					<?php
						require '../includes/db_connect.php';

						$sql = mysqli_query($connect, "SELECT category_Name FROM category");

						while($row = $sql->fetch_assoc()){
							echo'<option value="'.$row['category_Name'].'">'.$row['category_Name'].'</option>';
						}
					?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4">Salary (RM):</label>
      <div class="col-sm-12">          
        <input type="text" class="form-control" placeholder="Enter salary" name="job_Salary" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4">Qualification:</label>
      <div class="col-sm-12">      
        <textarea class="form-control"rows="5" placeholder="Enter qualification" name="job_Qualification" required></textarea>
      </div>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-4">Work Experience:</label>
      <div class="col-sm-12">      
        <textarea class="form-control"rows="5" placeholder="Enter work experience" name="job_Experience" required></textarea>
      </div>
     </div>
         <div class="form-group">
      <label class="control-label col-sm-4">Prefered Gender:</label>
      <div class="col-sm-12">
        <select class="form-control" name="job_PreferedGender" required>

          <option value="" disabled selected>Select</option>
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                           <option value="Both">Both</option>
        </select>
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-4">Job Description:</label>
      <div class="col-sm-12">      
        <textarea class="form-control"rows="5" placeholder="Enter job description" name="job_Description" required></textarea>
      </div>
     </div>
                    
    <div class="form-group">        
      <div class="col-8 offset-4">
        <button type="submit" class="bttn" name="add" >Add</button>
        <button type="Reset" class="bttn1" name="reset" >Reset</button>
      </div>
    </div>
  </form>
        </div>
    </div>
</div>     
</body>
</html>