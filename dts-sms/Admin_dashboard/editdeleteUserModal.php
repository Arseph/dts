<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog " style="max-width: 65%;">
        <div class="modal-content" style="width: 90%; border: none; background-color: #FFFFFF;">
            <div class="modal-header" style="background-color: #0062CC; height: 40px">      
              <h4 class="modal-title" style="font-size: 14px; font-weight: 550; color: #F0F0F0; margin-top: -1%"><span><i class="fas fa-user-edit"></i></span> &nbsp;Edit User Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #F0F0F0; margin-top: -3.5%">&times;</button>
             </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="editUserFunction.php">
            <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">

                <div class="wrapper" style="margin-left: 5%">
                                     <div class="row form-group" style="margin-bottom: 2%">
                    <div class="col-sm-6">
                           <label style="font-size: 13px;">Employee Code:</label>
                           <input type="text" class="form-control rounded-0" name="empcode" value="&nbsp;<?php echo $row['employee_code']; ?>" style="font-size: 13px;margin-top: -3%; width: 90%; border: 0.5px solid lightgrey;" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Position:</label>
                        <input type="text" class="form-control rounded-0" name="usertype" value="<?php echo $row['usertype']; ?>" style="font-size: 13px;margin-top: -3%; width: 90%; border: 0.5px solid lightgrey;" readonly>
                    </div>
                    
                </div>

                <div class="row form-group">
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Username:</label>
                        <input type="text" class="form-control rounded-0" name="username" value="<?php echo $row['username']; ?>" style="font-size: 13px;margin-top: -3%; width: 90%; background-color: #F0F0F0; border: 0.5px solid lightgrey;">
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Name:</label>
                        <input type="text" class="form-control rounded-0" name="fullname" value="<?php echo $row['fullname']; ?>" style="font-size: 13px;margin-top: -3%; width: 90%; background-color: #F0F0F0; border: 0.5px solid lightgrey;">
                    </div>
                </div>
                <br>

                <div class="row form-group" style="margin-bottom: 2%">
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Email address:</label>
                        <input type="text" class="form-control rounded-0" name="email" value="<?php echo $row['email']; ?>" style="font-size: 13px;margin-top: -3%; width: 90%; background-color: #F0F0F0; border: 0.5px solid lightgrey;">
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Date of birth:</label>
                        <input type="text" class="form-control rounded-0" id="bday" name="bday" value="<?php echo $row['bday']; ?>" style="font-size: 13px;margin-top: -3%; width: 90%; background-color: #F0F0F0; border: 0.5px solid lightgrey;">
                    </div>
                </div>
                <div class="row form-group" style="margin-bottom: 2%">
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Phone Number:</label>
                        <input type="text" class="form-control rounded-0" name="phone_number" value="<?php echo $row['phone_number']; ?>" style="font-size: 13px;margin-top: -3%; width: 90%; background-color: #F0F0F0; border: 0.5px solid lightgrey;">
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label modal-label" style="font-size: 13px;">Department:</label>
                        <select id="typeD" name="department" class="form-control rounded-0" value="<?php echo $row['department']; ?>" style="font-size: 13px;margin-top: -3%; width: 90%; background-color: #F0F0F0; border: 0.5px solid lightgrey;">
                          <option selected="true"><?php echo $row['department']; ?></option>
                          <?php echo $options;?>
                        </select>
                    </div>
                </div>
            <!--
                <div class="row form-group" style="margin-bottom: 2%">
                    <div class="col-sm-6" style="margin-bottom: 2%">
                        <label style="font-size: 13px;">Address:</label>
                        <textarea class="form-control rounded-0" name="address" placeholder="Write your complete address" style="height:142px; font-size: 12px; width: 200%;" required><?php echo $row['address']; ?></textarea> 
                    </div>
                </div> -->
                </div>
            </div> 
        </div>
   <div class="modal-footer" style="border: none;">
    <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal" style="width: 15%;margin-top: -1%; height: 35px; font-size: 12px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    <button type="submit" name="edit" class="btn btn-success rounded-0" style="width: 15%;margin-top: -1%; height: 35px; font-size: 12px;"><span class="glyphicon glyphicon-check"></span> Update</button>
   </form>
  </div>

   </div>
</div>
</div>


<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">      
              <h4 class="modal-title" style="font-size: 18px; font-weight: 550; color: gray;">Delete Confirmation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             </div>
            <div class="modal-body">    
                <p class="text-center" style="font-size: 13px">Are you sure you want to remove this user?</p>
            </div>
            <div class="modal-footer" style="height: 50px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%; margin-top: -1%; height: 35px; font-size: 13px;"> No</button>
                <a href="deleteUser.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="width: 20%; margin-top: -1%; height: 35px; font-size: 13px;"> Yes</a>
            </div>

        </div>
    </div>
</div>