<?php 
  include 'add_document_code.php'; 
  #session_start();
  $username = $_SESSION['username'];
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
?>

<!-- categories php -->
         <?php
            $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

            $query = "SELECT * FROM tbl_typedocument WHERE department = '$username' order by type_document asc";
            $result = mysqli_query($conn, $query);
            $options = "";
            while($row2 = mysqli_fetch_array($result))
            {
                $options = $options."<option>$row2[2]</option>";
            }

            $query = "SELECT * FROM tbl_department order by department asc";
            $result = mysqli_query($conn, $query);
            $options1 = "";
            while($row2 = mysqli_fetch_array($result))
            {
                $options1 = $options1."<option>$row2[1]</option>";
            }

            $query = "SELECT * FROM tbl_action order by action asc";
            $result = mysqli_query($conn, $query);
            $options2 = "";
            while($row2 = mysqli_fetch_array($result))
            {
                $options2 = $options2."<option>$row2[1]</option>";
            }
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

</head>
<body style="background-color: #f5f5f5;">

  <!-- Preloader -->
  <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->

<!-----Top bar navigation---->
  <div class="wrapper">
    <?php include_once"include/topbar.php"; ?>

<!---- Sidebar ---->
    <?php include_once"include/sidebar.php"; ?>
  </div>

<!--- MAIN CONTENT START --->
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
          width: 20%;
          margin-left: 77%;
          margin-top: -2.6%;
          float: right;
          margin-right: 1%;
          z-index: 1;
          position: fixed;
        }
</style>
<div class="info">
    <b style="font-size: 15px; font-weight: 600;"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600;">Dashboard</a> / Add New Document</b>
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
  .small {
    font-style: italic;
    font-weight: 550;
    color: white;
  }
</style>

