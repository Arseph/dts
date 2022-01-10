<?php 

#session_start();

$mysqli = new mysqli('localhost', 'root', '', 'documenttrackingsystem_db') or die(mysqli_error($mysqli));

$file_name = '';
$file_description = '';
$type_document = '';

if(isset($_POST['save']))
{
	$tracking_no       = $_POST['tracking_no'];
    $file_name         = $_POST["file_name"];
    $file_description  = $_POST["file_description"];
    $select_date       = date('Y-m-d', strtotime($_POST['select_date']));
    $department        = $_POST["department"];
    
    #php code for attach file#
    $pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];
    $tname = $_FILES["myfile"]["tmp_name"];
    $uploads_dir = 'upload';
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);

    $type_document     = $_POST["type_document"];

    
	 $mysqli->query("INSERT INTO admin_file_upload (tracking_no, file_name, file_description, select_date, department, attach_file, type_document) VALUES ('$tracking_no', '$file_name', '$file_description', '$select_date', '$department', '$pname', '$type_document')") or die($mysqli->error);


	$_SESSION['message'] = "Record has been saved";
	$_SESSION['msg_type'] = "success";

	header("location: view_files.php");

}

if(isset($_GET['delete']))
{
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM admin_fileupload WHERE id=$id") or die($mysqli->error());	

	$_SESSION['message'] = "Record has been deleted";
	$_SESSION['msg_type'] = "danger";

	header("location: view_files.php");
}

if(isset($_GET['edit']))
{
	$id = $_GET['edit'];
	$result = $mysqli->query("SELECT * FROM admin_fileupload WHERE id=$id") or die($mysqli->error());
	if (count($result)==1){
		$row = $result->fetch_array();
		$file_name 			= $row['file_name'];
		$file_description 	= $row['file_description'];
		$type_document 		= $row['type_document'];
	}
}

?>