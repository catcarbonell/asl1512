<div class="right top">
 
	<h2 class="right">Welcome Back, <?php echo $this->session->userdata('fname'); ?>!  
	 	<img class="top-img" src="<?php echo base_url();?>/img/setting.png" alt="settings"></h2>
	<ul id="drop-menu" class="hide clear">
		<li><?php echo anchor('user/edit', 'Edit Settings'); ?></li>
  	 	<li><?php echo anchor('user/logout', 'Logout'); ?></li>
	</ul>
	
</div>

<div id="client-add" class="clear">

	<h1>Client added!</h1>
	<a href="<?php echo base_url();?>">Go back</a>

</div><!--<div id="content">-->