<!--- MAIN CONTENT END--->
</div>


  <div class="card shadow" style="width: 60%; margin-left: 30%; border: none; margin-top: 1%">
    <div class="card-header" style="height: 39px; background-color: #0181CA;">
      <small class="small">Fields with </small><small style="color: red;">*</small><small class="small"> are required.</small>
    </div>
    <div class="card-body">
      <form action="add_document_code.php" method="POST" enctype="multipart/form-data" class="wrapper">

            <div class="form-inline">
              <label class="label">Tracking Number: </label>
              <div class="tracking_no col-sm-5">
                <input type="text" class="form-control rounded-0" name="tracking_no" style="font-size: 13px; width: 150%;" value="<?php echo $tracking_no;?>" readonly>
                <input type="hidden" class="form-control" id="send_receiving" name="send_receiving" readonly>
                <input type="hidden" class="form-control" id="receiving_name" name="receiving_name" readonly>
                <input type="hidden" class="form-control" name="user" value="<?php echo $username; ?>" style="font-size: 13px; width: 175%;" >
                <input type="hidden" class="form-control" id="isDraftorSend" name="isDraftorSend">
              </div>
            </div><br>

            <!--<div class="form-inline">
              <label style="font-size: 13px;">Sender Name:</label>
              <div class="file_name ">
                <input type="text" class="form-control rounded-0" name="file_name" style="font-size: 13px; width: 175%;  background-color: #F0F0F0;" value="Administrator" readonly>
              </div>
            </div><br>-->

            <style>
              .format 
              {
                font-size: 12px;
                color: gray;
                margin-left: 22%;
              }
            </style>

            <div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Add Attachment: </label>
              <div class="myfile col-sm-5">
                <input type="file" class="upload-box form-control rounded-0" name="myfile" id="myfile" style="font-size: 13px;  background-color: #F0F0F0; width: 150%;">
              </div>
              <p class="format">
                - Allowed Formats: PDF, GIF, JPG, PNG, DOCX<br>
                - Maximum Size: 10 MB
              </p>
            </div>
            <div id="preview" style="margin-left: 34%; margin-bottom: 5px; margin-top: -10px"></div>
            
             <div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;File Name: </label>
              <div class="file_name col-sm-5">
                <input type="text" class="form-control rounded-0" name="file_name" style="font-size: 13px;  background-color: #F0F0F0; width: 150%;" onkeyup = "Validate(this)" id="txt">
              </div>
            </div><br> 
  
            <div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Message/Description: </label>
              <div class="file_description col-sm-5">
                <textarea class="form-control rounded-0" name="file_description" placeholder="Write something.." style="font-size: 13px;  background-color: #F0F0F0; width: 150%; height: 130px;"></textarea>
              </div>
            </div><br>


            
            <div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Document Type: </label>
              <div class="type_document col-sm-5">
                <select id="type_document" class="form-control rounded-0" name="type_document" style="font-size: 13px;  background-color: #F0F0F0; width: 150%;" required>
                    <option selected="true" disabled="disabled" hidden>Select here</option>
                    <?php echo $options;?>
                    
                </select>
              </div>
              <div>
                  <a href="#docType" data-toggle="modal"><i class="fas fa-plus-square" style="color: orangered; position: absolute; margin-left: 13%; margin-top: -1%"></i></a>
              </div>
            </div><br>

            <!-- send to html -->
            <!--<div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Send To: </label>
              <div class="routedTo col-sm-5">
                <select id="routedTo" class="form-control rounded-0" name="routedTo" style="font-size: 13px;  background-color: #F0F0F0; width: 150%;" required>
                    <option selected="true" disabled="disabled" hidden>Select here</option>
                    <?php echo $options1;?>
                    
                </select>
              </div>
              <div>
                  <a href="#deptRoute" data-toggle="modal"><i class="fas fa-plus-square" style="color: orangered; position: absolute; margin-left: 13%; margin-top: -1%"></i></a>
              </div>
            </div><br>-->

            <!--<div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Please: </label>
              <div class="pleaseNote ">
                <select id="pleaseNote" class="form-control rounded-0" name="pleaseNote" style="width: 217%; font-size: 13px;  background-color: #F0F0F0;" required>
                    <option selected="true" disabled="disabled" hidden>Select here</option>
                    <?php echo $options;?>
                    
                </select>
              </div>
              <div>
                  <a href="#myModal2" data-toggle="modal"><i class="fas fa-plus-square" style="color: orangered; position: absolute; margin-left: 25%; margin-top: -8.5%"></i></a>
              </div>
            </div><br>-->

            <div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Action: </label>
              <div class="action col-sm-5">
                <select id="forYour" class="form-control rounded-0" name="forYour" style="font-size: 13px;  background-color: #F0F0F0; width: 150%;" onchange="getImagePreview(event)"required>
                    <option selected="true" disabled="disabled" hidden>Select here</option>
                    <?php echo $options2;?>
                    
                </select>
              </div>
              <div>
                  <a href="#action" data-toggle="modal"><i class="fas fa-plus-square" style="color: orangered; position: absolute; margin-left: 13%; margin-top: -1%"></i></a>
              </div>
            </div><br>

            <div class="form-group">
              <button id="submitDocu" type="submit" class="btn btn-secondary" name="submit" style="width: 25%; margin-top: -1%; font-size: 13px; float: left; margin-left: 23%;"><i class="fas fa-save" onclick="isDraftSEnd('draft')"></i></span>&nbsp; Save as Draft</button>

              <!---- SEND DOCUMENT BUTTON ------>
              <button id="sendButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#send_modal" style="width: 20%; font-size: 13px; margin-top: -5.8%; float: left; margin-left: 52%" disabled onclick="isDraftSEnd('send')"><span><i class="fas fa-paper-plane"></i></span>&nbsp; Send</button>
            </div>

      </form>
    </div>
  </div>

