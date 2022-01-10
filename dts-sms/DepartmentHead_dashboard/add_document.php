<?php
include 'add_document_code.php'; 
#session_start();
$username = $_SESSION['username'];
$department = $_SESSION['department'];
$fullname = $_SESSION['fullname'];
?>

<!-- categories php -->
         <?php
            $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

            $query = "SELECT * FROM tbl_typedocument WHERE department = '$department' ORDER BY type_document";
            $result = mysqli_query($conn, $query);
            $options3 = "";
            while($row2 = mysqli_fetch_array($result))
            {
                $options3 = $options3."<option>$row2[2]</option>";
            }

            $query = "SELECT * FROM tbl_department WHERE department != '$department' ORDER BY department ASC";
            $result = mysqli_query($conn, $query);
            $options1 = "";
            while($row2 = mysqli_fetch_array($result))
            {
                $options1 = $options1."<option>$row2[1]</option>";
            }

            $query = "SELECT * FROM tbl_action WHERE department = '$department' ORDER BY action";
            $result = mysqli_query($conn, $query);
            $options5 = "";
            while($row2 = mysqli_fetch_array($result))
            {
                $options5 = $options5."<option>$row2[1]</option>";
            }
          ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Department Head | Document Tracking System</title>
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
          width: 15%;
          margin-left: 60%;
          margin-top: -2.6%;
          float: right;
          margin-right: 1%;
          z-index: 1;
          position: fixed;
        }
</style>
<div class="info">
    <b style="font-size: 15px; font-weight: 600;"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600;">Dashboard</a> / Add New Document / </b><a href="draft_files.php" style="font-size: 15px; font-weight: 600">&nbsp;Drafts</a>
  </div>
  <style>
  .main-content .info{
    margin: 10px;
    margin-left: 4%;
    color: #1F4E79;;
    margin-top: 20px;
    margin-bottom: 15px;
    border-bottom: 1px solid #2F5597;
  }
  .small1 {
    font-style: italic;
    font-weight: 550;
    color: white;
  }
  .format 
  {
    font-size: 12px;
    color: gray;
    margin-left: 23%;
  }
  .btnReset
  {
    font-size: 11px;
    margin-left: 84%;
    margin-bottom: -5%;
  }
</style>

<!--- MAIN CONTENT END--->
</div>

