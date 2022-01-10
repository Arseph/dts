<?php
	#session_start();
	include_once('connection_db/connection.php');
    
    $rand = sprintf(rand(1,9999999999));
    $tracking_no = $rand;

	if(isset($_POST['add'])){
		$tracking_no       = $_POST['tracking_no'];
	    $file_name         = $_POST["file_name"];
	    $file_description  = $_POST["file_description"];
	    date_default_timezone_set('Asia/Manila');
	    $select_date       = date("m/d/Y h:i A"); 
    
		#php code for attach file#
	    $pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];
	    $tname = $_FILES["myfile"]["tmp_name"];
	    $uploads_dir = 'upload';
	    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    	$type_document     = $_POST["type_document"];

		$sql = "INSERT INTO file_upload (tracking_no, file_name, file_description, select_date, attach_file, type_document) VALUES ('$tracking_no', '$file_name', '$file_description', '$select_date', '$pname', '$type_document')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			header('location: draft_files.php');
		}
		
		else{
			$_SESSION['error1'] = 'Something went wrong while adding';
		}
		$_SESSION['success1'] = 'File added successfully';
		mysqli_close($conn);
	}
	
?>
