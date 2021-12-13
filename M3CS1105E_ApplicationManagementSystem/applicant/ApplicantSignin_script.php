<?php
	require '../includes/db_connect.php';

	if (isset($_POST["appsignin"]))
	{
		

		$AppEmail = isset($_POST['jobseeker_Email']) ? $_POST['jobseeker_Email'] : '';
		$AppPassword = isset($_POST['jobseeker_Password']) ? $_POST['jobseeker_Password'] : '';

		


		$sql = "select * from jobseeker WHERE jobseeker_Email='".$AppEmail."'";

		$stmt = mysqli_stmt_init($connect);
		
		if (!mysqli_stmt_prepare($stmt, $sql))
		{
			
			echo "Your account is not registered yet!";
			header("Location: ApplicantSignin.php?error=accountnotregistered");
		}

		else
		{
			mysqli_stmt_bind_param($stmt, "s", $AppEmail);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			
			if ($row = mysqli_fetch_assoc($result))
			{
				$passCheck = password_verify($AppPassword, $row['jobseeker_Password']);
				
				if ($passCheck == false) 

				{
					 header("Location: ApplicantSignin.php?error=wrongpassword");
					
						
				}
				else if ($passCheck == true) 
				{
					session_start();
					$_SESSION['id'] = $row ['jobseeker_ID'];
					$_SESSION['name'] = $row ['jobseeker_Name'];
					$_SESSION['username'] = $row ['jobseeker_Username'];
					header("Location: ApplicantSearchJob.php?signin=success");
					exit();
				}

				else 
				{
					header("Location: ApplicantSignin.php?error=nouser");
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