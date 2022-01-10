<?php 

#session_start();

$mysqli = new mysqli('localhost', 'root', '', 'documenttrackingsystem_db') or die(mysqli_error($mysqli));

if(isset($_POST['save']))
{
	$department = $_POST['department'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $num = $_POST['num'];
    
	 $mysqli->query("INSERT INTO register (department, firstname, lastname, email, password, confirm_password, num) VALUES ('$department', '$fname', '$lname', '$email', '$password', '$confirm_password', '$num')") or die($mysqli->error);


	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: view_users.php");

}

if(isset($_GET['delete']))
{
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM register WHERE id=$id") or die($mysqli->error());	

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: users.php");
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

<?php 
require_once "connection_db/connection.php";

$id = $_GET['d_id'];
$status = $_GET['status'];

$sql = "UPDATE register SET status = $status WHERE id = $id";

mysqli_query($conn, $sql);

header("Location: userStatus.php");

?>