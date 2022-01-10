<?php
   $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

   $query = "SELECT * FROM tbl_typedocument";
   $result = mysqli_query($conn, $query);
   $option1 = "";
   while($row2 = mysqli_fetch_array($result))
   {
     $option1 = $option1."<option>$row2[1]</option>";
   }
 ?>

<?php
  session_start();
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Document Tracking System</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="navbar.css">
  <link rel="shortcut icon" type="img/png" href="img/dtslogo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
    .names{
      color: #f5f5f5;
    }
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
  </div>

<!-----Side bar navigation---->
  <div class="wrapper">
    <?php include_once"include/sidebar.php"; ?>
  </div>

<div class="main-content">
          <?php
        if(isset($_SESSION['err'])){
          echo
          "
          <div class='alert alert-danger text-center' style='background-color: #E23C42; color: white;'>
            ".$_SESSION['err']."
          </div>
          ";
          unset($_SESSION['err']);
        }
        if(isset($_SESSION['ss'])){
          echo
          "
          <div class='alert alert-success text-center' style='background-color: #04A12B; color: white;'>
            ".$_SESSION['ss']."
          </div>
          ";
          unset($_SESSION['ss']);
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
        a.disabled {
          pointer-events: none;
          cursor: default;
        }
</style>
  <div class="info">
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Drafts</b>
  </div>
  <style>
  .main-content .info{
    margin: 10px;
    margin-left: 23.5%;
    color: #1F4E79;;
    margin-top: 20px;
    margin-bottom: 15px;
    border-bottom: 1px solid #2F5597;
  }
</style>
</div>

<!-----Drafts Table----->
<?php include('add_modal.php') ?>
<form  action="add_document_code.php" method="POST" enctype="multipart/form-data" class="wrapper">
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1%">
  <div class="card-header" style=" height: auto; ">
    <div class="row">
      <input type="hidden" class="form-control" id="send_receiving" name="send_receiving" readonly>
      <input type="hidden" class="form-control" id="receiving_name" name="receiving_name" readonly>
      <input type="hidden" class="form-control" name="user" value="<?php echo $username; ?>" style="font-size: 13px; width: 175%;" >
        <form method="POST" action="add.php">
          <a href="add_document.php" class="addMdl btn btn-success btn-xs" style="float: left; font-size: 12px; margin-left: 10px;"><span class="glyphicon glyphicon-plus"></span> New Document</a>
          <a href="<?php $_SERVER['PHP_SELF']; ?>" class="refresfMdl btn btn-info btn-xs" style="float: left; margin-left: 10px; font-size: 12px;"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
        </form>
        <div class="form-group pull-right">
          <input type="text" class="search form-control rounded-0" placeholder="Search file here" style="font-size: 12px; float: right; margin-right: -320%; margin-bottom: -10%; width: 150%">
        </div>
    </div>
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
        <input type="submit" name="delete_all" value="Delete" class="btn btn-danger btn-xs" style="font-size: 12px; width: 8%; margin-bottom: 10px; margin-left: 4px;">

        <table id="userTbl" class="responsive-table table-hover table-striped table-sm m-0" width="100%">
          <thead style="background-color: #0062CC; color: white; font-size: 12px;">
            <tr class="myHead">
              <th class="" style="background-color: #0062CC; width: 3%">
              </th>
              <th style="width: 13%; text-align: center;">TRACKING NO.</th>
              <th style="width: 15%; text-align: center;">FILE NAME</th>
              <th style="width: 20%; text-align: center;">MESSAGE/DESCRIPTION</th>
              <th style="width: 15%; text-align: center;">DOCUMENT TYPE</th>
              <th style="width: 15%; text-align: center;">DATE & TIME POSTED</th>
              <th style="width: 15%; text-align: center;">ACTIONS</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT * FROM file_upload where status = 'Draft' ORDER BY id desc";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                $dis = ($row['attach_file'] && $row['file_name'] && $row['file_description'] && $row['type_document']) ? '' : 'disabled';
                echo 
                "<tr style='font-size: 12px'>
                 <td class=''>
                    <input type='checkbox' class='delete_checkbox' name='user_delete_id[]' value=".$row["id"]." />
                  </td>
                  <td style='text-align: center;'>".$row['tracking_no']."</td>
                  <td style='text-align: center;'>".$row['file_name']."</td>
                  <td style='text-align: center;'>".$row['file_description']."</td>
                  <td style='text-align: center;'>".$row['type_document']."</td>
                  <td style='text-align: center;'>".$row['select_date']."</td>
                  <td style='text-align: center;'>
                    <a href='#edit_".$row['id']."' class='btn btn-success btn-sm m-0' role='button' data-toggle='modal' style='font-size: 11px'><i class='fas fa-edit'></i></a>
                  
       
                    <a href='#delete_".$row['id']."' class='btn btn-danger  btn-sm m-0' role='button' data-toggle='modal' style='font-size: 11px'><i class='fa fa-trash'></i></a>


                    <button id='sendButton' type='button' class='btn btn-primary btn-sm m-0 ".$dis."' data-toggle='modal' data-target='#send_modal_".$row['id']."' style='font-size: 11px'><i class='fas fa-share-square'></i></button>
                  </td>
                </tr>";
                include('edit_delete_modal.php'); ####send document modal###
              }
            ?>
          </tbody>
        </table>
      </div>
   </div>
 <!---card body end---> 
 <!--- <td>
                    <a href='#send_modal_".$row['id']."' class='btn btn-primary  btn-sm m-0 ".$dis."' role='button' data-toggle='modal' style='font-size: 11px'><i class='fas fa-share-square'></i></a>
                  </td> ---->

