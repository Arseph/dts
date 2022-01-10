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