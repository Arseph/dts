<!-- Edit document types -->
<div class="modal fade" id="editDT_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" style="max-width: 42%;">
        <div class="modal-content" style="width: 90%; border: none;">
            <div class="modal-header" style="background-color: #0062CC; height: 50px;">      
              <h4 class="modal-title" style="font-size: 15px; font-weight: 500;color: white; margin-top: -1px"><span><i class="fas fa-edit"></i></span> &nbsp; Edit Document Types</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: -15px; color: white; font-size: 20px">&times;</button>
             </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="editDepartmentFunction.php">
                <input type="hidden" class="form-control" name="doc_id" value="<?php echo $row['id']; ?>">
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label modal-label" style="font-size: 13px;">Name:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="type_document" value="<?php echo $row['type_document']; ?>" style="font-size: 13px; width: 100%; background-color: #F0F0F0;">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label modal-label" style="font-size: 13px;">Description:</label>
                    </div>
                    <div class="col-sm-10">
                        <textarea class="form-control" type="text" placeholder="Enter here" name="description" id = "description" style="font-size: 12px; height: 100px; background-color: #F0F0F0;" required ><?php echo $row['description']; ?></textarea>
                    </div>
                </div>
            </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%;margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editDocType" class="btn btn-success" style="width: 20%;margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-check"></span> Update</a>
            </div>
            </form>

        </div>
    </div>
</div>

<!-- Delete document types-->
<!-- Delete document types-->
<div class="modal fade" id="deleteDT_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" style="border: none;">
            <div class="modal-header" style="background-color: #E60026; height: 40px">      
              <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 14px; font-weight: 550; color: #F0F0F0; margin-top: -1%;"><span><i class="fas fa-trash" style="color: #F0F0F0;"></i></span> Delete Confirmation</h5>
             </div>
            <div class="modal-body">    
                <p class="text-center" style="font-size: 14px; color: black; font-weight: 550;">Are you sure you want to delete this record?</p>
            </div>
            <div class="modal-footer" style="border: none; margin-top: -3%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 12px; width: 20%;margin-top: -1%; height: 35px; font-size: 13px; border-radius: 30px; border: none; margin-left: -28%"> No</button>
                <a href="deleteDepartmentFunction.php?doc_id=<?php echo $row['id']; ?>" class="btn btn-danger" style="font-size: 12px; width: 20%;margin-top: -1%; height: 35px; font-size: 13px; border-radius: 30px;  border: none; margin-right: 28%"> Yes</a>
            </div>
        </div>
    </div>
</div>


<!--- action type edit/delete --->

<div class="modal fade" id="editAT_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" style="max-width: 42%;">
        <div class="modal-content" style="width: 90%; border: none;">
            <div class="modal-header" style="background-color: #0062CC; height: 50px;">      
              <h4 class="modal-title" style="font-size: 15px; font-weight: 500;color: white; margin-top: -1px"><span><i class="fas fa-edit"></i></span> &nbsp; Edit Action</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: -15px; color: white; font-size: 20px">&times;</button>
             </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="editDepartmentFunction.php">
                <input type="hidden" class="form-control" name="ac_id" value="<?php echo $row['id']; ?>">
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label modal-label" style="font-size: 13px;">Name:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="action" value="<?php echo $row['action']; ?>" style="font-size: 13px; width: 100%; background-color: #F0F0F0;">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label modal-label" style="font-size: 13px;">Description:</label>
                    </div>
                    <div class="col-sm-10">
                        <textarea class="form-control" type="text" placeholder="Enter here" name="action_description" style="font-size: 12px; height: 100px; background-color: #F0F0F0;" required ><?php echo $row['action_description']; ?></textarea>
                    </div>
                </div>
            </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%;margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editActionType" class="btn btn-success" style="width: 20%;margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-check"></span> Update</a>
            </div>
            </form>

        </div>
    </div>
</div>


<!-- Delete document types-->
<div class="modal fade" id="deleteAT_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" style="border: none;">
            <div class="modal-header" style="background-color: #E60026; height: 40px">      
              <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 14px; font-weight: 550; color: #F0F0F0; margin-top: -1%;"><span><i class="fas fa-trash" style="color: #F0F0F0;"></i></span> Delete Confirmation</h5>
             </div>
            <div class="modal-body">    
                <p class="text-center" style="font-size: 14px; color: black; font-weight: 550;">Are you sure you want to delete this record?</p>
            </div>
            <div class="modal-footer" style="border: none; margin-top: -3%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 12px; width: 20%;margin-top: -1%; height: 35px; font-size: 13px; border-radius: 30px; border: none; margin-left: -28%"> No</button>
                <a href="editDepartmentFunction.php?ac_id=<?php echo $row['id']; ?>" class="btn btn-danger" style="font-size: 12px; width: 20%;margin-top: -1%; height: 35px; font-size: 13px; border-radius: 30px;  border: none; margin-right: 28%"> Yes</a>
            </div>
        </div>
    </div>
</div>
