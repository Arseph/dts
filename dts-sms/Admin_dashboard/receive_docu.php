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
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Received Documents</b>
  </div>
</div>

<!-----Add Docu CSS---->
  <div class="wrapper">
  </div>


 <form action="receive_code.php" method="POST">
<div id="targetLayer" class="btn btn-success" style="display:none;width:100%;margin-bottom: 10px;"></div>
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1%;">
  <div class="card-header" style="height:  85px; border: none;">
    <small style="font-size: 11px; font-weight: 550; color: #2B2B2B; font-style: italic;">RECEIVING SECTION</small>
    <div class="row">
      <div class="col-md-4">
        <a href="<?php $_SERVER['PHP_SELF']; ?>" class="refresfMdl btn btn-primary rounded-0" style="font-size: 12px;"><i class="fas fa-sync-alt"></i> &nbsp;Refresh</a>
      </div>
      <div class="col-md-4">
        <select class="form-select readUn rounded-0" style="font-size: 12px; margin-left: -75%; width: 42%; height: 30px; border: 1px solid black; background-color: yellow;" onchange="visibleTab()">
          <option selected value="Unread">Unreceive File</option>
          <option value="Read">File Received</option>
        </select>
      </div>
      <div class="col-md-4">
        <input type="text" class="search form-control rounded-0" placeholder="Search documents" s style="font-size: 12px; margin-left: 20%;">
      </div>
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
              <th style="width: 20%; text-align: center; font-size: 11px;"><i class="fa fa-file" style="color: gray;"></i> &nbsp;FILE NAME</th>
              <!--<th style="width: 18%; text-align: center; font-size: 11px;"><i class="fa fa-envelope-open-text" style="color: gray;"></i> &nbsp;MESSAGE/DESCRIPTION</th>-->
              <th style="width: 20%; text-align: center; font-size: 11px;"><i class="fas fa-user" style="color: gray;"></i> &nbsp;SENDER</th>
              <th style="width: 20%; text-align: center; font-size: 11px;"><i class="fa fa-calendar" style="color: gray;"></i> &nbsp;DATE & TIME RECEIVED</th>
          
              <th style="text-align: center; font-size: 11px;"><i class="fas fa-file-import" style="color: gray;"></i> &nbsp;RECEIVE</th>
              <th style="text-align: center; font-size: 10px;">MORE</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
               $sql = "SELECT admin_receive_file.status as rs, admin_receive_file.releaser_name as rn, admin_receive_file.date_time as dt, file_upload.* FROM admin_receive_file INNER JOIN file_upload WHERE admin_receive_file.tracking_no = file_upload.tracking_no AND admin_receive_file.status = 'Unread' Order by id DESC";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                $status = $row['rs'] == 'Unread' ? 'Receive' : 'File Received';
                $btn = $row['rs'] == 'Unread' ? 'danger' : 'success';
                $dis = $row['rs'] == 'Read' ? 'disabled' : '';
                echo 
                "<tr style='font-size: 12px'>
                  <td style='text-align: center;'>".$row['tracking_no']."</td>
                  <td style='text-align: center;'>".$row['file_name']."</td>
                  
                  <td style='text-align: center;' id=".$row['tracking_no'].">".$row['rn']." <div>(".$row['department'].")</div></td>
                  <td style='text-align: center;'>".$row['dt']."
                  <div><time class='timeago' datetime='".$row['dt']."' style='font-size: 11px; color: blue'></time></div>
                  </td>
                  <td style='text-align: center; font-size: 11px;'>
                      <input type='submit' value='".$status."' class='btn btn-".$btn."  btn-sm m-0' style='font-size: 11px;' onclick='getData(".$row['tracking_no'].")' ".$dis.">
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
                                <a class='dropdown-item' href='#' class='btn btn-info btn-sm m-0' data-toggle='modal' style='color: gray; font-size: 14px'>
                                    <i class='fas fa-sms fa-sm fa-fw mr-2 text-gray-400' style='color: lightgray; font-size: 14px'></i>
                                  SMS Messages
                                </a>
                       
                            </div>
                  
                  </td>
                </tr>";
                 include('viewUserDetails.php');
              }
            ?>
          </tbody>
        </table>

        <table id="readTbl" class="responsive-table table-hover table-striped table-sm" width="100%" style="display: none;">
          <thead style=" color: #2B2B2B; font-size: 12px; border-bottom: 1.5px solid #A8A8A8;">
            <tr>
                
            </tr>
            <tr class="myHead" style="height: 35px">
              <th style="width: 20%; text-align: center; font-size: 11px;"><i class="fa fa-search" style="color: gray;"></i> &nbsp;TRACKING NO.</th>
              <th style="width: 20%; text-align: center; font-size: 11px;"><i class="fa fa-file" style="color: gray;"></i> &nbsp;FILE NAME</th>
              <!--<th style="width: 18%; text-align: center; font-size: 11px;"><i class="fa fa-envelope-open-text" style="color: gray;"></i> &nbsp;MESSAGE/DESCRIPTION</th>-->
              <th style="width: 20%; text-align: center; font-size: 11px;"><i class="fas fa-user" style="color: gray;"></i> &nbsp;SENDER</th>
              <th style="width: 20%; text-align: center; font-size: 11px;"><i class="fa fa-calendar" style="color: gray;"></i> &nbsp;DATE & TIME RECEIVED</th>
          
              <th style="text-align: center; font-size: 11px;">STATUS</th>
              <th style="text-align: center; font-size: 10px;">MORE</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT admin_receive_file.status as rs, admin_receive_file.releaser_name as rn, file_upload.* FROM admin_receive_file INNER JOIN file_upload WHERE admin_receive_file.tracking_no = file_upload.tracking_no AND admin_receive_file.status = 'Read' Order by id DESC";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                $status = $row['rs'] == 'Unread' ? 'Receive' : 'File Received';
                $btn = $row['rs'] == 'Unread' ? 'danger' : 'info';
                $dis = $row['rs'] == 'Read' ? 'disabled' : '';
                echo 
                "<tr style='font-size: 12px'>
                  <td style='text-align: center;'>".$row['tracking_no']."</td>
                  <td style='text-align: center;'>".$row['file_name']."</td>
                  <td style='text-align: center;' id=".$row['tracking_no'].">".$row['rn']." (".$row['department'].")</td>
                  <td style='text-align: center;'>".$row['select_date']."
                    <div><time class='timeago' datetime='".$row['select_date']."' style='font-size: 11px; color: blue'></time></div>
                  </td>
                  <td style='text-align: center; font-size: 11px;'>
                      <input type='submit' value='".$status."' class='btn btn-".$btn."  btn-sm m-0' style='font-size: 11px;' onclick='getData(".$row['tracking_no'].")' ".$dis.">
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
                                <a class='dropdown-item' href='#' class='btn btn-info btn-sm m-0' data-toggle='modal' data-target='#send_modal' style='font-size: 11px;' onclick='getData(".$row['tracking_no'].")' style='color: gray; font-size: 14px'>
                                    <i class='fa fa-share fa-sm fa-fw mr-2 text-gray-400' style='color: lightgray; font-size: 14px'></i>
                                  Forward Document
                                </a>
                                <a class='dropdown-item' href='#' class='btn btn-info btn-sm m-0' data-toggle='modal' style='color: gray; font-size: 14px'>
                                    <i class='fas fa-sms fa-sm fa-fw mr-2 text-gray-400' style='color: lightgray; font-size: 14px'></i>
                                  SMS Messages
                                </a>
                       
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

