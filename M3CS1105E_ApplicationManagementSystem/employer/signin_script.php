<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: signin.php')?>

<?php
	require '../includes/db_connect.php';

	if (isset($_POST["signin"]))
	{
		

		$Email = isset($_POST['employer_Email']) ? $_POST['employer_Email'] : '';
		$Password = isset($_POST['employer_Password']) ? $_POST['employer_Password'] : '';

		


		$sql = "SELECT * FROM employer WHERE employer_Email= ?";

		$stmt = mysqli_stmt_init($connect);
		
		if (!mysqli_stmt_prepare($stmt, $sql))
		{
			
			echo "Your account is not registered yet!";
			header("Location: signin.php?error=accountnotregistered");
		}

		else
		{
			mysqli_stmt_bind_param($stmt, "s", $Email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			
			if ($row = mysqli_fetch_assoc($result))
			{
				$passCheck = password_verify($Password, $row['employer_Password']);
				
				if ($passCheck == false) 

				{
					 header("Location: signin.php?error=wrongpassword");
					
						
				}
				else if ($passCheck == true) 
				{
					session_start();
					$_SESSION['id'] = $row ['employer_ID'];
					$_SESSION['name'] = $row ['employer_Name'];
					
					
					header("Location: manageVacancy.php?signin=success");
					exit();
				}

				else 
				{
					header("Location: signin.php?error=nouser");
					exit();
				}
			}
			
		}
	}


else {
	echo "No user matching";
	//header("Location: ../login/index.php");
	
}
?>