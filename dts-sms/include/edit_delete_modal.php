<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit File</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">File Name: </label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="file_name" value="<?php echo $row['file_name']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">File Description:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="file_description" value="<?php echo $row['file_description']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Attach File:</label>
					</div>
					<div class="col-sm-10">
						<input type="file" class="form-control" name="myfile" value="<?php echo $row['attach_file']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Type of Document:</label>
					</div>
					<div class="col-sm-10">
						<select id="type_document" name="type_document" value="<?php echo $row['type_document']; ?>">
				          <option selected="true" disabled="disabled">Select here</option>
				          <option value="cos">Certificate of Service</option>
				          <option value="letter">Letter</option>
				          <option value="moa">Memorandum of Agreement</option>
				          <option value="unclass">Unclassified</option>
        				</select>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<?php require_once 'deleteFunction'; ?>
<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to delete this record?</p>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="delete" class="btn btn-primary">Delete</button>
            </div>

        </div>
    </div>
</div>