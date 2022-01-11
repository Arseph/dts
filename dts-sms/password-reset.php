<!DOCTYPE html>
<html>
<head>
  <script> window.history.forward(); </script>
  <meta charset="utf-8">
  <title>Forgot Password | Document Tracking System</title>
  <link rel="stylesheet" href="navbar.css">
  <link rel="shortcut icon" type="img/png" href="img/dtslogo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <script src="js/scripts.js"></script> 
</head>
<body style="background-color: #0062CC; position: fixed;">

       <?php
       include_once('password-reset-code.php');
        if(isset($_SESSION['error'])){
          echo
          "
          <div class='alert alert-danger text-center' style='background-color: #E23C42; color: white;'>
            ".$_SESSION['error']."
          </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['status'])){
          echo
          "
          <div class='alert alert-success text-center' style='background-color: #04A12B; color: white;'>
            ".$_SESSION['status']."
          </div>
          ";
          unset($_SESSION['status']);
        }
      ?>
<style>
        .alert
        {
          font-size: 12px;
          width: 20%;
          margin-left: 60%;
          margin-top: 3%;
          float: right;
          margin-right: 1%;
          z-index: 1;
          position: fixed;
        }
</style>

                  <div class="card shadow" style="width:380px; margin-top: 30%; margin-left: 118%; border: none">
                    <div class="card-header" style="height: 50px; background-color: #3993DE; border: none;">
                      <h6 style="text-align: center; font-size: 17px; margin-top: 1%; color: #fff; text-shadow: 2px 2px 1px #2679D3; font-weight: 600"> &nbsp;Forgot Password</h6>
                    </div>
                      <div class="card-body p-4">
                          
                          <form action="password-reset-code.php" method="post">
                              
                              <div class="form-group mb-3">
                                  <label style="margin-left: 5%; font-size: 13px">Email Address <small style="font-size: 14px; font-weight: 550;color: red;">*</small></label>
                                  <input type="text" name="email" class="form-control" style="font-size: 13px; border: 1.2px solid #0062CC; background-color: none; width: 90%; margin-left: 5%;" required>     
                              </div>
                              <div class="form-group mb-3">
                                  <button type="submit" name="password-reset-link" class="btn btn-primary" style="background-color: #3993DE; color: white; border-radius: 50px; margin-left: 25%; font-size: 13px; width: 50%;">Forgot Password</button>
                              </div>
                              </div>


                          </form>
                      </div>
                  </div>

          <script>
             window.setTimeout(function() {
              $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
              });
             }, 8000);
          </script>