<?php require_once 'addFunction.php'; ?>

<!-- Add New File-->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">      
		      <h4 class="modal-title">Add New Document</h4>
		      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		     </div>
            <div class="modal-body" class="modal fade">
			<div class="container-fluid">
			<form method="POST" action="add.php"  enctype="multipart/form-data">
			<div class="modal-body">
				<div class="row form-group">
					<div class="txt col-sm-10">
						<label class="control-label modal-label">Tracking Number: </label>
					</div>
					<div class="field col-sm-10">
						<input type="text" class="form-control" name="tracking_no" value="<?php echo $tracking_no;?>" readonly="">
					</div>
				</div>
				<div class="row form-group">
					<div class="txt col-sm-10">
						<label class="control-label modal-label">File Name: </label>
					</div>
					<div class="field col-sm-10">
						<input type="text" class="form-control" name="file_name" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="txt col-sm-10">
						<label class="control-label modal-label">File Description:</label>
					</div>
					<div class="field col-sm-10">
						<input type="text" class="form-control" name="file_description" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="txt col-sm-10">
						<label class="control-label modal-label">Attach File:</label>
					</div>
					<div class="field col-sm-1-">
						<input type="file" class="form-control" name="myfile">
					</div>
				</div>
				<div class="row form-group">
					<div class="txt col-sm-10">
						<label class="control-label modal-label">Type of Document:</label>
					</div>
					<div class="field col-sm-10">
						<select id="type_document" name="type_document">
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
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>

<style>
h4{
	font-weight: 600;
}
.txt{
	margin-top: -3%;
	margin-bottom: 10px;
}
.field{
	width: 100%;
}
	.modal .btn {
     border-radius: 1px;
     min-width: 100px;
    } 
    .modal form label {
    font-weight: normal;
    font-family: 'Poppins', sans-serif;
    display: inline-block;
   }
    .modal .modal-dialog {
          max-width: 500px;
         }
         .modal .modal-header, .modal .modal-body, .modal .modal-footer {
          padding: 20px 30px;
         }
         .modal .modal-content {
          border-radius: 1px;
         }
         .modal .modal-footer {
          background: #ecf0f1;
          border-radius: 0 0 1px 1px;
         }
         .modal .modal-title {
           display: inline-block;
          }
         .modal .form-control {
          border-radius: 1px;
          box-shadow: none;
          border-color: #dddddd;
         }
</style>