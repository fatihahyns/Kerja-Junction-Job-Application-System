<?php
session_start();
?>

<?php if(!isset($_SESSION['idadmin']))header('Location: signin.php')?>

<?php 


	require '../includes/db_connect.php';

	if (isset($_POST["register"])){
		
		$Username = isset($_POST['admin_Username']) ? $_POST['admin_Username'] : ''; 
		$Password = isset($_POST['admin_Password']) ? $_POST['admin_Password'] : ''; 
		$PasswordConfirmation = isset($_POST['admin_PasswordConfirmation']) ? $_POST['admin_PasswordConfirmation'] : '';
		

		//unmatched password
		if ($Password !== $PasswordConfirmation){
			header("Location: registration.php?signup=unmatchedpassword");
			exit();
		}

		else{

			$sql = "INSERT INTO admin (admin_Username, admin_Password) VALUES (?,?)";
					
					$stmt = mysqli_stmt_init($connect);
			 		if (!mysqli_stmt_prepare($stmt, $sql)){
				 		header("Location: registration.php?signup=sqlerror");
						exit();
					}

					else{
						
						$hashedPwd = password_hash($Password, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "ss", $Username, $hashedPwd);
						mysqli_stmt_execute($stmt);
						header("Location: registration.php?signup=success");
				exit();
					}

		}


					
					
		mysqli_stmt_close($stmt);
		mysqli_close($connect);
	}

else{
	header("Location: registration.php");
	
}
?>