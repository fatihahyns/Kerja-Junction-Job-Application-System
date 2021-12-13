<?php
session_start();
?>

<?php if(!isset($_SESSION['idadmin']))header('Location: signin.php')?>

<?php
	require '../includes/db_connect.php';

	if (isset($_POST["signin"]))
	{
		
		$Username = isset($_POST['admin_Username']) ? $_POST['admin_Username'] : ''; //admin
		$Password = isset($_POST['admin_Password']) ? $_POST['admin_Password'] : ''; //admin1234


		$sql = "SELECT * FROM admin WHERE admin_Username= ?";

		$stmt = mysqli_stmt_init($connect);
		
		if (!mysqli_stmt_prepare($stmt, $sql))
		{
			
			echo "Your account is not registered yet!";
			header("Location: signin.php?error=accountnotregistered");
		}

		else
		{
			mysqli_stmt_bind_param($stmt, "s", $Username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			
			if ($row = mysqli_fetch_assoc($result))
			{
				$passCheck = password_verify($Password, $row['admin_Password']);
				
				if ($passCheck == false) 

				{
					 header("Location: signin.php?error=wrongpassword");
					
						
				}
				else if ($passCheck == true) 
				{
					session_start();
					$_SESSION['idadmin'] = $row ['admin_ID'];
					$_SESSION['username'] = $row ['admin_Username'];
					
					
					header("Location: manageCategory.php?signin=success");
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