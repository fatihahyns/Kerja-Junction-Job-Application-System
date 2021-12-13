<?php
if(!isset($_SESSION))
{
session_start();
}
?>
<html>
<body>
<?php
	$JobId=$_GET['job_ID'];
	$ApplicantID=$_SESSION['id'];
	$Status="Apply";
	$Desc="No Message";
	
	// Establish Connection with MYSQL
	$con1 = mysqli_connect ("localhost","root","","job_application");

	// Specify the query to Insert Record
	$sql1 = "select * from jobapplication where jobseeker_ID='".$ApplicantID."' and job_ID='".$JobId."'";
	// execute query
	$result1 = mysqli_query ($con1,$sql1);
	$records1 = mysqli_num_rows($result1);
	// Close The Connection
	mysqli_close ($con1);
	if($records1==0)
	{
	
	// Establish Connection with MYSQL
	$con = mysqli_connect ("localhost","root","","job_application");

	// Specify the query to Insert Record
	$sql = "insert into jobapplication (jobseeker_ID,job_ID,application_Status,application_Message) values('".$ApplicantID."','".$JobId."','".$Status."','".$Desc."')";
	// execute query
	mysqli_query ($con,$sql);
	// Close The Connection
	mysqli_close ($con);
	
	echo '<script type="text/javascript">alert("Succesfully Applied For Job");window.location=\'ApplicantSearchJob.php\';</script>';
}
else
{
echo '<script type="text/javascript">alert("You have already Applied For Job");window.location=\'ApplicantSearchJob.php\';</script>';
}
?>
</body>
</html>