<div class="row">
  

  <div class="card shadow" style="width: 65%; margin-left: 19%; border: none; margin-top: -1px">
    <div class="card-header" style="height: 39px; background-color: #0181CA;">
      <small class="small1">Fields with </small><small style="color: red;">*</small><small class="small1"> are required.</small>

    </div>
    <div class="card-body">
      <form id="transactionForm" action="add_document_code.php" method="POST" enctype="multipart/form-data" class="wrapper">
         <?php
            $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

            $query = "SELECT * FROM register WHERE department = '$department' and usertype = 'Releasing Officer'";
            $result1 = mysqli_query($conn, $query);
            $releaser = "";
            $releaser_id = "";
            if(mysqli_num_rows($result1) > 0) {
              while ($row = mysqli_fetch_assoc($result1)) {
                $releaser = $row["fullname"];
                $releaser_id = $row["id"];
              }
            }
          ?>
          <div>
            <input type="reset" class="btnReset btn-danger btn-sm" value="Reset Form" />
          </div>
            <div class="form-inline">
              <label class="label">Tracking Number: </label>
              <div class="tracking_no col-sm-5">
                <input type="text" class="form-control rounded-0" name="tracking_no" id="tracking_no" style="font-size: 13px; width: 150%;" value="<?php echo $tracking_no;?>" readonly>
              </div>
            </div><br>

            <div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Add Attachment: </label>
              <div class="myfile col-sm-5">
                <input type="file" class="upload-box form-control rounded-0" name="myfile" id="myfile" accept=".gif,.jpg,.jpeg,.png,.doc,.docx,.pdf,.xlsx, .xls, .csv" style="font-size: 13px;  background-color: #F0F0F0; width: 150%;">
              </div>
              <p class="format">
                - Allowed Formats: PDF, GIF, JPG, PNG, DOCX<br>
                - Maximum Size: 10 MB
              </p>
            </div>
            <!--<div id="preview" style="margin-left: 34%; margin-bottom: 5px; margin-top: -10px">-->

             <div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;File Name: </label>
              <div class="file_name col-sm-5">
                <input type="text" class="form-control rounded-0" name="file_name" id="file_name" style="font-size: 13px; background-color: #F0F0F0; width: 150%;" onkeyup = "Validate(this)" onchange='saveValue(this);'>
                <input type="hidden" class="form-control" name="releaser" value="<?php echo $releaser; ?>">
                <input type="hidden" class="form-control" name="user" value="<?php echo $username; ?>">
                <input type="hidden" class="form-control" name="releaser_id" value="<?php echo $releaser_id; ?>" >
                <input type="hidden" class="form-control" name="sender_name" value="<?php echo $fullname; ?>">
                <input type="hidden" class="form-control" id="isFiletoBeSend" name="isFiletoBeSend" >
                <input type="hidden" class="form-control" id="department" name="department" value="<?php echo $department; ?>">
                <input type="hidden" class="form-control" id="send_releasing" name="send_releasing" readonly>
                <input type="hidden" class="form-control" id="releasing_name" name="releasing_name" readonly>
              </div>
            </div><br>
  
          <?php
            $conn = mysqli_connect("localhost","root","","documenttrackingsystem_db");

            $query = "SELECT * FROM tbl_department";
            $result1 = mysqli_query($conn, $query);
            $options2 = "";
            while($row2 = mysqli_fetch_array($result1))
            {
                $options2 = $options2."<option>$row2[1]</option>";
            }

          ?>


            <div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Message/Description: </label>
              <div class="file_description col-sm-5">
                <textarea class="form-control rounded-0" name="file_description" id="file_description" placeholder="Write something.." onchange='saveValue(this);' style=" height:130px; font-size: 13px; background-color: #F0F0F0; width: 150%;" ></textarea>
              </div>
            </div><br>

            <!--<div class="form-inline">
              <label><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Office Destination: </label>
              <div class="type_document ">
                <select id="type_document" class="form-control" name="type_document" style="width: 182%; font-size: 13px;" required>
                    <option selected="true" disabled="disabled" hidden>Select department</option>
                    <?php echo $options2;?>
                    
                </select>
              </div>
            </div><br>-->
              
            <div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Document Type: </label>
              <div class="type_document col-sm-5">
                <select id="type_document" class="form-control rounded-0" name="type_document" style="font-size: 13px;  background-color: #F0F0F0; width: 150%;" required>
                    <option selected="true" disabled="disabled" hidden>Select here</option>
                    <?php echo $options3;?>
                    
                </select>
              </div>
              <div>
                  <a href="#docType" data-toggle="modal"><i class="fas fa-plus-square" style="color: orangered; position: absolute; margin-left: 13%; margin-top: -1%"></i></a>
              </div>
            </div><br>

            <div class="form-inline ">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Action: </label>
              <div class="forYour col-sm-5">
                <select id="forYour" class="form-control rounded-0" name="forYour" style="font-size: 13px;  background-color: #F0F0F0; width: 150%;" required>
                    <option selected="true" disabled="disabled" hidden>Select here</option>
                    <?php echo $options5;?>
                    
                </select>
              </div>
              <div>
                  <a href="#action" data-toggle="modal"><i class="fas fa-plus-square" style="color: orangered; position: absolute; margin-left: 13%; margin-top: -1%"></i></a>
              </div>
            </div><br>

            <div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Send To: </label>
              <div class="routedTo col-sm-5">
                <select id="routedTo" class="form-control rounded-0" name="routedTo" style="font-size: 13px;  background-color: #F0F0F0; width: 150%;" onchange="getImagePreview(event)" required>
                    <option selected="true" disabled="disabled" hidden>Select here</option>
                    <?php echo $options1;?>
                    
                </select>
              </div>
              <!--<div>
                  <a href="#deptRoute" data-toggle="modal"><i class="fas fa-plus-square"  style="color: orangered; position: absolute; margin-left: 13%; margin-top: -1.5%"></i></a>
              </div>-->
            </div><br>

            <!--<div class="form-inline">
              <label class="label"><small style="font-size: 14px; font-weight: 550; color: red;">*</small>&nbsp;Please: </label>
              <div class="pleaseNote col-sm-5">
                <select id="pleaseNote" class="form-control rounded-0" name="pleaseNote" style="font-size: 13px; width: 150%; background-color: #F0F0F0;" required>
                    <option selected="true" disabled="disabled" hidden>Select here</option>
                    <option selected="true">See Me</option>
                    <option selected="true">Evaluate/Prepare Study</option>
                    <option selected="true">Investigate/Submit Report</option>
                    <option selected="true">Draft Acknowledgement</option>
                    <option selected="true">Draft Opinion/Reply for my Signature</option>
                    <?php echo $options;?>
                    
                </select>
              </div>
              <div>
                  <a href="#myModal2" data-toggle="modal"><i class="fas fa-plus-square" style="color: orangered; position: absolute; margin-left:15%; margin-top: -10%"></i></a>
              </div>
            </div><br>-->



            <div class="form-group">
              <button type="submit" id="submitDocu" class="btn btn-secondary rounded-0" name="draft" style="width: 25%; margin-top: -1%; font-size: 13px; float: left; margin-left: 23%; "><i class="fas fa-save"></i></span>&nbsp; Save as Draft</button>

              <!---- SEND DOCUMENT BUTTON ------>
              <button type="button" name="send" id="send" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#send_modal" style="width: 20%; font-size: 13px; margin-top: -6.8%; float: left; margin-left: 53%" disabled><span><i class="fas fa-paper-plane"></i></span>&nbsp; Send</button>

            </div>


            </div>
      </form>
    </div>
  </div>

 <!-- <div class="card shadow-sm bg-white" style="width:25%; float: right; border: none; margin-top: -65.8%; margin-right: 2%">
  <div class="card-header" style="background-color: white; border-bottom: 2px solid #859BAA;">
    <span><i class="fas fa-file" style="font-size: 20px; color: #85AA9B;"></i>&nbsp;&nbsp;&nbsp;</span><label style="font-size: 13px; font-weight: 550; color: #859BAA; margin-bottom: -5%;">Documents</label>
  </div>
  <div class="card-body" style="height: auto; display: inline-block;"> 

  <div class="">
      <button type="button" class="btn btn-light" style="border-radius: 0; border: 2px solid lightgrey; height: 60px; font-size: 12px; margin-left: 13%; margin-top: 5%; width: 75%; font-weight: 600;" onclick="location.href = 'outgoingDocuments.php';"><i class="fa fa-share"></i><br> &nbsp;Outgoing Documents</button>
    </div>

  </div>
