<?php 
  #session_start();
  include 'change-code.php';
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
  $username = $_SESSION['username'];
  $department = $_SESSION['department'];

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee | Dashboard</title>
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
<!--- side navigation start-->
    <div class="wrapper">
      <div class="side-bar">
        <div class="imgcontainer">
                <img src="logo2.png" width="180px" height="100px;" class="img-fluid" alt="">
                <style>
                  .imgcontainer{
                    margin-left: -17px;
                    text-align: center;
                    line-height: 20px;
                    border-bottom: 1px solid rgb(0, 0, 0, 0.1);
                  }
                </style>
              </div>
              <div class="menu">
                <div class="item"><a href="navbar.php"><i class="fas fa-home"></i>Dashboard</a></div>
              <div class="item">
                  <a class="sub-btn"><i class="fas fa-folder-open"></i>Documents<i class="fas fa-angle-right dropdown"></i>

                <div class="sub-menu">
                    <a href="add_document.php"><i class="fas fa-folder-plus"></i>Add New Document</a>
                    <a href="receive_docu.php"><i class="fas fa-file-import"></i>Received Document</a>
                    <a href="draft_files.php"><i class="fas fa-folder"></i>Drafts</a>
                    <a href="view_files.php"><i class="fas fa-folder"></i>Repositories</a>
                    <a href="archive.php"><i class="fas fa-file-archive"></i>Archive</a>  
                </div>
              </div>
              <!--<div class="item"><a href="#"><i class="fas fa-sms"></i>SMS Campaign</a></div>-->
              </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.sub-btn').click(function(){
          $(this).next('.sub-menu').slideToggle();
          $(this).find('.dropdown').toggleClass('rotate');
        });
      });

    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 5000); 
    </script>
</body>
</html>