<!-- Edit -->
<div class="modal fade" id="editUserDetails_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog " style="max-width: 55%;">
        <div class="modal-content">
            <div class="modal-header">      
              <h4 class="modal-title" style="font-size: 18px; font-weight: 550; color: gray;">Edit User Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="editFunction.php">
            <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">

                 <div class="row form-group" style="margin-bottom: 2%">
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">First name:</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>" style="font-size: 13px;margin-top: -3%;">
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Last name:</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>" style="font-size: 13px;margin-top: -3%;">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Username:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" style="font-size: 13px;margin-top: -3%;">
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Password:</label>
                        <input type="text" class="form-control" name="password" class="form-control inputpass" value="<?php echo $row['password']; ?>" style="font-size: 13px;margin-top: -3%;">
                    </div>
                </div>
                <br>

                <div class="row form-group" style="margin-bottom: 2%">
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Email address:</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" style="font-size: 13px;margin-top: -3%;">
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Date of birth:</label>
                        <input type="date" class="form-control" id="bday" name="bday" value="<?php echo $row['bday']; ?>" style="font-size: 13px;margin-top: -3%;">
                    </div>
                </div>
                <div class="row form-group" style="margin-bottom: 2%">
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Phone Number:</label>
                        <input type="text" class="form-control" name="phone_number" value="<?php echo $row['phone_number']; ?>" style="font-size: 13px;margin-top: -3%;">
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 13px;">Address:</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" style="font-size: 13px;margin-top: -3%;">
                    </div>
                </div>
                <div class="row form-group" style="margin-bottom: 2%">
                    <div class="col-sm-6">
                        <label class="control-label modal-label" style="font-size: 13px;">Department:</label>
                        <select id="typeD" name="department" class="form-control" value="<?php echo $row['department']; ?>" style="font-size: 13px;margin-top: -3%;">
                          <option selected="true"><?php echo $row['department']; ?></option>
                          <?php echo $options;?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label modal-label" style="font-size: 13px;">Usertype:</label>
                        <select id="usertype" name="usertype" class="form-control" value="<?php echo $row['usertype']; ?>" style="font-size: 13px;margin-top: -3%;">
                          <option selected="true"><?php echo $row['usertype']; ?></option>                        
                        </select>
                    </div>
                </div>
            </div> 
        </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%;margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    <button type="submit" name="edit" class="btn btn-success" style="width: 20%;margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-check"></span> Update</button>
   </form>
  </div>

   </div>
</div>
</div>


<!-- Delete -->
<div class="modal fade" id="deleteUserDetails_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">      
              <h4 class="modal-title" style="font-size: 18px; font-weight: 550; color: gray;">Delete Confirmation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             </div>
            <div class="modal-body">    
                <p class="text-center" style="font-size: 13px">Are you sure you want to delete this/these user/s? This action cannot be undone.</p>
            </div>
            <div class="modal-footer" style="height: 50px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%; margin-top: -1%; height: 35px; font-size: 13px;"> No</button>
                <a href="deleteFunction.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="width: 20%; margin-top: -1%; height: 35px; font-size: 13px;"> Yes</a>
            </div>

        </div>
    </div>
</div>