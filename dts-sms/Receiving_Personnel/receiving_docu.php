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
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Pending Documents</b>
  </div>
</div>


 <form action="deleteUser.php" method="POST">
<div id="targetLayer" class="btn btn-success" style="display:none;width:100%;margin-bottom: 10px;"></div>
<div class="card shadow" style="width: 73%; margin-left: 25%; border: none; margin-top: 1% ">
  <div class="card-header" style="height:  85px; border-top: 2px solid #CCCCCC">
  	<small style="font-size: 11px; font-weight: 550; color: gray;">FOR RELEASING</small>
    <div class="row">
      <a href="<?php $_SERVER['PHP_SELF']; ?>" class="refresfMdl btn btn-primary" style="font-size: 12px; width: 8%; margin-top: 10px; margin-left: 10px; height: 30px"> Refresh</a>
      <input type="submit" name="delete_all" value="Delete"  class="btn btn-danger btn-xs" style="font-size: 12px; width: 8%; margin-top: 10px; margin-left: 6px; height: 30px">
      <input type="text" class="search form-control" placeholder="Search here" style="font-size: 12px; float: right; margin-left: 51%; margin-top: 1px;margin-bottom: -5%; width: 30%">
    </div>
      
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row">
      <!--<div class="row" style="margin-top: -1%; margin-left: 5px;">
    <a type="button" id="select-all" style="cursor: pointer; margin-left: -1px; font-size: 12px">Select All</a>&nbsp;
      <a type="button" id="delete" style="cursor: pointer; margin-left: 1px; color: red; font-size: 12px">Delete Selected</a>
            <button type="submit" name="delete_all" class="btnDelete btn-danger btn-xs" ><i class="fa fa-trash"></i>&nbsp; Delete</button>-->
    </div>

<!---- delete multiple data ---->
    
    <!---- end ----->
        <table id="userTbl" class="responsive-table table-hover table-striped table-sm m-0" width="100%">
          <thead style="background-color: #0062CC; color: white; font-size: 12px;">
            <tr>
                
            </tr>
            <tr class="myHead" style="height: 35px">
              <th style="width: 10%; text-align: left; font-size: 11px;">TRACKING #</th>
              <th style="width: 16%; text-align: left; font-size: 11px;">DOCUMENT TYPE</th>
              <th style="width: 18%; text-align: left; font-size: 11px;">ATTACHED FILE</th>
              <th style="width: 18%; text-align: left; font-size: 11px;">OFFICE DEPARTMENT</th>
              <th style="width: 18%; text-align: left; font-size: 11px;">RELEASER NAME</th>
              <th style="width: 18%; text-align: left; font-size: 11px;">DATE & TIME POSTED</th>
              <th style="text-align: left; font-size: 11px;">ACTIONS</th>
            </tr>
          </thead>

          <tbody>
          <td style="width: 10%; text-align: left; font-size: 11px;">200999928888</td>
          <td style="width: 16%; text-align: left; font-size: 11px;">Business Leters</td>
          <td style="width: 18%; text-align: left; font-size: 11px;">Yung file na sinend</td>
          <td style="width: 18%; text-align: left; font-size: 11px;">Kung saan galing na department</td>
          <td style="width: 18%; text-align: left; font-size: 11px;">Name of employee/dept head na nag send ng docu</td>
          <td style="width: 18%; text-align: left; font-size: 11px;">Date/Time</td>
          <td style="text-align: left; font-size: 11px;">
              <a href='#' class='btn btn-success  btn-sm m-0' data-toggle='modal' data-target="#send_modal" style='font-size: 11px;'>Relase</a>
          </td>
          </tbody>

        </table>
        </form>
      </div>
   </div>

 <!---card body end---> 



<!--- modal for release document---->

<div class="modal fade" id="send_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-0" style="width: 90%;">
      <div class="modal-header" style="background-color: #86ABF9; height: 40px;">
        <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 14px; font-weight: 550;color: white; margin-top: -1%">FORWARD THIS DOCUMENT</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -5%; color: white; font-size: 25px">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="receiver" style="margin-bottom: 4px; font-size: 14px; margin-left: 12%; color: #2C3953;"> TO:</label>
          <select id="receiver" class="form-control" name="receiver" style="width: 75%; font-size: 12px; cursor: pointer; margin-left: 13%">
            <option selected="true" disabled="disabled" hidden></option>
              <?php
                foreach($result1 as $row)
                {
                  echo '<option value="'.$row["fullname"].'">'.$row["fullname"].'</option>';  
                }
              ?>
                    
          </select>
        </div>

        <div class="form-group">
          <label for="receiver2" style="margin-bottom: 4px; font-size: 14px; margin-left: 12%; color: #2C3953;"> Multiple Send: </label>
          <select id="receiver2" class="form-control" name="receiver2" style="width: 75%; font-size: 12px; cursor: pointer; margin-left: 13%;">
            <option selected="true" disabled="disabled" hidden></option>
             <?php
                foreach($result1 as $row)
                {
                  echo '<option value="'.$row["fullname"].'">'.$row["fullname"].'</option>';  
                }
              ?>
                    
          </select>
        </div>
      </div>
      <div class="modal-footer" style="height: 50px">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 12px; margin-top: -1%">Cancel</button>
        <button type="button" class="btn btn-primary" style="font-size: 12px; margin-top: -1%">Done</button>
      </div>
    </div>
  </div>
</div>


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
