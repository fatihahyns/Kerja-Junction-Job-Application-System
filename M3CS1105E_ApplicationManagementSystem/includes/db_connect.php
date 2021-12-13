<?php
	
	require 'constant.php';

	$connect = mysqli_connect($hostname, $username, $password, $dbname);

	if ($connect->connect_error){
		die ("Database error:". $connect->connect_error);
	}
	

?>