<!-------- send modal ---------->
<div class="modal fade" id="send_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 100%; border: none">
      <div class="modal-header" style="background-color: #0062CC; height: 40px">
        <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 14px; font-weight: 550; color: #F0F0F0; margin-top: -1%">&nbsp;Send Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -15px; color: white; font-size: 20px; margin-top: -4%">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" name="sendDocu" action="edit.php">
        <div class="form-group">
        <table id="recUser" class="responsive-table table-hover table-striped table-sm m-0" width="100%">
          <thead style="background-color: #A8A8A8; color: white; font-size: 12px;">
            <!--search-->
            <div class="form-group has-search">
              <span class="fa fa-search form-control-feedback"></span>
              <input type="text" class="searchDept form-control" placeholder="Search by department" style="font-size: 12px; float: right; margin-left: 51%; margin-top: 1px; margin-bottom: 1%; width: 50%; height: 30px; border-radius: 0px; background-color: #F5F5F5;">
            </div>

            <tr class="myHead">
              <th style="width: 40%; text-align: left; font-size: 11px">NAME</th>
              <th style="width: 35%; text-align: left; font-size: 11px">POSITION</th>
              <th style="width: 25%; text-align: left; font-size: 11px">DEPARTMENT</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT * FROM register where usertype = 'Receiving Officer' and status =0";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr style='font-size: 12px'>
                  <td style='text-align: left;' id='".$row['id']."'>".$row['fullname']."</td>
                  <td style='text-align: left;'>(".$row['usertype'].")</td>
                  <td style='text-align: left;'>".$row['department']."</td>
                  <td>
                    <button id='send_btn_".$row['id']."' href='#' class='btn btn-sm m-0' role='button' data-toggle='tooltip'title='Send Document' style='font-size: 18px; color: #3993DE;' onclick='sendDocu(".$row['id'].")'><span><i class='fas fa-paper-plane'></i></span></button>
                  </td>
                </tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 11px; height: 30px;margin-top: -1%">Cancel</button>
         <button type="submit" name="submitDocu" class="btn btn-primary" style="font-size: 11px; height: 30px;margin-top: -1%">Done</button>
       </form>
      </div>

    </div>
  </div>
</div>



</div>
</form>
<style>
    .btnDelete
    {
        width: 10%;
        font-size: 12px;
        height: 30px;
        border-radius: 5px;
        margin-top: -1%;
        margin-left: 1px;
        margin-bottom: 5px;
    }
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
</style>
<?php include('add_modal.php') ?>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- generate datatable on our table -->
<!-- generate datatable on our table -->

<script>
$(document).ready(function(){
    $('.searchDept').on('keyup',function(){
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
   }, 8000);
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

     $(function(){

        //button select all or cancel
        $("#select-all").click(function () {
            var all = $("input.select-all")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
        });

        //button get selected info
        $("#delete").click(function () {
            var items=[];
            $("input.select-item:checked:checked").each(function (index,item) {
                items[index] = item.value;
            });
            if (items.length < 1) {
                alert("Please select an item to delete.");
            }else {
                var values = items.join(',');
                console.log(values);
                var html = $("<div></div>");
                html.html("selected:"+values);
                html.appendTo("body");
            }
        });

        //column checkbox select all or cancel
        $("input.select-all").click(function () {
            var checked = this.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
        });

        //check selected items
        $("input.select-item").click(function () {
            var checked = this.checked;
            console.log(checked);
            checkSelected();
        });
    });

$(document).ready(function(){
  //inialize datatable
    $('#userTbl').DataTable();
});


  function sendAll() {
    $('#submitDocu').click();
  }

  $(document).ready(function(){
    $('.searchDept').on('keyup',function(){
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
  var receiber = [];
  function sendDocu(id) {
    var idis = "send_btn_" + id;
    document.getElementById(idis).disabled = true;
    sendid.push(id);
    var names = $("#"+id).text();
    receiber.push(names);

    var final = sendid.join(',');
    var fnames = receiber.join('|');
    $("#receiving_name").val(fnames);
    $("#send_receiving").val(final);
  }
  function sendAll() {
    $('#submitDocu').click();
  }

function getImagePreview(event)
  {
    document.getElementById("sendButton").disabled = false;
  }
</script>
</body>
</html>

