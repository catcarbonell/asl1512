<div class="right top">
 
	<h2 class="right">Welcome Back, <?php echo $this->session->userdata('fname'); ?>!  
	 	<a href="#drop-menu" class="slide-click"><img class="top-img" src="<?php echo base_url();?>/img/setting.png" alt="settings"></a></h2>
	<ul id="drop-menu" class="slide-menu hide clear">
		<li><?php echo anchor('user/edit', 'Edit Settings'); ?></li>
  	 	<li><?php echo anchor('user/logout', 'Logout'); ?></li>
	</ul>
	
</div>