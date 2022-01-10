<?php 

include_once('connection_db/connection.php');
session_start();

    //check submitted email btn
    if(isset($_POST['check_submit_btn']))
    {
    	$email = $_POST['email_id'];
    	$email_query = "SELECT * FROM register WHERE email='$email'";
		$email_query_run = mysqli_query($conn, $email_query);
		if (mysqli_num_rows($email_query_run) > 0)
		{
			echo "Email already exists. Please try another email.";
		}
		else
		{
			//echo "Email is accepted.";
		}
    }

	#Employee Code
	$rand = sprintf(rand(0,99999999));
    $employee_code = $rand;

	if(isset($_POST['addUser'])){
		//$userID = $_POST['userID'];
		$employee_code = $_POST['empcode'];
		$fullname = $_POST['fullname'];
		$department = $_POST['department'];
		$usertype = $_POST['usertype'];
		$email = $_POST['email'];
		//$bday       = date("Y-m-d H:i:s bday");
		$username = $_POST['username'];
		$password = $_POST['password'];
		$phone_number = $_POST['phone_number'];
		//$address = $_POST['address'];	

		$email_query1 = "SELECT * FROM register WHERE fullname='$fullname'";
		$email_query_run1 = mysqli_query($conn, $email_query1);
		//if (mysqli_num_rows($email_query_run) > 0)
		//{
			#$_SESSION['error'] = 'Email already exists. Please try another email.';
			//header('location: users.php');
		//}
		if (mysqli_num_rows($email_query_run1) > 0)
		{
			$_SESSION['err'] = 'User account already exists.';
			header('location: users.php');
		}
		else
		{

			//$sql = "UPDATE register SET employee_code = '$employee_code', usertype = '$usertype' WHERE id = '$userID'";
			$sql = "INSERT INTO register (employee_code, fullname, department, usertype, email, username, password, phone_number) VALUES ('$employee_code', '$fullname', '$department', '$usertype', '$email', '$username', '$password', '$phone_number')";

			//use for MySQLi OOP
			if($conn->query($sql)){
				$_SESSION['ss'] = 'Account created successfully';
				header('location: users.php');
			}
			
			else{
				$_SESSION['err'] = 'Something went wrong while adding';
			}
		}

	header('location: users.php');
	} 



?>


<?php 
	#session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['addUser'])){

		$sql = "INSERT INTO department_users (department, fullname, usertype, email, bday, username, password, phone_number, address) SELECT department, fullname, usertype, email, bday, username, password, phone_number, address FROM register WHERE usertype='Department Head'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success1'] = 'Account created successfully';
			header('location: users.php');
		}
		
		else{
			$_SESSION['error1'] = 'Something went wrong while adding';
		}

	header('location: users.php');
	}	

?>

<?php
	#session_start();
	include_once('connection_db/connection.php');

	if(isset($_POST['addNewEmployee'])){
		$department = $_POST['department'];
		$fullname = $_POST['fullname'];
		#$bday       = date("Y-m-d H:i:s bday");
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$phone_number = $_POST['phone_number'];
		$address = $_POST['address'];	


		$email_query2 = "SELECT * FROM batch_upload WHERE fullname='$fullname'";
		$email_query_run2 = mysqli_query($conn, $email_query2);
		if (mysqli_num_rows($email_query_run2) > 0)
		{
			$_SESSION['errorStat'] = 'Employee already exists.';
			header('location: batchUpload.php');
		}
		else if($department == '' && $fullname == '' && $email == '' && $username == '' && $password == '' && $phone_number == '' && $address == '')
		{
             $_SESSION['errorStat'] = 'Fields cannot be cannot be blank.';
			header('location: batchUpload.php');
        }
		else if($department == '' || empty($department))
		{
             $_SESSION['errorStat'] = 'Department cannot be blank.';
			header('location: batchUpload.php');
        }
        else if($fullname == '' || empty($fullname))
		{
             $_SESSION['errorStat'] = 'Full name cannot be blank.';
			header('location: batchUpload.php');
        }
        else if($email == '' || empty($email))
		{
             $_SESSION['errorStat'] = 'Email cannot be blank.';
			header('location: batchUpload.php');
        }
        else if($username == '' || empty($username))
		{
             $_SESSION['errorStat'] = 'Username cannot be blank.';
			header('location: batchUpload.php');
        }
        #else if($password == '' || empty($password))
		#{
             #$_SESSION['errorStat'] = 'Full name cannot be blank.';
			#header('location: batchUpload.php');
        #}
        else if($phone_number == '' || empty($phone_number))
		{
             $_SESSION['errorStat'] = 'Phone number cannot be blank.';
			header('location: batchUpload.php');
        }

		else
		{
			$sql = "INSERT INTO batch_upload (fullname, department, email, username, password, phone_number, address) VALUES ('$fullname', '$department', '$email', '$username', '$password', '$phone_number', '$address')";

			//use for MySQLi OOP
			if($conn->query($sql)){
				$_SESSION['success1'] = 'New employee added successfully.';
				header('location: batchUpload.php');
			}
			
			else{
				$_SESSION['errorStat'] = 'Something went wrong while adding an employee.';
			}
		}

	header('location: batchUpload.php');
	}
	
?>