<?php $department = $_SESSION['department']; ?>
<?php $fullname = $_SESSION['fullname']; ?>  
<?php $id = $_SESSION['id']; ?>        

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link" href="#" id="notifDropdown" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button class="btn btn-default btn-lg btn-link"
                  style="font-size:20px; padding: 0px;"
                  onclick="fetch_head_incoming('seen')" 
                >
                  <span><i class="fas fa-file-download"></i></span>
                </button>
                <span class="badge badge-notify badgedocuReceived"></span>
              </a>
                <div id="dropdownNotif" class="dropdown-menu dropdown-menu-right shadow animated--grow-in" style="z-index: 1;">
                  <small><b style="color: green; margin-left: 5%;">Incoming</b></small><br>
                  <div class="dropdown-divider" style="color: gray;"></div>
                  <div id="docuReceived">
                  </div>
                </div>
              </li>
          </ul> -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link" href="#" id="notifDropdown" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button class="btn btn-default btn-lg btn-link" style="font-size:20px; padding: 0px;" onclick="fetch_head_receive_receive('seen')" data-toggle='tooltip' title='Documents Received by Receiving Officer'>
                  <span><i class="fas fa-file-download"></i></span>
                </button>
                <span class="badge badge-notify badgeReceivedReceived"></span>
              </a>
                <div id="dropdownNotif" class="dropdown-menu dropdown-menu-right shadow animated--grow-in" style="z-index: 1;">
                  <small><b style="color: #0062CC; margin-left: 2%; font-size: 13px; font-weight: 700"><i class="fas fa-file-export"></i>&nbsp;&nbsp;Documents Received by Receiving Officer</b></small><br>
                  <div class="dropdown-divider" style="color: gray;"></div>
                  <div id="ReceivedReceivedDocument">
                  </div>
                </div>

              </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link" href="#" id="notifDropdown" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button class="btn btn-default btn-lg btn-link" style="font-size:20px; padding: 0px;" onclick="fetch_head_release('seen')" data-toggle='tooltip' title='Released Documents'>
                  <span><i class="fas fa-file-export"></i></span>
                </button>
                <span class="badge badge-notify badgeReleased"></span>
              </a>
                <div id="dropdownNotif" class="dropdown-menu dropdown-menu-right shadow animated--grow-in" style="z-index: 1;">
                  <small><b style="color: #0062CC; margin-left: 2%; font-size: 13px; font-weight: 700"><i class="fas fa-file-export"></i>&nbsp;&nbsp;Released Documents</b></small><br>
                  <div class="dropdown-divider" style="color: gray;"></div>
                  <div id="releasedDocument">
                  </div>
                </div>

              </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link" href="#" id="notifDropdown" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button class="btn btn-default btn-lg btn-link" style="font-size:20px; padding: 0px;" onclick="fetch_head_receive('seen')" data-toggle='tooltip' title='Received Documents'>
                  <span><i class="fas fa-file-import"></i></span>
                </button>
                <span class="badge badge-notify badgeReceived"></span>
              </a>
                <div id="dropdownNotif" class="dropdown-menu dropdown-menu-right shadow animated--grow-in" style="z-index: 1;">
                  <small><b style="color: #0062CC; margin-left: 2%; font-size: 13px; font-weight: 700"><i class="fas fa-file-import"></i>&nbsp;&nbsp;Received Documents by Admin</b></small><br>
                  <div class="dropdown-divider" style="color: gray;"></div>
                  <div id="fileSendAdmin">
                  </div>
                  <small><b style="color: #0062CC; margin-left: 2%; font-size: 13px; font-weight: 700"><i class="fas fa-file-import"></i>&nbsp;&nbsp;Received Documents by Receiving Officer</b></small><br>
                  <div class="dropdown-divider" style="color: gray;"></div>
                  <div id="fileSend">
                  </div>
                </div>
              </li>
          </ul>
          <ul class="navbar-nav">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php  
                    include_once('connection_db/connection.php');
                    $image_query = mysqli_query($conn,"SELECT imageProfile FROM register WHERE id='$id'");
                    while($rows = mysqli_fetch_array($image_query))
                    {
                        $imageProfile = $rows['imageProfile'];
                    ?>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><img class="user" src="img/<?php echo $imageProfile; ?>" alt="Avatar">&nbsp;&nbsp;<?php echo $fullname; ?> (<?php echo $department;?> Head)</span>
                    <?php
                   }
                  ?>
                     
                    </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php" style="color: gray;">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400" style="color: lightgray;"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="changePassword.php" style="color: gray;">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400" style="color: lightgray;"></i>
                                  Change Password
                                </a>
                       
                                <div class="dropdown-divider" style="color: gray;"></div>
                                <a class="dropdown-item" href="#" style="color: gray;" data-target="#logout_modal" data-toggle="modal" class="identifyingClass" data-id="my_id_value">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="color: lightgray;"></i>
                                    Logout
                                </a>
                            </div>
                </li>
              </ul>
        </nav>

