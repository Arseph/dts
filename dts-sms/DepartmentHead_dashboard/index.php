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

<html lang="en">
  <head>
    <script> window.history.forward(); </script>
    <meta charset="utf-8">
    <title>DTS Login Form | Admin</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </head>
  <body>
    <div class ="center">
      <h1></h1>
      <form action="login_code.php" method="post">
        <div class="imgcontainer">
          <img src="img/reg.png" alt="" width="200vh" height="115vh" style="vertical-align:bottom">
          <h2>Admin Login</h2>
        </div>

                <?php
        if(isset($_SESSION['error'])){
          ?>
          <div class="alert alert-danger text-center" style="margin-top:20px;">
            <?php echo $_SESSION['error']; ?>
          </div>
          <?php

          unset($_SESSION['error']);
        }

        if(isset($_SESSION['success'])){
          ?>
          <div class="alert alert-success text-center" style="margin-top:20px;">
            <?php echo $_SESSION['success']; ?>
          </div>
          <?php

          unset($_SESSION['success']);
        }
      ?>

        <div class="txt_field">
          <!--<i class="fas fa-user"></i>-->
          <input type="uname" placeholder="Username" name="username" required>
          <span></span>

        </div>
        <div class="txt_field">
          <!--<i class="fas fa-lock"></i>-->
          <input type="password" placeholder="Password" name="password" required>
        <span></span>

        </div>
        <div class="pass">Forgot Password?</div>
        <button type="submit" name="btnLogin" <?php echo $disable; ?> >Login</button> 
       
          <div>
          <style>
          body
          {
            background: #9A9B9B;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            padding: 0;
            margin: 0;
          }

          *{
            font-family: Tahoma, sans-serif;
          }

          form
          {
            border: 3px solid #f1f1f1;
            width: 400px;
            padding: 20px 30px;
            /*border-radius: 10px;*/
            border: none;

          }

          h2
          {
            font-size: 13px;
            font-weight: 600;
          }

          .center
          {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: #fff;
            border-radius: 3px;
          }

          .center form
          {
            padding: 10 25px;
            box-sizing: border-box;
          }

          input[type=uname] , input[type=password] {
            width: 100%;
            padding: 10px 20px;
            margin: 8px 0;
            display: block;
            border: 0.5px solid #BBBBBB;
            border-radius: 4.5px;
            box-sizing: border-box;
            font-size: 14px;
          }
          button[type="submit"]
          {
            background-color: #86ABF9;
            color: white;;
            padding: 10px 20px;
            margin: 2px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            height: 43px;
            border-radius: 25px;
            font-size: 12px;
          }

          button[type="submit"]:hover
          {
            transition: .5s;
            opacity: 0.8;
          }

          .pass
          {
            margin: -5px 0 20px 5px;
            color: #86ABF9;
            cursor: pointer;
            text-align: right;
            font-size: 14px;
            font-weight: normal;
          }

          .pass:hover
          {
            text-decoration: underline;
          }

          .register_link
          {
            text-align: center;
            margin: 30px 0px;
            font-size: 10px;
            color: #666666;
          }

          .register_link a
          {
            color: #2691d9;
            text-decoration: none;
            font-size: 10px;
          }

          .register_link a:hover
          {
            text-decoration: underline;
          }

          .imgcontainer {
            text-align: center;
            margin: 0px 0 32px 0;
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
            margin-bottom: -12px;
            text-align: center;
            margin-left: 10px;
            margin-right: 14.5px;
            margin-bottom: 12px;
            font-size: 12px;

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
                    }, 40000);
          </script>
          </div>
      </form>
  </body>
</html>
