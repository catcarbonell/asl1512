
<div id="client-add" class="clear">

	<h1>Client added!</h1>
	<a href="<?php echo base_url();?>">Go back</a> || 
<?php 
	 echo form_open("user/addstatspage");
    echo "
      <p>
      <input type='hidden' id='pcid' name='pcid' value=$pcid />                                                                                                                                                                                                                                               
      <input type='submit' name='addstats'  value='Add Client Stats'>
      </div>
      ";
    echo form_close(); 
 ?>
</div><!--<div id="content">-->