<div class="navbar-right">
	<h3 class="right">Welcome back, <?php echo $this->session->userdata('fname'); ?>!  
	 	<a href="#drop-menu" class="slide-click"><img class="top-img" src="<?php echo base_url();?>/img/setting.png" alt="settings"></a></h2>
	<ul id="drop-menu" class="slide-menu hide clear">
  	 	<li><?php echo anchor('user/logout', 'Logout'); ?></li>
	</ul>
	</h3>
	
</div>