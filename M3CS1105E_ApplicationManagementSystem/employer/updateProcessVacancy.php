<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: signin.php')?>

<?php
	require '../includes/db_connect.php';
	if (isset($_POST['update'])){
	$JobID = $_POST['updateid'];
	$Title = isset($_POST['job_Title']) ? $_POST['job_Title'] : '';
	$Category = isset($_POST['job_Category']) ? $_POST['job_Category'] : '';
	$Salary = isset($_POST['job_Salary']) ? $_POST['job_Salary'] : '';
	$Qualification = isset($_POST['job_Qualification']) ? $_POST['job_Qualification'] : '';
	$WorkExperience = isset($_POST['job_Experience']) ? $_POST['job_Experience'] : '';
	$PreferedGender = isset($_POST['job_PreferedGender']) ? $_POST['job_PreferedGender'] : '';
	$Description = isset($_POST['job_Description']) ? $_POST['job_Description'] : '';


	$sql = "UPDATE job SET job_Title='$Title',job_Category='$Category', job_Salary='$Salary',job_Qualification='$Qualification', job_Experience='$WorkExperience', job_PreferedGender='$PreferedGender',job_Description='$Description' WHERE job_ID = '$JobID' ";

	
	$result = mysqli_query($connect, $sql);
	if($result)
	{
		echo '<script>alert("Data updated.");</script>';
		echo "<script>window.location.href ='listVacancy.php'</script>";
	}
	else
	{

		echo '<script>alert("Failed to update the data. Please try again.");</script>';
		echo "<script>window.location.href ='listVacancy.php";
	}
}
?>