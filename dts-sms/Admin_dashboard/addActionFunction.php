<?php
//send to
	session_start();
	require_once('connection.php');

	if(isset($_POST['add_dept']))
	{
		$addDept = $_POST['addDept']; 

		$sql = "INSERT INTO tbl_department (department) VALUES ('$addDept')";

		//use for MySQLi OOP
		if($conn->query($sql))
		{
			$_SESSION['ss'] = 'New department successfully added.';
			header('location: add_document.php');
		}
		
	else{
			$_SESSION['err'] = 'Something went wrong while adding the category.';
		}
		header('location: add_document.php');
	}
?>


<?php
	session_start();
	require_once('connection.php');

	if(isset($_POST['add_type']))
	{
		$department = $_POST['department_type']; 
		$addDocType = $_POST['addDocType']; 

		$sql = "INSERT INTO tbl_typedocument (type_document, department) VALUES ('$addDocType', '$department')";

		//use for MySQLi OOP
		if($conn->query($sql))
		{
			$_SESSION['ss'] = 'New document type successfully added.';
			header('location: add_document.php');
		}
		
	else{
			$_SESSION['err'] = 'Something went wrong while adding';
		}
		header('location: add_document.php');
	}
?>

<?php
//document type
	//session_start();
	require_once('connection.php');

	if(isset($_POST['add_action']))
	{
		$addAction = $_POST['addAction']; 

		$sql = "INSERT INTO tbl_action (action) VALUES ('$addAction')";

		//use for MySQLi OOP
		if($conn->query($sql))
		{
			$_SESSION['ss'] = 'New action successfully added.';
			header('location: add_document.php');
		}
		
	else{
			$_SESSION['err'] = 'Something went wrong while adding the category.';
		}
		header('location: add_document.php');
	}
?>