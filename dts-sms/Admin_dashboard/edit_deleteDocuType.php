<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" style="max-width: 42%;">
        <div class="modal-content">
            <div class="modal-header">      
              <h4 class="modal-title" style="font-size: 18px; font-weight: 550; color: gray;">Edit Document Type</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="editDocuTypeFunction.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label" style="font-size: 13px;">Type: </label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="type_document" value="<?php echo $row['type_document']; ?>">
					</div>
				</div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label modal-label" style="font-size: 13px;">Descrption:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="description" value="<?php echo $row['description']; ?>">
                    </div>
                </div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%;margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success" style="width: 20%;margin-top: -1%; height: 35px; font-size: 13px;"><span class="glyphicon glyphicon-check"></span> Update</a>
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
                <p class="text-center" style="font-size: 13px">Are you sure you want to delete this record?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%; margin-top: -1%; height: 35px; font-size: 13px;"> No</button>
                <a href="deleteDocuTypeFunction.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="width: 20%; margin-top: -1%; height: 35px; font-size: 13px;" > Yes</a>
            </div>
        </div>
    </div>
</div>
