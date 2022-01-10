<!-- Edit -->
<div class="modal fade" id="view_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #8AA4CF;">      
              <h4 class="modal-title" style="font-size: 16px; font-weight: 550; font-style: initial; color: white;">Personal Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="editFunction.php">
            <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">

                 <div class="col" style="margin-bottom: -2%;">
                        <label class="col control-label" style="font-size: 14px; width: 140px;">Employee Code:</label>
                        <label style="font-size: 14px; font-weight: 500; padding: 10px"><?php echo $row['employee_code']; ?></label>
                 </div>

                 <div class="col" style="margin-bottom: -2%;">
                        <label class="col control-label" style="font-size: 14px; width: 140px;">Name:</label>
                        <label style="font-size: 14px; font-weight: 500; padding: 10px"><?php echo $row['fullname']; ?></label>
                 </div>

                  <div class="col" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 140px;">Username:</label>
                        <label style="font-size: 14px; font-weight: 500; padding: 10px"> &nbsp;<?php echo $row['username']; ?></label>
                  </div>

                  <div class="col" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 140px;">Email:</label>
                        <label style="font-size: 14px; font-weight: 500; padding: 10px"> &nbsp;<?php echo $row['email']; ?></label>
                  </div>

                  <div class="col" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 140px;">Date of birth:</label>
                        <label style="font-size: 14px; font-weight: 500; padding: 10px"> &nbsp;<?php echo $row['bday']; ?></label>
                  </div>

                  <div class="col" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 140px;">Mobile Number:</label>
                        <label style="font-size: 14px; font-weight: 500; padding: 10px"> &nbsp;<?php echo $row['phone_number']; ?></label>
                  </div>

                  <div class="col" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 140px;">Address:</label>
                        <label style="font-size: 14px; font-weight: 500; padding: 10px"> &nbsp;<?php echo $row['address']; ?></label>
                  </div>

                  <div class="col" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 140px;">Department:</label>
                        <label style="font-size: 14px; font-weight: 500; padding: 10px"> &nbsp;<?php echo $row['department']; ?></label>
                  </div>

                  <div class="col" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 140px;">Position:</label>
                        <label style="font-size: 14px; font-weight: 500; padding: 10px"> &nbsp;<?php echo $row['usertype']; ?></label>
                  </div>

                </div>
            </div> 
        </div>
   </div>
</div>
</div>



<!-- Edit -->
<div class="modal fade" id="moreDetails_<?php echo $row['tracking_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog " style="max-width: 60%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F5F5F5;">      
              <h4 class="modal-title" style="font-size: 16px; font-weight: 550; font-style: initial; color: gray;"><span><i class='fas fa-info-circle' style='color: lightgray; font-size: 16px'></i></span> &nbsp;Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: red; font-size: 14px">Done</button>
             </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="editFunction.php">
            <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">

                 <div class="form-group" style="margin-bottom: -2%;">
                        <label class="col control-label" style="font-size: 14px; width: 240px; color: #666666; margin-right: 10%;">Tracking #:&nbsp;&nbsp;</label>
                        <label  style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text; "><?php echo $row['tracking_no']; ?></label>
                 </div>

                 <div class="form-group" style="margin-bottom: -2%;">
                        <label class="col control-label" style="font-size: 14px; width: 240px; color: #666666; margin-right: 10%;">File Name:&nbsp;&nbsp;</label>
                        <label  style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text;"><?php echo $row['file_name']; ?></label>
                 </div>

                  <!--<div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 240px; color: #666666;">Message/Description: &nbsp;&nbsp;</label>
                        <label style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text;"> &nbsp;<?php echo $row['file_description']; ?></label>
                  </div>-->

                   <div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 140px; color: #666666; margin-right: 10%;">Attached File:&nbsp;&nbsp;</label>
                        <label  style="font-size: 14px; font-weight: 500; cursor: text;"> &nbsp;<?php echo $row['attach_file']; ?></label>
                  </div>

                  <div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 240px; color: #666666; margin-right: 10%;">Document Type:&nbsp;&nbsp;</label>
                        <label  style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text;"> &nbsp;<?php echo $row['type_document']; ?></label>
                  </div>

                  <div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 240px; color: #666666; margin-right: 10%;">Action:&nbsp;&nbsp;</label>
                        <label  style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text;"> &nbsp;<?php echo $row['forYour']; ?></label>
                  </div>

                   <div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 240px; color: #666666; margin-right: 10%;">Date & Time Created: &nbsp;&nbsp;&nbsp;</label>
                        <label  class="col-sm-6" style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text;"> &nbsp;<?php echo $row['select_date']; ?></label>
                  </div>

                  <div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 240px; color: #666666; margin-right: 10%;">Created By: &nbsp;&nbsp;&nbsp;</label>
                        <label  style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text;"> &nbsp;<?php echo $row['fullname']; ?></label>
                  </div>

                  <div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 240px; color: #666666; margin-right: 10%;">Originating Department: &nbsp;&nbsp;&nbsp;</label>
                        <label  class="col-sm-6" style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text;"> &nbsp;<?php echo $row['department']; ?></label>
                  </div>
                  

                </div>
            </div> 
        </div>
   </div>
