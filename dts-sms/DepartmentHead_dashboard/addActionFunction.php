<?php
//send to
	session_start();
	require_once('connection.php');

	if(isset($_POST['add_dept']))
	{
		$department_ID = $_POST['department_ID']; 
		$addDept = $_POST['addDept']; 

		$sql = "INSERT INTO tbl_department (department) VALUES ('$addDept')";

		//use for MySQLi OOP
		if($conn->query($sql))
		{
			$_SESSION['ss'] = 'New department is successfully added.';
			header('location: add_document.php');
		}
		
	else{
			$_SESSION['err'] = 'Something went wrong. Please try again.';
		}
		header('location: add_document.php');
	}
?>


<?php
	#session_start();
	require_once('connection.php');

	if(isset($_POST['add_type']))
	{
		$department = $_POST['department_type']; 
		$addDocType = $_POST['addDocType']; 

		$email_query2 = "SELECT * FROM tbl_typedocument WHERE type_document='$addDocType'";
		$email_query_run2 = mysqli_query($conn, $email_query2);
		if (mysqli_num_rows($email_query_run2) > 0)
		{
			echo "Data already exists.";
		}

		else if($addDocType == '' || empty($addDocType))
		{
			echo "Field cannot be blank.";
		}
		else
		{
			$sql = "INSERT INTO tbl_typedocument (type_document, department) VALUES ('$addDocType', '$department')";

			if($conn->query($sql))
			{
				echo "New data is successfully added.";
			}
		
			else
			{
				echo "Something went wrong. Please try again.";
			}
				//header('location: add_document.php');
			}
		}
		
?>

<?php
//document type
	//session_start();
	require_once('connection.php');
	if(isset($_POST['add_action']))
	{
		$addAction = $_POST['addAction']; 
		$action = $_POST['action_ID']; 

		$email_query2 = "SELECT * FROM tbl_action WHERE action='$addAction'";
		$email_query_run2 = mysqli_query($conn, $email_query2);
		if (mysqli_num_rows($email_query_run2) > 0)
		{
			echo "Data already exists.";
		}

		else if($addAction == '' || empty($addAction))
		{
			echo "Field cannot be blank.";
		}
		else
		{
			$sql = "INSERT INTO tbl_action (action, department) VALUES ('$addAction', '$action')";

			if($conn->query($sql))
			{
				echo "New data is successfully added.";
			}
		
			else
			{
				echo "Something went wrong. Please try again.";
			}
				//header('location: add_document.php');
			}
		}
?>