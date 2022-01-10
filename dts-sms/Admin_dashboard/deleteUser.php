<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM register WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['succUser'] = 'User removed successfully';
		}
		
		else{
			#$_SESSION['errUser'] = 'Something went wrong in deleting member';
		}
	}
	else{
		#$_SESSION['errUser'] = 'Select user to delete first';
	}

	header('location: userStatus.php');
?>

<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM department_users WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['succUser'] = 'User removed successfully';
		}
		
		else{
			#$_SESSION['errUser'] = 'Something went wrong in deleting member';
		}
	}
	else{
		#$_SESSION['errUser'] = 'Select user to delete first';
	}

	header('location: userStatus.php');
?>

<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM releasing_users WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['succUser'] = 'User removed successfully!';
		}
		
		else{
			#$_SESSION['errUser'] = 'Something went wrong in deleting member';
		}
	}
	else{
		#$_SESSION['errUser'] = 'Select user to delete first';
	}

	header('location: userStatus.php');
?>

<?php
	session_start();
	include_once('connection_db/connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM receiving_users WHERE id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['succUser'] = 'User removed successfully!';
		}
		
		else{
			#$_SESSION['errUser'] = 'Something went wrong in deleting member';
		}
	}
	else{
		#$_SESSION['errUser'] = 'Select user to delete first';
	}

	header('location: userStatus.php');
?>

<?php
session_start();
include_once('connection_db/connection.php');

if(isset($_POST['delete_all']))
{
    $all_id = $_POST['user_delete_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM register WHERE id IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['succUser'] = "Multiple Data Deleted Successfully";
        header("Location: userStatus.php");
    }
    else
    {
        $_SESSION['errUser'] = "There were error found while deleting user";
        header("Location: userStatus.php");
    }
}
?>