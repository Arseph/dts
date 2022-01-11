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
	#session_start();
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
	#session_start();
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


<?php
	#session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['editActionType'])){
		$id = $_POST['ac_id'];
		$action = $_POST['action'];	
		$action_description = $_POST['action_description'];
		$sql = "UPDATE tbl_action SET action = '$action', action_description = '$action_description' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['ss'] = 'Updated successfully.';
		}
		
		else{
			$_SESSION['err'] = 'Something went wrong. Please try again.';
		}
		header('location: viewActionType.php');
	}

?>


<?php
	#session_start();
	include_once('connection.php');

	if(isset($_GET['ac_id'])){
		$sql = "DELETE FROM tbl_action WHERE id = '".$_GET['ac_id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['ss'] = 'Deleted successfully.';
			header('location: viewActionType.php');
		}
		
		else{
			$_SESSION['err'] = 'Something went wrong. Please try again.';
			header('location: viewActionType.php');
		}
	}

?>

<!--multple delete dept. file-->


<?php
#session_start();
include_once('connection_db/connection.php');

if(isset($_POST['deleteAction']))
{
    $all_id = $_POST['id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM tbl_action WHERE id IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['ss'] = "Deleted successfully.";
        #header("Location: viewDocumentType.php");
    }
    else
    {
        $_SESSION['err'] = "Something went wrong. Please try again.";
        #header("Location: viewDocumentType.php");
    }
    header("Location: viewDocumentType.php");
}

?>