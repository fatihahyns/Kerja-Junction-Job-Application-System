<?php
session_start();
?>

<?php if(!isset($_SESSION['idadmin']))header('Location: signin.php')?>

<?php
	require '../includes/db_connect.php';
	if (isset($_POST["update"])){

	$CategoryID = $_POST['updateid'];
	$Name = isset($_POST['category_Name']) ? $_POST['category_Name'] : '';


	$sql = "UPDATE category SET category_Name='$Name' WHERE category_ID = '$CategoryID' ";
	$result = mysqli_query($connect, $sql);
	if($result)
	{
		echo '<script>alert(Data updated.");</script>';
		echo "<script>window.location.href ='manageCategory.php'</script>";
	}
	else
	{
	mysqli_rollback($dbc);
		echo '<script>alert("Failed to update the data. Please try again.");</script>';
		echo "<script>window.location.href ='manageCategory.php";
	}
}
?>