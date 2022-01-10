<?php
require_once('connection_db/connection.php');
 session_start();
 $username = $_SESSION['username'];
 $firstname = $_SESSION['firstname'];
 $lastname = $_SESSION['lastname'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Dashboard</title>
  <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
    <!-----Top bar navigation---->
      <div class="wrapper">
        <div class="topnav">
          <div class="container-fluid">
            <div class="navbar-header">
            <ul class="nav navbar-nav navbar-right">
              <ul class="dropdown-menu"></ul>
            <div class="dropdown navbar-right">
            <div class="names"><span class="glyphicon glyphicon-user" style="color: white;"> </span> <?php echo $username; ?>
            <a class="btn dropdown-toggle" href="userProfile.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-chevron-down" ></span>
              <a class="btn btn-info" style="margin-right: 50px;" href="logout.php" role="button">Logout</a>
            </a>
            </div>
          </ul>
          <!--Search
          <ul class="search navbar-nav navbar-left"> 
            <img class="search-icon" src="img/search.png">
            <input type="text" placeholder="Track document here">-->
            <!--Search CSS-->
            <style> 
            .names{
              color: #f5f5f5;
              font-size: 16px;
              font-weight: 540;
              font-style: italic;
            }
            .topnav .container-fluid .navbar-header .search{
              height: 30px;
              position: relative;
              display: flex;
              min-width: 200px;
              margin-left: -59%;
              margin-top: -6px;
              width: 78%;
              }
            .topnav .container-fluid .navbar-header .search input[type=text] {
              border: none;
              padding: 8px 35px;
              border: 1px solid grey;
              border-radius: 0px;
              outline: 0;
              width: 78%;
              font-size: 14px;
            }
           .search-icon {
              position: absolute;
              top: 4px;
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
        .alert
        {
          width: 50%;
          float: right;
          margin-right: 30%;
          font-size: 12px;
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
              box-shadow: 0 2px 4px 0 lightgray, 0 6px 12px 0 rgba(0, 0, 0, 0.10);
          }
          .topnav input[type=text] {
            width: 25%;
            height: 28px;
            float: left;
            padding-left: 15px;
            border: none;
            margin-top: 15px;
            margin-left: 300px;
            font-size: 15px;
            border-radius: 5px;

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
          .main-content .info h1{
           font-size: 26px;
          font-weight: 600;
          }

          </style>
        </div>

        <div class="container">
          
            <?php
                $conn = mysqli_connect('localhost','root','','documenttrackingsystem_db');
                if(isset($_POST['submit'])){
                  $file = $_FILES['doc']['tmp_name'];
                  
                  $ext = pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
                  if($ext=='xlsx'){
                    require('import/PHPExcel/PHPExcel.php');
                    require('import/PHPExcel/PHPExcel/IOFactory.php');
                    
                    
                    $obj=PHPExcel_IOFactory::load($file);
                    foreach($obj->getWorksheetIterator() as $sheet){
                      $getHighestRow=$sheet->getHighestRow();
                      for($i=0;$i<=$getHighestRow;$i++){
                        $department=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                        $firstname=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        $lastname=$sheet->getCellByColumnAndRow(2,$i)->getValue();
                        $usertype=$sheet->getCellByColumnAndRow(3,$i)->getValue();
                        $bday=$sheet->getCellByColumnAndRow(4,$i)->getValue();
                        $email=$sheet->getCellByColumnAndRow(5,$i)->getValue();
                        $username=$sheet->getCellByColumnAndRow(6,$i)->getValue();
                        $password=$sheet->getCellByColumnAndRow(7,$i)->getValue();
                        $phone_number=$sheet->getCellByColumnAndRow(8,$i)->getValue();
                        $address=$sheet->getCellByColumnAndRow(9,$i)->getValue();
                        if($department!=''){
                          mysqli_query($conn,"insert into register(department, firstname, lastname, usertype, bday, email, username, password, phone_number, address) values('$department', '$firstname', '$lastname', '$usertype', '$bday', '$email', '$username', '$password', '$phone_number', '$address')");
                        }
                      }
                    }
                  }else{
                    echo "Invalid file format";
                  }
                }
                ?>
            <form method="post" enctype="multipart/form-data">
              <input type="file" name="doc"/>
              <input type="submit" name="submit"/>
            </form>
            <style>
              .container
              {
                margin-left: 50%;
              }
            </style>
        </div>
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
                    <a href="draft_files.php"><i class="fas fa-folder"></i>Drafts</a>
                    <a href="view_files.php"><i class="fas fa-folder"></i>Repositories</a>
                    <a href="archive.php"><i class="fas fa-file-archive"></i>Archive</a>  
                </div>

                  <a class="sub-btn"><i class="fas fa-cogs"></i>Setup Categories<i class="fas fa-angle-right dropdown"></i>
                <div class="sub-menu">
                    <a href="add_department.php"><i class="fas fa-plus-circle"></i>Add Department</a>
                    <a href="add_typeDocument.php"><i class="fas fa-file"></i>Manage Document Type</a>  
                </div>
                
              </div>
              <div class="item"><a href="batchUpload.php"><i class="fas fa-users"></i>Batch Upload</a></div>
              <div class="item"><a href="users.php"><i class="fas fa-user"></i>User Setup</a></div>
              <div class="item"><a href="#"><i class="fas fa-sms"></i>SMS Campaign</a></div>
              <div class="item">
              </div>
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