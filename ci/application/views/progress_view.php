<div id="addprogressbox" class="clear">
<a href="/ci">GO BACK</a>

	<div id="progress_form" class="col-md-4">
	

		<?php echo validation_errors('<p class="error">'); ?>
		 
		<?php echo form_open_multipart('uploadprogress/do_upload');?>
		<h2>Upload Progress Photo</h2>

		<input type="file" name="userfile" />
		 
		<br /><br />
		<input type='hidden' id='pcid' name='pcid' value='<?php echo $pcid; ?>' /> 
		<input class="form-btn" type="submit" value="upload" name="upload" />
		or <a href="/ci">CANCEL</a>
	</div>
</div>

</div> 

<div id='gallery' class='row'>

<?php 

$CI =& get_instance();
$CI->load->model('uploadprogress_model');



//** GET NOTES ** //

$progphotos = $CI->uploadprogress_model->getprogress($pcid);

if(count($progphotos) > 0){
   foreach($progphotos as $rows)
     {
     	
    echo "
    
    <div class='col-md-2 thumb'>
    
    	<a href='$rows->photo' class='gallery' data-featherlight><img src='$rows->photo_thumb' /></a>
   
		<input type='hidden' id='pcid' name='pcid' value='$pcid' />
		
     	<input type='submit' name='delete' class='img-thumbnail' value='x' onclick='delnoteclick(\"$rows->id\")''>
     </div>";
	 }  
}else{
	echo "<h3>No progress photos!</h3>";
}

	
	
	



 ?>