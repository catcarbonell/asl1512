<div id="addnotebox" class="clear">

  <h2>+ Add Note</h2>
  <div id="addnotes">
	<?php echo validation_errors('<p class="error">'); ?>
	<?php echo form_open("user/addnotesform"); ?>
	  <p>

	  <input type="text" id="text_entry" name="text_entry" value="Type your note..." />
	  </p>
	
   
	  <input type='hidden' id='entry_type' name='entry_type' value='1' />
	  <input type='hidden' id='deleted' name='deleted' value='0' />
	  <input type='hidden' id='cid' name='cid' value='<?php echo $pcid ?>' />
	  <p>
	  <input type="submit" class="form-btn" value="Add" />

  </p>
 <?php echo form_close(); ?>


</div> <!--<div id="addnotebox"-->  

<ul id="client-notes">

<?php 

$CI =& get_instance();
$CI->load->model('user_model');

#$CI->user_model->getclients($mytid);


//** GET NOTES ** //
   foreach($CI->user_model->getnotes($pcid) as $rows)
     {
    echo "<li id='note-list-$rows->id' class='note'>
    <h2>$rows->text_entry</h2>
    ";
    echo form_open("user/noteeditform");
    echo "

      <input type='hidden' id='nid' name='nid' value='$rows->id' />                                                                                                                                                                                                                                               
      <input type='submit' name='edit' class='client-box-input' value='edit note'>

      
      ";
    echo form_close(); 
   
    echo "
      <input type='hidden' id='nid' name='nid' value='$rows->id' /> 
      <input type='submit' name='delete'  class='client-box-input inline' value='delete' onclick='delnoteclick(\"$rows->id\")''>
     
</li>
      ";
}


 ?>