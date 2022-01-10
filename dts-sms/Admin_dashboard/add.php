<?php
	#session_start();
	include_once('connection_db/connection.php');
    
    $rand = sprintf(rand(1,9999999999));
    $tracking_no = $rand;

	if(isset($_POST['add'])){
		$tracking_no       = $_POST['tracking_no'];
	    $file_name         = $_POST["file_name"];
	    $file_description  = $_POST["file_description"];
	    $select_date       = date("Y-m-d H:i:s");	
    
		#php code for attach file#
	    $pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];
	    $tname = $_FILES["myfile"]["tmp_name"];
	    $uploads_dir = 'upload';
	    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    	$type_document     = $_POST["type_document"];

		$sql = "INSERT INTO admin_fileupload (tracking_no, file_name, file_description, select_date, attach_file, type_document) VALUES ('$tracking_no', '$file_name', '$file_description', '$select_date', '$pname', '$type_document')";

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


	if(isset($_GET['file_id']))
	{
		$id = $_GET['file_id'];

		$sql = "SELECT * FROM admin_fileupload WHERE id=$id";
		$result = mysqli_query($conn,$sql);
		$file = mysqli_fetch_assoc($result);
		$filepath = 'upload/' . $file['attach_file'];

		if(file_exists($filepath))
		{
			header('Content-Type: application/octet-stream');
			header('Content-Description: File Transfer');
			header('Content-Disposition: attachment; filename=' . basename($filepath));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma:public');
			header('Content-Length:' . filesize('upload/'.$file['attach_file']));

			readfile('upload/' . $file['attach_file']);

			$newCount = $file['downloads'] + 1;
			$updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
			mysqli_query($conn,$updateQuery);
			exit;
		} 
	}

















	
?>

