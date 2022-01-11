<?php
session_start();
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$username = $_SESSION['username'];
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
  <link href="../js/daterangepicker_old/daterangepicker-bs3.css" rel="stylesheet">
  <link href="../js/daterangepicker_old/datepicker3.css" rel="stylesheet">

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

  <div class="info">
     
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / Reports</b>

  </div>
</div>


<!-----Add Docu CSS---->
  <div class="wrapper">
    
  </div>

<?php

$connect = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");

$query = "SELECT DISTINCT department FROM register ORDER BY department ASC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>

<?php include('addUserModal.php') ?>
<div class="card" style="width: 73%; margin-left: 24%; border: none; margin-top: 1%;">
<!---- card header start ---->
  <div class="card-header" style="border: none; background-image: url('img/bgg.jpg'); height: 60px;">

  <div class="form-group">
       <input type="hidden" name="hidden_details" id="hidden_details" />

  <div style="width: 35%; margin-left: 1px; margin-right: -6%; margin-top: 4px;">
     <input type="text" class="form-control rounded-0" name="date_range" placeholder="Filter your date here..." id="consolidate_date_range" style="font-size: 12px">
  </div>

  <div class="search-box" style="width: 35%; float: right; margin-right: -6%; margin-top: -35px;">
      <input type="text" id="search" class="form-control rounded-0" placeholder="Search by names" style="font-size: 12px;">
  </div>
  </div>
</div>
</div>
<!---- card header end ---->
<div >

<style type="text/css" media="print">
@media print {
  body {
    background: none;
    -ms-zoom: 1.665;
  }
  div.portrait, div.landscape {
    margin: 0;
    padding: 0;
    border: none;
    background: none;
  }
  div.landscape {
    transform: rotate(270deg) translate(-276mm, 0);
    transform-origin: 0 0;
  }
}
</style>

<div class="card" style="width: 73%; margin-left: 24%; margin-top: 1%;">
  <div class="card-header" style="height: 50px; background-color: white;">
    <button class="btn btn-info btn-sm" onclick="printDiv('printarea')" style="font-size: 11px;" name="print" id="print" ><i class="fas fa-print"></i> &nbsp;Print Reports</button>

    <button class="btn btn-warning btn-sm" onclick='window.location.reload();' style="font-size: 11px;" ><i class="fas fa-sync-alt"></i> &nbsp;Refresh</button>
  </div>
  <div class="card-body" style="height: auto; display: fixed;">
  <div class="row" id="printarea">
    <p style="font-weight: 600; margin-left: 37.5%; ">DTS TRANSACTION REPORTS</p>
    <p style="font-weight: 500; margin-left: 46%; margin-top: -1.5%; font-size: 14px;"> <span id='myId'></span></p>
    <table id="userTbl" class="responsive-table table-hover table-bordered table-sm m-0" width="100%">
          <thead style="color: black; font-size: 12px;">
            <tr class="myHead" style="height: 35px">
              <th width="15px">DATE CREATED</th>
              <th width="10px">TRACK NO.</th>
              <th width="20px">CREATED BY</th>
              <th width="18px">DOCUMENT TYPE</th>
              <th width="18px">FILE NAME</th>
              <th width="15px">DATE RECEIVED</th>
              <th width="20px">RECEIVED BY</th>
            </tr>
          </thead>
          <tbody id="reportTable">
          </tbody>
        </table>
      </div>
    </div>
</div>
</div>

<style>

</style>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script src="../js/daterangepicker_old/moment.min.js"></script>
<script src="../js/daterangepicker_old/daterangepicker.js"></script>
<!-- generate datatable on our table -->

<script>
$(document).ready(function(){
  // Activate tooltips
  $('[data-toggle="tooltip"]').tooltip();
    
  // Filter table rows based on searched term
    $("#search").on("keyup", function() {
        var term = $(this).val().toLowerCase();
        $("table tbody tr").each(function(){
            $row = $(this);
            var name = $row.find("td:nth-child(1)").text().toLowerCase();
            console.log(name);
            if(name.search(term) < 0){                
                $row.hide();
            } else{
                $row.show();
            }
        });
    });
});


 $(document).ready(function(){

    load_data();
    
    function load_data(dept='', date_range='')
    {
        $.ajax({
            url:"fetch_report.php",
            method:"POST",
            data:{
              query:dept,
              date_range: date_range
            },
            success:function(data)
            {
                $('#reportTable').html(data);
            }
        })
    }

    $('#filter').change(function(){
        var date_range = $('#consolidate_date_range').val();
        $('#hidden_details').val($('#filter').val());
        var query = $('#hidden_details').val();
        load_data(query, date_range);
    });

    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#consolidate_date_range').daterangepicker();
    $('#consolidate_date_range').on('apply.daterangepicker', function(ev, picker) {
      var date_range = $('#consolidate_date_range').val();
        $('#hidden_details').val($('#filter').val());
        var query = $('#hidden_details').val();
        load_data(query, date_range);
    });
    
});
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 3000);

 //print table
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

var date = new Date(); 
var dd = date.getDate(); 
var mm = date.getMonth() + 1; 
var yyyy = date.getFullYear(); 
var newDate = mm + "/" + dd + "/" +yyyy; 
var p = document.getElementById("myId"); 
p.innerHTML = newDate; 
</script> 

</body>
</html>
<!-----Add Docu CSS---->
  <div class="wrapper">
    <?php include_once"css/addDocuStyle.css"; ?>
  </div>