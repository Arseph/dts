<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$file_name         = $_POST["file_name"];
	    $file_description  = $_POST["file_description"];
	    $select_date       = date("Y-m-d H:i:s");

		#php code for attach file#
	    $pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];
	    $tname = $_FILES["myfile"]["tmp_name"];
	    $uploads_dir = 'upload';
	    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    	$type_document     = $_POST["type_document"];
		
		$sql = "UPDATE file_upload SET file_name = '$file_name', file_description = '$file_description', select_date = '$select_date', attach_file = '$pname', type_document = '$type_document' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'File updated successfully!';
		}
		
		else{ 
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select file to edit first';
	}

	header('location: draft_files.php');

?>