</div>-->
</div>

<!--- modal for send document ni department head---->

<div class="modal fade" id="send_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 90%; border: none;">
      <div class="modal-header" style="background-color: #0062CC; height: 40px;">
        <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 12px; font-weight: 550;color: white; margin-top: -1%"><span><i class="fas fa-file-alt"></i></span> &nbsp;FORWARD DOCUMENT</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -5%; color: white; font-size: 20px">
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
              <th style="width: 50%; text-align: left; font-size: 11px">RELEASING OFFICER</th>
              <th style="width: 40%; text-align: left; font-size: 11px">DEPARTMENT</th>
              <th style="width: 30%; text-align: left; font-size: 11px"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT * FROM register WHERE department = '$department' and usertype = 'Releasing Officer'";
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
      <div class="modal-footer" style="height: 50px">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 11px; height: 30px;margin-top: -1%">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="sendAll()" style="font-size: 11px; height: 30px;margin-top: -1%">Send</button>
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
        <form method="POST" id="addDocu">
          <div class="container-fluid">
              <div class="form-group">
                <br>
                  <small id="msg" style="font-style: italic; color: blue;"></small>
                  <br>
                  <label style="font-size: 13px; margin-bottom: 4%;">&nbsp;Add Document Type: &nbsp;</label>
              <input  class="form-control" type="hidden" placeholder="Enter here" name="department_type" id = "department_type" value="<?php echo $department;?>" style="font-size: 12px;" required /> 

              <input required name="addDocType" type="text" class="form-control rounded-0" placeholder="Enter here" id="addDocType" required style="font-size: 13px;margin-top: -3%;"/>
              </div>
          </div>
          <div class="modal-footer" style="height: auto;">
          <a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn btn-secondary" style="font-size: 12px; width: 25%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-left: -24%"> Done</a>
          <!--<button type="submit" id="add_type" name="add_type" class="btn btn-primary"  style="font-size: 12px; width: 25%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-right: 24%"><i class="fas fa-save"></i> Save</button>  -->
          <input class="btn btn-primary" type="button" name="add_type" id="add_type" value="Save" style="font-size: 12px; width: 25%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-right: 24%">
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
        <form method="POST" id="formActionID">
          <div class="container-fluid">
              <div class="form-group">
                <br>
                <small id="msg1" style="font-style: italic; color: blue;"></small>
                  <br>
                  <label style="font-size: 13px; margin-bottom: 4%;">&nbsp;Add Action: &nbsp;</label>
              <input  class="form-control" type="hidden" placeholder="Enter here" name="action_ID" id = "action_ID" value="<?php echo $department;?>" style="font-size: 12px;" required />
              
              <input required name="addAction" type="text" class="form-control rounded-0" placeholder="Enter here" id="addAction" required style="font-size: 13px;margin-top: -3%;"/>
              </div>
          </div>
          <div class="modal-footer" style="height: auto;">
          <a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn btn-secondary" style="font-size: 12px; width: 25%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-left: -24%"><i class="fa fa-times"></i> Done</a>

          <input class="btn btn-primary" type="button" name="add_action" id="add_action" value="Save" style="font-size: 12px; width: 25%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-right: 24%">

          <!--<button type="submit"  name="add_action" class="btn btn-primary"  style="font-size: 12px; width: 25%;margin-top: -1%; height: 30px; font-size: 13px; border: none; margin-right: 24%"><i class="fas fa-save"></i> Save</button>-->  
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
              <input  class="form-control" type="hidden" placeholder="Enter here" name="department_ID" id = "department_ID" value="<?php echo $department;?>" style="font-size: 12px;" required /> 
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


