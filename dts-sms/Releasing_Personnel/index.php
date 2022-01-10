  <?php
  session_start();
  //check if can login again
  if(isset($_SESSION['attempt_again'])){
    $now = time();
    if($now >= $_SESSION['attempt_again']){
      unset($_SESSION['attempt']);
      unset($_SESSION['attempt_again']);
    }
  }

  //set disable if three login attempts has been made
  $disable = '';
  if(isset($_SESSION['attempt']) && $_SESSION['attempt'] >= 3)
  {
    $disable = 'disabled';
    $url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 60; URL=$url1");
  }
  
?>

<!DOCTYPE html>
<html>
<head>
  <script> window.history.forward(); </script>
  <meta charset="utf-8">
  <title>Releasing Personnel Login | Document Tracking System</title>
  <link rel="stylesheet" href="navbar.css">
  <link rel="shortcut icon" type="img/png" href="img/dtslogo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body style="background-color: #86ABF9;">


<form action="login_code.php" method="POST">
<div class="card shadow cardClass" style="width:380px; margin-top:  8%;margin-left: 35%;">

<div class="imgcontainer">
   <img src="img/dtslogo.png" alt="" width="150vh" height="135vh" style="vertical-align:bottom; margin-left: 31%; margin-top: 3%;">
   <h6>Employee Login</h6>
   <style>
     h6 
     {
      text-align: center;
      font-weight: 700;
      color: #485D88;
     }

   </style>
    <?php
        if(isset($_SESSION['error'])){
          ?>
          <div class="alert text-center" style="margin-top:20px;">
            <?php echo $_SESSION['error']; ?>
          </div>
          <?php

          unset($_SESSION['error']);
        }
      ?>
</div>
  <div class="card-body" style="height: auto;">
    <div class="container" >
      <div class="form-group" >
        <input type="type" name="username" class="form-control" placeholder="Enter your username" style="width: 100%; height: 45px; border: none; background-color: #EFEFEF; font-size: 14px;">
      </div>
      <div class="form-group" >
        <input type="password" name="password" class="form-control" placeholder="Enter your password" style="width: 100%; height: 45px; border: none; background-color: #EFEFEF; font-size: 14px;">
      </div>
       <div class="" style="margin-top: -3%; margin-bottom: 10%; font-size: 12px; font-weight: 600; margin-left: 65%;">
        <a href="#" class="forgot">Forgot Password?</a><br>
       </div>
    </div>
    <div class="" style="background-color: white;">
            <button type="submit" name="btnLogin" class="btnLogin form-control" style="background-color: #86ABF9; color: white;" <?php echo $disable; ?>>Login</button>  
    </div>
  </div>
</div>
</form>
</body>
 
<style>
  .btnLogin
  {
    width: 91%;
    margin-top: -6%;
    margin-left: 4.6%;
    height: 47px;
    font-size: 15px;/.,6j5h4g1
    font-weight: 600;
    background-color: #86ABF9;
    border-radius: 0px;
    border: none;
    color: white;
  }
  .btnLogin:hover
  {
    transition: .3s;
      color: #3993DE;
  }
  .btnLogin:active {
    transform: scale(0.98);
     box-shadow: 3px 2px 22px 1px rgba(0, 0, 0, 0.24);
  }
  .forgot
  {
    color: #485D88;
  }

    .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 5px;
            font-size: 12px;
            border-radius: 1px;
            margin: 20px 0px;
            
          }
  .alert{
    padding: 5px;
    margin-bottom: -4px;
    text-align: center;
    margin-left: 10px;
    margin-right: 14.5px;
    font-size: 12px;
    /*background-color: red;*/
    color: red;
    font-weight: 550;

  }
  .isNotif {
    display: none;
  }
</style>

 <script>
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 4000);
</style>

