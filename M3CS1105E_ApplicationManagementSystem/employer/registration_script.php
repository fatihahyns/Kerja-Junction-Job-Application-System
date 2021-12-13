<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: signin.php')?>

<?php 


	require '../includes/db_connect.php';

	if (isset($_POST["register"])){
		
		$ContactPerson = isset($_POST['employer_ContactPerson']) ? $_POST['employer_ContactPerson'] : '';
		$Name = isset($_POST['employer_Name']) ? $_POST['employer_Name'] : '';
		$Email = isset($_POST['employer_Email']) ? $_POST['employer_Email'] : '';
		$Password = isset($_POST['employer_Password']) ? $_POST['employer_Password'] : '';
		$PasswordConfirmation = isset($_POST['employer_PasswordConfirmation']) ? $_POST['employer_PasswordConfirmation'] : '';
		$ContactNumber= isset($_POST['employer_ContactNo']) ? $_POST['employer_ContactNo'] : '';
		$Address = isset($_POST['employer_Address']) ? $_POST['employer_Address'] : '';
		$Description = isset($_POST['employer_Description']) ? $_POST['employer_Description'] : '';
		$WebURL = isset($_POST['employer_Website']) ? $_POST['employer_Website'] : '';

		//unmatched password
		if ($Password !== $PasswordConfirmation){
			header("Location: registration.php?signup=unmatchedpassword");
			exit();
		}
		
		//user use id pengguna yang sama
		else {
			$sql = "SELECT employer_Email FROM employer WHERE employer_Email=? LIMIT 1";
			$stmt = mysqli_stmt_init($connect);
			
			if (!mysqli_stmt_prepare($stmt, $sql)){
				 header("Location: registration.php?signup=sqlerror");
				exit();
			}
			
			else{
				mysqli_stmt_bind_param($stmt,"s", $Email);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				
				if ($resultCheck >0){
					header("Location: registration.php?signup=EmailTaken");
			exit();
				}
				
				else{

					$sql = "INSERT INTO employer (employer_ContactPerson, employer_Name, employer_Email, employer_Password, employer_ContactNo, employer_Address, employer_Description, employer_Website) VALUES (?,?,?,?,?,?,?,?)";
					
					$stmt = mysqli_stmt_init($connect);
			 		if (!mysqli_stmt_prepare($stmt, $sql)){
				 		header("Location: registration.php?signup=sqlerror");
						exit();
					}

					else{
						
						$hashedPwd = password_hash($Password, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "ssssssss", $ContactPerson, $Name, $Email, $hashedPwd, $ContactNumber, $Address, $Description, $WebURL);
						mysqli_stmt_execute($stmt);
						header("Location: registration.php?signup=success");
				exit();
					}
					
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($connect);
	}

else{
	header("Location: registration.php");
	
}
?>