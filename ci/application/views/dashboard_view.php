<div id="addclientbox" class="clear">

  <a href="#addclient" class="slide-click"><h2>+ Add Client</h2></a>
  <div id="addclient" class="slide-menu hide">
	<?php echo validation_errors('<p class="error">'); ?>
	<?php echo form_open("user/registration"); ?>
	  <p>
	  
	  <input type="text" id="fname" name="fname" value="First Name" />
	  </p>
	  <p>
	  
	  <input type="text" id="lname" name="lname" value="Last Name" />
	  </p>
	  <p>
	  
	  <input type="text" id="email_address" name="email_address" value="Email" />
	  </p>
	
	  </p>
	  <input type="hidden" id="utype" name="utype" value="2" />
	  <input type="hidden" id="tid" name="tid" value="<?php echo $this->session->userdata('user_id'); ?>" />
	  <p>
	  <input type="submit" class="form-btn" value="Add" />
  </p>
 <?php echo form_close(); ?>


</div> <!--<div id="addclient"-->  

</div><!--<div id="content">-->


