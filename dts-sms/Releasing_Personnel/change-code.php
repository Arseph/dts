<?php
session_start(); 
require_once('connection_db/connection.php');

if (isset($_POST['submitPass']))
  {
  $currentPass = $_POST['currentpassword'];
  $newPass = $_POST['newpassword'];
  $confirmPass = $_POST['confirmpassword'];
  $user = $_SESSION['username'];
  $password_query = mysqli_query($conn, "SELECT password from register where username = '$user'");
  $password_row = mysqli_fetch_array($password_query);
  $database_password = $password_row['password'];
  if ($database_password == $currentPass)
    {
    if ($newPass == $confirmPass)
      {
      $update_pwd = mysqli_query($conn, "UPDATE register set password ='$newPass' where username = '$user'");
      $_SESSION['success1']="Password successully changed";
      header("Location: changePassword.php");
      }
      else
      {
      $_SESSION['error1']="New Password and Confirm Password field does not match";
      header("Location: changePassword.php");
      }
    }
    else
    {
    $_SESSION['warning1']="Your current password is incorrect";
    header("Location: changePassword.php");
    }
  }
 
?>
