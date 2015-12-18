<div class="row">

	<div id="upload_form" class="col-md-4">
	

		<?php echo validation_errors('<p class="error">'); ?>
		 
		<?php echo form_open_multipart('upload/do_upload');?>
		<h2>Upload Profile Pic</h2>

		<input type="file" name="userfile" />
		 
		<br /><br />
		<input type='hidden' id='pcid' name='pcid' value='<?php echo $pcid; ?>' /> 
		<input class="form-btn" type="submit" value="upload" name="upload" />
		or <a href="/ci">CANCEL</a>
	</div>
</div>