
<?php
session_start();
$id = $_SESSION['id'];
$fullname = $_SESSION['fullname'];
$department = $_SESSION['department'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Releasing Officer | Document Tracking System </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="navbar.css">
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
        if(isset($_SESSION['errSent'])){
          echo
          "
          <div class='alert alert-danger text-center' style='background-color: #E23C42; color: white;'>
            <strong>Warning! </strong> ".$_SESSION['errSent']."
          </div>
          ";
          unset($_SESSION['errSent']);
        }
        if(isset($_SESSION['succSent'])){
          echo
          "
          <div class='alert alert-success text-center' style='background-color: #04A12B; color: white;'>
            <strong>Success! </strong>".$_SESSION['succSent']."
          </div>
          ";
          unset($_SESSION['succSent']);
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
        [type="checkbox"] {
          position: absolute;
          left: 425px;
          top:  21px;
        }


</style>

  <div class="info">
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Pending Documents</b>
  </div>
</div>

 <form action="deleteUser.php" method="POST">
<div id="targetLayer" class="btn btn-success" style="display:none;width:100%;margin-bottom: 10px;"></div>
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1% ">
  <div class="card-header" style="height:  85px; border: none;">
    <small style="font-size: 11px; font-weight: 550; color: #2B2B2B; font-style: italic;">RELEASING SECTION</small>
    <div class="row">
      <a href="<?php $_SERVER['PHP_SELF']; ?>" class="refresfMdl btn btn-primary" style="font-size: 12px; width: 10%; margin-top: 10px; margin-left: 10px; height: 30px"><i class="fas fa-sync-alt"></i> &nbsp;Refresh</a>
      <input type="text" class="search form-control" placeholder="Search here" style="font-size: 12px; float: right; margin-left: 57%; margin-top: 1px; margin-bottom: -5%; width: 30%">
    </div>
      
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
      <!--<div class="row" style="margin-top: -1%; margin-left: 5px;">
    <a type="button" id="select-all" style="cursor: pointer; margin-left: -1px; font-size: 12px">Select All</a>&nbsp;
      <a type="button" id="delete" style="cursor: pointer; margin-left: 1px; color: red; font-size: 12px">Delete Selected</a>
            <button type="submit" name="delete_all" class="btnDelete btn-danger btn-xs" ><i class="fa fa-trash"></i>&nbsp; Delete</button>
    </div> -->

<!---- delete multiple data ---->
    
    <!---- end ----->
        <table id="userTbl" class="responsive-table table-hover table-striped table-sm" width="100%">
          <thead style=" color: #2B2B2B; font-size: 12px; border-bottom: 1.5px solid #A8A8A8;">
            <tr>
                
            </tr>
            <tr class="myHead" style="height: 35px">
              <th style="width: 13%; text-align: center; font-size: 11px;">TRACKING NO.</th>
              <th style="width: 13%; text-align: center; font-size: 11px;">FILE NAME</th>
              <th style="width: 20%; text-align: center; font-size: 11px;">MESSAGE/DESCRIPTION</th>
              <th style="width: 13%; text-align: center; font-size: 11px;">SEND TO</th>
              <th style="width: 13%; text-align: center; font-size: 11px;">ACTION</th>
              <th style="width: 15%; text-align: center; font-size: 11px;">DATE & TIME POSTED</th>
              <th style="text-align: center; font-size: 11px;">RELEASE</th>
              <th style="text-align: center; font-size: 10px;">MORE</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT release_file.status as Sat, release_file.sender_name as Sender, file_upload.* FROM release_file INNER JOIN file_upload WHERE release_file.tracking_no = file_upload.tracking_no and release_file.status = 'Unread' and release_file.releaser_id = '$id' order by release_file.id Desc";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                $stat = $row['Sat'] == 'Unread' ? 'danger' : 'success';
                echo 
                "<tr style='font-size: 12px'>
                  <td style='text-align: center;'>".$row['tracking_no']."</td>
                  <td style='text-align: center;'>".$row['file_name']."</td>
                  <td style='text-align: center;'>".$row['file_description']."</td>
                  <td style='text-align: center;'>".$row['routedTo']."</td>
                  <td style='text-align: center;'>".$row['forYour']."</td>
                  <td style='text-align: center;'>".$row['select_date']."
                  <div><time class='timeago' datetime='".$row['select_date']."' style='font-size: 11px; color: blue'></time></div>
                  </td>
                  <td style='text-align: center; font-size: 11px;'>
                      <a href='#' class='btn btn-".$stat."  btn-sm m-0' data-toggle='modal' data-target='#send_modal' style='font-size: 11px;' onclick='getData(".$row['tracking_no'].")'>Relase</a>
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
                include('viewUserDetails.php');
              }
            ?>
          </tbody>
        </table>
        </form>
      </div>
   </div>

 <!---card body end---> 



<!--- modal for release document---->

<div class="modal fade" id="send_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content " style="width: 100%; border: none">
      <div class="modal-header" style="background-color: #0062CC; height: 40px">
        <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 14px; font-weight: 550; color: #F0F0F0; margin-top: -1%">&nbsp;&nbsp;<i class='fas fa-paper-plane'></i>&nbsp;&nbsp;Send Document</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -15px; color: white; font-size: 20px; margin-top: -4%">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="send_docu.php" enctype="multipart/form-data">
          <div class="text-right">
            <input type="checkbox" id="alsoAdmin" name="alsoAdmin" value="Yes" style="margin-top: 1px; margin-left: 10%;">
              <label for="1" style="font-size: 12px; color: #383838">
                <span style="color: blue;"><i class="fa fa-user" aria-hidden="true" ></i> &nbsp;Send to Admin</span>
              </label>
               <hr style="margin-top: -2%">
            </div>

          <input type="hidden" class="form-control" id="trackno" name="trackno">
          <input type="hidden" class="form-control" id="file_name" name="file_name">
          <input type="hidden" class="form-control" id="releaser_id" name="releaser_id" value="<?php echo $id; ?>">
          <input type="hidden" class="form-control" id="send_receiving" name="send_receiving" readonly>
          <input type="hidden" class="form-control" id="receiving_name" name="receiving_name" readonly>
          <input type="hidden" class="form-control" id="fullname" name="fullname" value="<?php echo $fullname; ?>"readonly>
          <input type="hidden" class="form-control" id="department" name="department" value="<?php echo $department; ?>"readonly>
        <div class="form-group">
          <table id="recUser" class="responsive-table table-hover table-striped table-sm m-0" width="100%">
          <thead style="background-color: #A8A8A8; color: white; font-size: 12px;">

             <input type="text" class="searchRecUsers form-control rounded-0" placeholder="Search by department" style="font-size: 12px; float: right; margin-left: 51%; margin-top: 1px; margin-bottom: 1%; width: 60%; height: 30px; ">

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
              $sql = "SELECT * FROM register where usertype = 'Receiving Officer' and department != '$department'";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr style='font-size: 12px'>
                  <td style='text-align: left;'><i class='fas fa-user' style='color: #999999;'>&nbsp;&nbsp;</i>".$row['fullname']."</td>
                  
                  <td style='text-align: left;'>".$row['department']."</td>
                  <td>
                    <button id='send_btn_".$row['id']."' href='#' class='btn btn-sm m-0' role='button' data-toggle='tooltip'title='Send Document' style='font-size: 12px; font-weight: 500; color: #3993DE' onclick='sendDocu(".$row['id'].")' value='".$row['fullname']."'> <span><i  class='fas fa-paper-plane'></i></span>SEND </button>
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

</div>

<!-----Add Docu CSS---->
  <div class="wrapper">
    <?php include_once"css/addDocuStyle.css"; ?>
  </div>
<style>
.has-search .searchDept {
    padding-left: 2.375rem;

}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    margin-top: 1.5%;
    text-align: center;
    pointer-events: none;
    color: #aaa;
    margin-left: 46%;
}
  .fas:hover
  {
    color: #0062CC;
  }
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
//time ago
$(document).ready(function(){

  $(".timeago").timeago();
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
//for releasing
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
//to release
$(document).ready(function(){
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
var sendid = [];
var receivename = [];
function getData(track) {
  $("#trackno").val(track);
  $("#file_name").val($("#"+track).text());
}

function sendDocu(id) {
    var idis = "send_btn_" + id;
    document.getElementById(idis).disabled = true;
    var recname = $("#"+idis).val();
    sendid.push(id);
    receivename.push(recname);
    var final = sendid.join(',');
    var names = receivename.join('|');
    $("#send_receiving").val(final);
    $("#receiving_name").val(names);
  }

 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 3000);

  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>
