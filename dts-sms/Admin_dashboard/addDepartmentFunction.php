<?php
	session_start();
	require_once('connection.php');

	if(isset($_POST['add_dept']))
	{
		$department  = $_POST['addDepartment'];

		$sql = "INSERT INTO tbl_department (department) VALUES ('$department')";

		//use for MySQLi OOP
		if($conn->query($sql))
		{
			$_SESSION['ss'] = 'New department added';
			header('location: addDepartment.php');
		}
		
	else{
			$_SESSION['err'] = 'Something went wrong while adding';
		}
		header('location: addDepartment.php');
	}

?>

#Designation type
<?php
	#session_start();
	require_once('connection.php');

	if(isset($_POST['add_des']))
	{
		$designation  = $_POST['addDesignation'];

		$sql = "INSERT INTO tbl_designation (designation) VALUES ('$designation')";

		//use for MySQLi OOP
		if($conn->query($sql))
		{
			$_SESSION['ss'] = 'New type successfully added';
			header('location: addDesignationType.php');
		}
		
	else{
			$_SESSION['err'] = 'Something went wrong while adding';
		}
		header('location: addDesignationType.php');
	}
?>

#Document type
<?php
	session_start();
	require_once('connection.php');

	if(isset($_POST['add_typedocu']))
	{
		$department = $_POST['department_type']; 
		$typedocu  = $_POST['type_document'];
		$description  = $_POST['description'];

		$sql = "INSERT INTO tbl_typedocument (department, type_document, description) VALUES ('$department', '$typedocu', '$description')";

		//use for MySQLi OOP
		if($conn->query($sql))
		{
			$_SESSION['ss'] = 'New type successfully added!';
			header('location: addDocumentType.php');
		}
		
	else{
			$_SESSION['err'] = 'Something went wrong while adding';
		}
		header('location: addDocumentType.php');
	}
?>
