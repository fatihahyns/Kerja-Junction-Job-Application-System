<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: signin.php')?>

<?php
	require '../includes/db_connect.php';

	$deleteID = $_GET['DelID'];

	$sql = "DELETE FROM job where job_ID='$deleteID'";

	
	$result = mysqli_query($connect, $sql) or die ($sql);
	header ("Location: listVacancy.php");
?>