</div>
</div>


<div class="modal fade" id="Track_<?php echo $row['tracking_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog " style="max-width: 60%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F5F5F5;">      
              <h4 class="modal-title" style="font-size: 16px; font-weight: 550; font-style: initial; color: gray;"><span><i class='fas fa-info-circle' style='color: lightgray; font-size: 16px'></i></span> &nbsp;Track Document</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: red; font-size: 14px">Done</button>
             </div>
            <div class="modal-body">
            <div class="container-fluid">
              <?php
              echo 
              "
              <div class='row'>
                <div class='col-sm-6'>
                  <p>TRACKING NO:<label>".$row['tracking_no']."</label></p>
                </div>
                <div class='col-sm-6'>
                  <p>Created By:<label>".$row['fullname']."</label></p>
                </div>
              </div>
              ";
              include_once('connection_db/connection.php');
               $sqlin = "SELECT file_upload.*, status_document.status as statDocu, register.*, status_document.description as descr from file_upload inner join status_document on file_upload.tracking_no = status_document.tracking_no INNER JOIN register ON register.id = status_document.user_id where status_document.tracking_no = '".$row['tracking_no']."' and usertype = 'Releasing Officer'";
              //use for MySQLi-OOP
              $queryin = $conn->query($sqlin);
              echo "
              <div class='row'>
              <div class='col-sm-6' style='border-radius: 25px; border: 2px solid #73AD21; padding: 20px; width: 400px; '>
              <h4>Document Released To:</h4>
              ";
              while($rowTrack = $queryin->fetch_assoc()){
                $desc = $rowTrack['descr'] ? "<a>Released To: <label>".$rowTrack['descr']."</label></a>" : "";
                echo "
                <a>Releaser Name: <label>".$rowTrack['fullname']."</label></a>
                <a>Status: <label>".$rowTrack['statDocu']."</label></a><br>
                ".$desc."
                <hr>
                ";
              }
              echo "
              </div>
              <div class='col-sm-6' style='border-radius: 25px; border: 2px solid #73AD21; padding: 20px; width: 400px; '>
              <h4>Document Received By:</h4>
              ";
              $sqlRec = "SELECT file_upload.*, status_document.status as statDocu, register.*, status_document.description as descr from file_upload inner join status_document on file_upload.tracking_no = status_document.tracking_no INNER JOIN register ON register.id = status_document.user_id where status_document.tracking_no = '".$row['tracking_no']."' and usertype = 'Receiving Officer'";
              //use for MySQLi-OOP
              $queryRec = $conn->query($sqlRec);
                while($rowTrackRec = $queryRec->fetch_assoc()){
                $desc = $rowTrackRec['descr'] ? "<a>Releaser: <label>".$rowTrackRec['descr']."</label></a>" : "";
                echo "
                <a>Receiver Name:<label>".$rowTrackRec['fullname']."</label></a>
                <a>Status:<label>".$rowTrackRec['statDocu']."</label></a><br>
                ".$desc."
                <hr>
                ";
              }
              echo "
              </div>
              </div>
              ";
                ?>
            </div> 
        </div>
   </div>
</div>
</div>