<!--- List of receiver ng bawat departments --->
         <?php
            $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

            $query = "SELECT * FROM register WHERE usertype NOT IN ('Employee', 'Department Head', 'Releasing Officer') ORDER BY fullname ASC";
            $result1 = mysqli_query($conn, $query);
            $options3 = "";
            while($row = mysqli_fetch_array($result1))
            {
                $options3 = $options3."<option>$row[1]</option>";
            }

          ?>


<!--- modal for send document ---->

<div class="modal fade" id="send_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 100%; border: none">
      <div class="modal-header" style="background-color: #0062CC; height: 40px">
        <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 14px; font-weight: 550; color: #F0F0F0; margin-top: -1%"><i class='fas fa-paper-plane'></i>&nbsp;&nbsp;Send Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -15px; color: white; font-size: 20px; margin-top: -4%">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">

        <table id="recUser" class="responsive-table table-hover table-striped table-sm m-0" width="100%">
          <thead style="background-color: #A8A8A8; color: white; font-size: 12px;">
            <!--search-->
            <div class="form-group has-search">
              <span class="fa fa-search form-control-feedback"></span>
              <input type="text" class="searchDept form-control" placeholder="Search" style="font-size: 12px; float: right; margin-left: 51%; margin-top: 1px; margin-bottom: 1%; width: 50%; height: 30px; border-radius: 0px; background-color: #F5F5F5;">
            </div>

            <tr class="myHead">
              <th style="width: 50%; text-align: left; font-size: 11px">RECEIVING OFFICER</th>
              <th style="width: 40%; text-align: left; font-size: 11px">DEPARTMENT</th>
              <th style="width: 30%; text-align: left; font-size: 11px"></th>
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
                  <td style='text-align: left;' id='".$row['id']."'><i class='fas fa-user' style='color: #999999;'>&nbsp;&nbsp;</i>".$row['fullname']."</td>
                  <td style='text-align: left;'>".$row['department']."</td>
                  <td>
                    <button id='send_btn_".$row['id']."' href='#' class='btn btn-sm m-0' role='button' style='font-size: 12px; color: #3993DE;' onclick='sendDocu(".$row['id'].")'><span><i class='fas fa-paper-plane'></i></span>SEND</button>
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
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="sendAll()" style="font-size: 11px; height: 30px;margin-top: -1%">Done</button>
      </div>
    </div>
  </div>
</div>


    <!-- document type -->
<div class="modal fade" id="docType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" style="max-width: 30%;">
      <div class="modal-content rounded-0 shadow" style="background-color: white; margin-top: 20%; border: none;">
       <div class="container"></div>
        <div class="modal-body" class="modal fade">
        <form method="POST" action="addActionFunction.php">
          <div class="container-fluid">
              <div class="form-group">
                <br>
                  <label style="font-size: 13px; margin-bottom: 4%;">&nbsp;Add Document Type: &nbsp;</label>
              <input  class="form-control" type="hidden" placeholder="Enter here" name="department_type" id = "department_type" value="<?php echo $username;?>" style="font-size: 12px;" required /> 

              <input required name="addDocType" type="text" class="form-control rounded-0" placeholder="Enter here" id="addDocType" required style="font-size: 13px;margin-top: -3%;"/>
              </div>
          </div>
          <div class="modal-footer" style="height: auto;">
          <a href="#" data-dismiss="modal" class="btn btn-secondary" style="font-size: 12px; width: 25%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-left: -24%"><i class="fa fa-times"></i> Cancel</a>
          <button type="submit" name="add_type" class="btn btn-primary"  style="font-size: 12px; width: 25%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-right: 24%"><i class="fas fa-save"></i> Save</button>  
          </div>
          </form>
        </div>
      </div>
    </div>
</div>

