<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$type_document = $_POST['type_document'];
		$description = $_POST['description'];
		$sql = "UPDATE tbl_typedocument SET type_document = '$type_document', description = '$description' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Updated successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select department to edit first';
	}

	header('location: add_typeDocument.php');

?>