<div class="logo left"><a href="/ci"><img src="<?php echo base_url();?>/img/logo.png"></a>
</div>

<div class="right top">
 
	 <h2 class="inline">Welcome Back, <?php echo $this->session->userdata('fname'); ?>!</h2>

	 <img class="top-img" src="<?php echo base_url();?>/img/setting.png" alt="settings">

	<ul id="drop-menu" class="hide clear">
		<li><?php echo anchor('user/edit', 'Edit Settings'); ?></li>
  	 	<li><?php echo anchor('user/logout', 'Logout'); ?></li>
	</ul>
	
</div>


<div class="clear">
  
  <div id="addclient" class="box-md hide">
	<h2>+ Add Client</h2>
	<?php echo validation_errors('<p class="error">'); ?>
	<?php echo form_open("user/registration"); ?>
	  <p>
	  <label for="fnamee">First Name:</label>
	  <input type="text" id="fname" name="fname" value="<?php echo set_value('fname'); ?>" />
	  </p>
	  <p>
	  <label for="lname">Last Name:</label>
	  <input type="text" id="lname" name="lname" value="<?php echo set_value('lname'); ?>" />
	  </p>
	  <p>
	  <label for="email_address">Email:</label>
	  <input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" />
	  </p>
		
	  </p>
	  <input type="hidden" id="utype" name="utype" value="2" />
	  <input type="hidden" id="tid" name="tid" value="<?php echo $this->session->userdata('user_id'); ?>" />
	  <p>
	  <input type="submit" class="btn" value="Add" />
  </p>
 <?php echo form_close(); ?>


</div> <!--<div id="addclient"-->  

<!-- CLIENT LIST -->




</div>
</div><!--<div id="content">-->


