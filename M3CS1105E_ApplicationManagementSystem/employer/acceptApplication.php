<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: signin.php')?>

<?php
	require '../includes/db_connect.php';
	
	if (isset($_POST['send'])){

	$AppliedID=$_GET['ID'];
	$ApplicantID = isset($_POST['jobseeker_ID']) ? $_POST['jobseeker_ID'] : '';
	$JobID = isset($_POST['job_ID']) ? $_POST['job_ID'] : '';
	$Description = isset($_POST['application_Message']) ? $_POST['application_Message'] : '';
	
	$sql = "UPDATE jobapplication SET jobseeker_ID = '$ApplicantID', job_ID = '$JobID', application_Status ='Accepted', application_Message ='$Description' WHERE application_ID = '$AppliedID'";

	$result = mysqli_query($connect, $sql);
	if($result)
	{
		echo '<script>alert("Message sent.");</script>';
		echo "<script>window.location.href ='listApplicants.php'</script>";
	}
	else
	{

		echo '<script>alert("Failed to send the message. Please try again.");</script>';
		echo "<script>window.location.href ='listApplicants.php";
	}
}
?>