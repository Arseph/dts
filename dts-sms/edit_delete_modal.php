<!-- Edit -->
<div class="modal fade" id="editDrafts<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" style="max-width: 45%;">
        <div class="modal-content">
            <div class="modal-header">      
		      <h4 class="modal-title" style="font-size: 18px; font-weight: 550; color: gray;">Edit File</h4>
		      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		     </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php">
			<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">

				 <div class=" form-group">
				 	<span class="asterisk" style="color: red;">*</span>
	       			  <label style="font-size: 13px;">File Name: </label>
	       			  	<input class="form-control" name="file_name" value="<?php echo $row['file_name']; ?>" style="font-size: 13px;margin-top: -3%; width: 100%;">
	      		  </div>
	      		  <div class=" form-group">
			       <label style="font-size: 13px;">File Description</label>
			       	<input class="form-control" name="file_description" value="<?php echo $row['file_description']; ?>" style="font-size: 13px;margin-top: -3%; width: 100%;">
      			 </div>
      			 <div class=" form-group">
      			 	<span class="asterisk" style="color: red;">*</span>
			       <label style="font-size: 13px;">Attach File:</label>
			       	<input type="file" class="form-control" name="myfile" value="<?php echo $row['attach_file']; ?>" style="font-size: 13px;margin-top: -3%; width: 100%;">
      			 </div>
      			  <div class=" form-group">
			       <label style="font-size: 13px;">Originating Department</label>
			       	<input class="form-control" name="department" value="<?php echo $row['department']; ?>" style="font-size: 13px;margin-top: -3%; width: 100%;"readonly>
      			 </div>
				  <div class=" form-group">
				  	<span class="asterisk" style="color: red;">*</span>
			       <label style="font-size: 13px;">Type of Document</label>
			       <select id="typeD" name="type_document" class="form-control" style="font-size: 13px;margin-top: -3%; width: 100%;">
			          <option selected="true" style="font-size: 14px"><?php echo $row['type_document']; ?></option>
			          <?php echo $option1;?>
			        </select>
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
<div class="modal fade" id="deleteDrafts<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">      
		      <h4 class="modal-title" style="font-size: 18px; font-weight: 550; color: gray;">Delete Confirmation</h4>
		      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		     </div>
            <div class="modal-body">	
            	<p class="text-center" style="font-size: 13px">Are you sure you want to delete this record?</p>
			</div>
            <div class="modal-footer" style="height: 50px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%; margin-top: -1%; height: 35px; font-size: 13px;"> No</button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="width: 20%; margin-top: -1%; height: 35px; font-size: 13px;"> Yes</a>
            </div>

        </div>
    </div>
</div>

