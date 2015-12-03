

	
<div class="logo left"><a href="/ci"><img src="<?php echo base_url();?>/img/logo.png"></a>
</div>

<div class="right top">
 
  <h2 class="inline">Welcome Back, <?php echo $this->session->userdata('user_name'); ?>!</h2>
  <img src="<?php echo base_url();?>/img/setting.png" class="inline top-img" alt="settings">


</div>


<div class="clear">
  
  <p>This section represents the area that only logged in members can access.</p>
  <div id="userprofile" class="box-md inline">
	

	</div> <!--<div id="profile"-->  

	<h4><?php echo anchor('user/logout', 'Logout'); ?></h4>
</div><!--<div id="content">-->