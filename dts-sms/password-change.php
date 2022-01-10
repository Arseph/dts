<?php
//include('includes/login_code.php');
//$message="";

  include 'connection_db/connection.php';

if (isset($_POST['change_password'])) {
	global $conn, $errors;

  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  $token = $_POST['password_token'];

  if(!empty($token)){
    if(!empty($new_password) && !empty($confirm_password)){
      $check_token = "SELECT password_token FROM register WHERE password_token ='$token' LIMIT 1";
      $check_token_run = mysqli_query($conn, $check_token);

      if(mysqli_num_rows($check_token_run) > 0){
        if($new_password == $confirm_password){
          $update_password = "UPDATE register SET password='$new_password' WHERE password_token='$token' LIMIT 1";
          $update_password_run = mysqli_query($conn, $update_password);

          if($update_password_run){
            $new_token = md5(rand())."funda";
            $update_to_new_token = "UPDATE register SET passsword_token='$new_token' WHERE password_token='$token' LIMIT 1";
            $update_to_new_token_run = mysqli_query($conn, $update_to_new_token);

            echo "<script type='text/javascript'>alert('You have successfully changed your password.'); window.location.href = 'index.php';</script>";
          }
          else{
            echo "<script type='text/javascript'>alert('Error: Something went wrong.')</script>";
          }
        }
        else{
          echo "<script type='text/javascript'>alert('New and Confirm Password does not match')</script>";
        }
      }
      else{
        echo "<script type='text/javascript'>alert('Invalid token.')</script>";
      }
    }
    else{
       echo "<script type='text/javascript'>alert('All fields are required.')</script>";
    }
  }
  else{
    echo "<script type='text/javascript'>alert('No toke available.')</script>";
  }

}

?>

<!DOCTYPE html>
<HTML>
<HEAD>
	<TITLE>Document Tracing System</TITLE>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/home2.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/home.css" type="text/css" />
	<link href="assets/css/phppot-style.css" type="text/css"
		rel="stylesheet" />
	<link href="assets/css/reg.css" type="text/css"
		rel="stylesheet" />
	<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>

<BODY>


  <div class="phppot-container">
    <div class="sign-up-container">

      <div class="signup-align">

          <!--<div class="portal-logo">
            <img src="logo.jpg" alt="Career Hunt Logo" style="float:left;width:80px;height:60px;">
          </div> -->
          <br>
          <div style="font-size:22px;margin-left:45px"><b>Change Password</b></div>
          <hr><br>







      <form action="" method="post">
        <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">
        <div class="row" style="margin-left:-5px">
          <div class="inline-block">
            <div class="form-label">
              New Password<span class="required" id="new-info"></span>
            </div>
            <input class="input-box-330" type="password" name="new_password" id="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 characters."
              value="<?=( isset( $_POST['new_password'] ) ? $_POST['new_password'] : '' )?>" />
              <input type="checkbox" onclick="myFunction1()" style="cursor:pointer;width:30px;height:20px;margin-left:-80px">Show
          </div>
        </div>
        <div class="row" style="margin-left:-5px">
          <div class="inline-block">
            <div class="form-label">
              Confirm Password<span class="required" id="confirm-info"></span>
            </div>
            <input class="input-box-330" type="password" name="confirm_password" id="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 characters."
              value="<?=( isset( $_POST['confirm_password'] ) ? $_POST['confirm_password'] : '' )?>" />
              <input type="checkbox" onclick="myFunction2()" style="cursor:pointer;width:30px;height:20px;margin-left:-80px">Show
          </div>
        </div>

          <div class="row" style="margin-top:20px">
            <input class="btn" type="submit" name="change_password" id="change_password" style="background-color:#94DB00" value="Submit">
          </div><br>


            </form>
          </div>
          <br>

    </div>
  </div>


</BODY>
</HTML>

<script>
function myFunction1() {
  var x = document.getElementById("new_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction2() {
  var x = document.getElementById("confirm_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
