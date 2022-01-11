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

            #echo "<script type='text/javascript'>alert('You have successfully changed your password.'); window.location.href = 'index.php';</script>";
            $_SESSION['status'] = "You have successfully changed your password.";
            header("Location: index.php");
          }
          else{
            $_SESSION['err'] = "Something went wrong. Please try again.";
            header("Location: password-change.php");
          }
        }
        else{
          echo "<script type='text/javascript'>alert('New and Confirm Password does not match.')</script>";
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
    echo "<script type='text/javascript'>alert('No token available.')</script>";
  }

}

?>

<!DOCTYPE html>
<HTML>
<HEAD>
  <TITLE>Change Password | Document Tracing System</TITLE>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="img/png" href="img/dtslogo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</HEAD>

<BODY style="background-color: #0062CC; position: fixed;">

                  <div class="card shadow" style="width:380px; margin-top: 30%; margin-left: 118%; border: none">
                    <div class="card-header" style="height: 50px; background-color: #3993DE; border: none;">
                      <h6 style="text-align: center; font-size: 17px; margin-top: 1%; color: #fff; text-shadow: 2px 2px 1px #2679D3; font-weight: 600"> &nbsp;Reset Password</h6>
                    </div>
                      <div class="card-body p-4">
                          
                          <form action="" method="post">
                              <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">
                              <div class="form-group input-icons">
                                <i toggle="#password-field" class="fa fa-fw fa-eye icon toggle-password" style="cursor: pointer;"></i>

                                  <label style="margin-left: 5%; font-size: 13px">New Password <small style="font-size: 14px; font-weight: 550;color: red;">*</small></label>
                                  <input type="password" name="new_password" id="new_password" class="form-control pass" style="font-size: 13px; border: 1.2px solid #0062CC; background-color: none; width: 90%; margin-left: 5%;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 characters."
              value="<?=( isset( $_POST['new_password'] ) ? $_POST['new_password'] : '' )?>" required>     
                              </div>


                              <div class="form-group input-icons">
                                <i toggle="#password-field" class="fa fa-fw fa-eye icon toggle-password2" style="cursor: pointer;"></i>

                                  <label style="margin-left: 5%; font-size: 13px">Confirm Password <small style="font-size: 14px; font-weight: 550;color: red;">*</small></label>
                                  <input type="password" name="confirm_password" id="confirm_password" class="form-control pass" style="font-size: 13px; border: 1.2px solid #0062CC; background-color: none; width: 90%; margin-left: 5%;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 characters."
              value="<?=( isset( $_POST['confirm_password'] ) ? $_POST['confirm_password'] : '' )?>" required>     
                              </div>
                              <div class="form-group mb-3">
                                  <button type="submit" name="change_password" id="change_password"  class="btn btn-primary" style="background-color: #3993DE; color: white; border-radius: 50px; margin-left: 25%; font-size: 13px; width: 50%;" value="submit">Reset Password</button>
                              </div>
                              </div>


                          </form>
                      </div>
                  </div>




</BODY>
</HTML>

<style>
       .input-icons i {
            position: absolute;
        }
          
        .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }
          
        .icon {
            padding: 10px;
            min-width: 40px;
            margin-left: 73%;
            margin-top: 8%;
            color: #0181CA;
        }
          
        .fields {
            width: 100%;
            padding: 10px;
            text-align: left;
        }
        .field_icon {
          float: right;
          margin-left: -20%;
          margin-top: -13%;
          margin-right: -8%;
        }</style>

<script>

 $("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye  fa-eye-slash");
  var input = $("#new_password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});

  $("body").on('click', '.toggle-password2', function() {
  $(this).toggleClass("fa-eye  fa-eye-slash");
  var input = $("#confirm_password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
   window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 8000);

</script>
