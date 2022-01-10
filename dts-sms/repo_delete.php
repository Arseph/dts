<?php
include_once('connection_db/connection.php');
if(isset($_GET['repo_id']))
{
	$id = $_GET['repo_id'];
	$sql = "UPDATE user_repo_folder SET void = '1' WHERE id = '$id'";
	$conn->query($sql);
} else {
	$sql = "UPDATE user_repo_folder SET void = '0'";
}

header("Location: ../dts-sms/Admin_Dashboard/view_files.php");
?>