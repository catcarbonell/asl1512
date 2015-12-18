<div id="addprogressbox" class="row clear">


	<div id="progress_form" class="col-md-4">
	<a href="/ci">GO BACK</a>

		<?php echo validation_errors('<p class="error">'); ?>
		 
		<?php echo form_open_multipart('uploadprogress/do_upload');?>
		
		<h2>Upload Progress Photo</h2>

		<input type="file" name="userfile" />
		
		<input type='hidden' id='pcid' name='pcid' value='<?php echo $pcid; ?>' /> 
		<input class="form-btn" type="submit" value="upload" name="upload" />
		or <a href="/ci">CANCEL</a>
		<?php echo form_close() ; ?>
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
    
    <div id='photo-list-$rows->id' class='col-md-3'>
    
    	<a href='$rows->photo' class='gallery' data-featherlight><img class='img-rounded img-thumbnail' src='$rows->photo_thumb' /></a>
   
		<input type='hidden' id='pcid' name='pcid' value='$pcid' />
		
     	<input type='submit' name='delete' class='del-btn' value='remove' onclick='delphotoclick(\"$rows->id\")''>
     </div>";
	 }  
}else{
	echo "<h3>No progress photos!</h3>";
}

	

 //end php ?>
 
</div>
</div>