</body>
</html>

<style>
  .form-inline {
    margin-left: -5%;
  }
  .cs {
    margin-left: 18%;
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
</style>

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
function sendAll() {
  $("#isFiletoBeSend").val("toSend");
  $('#submitDocu').click();
}
function sendDocu(id) {
    var idis = "send_btn_" + id;
    document.getElementById(idis).disabled = true;
    sendid.push(id);
    var names = $("#"+id).text();
    receiber.push(names);

    var final = sendid.join(',');
    var fnames = receiber.join('|');
    $("#releasing_name").val(fnames);
    $("#send_releasing").val(final);
    console.log($("#releasing_name").val())
    console.log($("#send_releasing").val())
  }
function getImagePreview(event)
  {
document.getElementById("send").disabled = false;
  }

 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 5000);


 // validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\rA-Za-z\s-_-\%\$\.\,\@\-0-9]+/g, '');
}

    function countChar(val){
        var len = val.value.length;
        if(len >= 90){
            val.value = val.value.substring(0,90);
        }else{
            $('#charNum').text(90 - len);
        }
    };

//document type save without refresh
$(document).ready(function(){
    $('#add_type').click(function(){
        var data = $('#addDocu').serialize()+'&add_type=add_type';
        $.ajax({
          url:'addActionFunction.php',
          type:'post',
          data:data,
          success:function(response){
            $('#msg').text(response);
            $('#department_type').text('');
          }
        });
    });
}); //end

//action save without refresh
$(document).ready(function(){
    $('#add_action').click(function(){
        var data = $('#formActionID').serialize()+'&add_action=add_action';
        $.ajax({
          url:'addActionFunction.php',
          type:'post',
          data:data,
          success:function(response){
            $('#msg1').text(response);
            $('#addDocType').text('');
          }
        });
    });
}); //end

document.getElementById("file_name").value = getSavedValue("file_name");
document.getElementById("file_description").value = getSavedValue("file_description");

function saveValue(e)
{
  var id = e.id;
  var val = e.value;
  localStorage.setItem(id, val);
}

function getSavedValue (v){
  if (!localStorage.getItem(v)) {
    return "";
  }
  return localStorage.getItem(v);
} //end


</script>