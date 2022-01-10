<!-- Edit -->
<div class="modal fade" id="moreDetails_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                        <label class="col control-label" style="font-size: 14px; width: 240px; color: #666666;">Tracking #:</label>
                        <label  style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text; "><?php echo $row['tracking_no']; ?></label>
                 </div>

                 <div class="form-group" style="margin-bottom: -2%;">
                        <label class="col control-label" style="font-size: 14px; width: 240px; color: #666666;">File Name:</label>
                        <label  style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text;"><?php echo $row['file_name']; ?></label>
                 </div>

                  <div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 240px; color: #666666;">Message/Description: </label>
                        <label  style="font-size: 14px; font-weight: 500; margin-left: -15%; cursor: text;"> &nbsp; &nbsp; &nbsp;<?php echo $row['file_description']; ?></label>
                  </div>

                   <div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 140px; color: #666666;">Attached File:</label>
                        <label  style="font-size: 14px; font-weight: 500; cursor: text;"> &nbsp;<?php echo $row['attach_file']; ?></label>
                  </div>

                  <div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 240px; color: #666666;">Document Type:</label>
                        <label  style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text;"> &nbsp;<?php echo $row['type_document']; ?></label>
                  </div>

                   <div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 240px; color: #666666;">Date & Time Received:</label>
                        <label  style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text;"> &nbsp;<?php echo $row['select_date']; ?></label>
                  </div>

                  <div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 240px; color: #666666;">Releaser Name:</label>
                        <label  style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text;"> &nbsp;<?php echo $row['rn']; ?></label>
                  </div>

                  <div class="form-group" style="margin-bottom: -2%">
                        <label class="col control-label" style="font-size: 13px; width: 240px; color: #666666;">Originating Department:</label>
                        <label  style="font-size: 14px; font-weight: 500; margin-left: -13%; cursor: text;"> &nbsp;<?php echo $row['department']; ?></label>
                  </div>
                  

                </div>
            </div> 
        </div>
   </div>
</div>
</div>