<div class="modal fade" id="send_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content " style="width: 100%; border: none">
      <div class="modal-header" style="background-color: #0062CC; height: 40px">
        <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 14px; font-weight: 550; color: #F0F0F0; margin-top: -1%">&nbsp;&nbsp;<i class='fas fa-paper-plane'></i>&nbsp;&nbsp;Forward Document</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -15px; color: white; font-size: 20px; margin-top: -4%">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="send_docu.php" enctype="multipart/form-data">
          <input type="hidden" class="form-control" id="trackno" name="trackno">
          <input type="hidden" class="form-control" id="file_name" name="file_name">
          <input type="hidden" class="form-control" id="releaser_id" name="releaser_id" value="<?php echo $id; ?>">
          <input type="hidden" class="form-control" id="send_receiving" name="send_receiving" readonly>
          <input type="hidden" class="form-control" id="receiving_name" name="receiving_name" readonly>
        <div class="form-group">
          <table id="recUser" class="responsive-table table-hover table-striped table-sm m-0" width="100%">
          <thead style="background-color: #A8A8A8; color: white; font-size: 12px;">

             <input type="text" class="searchRecUsers form-control rounded-0" placeholder="Search" style="font-size: 12px; float: right; margin-left: 51%; margin-top: 1px; margin-bottom: 1%; width: 60%; height: 30px; ">

            <tr class="myHead">
              <th style="width: 50%; text-align: left; font-size: 11px">RECEIVING OFFICER</th>
              <!--<th style="width: 35%; text-align: left; font-size: 11px">POSITION</th>-->
              <th style="width: 40%; text-align: left; font-size: 11px">DEPARTMENT</th>
              <th style="width: 30%; text-align: left; font-size: 11px"></th>
            </tr>
          </thead>
          <!--<td style='text-align: left;'>".$row['usertype']."</td>-->
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT * FROM register where usertype = 'Receiving Officer'";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr style='font-size: 12px'>
                  <td style='text-align: left;'><i class='fas fa-user' style='color: #999999;'>&nbsp;&nbsp;</i>".$row['fullname']."</td>
                  
                  <td style='text-align: left;'>".$row['department']."</td>
                  <td>
                    <button id='send_btn_".$row['id']."' href='#' class='btn btn-sm m-0' role='button' data-toggle='tooltip'title='Send Document' style='font-size: 12px; font-weight: 500; color: #3993DE' onclick='sendDocu(".$row['id'].")' value='".$row['fullname']."'> <span><i class='fas fa-paper-plane'></i></span>SEND </button>
                  </td>
                </tr>";
              }
            ?>
          </tbody>
        </table>
        </div>
      </div>
      <div class="modal-footer" style="height: 50px">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 11px; height: 30px;margin-top: -1%">Cancel</button>
        <button type="submit" class="btn btn-primary" style="font-size: 11px; height: 30px;margin-top: -1%">Done</button>
      </form>
      </div>
    </div>
  </div>
</div>


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
function getData(track) {
  $("input[name=trackno]").val(track);
  $("#releaser_name").val('Administrator');
  $("#releaser_id").val('0');
}
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 3000);
  function visibleTab() {
  var see = $(".readUn").val();
  if(see == 'Read') {
    $("#readTbl").css("display", "block");
    $("#UnreadTbl").css("display", "none");
  } else {
    $("#readTbl").css("display", "none");
    $("#UnreadTbl").css("display", "block");
  }
 }
var sendid = [];
var receivename = [];
 function sendDocu(id) {
    var idis = "send_btn_" + id;
    document.getElementById(idis).disabled = true;
    var recname = $("#"+idis).val();
    sendid.push(id);
    receivename.push(recname);
    var final = sendid.join(',');
    var names = receivename.join('|');
    console.log(final)
    console.log(names)
    $("#send_receiving").val(final);
    $("#receiving_name").val(names);
  }
</script>
</body>
</html>
