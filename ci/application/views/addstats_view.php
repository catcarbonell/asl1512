<div class="clear">
  
  <div id="addstats" class="box-md">
	<h2>+ Add Stats</h2>
	<?php echo validation_errors('<p class="error">'); ?>
	<?php echo form_open("user/addstats"); ?>
	  <p>
	  <label for="height">Height (inches):</label>
	  <input type="text" id="height" name="height" value="<?php echo set_value('height'); ?>" />
	  </p>
	  <p>
	  <label for="weight">Weight (lbs):</label>
	  <input type="text" id="weight" name="weight" value="<?php echo set_value('weight'); ?>" />
	  </p>
	  <p>
	  <label for="waist">Waist (inches):</label>
	  <input type="text" id="waist" name="waist" value="<?php echo set_value('waist'); ?>" />
	  </p>
	
	  </p>
	  <input type="hidden" id="cid" name="cid" value="<?php echo $pcid ?>" />
	  <p>
	  <input type="submit" class="form-btn" value="Add" />
  </p>
 <?php echo form_close(); ?>


</div> <!--<div id="addclient"-->  

</div><!--<div id="content">-->