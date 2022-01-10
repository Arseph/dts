<!DOCTYPE html>
<html>
<head>
  <script> window.history.forward(); </script>
  <meta charset="utf-8">
  <title>Employee Login | Document Tracking System</title>
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
            if(isset($_SESSION['status']))
            {
                ?>
                <div class="alert alert-success">
                <h5><?php$_SESSION['status']; ?></h5>
            </div>
            <?php
            unset($_SESSION['status']);
            }

            ?>

                  <div class="card">
                      <div class="card-header">
                          <h5> Reset Password</h5>
                      </div>
                      <div class="card-body p-4">
                          
                          <form action="password-reset-code.php" method="post">
                              
                              <div class="form-group mb-3">
                                  <label>EMAIL ADRESS</label>
                                  <input type="text" name="email" class="form-control" placeholder="Enter a valid Email adress">     
                              </div>
                              <div class="form-group mb-3">
                                  <button type="submit" name="password-reset-link" class="btn btn-primary">Send Password Resend Link</button>
                              </div>
                              </div>


                          </form>
                      </div>
                  </div>