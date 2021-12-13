<?php
session_start();
?>

<?php if(!isset($_SESSION['idadmin']))header('Location: signin.php')?>

<?php
	require '../includes/db_connect.php';

	$deleteID = $_GET['DelID'];

	$sql = "DELETE FROM employer where employer_ID='$deleteID'";
	$result = mysqli_query($connect, $sql) or die ($sql);
	header ("Location: manageCompany.php");
?>