<?php 
session_start();
require_once('connection_db/connection.php');
$username = $password = $fullname = $department = $usertype = '';

if (isset($_POST['username'])) 
{
    #$fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];  
    #$department = $_POST['department']; 
    #$usertype = $_POST['usertype'];
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
        $department = $row['department'];
        $usertype = $row['usertype'];

        #session_start();
        $_SESSION['id'] = $id;
        $_SESSION["username"] = $username;
        $_SESSION["fullname"] = $fullname;
        $_SESSION["department"] = $department;
        $_SESSION["usertype"] = $usertype;
    }
}

?>


<?php
#session_start();
include "connection_db/connection.php";
if(!isset($_SESSION['attempt'])){
      $_SESSION['attempt'] = 0;
  }


if(isset($_POST['btnLogin'])){ 
    $username = $_POST['username'];
    $password = $_POST['password'];

    $releaser = mysqli_query($conn, "SELECT * from register where username = '$username' and password = '$password' and usertype = 'Releasing Officer' ");
    $numrow = mysqli_num_rows($releaser);

    $receiver = mysqli_query($conn, "SELECT * from register where username = '$username' and password = '$password' and usertype = 'Receiving Officer' ");
    $numrow1 = mysqli_num_rows($receiver);

    $head = mysqli_query($conn, "SELECT * from register where username = '$username' and password = '$password' and usertype = 'Department Head' ");
    $numrow2 = mysqli_num_rows($head);

    if($numrow > 0){   
      while($row = mysqli_fetch_array($releaser)){
      $res_id = $row['id'];
      $curr_status = $row['status'];
      }    
      #header ('location: Releasing_Personnel/navbar.php');
      if($curr_status== 1){
      $_SESSION['error'] = "Unable to open your account. Please contact the admin.";
      }else{
        header ('location: Releasing_Personnel/navbar.php');
        unset($_SESSION['attempt']);
        $_SESSION['success1'] = 'Welcome '.$_SESSION['usertype'];
      }
    }

    elseif($numrow1 > 0){
      while($row = mysqli_fetch_array($receiver)){
      $res_id = $row['id'];
      $curr_status = $row['status'];
      }    
      #header ('location: Releasing_Personnel/navbar.php');
      if($curr_status== 1){
      $_SESSION['error'] = "Unable to open your account. Please contact the admin.";
    }else{
        header ('location: Receiving_Personnel/navbar.php');
        unset($_SESSION['attempt']);
        $_SESSION['success1'] = 'Welcome '.$_SESSION['usertype'];
      }
    }

      elseif($numrow2 > 0){
      while($row = mysqli_fetch_array($head)){

      $id = $row["id"];
      $username = $row["username"];
      $fullname = $row["fullname"];
      $department = $row['department'];
      $usertype = $row["usertype"];

      #session_start();
      $_SESSION['id'] = $id;
      $_SESSION["username"] = $username;
      $_SESSION["fullname"] = $fullname;
      $_SESSION["department"] = $department;
      $_SESSION["usertype"] = $usertype;
      $res_id = $row['id'];
      $curr_status = $row['status'];
      }    
      #header ('location: Releasing_Personnel/navbar.php');
      if($curr_status== 1){
      $_SESSION['error'] = "Unable to open your account. Please contact the admin.";
      }else{
          header ('location: DepartmentHead_dashboard/navbar.php');
          unset($_SESSION['attempt']);
          $_SESSION['success1'] = 'Welcome '.$_SESSION['usertype'];
        }
      }

      else{
        $_SESSION['error'] = 'Incorrect username and/or password. Please try again.';
        $_SESSION['attempt'] += 1;
        if($_SESSION['attempt'] == 3)
        {
           $_SESSION['attempt_again'] = time() + (40);
           $_SESSION['error'] = 'Too many failed login attempts. Please try again after 1 minute.';
           //header("Location: index.php");
          //note 5*60 = 5mins, 60*60 = 1hr, to set to 2hrs change it to 2*60*60
        }
      }
}

        
?>