<style>
  .user {
    border-radius: 50%;
    height: 23px;
    width:  12%;
  }
  .badge-notify{
   background: red;
   position: relative;
   top: -10px;
   left: -25%;
   color: white;
   border-radius: 50%;
   height: 17px;
  }
  #dropdownNotif {
    max-height: 280px;
    overflow-y: auto;
  }
  .hide {
    display: none;
  }
  .tooltip{
   font-size: 10px;
 }
</style>

<!--- Logout Modal Confirmation --->
<div class="modal fade" id="logout_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="border: none;">
      <div class="modal-header" style="background-color: #0062CC; height: 40px">
        <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 14px; font-weight: 550; color: #F0F0F0; margin-top: -1%;"><span><i class="fas fa-exclamation-triangle" style="color: #EB7D81;"></i></span> Confirm Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #F0F0F0; margin-top: -4.5%">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label class="text-left" style="font-size: 14px; color: black; font-weight: 550;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you sure you want to logout?</label>
      </div>
      <div class="modal-footer" style="border: none; margin-top: -3%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 12px; width: 20%;margin-top: -1%; height: 35px; font-size: 13px; border-radius: 30px; border: none; margin-left: -28%"> No</button>
        <button type="button" class="btn btn-primary" onclick="location.href = 'logout.php';" data-dismiss="modal" style="font-size: 12px; width: 20%;margin-top: -1%; height: 35px; font-size: 13px; border-radius: 30px;  border: none; margin-right: 28%"> Yes</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    //fetch_head_incoming();
    fetch_head_release();
    fetch_head_receive();
    fetch_head_receive_receive();
    setInterval(function(){
      // fetch_head_incoming();
      fetch_head_release();
      fetch_head_receive();
      fetch_head_receive_receive();
    }, 3000);

  });

  // function fetch_head_incoming(update) {
  //   $.ajax({
  //     url:"../fetch_head_incoming.php",
  //     method:"POST",
  //     data: {
  //       seen: update
  //     },
  //     success:function(data){
  //       var val = JSON.parse(data);
  //       $("#docuReceived").html(val.output);
  //       $(".badgedocuReceived").html(val.total);
  //     }
  //   })
  // }
  var admin = 0;
  var all = 0;
  function fetch_head_release(update) {
    $.ajax({
      url:"../fetch_head_release.php",
      method:"POST",
      data: {
        seen: update
      },
      success:function(data){
        var val = JSON.parse(data);
        $('#releasedDocument').html(val.output);
        if(val.total <= 0) {
          $(".badgeReleased").addClass('isNotif');  
        } else {
          $(".badgeReleased").html(val.total);
          $(".badgeReleased").removeClass('isNotif');
        }
      }
    })
  }

  function fetch_head_receive(update) {
    $.ajax({
      url:"../fetch_head_receive.php",
      method:"POST",
      data: {
        seen: update
      },
      success:function(data){
        var val = JSON.parse(data);
        $('#fileSend').html(val.output);
        all = val.total;
      }
    })

    $.ajax({
      url:"../fetch_head_admin_receive.php",
      method:"POST",
      data: {
        seen: update
      },
      success:function(data){
        var val = JSON.parse(data);
        $('#fileSendAdmin').html(val.output);
        if(val.total <= 0) {
          $(".badgeReceived").addClass('isNotif');  
        } else {
          $(".badgeReceived").html(val.total);
          $(".badgeReceived").removeClass('isNotif');
        }
        admin = val.total;
      }
    })
    var sum = parseFloat(all) + parseFloat(admin);
    if(sum <= 0) {
      $(".badgeReceived").addClass('isNotif');  
    } else {
      $(".badgeReceived").html(sum);
      $(".badgeReceived").removeClass('isNotif');
    }
  }

  function fetch_head_receive_receive(update) {
    $.ajax({
      url:"../fetch_notif_head_receive_receive.php",
      method:"POST",
      data: {
        seen: update
      },
      success:function(data){
        var val = JSON.parse(data);
        $('#ReceivedReceivedDocument').html(val.output);
        if(val.total <= 0) {
          $(".badgeReceivedReceived").addClass('isNotif');  
        } else {
          $(".badgeReceivedReceived").html(val.total);
          $(".badgeReceivedReceived").removeClass('isNotif');
        }
      }
    })
  }

  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>