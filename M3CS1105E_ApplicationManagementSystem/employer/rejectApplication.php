<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: signin.php')?>

<?php
	require '../includes/db_connect.php';
	
	if (isset($_POST['reject'])){

	$applicationID=$_GET['ID'];
	$ApplicantID = isset($_POST['jobseeker_ID']) ? $_POST['jobseeker_ID'] : '';
	$JobID = isset($_POST['job_ID']) ? $_POST['job_ID'] : '';
	$Message = isset($_POST['application_Message']) ? $_POST['application_Message'] : '';
	
	$sql = "UPDATE jobapplication SET jobseeker_ID = '$ApplicantID', job_ID = '$JobID', application_Status ='Rejected', application_Message ='Your application has been rejected' WHERE application_ID = '$applicationID'";

	$result = mysqli_query($connect, $sql);
	if($result)
	{
		echo '<script>alert("Application rejected.");</script>';
		echo "<script>window.location.href ='listApplicants.php'</script>";
	}
	else
	{

		echo '<script>alert("Failed to reject application. Please try again.");</script>';
		echo "<script>window.location.href ='listApplicants.php";
	}
}
?>