<?php
session_start();
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$username = $_SESSION['username'];

//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$passwd){
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
}
//##########################################################################

if($_POST)
{
    $number = $_POST['number'];
    $sender = $_POST['sender'];
    $message = $_POST['message'];
    $api = "TR-SHAIN198242_57X8G";
    $apipassword = "&hj5#!91ie";
    $text = $sender.": ".$message;

    if (!empty($_POST['sender']) && ($_POST['number']) && ($_POST['message'])){
        $result = itexmo($number,$text,$api,$apipassword);
            if ($result == ""){
            echo "iTexMo: No response from server";  
            }else if ($result == 0){
                $_SESSION['msgSuccess'] = 'Message sent.';
            }
            else{   
                $_SESSION['msgError'] = 'There was an error encountered';
            }
            }
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
<!-----Top bar navigation---->
  <div class="wrapper">
    <?php include_once"include/topbar.php"; ?>
  </div>

<!-----Side bar navigation---->
  <div class="wrapper">
    <?php include_once"include/sidebar.php"; ?>
  </div>

<!--- Label for Add Document-->  
<div class="main-content">
          <?php
        if(isset($_SESSION['msgError'])){
          echo
          "
          <div class='alert alert-danger text-center' style='background-color: #E23C42; color: white;'>
            <strong>Warning!</strong> ".$_SESSION['msgError']."
          </div>
          ";
          unset($_SESSION['msgError']);
        }
        if(isset($_SESSION['msgSuccess'])){
          echo
          "
          <div class='alert alert-success text-center' style='background-color: #04A12B; color: white;'>
            <strong>Success!</strong> ".$_SESSION['msgSuccess']."
          </div>
          ";
          unset($_SESSION['msgSuccess']);
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
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / SMS Notification</b>
</div>
</div>

  <style>
    .main-content .info{
    margin: 10px;
    margin-left: 23.5%;
    color: #1F4E79;;
    margin-top: 20px;
    margin-bottom: 15px;
    font-size: 12px; 
    border-bottom: 1px solid #2F5597;

  }
  .modal-body {
    max-height: calc(80vh - 200px);
    overflow-y: auto;
}
</style>

<div class="card" style="width:950px; margin-left: 23.5%;">
<div class="card-body" style="height: auto;">


    <form method="POST" action="sms.php">
      <div class="card shadow" style="width:470px; margin-top: -3px; margin-left: 23.5%;">
        <div class="card-header" style="font-size: 13px; text-align: left; font-weight: 600; color: white; background-color: #0181CA;">Create a Message</div>
        <div class="card-body" style="height: auto;">

            <div class="container">
            <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#find_contacts" style="margin-left: 38%; font-size: 12px"><i class="fas fa-user"></i>&nbsp;&nbsp;Find Contacts</button>
            
            <div class="form-group">
                <label for="sender" style="margin-bottom: 4px; font-size: 14px;" hidden="">Sender Name:</label>
            <input  class="form-control rounded-0" type="text" name="sender" value="<?php echo $firstname; ?> <?php echo $lastname; ?> (<?php echo $username; ?>)" id = "sender" style="font-size: 12px;" hidden /> 

            <label for="receiver" style="margin-bottom: 4px; font-size: 14px;">Receiver Name</label>
            <input  class="form-control rounded-0" type="text" name="receiver" id = "receiver" style="font-size: 12px;" readonly /> 
           </div>

          <div class="form-group">
            <label for="number" style="margin-bottom: 4px; font-size: 14px;">Recepient's Mobile Number </label>
            <textarea class="form-control rounded-0" type="text" placeholder="ex. (09123456789)" name="number" id = "number" style="font-size: 12px; height: 70px" maxlength="11" onkeyup="validatephone(this);" required ></textarea>
            <!--<input class="form-control rounded-0" type="text" placeholder="ex. (09123456789)" name="number" id = "number" style="font-size: 12px;" maxlength="11" onkeyup="validatephone(this);" id="phone" required /> -->
           </div>

           <div class="form-group">
            <hr>
            <ul>
                <div style="margin-left: 10%;">
                  <input type="checkbox" value="Greetings!" class="checkMe" name="q1" id="q1" />
                  <small for="q1">Greetings!</small>&nbsp;

                  <input type="checkbox" value="How are you today?" class="checkMe" name="q2" id="q2" />
                  <small for="q2">How are you today?</small>&nbsp;

                  <input type="checkbox" value="Thank you." class="checkMe" name="q2" id="q2" />
                  <small for="q2">Thank you.</small>
                </div>
                <div style="margin-left: 20%;">
                  <input type="checkbox" value="Have a nice day!" class="checkMe" name="q2" id="q2" />
                  <small for="q2">Have a nice day!</small>&nbsp;


                  <input type="checkbox" value="See you later." class="checkMe" name="q2" id="q2" />
                  <small for="q2">See you later.</small>
                </div>
            </ul>

            <textarea class="form-control rounded-0" type="text" placeholder="Write a message..." name="message" id = "message" style="font-size: 12px; height: 100px" onkeyup="countChar(this)" required ></textarea>
           </div><p class="text-right" id="charNum" style="margin-top: -10px; font-size: 12px; color: red;">90</p><br>

           <div class="" style="background-color: white;">
            <button type="submit" name="send" class="btn btn-primary" style="width: 25%; font-size: 11px; margin-left: 75%; margin-top: -6%;">Send</button>  
            </div>

            </div>
        </div>
      </div>
</form>

</div> 
</div>

<?php  
    include('connection_db/connection.php');
    $list = mysqli_query($conn, "SELECT COUNT(*) as count FROM batch_upload");

    while ($listRow = mysqli_fetch_array($list))
    {
        $var = $listRow['count'];
    }

?>
<div class="modal fade" id="find_contacts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document" style="">
    <div class="modal-content" style="width: 100%; border: none">
      <div class="modal-header" style="background-color: #0062CC; height: 40px">
        <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 14px; font-weight: 550; color: #F0F0F0; margin-top: -1%"><i class='fas fa-users'></i>&nbsp;&nbsp;Contacts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -15px; color: white; font-size: 20px; margin-top: -4%">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">

    

        <table id="contacts" class="contacts responsive-table table-hover table-bordered table-sm m-0" width="100%">
          <thead style="background-color: #A8A8A8; color: white; font-size: 12px;">
            <!--search-->
            <div class="form-group has-search">

              <input type="text" class="contacts form-control" placeholder="Search employee" style="font-size: 12px; float: right; margin-left: 51%; margin-top: -10px; margin-bottom: -10%; width: 70%; height: 30px; border-radius: 0px; background-color: #F5F5F5;">
            </div>

            <tr class="myHead">
                <small style="font-size: 11px;"> Show <?php echo "[".$var."] entries";?></small>
                <th style="width: 5%; text-align: left; font-size: 11px"></th>
            <!--<th style="width: 5%; text-align: left; font-size: 11px"><input id="check_all" type="checkbox"></th>-->
              <th style="width: 50%; text-align: left; font-size: 11px">LIST OF EMPLOYEES</th>
              <th style="width: 50%; text-align: left; font-size: 11px">DEPARTMENT</th>
              <th style="width: 50%; text-align: left; font-size: 11px" hidden>PHONE NUMBERS</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include_once('connection_db/connection.php');
              $sql = "SELECT * FROM batch_upload ORDER BY fullname ASC";
              //use for MySQLi-OOP
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr style='font-size: 12px'>
                <td class=''>
                    <input type='checkbox' name='row-check' value=".$row["id"]." />
                  </td>
                  <td style='text-align: left;' id='".$row['id']."'>".$row['fullname']." </td>
                  <td style='text-align: left;' id='".$row['id']."'>".$row['department']."</td>
                  <td style='text-align: left;' hidden>".$row['phone_number']."</td>
                </tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 11px; height: 30px;margin-top: -1%">Cancel</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="sendAll()" style="font-size: 11px; height: 30px;margin-top: -1%">Confirm</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<script src="jquery/jquery.min.js"></script>
<!-- Script -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
 
<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>

//fetch phone number
//table select
var table = document.getElementById('contacts');
                
  for(var i = 1; i < table.rows.length; i++)
  {
    table.rows[i].onclick = function()
    {
      //rIndex = this.rowIndex;
      document.getElementById("number").value = this.cells[3].innerHTML;
      document.getElementById("receiver").value = this.cells[1].innerHTML;
      //document.getElementById("age").value = this.cells[2].innerHTML;
                         
    };
  }

//checkbox suggested message
$(document).ready(function(){
    $('.checkMe').click(function(){
        var text="";
        $('.checkMe:checked').each(function(){
            text+=$(this).val()+ ',';
        });
        text=text.substring(0,text.length-1);
        $('#message').val(text);

    });
});

//search table
$(document).ready(function(){
    $('.contacts').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#contacts tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});

//num validation
    function countChar(val){
        var len = val.value.length;
        if(len >= 90){
            val.value = val.value.substring(0,90);
        }else{
            $('#charNum').text(90 - len);
        }
    };

 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
   }, 5000);
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

function validatephone(phone) 
{
    var maintainplus = '';
    var numval = phone.value
    if ( numval.charAt(0)=='+' )
    {
        var maintainplus = '';
    }
    curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,'');
    phone.value = maintainplus + curphonevar;
    var maintainplus = '';
    phone.focus;
}

$(function() {
    //If check_all checked then check all table rows
    $("#check_all").on("click", function () {
        if ($("input:checkbox").prop("checked")) {
            $("input:checkbox[name='row-check']").prop("checked", true);
        } else {
            $("input:checkbox[name='row-check']").prop("checked", false);
        }
    });

    // Check each table row checkbox
    $("input:checkbox[name='row-check']").on("change", function () {
        var total_check_boxes = $("input:checkbox[name='row-check']").length;
        var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;

        // If all checked manually then check check_all checkbox
        if (total_check_boxes === total_checked_boxes) {
            $("#check_all").prop("checked", true);
        }
        else {
            $("#check_all").prop("checked", false);
        }
    });
});
</script>