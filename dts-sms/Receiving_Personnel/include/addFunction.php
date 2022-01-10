<?php
	#session_start();
	include_once('connection.php');
    
    $rand = sprintf(rand(1,9999999999));
    $tracking_no = $rand;

	if(isset($_POST['add'])){
		$tracking_no       = $_POST['tracking_no'];
	    $file_name         = $_POST["file_name"];
	    $file_description  = $_POST["file_description"];
	    $select_date       = date("Y-m-d H:i:s");
	    #$department        = $_POST["department"];
    
		#php code for attach file#
	    $pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];
	    $tname = $_FILES["myfile"]["tmp_name"];
	    $uploads_dir = 'upload';
	    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    	$type_document     = $_POST["type_document"];

		$sql = "INSERT INTO file_upload (tracking_no, file_name, file_description, select_date, attach_file, type_document) VALUES ('$tracking_no', '$file_name', '$file_description', '$select_date', '$pname', '$type_document')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'File added successfully';
			header('location: view_files.php');
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member added successfully';
		// }
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
		mysqli_close($conn);
	}
	
	 
	
?>