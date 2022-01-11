<?php
  session_start();
  $id = $_SESSION['id'];
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
  #$fullname = $_SESSION['fullname'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Document Tracking System </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="navbar.css">
  <link rel="shortcut icon" type="img/png" href="img/dtslogo.png">
  <link rel="shortcut icon" type="img/png" href="img/dtslogo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
    .height10{
      height:10px;
    }
    .mtop10{
      margin-top:10px;
    }
    .modal-label{
      position:relative;
      top:7px
    }
  </style>
</head>
<body style="background-color: #f5f5f5;">

<!-----Top bar navigation---->
  <div class="wrapper">
    <?php include_once"include/topbar.php"; ?>
<!-----Sidebar navigation---->
    <?php include_once"include/sidebar.php"; ?>
  </div>

<!--- Label for Add Document-->  
<div class="main-content">
   <?php
        if(isset($_SESSION['errDelete'])){
          echo
          "
          <div class='alert alert-danger text-center'>
            <strong>Warning!</strong> ".$_SESSION['errDelete']."
          </div>
          ";
          unset($_SESSION['errDelete']);
        }
        if(isset($_SESSION['succDelete'])){
          echo
          "
          <div class='alert alert-success text-center'>
            <strong>Success!</strong>".$_SESSION['succDelete']."
          </div>
          ";
          unset($_SESSION['succDelete']);
        }
      ?>
<style>
        .alert
        {
          font-size: 12px;
          width: 18%;
          margin-left: 80%;
          margin-top: -2.6%;
          float: right;
          margin-right: 1%;
          z-index: 1;
          position: fixed;
        }
</style>

  <div class="info">
               <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                     <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600; cursor: pointer;">Dashboard</a> /</b>
                      <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 15px; font-weight: 600; color: black;"> Inquiry</a>
                    
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-left"
                                aria-labelledby="userDropdown" style="border-radius: 0; height: auto; width: 23%;">
                                <a class="dropdown-item" href="viewDepartment.php" style="color: gray; font-size: 12px; margin-top: -3%; margin-bottom: -3%">
                                    Search Departments
                                </a>

                                <div class="dropdown-divider" style="color: gray;"></div>
                                <a class="dropdown-item" href="inquiry_document.php" style="color: gray; font-size: 12px; margin-top: -3%; margin-bottom: -3%">
                                  Track Documents
                                </a>
                       
                                <!--<div class="dropdown-divider" style="color: gray;"></div>
                                <a class="dropdown-item" href="#" style="color: gray; font-size: 12px; margin-top: -3%; margin-bottom: -3%" data-toggle="modal" class="identifyingClass" data-id="my_id_value">
                                    Track Document's Route
                                </a>

                                <div class="dropdown-divider" style="color: gray;"></div>
                                <a class="dropdown-item" href="#" style="color: gray; font-size: 12px; margin-top: -3%; margin-bottom: -3%" data-toggle="modal" class="identifyingClass" data-id="my_id_value">
                                    Select
                                </a>

                                <div class="dropdown-divider" style="color: gray;"></div>
                                <a class="dropdown-item" href="#" style="color: gray; font-size: 12px; margin-top: -3%; margin-bottom: -3%" data-toggle="modal" class="identifyingClass" data-id="my_id_value">
                                    Select
                                </a>

                                <div class="dropdown-divider" style="color: gray;"></div>
                                <a class="dropdown-item" href="#" style="color: gray; font-size: 12px; margin-top: -3%; margin-bottom: -3%" data-toggle="modal" class="identifyingClass" data-id="my_id_value">
                                    Select
                                </a>
                            </div>-->
                    </li>
              </ul>
  </div>
</div>

<!-----Add Docu CSS---->
  <div class="wrapper">
  </div>


 <form action="receive_code.php" method="POST">
