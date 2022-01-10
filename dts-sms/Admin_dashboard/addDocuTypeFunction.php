<?php
	session_start();
	require_once('connection.php');

	if(isset($_POST['add_dept']))
	{
		$type_document  = $_POST['type_document'];
		$description  = $_POST['description'];

		$sql = "INSERT INTO tbl_typedocument (type_document, description) VALUES ('$type_document', '$description')";

		//use for MySQLi OOP
		if($conn->query($sql))
		{
			$_SESSION['success'] = 'New type is added';
		}
		
	else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: add_typeDocument.php');
?>