<!-- routed to -->
<div class="modal fade" id="deptRoute" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" style="max-width: 30%;">
      <div class="modal-content rounded-0 shadow" style="background-color: white; margin-top: 20%; border: none;">
       <div class="container"></div>
        <div class="modal-body" class="modal fade">
        <form method="POST" action="addActionFunction.php">
          <div class="container-fluid">
              <div class="form-group">
                <br>
                  <label style="font-size: 13px; margin-bottom: 4%;">&nbsp;Add Department: &nbsp;</label>
              <input required name="addDept" type="text" class="form-control rounded-0" placeholder="Enter here" id="addDept" required style="font-size: 13px;margin-top: -3%;"/>
              </div>
          </div>
          <div class="modal-footer" style="height: auto;">
          <a href="#" data-dismiss="modal" class="btn btn-secondary" style="font-size: 12px; width: 25%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-left: -24%"><i class="fa fa-times"></i> Cancel</a>
          <button type="submit"  name="add_dept" class="btn btn-primary"  style="font-size: 12px; width: 25%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-right: 24%"><i class="fas fa-save"></i> Save</button>  
          </div>
          </form>
        </div>
      </div>
    </div>
</div>

<!-- for your action -->
<div class="modal fade" id="action" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" style="max-width: 30%;">
      <div class="modal-content rounded-0 shadow" style="background-color: white; margin-top: 20%; border: none;">
       <div class="container"></div>
        <div class="modal-body" class="modal fade">
        <form method="POST" action="addActionFunction.php">
          <div class="container-fluid">
              <div class="form-group">
                <br>
                  <label style="font-size: 13px; margin-bottom: 4%;">&nbsp;Add Action: &nbsp;</label>
              <input required name="addAction" type="text" class="form-control rounded-0" placeholder="Enter here" id="addAction" required style="font-size: 13px;margin-top: -3%;"/>
              </div>
          </div>
          <div class="modal-footer" style="height: auto;">
          <a href="#" data-dismiss="modal" class="btn btn-secondary" style="font-size: 12px; width: 25%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-left: -24%"><i class="fa fa-times"></i> Cancel</a>
          <button type="submit"  name="add_action" class="btn btn-primary"  style="font-size: 12px; width: 25%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-right: 24%"><i class="fas fa-save"></i> Save</button>  
          </div>
          </form>
        </div>
      </div>
    </div>
</div>


</body>
</html>

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
   .label
  {
    font-size: 14px;
    display: inline-block;
    width: 150px;
    font-weight: 550;
    margin-left: -7%;
  }

  .wrapper
  {
    margin-left: 20%;
  }
  .upload-box{
    font-size: 14px;
    background-color: white;
    outline: none;
    cursor: pointer;
  }
  ::-webkit-file-upload-button{
    color: white;
    background: #357EDD;
    border: none;
    outline: none;
    cursor: pointer;
  }
  ::-webkit-file-upload-button:hover{
    background: #2C5EBA;
  }

  .getImagePreview
  {
    padding: 100px;
  }
    .tooltip{
   font-size: 10px;
 }
</style>

 <script src="js/scripts.js"></script>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>

<!-- Script -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
 
<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
  //to release
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

function getImagePreview(event)
  {
    document.getElementById("sendButton").disabled = false;
  }

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

  function isDraftSEnd(stat) {
    $('#isDraftorSend').val(stat);
    console.log($('#isDraftorSend').val());
  }
  function sendAll() {
    $('#submitDocu').click();
  }

 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 4000);


 // validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\rA-Za-z\s-_-\%\$\.\,\@\-0-9]]+/g, '');
}

  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

//submit modal without page refresh
function addCategories()
{
  var data = new URLSearchParams();
  data.append("documentType", document.getElementById("addDocType").value);
  data.append("department", document.getElementById("addDept").value);
  data.append("action", document.getElementById("addAction").value);

  var cat = XMLHttRequest();
  cat.open("POST", "addActionFunction.php");
  cat.onload = function(){
    console.log(this.response);
    /*if(this.response == "OK") {
      document.getElementById("formCategID").reset();
      alert("ok");
    } else {
      alert("error");
    }*/
  };
  //cat.send(data);
  cat.send();

  //prevent from submit code
  return false;
}
</script>