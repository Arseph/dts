<?php 
    if( !isset( $_SESSION ) ) session_start();
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <!-----Top bar navigation---->
      <div class="wrapper">
        <div class="topnav">
          <div class="container-fluid">
            <div class="navbar-header">
            <ul class="nav navbar-nav navbar-right">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
                <span class="fas fa-bell fa-w" style="font-size:30px; color: #fff;"></span>
                <span class="badge badge-warning"style="margin-bottom: 15px; background: red;">3</span></a>
              <ul class="dropdown-menu"></ul>
            <div class="dropdown navbar-right">
            <a class="btn btn-info dropdown-toggle" href="userProfile.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'];?>
              <a class="btn btn-warning" style="margin-right: 50px;" href="logout.php" role="button">Logout</a>
            </a>
          </ul>
           <!--Search-->
          <ul class="search navbar-nav navbar-left"> 
            <img class="search-icon" src="img/icons8-search-50.png">
            <input type="text" placeholder="Track document here">

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

                    <!--- Label for Dashboard   -->
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $_SESSION['username'];?></h4>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                      <button class="btn btn-primary">Edit Profile</button>

                      <button type="button" class="btn btn-success"href="#addnew" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-edit"></span> Change Password</button>
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

              <!-- Edit Modal-->


<!-- /.modal -->
          <div class="card mt-3">
                <ul class="list-group list-group-flush">
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Firstname</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $_SESSION['firstname'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Lastname</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $_SESSION['lastname'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $_SESSION['username'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      09612516522
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Brgy. Jupiter, Solar System, Milkyway Galaxy
                    </div>
                  </div>
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info "href="">Edit</a>
                    </div>
                  </div>
                </div>
              </div>
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
        </script>
<!-------------------------------main container start here---------------------------------
-->

</body>
</html>