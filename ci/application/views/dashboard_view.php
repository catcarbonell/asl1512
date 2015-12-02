<div class="content">

<div class="logo left"><img src="<?php echo base_url();?>/img/logo.png">

<div class="right" id="topheader">

 <?php echo form_open("user/login"); ?>

  <label for="email">Email:</label>
  <input type="text" id="email" class="top-login" name="email" value="" />
  <label for="password">Password:</label>
  <input type="password" id="pass" class="top-login" name="pass" value="" />
  <input type="submit" class="top-login top-login-btn" value="Sign in" />


 <?php echo form_close(); ?>
</div><!--<div class="signin_form">-->

</div><!--<div class="signup_wrap">-->
<div class="clear">
  <h2>Welcome Back, <?php echo $this->session->userdata('username'); ?>!</h2>
  <p>This section represents the area that only logged in members can access.</p>
  <h4><?php echo anchor('user/logout', 'Logout'); ?></h4>
</div><!--<div class="content">-->