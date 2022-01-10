<?php 
  #session_start();
  include 'change-code.php';
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
  $username = $_SESSION['username'];

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Document Tracking System</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body style="background-color: #F5F5F5;">
<!-----Top bar navigation---->
<div class="wrapper">
  <?php include_once"include/topbar.php"; ?>

  <?php include_once"include/sidebar.php";?>
</div>

<?php require_once'change-code.php'; ?>

              <?php
                  if(isset($_SESSION['warning1'])){
                    echo
                    "
                    <div class='alert alert-danger text-center'>
                      ".$_SESSION['warning1']."
                    </div>
                    ";
                    unset($_SESSION['warning1']);
                  }
                  if(isset($_SESSION['success1'])){
                    echo
                    "
                    <div class='alert alert-success text-center'>
                      ".$_SESSION['success1']."
                    </div>
                    ";
                    unset($_SESSION['success1']);
                  }
                ?>

   <style>
        .alert
        {
          font-size: 12px;
          width: 20%;
          margin-left: 77%;
          margin-top: -2.6%;
          float: right;
          margin-right: 1%;
          z-index: 1;
          position: fixed;
        }
   </style>

<form method="POST" action="change-code.php" name="chngpwd" onSubmit="return valid();">
<div class="row">
  <div class="col-lg-8">
    <!--- card start --->
    <div class="card shadow" style="width:560px; margin-top: 1px; margin-left: 38%; position: fixed;">
        <div class="card-header py-3" style="font-size: 18px; text-align: left; font-weight: 580; color: #5B5B5B">
          Change Password
        </div>

        <div class="card-body" style="height: 350px;">
          <div class="form-group">
            <label>Current Password: </label>
            <input type="password" id="currentpassword" name="currentpassword" class="form-control" required="true">
          </div>
          <div class="form-group">
            <label>New Password: </label>
            <input type="password" id="newpassword" name="newpassword" onkeyup="Validate()" minlength="6" class="form-control" required="true">
          </div>
          <div class="form-group">
            <label>Confirm Password: </label>
            <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" value="" required="true">
          </div>
          <div class="form-group">
            <button type="submit" name="submitPass" class="btn btn-primary btn-user btn-block"> Submit</button>
          </div>                          
        </div>
    </div>
  </div>
</div>
</form>

<script >
  function valid()
  {
    if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
    {
     alert("Password and confirm password field do not match");
     document.chngpwd.confirmpassword.focus();
     return false;
    }
     return true;
  }

  function Validate(newpassword) {
    newpassword.value = newpassword.value.replace(/[^a-zA-Z-'\n\rA-Za-z\s]+/g, '');
}
</script>

</style>

    <script type="text/javascript">
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 5000); 
    </script>
</body>
</html>