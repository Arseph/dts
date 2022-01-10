<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Document Tracking System </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="navbar.css">
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
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Received Documents</b>
  </div>
</div>


 <form action="receive_code.php" method="POST">
<div id="targetLayer" class="btn btn-success" style="display:none;width:100%;margin-bottom: 10px;"></div>
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1% ">
  <div class="card-header" style="height:  85px; border-top: 2px solid #CCCCCC">
    <small style="font-size: 11px; font-weight: 550; color: gray;">RECEIVING SECTION</small>
    <div class="row">
      <a href="<?php $_SERVER['PHP_SELF']; ?>" class="refresfMdl btn btn-primary" style="font-size: 12px; width: 10%; margin-top: 10px; margin-left: 10px; height: 30px"><i class="fas fa-sync-alt"></i> &nbsp;Refresh</a>
      
      <input type="text" class="search form-control" placeholder="Search documents" style="font-size: 12px; float: right; margin-left: 57%; margin-top: 1px; margin-bottom: -5%; width: 30%">
    </div>
      
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
    <input type="hidden" class="form-control" id="trackno" name="trackno">
    </div>

<!---- delete multiple data ---->
    
    <!---- end 
        <table id="userTbl" class="responsive-table table-hover table-striped table-bordered table-sm m-0" width="100%">
          <thead style="background-color: #444444; color: #F0F0F0; font-size: 12px;">
            <tr>
                
            </tr>
            <tr class="myHead" style="height: 35px">
              <th style="width: 15%; text-align: center; font-size: 11px;">TRACKING NO.</th>
              <th style="width: 15%; text-align: center; font-size: 11px;">FILE NAME</th>
              <th style="width: 18%; text-align: center; font-size: 11px;">OFFICE DEPARTMENT</th>
              <th style="width: 20%; text-align: center; font-size: 11px;">RELEASER NAME</th>
              <th style="width: 15%; text-align: center; font-size: 11px;">DATE POSTED</th>
              <th style="text-align: center; font-size: 11px;">ACTION</th>
              <th style="text-align: center; font-size: 10px;">MORE</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT admin_receive_file.status as rs, admin_receive_file.releaser_name as rn, file_upload.* FROM admin_receive_file INNER JOIN file_upload WHERE admin_receive_file.tracking_no = file_upload.tracking_no Order by select_date DESC";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                $status = $row['rs'] == 'Unread' ? 'Receive' : 'File Received';
                $btn = $row['rs'] == 'Unread' ? 'danger' : 'success';
                echo 
                "<tr style='font-size: 12px'>
                  <td style='text-align: center;'>".$row['tracking_no']."</td>
                  <td style='text-align: center;'>".$row['file_name']."</td>
                  <td style='text-align: center;'>".$row['department']."</td>
                  <td style='text-align: center;'>".$row['rn']."</td>
                  <td style='text-align: center;'>".$row['select_date']."</td>
                  <td style='text-align: center; font-size: 11px;'>
                      <input type='submit' value='".$status."' class='btn btn-".$btn."  btn-sm m-0' style='font-size: 11px;' onclick='getData(".$row['tracking_no'].")'>
                  </td>

                  <td style='text-align: center; font-size: 11px;'>
                  
                    <a class='dropdown' href='#' id='userDropdown' role='button'
                       data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='text-decoration: none; color: #666666'><span style='font-size: 15px; cursor: pointer;'><i class='fas fa-ellipsis-h'></i></span></a>

                            <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in'
                                aria-labelledby='userDropdown'>
                                <a class='dropdown-item' href='../download.php?file_name=".$row['attach_file']."' style='color: gray; font-size: 14px'>
                                    <i class='fas fa-download fa-sm fa-fw mr-2 text-gray-400' style='color: lightgray;'></i>
                                    Download
                                </a>
                                <a class='dropdown-item' href='#moreDetails_".$row["id"]."' class='btn btn-info btn-sm m-0' data-toggle='modal' style='color: gray; font-size: 14px'>
                                    <i class='fas fa-info-circle fa-sm fa-fw mr-2 text-gray-400' style='color: lightgray; font-size: 14px'></i>
                                  More Details
                                </a>
                       
                            </div>
                  
                  </td>
                </tr>";
                #include('viewUserDetails.php');
              }
            ?>
          </tbody>
        </table>
        </form>----->
        
<!-----Add Docu CSS---->
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
<?php include('addUserModal.php') ?>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- generate datatable on our table -->
<!-- generate datatable on our table -->

<script>

$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl tbody tr').each(function(){
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
