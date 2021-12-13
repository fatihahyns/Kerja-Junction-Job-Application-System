<?php

	require '../includes/db_connect.php';

	if (isset($_POST["appregister"])){
	
		$AppName = isset($_POST['jobseeker_Name']) ? $_POST['jobseeker_Name'] : '';
		$AppNationality=isset($_POST['jobseeker_Nationality']) ? $_POST['jobseeker_Nationality'] : '';
		$AppAddress=isset($_POST['jobseeker_Address']) ? $_POST['jobseeker_Address'] : '';
		$AppEmail=isset($_POST['jobseeker_Email']) ? $_POST['jobseeker_Email'] : '';
		$AppPhone=isset($_POST['jobseeker_Phone']) ? $_POST['jobseeker_Phone'] : '';
		$AppQualification=isset($_POST['jobseeker_Qualification']) ? $_POST['jobseeker_Qualification'] : '';
		$AppGender=isset($_POST['jobseeker_Gender']) ? $_POST['jobseeker_Gender'] : '';
		$AppBirthDate=isset($_POST['jobseeker_BirthDate']) ? $_POST['jobseeker_BirthDate'] : '';
		$AppUsername=isset($_POST['jobseeker_Username']) ? $_POST['jobseeker_Username'] : '';
		$AppPassword=isset($_POST['jobseeker_Password']) ? $_POST['jobseeker_Password'] : '';
		$file_name = $_FILES['jobseeker_Resume']['name'];

		//$con = mysqli_connect("localhost","root","","job_jobseekerlication");
	
			$sql = "SELECT jobseeker_Email FROM jobseeker WHERE jobseeker_Email=? LIMIT 1";
			$stmt = mysqli_stmt_init($connect);
			
			if (!mysqli_stmt_prepare($stmt, $sql)){
				 header("Location: ApplicantReg.php?signup=sqlerror");
				exit();
			}
			
			else{
				mysqli_stmt_bind_param($stmt,"s", $AppEmail);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				
				if ($resultCheck >0){
					header("Location: ApplicantReg.php?signup=EmailTaken");
					exit();
				}
				
				else{//sini

					//upload file
    				if ($file_name!='')
    				{
    					$ext = pathinfo($file_name, PATHINFO_EXTENSION);
				        $allowed = ['pdf'];
				    
				        //check if it is valid file type
				        if (in_array($ext, $allowed))
				        {
				        	// read file data into a variable for inserting
            				$file_data = addslashes(file_get_contents($_FILES['jobseeker_Resume']['tmp_name']));

            				$sql = "INSERT INTO jobseeker (jobseeker_Name, jobseeker_Nationality, jobseeker_Address, jobseeker_Email, jobseeker_Phone, jobseeker_Qualification, jobseeker_Resume, jobseeker_ResumeName, jobseeker_Gender, jobseeker_BirthDate, jobseeker_Username, jobseeker_Password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
							
							$stmt = mysqli_stmt_init($connect);
							if (!mysqli_stmt_prepare($stmt, $sql))
							{
								header("Location: ApplicantReg.php?signup=sqlerror");
								exit();
							}

							else{
									
							$hashedPwd = password_hash($AppPassword, PASSWORD_DEFAULT);
							mysqli_stmt_bind_param($stmt, "ssssssssssss", $AppName, $AppNationality, $AppAddress, $AppEmail, $AppPhone, $AppQualification, $file_data, $file_name, $AppGender, $AppBirthDate, $AppUsername, $hashedPwd);
							mysqli_stmt_execute($stmt);
							header("Location: ApplicantReg.php?signup=success");
							exit();
							}
    					}
    				}

					

					
					
				}//habis sini
			}

		mysqli_stmt_close($stmt);
		mysqli_close($connect);
}
else{
	header("Location: ApplicantReg.php");	
}
?>
