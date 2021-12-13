<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
if(!isset($_SESSION))
{
session_start();
}
	$FeedBack=$_POST['txtFeedback'];
	$FDate= date('y/m/d');
	$ApplicantName=$_SESSION['name'];
	
	$con = mysqli_connect ("localhost","root","","job_application");

	$sql = "insert into feedback(jobseeker_Name, feedback_Description,feedback_Date) values('".$ApplicantName."','".$FeedBack."','".$FDate."')";

	


	mysqli_query ($con,$sql);
	mysqli_close ($con);
	
	echo '<script type="text/javascript">alert("Feedback Given Succesfully");window.location=\'ApplicantFeedback.php\';</script>';

?>
</body>
</html>