<div id="targetLayer" class="btn btn-success" style="display:none;width:100%;margin-bottom: 10px;"></div>
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1%;">
  <div class="card-header" style="height:  85px; border: none;">
    <small style="font-size: 11px; font-weight: 550; color: #2B2B2B; font-style: italic;"><i class='fas fa-chart-line'></i> &nbsp;TRACK DOCUMENTS   </small>
    <div class="row">
      <!--<div class="col-md-4">
        <a href="<?php $_SERVER['PHP_SELF']; ?>" class="refresfMdl btn btn-primary rounded-0" style="font-size: 12px;"><i class="fas fa-sync-alt"></i> &nbsp;Refresh</a>
      </div>-->
        <div class="input-group" style="width: 100%; margin-top: -1%;">
            <input type="text" class="search form-control" placeholder="Track documents..." style="font-size: 12px; margin-left: 65%; width: 10%; ">
            <span class="input-group-append" style="height: 35px; ">
            <a class="btn btn-outline-secondary">
                <i class="fa fa-search"></i>
            </a>
            </span>
        </div>
      <!--<div class="col-md-8">
        <input type="text" class="search form-control rounded-0" placeholder="Track documents..."  style="font-size: 12px; margin-left: 55%; width: 45%;">
      </div>--->
    </div>
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
    <input type="hidden" class="form-control" id="trackno" name="trackno">
    </div>
      <div class="row">
    <!---- end ----->
    <table id="UnreadTbl" class="responsive-table table-hover table-striped table-sm" width="100%">
          <thead style=" color: #2B2B2B; font-size: 12px; border-bottom: 1.5px solid #A8A8A8;">
            <tr>
                
            </tr>
            <tr class="myHead" style="height: 35px">
              <th style="width: 20%; text-align: center; font-size: 11px;"><i class="fa fa-search" style="color: gray;"></i> &nbsp;TRACKING NO.</th>
              <th style="width: 25%; text-align: center; font-size: 11px;"><i class="fa fa-file" style="color: gray;"></i> &nbsp;FILE NAME</th>
              <!--<th style="width: 18%; text-align: center; font-size: 11px;"><i class="fa fa-envelope-open-text" style="color: gray;"></i> &nbsp;MESSAGE/DESCRIPTION</th>-->
              <th style="width: 20%; text-align: center; font-size: 11px;"><i class="fas fa-user" style="color: gray;"></i> &nbsp;CREATED BY:</th>
              <th style="width: 20%; text-align: center; font-size: 11px;"><i class="fa fa-calendar" style="color: gray;"></i> &nbsp;DATE & TIME CREATED</th>
              <th style="text-align: center; font-size: 10px; width: 20%;">ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
               $sql = "SELECT * from file_upload inner join register on file_upload.user = register.username Order By file_upload.id desc";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr style='font-size: 12px'>
                  <td style='text-align: center;' id=".$row['tracking_no'].">".$row['tracking_no']."</td>
                  <td style='text-align: center;'>".$row['file_name']."</td>
                  
                  <td style='text-align: center;'>".$row['fullname']." <div>(".$row['department'].")</div></td>
                  <td style='text-align: center;'>".$row['select_date']."
                  <div><time class='timeago' datetime='".$row['select_date']."' style='font-size: 11px; color: blue'></time></div>
                  </td>
                  <td style='text-align: center;'><a href='#Track_".$row["tracking_no"]."' class='btn btn-warning btn-sm m-0' data-toggle='modal' style='font-size: 12px;'> <i class='fas fa-chart-line fa-sm fa-fw mr-2 text-gray-400'></i>Track</a></td>
                  <td style='text-align: center; font-size: 11px;'>
                  
                    
                       
                            </div>
                  
                  </td>
                </tr>";
                 include('viewUserDetails.php');
              }
            ?>
          </tbody>
        </table>
      </div>
        </form>
      </div>
   </div>

<!-----Add Docu CSS
    <a class='dropdown' href='#' id='userDropdown' role='button'
                       data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='text-decoration: none; color: #666666'><span style='font-size: 15px; cursor: pointer;'><i class='fas fa-ellipsis-h'></i></span></a>

                            <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in'
                                aria-labelledby='userDropdown'>
                                <a class='dropdown-item' href='../download.php?file_name=".$row['attach_file']."' style='color: gray; font-size: 14px'>
                                    <i class='fas fa-download fa-sm fa-fw mr-2 text-gray-400' style='color: lightgray;'></i>
                                    Download
                                </a>
                                <a class='dropdown-item' href='#moreDetails_".$row["tracking_no"]."' class='btn btn-info btn-sm m-0' data-toggle='modal' style='color: gray; font-size: 14px'>
                                    <i class='fas fa-info-circle fa-sm fa-fw mr-2 text-gray-400' style='color: lightgray; font-size: 14px'></i>
                                  More Details
                                </a>
                                <a class='dropdown-item' href='#Track_".$row["tracking_no"]."' class='btn btn-info btn-sm m-0' data-toggle='modal' style='color: gray; font-size: 14px'>
                                    <i class='fas fa-chart-line fa-sm fa-fw mr-2 text-gray-400' style='color: lightgray; font-size: 14px'></i>
                                  Track
                                </a>---->
  <div class="wrapper">
    <?php include_once"css/addDocuStyle.css"; ?>
  </div>
 <!---card body end---> 
</div>
<style>

    .btnDelete
    {
        width: 10%;
        font-size: 12px;
        height: 30px;
        border-radius: 5px;
        margin-top: -1%;
        margin-left: 10px;
        margin-bottom: 5px;
    }
</style>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../jquery.timeago.js"></script>
<!-- generate datatable on our table -->
<!-- generate datatable on our table -->

<script>
//receive
$(document).ready(function(){
  $(".timeago").timeago();
    $('.searchRecUsers').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#recUser tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});

$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#UnreadTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});

$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#readTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});

$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#UnreadTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 3000);
</script>
</body>
</html>
