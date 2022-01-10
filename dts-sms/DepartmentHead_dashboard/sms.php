<?php
session_start();
$fullname = $_SESSION['fullname'];
$department = $_SESSION['department'];
$username = $_SESSION['username'];


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

if($_POST)
{
    $number = $_POST['number'];
    $sender = $_POST['sender'];
    $message = $_POST['message'];
    $api = "TR-NICOL324736_4TB2Z";
    $apipassword = "{8sq32)mux";
    $text = $sender.": ".$message;

    if (!empty($_POST['sender']) && ($_POST['number']) && ($_POST['message'])){
        $result = itexmo($number,$text,$api,$apipassword);
            if ($result == ""){
            echo "iTexMo: No response from server";  
            }else if ($result == 0){
                $_SESSION['msgSuccess'] = 'Message Sent';
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
    <b style="font-size: 15px; font-weight: 600"><div class="navbar_link"></div><a href="navbar.php" style="font-size: 15px; font-weight: 600">Dashboard</a> / SMS Messaging</b>
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
</style>

<div class="card" style="width:950px; margin-left: 23.5%;">
<div class="card-body" style="height: auto;">


    <form method="POST" action="sms.php">
      <div class="card shadow" style="width:470px; margin-top: -3px; margin-left: 23.5%;">
        <div class="card-header" style="font-size: 13px; text-align: left; font-weight: 600; color: white; background-color: #0181CA;">Create a Message</div>
        <div class="card-body" style="height: auto;">

            <div class="container">
            <div class="form-group">
            <label for="sender" style="margin-bottom: 4px; font-size: 14px;">Sender Name</label>
            <input  class="form-control" type="text" placeholder="Enter here" name="sender" id = "sender" style="font-size: 12px;" value="<?php echo $fullname; ?> (<?php echo $department; ?> Head)" readonly /> 
           </div>

          <div class="form-group">
            <label for="number" style="margin-bottom: 4px; font-size: 14px;">Recepient's Mobile Number </label>
            <input class="form-control" type="text" placeholder="ex. (09123456789)" name="number" id = "number" style="font-size: 12px;" maxlength="11" onkeyup="validatephone(this);" id="phone" required /> 
           </div>

           <div class="form-group">
            <label for="message" style="margin-bottom: 4px; font-size: 14px;">Message here</label>
            <textarea class="form-control" type="text" placeholder="Enter here" name="message" id = "message" style="font-size: 12px; height: 100px" onkeyup="countChar(this)" required ></textarea>
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
</script>