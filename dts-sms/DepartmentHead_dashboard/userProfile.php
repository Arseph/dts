<?php 
  session_start();
  #$department = $_SESSION['department'];
  $username = $_SESSION['username'];
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];

  $conn = mysqli_connect("localhost", "root", "", "documenttrackingsystem_db");
  $results = mysqli_query($conn, "SELECT * FROM profile");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>  
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee | Dashboard</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <!-----Top bar navigation---->
      <div class="wrapper">
        <div class="topnav">
          <div class="container-fluid">
            <div class="navbar-header">
            <ul class="nav navbar-nav navbar-right">
              <ul class="dropdown-menu"></ul>
            <div class="names"><span class="glyphicon glyphicon-user"> </span>  <?php echo $firstname; ?> <?php echo $lastname; ?>
            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-chevron-down" ></span>
              <a class="btn btn-info" style="margin-right: 50px;" href="logout.php" role="button">Logout</a>
            </a>
            </div>
          </ul>
           <!--Search-->
          <!--<ul class="search navbar-nav navbar-left"> 
            <img class="search-icon" src="img/icons8-search-50.png">
            <input type="text" placeholder="Track document here">-->

            <!--Search CSS-->
            <style>
            .topnav .container-fluid .navbar-header .search{
              height: 30px;
              position: relative;
              display: flex;
              min-width: 200px;
              margin-left: -80%;
              margin-top: 8px;
              width: 80%;
              }
            .topnav .container-fluid .navbar-header .search input[type=text] {
              border: none;
              padding: 8px 35px;
              border: 1px solid grey;
              border-radius: 5px;
              outline: 0;
              width: 80%;
            }
           .search-icon {
              position: absolute;
              top: 5px;
              left: 8px;
              width: 20px;
              height: 20px;
            }
            </style>
          </ul>
            </div>  
          </div>
          </div>  
        </div>
      </div>
        <style>
        /********TOP BAR STYLE********/
          /* User Profile */
            .names{
              color: #f5f5f5;
              font-size: 16px;
              font-weight: 540;
              font-style: italic;
            }
          .wrapper .topnav .user {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
          }
          .wrapper .topnav .user .img {
            width: 40px;
            height: 40px;
          }
          .wrapper .topnav .user .img-case {
            position: absolute;
            width: 40px;
            height: 40px;
            margin-left: 90px;
          }
          .wrapper .topnav .user .img-case img {
            position: absolute;
            top: 8px;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 100%;
            margin-left: 425px;
            margin-bottom: 20px;
          }
          .topnav {
              background-color: #63A2E7;
              overflow: hidden;
          }
          
          .container-fluid 
          {
            padding: 14px;
          }
          .container-fluid a
          {
            margin-left: 1px;
            margin-right: 15px;
          }
          .navbar-header {
            float: right;
          }
          </style>
          <style>
      h5{
        margin-left: 25px;
        margin-bottom: -20px;
        color: red;
      }
      h4{
        font-weight: 600;
        font-size: 20px;
      }
      .txt{
        margin-top: -10%;
        margin-bottom: 10px;
      }
      .field{
        width: 100%;
      }
      .modal .btn {
        border-radius: 1px;
        min-width: 100px;
        margin-top: -10%;
      } 
      .modal button[type=submit]{
        border-radius: 1px;
        margin-bottom: 25%;
        height: 33px;
      }
      .modal button[type=button]{
        border-radius: 1px;
        margin-top: -3%;
      }
      .modal form label {
        font-weight: normal;
        font-family: 'Poppins', sans-serif;
        isplay: inline-block;
      }
      .modal .modal-dialog {
        max-width: 550px;

      }
      .modal .modal-header, .modal .modal-body, .modal .modal-footer {
        padding: 20px 30px;
        margin-top: -10px;
      }
      .modal-header .close{
        padding: 18px 0;
        margin-bottom: -10px;
      }
      .modal .modal-content {
        border-radius: 1px;
      }
      .modal .modal-footer {
       background: #ecf0f1;
       border-radius: 0 0 1px 1px;
      }
      .modal .modal-title {
       display: inline-block;
      }
      .modal .form-control {
       border-radius: 1px;
       box-shadow: none;
       border-color: #dddddd;
      }

</style>

<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="">
              <div class="card">
                <div class="card-body">
                  </div>
                   </div>
                    <style>
                      .btn-block {
                        display: block;
                        width: 10%;
                        margin-left: 490px;
                        margin-top: 15px;
                       }
                     </style>
              <?php
              include_once('profile.php');
              ?>

              </div></hr><br>
                       </div>
                        </div>

                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
<style>
.container {

    float: right;
    padding-left: 80px;
}
</style>
        <br>
          <div class="card mt-3">
                <ul class="list-group list-group-flush">
                </ul>
              </div>
            </div>
            <div class="col-sm-8 col-sm-offset-3">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size: 16px; font-weight: bold;">Firstname:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $firstname; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size: 16px; font-weight: bold;">Lastname:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $lastname; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size: 16px; font-weight: bold;">Username:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $username; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size: 16px; font-weight: bold;">Phone:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      09217327089
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size: 16px; font-weight: bold;">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      San Isidro Ave. Soledad St. RH-10
                    </div>
                  </div>
                  
                  <hr>
                </div>
              </div>
            </div>
             <div class="mt-3"> 
                      <p class="text-muted font-size-sm"></p>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="float: right; margin-right: 40%; margin-top: 3%;">Change Username</button>

                      <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <center><h4 class="modal-title" id="myModalLabel" >Change username</h4></center>
                          </div>
                          <div class="modal-body" class="modal fade">
                            <div class="container-fluid">
                              <form method="POST" action="change-code.php">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
                                <div class="modal-body">
                                <div class="row form-group">
                                  <label>Username: </label>
                                    <div class="form-check">
                                      <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top: -2.5%; height: 33px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            <button type="submit" name="edit" class="btn btn-success" style="margin-top: -2.5%; height: 33px;"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>  
            <div>
              <a type="button" class="btn btn-success" href="changePassword.php" style="float: right; margin-right: -24%;margin-top: 3%;">Change Password</a>   
            </div>

<!--- side navigation start--->
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
               $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
        </script>
</body>
</html>
