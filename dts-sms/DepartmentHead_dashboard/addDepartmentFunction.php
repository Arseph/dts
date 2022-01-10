#Document type
<?php
	session_start();
	require_once('connection.php');

	if(isset($_POST['add_typedocu']))
	{
		#$docID = $_POST['docID'];
		$department = $_POST['department_type'];
		$typedocu  = $_POST['type_document'];
		$description  = $_POST['description'];

		$sql = "INSERT INTO tbl_typedocument (department, type_document, description) VALUES ('$department', '$typedocu', '$description')";

		//use for MySQLi OOP
		if($conn->query($sql))
		{
			$_SESSION['ss'] = 'New type successfully added.';
			header('location: addDocumentType.php');
		}
		
	else{
			$_SESSION['err'] = 'Something went wrong. Please try again.';
		}
		header('location: addDocumentType.php');
	}
?>

#action type
<?php
	session_start();
	require_once('connection.php');

	if(isset($_POST['add_action']))
	{
		#$docID = $_POST['docID'];
		$action_type = $_POST['action_type'];
		$action  = $_POST['action'];
		$description  = $_POST['description'];

		$sql = "INSERT INTO tbl_action (department, action, action_description) VALUES ('$action_type', '$action', '$description')";

		//use for MySQLi OOP
		if($conn->query($sql))
		{
			$_SESSION['ss'] = 'New type successfully added.';
			header('location: addActionType.php');
		}
		
	else{
			$_SESSION['err'] = 'Something went wrong. Please try again.';
		}
		header('location: addActionType.php');
	}
?>