<?php
	session_start();
	require_once('connection.php');

	if(isset($_POST['add_des']))
	{
		$designation  = $_POST['addDesignation'];

		$sql = "INSERT INTO tbl_designation (designation) VALUES ('$designation')";

		//use for MySQLi OOP
		if($conn->query($sql))
		{
			$_SESSION['success'] = 'New type successfully added';
			#header('location: addDesignationType.php');
		}
		
	else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	header('location: viewDesignationType.php');
?>