#department type
<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['editBtn'])){
		$id = $_POST['dept_id'];
		$department = $_POST['department'];
		$sql = "UPDATE tbl_department SET department = '$department' WHERE dept_id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['ss'] = 'Updated successfully.';
		}
		
		else{
			$_SESSION['err'] = 'Something went wrong. Please try again.';
		}
		header('location: viewDepartmentType.php');
	}

?>

<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['editDocType'])){
		$id = $_POST['doc_id'];
		$type_document = $_POST['type_document'];
		$description = $_POST['description'];
		$sql = "UPDATE tbl_typedocument SET type_document = '$type_document', description = '$description' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['ss'] = 'Updated successfully.';
		}
		
		else{
			$_SESSION['err'] = 'Something went wrong. Please try again.';
		}
		header('location: viewDocumentType.php');
	}

?>

#designation type
<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['editDesType'])){
		$id = $_POST['des_id'];
		$designation = $_POST['designation'];
		$sql = "UPDATE tbl_designation SET designation = '$designation' WHERE des_id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['ss'] = 'Updated successfully.';
		}
		
		else{
			$_SESSION['err'] = 'Something went wrong. Please try again.';
		}
		header('location: viewDesignationType.php');
	}

?>
