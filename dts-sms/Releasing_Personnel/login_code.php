<?php 
session_start();

require_once('connection_db/connection.php');
    
$username = $password = '';

if (isset($_POST['username'])) 
    {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];   
        $usertype = $_POST['usertype'];
        $department = $_POST['department'];
        $phonenumber = $_POST['phonenumber'];

    }
if(!isset($_SESSION['attempt']))
  {
      $_SESSION['attempt'] = 0;
  }

$sql = "SELECT * FROM register WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql); 

if(mysqli_num_rows($result) > 0) 
{   
    while ($row = mysqli_fetch_assoc($result))
    {
            $id = $row["id"];
            $username = $row["username"];
            $fullname = $row["fullname"];
            $department = $_POST['department'];
            $phonenumber = $_POST['phonenumber'];

            session_start();
            $_SESSION['id'] = $id;
            $_SESSION["username"] = $username;
            $_SESSION["fullname"] = $fullname;
            $_SESSION["department"] = $department;
            $_SESSION["phonenumber"] = $phonenumber;
    }
        #$_SESSION['success'] = 'Login successful';
        header("Location: navbar.php");
        unset($_SESSION['attempt']);
        #$_SESSION['success1'] = 'Welcome '.$_SESSION['fullname'];
}
   else{
         $_SESSION['error'] = 'Invalid username and/or password';
         header("Location: index.php");
        //this is where we put our 3 attempt limit
        $_SESSION['attempt'] += 1;
        //set the time to allow login if third attempt is reach
        if($_SESSION['attempt'] == 3){
          $_SESSION['attempt_again'] = time() + (40);
           $_SESSION['error'] = 'Please wait 40 seconds before attempting to login again.';
          //note 5*60 = 5mins, 60*60 = 1hr, to set to 2hrs change it to 2*60*60
        }
    }

//department head acc
$sql = "SELECT * FROM department_users WHERE username = '$username' AND password = '$password'";
$result1 = mysqli_query($conn, $sql); 

if(mysqli_num_rows($result1) > 0) 
{   
    while ($row = mysqli_fetch_assoc($result1))
    {
            $id = $row["id"];
            $username = $row["username"];
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $usertype = $row["usertype"];
            $department = $row["department"];

            session_start();
            $_SESSION['id'] = $id;
            $_SESSION["username"] = $username;
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["usertype"] = $usertype;
            $_SESSION["department"] = $department;
    }
        $_SESSION['success'] = 'Login successful';
        header("Location: DepartmentHead_dashboard/navbar.php");
        unset($_SESSION['attempt']);
        #$_SESSION['success1'] = 'Welcome '.$_SESSION['fullname'];
}

?>
